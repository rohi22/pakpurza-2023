<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\Models\User;
use App\Models\Usersetting;
use App\Models\Useremailsetting;
use App\Models\Usersmssetting;
use App\Models\Userpushsetting;

use App\Models\CoinWalletSetting;

use Auth;
use App\Models\Categoryfeaturedlistings;

use App\Models\Purchasescategoryfeatured;


class CategoryfeaturedController extends Controller
{
     
     
      public function purchasesindex(){
          
       $data['menu'] = 'purchasesmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'purchasessubmenu4';
       
       
       $data['purchasessearchfeatured'] = Purchasescategoryfeatured::latest()->join('category_featured_listings', 'category_featured_listings.id', 'purchases_category_featured_listings.plan_id')
                        
                         ->orderBy('purchases_category_featured_listings.id', 'desc')
                        ->paginate(10,['purchases_category_featured_listings.*','category_featured_listings.title as Plan_title']);
                         
     return view('admin.featuredlistings.categoryfeatured.purchase-list',$data);
   }
   
   
   
   public function index(){
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_2';
       $data['submenusub'] = 'packagesubmenu32';
       
       
      $data['searchfeaturedlistings'] = Categoryfeaturedlistings::latest()->paginate(10);
     return view('admin.featuredlistings.categoryfeatured.index',$data);
   }

   public function create(){

       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_2';
       $data['submenusub'] = 'packagesubmenu32';
        return view('admin.featuredlistings.categoryfeatured.create',$data);
   }

   public function store(Request $request){
    
    
   
        $store = new Categoryfeaturedlistings();
        
$store->title = $request->title;

$store->category_limit = $request->category_limit;
$store->category_item_limit = $request->category_item_limit;


$store->cost = $request->cost;

$store->status = $request->status;

       
        $store->save();
            
        return redirect()->back()->with('success', 'Category Featured Plans Added');
     
     
   }



   public function edit(Request $reqeust, $id){
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_2';
       $data['submenusub'] = 'packagesubmenu32';
       
        $data['searchfeaturedlistings'] = Categoryfeaturedlistings::where('id',$id)->first();

     return view('admin.featuredlistings.categoryfeatured.edit',$data);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Categoryfeaturedlistings::where('id',$id)->first();
       
$update->title = $request->title;
$update->category_limit = $request->category_limit;
$update->category_item_limit = $request->category_item_limit;
$update->cost = $request->cost;
$update->status = $request->status;
                    $update->save();
            
         return redirect()->route('admin/category-featured-listings')->with('success', 'Category Featured Plans Updated');
       
   }


   public function delete(Request $request){
     $delete = Categoryfeaturedlistings::where('id',$request->id)->first();

     if(!empty($delete)){

        $services = Purchasescategoryfeatured::where('plan_id',$request->id)->get();
        
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
         if(count($request->searchfeaturedlistings_id)>0){
             for($i=0;$i<count($request->searchfeaturedlistings_id);$i++){
                 $services = Categoryfeaturedlistings::where('id',$request->searchfeaturedlistings_id[$i])->first();
                 
                 
                  if(!empty($services)){

        $pservices = Purchasescategoryfeatured::where('plan_id',$request->searchfeaturedlistings_id[$i])->get();
         
     
        if(count($pservices) == 0){
            
            $services->delete();
              
        }
        
     }
                 
             }
             return 1;
         }
         else{
             return 0;
         }
         
     }


     public function approve(Request $request){
     
      $coinWalletSetting = CoinWalletSetting::first('coins_on_purchasing');
      $update = Purchasescategoryfeatured::where('id',$request->id)->first();
      $update->status = 1;
      $update->save();


// 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->category_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => 'Your Category Package Request Approved', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      

        if($usersmssetting->category_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Category Package Request Approved';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 




     $goto = new  \App\Http\Controllers\HomeController();
     $user_id =  $update->user_id;
     $plan =  'Category Plan';
     $ad_id = 0;
     $plan_id = $update->plan_id;
     $coins = $coinWalletSetting->coins_on_purchasing;
     $type = "Credit";
     $goto->earnedACoin($user_id,$plan,$ad_id,$plan_id,$coins,$type);
            
            return 1;
        //  return redirect('admin/category-featured-listings')->with('success', 'Category Featured Plans Updated');
         
      
   }
   
   
     public function reject(Request $request){
     
    
      $update = Purchasescategoryfeatured::where('id',$request->id)->first();
      $update->status = 3;
      $update->save();


// 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->category_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $user->email, 
                 'subject' => 'Your Category Package Request Rejected', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      

        if($usersmssetting->category_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Category Package Request Rejected';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 




    
            return 1;
        //  return redirect('admin/category-featured-listings')->with('success', 'Category Featured Plans Updated');
         
      
   }
   
    



}
