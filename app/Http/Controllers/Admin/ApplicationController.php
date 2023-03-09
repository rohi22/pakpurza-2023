<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplicationSlider;



class ApplicationController extends Controller
{
     
    public function index(){
        
        $data['menu'] = 'applicationmenu';
       $data['submenu'] = 'applicationmenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';

        $data['sliders'] = ApplicationSlider::latest()->paginate(10);
        return view('admin.applicationsliders.index',$data);
    }


    public function create(){

  $data['menu'] = 'applicationmenu';
       $data['submenu'] = 'applicationmenu2';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
        return view('admin.applicationsliders.create',$data);
    }


    public function store(Request $request){
      
        $request->validate([
            'slider' => 'required|mimes:jpeg,jpg,png',
            'status' => 'required',
        ]);

        $store = new ApplicationSlider();

        $slider_name = '';
        if ($request->hasFile('slider')) {
          $slider = $request->file('slider');
          $slider_name = time() . $slider->getClientOriginalName();
          $slider->move(public_path('/assets/media/applicationslider'), $slider_name);
        } 
        $store->slide  = $slider_name;
        $store->status = $request->status;
         $store->back_link = $request->back_link;
         $store->image_alt = $request->image_alt;
        $store->save();

        return redirect()->back()->with('success', 'Application Slide Added');

    }   


    public function edit(Request $request, $id){
        
           $data['menu'] = 'applicationmenu';
       $data['submenu'] = 'applicationmenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       

        $data['slide'] = ApplicationSlider::where('id', \Crypt::decrypt($id))->first();
        return view('admin.applicationsliders.edit',$data);
        
    }


    public function update(Request $request, $id){

        $request->validate([
            // 'slider' => 'required|mimes:jpeg,jpg,png',
            'status' => 'required',
        ]);

        $edit = ApplicationSlider::where('id', $id)->first();

        $slider_name = '';
        if ($request->hasFile('slider')) {
          @unlink(public_path('/assets/media/applicationslider/' . $edit->slide));
          $slider = $request->file('slider');
          $slider_name = time() . $slider->getClientOriginalName();
          $slider->move(public_path('/assets/media/applicationslider'), $slider_name);
        } else {
          $slider_name = $edit->slide;
        }
        $edit->slide  = $slider_name;

        $edit->status = $request->status;
        $edit->back_link = $request->back_link;
        $edit->image_alt = $request->image_alt;
        $edit->save();

        return redirect()->back()->with('success', 'Application Slide Updated');
    }


    public function delete(Request $request){
        $delete = ApplicationSlider::where('id',$request->id)->first();

         if(!empty($delete)){
    
              $delete->delete();
              @unlink(public_path('/assets/media/applicationslider/' . $delete->slide));
         }
         
    
         return 1;
    }


     public function deleteall(Request $request){
       if(count($request->sliders_id)>0){
           for($i=0;$i<count($request->sliders_id);$i++){
               
               $services = ApplicationSlider::where('id',$request->sliders_id[$i])->first();
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
