<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Allattributes;
use App\Models\Sellnowfield;
use Illuminate\Support\Str;
use Auth;
use App\Models\AssignAttributeToBrand;
class AllattributesController extends Controller
{
     
   public function index(){
       
       $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       

     $data['attributes'] = Allattributes::latest()->paginate(10);
     
     return view('admin.allattributes.index',$data);
     
   }

   public function getBrandAttributes($brand_id){
       
       $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
     $data['attributes'] = AssignAttributeToBrand::join('all_attributes','all_attributes.id','attribute_id')
                   ->where('brand_id',$brand_id)
                   ->get();
     
     
     return view('admin.attributes.view-brand-attributes',$data);
       
   }
   
   public function editBrandAttributes($brand_id){
       $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = ''; 
     $data['attributes'] = Allattributes::where('id',$brand_id)->get();  
     /*echo "<pre>";
     print_r($data['attributes'][0]->id);die;*/
     return view('admin.attributes.edit-brand-attributes',$data);
   }
   
   public function deleteBrandAttributes(Request $request){
      $attribute_id =  $request->id;
      $data = array('brand_id'=>NULL);
      $res = AssignAttributeToBrand::where('attribute_id',$attribute_id)->update($data);
      return 1;
   }
   
   public function updateBrandAttributes(Request $request){
       
       $attribute_id = $request->input('attribute_id');
       $title        = $request->input('title');
       $description  = $request->input('description');
       $data         = array('title'=>$title,'description'=>$description);
       $attributes   = Allattributes::where('id',$attribute_id)->update($data);
       /*echo "<pre>";
       print_r($attributes);die;*/
       return redirect('/edit-brand-attributes/'.$attribute_id);
       
   }
   

   public function create(){  
    
     $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
      return view('admin.allattributes.create',$data);
   }

   public function store(Request $request){
   
    //  $request->validate([
    //      'title' => 'required|max:255',
    //      'category_id' => 'required',
    //      'sub_category_id' => 'required',
    //      'type' => 'required',
    //      'status' => 'required',
     
    //  ]);

  
    //  for($i= 0;$i<count($request->title);$i++){
        
        $store = new Allattributes();
        $store->title = $request->title;
        $store->description = $request->description;
        $store->attribute_type_id = $request->type;
        $store->slug = Str::slug(strtolower($request->title), '-');
        $store->status = $request->status;
        $store->text_box_type = $request->text_box_type;
        $store->save();
          
        $ID = $store->id;
        
        $stores = new Sellnowfield();
        $stores->attributes_id = $ID;
        $stores->field_title = $request->title;
        $stores->save();
         
    // }

     return redirect()->back()->with('success', 'Attribute Added');
     
   }

   public function edit(Request $reqeust, $id){


       $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
     $data['attributes'] = Allattributes::where('id',$id)->first();

     return view('admin.allattributes.edit',$data);

   }



   public function update(Request $request, $id){

      $request->validate([
         'title' => 'required|max:255',
         'type' => 'required',
         'description' => 'max:255',
         'status' => 'required',
          
     ]);


     $update = Allattributes::where('id',$id)->first();
     
        $update->title = $request->title;
        
        $update->description = $request->description;
        $update->attribute_type_id = $request->type;
        $update->slug = Str::slug(strtolower($request->title), '-');
        $update->status = $request->status;
        $update->text_box_type = $request->text_box_type;
        
        $update->save();

        $updatess = Sellnowfield::where('attributes_id',$id)->first();
        $updatess->field_title = $request->title;
        $updatess->save();
        
     return redirect()->route('admin/attributes')->with('success', 'Attribute Updated');

   }

   public function delete(Request $request){

     $delete = Allattributes::where('id',$request->id)->first();

     if(!empty($delete)){ 
         
        //  $Propertydelete = Property::where('attribute_id',$request->id)->delete();
         $delete->delete();
     }
     return 1;

   }

    public function deleteall(Request $request){
       if(count($request->attribute_id)>0){
           for($i=0;$i<count($request->attribute_id);$i++){
               
               $services = Allattributes::where('id',$request->attribute_id[$i])->first();
               if(!empty($services)){

        
            
            $services->delete();
              
        
        
     }
               
               
           }
           return 1;
       }
       else{
           return 0;
       }
       
   }
    



}
