<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\Hotfeaturedlistings;
use App\Models\Purchaseshotfeatured;


class HotfeaturedController extends Controller
{
     
     
      public function purchasesindex(){
      
      
        $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_6';
       $data['submenusub'] = 'packagesubmenu326';
       
       
       $data['purchasessearchfeatured'] = Purchaseshotfeatured::join('hot_featured_listings', 'hot_featured_listings.id', 'purchases_hot_featured_listings.plan_id')
                        
                         ->orderBy('purchases_hot_featured_listings.id', 'desc')
                        ->get(['purchases_hot_featured_listings.*','hot_featured_listings.title as Plan_title']);
                         
     return view('admin.featuredlistings.hotfeatured.purchase-list',$data);
   }
   
   
   
   public function index(){
       
       
          $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_6';
       $data['submenusub'] = 'packagesubmenu36';
       
      $data['searchfeaturedlistings'] = Hotfeaturedlistings::all();
     return view('admin.featuredlistings.hotfeatured.index',$data);
   }

   public function create(){
    $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_6';
       $data['submenusub'] = 'packagesubmenu36';
        return view('admin.featuredlistings.hotfeatured.create',$data);
   }

   public function store(Request $request){
    
    
   
        $store = new Hotfeaturedlistings();
        
        $store->title = $request->title;
$store->hot_item_limit = $request->hot_item_limit;
$store->cost = $request->cost;

$store->status = $request->status;

       
        $store->save();
            
        return redirect()->back()->with('success', 'Hot Featured Plans Added');
     
     
   }



   public function edit(Request $reqeust, $id){
       
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_6';
       $data['submenusub'] = 'packagesubmenu36';
       
       
        $data['searchfeaturedlistings'] = Hotfeaturedlistings::where('id',$id)->first();

     return view('admin.featuredlistings.hotfeatured.edit',$data);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Hotfeaturedlistings::where('id',$id)->first();
       
             $update->title = $request->title;
$update->hot_item_limit = $request->hot_item_limit;
$update->cost = $request->cost;

$update->status = $request->status;
                    $update->save();
            
         return redirect('admin/search-featured-listings')->with('success', 'Hot Featured  Plans Updated');
       
   }


   public function delete(Request $request){
     
      
   }



    
   
      public function approve(Request $request){
     
     
      $update = Purchaseshotfeatured::where('id',$request->id)->first();
       

      $update->status = 1;
      $update->save();
            
            return 1;
         
      
   }
    



}
