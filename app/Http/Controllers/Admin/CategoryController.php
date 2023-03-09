<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attributes;
use App\Models\Property;
use App\Models\Bannerslots;
use App\Models\Bannerads;
use Image;
use Auth;


class CategoryController extends Controller
{
     
   public function index(){
      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['categories'] = Category::latest()->paginate(10);
     return view('admin.categories.index',$data);
   }
   
   public function create(){
          $data['menu'] = 'categorymenu';
          $data['submenu'] = 'categorysubmenu2';
          $data['submenulevel1'] = '';
          $data['submenusub'] = '';
        return view('admin.categories.create',$data);
   }
   public function store(Request $request){
 
     $request->validate([
         'title' => 'required|max:255',
         'status' => 'required',
         'icon' => 'required',
         'slug' => 'unique:categories'
         
     ]);
    // for($i= 0;$i<count($request->title);$i++){
      
     $validate = Category::where('title', $request->title)->first();
  
     if(empty($validate)){
        $store = new Category();
        $store->title = $request->title;
        $store->slug = Str::slug($request->title, '-');
        $store->description = $request->description;
        $store->meta_keywords = $request->meta_keywords;
        $store->meta_description = $request->meta_description;
        $store->status = $request->status; 
        $store->image = $request->imgName;
        $store->icon_image = $request->iconName;
        
        //  $image_name[$i] = '';
        // if ($request->file('image')[$i]) {
            
        //     $featuredImage = $request->file('image')[$i];
        //     $featuredImageThumbnail = Image::make($featuredImage);
        //     $featured_image = time().$featuredImage->getClientOriginalName();
        //     $featuredImageThumbnailPath = public_path().'/assets/media/category/thumbnail_image/';
        //     $featuredImageThumbnail->save(public_path().'/assets/media/category/image/'.$featured_image);
        //     $featuredImageThumbnail->resize(267,267);
        //     $featuredImageThumbnail->save($featuredImageThumbnailPath.$featured_image);
            
        // }
        
        // $store->image = $featured_image;

        // //  $icon_image_name = '';
        // if ($request->file('icon')[$i]) {
        //       $icon_image = $request->file('icon')[$i];
        //       $icon_image_name = time().$icon_image->getClientOriginalName();
        //       $icon_image->move(public_path('/assets/media/category/icon'), $icon_image_name);
        // }
        
        // $store->icon_image = $icon_image_name;
        $store->save();
        
        $Bannerslots = Bannerslots::where('page_id',3)->get();
        foreach($Bannerslots as $slots){
            
             $stores = new Bannerads();
             $stores->title = $store->title;
             $stores->placement = $slots->id;
             $stores->page_id = 3;
             $stores->category_id = $store->id;
             $stores->charges = 0;
             $stores->status = 1;
             $stores->banner_img = $slots->slot_banner;
             $stores->save();
        }
        
        
     }
     else{
        return redirect()->back()->with('error', $validate->title.' Category is already been taken');
        
     }
   
        
    // }
    return redirect()->back()->with('success', 'Category Added');
   }
   public function edit(Request $reqeust, $id){

      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
     $data['category'] = Category::where('id',$id)->first();
     return view('admin.categories.edit',$data);

   }
   public function update(Request $request , $id){

    $update = Category::where('id',$id)->first();
        
      $request->validate([
         'title' => 'required|max:255',
         'description' => 'max:255',
         'meta_keywords' => 'max:255',
         'meta_description' => 'max:255',
         'status' => 'required',
         'image' => $request->hasFile('image') ? 'required' : '',
         'icon_image' => $request->hasFile('icon_image') ? 'required' : '', 
     ]);
     
        $update->title = $request->title; 
        $update->slug = Str::slug($request->title, '-');
        $update->description = $request->description;
        $update->meta_keywords = $request->meta_keywords; 
        $update->meta_description = $request->meta_description; 
       
        $image_name = '';
        
        if($request->hasFile('image'))
        {
            @unlink(public_path('/assets/media/category/image/'.$update->image));
            $image = $request->file('image');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/category/image'), $image_name);
            
        }
        else
        {
            $image_name = $request->image; 
        }
        
        $update->image = $image_name;
        
         $icon_image_name = '';
        if($request->hasFile('icon_image'))
        {
            @unlink(public_path('/assets/media/category/icon/'.$update->icon_image));
            $image = $request->file('icon_image');
            $icon_image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/category/icon'), $icon_image_name);
            
        }
        else
        {
            $icon_image_name = $request->icon_image; 
        }
        
        // dd($update->icon_image,$icon_image_name);
         $update->icon_image = $icon_image_name;
         $update->status = $request->status;
         $update->save();
    
    return redirect()->route('categories')->with('success', 'Category Updated');
    
         

   }
   public function selecteddelete(Request $request){
    if(count($request->catid)>0){
        for($i=0;$i<count($request->catid);$i++){
             $delete = Category::where('id',$request->catid[$i])->first();

     if(!empty($delete)){

        $subCategory = SubCategory::where('category_id',$request->catid[$i])->get();
        if(!empty($subCategory)){
            foreach($subCategory as $sc){
              
                @unlink(public_path('/assets/media/sub-category/image/'.$sc->image));
                @unlink(public_path('/assets/media/sub-category/icon/' .$sc->icon_image));      
            }
            $validate = SubCategory::where('category_id',$request->catid[$i])->delete();
        }
            
            $delete->delete();
            @unlink(public_path('/assets/media/category/category' . $delete->image));
            @unlink(public_path('/assets/media/category/icon' . $delete->icon_image));
          
     }
        }
          return 1;
    }
    return 0;
   }
   public function delete(Request $request){
     $delete = Category::where('id',$request->id)->first();

     if(!empty($delete)){

        $subCategory = SubCategory::where('category_id',$request->id)->get();
        if(!empty($subCategory)){
            foreach($subCategory as $sc){
              
                @unlink(public_path('/assets/media/sub-category/image/'.$sc->image));
                @unlink(public_path('/assets/media/sub-category/icon/' .$sc->icon_image));      
            }
            $validate = SubCategory::where('category_id',$request->id)->delete();
        }
            
            $delete->delete();
            @unlink(public_path('/assets/media/category/category' . $delete->image));
            @unlink(public_path('/assets/media/category/icon' . $delete->icon_image));
          
     }
     return 1;
   }

}
