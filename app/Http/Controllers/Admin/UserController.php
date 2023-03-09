<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Map;
use Mail;
use App\Models\SmsApi;
use DB;
use App\Models\VerificationCode;
use App\Models\SocialAccount;

class UserController extends Controller
{
    
    public function userWallet()
    {
        $data['menu'] = 'userwallet';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        
        $data['User'] = User::latest()->where('users.role_id', 1)
                            ->where('users.deleted_at', null)
                            ->where('users.password', '!=', NULL)
                            // ->join('user_wallets', 'user_wallets.user_id', 'users.id')
                            // ->select(DB::raw('(SUM(debit) - SUM(credit)) AS balance'))
                            ->paginate(10,['users.*']);
        
        return view('admin.users.user-wallet',$data);
    }
    
     
    public function index(){

         $User = User::all();
        
           $data['menu'] = 'usermenu';
           $data['submenu'] = '';
           $data['submenulevel1'] = '';
           $data['submenusub'] = '';
       
         $data['User'] = User::latest()->where('role_id', 1)
                            ->where('deleted_at', null)
                            ->where('password', '!=', NULL)
                            ->paginate(10,['users.*']);

        $data['user_filter'] = User::where('role_id', 1)
                            ->where('deleted_at', null)
                            ->where('password', '!=', NULL)
                            ->get();
         
         return view('admin.users.index',$data);
         
    }
    
    public function userFilter(Request $request)
    {
        $data['menu'] = 'usermenu';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
           
        $data['user_filter'] = User::where('role_id', 1)
                            ->where('deleted_at', null)
                            ->where('password', '!=', NULL)
                            ->get();
                            
        $user = User::orderBy('id', 'desc');
        
        if(!empty($request->user_id)){
            $user = $user->where('id', $request->user_id);
        }
        
        if(!empty($request->user_name)){
            $user = $user->where('name', $request->user_name);
        }
        
        if(!empty($request->user_email)){
            $user = $user->where('email', $request->user_email);
        }
        
        if(!empty($request->user_number)){
            $user = $user->where('phone', $request->user_number);
        }
        
        $data['User'] = $user->paginate(10,['users.*']);;
        
        return view('admin.users.index',$data);
        
        dd($request->user_id);
    }
    
   
    public function create(){

        return view('admin.users.create');
   }

   public function store(Request $request){
    
     
    
     return redirect()->back()->with('success', 'User Added');
     
   }



   public function edit(Request $reqeust, $id){

           $data['menu'] = 'usermenu';
           $data['submenu'] = '';
           $data['submenulevel1'] = '';
           $data['submenusub'] = '';
           
     $data['user'] = User::where('id',$id)->first();
     $data['map'] = Map::where('id',$data['user']->map_id)->first();
     
    //  dd($user);
     return view('admin.users.edit',$data);

   }
   
   
   
    public function view(Request $reqeust, $id){

     $user = User::where('id',$id)->first();
     
    //  dd($user);
     return view('admin.users.view',compact('user'));

   }
    
    
   
  
   
