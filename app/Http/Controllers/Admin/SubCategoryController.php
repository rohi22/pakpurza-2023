<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;


use App\Models\Attributes;
use App\Models\Property;

use App\Models\Allattributes;
use App\Models\Brand;
use App\Models\Adbrand;
use Illuminate\Support\Str;
use Auth;


class SubCategoryController extends Controller
{
     
   public function index($id){
       
        $data['menu'] = 'categorymenu';
        $data['submenu'] = 'categorysubmenu1';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['category'] = Category::where('id',$id)->first();
        $data['subCategories'] = SubCategory::where('category_id',$id)->get();
        $data['allattributes'] = Allattributes::all();
        $data['brand'] = Brand::all();
        
     return view('admin.sub-categories.index',$data);
   }

   public function create($id){  
      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';

     $data['category'] = Category::where('id',$id)->first();
        
      return view('admin.sub-categories.create',$data);
   }

   public function store(Request $request){
    //  dd($request->all());
     $request->validate([
         'title' => 'required|max:255',
         'category_id' => 'required',
         'status' => 'required',
     
     ]);

     for($i= 0;$i<count($request->title);$i++){
        
        $store = new SubCategory();
        $store->title = $request->title[$i];
        $store->description = $request->description[$i];
        $store->meta_keywords = $request->meta_keywords[$i];
        $store->meta_description = $request->meta_description[$i];
        $store->name_of_first_dropdown = $request->name_of_first_dropdown[$i];
        $store->name_of_second_dropdown = $request->name_of_second_dropdown[$i];
        $store->category_id = $request->category_id;
        $store->slug = Str::slug(strtolower($request->title[$i]), '-');
        $store->status = $request->status[$i];
         
                             $image_name = '';
                             if ($request->file('images')[$i]) {
                                  $image = $request->file('images')[$i];
                                  $image_name = time() . $image->getClientOriginalName();
                                  $image->move(public_path('/assets/media/sub-category/image'), $image_name);
                             }
                             $store->image = $image_name;
                        
                             $icon_image_name = '';
                             if ($request->file('icon')[$i]) {
                                  $icon_image = $request->file('icon')[$i];
                                  $icon_image_name = time() . $icon_image->getClientOriginalName();
                                  $icon_image->move(public_path('/assets/media/sub-category/icon'), $icon_image_name);
                             }
             
                $store->icon_image = $icon_image_name;
                $store->save();
         
    }
    
     return redirect()->back()->with('success', 'Sub Category Added');
   }

   public function edit_sub(Request $reqeust , $id)
   {

      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
      $data['category'] = SubCategory::where('id',$id)->first();
      return view('admin.sub-categories.edit',$data);

   }

   public function update_sub(Request $request, $id){

      // dd($request);
      $request->validate([
         'title' => 'required|max:255',
         'description' => 'max:255',
         'meta_keywords' => 'max:255',
         'meta_description' => 'max:255',
         'status' => 'required',
         'image' => $request->hasFile('image') ? 'required' : '',
         'icon' => $request->hasFile('icon') ? 'required' : '', 
     ]);


     $update = SubCategory::where('id',$id)->first();
     
     
     $update->title = $request->title;
     $update->description = $request->description;
     $update->meta_keywords = $request->meta_keywords;
     $update->meta_description = $request->meta_description;
     $update->name_of_first_dropdown = $request->name_of_first_dropdown;
     $update->name_of_second_dropdown = $request->name_of_second_dropdown;
     
     
     $image_name = '';
     if ($request->hasFile('image')) {
          @unlink(public_path('/assets/media/sub-category/image' . $update->image));
          $image = $request->file('image');
          $image_name = time().$image->getClientOriginalName();
          $image->move(public_path('/assets/media/sub-category/image/'), $image_name);
      } else {
          $image_name = $update->image;
      }

     $update->image = $image_name;

     $icon_image_name = '';
     if ($request->hasFile('icon')) {
          @unlink(public_path('/assets/media/sub-category/icon' . $update->icon_image));
          $image = $request->file('icon');
          $icon_image_name = time().$image->getClientOriginalName();
          $image->move(public_path('/assets/media/sub-category/icon'), $icon_image_name);
      } else {
          $icon_image_name = $update->icon_image;
      }
     $update->icon_image = $icon_image_name;
     
     $update->status = $request->status;
     $update->save();
     
     return redirect()->back()->with('success', 'Category Updated');


   }

   public function delete(Request $request){
     

     $delete = SubCategory::where('id',$request->id)->first();

     if(!empty($delete)){


        $Attributesdelete = Attributes::where('sub_category_id',$request->id)->delete();
        // $Propertydelete = Property::where('sub_category_id',$request->id)->delete();
        
          $delete->delete();
          @unlink(public_path('/assets/media/sub-category/category' . $delete->image));
          @unlink(public_path('/assets/media/sub-category/icon' . $delete->icon_image));
     }
     

     return 1;

   }
   
  public function deleteallsubcat(Request $request){
       
      if(count($request->sub_cat)>0){
             for($i=0;$i<count($request->sub_cat);$i++){
            $delete = SubCategory::where('id',$request->sub_cat[$i])->first();

             if(!empty($delete)){
        
        
                $Attributesdelete = Attributes::where('sub_category_id',$request->sub_cat[$i])->delete();
                // $Propertydelete = Property::where('sub_category_id',$request->id)->delete();
                
                  $delete->delete();
                  @unlink(public_path('/assets/media/sub-category/category' . $delete->image));
                  @unlink(public_path('/assets/media/sub-category/icon' . $delete->icon_image));
             }
     
      }
        return 1;
      }else{
          return 0;
      }
     
      

    

  }
   
   
//   public function deleteallsubcat(Request $request){
//     if(count($request->sub_cat)>0){
//         for($i=0;$i<count($request->sub_cat);$i++){
//              $delete = SubCategory::where('id',$request->sub_cat[$i])->first();

//      if(!empty($delete)){

//         $subCategory = SubCategory::where('sub_category_id',$request->sub_cat[$i])->get();
//         if(!empty($subCategory)){
//             foreach($subCategory as $sc){
              
//                 @unlink(public_path('/assets/media/sub-category/image/'.$sc->image));
//                 @unlink(public_path('/assets/media/sub-category/icon/' .$sc->icon_image));      
//             }
//             $validate = SubCategory::where('sub_category_id',$request->sub_cat[$i])->delete();
//         }
            
//             $delete->delete();
//             @unlink(public_path('/assets/media/category/category' . $delete->image));
//             @unlink(public_path('/assets/media/category/icon' . $delete->icon_image));
          
//      }
//         }
//           return 1;
//     }
//     return 0;
//   }
   
   
   
   public function add_sub_category_attributes(Request $request){
     
     $categoryId = $request->categoryId;
     $arrayone = explode(",",$request->attributesId);
     
    
            $a = 0;
            for($i=0;$i<count($arrayone);$i++){
                
                $subcatergoryid = $arrayone[$i];
                for($ii=0;$ii<count($request->allattributes);$ii++){
                
                
                 $attributes = Attributes::where('category_id',$categoryId)->where('sub_category_id',$subcatergoryid)->where('attributes_id',$request->allattributes[$ii])->first();
                 
                 if(empty($attributes)){
                     
                        $store = new Attributes();
                        $store->category_id = $categoryId;
                        $store->sub_category_id = $subcatergoryid;
                        $store->attributes_id = $request->allattributes[$ii];
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
