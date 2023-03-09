<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attributes;


use App\Models\RegisterSetting;


use Image;
use Auth;


class RegistersettingController extends Controller
{
     
   public function index(){
       
      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
       $data['setting'] = RegisterSetting::latest()->paginate(10);
       return view('admin.registersetting.index',$data);
   }
   
   
   
   
   
   public function registration_setting_status(Request $request){
            $id = $request->id;
            $status = $request->val;
            
            $edit = RegisterSetting::where('id', $id)->first();
            $edit->status = $status;
            $edit->save();
            
            return 1;
       
   }
   
   
   
   

}
