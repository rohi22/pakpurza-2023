<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Bumpupsetting;

use Auth;


class BumpsettingController extends Controller
{
     
   public function index(){
       $data['menu'] = 'controlpanelmenu';
       $data['submenu'] = 'controlpanelsubmenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
         
     $data['bumpupsetting'] = Bumpupsetting::latest()->paginate(10);
     return view('admin.bumpupsetting.index',$data);
     
   }

 



  public function update(Request $request){
      
 
        for($i= 0;$i<count($request->field_id);$i++){
              
               $update = Bumpupsetting::where('id',$request->field_id[$i])->first();
               $update->status = $request->field_status[$i]; 
               $update->save();
          
        }
        
        
        return redirect()->back()->with('success', 'BumUp Setting Updated');
        
  }


}
