<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\Category;

use App\Models\Subscriptionplans;
use App\Models\Subscriptionplansitems;

use App\Models\Purchasessubscription;
use App\Models\Sellnowfield;

class SubscriptionplansController extends Controller
{
     
   public function index(){
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'packagesubmenu11';


      $data['subscriptionplans'] = Subscriptionplans::all();
     return view('admin.subscriptionplans.index',$data);
   }

   public function create(){
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'packagesubmenu11';

        $data['setting'] = Sellnowfield::where('field_status',0)->get();
        
        return view('admin.subscriptionplans.create',$data);
   }

   public function store(Request $request){
    
        // dd($request);
   
        $store = new Subscriptionplans();
        $store->title = $request->title;
        $store->no_of_post = $request->no_of_post;
        $store->cost = $request->cost;
        $store->duration = $request->duration;
        $store->status = $request->status;
        $store->save();
        
        $ID = $store->id;
        
        
        for($i= 0;$i<count($request->field_id);$i++){
           
             $stores = new Subscriptionplansitems();
             $stores->subscription_id = $ID;
             $stores->item_id = $request->field_id[$i];
             $stores->status = $request->field_status[$i];
             $stores->save();
           
        }
       
            
        return redirect()->back()->with('success', 'Subscription Plans Added');
     
     
   }



   public function edit(Request $reqeust, $id){
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'packagesubmenu11';
       
       $data['setting'] = Sellnowfield::leftjoin('subscription_plans_items', 'subscription_plans_items.item_id', 'sell_now_field.id')
                               ->where('field_status',0)
                               ->get(['sell_now_field.*','subscription_plans_items.status as activestatus']);
                               
                               
       $data['subscriptionplans'] = Subscriptionplans::where('id',$id)->first();
       return view('admin.subscriptionplans.edit',$data);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Subscriptionplans::where('id',$id)->first();
       
        $update->title = $request->title;
        $update->no_of_post = $request->no_of_post;
        $update->cost = $request->cost;
        $update->duration = $request->duration;
        $update->status = $request->status;
        $update->save();
        
        
        $updates = Subscriptionplansitems::where('subscription_id',$id)->get();
        
         
        foreach ($updates as $key=>$s){
            
               $updatess = Subscriptionplansitems::where('id',$s->id)->first();
               $updatess->status = 0;
                $updatess->save();
            
        }
        
        
         for($i= 0;$i<count($request->field_id);$i++){
             
             $updatesss = Subscriptionplansitems::where('item_id',$request->field_id[$i])->where('subscription_id',$id)->first();
             
             if($updatesss){
                
                 $updatess = Subscriptionplansitems::where('id',$updatesss->id)->first();
                 $updatess->status = $request->field_status[$i];
                 $updatess->save();
                
                 
             }
             else{
                 
                 $storess = new Subscriptionplansitems();
                 $storess->subscription_id = $id;
                 $storess->item_id = $request->field_id[$i];
                 $storess->status = $request->field_status[$i];
                 $storess->save();
             }
             
            
           
        }
        
            
         return redirect('admin/all-subscription-plans')->with('success', 'Subscription Plans Updated');
       
   }


   public function delete(Request $request){
     
      $delete = Subscriptionplans::where('id',$request->id)->first();

     if(!empty($delete)){
         
          $purchasessubscription = Purchasessubscription::where('plan_id',$request->id)->get();
          
        if(!empty($purchasessubscription)){
            
             return 2;
        }
        else{
             $delete->delete();
             
              return 1;
        }
        
     }
   }



    
   
    



}
