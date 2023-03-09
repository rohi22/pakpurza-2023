<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Faq;
use App\Models\Faqcategory;


use Illuminate\Support\Str;

class FaqsController extends Controller
{



    public function index(){
        
        $data['menu'] = 'cmsmenu';
        $data['submenu'] = 'cmssubmenu8';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';

        $data['faqs'] = Faq::latest()->orderBy('created_at','DESC')->paginate(10);
        return view('admin/faqs/all-faqs',$data);

    }




    public function create(){
         $data['menu'] = 'cmsmenu';
         $data['submenu'] = 'cmssubmenu8';
           $data['submenulevel1'] = '';
      $data['submenusub'] = '';

        $data['faq_cat'] = Faqcategory::all();  
        return view('admin/faqs/create-faq',$data);

    }



    public function saveFaq(Request $r){


        $store = new Faq();
        $store->question = $r->q;
        $store->answer = $r->a;
        $store->slug = Str::slug($r->q, '-');
        $store->category_id =$r->category_id;
        
        $store->save();

     
   return redirect()->route('admin/all-faqs')->with('success','Added Successfully');
    // return redirect()->back()->with('success','Added Successfully');
    


    }

     public function delete(Request $r){
    
    
    $delete = Faq::where('id',$r->id)->first();
    $delete->delete();
     
     
  return 1;

    }


    public function edit($id){

         $data['menu'] = 'cmsmenu';
         $data['submenu'] = 'cmssubmenu8';
           $data['submenulevel1'] = '';
      $data['submenusub'] = '';
    // $data['faq_cat'] = FaqCategory::all();  
    $data['faq_cat'] = Faqcategory::all();  
    $data['faq'] = Faq::findorfail($id);
    return view('admin/faqs/edit-faq',$data);
    
  }


    public function update(Request $r,$id){


        $update = Faq::where('id',$id)->first();
     
        $update->question = $r->q;
        $update->answer = $r->a;
        $update->slug = Str::slug($r->q, '-');
        $update->category_id =$r->category_id;
        $update->save();
        
        return redirect()->route('admin/all-faqs')->with('success','Update Successfully');


  }






}
