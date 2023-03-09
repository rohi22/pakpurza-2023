<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CoinWalletSetting;

use App\Models\User;
use App\Models\Usersetting;
use App\Models\Useremailsetting;
use App\Models\Usersmssetting;
use App\Models\Userpushsetting;



use Auth;
use App\Models\Category;

use App\Models\Bumpupads;

use App\Models\Purchasesbumads;
//use App\Models\PurchasesBumpupads;


class PurchasesbumpplansController extends Controller
{
     
   public function index(){
       
       $data['menu'] = 'purchasesmenu';
       $data['submenu'] = '';
        $data['submenulevel1'] = '';
       $data['submenusub'] = 'purchasessubmenu2';
      
       $data['purchasesbumads'] = Purchasesbumads::latest()->join('bump_up_ads', 'bump_up_ads.id', 'purchases_bump_ads.plan_id')
                         ->orderBy('purchases_bump_ads.id', 'desc')
                        ->paginate(10,['purchases_bump_ads.*','bump_up_ads.title as Plan_title']);
                        //  dd('sacsa');
     return view('admin.purchasesbumpsads.index',$data);
   }

   public function create(){

        return view('admin.subscriptionplans.create');
   }

   public function store(Request $request){
    
    
   
        $store = new Subscriptionplans();
        $store->title = $request->title;
        $store->no_of_post = $request->no_of_post;
        $store->cost = $request->cost;
        $store->duration = $request->duration;
        $store->status = $request->status;
        $store->save();
            
        return redirect()->back()->with('success', 'Subscription Plans Added');
     
     
   }



   public function edit(Request $reqeust, $id){
       
       
        $subscriptionplans = Subscriptionplans::where('id',$id)->first();

     return view('admin.subscriptionplans.edit',compact('subscriptionplans'));

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Subscriptionplans::where('id',$id)->first();
       
        $update->title = $request->title;
        $update->no_of_post = $request->no_of_post;
        $update->cost = $request->cost;
        $update->duration = $request->duration;
        $update->status = $request->status;
        $update->save();
            
         return redirect('admin/all-subscription-plans')->with('success', 'Subscription Plans Updated');
       
   }


   public function delete(Request $request){
     
    //   $delete = Subscriptionplans::where('id',$request->id)->first();

    //  if(!empty($delete)){

    //         $delete->delete();
          
    //  }
     

    //  return 1;
     
     
   }



    public function approve(Request $request){
     
      $coinWalletSetting = CoinWalletSetting::first('coins_on_purchasing');
      $update = Purchasesbumads::where('id',$request->id)->first();
      $update->status = 1;
      $update->save();
      
// 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->bump_up_ads_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => 'Your Bumpup Package Request Approved', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      

        if($usersmssetting->bump_up_ads_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Bumpup Package Request Approved';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 

     $goto = new  \App\Http\Controllers\HomeController();
     $user_id =  $update->user_id;
     $plan =  'BumpUp Plan';
     $ad_id = 0;
     $plan_id = $update->plan_id;
     $coins = $coinWalletSetting->coins_on_purchasing;
     $type = "Credit";
     $goto->earnedACoin($user_id,$plan,$ad_id,$plan_id,$coins,$type);
            
            return 1;
         
      
   }
   
     public function reject(Request $request){
     
      $coinWalletSetting = CoinWalletSetting::first('coins_on_purchasing');
      $update = Purchasesbumads::where('id',$request->id)->first();
      $update->status = 3;
      $update->save();
      
// 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->bump_up_ads_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $user->email, 
                 'subject' => 'Your Bumpup Package Request Rejected', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      

        if($usersmssetting->bump_up_ads_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Bumpup Package Request Rejected';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 

   
            
            return 1;
         
      
   }

 public function deleteall(Request $request){
       if(count($request->bumpup_id)>0){
           for($i=0;$i<count($request->bumpup_id);$i++){
                $services = Purchasesbumads::where('id',$request->bumpup_id[$i])->first();


 

     if(!empty($services)){
            
            $services->delete();
        
     }
           }
           return 1;
       }else{
           return 0;
       }
        
   }


}
