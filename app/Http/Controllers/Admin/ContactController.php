<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactus;
use App\Models\UserLogs;
use Auth;


class ContactController extends Controller
{
     
   public function index(){
       
       $data['menu'] = 'wishmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
     $data['contact'] = Contactus::latest()->paginate(10);
     return view('admin.contact.index',$data);
     
     
   }
   
   
   
    public function deleteall(Request $request){
       if(count($request->contact_id)>0){
           for($i=0;$i<count($request->contact_id);$i++){
                $contact = Contactus::where('id',$request->contact_id[$i])->first();


 

     if(!empty($contact)){

        
            $contact->delete();
             
        
     }
           }
           return 1;
       }else{
           return 0;
       }
        
   }

   


 public function userlogs(){
     
       $data['menu'] = 'userlogsmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       $data['userLogs'] = UserLogs::latest()->join('users', 'users.id', 'user_logs.user_id')->paginate(10,['user_logs.*','users.name as username']);
     
     
     return view('admin.userlogs.index',$data);
     
     
   }
   
    



}
