<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attributes;
use App\Models\AssignAttributeToBrand;
use App\Models\AssignAttributeToSubBrand;
use App\Models\Allattributes;

use App\Models\Property;
use Illuminate\Support\Str;
use Auth;


class AttributeController extends Controller
{
     
   public function index($id){
       /*echo $id;die;*/
      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
     $data['subCategory'] = SubCategory::where('id',$id)->first();
     
     $data['attributes'] = Allattributes::join('attributes','all_attributes.id','attributes.attributes_id')
                                        ->where('attributes.sub_category_id',$id)
                                        ->where('attributes.deleted_at',null)
                                        ->get(['attributes.*','all_attributes.title as att_title','all_attributes.attribute_type_id as att_id']);
                                        
         
    return view('admin.attributes.index',$data);                 
     
     
   }

   public function create($id){  
    
     $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
      $data['subCategory'] = SubCategory::where('id',$id)->first();
    
      
      $data['attributes'] = Allattributes::leftjoin('attributes', 'attributes.attributes_id', 'all_attributes.id')
                         ->orderBy('all_attributes.id', 'desc')
                        ->get(['all_attributes.*','attributes.id as attributes_status']);
                        
        
      return view('admin.attributes.create',$data);
   }

   public function store(Request $request){
   
   
        // dd($request->all());   
   
     $request->validate([
        //  'title' => 'required|max:255',
        //  'category_id' => 'required',
        //  'sub_category_id' => 'required',
        //  'type' => 'required',
         'addselected' => 'required',
     
     ]);

  
     for($i= 0;$i<count($request->addselected);$i++){
        
        $store = new Attributes();
        $store->attributes_id = $request->addselected[$i];
        // $store->description = $request->description[$i];
        $store->category_id = $request->category_id;
        $store->sub_category_id = $request->sub_category_id;
        // $store->attribute_type_id = $request->type[$i];
        // $store->slug = Str::slug(strtolower($request->title[$i]), '-');
        // $store->status = $request->status[$i];
        $store->save();
      
        
        
        
        
        
    }

     return redirect()->back()->with('success', 'Attribute Added');
     
   }

   public function edit(Request $reqeust, $id){

     $attributes = Attributes::where('id',$id)->first();

     return view('admin.attributes.edit',compact('attributes'));

   }



   public function update(Request $request, $id){

      $request->validate([
         'title' => 'required|max:255',
         'type' => 'required',
         'description' => 'max:255',
         'status' => 'required',
          
     ]);


     $update = Attributes::where('id',$id)->first();
     
     $update->title = $request->title;
     $update->description = $request->description;
     $update->status = $request->status;
     $update->attribute_type_id = $request->type;
     
    
     $update->save();

     return redirect('attributes/'.$update->sub_category_id)->with('success', 'Attribute Updated');


   }

   public function delete(Request $request){
     

     $delete = Attributes::where('id',$request->id)->first();

     if(!empty($delete)){ 
         
        //  $Propertydelete = Property::where('attribute_id',$request->id)->delete();
         $delete->delete();
     }
     return 1;


   }
   public function deleteall(Request $request){
       if(count($request->attrid)){
           for($i=0;$i<count($request->attrid);$i++){
              $delete = Attributes::where('id',$request->attrid[$i])->first();

                 if(!empty($delete)){ 
                     
                    //  $Propertydelete = Property::where('attribute_id',$request->id)->delete();
                     $delete->delete();
                 }  
           }
             return 1;
       }
   }
   
   public function getSubBrandAttributes($id){
       
         
       $data['menu'] = 'attributesdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
         
          $data['attributes'] = AssignAttributeToSubBrand::join('all_attributes', 'all_attributes.id', 'assign_attributes_to_brands.attribute_id')
                        //  ->orderBy('all_attributes.id', 'desc')
                        ->where('assign_attributes_to_brands.sub_brand_id',$id)
                        ->get(['assign_attributes_to_brands.*','all_attributes.title as attributesTitle']);
                        
                        
       
          return view('admin.attributes.view-subbrand-attributes',$data);
         
        //  dd($data['attributes']);
        
   }

   
   
   public function deleteSubBrandAttributes(Request $request){
      $attribute_id =  $request->id;
      $data = array('sub_brand_id'=>NULL);
      $res = AssignAttributeToSubBrand::where('id',$attribute_id)->update($data);
      return 1;
   }
    



}
