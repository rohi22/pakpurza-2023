<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Bannersetting;
use App\Models\User;
use Image;
use Auth;


class BannersettingController extends Controller
{
     
   public function index(){
      $data['menu'] = 'controlpanelmenu';
      $data['submenu'] = 'controlpanelsubmenu5';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
      
       $data['bannersetting'] = Bannersetting::latest()->join('page_list', 'page_list.id', 'banner_setting.page_id')
                                    ->paginate(10,['banner_setting.*','page_list.page_title']);
      
      return view('admin.bannersetting.index',$data);
   }
   
   
   public function edit(Request $reqeust, $id){

      $data['menu'] = 'controlpanelmenu';
      $data['submenu'] = 'controlpanelsubmenu5';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['bannersetting'] = Bannersetting::join('page_list', 'page_list.id', 'banner_setting.page_id')
                                    ->where('banner_setting.id', $id)
                                    ->first(['banner_setting.*','page_list.page_title']);
     
      return view('admin.bannersetting.edit',$data);

   }
   public function update(Request $request , $id){
       
       
    $update = Bannersetting::where('id',$id)->first();
      
      
       $image_name = '';
        
        if($request->has('image'))
        {
            @unlink(public_path('/assets/media/bannersetting/'.$update->banner_image));
            $image = $request->file('image');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/bannersetting/'), $image_name);
            
        }
        else
        {
            $image_name =$update->banner_image; 
        }
        
        $update->banner_image = $image_name;
        
     
        
        $update->save();
    
        return redirect()->route('banner-setting')->with('success', 'Bids Setting Updated');
   }
   

}
