<?php

namespace App\Http\Controllers\Admin;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DevelopersettingController extends Controller
{
    
    public function create()
    {
        $data['menu'] = 'webmenu';
        $data['submenu'] = 'websubmenu6';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        
        $data['websetting'] = WebSetting::where('id', 1)->first();
        
        return view('admin.developer-mode.create', $data);
    }
    
    public function save(Request $request)
    {
        $developerMode =  WebSetting::where('id', 1)->first();
        $developerMode->developer_title = $request->title;
        $developerMode->developer_tag_line = $request->tag_line;
        $developerMode->developer_description = $request->description;
        $developerMode->is_developer_mode = $request->status;
        
        $image_name = '';
        
        if($request->has('image')){
            @unlink(public_path('/assets/media/developer-mode/'. $developerMode->developer_image));
            $image = $request->file('image');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/developer-mode/'), $image_name);
        }
        else{
            $image_name =$developerMode->developer_image; 
        }
        
        $developerMode->developer_image = $image_name;
        $developerMode->save();
        
        if($developerMode->is_developer_mode == 1){
            \Session::flash('success', 'Developer mode is on.');
        }else{
            \Session::flash('success', 'Developer mode is off.');
        }
        
        return redirect()->back();
    }
}