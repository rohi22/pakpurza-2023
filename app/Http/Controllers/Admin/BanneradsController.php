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

use App\Models\Category;

use Auth;

use App\Models\Bannerads;
use App\Models\Bannerslots;
use App\Models\Purchasesbannerads;
use App\Models\Pagelist;


class BanneradsController extends Controller
{
     
     
      public function purchasesindex(){
          
            $data['menu'] = 'purchasesmenu';
            $data['submenu'] = '';
            $data['submenulevel1'] = '';
            $data['submenusub'] = 'purchasessubmenu7';
       
    //   dd('chgek');
        $data['purchasesbannerads'] = Purchasesbannerads::latest()->join('banner_ads', 'banner_ads.id', 'purchases_banner_ads.plan_id')
                         ->orderBy('purchases_banner_ads.id', 'desc')
                        ->paginate(10,['purchases_banner_ads.*','banner_ads.title as Plan_title']);
                        
                        
                         
        return view('admin.bannerads.purchase-list',$data);
   }
   
   
   public function approve_banner_plans(Request $request){
        $coinWalletSetting = CoinWalletSetting::first('coins_on_purchasing');
        $update = Purchasesbannerads::where('id',$request->id)->first();
         $update->status = 1;
         $update->save();
         
        $getslot = Purchasesbannerads::join('banner_ads', 'banner_ads.id', 'purchases_banner_ads.plan_id')
         ->join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
        ->where('purchases_banner_ads.id',$request->id)    
        ->get(['purchases_banner_ads.start_date','purchases_banner_ads.end_date','banner_slots.title as slot_title']);
         
         
//           // 
// // 
// // 

    $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->banner_ads_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => 'Your Banner Package Request Approved', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
    //made by h    
      $content = "Your bannerad for slot".$getslot[0]->slot_title." is live till ".$getslot[0]->end_date;
             $notify = new  \App\Http\Controllers\HomeController();
             $notify->sendNotification($content, $userdetail->id);
             //made by h  

        if($usersmssetting->banner_ads_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Banner Package Request Approved';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// // 
// // 
// // 


        $goto = new  \App\Http\Controllers\HomeController();
        $user_id =  $update->user_id;
        $plan =  'Banner Plan';
        $ad_id = $update->ad_id;
        $plan_id = $update->plan_id;
        $coins = $coinWalletSetting->coins_on_purchasing;
        $type = "Credit";
        $goto->earnedACoin($user_id,$plan,$ad_id,$plan_id,$coins,$type);
          return 1;
  }
  //made by h
  
    public function reject_banner_plans(Request $request){
     
        $update = Purchasesbannerads::where('id',$request->id)->first();
        
         $update->status = 3;
         $update->update();
         
        $getslot = Purchasesbannerads::join('banner_ads', 'banner_ads.id', 'purchases_banner_ads.plan_id')
         ->join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
        ->where('purchases_banner_ads.id',$request->id)    
        ->get(['purchases_banner_ads.start_date','purchases_banner_ads.end_date','banner_slots.title as slot_title']);
            $userdetail = User::where('id',$update->user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
 

        if($useremailsetting->banner_ads_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'email' => 'info@simsar.com',
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => 'Your Banner Package Request Rejected', 
                 ];
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
    //made by h    
      $content = "Your bannerad for slot".$getslot[0]->slot_title." is rejected by admin";
             $notify = new  \App\Http\Controllers\HomeController();
             $notify->sendNotification($content, $userdetail->id);
             //made by h  

        if($usersmssetting->banner_ads_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, Your Banner Package Request Rejected';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        return 1;
   }
     //made by h
   public function index($id){
       
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu4';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'packagesubmenu41_'.$id;
       
       $data['bannerads'] = Bannerads::latest()->join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
                            ->where('banner_ads.page_id',$id)
                         ->orderBy('banner_ads.placement', 'asc')
                        ->paginate(10,['banner_ads.*','banner_slots.title as slot_title']);
                        
                        
      /* echo "<pre>";
       print_r($data['bannerads']);die;*/
    //   $bannerads = Bannerads::all();
     return view('admin.bannerads.index',$data);
   }

   public function create(){
       
        $data['menu'] = 'packagemenu';
        $data['submenu'] = 'packagesubmenu4';
        $data['submenulevel1'] = '';
        $data['submenusub'] = 'packagesubmenu41';
        
        $data['categories'] = Category::where('status', 1)->get();
        
        // dd($data['categories']);
        
        $data['bannerslots'] = Bannerslots::all();
        $data['pagelist'] = Pagelist::all();
        return view('admin.bannerads.create',$data);
        
        
      
   }

   public function store(Request $request){
       
    $validation = Bannerads::where('page_id',$request->page)->where('placement',$request->placement)->first();
     if(!empty($validation)){
         return redirect()->back()->with('success', 'Banner Already Ads Added');
     }
     else{
         
       /* echo"<pre>";
         print_r( $request->all() ); die; */
            
        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path('/assets/media/defaultbanner'),$name);
        
        $store = new Bannerads();
        $store->title = $request->title;  
        $store->placement = $request->placement;
        $store->page_id = $request->page;
        if($request->page == 3){
             $store->category_id = $request->category;
        }
        
        $store->banner_img = $name;
        $store->charges = $request->charges;
        $store->status = $request->status;
        $store->save();
        /*$data = array(
            'title'=>$request->title,
            'placement'=>$request->placement,
            'page_id'  =>$request->page,
            'banner_img'=>$name,
            'charges'=>$request->charges,
            'status'=>$request->status,
            );
        Bannerads::create($data);*/
        return redirect()->back()->with('success', 'Banner Ads Added');
            
        
        
     }
   }



   public function edit(Request $reqeust, $id){
       $data['menu'] = 'packagemenu';
       $data['submenu'] = 'packagesubmenu4';
       $data['submenulevel1'] = '';
       $data['submenusub'] = 'packagesubmenu41';
      $data['bannerads'] = Bannerads::where('id',$id)->first();
      
      $data['categories'] = Category::where('status', 1)->get();
      
      $data['pagelist'] = Pagelist::all();
      $data['bannerslots'] = Bannerslots::all();
     return view('admin.bannerads.edit',$data);
     
   }
   public function update(Request $request , $id)
   {
        $update = Bannerads::where('id',$id)->first();
        $update->title = $request->title;  
        $update->placement = $request->placement;
        $update->page_id = $request->page;
        
         if($request->page == 3){
             $update->category_id = $request->category;
        }
        
        $update->charges = $request->charges;
        $update->status = $request->status;
        
        
        $image_name = '';
        
        if($request->has('image'))
        {
            @unlink(public_path('/assets/media/defaultbanner/'.$update->banner_img));
            $image = $request->file('image');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/defaultbanner/'), $image_name);
            
        }
        else
        {
            $image_name =$update->banner_img; 
        }
        
         $update->banner_img = $image_name;
        
        
         $update->save();
        return redirect()->back()->with('success', 'Banner Ads Updated');
   }


   public function delete(Request $request){
       $delete = Bannerads::where('id',$request->id)->first();
        if(!empty($delete)){
             $delete->delete();
        }
         return 1;
   }
    public function deleteall(Request $request){
       if(count($request->ad_id)>0){
           for($i=0;$i<count($request->ad_id);$i++){
                $services = Bannerads::where('id',$request->ad_id[$i])->first();


 

     if(!empty($services)){

        $pservices = PurchasesBannerads::where('plan_id',$request->ad_id[$i])->get();
         
     
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


   
    

 public function get_bannerslots(Request $request){
       $subCategories = Bannerslots::where('page_id',$request->pageId)->get(['id','title']);
         $slotsdata = '';
                if(!empty($subCategories)){
                     $slotsdata.='<option>Select</option>';
                    foreach($subCategories as $p){
                        $slotsdata.='<option value="'.$p->id.'">'.ucfirst($p->title).'</option>';
                    }
                }
                else{
                    $slotsdata.='<option>No Data Found</option>';
                }
        return [
            'slotsdata'=>$slotsdata,
            
        ];
   }


}
