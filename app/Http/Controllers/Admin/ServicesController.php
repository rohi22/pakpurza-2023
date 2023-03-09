<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\PurchasesServices;
use App\Models\CoinWalletSetting;
use App\Models\User;
use App\Models\Usersetting;
use App\Models\Useremailsetting;
use App\Models\Usersmssetting;
use App\Models\Userpushsetting;

use Image;

use Auth;


class ServicesController extends Controller
{
     
   public function index(){
       
      $data['menu'] = 'packagemenu';
      $data['submenu'] = 'packageservicemenu2';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['services'] = Services::latest()->paginate(10);
      return view('admin.services.index',$data);
   }
   
   
   public function purchases(){
       
      $data['menu'] = 'purchasesmenu';
      $data['submenu'] = '';
      $data['submenulevel1'] = '';
      $data['submenusub'] = 'purchasessubmenu1';
      $data['plan'] = PurchasesServices::latest()->join('services','services.id','purchases_services.plan_id')->paginate(10,['purchases_services.*', 'services.title as plan_title']);
    // $data['plan'] = PurchasesServices::latest()->join('services','services.id','purchases_services.plan_id')->get(['purchases_services.*', 'services.title as plan_title']);
    //   dd($data['plan']);
      return view('admin.services.purchases',$data);
       
   }
   

   public function create(){

          $data['menu'] = 'packagemenu';
      $data['submenu'] = 'packageservicemenu2';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
     
          return view('admin.services.create',$data);
   }

   public function store(Request $request){
    
        $store = new Services();
        $store->title = $request->title;
        $store->description = $request->description;
        $store->price = $request->price;
        $store->status = $request->status;
        
        

        //  $icon_image_name = '';
        if ($request->file('icon')) {
              $icon_image = $request->file('icon');
              $icon_image_name = time().$icon_image->getClientOriginalName();
              $icon_image->move(public_path('/assets/media/service/icon'), $icon_image_name);
        }
        
        $store->icon = $icon_image_name;
        
        $store->save();

        return redirect()->back()->with('success', 'Services Added');
   }



   public function edit(Request $reqeust, $id){

      $data['menu'] = 'packagemenu';
      $data['submenu'] = 'packageservicemenu2';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
     
     $data['services'] = Services::where('id',$id)->first();

     return view('admin.services.edit',$data);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Services::where('id',$id)->first();
        $update->title = $request->title;
        $update->description = $request->description;
        $update->price = $request->price;
        $update->status = $request->status;
        
        $image_name = '';
        
        if($request->has('icon'))
        {
            @unlink(public_path('/assets/media/service/icon/'.$update->icon));
            $image = $request->file('icon');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/service/icon'), $image_name);
            
        }
        else
        {
            $image_name =$update->icon; 
        }
        
        $update->icon = $image_name;
        $update->save();
    
         return redirect()->route('admin/services')->with('success', 'Services Updated');

   }


public function reject(Request $request){
    
 
     $update = PurchasesServices::where('id',$request->id)->first();
    $update->status = 3; 
    $update->save();
     $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->service_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $user->email, 
                 'subject' => 'Your Service Package Request Rejected', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      

        if($usersmssetting->service_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Service Package Request Rejected';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 
    
    

    return 1;
     
}
public function approve(Request $request){
    
    $coinWalletSetting = CoinWalletSetting::first('coins_on_purchasing');
    $update = PurchasesServices::where('id',$request->id)->first();
    $update->status = 1; 
    $update->save();
    
    
      // 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->service_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => 'Your Service Package Request Approved', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      

        if($usersmssetting->service_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Service Package Request Approved';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 
    
    

    $goto = new  \App\Http\Controllers\HomeController();
    $user_id =  $update->user_id;
    $plan =  'Service Plan';
    $ad_id = 0;
    $plan_id = $update->plan_id;
    $coins = $coinWalletSetting->coins_on_purchasing;
    $type = "Credit";
    $goto->earnedACoin($user_id,$plan,$ad_id,$plan_id,$coins,$type);
    
    return 1;
     
}



   public function delete(Request $request){
     

     $services = Services::where('id',$request->id)->first();


 

     if(!empty($services)){

        $pservices = PurchasesServices::where('plan_id',$request->id)->get();
         
     
        if(count($pservices) == 0){
            
            $services->delete();
              return 1;
              
        }
        else{
               return 0;
        }
     }

   }
   public function deleteall(Request $request){
       if(count($request->services_id)>0){
           for($i=0;$i<count($request->services_id);$i++){
                $services = Services::where('id',$request->services_id[$i])->first();


 

     if(!empty($services)){

        $pservices = PurchasesServices::where('plan_id',$request->services_id[$i])->get();
         
     
        if(count($pservices) == 0){
            
            $services->delete();
              
        }
        
     }
           }
           return 1;
       }else{
           return 0;
       }
        
   }

   
    



}
