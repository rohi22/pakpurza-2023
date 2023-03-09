<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\Category;

use App\Models\Subscriptionplans;

use App\Models\Purchasessubscription;


class PurchasessubsplansController extends Controller
{
     
   public function index(){
       
       
        $data['menu'] = 'packagemenu';
        $data['submenu'] = 'packagesubmenu1';
        $data['submenulevel1'] = '';
        $data['submenusub'] = 'packagesubmenu111';
       
        //   $purchasessubscriptions = Purchasessubscription::all();
      
        $data['purchasessubscriptions'] = Purchasessubscription::join('subscription_plans', 'subscription_plans.id', 'purchases_subscription.plan_id')
                        
                         ->orderBy('purchases_subscription.id', 'desc')
                        ->get(['purchases_subscription.*','subscription_plans.title as Plan_title']);
        dd($data['purchasessubscriptions']);
                         
     return view('admin.purchasessubscription.index',$data);
   }

   public function create(){

        return view('admin.subscriptionplans.create');
   }

   public function store(Request $request){
    
    
   
        $store = new Subscriptionplans();
        $store->title = $request->title;
        $store->no_of_post = $request->no_of_post;
        $store->cost = $request->cost;
        $store->duration = $request->duration;
        $store->status = $request->status;
        $store->save();
            
        return redirect()->back()->with('success', 'Subscription Plans Added');
     
     
   }



   public function edit(Request $reqeust, $id){
       
       
        $subscriptionplans = Subscriptionplans::where('id',$id)->first();

     return view('admin.subscriptionplans.edit',compact('subscriptionplans'));

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
            
         return redirect('admin/all-subscription-plans')->with('success', 'Subscription Plans Updated');
       
   }


   public function delete(Request $request){
     
    //   $delete = Subscriptionplans::where('id',$request->id)->first();

    //  if(!empty($delete)){

    //         $delete->delete();
          
    //  }
     

    //  return 1;
     
     
   }



    
   
    



}
