<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use DB;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CoinWalletSetting;
use App\Models\Purchasessfitemkeyword;


use App\Models\User;
use App\Models\Usersetting;
use App\Models\Useremailsetting;
use App\Models\Usersmssetting;
use App\Models\Userpushsetting;


use Auth;
use App\Models\Searchfeaturedlistings;
use App\Models\Purchasessearchfeatured;
use App\Models\Purchasessfitem;

class SearchfeaturedController extends Controller
{
     
     
     
     public function purchasesindex(){
        $data['menu'] = 'purchasesmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'purchasessubmenu3';
       $data['purchasessearchfeatured'] = Purchasessearchfeatured::latest()->join('search_featured_listings', 'search_featured_listings.id', 'purchases_search_featured_listings.plan_id')
                        
                         ->orderBy('purchases_search_featured_listings.id', 'desc')
                        ->paginate(10,['purchases_search_featured_listings.*','search_featured_listings.title as Plan_title']);
           
     return view('admin.featuredlistings.searchfeatured.purchase-list',$data);
   }
   
   
   
   
   
   public function index(){
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_1';
       $data['submenusub'] = 'packagesubmenu31';
       
       
      $data['searchfeaturedlistings'] = Searchfeaturedlistings::latest()->paginate(10);
      
     return view('admin.featuredlistings.searchfeatured.index',$data);
   }

   public function create(){
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_1';
       $data['submenusub'] = 'packagesubmenu31';

        return view('admin.featuredlistings.searchfeatured.create',$data);
   }


 public function getUsersDetail($id){
     
     $users = User::where('id',$id)->get();
     echo json_encode($users);
     
 }
  

   public function store(Request $request){
    
    
   
        $store = new Searchfeaturedlistings();
        
        $store->title = $request->title;
        $store->no_of_post = $request->no_of_post;
        $store->cost = $request->cost;
        $store->keyword_limit = $request->keyword_limit;
        $store->status = $request->status;

       
        $store->save();
            
        return redirect()->back()->with('success', 'Search Featured Plans Added');
     
     
   }



   public function edit(Request $reqeust, $id){
       
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_1';
       $data['submenusub'] = 'packagesubmenu31';
       
        $data['searchfeaturedlistings'] = Searchfeaturedlistings::where('id',$id)->first();

     return view('admin.featuredlistings.searchfeatured.edit',$data);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Searchfeaturedlistings::where('id',$id)->first();
       
            $update->title = $request->title;
            $update->no_of_post = $request->no_of_post;
            $update->cost = $request->cost;
            $update->keyword_limit = $request->keyword_limit;
            $update->status = $request->status;
                    $update->save();
            
         return redirect()->route('admin/search-featured-listings')->with('success', 'Search Featured  Plans Updated');
       
   }


