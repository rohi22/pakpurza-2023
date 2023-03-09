<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Models\SubCategory;
use App\Models\Attributes;
use App\Models\Allattributes;
use App\Models\Property;

use App\Models\Brand;
use App\Models\Adbrand;
use Auth;


class BrandsController extends Controller
{
     
   public function index(){
       $data['menu'] = 'brandmenu';
       $data['submenu'] = 'brandsubmenu';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       $data['allattributes'] = Allattributes::all();
        $data['brands'] = Brand::latest()->paginate(10);
     
     return view('admin.brands.index',$data);
     
   }
   public function create(){
       
       $data['menu'] = 'brandmenu';
       $data['submenu'] = 'brandsubmenu';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
         
        return view('admin.brands.create',$data);
   }
   public function store(Request $request){
    
     

$store = new Brand();
$store->title = $request->title;
$store->slug = Str::slug($request->title, '-');
$store->meta_title = $request->meta_title;
$store->meta_description = $request->meta_description;
$store->status = $request->status; 
 
     
     
     $image_name = '';
     if ($request->file('logo')) {
        //  dd('check');
          $image = $request->file('logo');
          $image_name = time().$image->getClientOriginalName();
          $image->move(public_path('/assets/media/brand/logo'), $image_name);
     }
     
     $store->image_logo = $image_name;



     $icon_image_name = '';
     if ($request->file('banner')) {
          $icon_image = $request->file('banner');
          $icon_image_name = time().$icon_image->getClientOriginalName();
          $icon_image->move(public_path('/assets/media/brand/banner'), $icon_image_name);
     }
     
     $store->image_banner = $icon_image_name;
     
     
     
     $third_image_name = '';
     if ($request->file('image')) {
          $icon_image = $request->file('image');
          $third_image_name = time().$icon_image->getClientOriginalName();
          $icon_image->move(public_path('/assets/media/brand/banner'), $third_image_name);
     }
     
     $store->image = $third_image_name;
     
     
     
     
     
     $store->save();
     return redirect()->back()->with('success', 'Brand Added');
     
   }
   public function edit(Request $reqeust, $id){

        //  $menu = 'brandmenu';
        //  $submenu = 'brandsubmenu';
         
          $data['menu'] = 'brandmenu';
       $data['submenu'] = 'brandsubmenu';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
     $data['brand'] = Brand::where('id',$id)->first();

     return view('admin.brands.edit',$data);

   }
   public function update(Request $request , $id){
       
        // dd($request);
      
       
    //   $update = Category::find($id);
    $update = Brand::where('id',$id)->first();
       
       
        
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
                $update->meta_title = $request->meta_title;
                $update->meta_description = $request->meta_description;
                
                       
        $image_name = '';
        
        // dd($request->request);
        
        if($request->has('logo'))
        {
           
            @unlink(public_path('/assets/media/brand/logo/'.$update->image_logo));
            $image = $request->file('logo');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/brand/logo'), $image_name);
            
        }
        else
        {
           
            $image_name =$update->image_logo; 
        }
        
        $update->image_logo = $image_name;
        
        
        
         $icon_image_name = '';
        if($request->has('banner'))
        {
            @unlink(public_path('/assets/media/brand/banner/'.$update->image_banner));
            $image = $request->file('banner');
            $icon_image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/brand/banner'), $icon_image_name);
            
        }
        else
        {
            $icon_image_name =$update->image_banner; 
        }
        
         $update->image_banner = $icon_image_name;
         
         
         
         
         
         
          $third_image_name = '';
        if($request->has('image'))
        {
            @unlink(public_path('/assets/media/brand/banner/'.$update->image));
            $image = $request->file('image');
            $third_image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/brand/banner'), $third_image_name);
            
        }
        else
        {
            $third_image_name =$update->image; 
        }
        
         $update->image = $third_image_name;
         
         
         
         
         
         
         $update->status = $request->status;
         $update->save();
    
   
    
    
    return redirect()->route('admin/types')->with('success', 'Brand Updated');
         

   }
   public function delete(Request $request){
     

     $delete = Brand::where('id',$request->id)->first();

     if(!empty($delete)){

          
            $delete->delete();
            @unlink(public_path('/assets/media/brand/logo/' . $delete->image_logo));
            @unlink(public_path('/assets/media/brand/banner/' . $delete->image_banner));
              
          
     }
     

     return 1;

   }
   public function subcategory_brands(Request $reqeust, $id){
// dd("aa");
       
       $data['menu'] = 'brandmenu';
       $data['submenu'] = 'brandsubmenu';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       $data['subCategory'] = SubCategory::where('id',$id)->first();
       
        $data['ad_brands'] = Brand::join('ad_brands','brands.id','ad_brands.brands_id')
                                        ->where('ad_brands.sub_category_id',$id)
                                        ->where('ad_brands.deleted_at',null)
                                        ->get(['ad_brands.*','brands.title as att_title']);
                                        
                    //  dd($data['ad_brands']);
       
       
    //   $data['brand'] = Brand::where('id',$id)->first();

       return view('admin.brands.subcategory-brand',$data);

   }


 public function sub_delete(Request $request){
     

     $delete = Adbrand::where('id',$request->id)->first();

     if(!empty($delete)){
            $delete->delete();
            // @unlink(public_path('/assets/media/brand/logo/' . $delete->image_logo));
            // @unlink(public_path('/assets/media/brand/banner/' . $delete->image_banner));
     }
     return 1;

   }
   public function sub_deleteall(Request $request){
     
       if(count($request->subcat_brandid)>0){
          
      for($i=0;$i<count($request->subcat_brandid);$i++){
          $delete = Adbrand::where('id',$request->subcat_brandid[$i])->first();

     if(!empty($delete)){
            $delete->delete();
            // @unlink(public_path('/assets/media/brand/logo/' . $delete->image_logo));
            // @unlink(public_path('/assets/media/brand/banner/' . $delete->image_banner));
     }
    
      }
       return 1;
       }
   }
   
   


}
