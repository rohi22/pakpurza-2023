<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;



class SliderController extends Controller
{
     
    public function index(){
        
       $data['menu'] = 'slidermenu';
       $data['submenu'] = 'slidermenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       $data['sliders'] = Slider::latest()->paginate(10);
      /* echo "<pre>";
       print_r($data['sliders']);die;*/
       return view('admin.sliders.index',$data);
    }


    public function create(){
        
       $data['menu'] = 'slidermenu';
       $data['submenu'] = 'slidermenu2';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';

        return view('admin.sliders.create',$data);
    }


    public function store(Request $request){
      
        $request->validate([
            'slider' => 'required|mimes:jpeg,jpg,png',
            'back_link' => 'max:255',
            'background_color' =>'required|max:255',
            'status' => 'required',
        ]);

        $store = new Slider();

        $slider_name = '';
        if ($request->hasFile('slider')) {
          $slider = $request->file('slider');
          $slider_name = time() . $slider->getClientOriginalName();
          //echo $slider_name;die;
          //echo public_path('/assets/media/slider');die;
          $slider->move(public_path('/assets/media/slider/').'/', $slider_name);
        } 
        
         $store->slider  = $slider_name;
        
        //$store->slider  = $request->imgName;

        
        $store->back_link = $request->back_link;
         $store->image_alt = $request->image_alt;
        $store->background_color = $request->background_color;
        $store->status = $request->status;
        $store->save();


        return redirect()->back()->with('success', 'Slide Added');

    }   


    public function edit(Request $request, $id){


       $data['menu'] = 'slidermenu';
       $data['submenu'] = 'slidermenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
        $data['slide'] = Slider::where('id', \Crypt::decrypt($id))->first();
        return view('admin.sliders.edit',$data);
    }


    public function update(Request $request, $id){

        $request->validate([
            // 'slider' => 'required|mimes:jpeg,jpg,png',
            'back_link' => 'max:255',
            'background_color' =>'required|max:255',
            'status' => 'required',
        ]);

        $edit = Slider::where('id',$id)->first();

        $slider_name = '';
        if ($request->hasFile('slider')) {
          @unlink(public_path('/assets/media/slider' . $edit->slider));
          $slider = $request->file('slider');
          $slider_name = time() . $slider->getClientOriginalName();
          $slider->move(public_path('/assets/media/slider'), $slider_name);
        } else {
          $slider_name = $edit->slider;
        }
        $edit->slider  = $slider_name;

        // $edit->slider  = $request->imgName;
        
        $edit->back_link = $request->back_link;
         $edit->image_alt = $request->image_alt;
        
        $edit->background_color = $request->background_color;
        $edit->status = $request->status;
        $edit->save();


        return redirect()->back()->with('success', 'Slide Updated');


    }


    public function delete(Request $request){
        $delete = Slider::where('id',$request->id)->first();

     if(!empty($delete)){

          $delete->delete();
          @unlink(public_path('/assets/media/category/slider' . $delete->slider));
     }
     

     return 1;
    }


     public function deleteall(Request $request){
       if(count($request->sliders_id)>0){
           for($i=0;$i<count($request->sliders_id);$i++){
               
               $services = Slider::where('id',$request->sliders_id[$i])->first();
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
