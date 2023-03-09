<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\Featuredlistings;

class FeaturedlistingsController extends Controller
{
     
   public function index(){
         $featuredlistings = Featuredlistings::all();
     return view('admin.featuredlistings.index',compact('featuredlistings'));
     
   }

   public function create(){
 return view('admin.featuredlistings.create');
      
   }

   public function store(Request $request){
       
    $store = new Featuredlistings();
     
    $store->placement = $request->placement;
    $store->charges = $request->charges;
    $store->start_date = $request->start_date;
    $store->end_date = $request->end_date;
    $store->start_time = $request->start_time;
    $store->end_time = $request->end_time;
    $store->total = $request->total;
    $store->status = $request->status;
    $store->save();
     
     return redirect()->back()->with('success', 'Bump Up Ads Added');
    
   }



   public function edit(Request $reqeust, $id){
       
       $featuredlistings = Featuredlistings::where('id',$id)->first();

     return view('admin.featuredlistings.edit',compact('featuredlistings'));
     

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       $update = Featuredlistings::where('id',$id)->first();
        
        $update->placement = $request->placement;
        $update->charges = $request->charges;
        $update->start_date = $request->start_date;
        $update->end_date = $request->end_date;
        $update->start_time = $request->start_time;
        $update->end_time = $request->end_time;
        $update->total = $request->total;
        $update->status = $request->status;
        
         $update->save();
       
        return redirect('admin/all-featured-listings')->with('success', 'Featured Listings Updated');
        
   }


   public function delete(Request $request){
       
        $delete = Featuredlistings::where('id',$request->id)->first();
       
       
        if(!empty($delete)){
            
             $delete->delete();
        }
       
       
         return 1;
     
   }

   
    



}
