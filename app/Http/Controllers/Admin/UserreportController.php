<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\UserAdReport;
use App\Models\SellNow;
use App\Models\User;

use App\Models\Usersetting;
use App\Models\Useremailsetting;
use App\Models\Usersmssetting;
use App\Models\Userpushsetting;


use Image;
use Auth;


class UserreportController extends Controller
{
     
   public function index(){
       
      $data['menu'] = 'controlpanelmenu';
      $data['submenu'] = 'controlpanelsubmenu4';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['userAdReport'] = UserAdReport::latest()->paginate(10);
      return view('admin.userreport.index',$data);
   }
   
   
   
   

 public function change_report_status(Request $request){
     
      $id = $request->id;
      $status = $request->val;
      $reasnContent = $request->reasnContent;
      
      if($status == 1){
        //   Deactivate User
          
           $edit = UserAdReport::where('id', $id)->first();
           $edit->user_report_reason = $reasnContent;
           $edit->action_status = $status;
           $edit->save();
           
           $editsellNow = SellNow::where('id', $edit->ad_id)->first();
           
           $edituser = User::where('id', $editsellNow->user_id)->first();
           $edituser->is_active = 2;
           $edituser->save();
        //   
           
           
        $userdetail = User::where('id',$edituser->id)->first();
        $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
        $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

            if($useremailsetting->user_account_alerts == 1){
                
                  $data = [
                     'full_name' => $userdetail->name, 
                     'email' => 'info@simsar.com',
                     'verification_code' => '12345', 
                     'via' => 'EMAIL', 
                     'source' => $userdetail->email, 
                     'subject' => 'Your account Deactivate on simsar.com', 
                     ];
            
                    $goto = new  \App\Http\Controllers\HomeController();
                    $view = "emails.reset-password";
                    $goto->sendEmail($view, $data);
                    
            }
        
      

                if($usersmssetting->user_account_alerts == 1){
                    if($userdetail->phone){
                            $to = $userdetail->phone;
                            $msg = 'HI, Your account Deactivate on simsar';
                            $goto = new  \App\Http\Controllers\HomeController();
                            $goto->sendSMS($to, $msg);
                    }
                }
            
           
           
           
        //   
      }
      else if($status == 2){
        //   Ban User
          
           $edit = UserAdReport::where('id', $id)->first();
           $edit->user_report_reason = $reasnContent;
           $edit->action_status = $status;
           $edit->save();
           
           
           $editsellNow = SellNow::where('id', $edit->ad_id)->first();
           
           $edituser = User::where('id', $editsellNow->user_id)->first();
           $edituser->is_ban = 1;
           $edituser->save();
           
           
               
        $userdetail = User::where('id',$edituser->id)->first();
        $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
        $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

            if($useremailsetting->user_account_alerts == 1){
                
                  $data = [
                     'full_name' => $userdetail->name, 
                     'email' => 'info@simsar.com',
                     'verification_code' => '12345', 
                     'via' => 'EMAIL', 
                     'source' => $userdetail->email, 
                     'subject' => 'Your account has been ban on simsar.com', 
                     ];
            
                    $goto = new  \App\Http\Controllers\HomeController();
                    $view = "emails.reset-password";
                    $goto->sendEmail($view, $data);
                    
            }
        
      

                if($usersmssetting->user_account_alerts == 1){
                    if($userdetail->phone){
                            $to = $userdetail->phone;
                            $msg = 'HI,Your account has been ban on simsar';
                            $goto = new  \App\Http\Controllers\HomeController();
                            $goto->sendSMS($to, $msg);
                    }
                }
            
           
           
           
          
      }
      else if($status == 3){
        //   Ban User & Deactivate Post
        
        
           $edit = UserAdReport::where('id', $id)->first();
           $edit->user_report_reason = $reasnContent;
           $edit->action_status = $status;
           $edit->save();
           
           $editsellNow = SellNow::where('id', $edit->ad_id)->first();
           $editsellNow->is_approve = 2;
           $editsellNow->save();
           
           
           $edituser = User::where('id', $editsellNow->user_id)->first();
           $edituser->is_ban = 1;
           $edituser->save();
           
           
                
        $userdetail = User::where('id',$edituser->id)->first();
        $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
        $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

            if($useremailsetting->user_account_alerts == 1){
                
                  $data = [
                     'full_name' => $userdetail->name, 
                     'email' => 'info@simsar.com',
                     'verification_code' => '12345', 
                     'via' => 'EMAIL', 
                     'source' => $userdetail->email, 
                     'subject' => 'Your account has been ban and post deactivate on simsar.com', 
                     ];
            
                    $goto = new  \App\Http\Controllers\HomeController();
                    $view = "emails.reset-password";
                    $goto->sendEmail($view, $data);
                    
            }
        
      

                if($usersmssetting->user_account_alerts == 1){
                    if($userdetail->phone){
                            $to = $userdetail->phone;
                            $msg = 'HI,Your account has been ban and post deactivateon simsar';
                            $goto = new  \App\Http\Controllers\HomeController();
                            $goto->sendSMS($to, $msg);
                    }
                }
            
           
           
          
          
      }
      else if($status == 4){
        //   Post Deactivate
        
        
           $edit = UserAdReport::where('id', $id)->first();
           $edit->user_report_reason = $reasnContent;
           $edit->action_status = $status;
           $edit->save();
           
           $editsellNow = SellNow::where('id', $edit->ad_id)->first();
           $editsellNow->is_approve = 2;
           $editsellNow->save();
           
           
           
           
           
                
        $userdetail = User::where('id',$editsellNow->user_id)->first();
        $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
        $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

            if($useremailsetting->ad_deacivation_alerts == 1){
                
                  $data = [
                     'full_name' => $userdetail->name, 
                     'email' => 'info@simsar.com',
                     'verification_code' => '12345', 
                     'via' => 'EMAIL', 
                     'source' => $userdetail->email, 
                     'subject' => 'Your post deactivate on simsar.com', 
                     ];
            
                    $goto = new  \App\Http\Controllers\HomeController();
                    $view = "emails.reset-password";
                    $goto->sendEmail($view, $data);
                    
            }
        
      

                if($usersmssetting->ad_deacivation_alerts == 1){
                    if($userdetail->phone){
                            $to = $userdetail->phone;
                            $msg = 'HI,Your post deactivateon simsar';
                            $goto = new  \App\Http\Controllers\HomeController();
                            $goto->sendSMS($to, $msg);
                    }
                }
            
           
           
          
          
      }
      else if($status == 5){
        //   Delete Post
          
          $edit = UserAdReport::where('id', $id)->first();
          $edit->user_report_reason = $reasnContent;
          $edit->action_status = $status;
           $edit->save();
           
          $editsellNow = SellNow::where('id', $edit->ad_id)->first();
          $editsellNow->delete();
          
          
                    
        $userdetail = User::where('id',$editsellNow->user_id)->first();
        $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
        $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 
 
          if($useremailsetting->ad_deacivation_alerts == 1){
                
                  $data = [
                     'full_name' => $userdetail->name, 
                     'email' => 'info@simsar.com',
                     'verification_code' => '12345', 
                     'via' => 'EMAIL', 
                     'source' => $userdetail->email, 
                     'subject' => 'Your post deleted on simsar.com', 
                     ];
            
                    $goto = new  \App\Http\Controllers\HomeController();
                    $view = "emails.reset-password";
                    $goto->sendEmail($view, $data);
                    
            }
        
      

                if($usersmssetting->ad_deacivation_alerts == 1){
                    if($userdetail->phone){
                            $to = $userdetail->phone;
                            $msg = 'HI,Your post deleted simsar';
                            $goto = new  \App\Http\Controllers\HomeController();
                            $goto->sendSMS($to, $msg);
                    }
                }
            
          
      }
       else if($status == 6){
        //   ignore report
        
         $edit = UserAdReport::where('id', $id)->first();
         $edit->user_report_reason = $reasnContent;
         $edit->status = 2;
         $edit->action_status = $status;
         $edit->save();
          
      }
        
        return ['status' => 'success'];    
        
        
 }
   
   
   

}