   public function delete(Request $request){
     

     $delete = Searchfeaturedlistings::where('id',$request->id)->first();

     if(!empty($delete)){

        $services = Purchasessearchfeatured::where('plan_id',$request->id)->get();
        
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
               
               
               
               
               $services = Searchfeaturedlistings::where('id',$request->searchfeaturedlistings_id[$i])->first();
       
               if(!empty($services)){

        
            
            $services->delete();
              
        
        
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
     $update = Purchasessearchfeatured::where('id',$request->id)->first();
    
    $a=DB::table('purchases_search_featured_listings')
            ->join('search_featured_listings','purchases_search_featured_listings.plan_id','search_featured_listings.id')
            ->select('search_featured_listings.title as plan_name')
            ->where('purchases_search_featured_listings.id',$request->id)->first();

      $update->status = 1;
      $update->save();
      
           $getslot = DB::table('purchases_search_featured_listings')
           ->join('search_featured_listings','search_featured_listings.id','purchases_search_featured_listings.plan_id')
           ->select('purchases_search_featured_listings.start_date','purchases_search_featured_listings.end_date','search_featured_listings.title as plan_title')
                    ->where('purchases_search_featured_listings.id',$request->id)    
                    ->first();
        
      
      $purchasessfitem = Purchasessfitem::where('purchases_id',$request->id)->get();
      
                      
    
    foreach($purchasessfitem as $item){
        
        
         $updates = Purchasessfitem::where('id',$item->id)->first();
         $updates->status = 1;
         $updates->save();
         $purchasessfitemkeyword = Purchasessfitemkeyword::where('item_id',$item->id)->get();
         foreach($purchasessfitemkeyword as $itemkeyword){
             $purchasessfitemkeyword_update = Purchasessfitemkeyword::where('id',$itemkeyword->id)->first();
             $purchasessfitemkeyword_update->status=1;
             $purchasessfitemkeyword_update->save();
             
         }
      
    }
  
 // 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

    //   if($useremailsetting->search_featured_ad_alerts == 1){
    //           $data = [
                  
    //              'package_name' =>$plan,
    //              'email' => 'mail@simsar.com',
    //              'via' => 'EMAIL', 
    //              'source' => $user->email, 
    //              'subject' => 'Package Purchase Request Approved – simsar.com', 
    //              ];
        
    //             $goto = new  \App\Http\Controllers\HomeController();
    //             $view = "emails.admin.search-featured-ad-approved";
    //             $goto->sendEmail($view, $data);
    //     }
                      
              if($useremailsetting->search_featured_ad_alerts == 1){
                  $email_data=[];
                if(!empty($a)){
                 $email_data = [
                        
                        'package_name' =>$a->plan_name,
                        'email'=>$userdetail->email,
                        'user_name'=>$userdetail->name,
                        'via' => 'EMAIL', 
                        'source' => 'mail@simsar.com',
                    ];
                    
                }
                else{
                       $email_data = [
                        
                        'package_name' =>'Search Featured Plan',
                        'email'=>$userdetail->email,
                        'user_name'=>$userdetail->name,
                        'via' => 'EMAIL', 
                        'source' => 'mail@simsar.com',
                    ];
                    
                }
                Mail::send('emails.admin.search-featured-ad-approved', $email_data, function($message) use ($email_data)
                        {
                            $message->subject('Package Purchase Request Approved – simsar.com');
                            $message->to($email_data['email'], $email_data['user_name']);
                        });
              }
                    // dd($email_data);
            //   Mail::send('emails.admin.search-featured-ad-approved', $email_data, function($message) use ($email_data)
            //             {
            //                 $message->subject('Package Purchase Request Approved – simsar.com');
            //                 $message->to($email_data['email'], $email_data['user_name']);
            //             });
              
        
            
        //made by h    
      $content = "Your Search Package".$getslot->plan_title." is live till ".$getslot->end_date;
             $notify = new  \App\Http\Controllers\HomeController();
             $notify->sendNotification($content, $userdetail->id);
             //made by h  
      

        if($usersmssetting->search_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Search Package Request Approved';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 



     $goto = new  \App\Http\Controllers\HomeController();
     $user_id =  $update->user_id;
     $plan =  'Search Plan';
     $ad_id = 0;
     $plan_id = $update->plan_id;
     $coins = $coinWalletSetting->coins_on_purchasing;
     $type = "Credit";
     $goto->earnedACoin($user_id,$plan,$ad_id,$plan_id,$coins,$type);
            
            return 1;
         
      
   }  
   
   public function reject_search_plans(Request $request){
           $update = Purchasessearchfeatured::where('id',$request->id)->first();
      $update->status = 3;
      $update->save();
      
           $getslot = DB::table('purchases_search_featured_listings')
           ->join('search_featured_listings','search_featured_listings.id','purchases_search_featured_listings.plan_id')
           ->select('purchases_search_featured_listings.start_date','purchases_search_featured_listings.end_date','search_featured_listings.title as plan_title')
                    ->where('purchases_search_featured_listings.id',$request->id)    
                    ->first();
                  
      
      $purchasessfitem = Purchasessfitem::where('purchases_id',$request->id)->get();
    
    
    foreach($purchasessfitem as $item){
        
        
         $updates = Purchasessfitem::where('id',$item->id)->first();
         $updates->status = 3;
         $updates->save();
         $purchasessfitemkeyword = Purchasessfitemkeyword::where('item_id',$item->id)->get();
         foreach($purchasessfitemkeyword as $itemkeyword){
             $purchasessfitemkeyword_update = Purchasessfitemkeyword::where('id',$itemkeyword->id)->first();
             $purchasessfitemkeyword_update->status=3;
             $purchasessfitemkeyword_update->save();
             
         }
      
    }

         $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->search_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $user->email, 
                 'subject' => 'Your Search Package Request Rejected', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        //made by h    
      $content = "Your Search Package ".$getslot->plan_title." is rejected";
             $notify = new  \App\Http\Controllers\HomeController();
             $notify->sendNotification($content, $userdetail->id);
             //made by h  
      

        if($usersmssetting->search_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Search Package Request Rejected';
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
