<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubBrand;
use App\Models\AssignAttributeToBrand;
use App\Models\AssignAttributeToSubBrand;


use App\Models\Attributes;
use App\Models\Property;

use App\Models\Allattributes;
use App\Models\Brand;
use App\Models\Adbrand;
use Illuminate\Support\Str;
use Auth;


class SubBrandController extends Controller
{
     
   public function index($id){
       
        $data['menu'] = '';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['brand'] = Brand::where('id',$id)->first();
        $data['subCategories'] = SubBrand::where('brand_id',$id)->get();
        $data['allattributes'] = Allattributes::all();
        $data['brands'] = Brand::all();
        
     return view('admin.sub-brands.index',$data);
   }

   public function create($id){  
      
      $data['menu'] = '';
      $data['submenu'] = '';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';

     $data['brand'] = Brand::where('id',$id)->first();
        
      return view('admin.sub-brands.create',$data);
   }

   public function store(Request $request){
   
     $request->validate([
         'title' => 'required|max:255',
         'brand_id' => 'required',
         'status' => 'required',
     
     ]);

     for($i= 0;$i<count($request->title);$i++){
        
        $store = new SubBrand();
        $store->title = $request->title[$i];
        $store->description = $request->description[$i];
        $store->meta_keywords = $request->meta_keywords[$i];
        $store->meta_description = $request->meta_description[$i];
        $store->brand_id = $request->brand_id;
        $store->slug = Str::slug(strtolower($request->title[$i]), '-');
        $store->status = $request->status[$i];
         
        $image_name = '';
        if ($request->file('image')[$i]) {
            $image = $request->file('image')[$i];
            $image_name = time() . $image->getClientOriginalName();
            $image->move(public_path('/assets/media/sub-brand/image'), $image_name);
        }
        $store->image = $image_name;
       
        $icon_image_name = '';
        if ($request->file('icon')[$i]) {
            $icon_image = $request->file('icon')[$i];
            $icon_image_name = time() . $icon_image->getClientOriginalName();
            $icon_image->move(public_path('/assets/media/sub-brand/icon'), $icon_image_name);
        }
             
        $store->icon_image = $icon_image_name;
        $store->save();
         
    }
    
     return redirect()->back()->with('success', 'Sub Brand Added');
   }

   public function edit_sub(Request $reqeust , $id)
   {

      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
      $data['brand'] = SubBrand::where('id',$id)->first();
      return view('admin.sub-brands.edit',$data);

   }

   public function update_sub(Request $request, $id){

    //   dd($request);
      $request->validate([
         'title' => 'required|max:255',
         'description' => 'max:255',
         'meta_keywords' => 'max:255',
         'meta_description' => 'max:255',
         'status' => 'required',
         'image' => $request->hasFile('image') ? 'required' : '',
         'icon' => $request->hasFile('icon') ? 'required' : '', 
     ]);


     $update = SubBrand::where('id',$id)->first();
     
     
     $update->title = $request->title;
     $update->description = $request->description;
     $update->meta_keywords = $request->meta_keywords;
     $update->meta_description = $request->meta_description;
     
     $image_name = '';
     if ($request->hasFile('image')) {
          @unlink(public_path('/assets/media/sub-brand/image' . $update->image));
          $image = $request->file('image');
          $image_name = time().$image->getClientOriginalName();
          $image->move(public_path('/assets/media/sub-brand/image/'), $image_name);
      } else {
          $image_name = $update->image;
      }

     $update->image = $image_name;

     $icon_image_name = '';
     if ($request->hasFile('icon')) {
          @unlink(public_path('/assets/media/sub-brand/icon' . $update->icon_image));
          $image = $request->file('icon');
          $icon_image_name = time().$image->getClientOriginalName();
          $image->move(public_path('/assets/media/sub-brand/icon'), $icon_image_name);
      } else {
          $icon_image_name = $update->icon_image;
      }
     $update->icon_image = $icon_image_name;
     
     $update->status = $request->status;
     $update->save();
     
     return redirect()->back()->with('success', 'Brand Updated');


   }

   public function delete(Request $request){
     

     $delete = SubBrand::where('id',$request->id)->first();
     

     if(!empty($delete)){


        // $Attributesdelete = Attributes::where('sub_category_id',$request->id)->delete();
        // $Propertydelete = Property::where('sub_category_id',$request->id)->delete();
        
          $delete->delete();
          @unlink(public_path('/assets/media/sub-brand/image' . $delete->image));
          @unlink(public_path('/assets/media/sub-brand/icon' . $delete->icon_image));
     }
     

     return 1;

   }
   
   
   
   public function add_brand_attributes(Request $request){
       
      
       $brands = explode(",",$request->attributesId);
       $a = 0;
            for($i=0;$i<count($brands);$i++){
                
                $brandid = $brands[$i];
                for($ii=0;$ii<count($request->allattributes);$ii++){
                
                
                 $attributes = AssignAttributeToBrand::where('brand_id',$brandid)->where('attribute_id',$request->allattributes[$ii])->first();
                 
                 if(empty($attributes)){
                     
                        $store = new AssignAttributeToBrand();
                        $store->brand_id = $brandid;
                        $store->sub_brand_id = NULL;
                        $store->attribute_id = $request->allattributes[$ii];
                        $store->save();
                     $a += 1;
                 }
                 
                  
                 }
            
            }
    
     return 1;
   }
   
   public function add_sub_brand_attributes(Request $request){
     
     
     
     $categoryId = $request->brandId;
     $arrayone = explode(",",$request->attributesId);
     
     
     
            $a = 0;
            for($i=0;$i<count($arrayone);$i++){
                
                $subbrandid = $arrayone[$i];
                for($ii=0;$ii<count($request->allattributes);$ii++){
                
                
                 $attributes = AssignAttributeToSubBrand::where('brand_id',$categoryId)->where('sub_brand_id',$subbrandid)->where('attribute_id',$request->allattributes[$ii])->first();
                 
                //  dd($attributes);
                 if(empty($attributes)){
                     
                        $store = new AssignAttributeToSubBrand();
                        $store->brand_id = $categoryId;
                        $store->sub_brand_id = $subbrandid;
                        $store->attribute_id = $request->allattributes[$ii];
                        $store->save();
                     $a += 1;
                 }
                 
                  
                 }
            
            }
   
     return 1;

   }
   
   
   
   public function add_sub_category_brands(Request $request){
     
     $categoryId = $request->categoryId;
     $arrayone = explode(",",$request->attributesId);
     
    
            $a = 0;
            for($i=0;$i<count($arrayone);$i++){
                
                $subcatergoryid = $arrayone[$i];
                for($ii=0;$ii<count($request->allattributes);$ii++){
                
                
                 $attributes = Adbrand::where('category_id',$categoryId)->where('sub_category_id',$subcatergoryid)->where('brands_id',$request->allattributes[$ii])->first();
                 
                 if(empty($attributes)){
                     
                        $store = new Adbrand();
                        $store->category_id = $categoryId;
                        $store->sub_category_id = $subcatergoryid;
                        $store->brands_id = $request->allattributes[$ii];
                        $store->save();
                     $a += 1;
                 }
                 
                  
                 }
            
            }
    
     return 1;

   }

   
    



}
