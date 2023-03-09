<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Faqcategory;


use Auth;


class FaqcategoryController extends Controller
{
     
   public function index(){
       $data['menu'] = 'cmsmenu';
       $data['submenu'] = 'faqcategorymenu';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
     $data['faqcategory'] = Faqcategory::latest()->paginate(10);
     return view('admin.faqcategory.index',$data);
     
   }

   public function create(){

          $data['menu']  = 'cmsmenu';
         $data['submenu']  = 'faqcategorymenu';
         
         $data['submenulevel1'] = '';
       $data['submenusub'] = '';
         
        return view('admin.faqcategory.create',$data);
   }

   public function store(Request $request){
    
     $request->validate([
         'title' => 'required|max:255',
         'status' => 'required',
         
     ]);

  
     $store = new Faqcategory();
     $store->title = $request->title;
     $store->slug = Str::slug($request->title, '-');
     $store->status = $request->status; 
     $store->save();
    
     return redirect()->back()->with('success', 'Faq Category Added');
     
   }



   public function edit(Request $reqeust, $id){
       
        //  $menu = 'faqcategorymenu';
        //  $submenu = 'faqcategorysubmenu';
         
         
       $data['menu'] = 'cmsmenu';
       $data['submenu'] = 'faqcategorymenu';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
         
         
     $data['faqcategory'] = Faqcategory::where('id',$id)->first();

     return view('admin.faqcategory.edit',$data);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
     $update = Faqcategory::where('id',$id)->first();
     $update->title = $request->title;
     $update->slug = Str::slug($request->title, '-');
     $update->status = $request->status; 
     $update->save();
    
     return redirect()->route('admin/faq-category')->with('success', ' Faq Category Updated');

   }


   public function delete(Request $request){
    
    
     $delete = Faqcategory::where('id',$request->id)->first();
     if(!empty($delete)){
            $delete->delete();
     }
     return 1;
     
   }

   
    



}
