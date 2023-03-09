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
use App\Models\Shopfeaturedlistings;
use App\Models\Purchasesshopfeatured;


class ShopfeaturedController extends Controller
{
     
      public function purchasesindex(){

       $data['menu'] = 'purchasesmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'purchasessubmenu6';
      
       $data['purchasessearchfeatured'] = Purchasesshopfeatured::latest()->join('shop_featured_listings', 'shop_featured_listings.id', 'purchases_shop_featured_listings.plan_id')
                        
                         ->orderBy('purchases_shop_featured_listings.id', 'desc')
                        ->paginate(10,['purchases_shop_featured_listings.*','shop_featured_listings.title as Plan_title']);
                         
     return view('admin.featuredlistings.shopfeatured.purchase-list',$data);
   }
   
   
   
   public function index(){
       
        $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_5';
       $data['submenusub'] = 'packagesubmenu35';
       
      $data['searchfeaturedlistings'] = Shopfeaturedlistings::latest()->paginate(10);
     return view('admin.featuredlistings.shopfeatured.index',$data);
   }

   public function create(){
       
         $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_5';
       $data['submenusub'] = 'packagesubmenu35';

        return view('admin.featuredlistings.shopfeatured.create',$data);
   }

   public function store(Request $request){
    
    
   
        $store = new Shopfeaturedlistings();
        
        $store->title = $request->title;
$store->shop_item_limit = $request->shop_item_limit;
$store->cost = $request->cost;
$store->status = $request->status;

       
        $store->save();
            
        return redirect()->back()->with('success', 'Shop Featured Plans Added');
     
     
   }



   public function edit(Request $reqeust, $id){
       
          $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_5';
       $data['submenusub'] = 'packagesubmenu35';
       
        $data['searchfeaturedlistings'] = Shopfeaturedlistings::where('id',$id)->first();

     return view('admin.featuredlistings.shopfeatured.edit',$data);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Shopfeaturedlistings::where('id',$id)->first();
       
             
        $update->title = $request->title;
$update->shop_item_limit = $request->shop_item_limit;
$update->cost = $request->cost;
$update->status = $request->status;
$update->save();
            
         return redirect()->route('admin/shop-featured-listings')->with('success', 'Shop Featured  Plans Updated');
       
   }


   public function delete(Request $request){
     

     $delete = Shopfeaturedlistings::where('id',$request->id)->first();

     if(!empty($delete)){

        $services = Purchasesshopfeatured::where('plan_id',$request->id)->get();
        
        if(!empty($services)){
             return 0;
        }
        else{
             $delete->delete();
              return 1;
        }
     }

   }
   
   public function deleteall(Request $request){
       if(count($request->shopfeaturedlistings_id)>0){
           for($i=0;$i<count($request->shopfeaturedlistings_id);$i++){
                $services = Shopfeaturedlistings::where('id',$request->shopfeaturedlistings_id[$i])->first();


 

     if(!empty($services)){

        $pservices = Purchasesshopfeatured::where('plan_id',$request->shopfeaturedlistings_id[$i])->get();
         
     
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


      public function approve(Request $request){
         
      $coinWalletSetting = CoinWalletSetting::first('coins_on_purchasing');
   
      $update = Purchasesshopfeatured::where('id',$request->id)->first();
      $update->status = 1;
      $update->save();


 // 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->your_shop_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => 'Your Shop Package Request Approved', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      

        if($usersmssetting->your_shop_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Shop Package Request Approved';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 






      $goto = new  \App\Http\Controllers\HomeController();
      $user_id =  $update->user_id;
      $plan =  'Shop Plan';
      $ad_id = 0;
      $plan_id = $update->plan_id;
      $coins = $coinWalletSetting->coins_on_purchasing;
      $type = "Credit";
      $goto->earnedACoin($user_id,$plan,$ad_id,$plan_id,$coins,$type);
            
            return 1;
         
      
   }
   
    
  public function reject(Request $request){
         
    
      $update = Purchasesshopfeatured::where('id',$request->id)->first();
      $update->status = 3;
      $update->save();


 // 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->your_shop_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $user->email, 
                 'subject' => 'Your Shop Package Request Rejected', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      

        if($usersmssetting->your_shop_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Shop Package Request Rejected';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 







            
            return 1;
         
      
   }
   
    



}
