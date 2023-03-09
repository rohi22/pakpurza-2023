<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Paymentsetting;

use Auth;


class PaymentsettingController extends Controller
{
     
   public function index(){
       
       $data['menu'] = 'paymentpanelmenu';
       $data['submenu'] = 'paymentpanelsubmenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
         
     $data['paymentsetting'] = Paymentsetting::latest()->paginate(10);
     
     
     return view('admin.paymentsetting.index',$data);
     
   }

 



  public function update(Request $request){
      
 
        for($i= 0;$i<count($request->field_id);$i++){
              
               $update = Paymentsetting::where('id',$request->field_id[$i])->first();
               $update->status = $request->field_status[$i]; 
               $update->save();
          
        }
        
        
        return redirect()->back()->with('success', 'Payment Setting Updated');
        
  }


}
