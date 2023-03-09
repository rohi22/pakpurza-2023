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
use App\Models\Brandfeaturedlistings;
use App\Models\Purchasesbrandfeatured;


class BrandfeaturedController extends Controller
{
     
     public function purchasesindex(){
         
       $data['menu'] = 'purchasesmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'purchasessubmenu5';
      
       $data['purchasessearchfeatured'] = Purchasesbrandfeatured::latest()->join('brand_featured_listings', 'brand_featured_listings.id', 'purchases_brand_featured_listings.plan_id')
                        
                         ->orderBy('purchases_brand_featured_listings.id', 'desc')
                        ->paginate(10,['purchases_brand_featured_listings.*','brand_featured_listings.title as Plan_title']);
                         
     return view('admin.featuredlistings.brandfeatured.purchase-list',$data);
   }
   
   
   public function index(){
       
        $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_4';
       $data['submenusub'] = 'packagesubmenu34';
       
      $data['searchfeaturedlistings'] = Brandfeaturedlistings::latest()->paginate(10);
     return view('admin.featuredlistings.brandfeatured.index',$data);
   }

   public function create(){

       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_4';
       $data['submenusub'] = 'packagesubmenu34';
       
       
        return view('admin.featuredlistings.brandfeatured.create',$data);
   }

   public function store(Request $request){
    
    // dd($request->all());
   
        $store = new Brandfeaturedlistings();
        
            $store->title = $request->title;
            $store->brand_limit = $request->brand_limit;
            

            $store->cost = $request->cost;
            $store->brand_item_limit = $request->brand_item_limit;
            $store->status = $request->status;

       
        $store->save();
            
        return redirect()->back()->with('success', 'Brand Featured Plans Added');
     
     
   }



   public function edit(Request $reqeust, $id){
       
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu3';
       $data['submenulevel1'] = 'packagesubmenu3_4';
       $data['submenusub'] = 'packagesubmenu34';
       
        $data['searchfeaturedlistings'] = Brandfeaturedlistings::where('id',$id)->first();

        return view('admin.featuredlistings.brandfeatured.edit',$data);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
        $update = Brandfeaturedlistings::where('id',$id)->first();
        $update->title = $request->title;
        $update->brand_limit = $request->brand_limit;
        $update->cost = $request->cost;
        $update->brand_item_limit = $request->brand_item_limit;
        $update->status = $request->status;
                    $update->save();
            
         return redirect()->route('admin/brand-featured-listings')->with('success', 'Brand Featured  Plans Updated');
       
   }


  public function delete(Request $request){
     

     $delete = Brandfeaturedlistings::where('id',$request->id)->first();

     if(!empty($delete)){

        $services = Purchasesbrandfeatured::where('plan_id',$request->id)->get();
        
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
       
    //   dd($request->all());
       if(count($request->type_id)>0){
           for($i=0;$i<count($request->type_id);$i++){
                $services = Brandfeaturedlistings::where('id',$request->type_id[$i])->first();


 

     if(!empty($services)){

        $pservices = Purchasesbrandfeatured::where('plan_id',$request->type_id[$i])->get();
         
     
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
      $update = Purchasesbrandfeatured::where('id',$request->id)->first();
      $update->status = 1;
      $update->save();
      
      
       // 
// 
// 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->brand_featured_ad_alerts == 1){
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
        
      

        if($usersmssetting->brand_featured_ad_alerts == 1){
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
      $plan =  'Brand Plan';
      $ad_id = 0;
      $plan_id = $update->plan_id;
      $coins = $coinWalletSetting->coins_on_purchasing;
      $type = "Credit";
      $goto->earnedACoin($user_id,$plan,$ad_id,$plan_id,$coins,$type);
            return 1;
         
      
   }
    
 public function reject(Request $request){
     
      $update = Purchasesbrandfeatured::where('id',$request->id)->first();
      $update->status = 3;
      $update->save();

    
    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->brand_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => 'Your Service Package Request Rejected', 
                 ];
        
                $newgoto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $newgoto->sendEmail($view, $data);
        }
        
      
    // return $update;

        if($usersmssetting->brand_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Service Package Request Rejected';
                    $smsgoto = new  \App\Http\Controllers\HomeController();
                    $smsgoto->sendSMS($to, $msg);
                
            }
        }
    return "1";
        
      
   }
    


}