   public function update(Request $request , $id)
   {
       
       
       $update = User::find($id);
        
       if($request->location){
           
             $store = new Map();
             $store->user_id = $id;
             $store->country = $request->country;
             $store->state = $request->state;
             $store->city = $request->city;
             $store->lati = $request->lati;
             $store->lon = $request->long; 
             $store->address = $request->address; 
             $store->save();
             
             $map_id = $store->id;
     
           
       }
       else{
           
           $map_id = $update->map_id;
       }
    
    
    
       
    //   $request->validate([
    //      'title' => 'required|max:255',
    //      'description' => 'max:255',
    //      'meta_keywords' => 'max:255',
    //      'meta_description' => 'max:255',
    //      'status' => 'required',
    //      'image' => 'required',
    //      'icon_image' => 'required', 
    //  ]);
    
        $update->name = $request->name;
        $update->address = $request->address;
        $update->facebook_link = $request->facebook_link;
        $update->google_link = $request->google_link;
        $update->twitter_link = $request->twitter_link;
        $update->linkedIn_link = $request->linkedIn_link;
        $update->skype_link = $request->skype_link;
        $update->about_me = $request->about_me;
        
        $update->father_name = $request->father_name;
        $update->cnic = $request->cnic;
        $update->date_of_birth = $request->date_of_birth;
        $update->place_of_birth = $request->place_of_birth;
        $update->employment_status = $request->employment_status;
        $update->gender = $request->gender;
        $update->map_id = $map_id;
        
        
        // $update->name = $request->name; 
        // $update->email = $request->email;
        // $update->phone = $request->phone; 
        // $update->address = $request->address;
        // $update->about_me = $request->about_me;
        // $update->facebook_link = $request->facebook_link;
        // $update->google_link = $request->google_link;
        // $update->twitter_link = $request->twitter_link;
        // $update->linkedIn_link = $request->linkedIn_link;
        // $update->skype_link = $request->skype_link;
       
        $image_name = '';
        
        if($request->has('profile_pic'))
        {
            @unlink(public_path('/asset/images/profilepic/'.$update->profile_pic));
            $image = $request->file('profile_pic');
            $image_name = time(). $image->getClientOriginalName();
            $image->move(public_path('/asset/images/profilepic/'), $image_name);
            
        }
        else
        {
            $image_name = $update->profile_pic; 
        }
        
        $image_name_banner = '';
        
        if($request->has('profile_banner'))
        {
            @unlink(public_path('/asset/images/profilepic/'.$update->profile_banner));
            $image = $request->file('profile_banner');
            $image_name_banner = time(). $image->getClientOriginalName();
            $image->move(public_path('/asset/images/profilepic/'), $image_name_banner);
            
        }
        else
        {
            $image_name_banner = $update->profile_banner; 
        }
        
        
            $update->profile_pic = $image_name;
            $update->profile_banner = $image_name_banner;
            $update->save();
            
            
      return redirect('user-list')->with('success', 'User Updated');

   }


   public function delete(Request $request){
     

     $delete = User::where('id',$request->id)->first();

     if(!empty($delete)){

            
            $delete->delete();
            // @unlink(public_path('/assets/media/category/category' . $delete->image));
            // @unlink(public_path('/assets/media/category/icon' . $delete->icon_image));
              
          
     }
     

     return 1;

   }
   
   public function deleteall(Request $request){
       if(count($request->user_id)>0){
           for($i=0;$i<count($request->user_id);$i++){
                $user = User::where('id',$request->user_id[$i])->first();


 

     if(!empty($user)){

        
            $user->delete();
             
        
     }
           }
           return 1;
       }else{
           return 0;
       }
        
   }




public function change_user_status(Request $request){
        
        $id = $request->id;
        $approve = $request->val;
        $edit = User::where('id', $id)->first();
        $edit->is_active = $approve;
        $edit->save();
        
        
        if($approve == 1 ){
              if(!empty($edit->email)){
               
                 $email_data = [
                       
                        'user_name' => $edit->name,
                        'email' =>$edit->email,
                        'via' => 'EMAIL', 
                        'source' => $edit->email,
                    ];
              Mail::send('emails.admin.user-ban', $email_data, function($message) use ($email_data)
                        {
                            $message->subject('Your Account Banned on simsar.com');
                            $message->to($email_data['email'], $email_data['user_name']);
                        });
                        return['status'=>'success'];
              }
           elseif(!empty($edit->phone)){

            //SMS
            $sms = SmsApi::first();

            $to         = $edit->phone;
            $msg        = 'Your simsar account has been '.$action.' by Simsar.com ';
            
            $url = "https://www.smsbox.com/SMSGateway/Services/Messaging.asmx/Http_SendSMS?username=".$sms->username."&password=".$sms->password."&customerId=".$sms->customerId."&senderText=".$sms->senderText."&messageBody=".$msg."&recipientNumbers=".$to."&defdate=&isBlink=false&isFlash=false";
            $sorted_url = preg_replace("/ /", "%20", $url);
            file_get_contents($sorted_url);

        }
        }
       
        if($approve == 0)  {
        if(!empty($edit->email)){
          
            //Email
                    $email_data = [
                        'user_name' => $edit->name,
                        'email' =>$edit->email,
                        'via' => 'EMAIL', 
                        'source' => $edit->email,
                    ];
              Mail::send('emails.admin.user-unban', $email_data, function($message) use ($email_data)
                        {
                            $message->subject('Your Account Unbanned on simsar.com');
                            $message->to($email_data['email'], $email_data['user_name']);
                        });
                        return['status'=>'success'];
        }
        
        elseif(!empty($edit->phone)){

            //SMS
            $sms = SmsApi::first();

            $to         = $edit->phone;
            $msg        = 'Your simsar account has been '.$action.' by Simsar.com ';
            
            $url = "https://www.smsbox.com/SMSGateway/Services/Messaging.asmx/Http_SendSMS?username=".$sms->username."&password=".$sms->password."&customerId=".$sms->customerId."&senderText=".$sms->senderText."&messageBody=".$msg."&recipientNumbers=".$to."&defdate=&isBlink=false&isFlash=false";
            $sorted_url = preg_replace("/ /", "%20", $url);
            file_get_contents($sorted_url);

        }
       
        }
        
       
    }

//  public function change_user_status(Request $request){
        
//         $id = $request->id;
//         $approve = $request->val;
//         $edit = User::where('id', $id)->first();

//         $edit->is_active = $approve;
//         $edit->save();

//         if($approve == 1 )
        
//         { $action = 'actived'; }
        
//         elseif($approve == 0)
        
//         { $action = 'deactived'; }
        
        

//         if(!empty($edit->email)){
          
//             //Email

//             $data = [
//                 'full_name' => $edit->name,
//                 'email' => $edit->email,
//                 'action' => $action, 
//             ];


//             Mail::send('emails.account-status', $data, function($message) use ($data) {
//                 $message->subject('Account Status Changed');
//                 $message->to($data['email'], $data['full_name']);
//             });
//         }
        
//         elseif(!empty($edit->phone)){

//             //SMS
//             $sms = SmsApi::first();

//             $to         = $edit->phone;
//             $msg        = 'Your simsar account has been '.$action.' by Simsar.com ';
            
//             $url = "https://www.smsbox.com/SMSGateway/Services/Messaging.asmx/Http_SendSMS?username=".$sms->username."&password=".$sms->password."&customerId=".$sms->customerId."&senderText=".$sms->senderText."&messageBody=".$msg."&recipientNumbers=".$to."&defdate=&isBlink=false&isFlash=false";
//             $sorted_url = preg_replace("/ /", "%20", $url);
//             file_get_contents($sorted_url);

//         }
//         else{
            
//             return [
//                 'status' => 'error',
//             ];
//         }

//         return [
//             'status' => 'success',
//         ];
//     }


