<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attributes;
use App\Models\Allattributes;
use App\Models\Property;
use Illuminate\Support\Str;
use Auth;


class PropertyController extends Controller
{
     
   public function index($id){
       
         
        $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
      
     $data['attribute'] = Allattributes::where('id',$id)->first();
     $data['properties'] = Property::where('attribute_id',$id)->get();
     return view('admin.properties.index',$data);
     
   }

   public function create($id){

     $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
     $data['attribute'] = Allattributes::where('id',$id)->first();    
      return view('admin.properties.create',$data);
   }

   public function store(Request $request){
     
   
     
      $request->validate([
         'title' => 'required|max:255',
        //  'category_id' => 'required',
        //  'sub_category_id' => 'required',
         'attribute_id' => 'required',
         'status' => 'required',
     
     ]);
     
     
   
    
     
     
     
    for($i= 0;$i<count($request->title);$i++){
        
         $store = new Property();
        
         $store->title = $request->title[$i];
         $store->description = $request->description[$i];
        //  $store->category_id = 0;
        //  $store->sub_category_id = 0;
         $store->attribute_id = $request->attribute_id;
         $store->slug = Str::slug(strtolower($request->title[$i]), '-');
         $store->status = $request->status[$i];
         
        //  dd($store);
         $store->save();
        
    }
    
     return redirect()->back()->with('success', 'Sub Category Added');

   }

   public function edit(Request $reqeust, $id){

       $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
     $data['property'] = Property::where('id',$id)->first();

     return view('admin.properties.edit',$data);

   }

   public function update(Request $request, $id){

      $request->validate([
         'title' => 'required|max:255',
         'description' => 'max:255',
         'status' => 'required',
         
     ]);


     $update = Property::where('id',$id)->first();
     $update->title = $request->title;
     $update->description = $request->description;
     $update->status = $request->status;
     $update->save();

     return redirect('properties/'.$update->attribute_id)->with('success', 'Property Updated');


   }

   public function delete(Request $request){
     $delete = Property::where('id',$request->id)->first();
     if(!empty($delete)){
          $delete->delete();
     }
     return 1;
   }

   
    



}
