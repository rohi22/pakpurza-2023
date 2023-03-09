<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Models\Category;
use App\Models\Bumpupads;
use App\Models\Purchasesbumads;
use App\Models\Pagelist;
use App\Models\Brand;

class BumpupadsController extends Controller
{
    
   public function index(){
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu2';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'packagesubmenu21';
       
       $data['bumpupads'] = Bumpupads::latest()->join('page_list', 'page_list.id', 'bump_up_ads.placement')
                        
                         ->orderBy('bump_up_ads.id', 'desc')
                        ->paginate(10,['bump_up_ads.*','page_list.page_title as page_title']);
                    
                        
     return view('admin.bumpupads.index',$data);
   }

   public function create(){
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu2';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'packagesubmenu21';
       
       $data['pagelists'] = Pagelist::all();
       
       $data['category'] = Category::where('status',1)->get();
       
       $data['brands'] = Brand::where('status',1)->get();
       
       
    //   dd($data['brands']);
       
  return view('admin.bumpupads.create',$data);
      
   }

   public function store(Request $request){
    
    if($request->placement == 3){
        
        $store = new Bumpupads();
        $store->placement = $request->placement;
        $store->select_category = $request->select_category;
        $store->title = $request->title;
        $store->price = $request->price;
        $store->quantity = $request->quantity;
        $store->status = $request->status;
        $store->save();
        
    }
    else{
        
        $validation = Bumpupads::where('placement',$request->placement)->first();
        
        if(!empty($validation)){
            
            return redirect()->back()->with('success', 'Bump Up Ads Already Added');
        }
        else{
            
            $store = new Bumpupads();
            $store->placement = $request->placement;
            $store->select_category = $request->select_category;
            $store->title = $request->title;
            $store->price = $request->price;
            $store->quantity = $request->quantity;
            $store->status = $request->status;
            $store->save();
            
        }
        
        
    }
   
     
     return redirect()->back()->with('success', 'Bump Up Ads Added');
     
     
   }



   public function edit(Request $reqeust, $id){

       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu2';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'packagesubmenu21';
 $data['pagelists'] = Pagelist::all();
       
 
  
  $data['bumpupads'] = Bumpupads::where('id',$id)->first();

     return view('admin.bumpupads.edit',$data);
     
   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Bumpupads::where('id',$id)->first();
        
        $update->placement = $request->placement;
        $update->title = $request->title;
        $update->price = $request->price;
        $update->quantity = $request->quantity;
        $update->status = $request->status;
  
         $update->save();
       
        return redirect('admin/all-bump-up-ads')->with('success', 'Bump Up Ads Updated');
   }


   public function delete(Request $request){
       
       $delete = Bumpupads::where('id',$request->id)->first();
       
       
        if(!empty($delete)){

        $services = Purchasesbumads::where('plan_id',$request->id)->get();
        
        if(count($services) > 0){
             return 0;
        }
        else{
             $delete->delete();
              return 1;
        }
     }
         
     
   }
   
    public function deleteall(Request $request){
      dd($request->all());
        if(count($request->bumpups_id)>0){
           for($i=0;$i<count($request->bumpups_id);$i++){
                $services = Bumpupads::where('id',$request->bumpups_id[$i])->first();


 

     if(!empty($services)){

        $pservices = Purchasesbumads ::where('plan_id',$request->bumpups_id[$i])->get();
         
     
        if(count($pservices) == 0){
            
           $services->delete();
              
        }
        
     }
           }
           return 1;
       }else{
           return 0;
       }
       
   }

   
    public function approve(Request $request){
     
     
      $update = Purchasesbumads::where('id',$request->id)->first();
       

      $update->status = 1;
      $update->save();
            
            return 1;
         
      
   }
    



}