    public function generatePassword(Request $request){
        
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        
        $verificationCode = rand(100000, 999999);
        
        VerificationCode::create([
            'verification_code' => $verificationCode,
            'verification_type' => 'admin',
            'user_id' => $user_id,
        ]);

        if(!empty($user->email)){
            $url = url('password-via-email/'.base64_encode($verificationCode));
            //Send Email
            $data = [
                'email' => $user->email,
                'full_name' => $user->name,
                'url' => $url,
            ];

            Mail::send('emails.admin-password-reset', $data, function($message) use ($data) {
                $message->subject('Reset Password - Simsar.com');
                $message->to($data['email'], $data['full_name']);
                // $message->bcc($data['email'], $data['full_name']);
            });

            return [
                'status' => 'success',
                'url' => $url,
            ];
        }
        elseif(!empty($user->phone)){

            $urll = url('password-via-phone/'.$verificationCode);
            $sms = SmsApi::first();

            $to         = $user->phone;
            $msg        = 'HI, Click on this link to reset password. '.$urll;
            
            $url = "https://www.smsbox.com/SMSGateway/Services/Messaging.asmx/Http_SendSMS?username=".$sms->username."&password=".$sms->password."&customerId=".$sms->customerId."&senderText=".$sms->senderText."&messageBody=".$msg."&recipientNumbers=".$to."&defdate=&isBlink=false&isFlash=false";
            $sorted_url = preg_replace("/ /", "%20", $url);
            file_get_contents($sorted_url);


            return [
                'status' => 'success',
                'url' => $urll,
            ];

        }
        
    }

    public function socialAccounts(Request $request){
        $accounts = SocialAccount::where('user_id', $request->user_id)->get('social_accounts.*');
        return view('admin.users.social-accounts',compact('accounts'));
        
    }
    
    public function blockUser($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->is_ban = 1;
         $user->is_active = 0;
        $user->is_block_count = 5;
        $user->save();
        
        return redirect()->back()->with('success', 'User Successfully Blocked');
    }
    
    public function unBlockUser($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->is_ban = 0;
         $user->is_active = 1;
        $user->is_block_count = 0;
        $user->save();
        
        return redirect()->back()->with('success', 'User Successfully Unblocked');
    }
    
}
