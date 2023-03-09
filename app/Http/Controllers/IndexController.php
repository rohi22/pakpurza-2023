<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Auth;
use Hash;
use DB;
use App\Models\EarnedCoins;
use Mail;
use App\Models\Bannersetting;
use App\Models\SellNow;
use App\Models\Sellnowauction;
use App\Models\Sellnowbid;
use App\Models\SubBrand;
use App\Models\WishList;
use App\Models\User;
use App\Models\Companyprofile;
use App\Models\Like;
use App\Models\View;
use App\Models\Viewcategory;
use App\Models\Purchasessfitemkeyword;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Paymentlist;
use App\Models\Map;
use App\Models\Allattributes;
use App\Models\Property;
use App\Models\Location;
use App\Models\Purchasespackagedate;
use App\Models\Firstmessages;
use App\Models\TransactionData;
use App\Models\AllTransaction;
use App\Models\Brand;
use App\Models\Subscriptionplans;
use Carbon\Carbon;

use App\Models\Purchasessubscription;
use App\Models\Purchasesbumads;
use App\Models\Bumpupads;
use App\Models\Pagelist;

use App\Models\Bumpupsetting;


use App\Models\Searchfeaturedlistings;
use App\Models\Categoryfeaturedlistings;
use App\Models\Brandfeaturedlistings;
use App\Models\Shopfeaturedlistings;
use App\Models\Hotfeaturedlistings;

use App\Models\Purchasessearchfeatured;
use App\Models\Purchasescategoryfeatured;
use App\Models\Purchasesbrandfeatured;
use App\Models\Purchasesshopfeatured;
use App\Models\Purchaseshotfeatured;
use App\Models\Message;
use App\Models\AdAttribute;
use App\Models\Attributes;
use App\Models\AdminBank;



use App\Models\Bannerads;

use App\Models\Bannerslots;
use App\Models\Purchasesbannerads;

use App\Models\Purchasessfitem;
use App\Models\Purchasescfitem;
use App\Models\Purchasesbfitem;
use App\Models\Purchasesshfitem;
use App\Models\Purchaseshfitem;
use App\Models\Purchasesbumadsitem;
use App\Models\Purchasessubscriptionitem;
use App\Models\AdReport;
use App\Models\UserAdReport;
use App\Models\Sellnowgallery;
use App\Models\WebSetting;


use App\Models\Usersetting;
use App\Models\Useremailsetting;
use App\Models\Usersmssetting;
use App\Models\Userpushsetting;
use App\Models\UserWallet;
use App\Models\AndroidFcmToken;


class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {



        $slotA = $this->get_slot_banner(1);
        $slotB = $this->get_slot_banner(2);
        $slotC = $this->get_slot_banner(3);
        $slotD = $this->get_slot_banner(4);
        $slotE = $this->get_slot_banner(5);
        $slotF = $this->get_slot_banner(6);
        $slotG = $this->get_slot_banner(7);
        $slotH = $this->get_slot_banner(8);



        //  $slotA = Purchasesbannerads::join('banner_ads', 'banner_ads.id', 'purchases_banner_ads.plan_id')
        //                                         ->join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
        //                                         ->where('purchases_banner_ads.status', 1)
        //                                         ->where('banner_slots.id','=', 1)
        //                                         ->first(['purchases_banner_ads.*','banner_ads.placement']);


        // dd($slotB);

        //    if(Auth::Check()){
        //        if(Auth::User()->is_profile==0){
        //            return redirect('user/profile')->with('error', 'Please update your profile first');
        //        }
        //        elseif(Auth::User()->is_profile==1){
        //             $data['slider'] = Slider::where('status', 1)->get();
        //             return view('home',$data);
        //        }
        //    }
        //    else{
        //         $data['slider'] = Slider::where('status', 1)->get();
        //         return view('home',$data);
        //    }


        $slider = Slider::where('status', 1)->get();

        return view('home', compact('slider', 'slotA'));

        // return view('home',$data);

    }
    
    public function createpassword(){
        return view('test.create-password');
    }

    public function banners_ads_plans()
    {
        // dd($req->all());
        
        $bannerads = Bannerads::join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
        ->leftJoin('categories', 'banner_ads.category_id', 'categories.id')
            ->where('banner_ads.charges','>', 0)
            ->orderBy('banner_ads.id', 'desc')
            ->get(['banner_ads.*', 'banner_slots.title as slot_title','categories.title as categoryTitle']);


        foreach ($bannerads as $key => $wl) {
            $purchasessfitem = Purchasesbannerads::where('plan_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($purchasessfitem)) {
                $bannerads[$key]['is_buy'] = $purchasessfitem->status;
            } else {
                $bannerads[$key]['is_buy'] = 10;
            }
        }

      return view('profile.banners-ads-list', compact('bannerads'));
        // if(\Session::get('locale') == 'ar'){
        //         return view('arabic.profile.banners-ads-list', compact('bannerads'));
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
        //     return view('profile.banners-ads-list', compact('bannerads'));    
        // }
        
        
    }


    public function buy_banners_plans(Request $reqeust, $id)
    {   
        //  dd($reqeust->all());
       
        $data['todayDate'] = date("Y-m-d");
       $data['tommorowdate']= date("Y-m-d", strtotime("+1 day"));
       
        // $plan_id = $request->plan_id;
       

        $data['id'] = $id;
        $data['plan'] = Bannerads::join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
        ->leftJoin('page_list', 'page_list.id', 'banner_ads.page_id')
                                        ->leftJoin('categories', 'categories.id', 'banner_ads.category_id')
            ->where('banner_ads.id', $id)
            // ->get('banner_ads.*');
            ->first(['banner_ads.*', 'banner_slots.title as slot_title', 'banner_slots.slot_width as slot_width', 'banner_slots.slot_height as slot_height','page_list.page_title as pageTitle' ,'categories.title as categoryTitle']);
            
        // dd($data['plan']);    
            
            
        $data['package_date']=Purchasespackagedate::where('plan_id',$id)->where('package_type',1)->max('package_date');
        

        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);
            
        $data['admin_banks'] = AdminBank::where('is_active', 1)->get();


        return view('profile.buy-banners-ads-plans', $data);
    }
        
    
    public function add_banners_ads_plan(Request $request)
    {
       
          // dd($request->all());
      
      
        $acc_id='';
        $emailmsg='';
        $phonemsg='';
        $notmsg = '';
        //  $payment_type = $request->payment_type;
        if (Auth::Check()) {
    
            $plan_id = $request->id;
            $back_link=$request->back_link;
            $payment_type = $request->payment_type;
            
            $knet_payment_type = $request->knet_payment_type;
            // dd($knet_payment_type);
            

            if($payment_type==1){
                $acc_id=$request->account;
                $emailmsg='Your Banner Package Request Send to admin for approval';
                $phonemsg='HI, Your Banner Package Request Send to admin for approval';
                $notmsg = 'Your Banner Package Request Send to admin for approval';
            }
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;
            $data['start_date'] =$start_date ;
            $data['end_date']  =$end_date  ;    

            $date1 = date_create($data['start_date']);
            $date2 = date_create($data['end_date']);
    
            /*difference between two dates*/
            $diff  = date_diff($date1,$date2);
            $days  = $diff->format("%a");
            $dates = []; 

           // $validate = Purchasesbannerads::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

           // if (!empty($validate)) {
                
            //     return redirect()->route('banners-ads-plans')->with('success', 'Plan Already Added');
                // return redirect('banners-ads-plans')->with('success', 'Plan Already Added');
            //} else 
            {

               
                $store = new Purchasesbannerads();
                $store->plan_id = $plan_id;
                $store->back_link=$back_link;
                $store->payment_type = $payment_type;
                if($payment_type==1){
                   $store->account_id=$acc_id;
                 }
                 
                 
                 if($payment_type==3 || $payment_type==4 ){
                    $store->status=1;
                 }
                 else if($payment_type==5 || $payment_type==6){
                    $store->status=0; 
                 }
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                $image_name=$request->imgBannerImage;
                $image_name = '';
                if ($request->file('mainImage')) {
                    $image = $request->file('mainImage');
                    $image_name = time() . $image->getClientOriginalName();
                    $image->move(public_path('/assets/media/buybannersplans/'), $image_name);
                }
                $store->banner_img = $image_name;
               
                // Purchasespackagedate
                
                if(!empty(Session::get('current_coins'))){ 

                    $goto = new  \App\Http\Controllers\HomeController();
                    $user_id =  $store->user_id;
                    $plan =  'Banner Plan';
                    $ad_id = 0;
                    $plan_id = $store->plan_id;
                    $usedCoins  = 0; $usedCoins = Session::get('coin_used');
                    $currentCoins = 0; $currentCoins = Session::get('current_coins');
                    $type = "Debit";
                    Session::forget('current_coins');
                    Session::forget('coin_used');
                    $isActive = $goto->deductCoins($user_id,$plan,$ad_id,$plan_id,$usedCoins,$currentCoins,$type);
                    if($isActive == 1){ $store->status = 1; }
                    
                }
                $store->save();
                
                $insertedId =  $store->id; 
                
                if($payment_type==3){
                    
                    $rtype='banner_ad';
                    $this->walletpay($store->id,$total_amount,$rtype,$payment_type);
                    $emailmsg='Your Banner Package Amount Deducted from your wallet successfully';
                    $phonemsg='HI, Your Banner Package Amount Deducted from your wallet successfully';
                    $notmsg = 'Your Banner Package Amount Deducted from your wallet successfully';
                }
                if($payment_type==4){
                    $rtype='Debit';
                    
                    $getslot = DB::table('banner_ads')
                    ->join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
                    ->select('banner_slots.title as slot_title','banner_ads.title as b_ad_title')
                    ->where('banner_ads.id',$plan_id)    
                    ->first();
                    
                    $this->coinwalletpay($store->plan_id,$total_amount,$rtype,$getslot->b_ad_title);
                      $emailmsg='Your Banner Package Amount Deducted from your coin wallet successfully';
                    $phonemsg='HI, Your Banner Package Amount Deducted from your coin wallet successfully';
                    $notmsg = 'Your Banner Package Amount Deducted from your coin wallet successfully';
                }
               

                $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date'])),
                'package_id' => $store->id];
            
            
                for ($i=1; $i <= $days ; $i++) { 
                    $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date']. ' +'.$i.' day')),
                    'package_id' => $store->id];
                }
                
                 for ($i=0; $i < count($dates) ; $i++) { 
                 
                      $stores = new Purchasespackagedate();
                      $stores->package_date = $dates[$i]['dates'];
                      $stores->package_id = $dates[$i]['package_id'];
                      $stores->plan_id = $plan_id;
                      $stores->package_type = 1;
                      $stores->save();
                  
                 }

    $userdetail = User::where('id',$user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', Auth::user()->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', Auth::user()->id)->first(); 
 

        if($useremailsetting->banner_ads_alerts == 1){
              $data = [
                 'user_name' => $userdetail->name, 
                 'email' => $userdetail->email,
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' =>$emailmsg, 
                 ];
                 
                Mail::send('emails.admin.banner-ad', $data, function($message) use ($data) {
                    $message->subject('Ad created successfully on simsar.com');
                    $message->to($data['email'], $data['user_name']);
                });
                
                $content = "<banner ads alert> \" ".Session::get('title') . " </a> \" sent for approval to admin";
                $notify = new \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, Auth::user()->id);
                
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
      
            //  $content = $notmsg;
            //  $notify = new  \App\Http\Controllers\HomeController();
            //  $notify->sendNotification($content, Auth::user()->id);
             

        if($usersmssetting->banner_ads_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg =  $phonemsg;
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 
        $transaction_id = ($request->has('transaction_id') && $request->transaction_id) ? '?transaction_id='.$request->transaction_id : '';


    

                
              if($payment_type==1){ 
                  return view('test.thankyou');
              }else if($payment_type==3){
                  return view('test.walletThankyou');
              }else if($payment_type==4){
                  return view('test.coinwalletThankyou');
              }else if($payment_type==5 ){
                  
                  return view('test.knet',compact('insertedId','total_amount','knet_payment_type'));
                //   return view('test.thankyou');
                  
              }
              else if($payment_type == 6){
                   return view('test.knetDebit',compact('insertedId','total_amount','knet_payment_type'));
              }
              
                 
            }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }
public function walletpay($id,$totalamount,$requesttype,$paymenttype){
        $strRand = Str::random(9);
        $noRand = rand(1000, 9999);
        $transaction_id = $strRand.$noRand;
        
        $user_id = Auth::user()->id;
        $creditamount=$totalamount;
        $reqtype=$requesttype;
        $paytype=$paymenttype;
        $userwallet=new UserWallet();

        $userwallet->tid=$transaction_id;
              
         $userwallet->user_id=$user_id;
           $userwallet->purchase_id=$id;
          $userwallet->credit=$creditamount;
           $userwallet->request_type=$reqtype;
           $userwallet->status=1;
           $userwallet->payment_method=$paytype;
           $userwallet->save();
           
        
        
    }

public function coinwalletpay($planid,$totalamount,$requesttype,$plantitle){
      
             $coinwalletController = new \App\Http\Controllers\CoinWalletController();
            $deductedCoins = $coinwalletController->getcoin()[1] * $totalamount;
           
     $strRand = Str::random(9);
        $noRand = rand(1000, 9999);
        $transaction_id = $strRand.$noRand;
        $earnedcoin=new EarnedCoins();
        
        
        $earnedcoin->user_id = Auth::user()->id;
        $earnedcoin->plan_id=$planid;
        $earnedcoin->transaction_id=$transaction_id;
        $earnedcoin->type=$requesttype;
        $earnedcoin->plan=$plantitle;
        $earnedcoin->coins=$deductedCoins;
        $earnedcoin->status=1;
        $earnedcoin->save();
        
        
        
      
}


    public function buy_banners_ads_plans(Request $request)
    {
         

        if (Auth::Check()) {

            
        
            $payment_type = $request->payment_type;
           // return response()->json($payment_type);

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;

            $validate = Purchasesbannerads::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            if (!empty($validate)) {
                // $validate->delete();
                return [
                    'status' => 'already'
                ];
            } else {

                $store = new Purchasesbannerads();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                if(!empty(Session::get('current_coins'))){ 

                    $goto = new  \App\Http\Controllers\HomeController();
                    $user_id =  $store->user_id;
                    $plan =  'Banner Plan';
                    $ad_id = 0;
                    $plan_id = $store->plan_id;
                    $usedCoins  = 0; $usedCoins = Session::get('coin_used');
                    $currentCoins = 0; $currentCoins = Session::get('current_coins');
                    $type = "Debit";
                    Session::forget('current_coins');
                    Session::forget('coin_used');
                    $isActive = $goto->deductCoins($user_id,$plan,$ad_id,$plan_id,$usedCoins,$currentCoins,$type);
                    if($isActive == 1){ $store->status = 1; }
                    
                }
                $store->save();
                return [
                    'status' => 'added'

                ];
            }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }



    public function bump_ads_plans()
    {

        $bumpupads = Bumpupads::join('page_list', 'page_list.id', 'bump_up_ads.placement')
            ->orderBy('bump_up_ads.id', 'desc')
            ->where('status', 1)
            ->get(['bump_up_ads.*', 'page_list.page_title as page_title']);


        foreach ($bumpupads as $key => $wl) {

            $purchasesbumads = Purchasesbumads::where('plan_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($purchasesbumads)) {
                $bumpupads[$key]['is_buy'] = $purchasesbumads->status;
            } else {
                $bumpupads[$key]['is_buy'] = 10;
            }
        }
    return view('profile.bum-ads-list', compact('bumpupads')); 
         if(\Session::get('locale') == 'ar'){
            
         return view('arabic.profile.bum-ads-list', compact('bumpupads')); 
        }
        elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
            
        return view('profile.bum-ads-list', compact('bumpupads')); 
        }
        
     
    }


    public function buy_bump_ads_plans(Request $reqeust, $id)
    {  
        $data['plan_id'] = $id;
        $data['todayDate'] = date("Y-m-d");
        $data['tommorowdate']= date("Y-m-d", strtotime("+1 day"));
    
        $data['plan'] = Bumpupads::leftJoin('page_list', 'page_list.id', 'bump_up_ads.placement')
                                        ->leftJoin('categories', 'categories.id', 'bump_up_ads.select_category')
                                        ->where('bump_up_ads.id', $id)
                                        // ->first();
                                        ->first(['bump_up_ads.*','page_list.page_title as pageTitle','categories.title as categoryTitle']);
        
        
        // banner_slots
        // categories
        
        $data['sellNow']=[];
        
         if($data['plan']->select_category == 0){
            //  dd("casc");
            //  $data['sellNow'] =  SellNow::rightJoin('purchases_bump_ads_items','purchases_bump_ads_items.ads_id','sell_now.id')
            // ->select('sell_now.*','sell_now.id as sid')           
            //  ->where('user_id', Auth::user()->id)->where('is_approve', 1)
            // ->where('status_id', 1)->where('sell_now.id','=','purchases_bump_ads_items.ads_id')
            //  ->get();
           
        $sellNow =  SellNow::leftJoin('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id','sell_now.id')
                            ->where('sell_now.user_id', Auth::user()->id)
                            ->where('sell_now.is_approve', 1)
                            ->where('sell_now.status_id', 1)
                // ->where('sell_now.status_id', 1)
                // ->where('purchases_category_featured_items.status','>', 1)
                ->distinct('sell_now.id')
                ->get(['sell_now.*','purchases_bump_ads_items.ads_id as extraID']);
                // foreach ($selslNow as $sellNow) {
                // if($sellNow->extraID == null ){
                //     array_push($data['sellNow'],$sellNow);
                    
                // }
            // }
            // $data['sellNow'] =  SellNow::where('user_id', Auth::user()->id)->where('is_approve', 1)->where('status_id', 1)->get();
            //  dd($sellNow);   
         }
         else{
            
             //$data['sellNow'] =  SellNow::where('user_id', Auth::user()->id)->where('is_approve', 1)->where('category_id', $data['plan']->select_category)->where('status_id', 1)->get();
          $sellNow =  SellNow::leftJoin('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.id')
            ->where('sell_now.category_id', $data['plan']->select_category)
                ->where('sell_now.user_id', Auth::user()->id)
                ->where('sell_now.is_approve', 1)
                //->where('sell_now.status_id', 1)
                // ->where('sell_now.status_id', 1)
                // ->where('purchases_category_featured_items.status','>', 1)
                ->distinct('sell_now.id')
                ->get(['sell_now.*','purchases_bump_ads_items.ads_id as extraID']);
                // foreach ($selslNow as $sellNow) {
                // if($sellNow->extraID == null ){
                //     array_push($data['sellNow'],$sellNow);
                    
                // }
            // }
        
         }
        
        $data['sellNow']=$sellNow;
        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);
              $data['package_date']=Purchasespackagedate::where('plan_id',$id)->where('package_type',2)->max('package_date');
                $data['admin_banks'] = AdminBank::where('is_active', 1)->get();
            //  dd($data['payment_list']);
        return view('profile.buy-bump-ads-plans', $data);
    }



    public function buy_subscription_plans(Request $reqeust, $id)
    {

        $sellNow =  SellNow::where('user_id', Auth::user()->id)->get();

        $plan = Subscriptionplans::where('id', $id)->first();
        return view('profile.buy-subscription-plans', compact('plan', 'sellNow'));
    }

    public function add_bump_ads_plan(Request $request)
    {
        
        
         $acc_id='';
          $emailmsg='';
        $phonemsg='';
        $notmsg = '';
        
        if (Auth::Check()) {

            $plan_id = $request->id;
            $placement = $request->placement;
            $payment_type = $request->payment_type;
            $knet_payment_type = $request->knet_payment_type;
            
            // dd($request);
            
            if($payment_type==1){
                $acc_id=$request->account;
               $emailmsg='Your BumpUp Package Request Send to admin for approval';
                $phonemsg='HI, Your BumpUp Package Request Send to admin for approval';
                $notmsg = 'Your BumpUp Package Request Send to admin for approval';
            }
            
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;
            
            
            $data['start_date'] =$start_date ;
            $data['end_date']  =$end_date  ;    
            
            $date1 = date_create($data['start_date']);
            $date2 = date_create($data['end_date']);
    
            /*difference between two dates*/
            $diff  = date_diff($date1,$date2);
    
            $days  = $diff->format("%a");
              $dates = []; 
                $store = new Purchasesbumads();
                $store->category_id = $request->category_id;
                $store->plan_id = $plan_id;
                $store->bump_placement = $placement;
                $store->payment_type = $payment_type;
                if($payment_type==1){
                    $store->account_id=$acc_id;
                }
                if($payment_type==3 || $payment_type==4){
                    $store->status=1;
                }
                
                else if($payment_type==5 || $payment_type==6){
                    $store->status=0; // pending status
                 }
                 
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                if(!empty(Session::get('current_coins'))){ 

                    $goto = new  \App\Http\Controllers\HomeController();
                    $user_id =  $store->user_id;
                    $plan =  'Bump Ads';
                    $ad_id = 0;
                    $plan_id = $store->plan_id;
                    $usedCoins  = 0; $usedCoins = Session::get('coin_used');
                    $currentCoins = 0; $currentCoins = Session::get('current_coins');
                    $type = "Debit";
                    Session::forget('current_coins');
                    Session::forget('coin_used');
                    $isActive = $goto->deductCoins($user_id,$plan,$ad_id,$plan_id,$usedCoins,$currentCoins,$type);
                    if($isActive == 1){ $store->status = 1; }
                    
                }
                $store->save();
                   $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date'])),
                'package_id' => $store->id];
            
            
                for ($i=1; $i <= $days ; $i++) { 
                    $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date']. ' +'.$i.' day')),
                    'package_id' => $store->id];
                }
               
                 for ($i=0; $i < count($dates) ; $i++) { 
                 
                      $stores = new Purchasespackagedate();
                      $stores->package_date = $dates[$i]['dates'];
                      $stores->package_id = $dates[$i]['package_id'];
                      $stores->plan_id = $plan_id;
                      $stores->package_type = 2;
                      $stores->save();
                  
                 }
                 
                $ID = $store->id;
                if($payment_type==3){
                    
                    $rtype='bump_up_ad';
                    $this->walletpay($ID,$total_amount,$rtype,$payment_type);
                    $emailmsg='Your BumpUp Package Amount Deducted from your wallet successfully';
                    $phonemsg='HI, Your BumpUp Package Amount Deducted from your wallet successfully';
                    $notmsg = 'Your BumpUp Package Amount Deducted from your wallet successfully';
                }
                if($payment_type==4){
                    $rtype='Debit';
                                 
                    $getslot = DB::table('bump_up_ads')->select('bump_up_ads.title as plan_title')
                    ->where('bump_up_ads.id',$planid)    
                    ->first();
                    $this->coinwalletpay($plan_id,$total_amount,$rtype,$getslot->plan_title);
                    $emailmsg='Your BumpUp Package Amount Deducted from your coin wallet successfully';
                    $phonemsg='HI, Your BumpUp Package Amount Deducted from your coin wallet successfully';
                    $notmsg = 'Your BumpUp Package Amount Deducted from your coin wallet successfully';
                }

                if($request->has('allattributes') && $request->allattributes){
                    $items = !is_array($request->allattributes) ? explode(',',$request->allattributes) : $request->allattributes;
                }

                if(count($items)){
                    for ($i = 0; $i < count($items); $i++) {

                        $storeitem = new Purchasesbumadsitem();
                        $storeitem->purchase_id = $ID;
                        //   if ($request->file('banner_image')[$i]) {
                        //     //  dd('check');
                        //       $image = $request->file('banner_image')[$i];
                        //       $image_name = time().$image->getClientOriginalName();
                        //       $image->move(public_path('/assets/media/buybumpadsplans/'), $image_name);
                        //     }

                        $storeitem->ads_id = $items[$i];

                        $storeitem->save();

                        $IDD = $storeitem->id;

                        if (!empty($IDD)) {

                            $update = SellNow::where('id', $items[$i])->update(['is_bumpup_featured' => 1]);
                        }
                    }                    
                }


                     // 
// 
// 

    $userdetail = User::where('id',$user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', Auth::user()->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', Auth::user()->id)->first(); 
 

        if($useremailsetting->bump_up_ads_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name,
                 'user_name' =>  $userdetail->name,
                 'email' => $userdetail->email,
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => $emailmsg, 
                 'ad_title' => '',
                 'ad_id' => ''
                 ];
                 
                   
                Mail::send('emails.admin.ad-request-sent', $data, function($message) use ($data) {
                    $message->subject('Ad created successfully on simsar.com');
                    $message->to($data['email'], $data['user_name']);
                });
                
                
                 $content = "<bump up ads alert ".$store->id."'> \" ".Session::get('title') . " </a> \" sent for approval to admin"; //  $sellNowid
                $notify = new \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, Auth::user()->id);
                 
                 
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
        
        $content = $notmsg;
             $notify = new  \App\Http\Controllers\HomeController();
             $notify->sendNotification($content, Auth::user()->id);
      

        if($usersmssetting->bump_up_ads_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = $phonemsg;
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 

        $transaction_id = ($request->has('transaction_id') && $request->transaction_id) ? '?transaction_id='.$request->transaction_id : '';
        
        $insertedId =  $store->id; 
            
        if($payment_type==1){ 
              return view('test.thankyou');
          }else if($payment_type==3){
              return view('test.walletThankyou');
          }else if($payment_type==4){
              return view('test.coinwalletThankyou');
          }else if($payment_type==5 ){
              
            return view('test.bump-ads.knet',compact('insertedId','total_amount','knet_payment_type'));
          }
          else if($payment_type == 6){
               return view('test.bump-ads.knetdebit-card',compact('insertedId','total_amount','knet_payment_type'));
        }
        
        return redirect('en/thankyou/'.$payment_type.$transaction_id);
            //   if($payment_type==1){ 
            //     return view('test.thankyou');
            //   }else if($payment_type==3){
            //       return view('test.walletThankyou');
            //   }else if($payment_type==4){
            //       return view('test.coinwalletThankyou');
            //   }
            //}
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }





    public function search_featured_plans()
    {

        $searchfeaturedlistings = Searchfeaturedlistings::where('status', 1)->get();

        foreach ($searchfeaturedlistings as $key => $wl) {
            $purchasessfitem = Purchasessearchfeatured::where('plan_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($purchasessfitem)) {
                $searchfeaturedlistings[$key]['is_buy'] = $purchasessfitem->status;
            } else {
                $searchfeaturedlistings[$key]['is_buy'] = 10;
            }
        }

        // dd($searchfeaturedlistings);

        $sellNow =  SellNow::where('user_id', Auth::user()->id)->get();

 return view('profile.search-plans-list', compact('searchfeaturedlistings', 'sellNow'));
    //   if(\Session::get('locale') == 'ar'){
            
    //      return view('arabic.profile.search-plans-list', compact('searchfeaturedlistings', 'sellNow'));
    //     }
    //     elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
            
    //       return view('profile.search-plans-list', compact('searchfeaturedlistings', 'sellNow'));
    //     }
    } 

    public function buy_featured_plans(Request $reqeust, $id)
    {
         
         
         


           $data['sellNow']=[];
  
               
        $data['todayDate'] = date("Y-m-d");
       $data['tommorowdate']= date("Y-m-d", strtotime("+1 day"));
       
        $data['plan'] = Searchfeaturedlistings::where('id', $id)->first();
        
       // $data['sellNow'] =  SellNow::where('user_id', Auth::user()->id)->where('is_approve', 1)->where('status_id', 1)->get();
        $data['sellNow'] =  SellNow::where('is_search_featured', 0)
                ->where('sell_now.user_id', Auth::user()->id)
                //->where('sell_now.is_approve', 1)
                ->get();
                
            // dd($data['sellNow']);
        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);
             $data['package_date']=Purchasespackagedate::where('plan_id',$id)->where('package_type',6)->max('package_date');
             
            //dd($data['package_date']);
        $data['admin_banks'] = AdminBank::where('is_active', 1)->get();
        
            
        
        
       // dd($data['admin_banks']);
        // if(\Session::get('locale') == 'ar'){
            
        //  return view('arabic.profile.buy-search-plans', $data);
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
            
        //   return view('profile.buy-search-plans', $data);
        // }
         return view('profile.buy-search-plans', $data);
    }



    public function buy_category_plans(Request $reqeust, $id)
    {
        $data['todayDate'] = date("Y-m-d");
        $data['tommorowdate']= date("Y-m-d", strtotime("+1 day"));

        $data['plan'] = Categoryfeaturedlistings::where('id', $id)->firstorfail();
        // dd($data['plan']);
         $arr=[];
        $data['category'] =[];
       $cat =  Category::join('sell_now','sell_now.category_id','categories.id')
        ->leftJoin('purchases_category_featured_items','purchases_category_featured_items.sell_now_id','sell_now.id')
        ->where('sell_now.user_id', Auth::user()->id)
//        ->where('sell_now.is_approve', 1)//->where('sell_now.status_id', 1)
                ->get(['categories.*','sell_now.id as sid','purchases_category_featured_items.sell_now_id as exid']);
                //dd($cat);
               // dd($data['category']);
              foreach($cat as $abc){
            
                  if($abc->exid==null){
                   
                     
                      array_push($arr,$abc->id);
                  }
              }

              $previousid='';
            for($i=0;$i<count($arr);$i++){
                
                if($previousid==$arr[$i]){
                    
                }else {
                    array_push($data['category'],Category::join('sell_now','sell_now.category_id','categories.id')
                     ->where('sell_now.user_id', Auth::user()->id)
        ->where('sell_now.is_approve', 1)->where('categories.id',$arr[$i])->first(['categories.*']));
                }
                $previousid=$arr[$i];
            }
           // dd($data['category']);
          
            // $a=DB::table('purchases_category_featured_items')->where('user_id',Auth::user()->id)->get();
            // foreach($a as $pct){
            // foreach($data['category'] as $cat){
                
            //         if($pct->sell_now_id !== $cat->sid){
            //             array_push($arr,$cat);
            //         }
            //     }
            // }
               
                
                
      
        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);
      //  $data['package_date']=Purchasespackagedate::where('plan_id',$id)->where('package_type',5)->max('package_date');
     //  dd($data['package_date']);    
            $data['admin_banks'] = AdminBank::where('is_active', 1)->get();
            
         /*echo "<pre>";
         print_r($data['admin_banks']);die;*/
        //  if(\Session::get('locale') == 'ar'){
            
        //  return view('arabic.profile.buy-category-plans', $data);
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
            
        //   return view('profile.buy-category-plans', $data);
        // }
        // dd($data);
       return view('profile.buy-category-plans', $data);
    }



    public function buy_brand_plans(Request $reqeust, $id)
    {
       $data['todayDate'] = date("Y-m-d");
       $data['tommorowdate']= date("Y-m-d", strtotime("+1 day"));

      
      
        //dd($data['category']);
        $data['plan'] = Brandfeaturedlistings::where('id', $id)->first();
        // dd($data['plan']);
        $data['brand'] =  Brand::join('sell_now','sell_now.brand_id','brands.id')->where('sell_now.user_id', Auth::user()->id)
        ->where('sell_now.is_approve', 1)
                ->where('sell_now.status_id', 1)->where('brands.status', 1)->groupby('brands.id')->get(['brands.*']);
               
       $data['package_date']=Purchasespackagedate::where('plan_id',$id)->where('package_type',4)->max('package_date');
       // dd($data['package_date']);

        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);
        $data['admin_banks'] = AdminBank::where('is_active', 1)->get();

        return view('profile.buy-brand-plans', $data);
    }



    public function buy_shop_plans(Request $reqeust, $id)
    {
       
            //dd($data['sellNow']);
        $data['todayDate'] = date("Y-m-d");
        $data['tommorowdate']= date("Y-m-d", strtotime("+1 day"));

        $data['plan'] = Shopfeaturedlistings::where('id', $id)->first();
        // dd($data['plan']);
         $data['sellNow'] =  SellNow::where('user_id', Auth::user()->id)
             ->where('is_approve', 1)
             ->where('status_id', 1)->get();
     
        //$data['sellNow']=[];
        $data['sellNow'] =  SellNow::where('sell_now.user_id', Auth::user()->id)
                ->where('sell_now.is_approve', 1)
                ->get();
                
          
        //$data['package_date']=Purchasespackagedate::where('plan_id',$id)->where('package_type',3)->max('package_date');
        // dd($data['sellNow']);

        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);
        $data['admin_banks'] = AdminBank::where('is_active',1)->get();
        
        return view('profile.buy-shop-plans', $data);
        
    }


    public function buy_hot_plans(Request $reqeust, $id)
    {
        //  dd($id);
        $data['plan'] = Hotfeaturedlistings::where('id', $id)->firstorfail();
        $data['sellNow'] =  SellNow::where('user_id', Auth::user()->id)
            ->where('is_approve', 1)
            ->where('status_id', 1)->get();


        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);


        return view('profile.buy-hot-plans', $data);
    }


    public function get_items(Request $request)
    {
        
$sellNow =  SellNow::whereIn('id', $request->items)->get();



        // for ($i = 0; $i < count($request->items); $i++) {
        //     $sellNow =  SellNow::where('id', $request->items[$i])->get();
        //     $brandDowns .= '<div class="row">';
        //     foreach ($sellNow as $p) {
        //         $brandDowns .= '<div class="col-lg-12 text-center"><input type="hidden" readonly name="product_id[]" class="form-control" value="' . $p->id . '"/><h2 class="colorBlack m-t-b-20 font-700 colorRed">' . ucfirst($p->ad_title) . '</h2></div>';
        //         $brandDowns .= ' <div class="col-md-4"></div><div class="col-md-4 get_append_tag">
        //         <input type="text" name="tags[]" value="" id="abctest" placeholder="eg. Keyword1,Keyword2,Keyword3" class="form-control m-t-20 text-center border-bottom-default" data-role="tagsinput" />
        //     </div><div class="col-md-4"></div>';
        //     }
        //     $brandDowns .= '</div>';
        // }

        // $brandDowns .= '<script>
        //                          $(document).ready(function(){
                                
        //                         }); </script>';

return view('profile.getitem',compact('sellNow' ));


        // return [
        //     'brandDowns' => $brandDowns,
        // ];
    }


    public function get_category_items(Request $request)
    {
      
      $plan_id = $request->plan_id;
      
    //   dd($plan_id);
      
    //   Purchasescategoryfeatured
    
    // $purchasescategoryfeatured =  Purchasescategoryfeatured::join('purchases_category_featured_items', 'purchases_category_featured_items.purchases_id', 'purchases_category_featured_listings.id')
    //                                                 ->where('plan_id', $request->plan_id)
    //                                                 ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);
      
      
    //   dd($purchasescategoryfeatured);
      
        $brandDowns = '';
        for ($i = 0; $i < count($request->items); $i++) {
            
            $sellNow =  SellNow::where('is_category_featured', 0)
            ->where('sell_now.category_id', $request->items[$i])
            ->where('sell_now.user_id', Auth::user()->id)
            //->where('sell_now.is_approve', 1)
            ->where('sell_now.status_id', 1)
                // ->where('purchases_category_featured_items.status','>', 1)
                // ->distinct('sell_now.id')
                ->get();
                
               
                
            // $brandDowns.='<div class="row">';
            foreach ($sellNow as $p) {
                     $brandDowns .= '<option value="' . $p->id . '">' . ucfirst($p->ad_title) . '</option>';
            }
        }
        // dd($request->items);
        
        // dd($sellNow);
    
        return [
            'brandDowns' => $brandDowns,
            'sellnow' => $sellNow,
        ];
        
        
    }




    public function get_brand_items(Request $request)
    {
        
        //   $sellNow =  SellNow::leftJoin('purchases_brand_featured_items', 'purchases_brand_featured_items.sell_now_id', 'sell_now.id')
        //     ->where('sell_now.brand_id', $request->items[$i])
        //         ->where('sell_now.user_id', Auth::user()->id)
        //         ->where('sell_now.is_approve', 1)
        //         // ->where('sell_now.status_id', 1)
        //         // ->where('purchases_category_featured_items.status','>', 1)
        //         // ->distinct('sell_now.id')
        //         ->get(['sell_now.*','purchases_brand_featured_items.sell_now_id as extraID']);
        $brandDowns = '';
        for ($i = 0; $i < count($request->items); $i++) {
            // $sellNow =  SellNow::where('brand_id', $request->items[$i])->where('is_approve', 1)->where('status_id', 1)->where('user_id', Auth::user()->id)->get();
           $sellNow =  SellNow::leftJoin('purchases_brand_featured_items', 'purchases_brand_featured_items.sell_now_id', 'sell_now.id')
            ->where('sell_now.brand_id', $request->items[$i])
                ->where('sell_now.user_id', Auth::user()->id)
                //->where('sell_now.is_approve', 1)
                //->where('sell_now.status_id', 1)
                // ->where('purchases_category_featured_items.status','>', 1)
                // ->distinct('sell_now.id')
                ->get(['sell_now.*','purchases_brand_featured_items.sell_now_id as extraID']);
            // $brandDowns.='<div class="row">';
            foreach ($sellNow as $p) {
                  if($p->extraID == null ){
                $brandDowns .= '<option value="' . $p->id . '">' . ucfirst($p->ad_title) . '</option>';
            }
            }
        }
        return [
            'brandDowns' => $brandDowns,
        ];
    }




    public function add_purchase_search_plan(Request $request, $id)
    { 
        
        
        // dd($request->all());
        
            $acc_id='';
            $emailmsg='';
            $phonemsg='';
            $notmsg = '';

        if (Auth::Check()) {

            $plan_id = $id;
            $payment_type = $request->payment_type;
            $knet_payment_type = $request->knet_payment_type;
            
            if($payment_type==1){
                $acc_id=$request->account;
                $emailmsg='Your Search Package Request Send to admin for approval';
                $phonemsg='HI, Your Search Package Request Send to admin for approval';
                $notmsg = 'Your Search Package Request Send to admin for approval';
            }
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;
            $data['start_date'] =$start_date ;
            $data['end_date']  =$end_date  ;    

            $date1 = date_create($data['start_date']);
            $date2 = date_create($data['end_date']);
    
            /*difference between two dates*/
            $diff  = date_diff($date1,$date2);
    
            $days  = $diff->format("%a");
        
        
        
            $dates = []; 
            $validate = Purchasessearchfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            // if (!empty($validate)) {


            //     return redirect('search-featured-plans')->with('success', 'Plan Already Added');

            //     // $validate->delete();
            //     // return [
            //     //     'status' => 'already'
            //     // ];
            // } else {

                $store = new Purchasessearchfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                 if($payment_type==1){
                $store->account_id=$acc_id;
                 }
                 if($payment_type==3 || $payment_type==4 || $payment_type==5){
                    $store->status=1;
                 }
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                if(!empty(Session::get('current_coins'))){ 

                    $goto = new  \App\Http\Controllers\HomeController();
                    $user_id =  $store->user_id;
                    $plan =  'Search Plan';
                    $ad_id = 0;
                    $plan_id = $store->plan_id;
                    $usedCoins  = 0; 
                    $usedCoins = Session::get('coin_used');
                    $currentCoins = 0; 
                    $currentCoins = Session::get('current_coins');
                    $type = "Debit";
                    Session::forget('current_coins');
                    Session::forget('coin_used');
                    $isActive = $goto->deductCoins($user_id,$plan,$ad_id,$plan_id,$usedCoins,$currentCoins,$type);
                    if($isActive == 1){ 
                        $store->status = 1; 
                        
                    }
                    
                }
                $store->save();
                  $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date'])),
                'package_id' => $store->id];
            
            
                for ($i=1; $i <= $days ; $i++) { 
                    $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date']. ' +'.$i.' day')),
                    'package_id' => $store->id];
                }
                
                 for ($i=0; $i < count($dates) ; $i++) { 
                 
                      $stores = new Purchasespackagedate();
                      $stores->package_date = $dates[$i]['dates'];
                      $stores->package_id = $dates[$i]['package_id'];
                      $stores->plan_id = $plan_id;
                      $stores->package_type = 6;
                      $stores->save();
                  
                 }

                $ID = $store->id;
                if($payment_type==3){
                    
                    $rtype='search_featured_plan';
                    $this->walletpay($ID,$total_amount,$rtype,$payment_type);
                    $emailmsg='Your Search Package Amount Deducted from your wallet successfully';
                    $phonemsg='HI, Your Search Package Amount Deducted from your wallet successfully';
                    $notmsg = 'Your Search Package Amount Deducted from your wallet successfully';
                }
                if($payment_type==4){
                    $rtype='Debit';
                                 
                    $getslot = DB::table('search_featured_listings')->select('search_featured_listings.title as plan_title')
                    ->where('search_featured_listings.id',$planid)    
                    ->first();
                    $this->coinwalletpay($plan_id,$total_amount,$rtype,$getslot->plan_title);
                      $emailmsg='Your Search Package Amount Deducted from your coin wallet successfully';
                    $phonemsg='HI, Your Search Package Amount Deducted from your coin wallet successfully';
                    $notmsg = 'Your Search Package Amount Deducted from your coin wallet successfully';
                }

                if($request->has('product_id') && $request->product_id){
                    $product_ids = !is_array($request->product_id) ? explode(',',$request->product_id) : $request->product_id;
                }

                if(count($product_ids)){
                    for ($i = 0; $i < count($product_ids); $i++) {

                        $stores = new Purchasessfitem();
                        $stores->purchases_id = $ID;
                        $stores->user_id = Auth::user()->id;
                        $stores->sell_now_id = $product_ids[$i];
                        $stores->keywords_list = 'zero';
                        if($payment_type==3 || $payment_type==4 || $payment_type==5){
                            $stores->status=1;
                        }
                        $stores->save();
                       
                        $IDD = $stores->id;

                        if (!empty($IDD)) {

                            $update = SellNow::where('id', $product_ids[$i])->update(['is_search_featured' => 1]);
                        }

                        //$keywords_list =  explode(",", $request->tags[$i]);
                         $a=$product_ids[$i];
           
                    
                        $abc = 'getval'.$a;  
                        // for ($ii = 0; $ii < count($keywords_list); $ii++) {


                        //     $storess = new Purchasessfitemkeyword();
                        //     $storess->item_id = $IDD;
                        //     // $storess->item_keyword = $keywords_list[$ii];
                        //     if($payment_type==3 || $payment_type==4){
                        //     $storess->status=1;
                        // }
                    //}
                    //$b=count($request->$abc);
                    
                    // dd($request->all());
                    
                        if(!empty($request->$abc) && count($request->$abc) > 0){
                            for($j=0;$j<count($request->$abc);$j++){
                                $storess = new Purchasessfitemkeyword();
                                $storess->item_id = $IDD;
                                $storess->item_keyword=$request->$abc[$j];
                                if($payment_type==3 || $payment_type==4 || $payment_type==5){
                                    $storess->status=1;
                                }
                                
                           
                                $storess->save();
                            }   
                        }
                    
                    }
                }
// 
// 
// 

    $userdetail = User::where('id',$user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', Auth::user()->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', Auth::user()->id)->first(); 
    $plan = SearchFeaturedListings::join('purchases_search_featured_listings as purchases','search_featured_listings.id','purchases.plan_id')
                                    ->where('search_featured_listings.id','purchases_plan_id')
                                    ->first(['search_featured_listings.title as plan_name']);
                                    
              
              if($useremailsetting->search_featured_ad_alerts == 1){
                if(!empty($plan)){
                    
                 $email_data = [
                        'package_name' =>$plan,
                        'email'=>$userdetail->email,
                        'user_name'=>$userdetail->name,
                        'via' => 'EMAIL', 
                        'source' => 'mail@simsar.com',
                    ];
                    
                     Mail::send('emails.admin.ad-request-sent', $data, function($message) use ($data) {
                     $message->subject('Ad created successfully on simsar.com');
                     $message->to($data['email'], $data['user_name']);
                });
                
                 $content = "<search featured  alert".$sellNowid."'> \" ".Session::get('title') . " </a> \" sent for approval to admin";
                $notify = new \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, Auth::user()->id);
                
                
                
                    
                    
                }
                else{
                     $email_data = [
                        
                        'package_name' =>'Random Plan',
                        'email'=>$userdetail->email,
                        'user_name'=>$userdetail->name,
                        'via' => 'EMAIL', 
                        'source' => 'mail@simsar.com',
                    ];
                }
                
                    // dd($email_data);
            //   Mail::send('emails.admin.search-featured-request-sent', $email_data, function($message) use ($email_data)
            //             {
            //                 $message->subject('Package Purchase – simsar.com');
            //                 $message->to($email_data['email'], $email_data['user_name']);
            //             });
              }
        
            
            
             $content = $notmsg;
             $notify = new  \App\Http\Controllers\HomeController();
             $notify->sendNotification($content, Auth::user()->id);
      

        if($usersmssetting->search_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = $phonemsg;
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
//  
    $transaction_id = ($request->has('transaction_id') && $request->transaction_id) ? '?transaction_id='.$request->transaction_id : '';
        
        $insertedId = $store->id;
        
        // dd($request->request);
        
        if($payment_type == 1){ 
            return view('test.thankyou');
        }
        else if($payment_type == 2){ 
            return view('test.thankyou');
        }
        else if($payment_type == 3){
            return view('test.walletThankyou');
        }else if($payment_type == 4){
            return view('test.coinwalletThankyou');
        }else if($payment_type == 5 ){ // credit
            return view('test.search-featured.knet',compact('insertedId','total_amount','knet_payment_type'));
        }else if($payment_type == 6){ // debit
            return view('test.knetDebit',compact('insertedId','total_amount','knet_payment_type'));
        }
    
    return redirect('en/thankyou/'.$payment_type.$transaction_id);
    
    
        // if($payment_type==1){ 
        //         return view('test.thankyou');
        //       }else if($payment_type==3){
        //           return view('test.walletThankyou');
        //       }else if($payment_type==4){
        //           return view('test.coinwalletThankyou');
        //       }
          //  }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }




    public function add_category_plan(Request $request, $id)
    {
        
         $acc_id='';
          $emailmsg='';
        $phonemsg='';
        $notmsg = '';

    //   dd($request->request);

        if (Auth::Check()) {

         


            $plan_id = $id;
            $payment_type = $request->payment_type;
            $knet_payment_type = $request->knet_payment_type;
             if($payment_type==1){
                $acc_id=$request->account;
               $emailmsg='Your Search Package Request Send to admin for approval';
                $phonemsg='HI, Your Search Package Request Send to admin for approval';
                $notmsg = 'Your Search Package Request Send to admin for approval';
            }
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;
            
               $data['start_date'] =$start_date ;
            $data['end_date']  =$end_date  ;    

            $date1 = date_create($data['start_date']);
            $date2 = date_create($data['end_date']);
    
            /*difference between two dates*/
            $diff  = date_diff($date1,$date2);
    
            $days  = $diff->format("%a");
        
        
        
              $dates = []; 
                
            $validate = Purchasescategoryfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            // if (!empty($validate)) {

            //     return redirect('category-featured-plans')->with('success', 'Plan Already Added');
            // } else {

                $store = new Purchasescategoryfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                if($payment_type==1){
                $store->account_id=$acc_id;
                 }
                 if($payment_type==3 || $payment_type==4 || $payment_type==5){
                    $store->status=1;
                 }
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                // if(!empty(Session::get('current_coins'))){ 

                //     $goto = new  \App\Http\Controllers\HomeController();
                //     $user_id =  $store->user_id;
                //     $plan =  'Category Plan';
                //     $ad_id = 0;
                //     $plan_id = $store->plan_id;
                //     $usedCoins  = 0; $usedCoins = Session::get('coin_used');
                //     $currentCoins = 0; $currentCoins = Session::get('current_coins');
                //     $type = "Debit";
                //     Session::forget('current_coins');
                //     Session::forget('coin_used');
                //     $isActive = $goto->deductCoins($user_id,$plan,$ad_id,$plan_id,$usedCoins,$currentCoins,$type);
                //     if($isActive == 1){ $store->status = 1; }
                    
                // }
                $store->save();
                      $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date'])),
                'package_id' => $store->id];
            
            
                for ($i=1; $i <= $days ; $i++) { 
                    $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date']. ' +'.$i.' day')),
                    'package_id' => $store->id];
                }
                
                 for ($i=0; $i < count($dates) ; $i++) { 
                 
                      $stores = new Purchasespackagedate();
                      $stores->package_date = $dates[$i]['dates'];
                      $stores->package_id = $dates[$i]['package_id'];
                      $stores->plan_id = $plan_id;
                      $stores->package_type = 5;
                      $stores->save();
                  
                 }
                $ID = $store->id;
                if($payment_type==3){
                    
                    $rtype='Category_Plan';
                    $this->walletpay($ID,$total_amount,$rtype,$payment_type);
                    $emailmsg='Package Purchase – simsar.com';
                    $phonemsg='HI, Your Category Search Plan Amount Deducted from your wallet successfully';
                    $notmsg = 'Your Category Search Plan Amount Deducted from your wallet successfully';
                }
                if($payment_type==4){
                    $rtype='Debit';
                                 
            $getslot = DB::table('category_featured_listings')->select('category_featured_listings.title as plan_title')
                    ->where('category_featured_listings.id',$plan_id)    
                    ->first();
                    
                    
                    
                    
                    $this->coinwalletpay($plan_id,$total_amount,$rtype,$getslot->plan_title);
                      $emailmsg='Your Category Search Plan Amount Deducted from your coin wallet successfully';
                    $phonemsg='HI, Your Category Search Plan Amount Deducted from your coin wallet successfully';
                    $notmsg = 'Your Category Search Plan Amount Deducted from your coin wallet successfully';
                }

                if($request->has('allproduct_id') && $request->allproduct_id){
                    $items = !is_array($request->allproduct_id) ? explode(',',$request->allproduct_id) : $request->allproduct_id;
                }

                if(count($items)){
                    for ($i = 0; $i < count($items); $i++) {

                        $stores = new Purchasescfitem();
                        $stores->purchases_id = $ID;
                        $stores->user_id = Auth::user()->id;
                        $stores->sell_now_id = $items[$i];
                        if($payment_type==3 || $payment_type==4 || $payment_type==5 ){
                            $stores->status=1;
                        }
                        $stores->save();

                        $IDD = $stores->id;

                        if (!empty($IDD)) {

                            $update = SellNow::where('id', $items[$i])->update(['is_category_featured' => 1]);
                            $ad_id = $items[$i];
                        }
                    }
                }

               // 
// 
// 
    // dd($ad_id);
    $sellnow = SellNow::where('id',$ad_id)->first();
    $userdetail = User::where('id',$user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', Auth::user()->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', Auth::user()->id)->first(); 
 

        if($useremailsetting->category_featured_ad_alerts == 1){ 
              $data = [
                 'user_name' => $userdetail->name, 
                 'email' => $userdetail->email,
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => $emailmsg, 
                 'ad_title' => $sellnow->ad_title,
                 'ad_id' => $ad_id
                 ];
                 
                 Mail::send('emails.admin.ad-request-sent', $data, function($message) use ($data) {
                    $message->to($data['email'], $data['user_name']);
                    $message->subject('Ad created successfully on simsar.com');
                    
                 });
                 
                    
                 $content = "<category featured  alert".$sellnow->id."'> \" ".Session::get('title') . " </a> \" sent for approval to admin";
                $notify = new \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, Auth::user()->id);   
                 
                 
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.admin.category-featured-ad-request-sent";
                $goto->sendEmail($view, $data);
        }
        
        
            //  $content = $notmsg;
            //  $notify = new  \App\Http\Controllers\HomeController();
            //  $notify->sendNotification($content, Auth::user()->id);
      

        if($usersmssetting->category_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = $phonemsg;
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        $transaction_id = ($request->has('transaction_id') && $request->transaction_id) ? '?transaction_id='.$request->transaction_id : '';
        
        $insertedId = $store->id;
        
        if($payment_type == 1){ 
            return view('test.thankyou');
        }else if($payment_type == 3){
            return view('test.walletThankyou');
        }else if($payment_type == 4){
            return view('test.coinwalletThankyou');
        }else if($payment_type == 5 ){ // credit
            return view('test.category-featured.knet',compact('insertedId','total_amount','knet_payment_type'));
        }else if($payment_type == 6){ // debit
            return view('test.knetDebit',compact('insertedId','total_amount','knet_payment_type'));
        }
        
        return redirect('en/thankyou/'.$payment_type.$transaction_id);
            //     if($payment_type==1){ 
            //     return view('test.thankyou');
            //   }else if($payment_type==3){
            //       return view('test.walletThankyou');
            //   }else if($payment_type==4){
            //       return view('test.coinwalletThankyou');
            //   }
        
           // }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }




    public function add_brand_plan(Request $request, $id)
    {
        $acc_id='';
        $emailmsg='';
        $phonemsg='';
        $notmsg = '';

        if (Auth::Check()) {

            $plan_id = $id;
            $payment_type = $request->payment_type;
            $knet_payment_type = $request->knet_payment_type;
            
            if($payment_type==1){
                $acc_id=$request->account;
               $emailmsg='Your Brand Request Send to admin for approval';
                $phonemsg='HI, Your Brand Request Send to admin for approval';
                $notmsg = 'Your Brand Request Send to admin for approval';
            }
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;
             $data['start_date'] =$start_date ;
            $data['end_date']  =$end_date  ;    

            $date1 = date_create($data['start_date']);
            $date2 = date_create($data['end_date']);
    
            /*difference between two dates*/
            $diff  = date_diff($date1,$date2);
    
            $days  = $diff->format("%a");
        
        
        
              $dates = []; 

            $validate = Purchasesbrandfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            // if (!empty($validate)) {

            //     return redirect('brand-featured-plans')->with('success', 'Plan Already Added');
            // } else {

                $store = new Purchasesbrandfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                 if($payment_type==1){
                $store->account_id=$acc_id;
                 }
                 if($payment_type==3 || $payment_type==4 || $payment_type==5 ){
                    $store->status=1;
                 }
                 
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                // if(!empty(Session::get('current_coins'))){ 

                //     $goto = new  \App\Http\Controllers\HomeController();
                //     $user_id =  $store->user_id;
                //     $plan =  'Brand Plan';
                //     $ad_id = 0;
                //     $plan_id = $store->plan_id;
                //     $usedCoins  = 0; $usedCoins = Session::get('coin_used');
                //     $currentCoins = 0; $currentCoins = Session::get('current_coins');
                //     $type = "Debit";
                //     Session::forget('current_coins');
                //     Session::forget('coin_used');
                //     $isActive = $goto->deductCoins($user_id,$plan,$ad_id,$plan_id,$usedCoins,$currentCoins,$type);
                //     if($isActive == 1){ $store->status = 1; }
                    
                // }
                $store->save();
                      $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date'])),
                'package_id' => $store->id];
            
            
                for ($i=1; $i <= $days ; $i++) { 
                    $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date']. ' +'.$i.' day')),
                    'package_id' => $store->id];
                }
                
                 for ($i=0; $i < count($dates) ; $i++) { 
                 
                      $stores = new Purchasespackagedate();
                      $stores->package_date = $dates[$i]['dates'];
                      $stores->package_id = $dates[$i]['package_id'];
                      $stores->plan_id = $plan_id;
                      $stores->package_type = 4;
                      $stores->save();
                  
                 }
                $ID = $store->id;
                  if($payment_type==3){
                    
                    $rtype='Brand_Plan';
                    $this->walletpay($ID,$total_amount,$rtype,$payment_type);
                    $emailmsg='Your Brand Amount Deducted from your wallet successfully';
                    $phonemsg='HI, Your Brand Amount Deducted from your wallet successfully';
                    $notmsg = 'Your BrandAmount Deducted from your wallet successfully';
                }
                if($payment_type==4){
                    $rtype='Debit';
                                 
            $getslot = DB::table('brand_featured_listings')->select('brand_featured_listings.title as plan_title')
                    ->where('brand_featured_listings.id',$plan_id)    
                    ->first();
                    $this->coinwalletpay($plan_id,$total_amount,$rtype,$getslot->plan_title);
                      $emailmsg='Your Brand Amount Deducted from your coin wallet successfully';
                    $phonemsg='HI, Your Brand Amount Deducted from your coin wallet successfully';
                    $notmsg = 'Your Brand Amount Deducted from your coin wallet successfully';
                }

                if($request->has('allproduct_id') && $request->allproduct_id){
                    $items = !is_array($request->allproduct_id) ? explode(',',$request->allproduct_id) : $request->allproduct_id;
                }

                if(count($items)){

                    for ($i = 0; $i < count($items); $i++) {

                        $stores = new Purchasesbfitem();
                        $stores->purchases_id = $ID;
                        $stores->user_id = Auth::user()->id;
                        $stores->sell_now_id = $items[$i];
                         if($payment_type==3 || $payment_type==4  || $payment_type==5){
                        $stores->status=1;
                         }
                        $stores->save();

                        $IDD = $stores->id;
       
                        if (!empty($IDD)) {

                            $update = SellNow::where('id', $items[$i])->update(['is_brand_featured' => 1]);
                        }
                    }
                }

                
                
                    $userdetail = User::where('id',$user_id)->first();
                    $useremailsetting = Useremailsetting::where('user_id', Auth::user()->id)->first(); 
                    $usersmssetting = Usersmssetting::where('user_id', Auth::user()->id)->first(); 
                 
                
                        if($useremailsetting->brand_featured_ad_alerts == 1){
                            
                              $data = [
                                 'full_name' => $userdetail->name, 
                                 'user_name' => $userdetail->name, 
                                 'email' => $userdetail->email,
                                 'verification_code' => '12345', 
                                 'via' => 'EMAIL', 
                                 'source' => $userdetail->email, 
                                 'subject' => $emailmsg, 
                                 ];
                                 
                                 
                            /*      Mail::send('emails.admin.ad-request-sent', $data, function($message) use ($data) {
                    $message->to($data['email'], $data['user_name']);
                    $message->subject('Ad created successfully on simsar.com');
                    
                 });*/
                 
                 $content = "<brand featured  alert".$userdetail."'> \" ".Session::get('title') . " </a> \" sent for approval to admin";
                $notify = new \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, Auth::user()->id);
                 
                 
                        
                                $goto = new  \App\Http\Controllers\HomeController();
                                $view = "emails.reset-password";
                                $goto->sendEmail($view, $data);
                        }
                        
                      
                     $content = $notmsg;
                     $notify = new  \App\Http\Controllers\HomeController();
                     $notify->sendNotification($content, Auth::user()->id);
             
             
                
                        if($usersmssetting->brand_featured_ad_alerts == 1){
                            if($userdetail->phone){
                                    $to = $userdetail->phone;
                                    $msg = $phonemsg;
                                    $goto = new  \App\Http\Controllers\HomeController();
                                    $goto->sendSMS($to, $msg);
                                
                            }
                        }
                        
                        
                // 
                // 
                // 


               
                    $transaction_id = ($request->has('transaction_id') && $request->transaction_id) ? '?transaction_id='.$request->transaction_id : '';
                    
                    $insertedId = $store->id;
                        
                    if($payment_type == 1){ 
                        return view('test.thankyou');
                    }else if($payment_type == 3){
                        return view('test.walletThankyou');
                    }else if($payment_type == 4){
                        return view('test.coinwalletThankyou');
                    }else if($payment_type == 5 ){ // credit
            return view('test.shop-featured.knet',compact('insertedId','total_amount','knet_payment_type'));
        }else if($payment_type == 6){ // debit
            return view('test.shop-featured.knetDebit',compact('insertedId','total_amount','knet_payment_type'));
        }
                        
                        return redirect('en/thankyou/'.$payment_type.$transaction_id);
            //     if($payment_type==1){ 
            //     return view('test.thankyou');
            //   }else if($payment_type==3){
            //       return view('test.walletThankyou');
            //   }else if($payment_type==4){
            //       return view('test.coinwalletThankyou');
            //   }
            //}
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }


    public function add_shop_plan(Request $request, $id)
    {
        $acc_id='';
        $emailmsg='';
        $phonemsg='';
        $notmsg = '';

        if (Auth::Check()) {

            $plan_id = $id;
            $payment_type = $request->payment_type;
            $knet_payment_type = $request->knet_payment_type;
            
             if($payment_type==1){
                $acc_id=$request->account;
               $emailmsg='Your shop Package Request Send to admin for approval';
                $phonemsg='HI, Your shop Package Request Send to admin for approval';
                $notmsg = 'Your shop Package Request Send to admin for approval';
            }
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;
            
            $data['start_date'] =$start_date ;
            $data['end_date']  =$end_date  ;    

            $date1 = date_create($data['start_date']);
            $date2 = date_create($data['end_date']);
    
            /*difference between two dates*/
            $diff  = date_diff($date1,$date2);
    
            $days  = $diff->format("%a");
        
        
        
              $dates = []; 

            // $validate = Purchasesshopfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();
    
            // if (!empty($validate)) {

            //     return redirect('shop-featured-plans')->with('success', 'Plan Already Added');
            // } else {

                $store = new Purchasesshopfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                 if($payment_type==1){
                $store->account_id=$acc_id;
                 }
                 if($payment_type==3 || $payment_type==4){
                    $store->status=1;
                 }
                 else if($payment_type==5 || $payment_type==6){
                    $store->status=0; // pendig status
                 }
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                // if(!empty(Session::get('current_coins'))){ 

                //     $goto = new  \App\Http\Controllers\HomeController();
                //     $user_id =  $store->user_id;
                //     $plan =  'Shop Plan';
                //     $ad_id = 0;
                //     $plan_id = $store->plan_id;
                //     $usedCoins  = 0; $usedCoins = Session::get('coin_used');
                //     $currentCoins = 0; $currentCoins = Session::get('current_coins');
                //     $type = "Debit";
                //     Session::forget('current_coins');
                //     Session::forget('coin_used');
                //     $isActive = $goto->deductCoins($user_id,$plan,$ad_id,$plan_id,$usedCoins,$currentCoins,$type);
                //     if($isActive == 1){ $store->status = 1; }
                    
                // }
                $store->save();
                  $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date'])),
                'package_id' => $store->id];
            
            
                for ($i=1; $i <= $days ; $i++) { 
                    $dates[] = ['dates'=>date('Y-m-d',strtotime($data['start_date']. ' +'.$i.' day')),
                    'package_id' => $store->id];
                }
                
                 for ($i=0; $i < count($dates) ; $i++) { 
                 
                      $stores = new Purchasespackagedate();
                      $stores->package_date = $dates[$i]['dates'];
                      $stores->package_id = $dates[$i]['package_id'];
                      $stores->plan_id = $plan_id;
                      $stores->package_type = 3;
                      $stores->save();
                  
                 }
                 
                $ID = $store->id;
                 if($payment_type==3){
                    
                    $rtype='Shop_Plan';
                    $this->walletpay($ID,$total_amount,$rtype,$payment_type);
                    $emailmsg='Your shop Package Amount Deducted from your wallet successfully';
                    $phonemsg='HI, Your shop Package Amount Deducted from your wallet successfully';
                    $notmsg = 'Your shop Package Amount Deducted from your wallet successfully';
                }
                if($payment_type==4){
                    $rtype='Debit';
                                 
            $getslot = DB::table('shop_featured_listings')->select('shop_featured_listings.title as plan_title')
                    ->where('shop_featured_listings.id',$plan_id)    
                    ->first();
                    $this->coinwalletpay($plan_id,$total_amount,$rtype,$getslot->plan_title);
                      $emailmsg='Your shop Package Amount Deducted from your coin wallet successfully';
                    $phonemsg='HI, Your shop Package Amount Deducted from your coin wallet successfully';
                    $notmsg = 'Your shop Package Amount Deducted from your coin wallet successfully';
                }


                // Save Items
                if($request->has('allproduct_id') && $request->allproduct_id){
                    $items = !is_array($request->allproduct_id) ? explode(',',$request->allproduct_id) : $request->allproduct_id;
                }

                if(count($items)){
                    for ($i = 0; $i < count($items); $i++) {

                        $stores = new Purchasesshfitem();
                        $stores->purchases_id = $ID;
                        $stores->user_id = Auth::user()->id;
                        $stores->sell_now_id = $items[$i];
                        if($payment_type==3 || $payment_type==4  || $payment_type==5){
                        $stores->status=1;
                     }

                        $stores->save();


                        $IDD = $stores->id;

                        if (!empty($IDD)) {

                            $update = SellNow::where('id', $items[$i])->update(['is_shop_featured' => 1]);
                        }
                    }
                }

    $userdetail = User::where('id',$user_id)->first();
    $useremailsetting = Useremailsetting::where('user_id', Auth::user()->id)->first(); 
    $usersmssetting = Usersmssetting::where('user_id', Auth::user()->id)->first(); 
 

        if($useremailsetting->your_shop_featured_ad_alerts == 1){
              $data = [
                 'full_name' => $userdetail->name, 
                 'user_name' => $userdetail->name, 
                 'email' => $userdetail->email,
                 'verification_code' => '12345', 
                 'via' => 'EMAIL', 
                 'source' => $userdetail->email, 
                 'subject' => $emailmsg, 
                 ];
                 
                 
               /*   Mail::send('emails.admin.ad-request-sent', $data, function($message) use ($data) {
                    $message->to($data['email'], $data['user_name']);
                    $message->subject('Ad created successfully on simsar.com');
                    
                 });*/
                 
                 $content = "<your shop featured  alert".$userdetail."'> \" ".Session::get('title') . " </a> \" sent for approval to admin";
                $notify = new \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, Auth::user()->id);
                 
        
                $goto = new  \App\Http\Controllers\HomeController();
                $view = "emails.reset-password";
                $goto->sendEmail($view, $data);
        }
        
        
         $content = $notmsg;
         $notify = new  \App\Http\Controllers\HomeController();
         $notify->sendNotification($content, Auth::user()->id);
      

        if($usersmssetting->your_shop_featured_ad_alerts == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = $phonemsg;
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
        
        
// 
// 
// 
        $transaction_id = ($request->has('transaction_id') && $request->transaction_id) ? '?transaction_id='.$request->transaction_id : '';
        $insertedId = $store->id;
        
        if($payment_type == 1){ 
            return view('test.thankyou');
        }else if($payment_type == 3){
            return view('test.walletThankyou');
        }else if($payment_type == 4){
            return view('test.coinwalletThankyou');
        }else if($payment_type == 5 ){ // credit
            return view('test.shop-featured.knet',compact('insertedId','total_amount','knet_payment_type'));
        }else if($payment_type == 6){ // debit
            return view('test.shop-featured.knetDebit',compact('insertedId','total_amount','knet_payment_type'));
        }
        
        return redirect('en/thankyou/'.$payment_type.$transaction_id);
            //      if($payment_type==1){ 
            //     return view('test.thankyou');
            //   }else if($payment_type==3){
            //       return view('test.walletThankyou');
            //   }else if($payment_type==4){
            //       return view('test.coinwalletThankyou');
            //   }
            //}
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }



    public function add_hot_plan(Request $request, $id)
    {


        if (Auth::Check()) {

            $plan_id = $id;
            $payment_type = $request->payment_type;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;

            $validate = Purchaseshotfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            if (!empty($validate)) {

                return redirect('hot-featured-plans')->with('success', 'Plan Already Added');
            } else {

                $store = new Purchaseshotfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                $store->save();

                $ID = $store->id;

                for ($i = 0; $i < count($request->allproduct_id); $i++) {

                    $store = new Purchaseshfitem();
                    $store->purchases_id = $ID;
                    $store->user_id = Auth::user()->id;
                    $store->sell_now_id = $request->allproduct_id[$i];

                    $store->save();
                }

                return redirect('hot-featured-plans')->with('success', 'Plan Added');
            }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }



    public function buy_search_featured_plans(Request $request)
    {
       
        if (Auth::Check()) {

            $plan_id = $request->plan_id;
            $payment_type = $request->payment_type;

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;

            $validate = Purchasessearchfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            if (!empty($validate)) {
                // $validate->delete();
                return [
                    'status' => 'already'
                ];
            } else {

                $store = new Purchasessearchfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                $store->save();

                $ID = $store->id;

                for ($i = 0; $i < count($request->product_items); $i++) {

                    $keywords_list =  implode(",", $request->keywords_list);

                    $store = new Purchasessfitem();
                    $store->purchases_id = $ID;
                    $store->user_id = Auth::user()->id;
                    $store->sell_now_id = $request->product_items[$i];
                    $store->keywords_list = $keywords_list;
                    $store->save();
                }


                return [
                    'status' => 'added'

                ];
            }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }


    public function category_featured_plans()
    {

        $categoryfeaturedlistings = Categoryfeaturedlistings::where('status', 1)->get();

        foreach ($categoryfeaturedlistings as $key => $wl) {
            $purchasessfitem = Purchasescategoryfeatured::where('plan_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($purchasessfitem)) {
                $categoryfeaturedlistings[$key]['is_buy'] = $purchasessfitem->status;
            } else {
                $categoryfeaturedlistings[$key]['is_buy'] = 10;
            }
        }



        // dd($categoryfeaturedlistings);

        // if(\Session::get('locale') == 'ar'){
            
        // return view('arabic.profile.category-plans-list', compact('categoryfeaturedlistings'));
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
            
        // return view('profile.category-plans-list', compact('categoryfeaturedlistings'));
        // }
         return view('profile.category-plans-list', compact('categoryfeaturedlistings'));
    }



    public function buy_category_featured_plans(Request $request)
    {

        if (Auth::Check()) {

            $plan_id = $request->plan_id;
            $payment_type = $request->payment_type;

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;

            $validate = Purchasescategoryfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            if (!empty($validate)) {
                // $validate->delete();
                return [
                    'status' => 'already'
                ];
            } else {
                $store = new Purchasescategoryfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                $store->user_id = $user_id;

                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                $store->save();
                return [
                    'status' => 'added'

                ];
            }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }

    public function brand_featured_plans()
    {

        $brandfeaturedlistings = Brandfeaturedlistings::where('status', 1)->get();

        foreach ($brandfeaturedlistings as $key => $wl) {
            $purchasessfitem = Purchasesbrandfeatured::where('plan_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($purchasessfitem)) {
                $brandfeaturedlistings[$key]['is_buy'] = $purchasessfitem->status;
            } else {
                $brandfeaturedlistings[$key]['is_buy'] = 10;
            }
        }


        // if(\Session::get('locale') == 'ar')
        // {
        //     return view('arabic.profile.brand-plans-list', compact('brandfeaturedlistings'));
        
        // }
        // elseif(\Session::get('locale')== 'en' || empty(\Session::get('locale'))){
            
        //     return view('profile.brand-plans-list', compact('brandfeaturedlistings'));
        // }   
        return view('profile.brand-plans-list', compact('brandfeaturedlistings'));
    }


    public function buy_brand_featured_plans(Request $request)
    {

        if (Auth::Check()) {

            $plan_id = $request->plan_id;
            $payment_type = $request->payment_type;

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;

            $validate = Purchasesbrandfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            if (!empty($validate)) {
                // $validate->delete();
                return [
                    'status' => 'already'
                ];
            } else {
                $store = new Purchasesbrandfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                $store->user_id = $user_id;

                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                $store->save();
                return [
                    'status' => 'added'

                ];
            }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }


    public function shop_featured_plans()
    {



        $shopfeaturedlistings = Shopfeaturedlistings::where('status', 1)->get();

        foreach ($shopfeaturedlistings as $key => $wl) {
            $purchasessfitem = Purchasesshopfeatured::where('plan_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($purchasessfitem)) {
                $shopfeaturedlistings[$key]['is_buy'] = $purchasessfitem->status;
            } else {
                $shopfeaturedlistings[$key]['is_buy'] = 10;
            }
        }

        // if(\Session::get('locale') == 'ar')
        // {
        //      return view('arabic.profile.shop-plans-list', compact('shopfeaturedlistings'));
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
            
        //     return view('profile.shop-plans-list', compact('shopfeaturedlistings'));
        
            
        // }
        
         return view('profile.shop-plans-list', compact('shopfeaturedlistings'));
         
    }


    public function buy_shop_featured_plans(Request $request)
    {

        if (Auth::Check()) {

            $plan_id = $request->plan_id;
            $payment_type = $request->payment_type;

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;

            $validate = Purchasesshopfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            if (!empty($validate)) {
                // $validate->delete();
                return [
                    'status' => 'already'
                ];
            } else {
                $store = new Purchasesshopfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                $store->user_id = $user_id;

                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                $store->save();
                return [
                    'status' => 'added'

                ];
            }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }

    public function hot_featured_plans()
    {



        $hotfeaturedlistings = Hotfeaturedlistings::where('status', 1)->get();
        foreach ($hotfeaturedlistings as $key => $wl) {
            $purchasessfitem = Purchaseshotfeatured::where('plan_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($purchasessfitem)) {
                $hotfeaturedlistings[$key]['is_buy'] = 1;
            } else {
                $hotfeaturedlistings[$key]['is_buy'] = 0;
            }
        }


        return view('profile.hot-plans-list', compact('hotfeaturedlistings'));
    }


    public function buy_hot_featured_plans(Request $request)
    {

        if (Auth::Check()) {

            $plan_id = $request->plan_id;
            $payment_type = $request->payment_type;

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;

            $validate = Purchaseshotfeatured::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            if (!empty($validate)) {
                // $validate->delete();
                return [
                    'status' => 'already'
                ];
            } else {
                $store = new Purchaseshotfeatured();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                $store->user_id = $user_id;

                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                $store->save();
                return [
                    'status' => 'added'

                ];
            }
        } else {
            return [
                'status' => 'notlogin'

            ];
        }
    }






    public function subscription_plans()
    {

        $subscriptionplans = Subscriptionplans::where('status', 1)->get();

        foreach ($subscriptionplans as $key => $wl) {
            $purchasessfitem = Purchasessubscription::where('plan_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($purchasessfitem)) {
                $subscriptionplans[$key]['is_buy'] = 1;
            } else {
                $subscriptionplans[$key]['is_buy'] = 0;
            }
        }
    
        // if(\Session::get('locale')=='ar')
        // {
        //     return view('arabic.profile.plans-list', compact('subscriptionplans'));
        // }
        // elseif(\Session::get('locale')=='en')
        // {
        //     return view('profile.plans-list', compact('subscriptionplans'));
        // }
 return view('profile.plans-list', compact('subscriptionplans'));
        
    }

    public function add_subscription_plan(Request $request)
    {



        if (Auth::Check()) {


            $plan_id = $request->id;
            $payment_type = $request->payment_type;

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $total_amount = $request->total_amount;
            $user_id = Auth::user()->id;

            $validate = Purchasessubscription::where('plan_id', $plan_id)->where('user_id', $user_id)->first();

            if (!empty($validate)) {
                // $validate->delete();

                return redirect('subscription-plans')->with('success', 'Plan Already Added');

                // return [
                //     'status' => 'already'
                // ];
            } else {

                $store = new Purchasessubscription();
                $store->plan_id = $plan_id;
                $store->payment_type = $payment_type;
                $store->user_id = $user_id;
                $store->start_date = $start_date;
                $store->end_date = $end_date;
                $store->total_amount = $total_amount;
                $store->save();


                $ID = $store->id;


                for ($i = 0; $i < count($request->allproduct_id); $i++) {

                    $storeitem = new Purchasessubscriptionitem();
                    $storeitem->purchase_id = $ID;
                    $storeitem->ads_id = $request->allproduct_id[$i];
                    $storeitem->save();
                }



                // return [
                //     'status' => 'added'

                // ];

                return redirect('subscription-plans')->with('success', 'Plan Added');
            }
        } else {



            return [
                'status' => 'notlogin'

            ];
        }
    }




    public function index()
    {

        $data['slider'] = Slider::where('status', 1)->get();
        return view('index', $data);
    }


    public function viewButton(Request $request)
    {

        $ad_id = \Crypt::decrypt($request->ad_id);
        $user_ip =  \Request::getClientIp(true);
        $date  = date("Y-m-d");


        $validate = View::where('ad_id', $ad_id)->where('user_ip', $user_ip)->where('date', $date)->first();

        if (!empty($validate)) {

            return [
                'status' => 'success',
                'url' => 'ad-detail/' . $ad_id,
            ];
        } else {

            $like = new View();
            $like->ad_id = $ad_id;
            $like->user_ip = $user_ip;
            $like->date = $date;
            $like->save();

            $viewCount = SellNow::where('id', $ad_id)->first('view_count');
            $oldCount = $viewCount->view_count;
            $newCount = $oldCount + 1;
            SellNow::where('id', $ad_id)->update(['view_count' => $newCount]);


            return [
                'status' => 'success',
                'url' => 'ad-detail/' . $ad_id,
            ];
        }
    }








    public function viewCategory(Request $request)
    {

        $ad_id = \Crypt::decrypt($request->ad_id);
        $user_ip =  \Request::getClientIp(true);
        $date  = date("Y-m-d");

        $validate = Viewcategory::where('cat_id', $ad_id)->where('user_ip', $user_ip)->where('date', $date)->first();

        if (!empty($validate)) {

            // return [
            //     'status' => 'success',
            //     'url' => 'product-detail/'.$ad_id,
            // ];

        } else {

            $like = new Viewcategory();
            $like->cat_id = $ad_id;
            $like->user_ip = $user_ip;
            $like->date = $date;
            $like->save();

            $viewCount = Category::where('id', $ad_id)->first('view_count');
            $oldCount = $viewCount->view_count;
            $newCount = $oldCount + 1;
            Category::where('id', $ad_id)->update(['view_count' => $newCount]);


            // return [
            //     'status' => 'success',
            //     'url' => 'product-detail/'.$ad_id,
            // ];


        }
    }




    public function get_slot_banner($id)
    {
        $todaydate=date('Y-m-d');
       $slot = Purchasesbannerads::join('banner_ads', 'banner_ads.id', 'purchases_banner_ads.plan_id')
            ->join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
            ->where('purchases_banner_ads.status', 1)
            ->where('banner_slots.title', '=', $id)
            //  ->where('banner_ads.page_id', '=', $idd)
             ->where('purchases_banner_ads.start_date','<=',$todaydate)
            ->first(['purchases_banner_ads.*', 'banner_ads.placement']);


        $defaultbanner = Bannerads::join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
            ->where('banner_slots.title', '=', $id)
            //  ->where('banner_ads.page_id', '=', $idd)
            ->first(['banner_ads.banner_img as defaultbanner']);
            

        if(!empty($slot)){
            
            return $slot;
            
        }
        else{
             return $defaultbanner;
        }
    }
    
    
    
     public function get_slot_banner_category($id,$idd,$category_id)
    {
        $todaydate=date('Y-m-d');
       $slot = Purchasesbannerads::join('banner_ads', 'banner_ads.id', 'purchases_banner_ads.plan_id')
            ->join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
            ->where('purchases_banner_ads.status', 1)
            ->where('banner_slots.title', '=', $id)
             ->where('banner_ads.page_id', '=', $idd)
             ->where('banner_ads.category_id', '=', $category_id)
             ->where('purchases_banner_ads.start_date','<=',$todaydate)
            ->first(['purchases_banner_ads.*', 'banner_ads.placement']);


        $defaultbanner = Bannerads::join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
            ->where('banner_slots.title', '=', $id)
             ->where('banner_ads.page_id', '=', $idd)
             ->where('banner_ads.category_id', '=', $category_id)
            ->first(['banner_ads.banner_img as defaultbanner']);
            

        if(!empty($slot)){
            
            return $slot;
            
        }
        else{
             return $defaultbanner;
        }
    }
    
    public function rightBack()
    {
        $webSetting = WebSetting::where('id', 1)->first();
        
        return view('pages.right-back', compact('webSetting'));
    }

public function testss(){
     
     return view('test.comingsoon');
     
     
}

    public function test()
    {
        $today = Carbon::now()->format('Y-m-d');
        
        $update_bump_up = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
            ->join('sell_now', 'purchases_bump_ads_items.ads_id', 'sell_now.id')
            ->where(function ($query) {
                $query->where('purchases_bump_ads.status', 1)
                ->orwhere('sell_now.is_bumpup_featured', 1);
            })
            ->whereDate('end_date', '<', $today)
            ->where('purchases_bump_ads.bump_placement', '=', 1)
            ->update(['status' => 0,'is_bumpup_featured'=>0]);
            
        $update_expired_ads = SellNow::whereDate('expiry_date', '<', $today)->update(['is_approve' => 3]);
        $update_offered_ads = SellNow::whereDate('offer_end_date', '<', $today)->update(['is_offer' => 0]);
        
        $update_is_brand_featured_ads = SellNow::where('is_approve', '1')
        ->join('purchases_brand_featured_items', function($join) {
            $join->on('purchases_brand_featured_items.sell_now_id', '=', 'sell_now.id')
            ->on('purchases_brand_featured_items.id', '=', DB::raw("(select max(id) from purchases_brand_featured_items WHERE purchases_brand_featured_items.sell_now_id = sell_now.id)"));
        })
        ->join('purchases_brand_featured_listings','purchases_brand_featured_listings.id','purchases_brand_featured_items.purchases_id')
        ->whereDate('end_date', '<', $today)
        ->update(['is_brand_featured'=>0]);
        
        $update0_is_category_featured_ads = SellNow::where('is_approve', '1')
        ->where('sell_now.is_category_featured', 1)
        ->join('purchases_category_featured_items', function($join) {
            $join->on('purchases_category_featured_items.sell_now_id', '=', 'sell_now.id')
            ->on('purchases_category_featured_items.id', '=', DB::raw("(select max(id) from purchases_category_featured_items WHERE purchases_category_featured_items.sell_now_id = sell_now.id)"));
        })
        ->join('purchases_category_featured_listings','purchases_category_featured_listings.id','purchases_category_featured_items.purchases_id', 'sell_now.*')
        ->whereDate('end_date', '<', $today)
        ->update(['is_category_featured'=>0]);
        
        
        $update_is_search_featured_ads = SellNow::where('is_approve', '1')
        ->where('sell_now.is_search_featured', 1)
        ->join('purchases_search_featured_items', function($join) {
            $join->on('purchases_search_featured_items.sell_now_id', '=', 'sell_now.id')
            ->on('purchases_search_featured_items.id', '=', DB::raw("(select max(id) from purchases_search_featured_items WHERE purchases_search_featured_items.sell_now_id = sell_now.id)"));
        })
        ->join('purchases_search_featured_listings','purchases_search_featured_items.purchases_id','purchases_search_featured_listings.id')
        ->select('purchases_search_featured_listings.end_date', 'sell_now.is_search_featured')
        ->whereDate('end_date', '<', $today)
        ->update(['is_search_featured'=>0]);
        // ->get();
        
        $update_is_shop_featured_ads = SellNow::where('is_approve', '1')
        ->where('sell_now.is_shop_featured', 1)
        ->join('purchases_shop_featured_items', function($join) {
            $join->on('purchases_shop_featured_items.sell_now_id', '=', 'sell_now.id')
            ->on('purchases_shop_featured_items.id', '=', DB::raw("(select max(id) from purchases_shop_featured_items WHERE purchases_shop_featured_items.sell_now_id = sell_now.id)"));
        })
        ->join('purchases_shop_featured_listings','purchases_shop_featured_listings.id','purchases_shop_featured_items.purchases_id', 'sell_now.*')
        ->whereDate('end_date', '<', $today)
        ->update(['is_shop_featured'=>0]);
        
        // ->get();
        
        // dd($update_is_search_featured_ads, '2022-9-19' < $today);

        // $update_bump_up;    
        // dd($update_expired_ads);    
        $data['bumupsetting'] = Bannersetting::where('page_id',1)->first();
      
      
      
        // $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
        //     //  ->join('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.sellid')
        //     ->where('purchases_bump_ads.status', 1)
        //     // ->where('end_date', '>=', $today)
        //     ->where('purchases_bump_ads.bump_placement', '=', 1)
        //     ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);

        // // dd($data['bumupads']);

        // foreach ($data['bumupads'] as $key => $wl) {
        //     $sellNow = SellNow::where('id', $wl->ads_id)->first();
        //     if (!empty($sellNow)) {
        //         // dd($sellNow);
              
        //         $data['bumupads'][$key]['title']=$sellNow->ad_title;
        //         $data['bumupads'][$key]['price']=$sellNow->price;
        //         $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
        //         $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
        //     }
        //     else {
              
        //         $data['bumupads'][$key]['title']=0;
        //         $data['bumupads'][$key]['price']=0;     
        //         $data['bumupads'][$key]['disprice']=0;
        //         $data['bumupads'][$key]['bannerimage'] = 0;
        //     }
        // }
$data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads as purchaseTable', 'purchaseTable.id', 'purchases_bump_ads_items.purchase_id')
                                   ->join('sell_now', 'sell_now.id','purchases_bump_ads_items.ads_id')
                                    ->where('purchaseTable.status', 1)
                                    ->where('purchaseTable.bump_placement', '=', 1)
                                    ->get(['purchases_bump_ads_items.*','purchaseTable.bump_placement',
                                           'sell_now.id as sellid','sell_now.ad_title as title',
                                           'sell_now.price as price','sell_now.dis_price as disprice'
                                           ,'sell_now.main_image as bannerimage']);

        $data['slotA'] = $this->get_slot_banner('A',1);
        $data['slotB'] = $this->get_slot_banner('B',1);
        $data['slotC'] = $this->get_slot_banner('C',1);
        $data['slotD'] = $this->get_slot_banner('D',1);
        $data['slotE'] = $this->get_slot_banner('E',1);
        $data['slotF'] = $this->get_slot_banner('F',1);
        $data['slotG'] = $this->get_slot_banner('G',1);
        $data['slotH'] = $this->get_slot_banner('H',1);
        $data['slotI'] = $this->get_slot_banner('I',1);
        

        
 

        $data['bumupadsSetting'] = Bumpupsetting::where('id', 1)->first();


        if (Auth::Check()) {

            $data['SellNow']  = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                       
                                        ->orderBy('sell_now.created_at','desc')
                                        //->orderBy('sell_now.id', 'desc')
                                        ->where('sell_now.is_approve', 1)
                                        // ->where('sell_now.status_id', 1)
                                        
                                        // ->orWhere('sell_now.is_featured',1)
                                        // ->orWhere('sell_now.is_bumpup_featured',1)
                                        // ->orWhere('sell_now.is_search_featured',1)
                                        // ->orWhere('sell_now.is_category_featured',1)
                                        // ->orWhere('sell_now.is_brand_featured',1)
                                        // ->orWhere('sell_now.is_shop_featured',1)
                                        // ->orWhere('sell_now.is_hot_featured',1)
                                        // ->orderBy('sell_now.is_featured','desc')
                                        //  ->orderBy('sell_now.is_bumpup_featured','desc')
                                        //   ->orderBy('sell_now.is_search_featured','desc')
                                        //   ->orderBy('sell_now.is_category_featured','desc')
                                        //     ->orderBy('sell_now.is_brand_featured','desc')
                                        //   ->orderBy('sell_now.is_shop_featured','desc')
                                        //     ->orderBy('sell_now.is_hot_featured','desc')
                                        
                                        ->distinct()
                                        
                                        ->get([
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);



    
//dd($data['SellNow']);

            foreach ($data['SellNow'] as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $data['SellNow'][$key]['is_wishlist'] = 1;
                } else {
                    $data['SellNow'][$key]['is_wishlist'] = 0;
                }
            }
            
            
            
        } else {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->orderBy('sell_now.id', 'desc')
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)
                                        ->get([
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);
        }

           
        $data['slider']  = Slider::where('status', 1)->get();

        // if(\Session::get('locale') == 'ar'){
            
        //     return view('arabic.test.index', $data);
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
            
        //     return view('test.index', $data);
        // }
        // dd($data['bumupads']);
        // dd($data['SellNow']);
        return view('test.index', $data);
    }



public function check_bumpup_featured_approve($product_id){
    
    
    
}
public function check_search_featured_approve($product_id){
    
    
    $purchasessfitem = Purchasessfitem::where('sell_now_id',$product_id)->where('status',1)->first();
    
    
    if(!empty($purchasessfitem) ){
        return 1;
    }
    else{
        return 0;
    }
    
}
public function check_category_featured_approve($product_id){}
public function check_brand_featured_approve($product_id){}
public function check_shop_featured_approve($product_id){}
public function check_hot_featured_approve($product_id){}


    public function home_featured()
    {

        $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
            //   ->join('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.sellid')
            ->where('purchases_bump_ads.status', 1)
            ->where('purchases_bump_ads.bump_placement', '=', 1)
            ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.*']);


            foreach ($data['bumupads'] as $key => $wl) {
                $sellNow = SellNow::where('id', $wl->ads_id)->first();
                if (!empty($sellNow)) {
                    
                    $data['bumupads'][$key]['title']=$sellNow->ad_title;
                    $data['bumupads'][$key]['price']=$sellNow->price;
                    $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
                  
                    $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
                } else {
                 
                    $data['bumupads'][$key]['title']=0;
                    $data['bumupads'][$key]['price']=0;     
                    $data['bumupads'][$key]['disprice']=0;
                    $data['bumupads'][$key]['bannerimage'] = 0;
                }
            }


        $data['bumupadsSetting'] = Bumpupsetting::where('id', 1)->first();

        $data['slotA'] = $this->get_slot_banner('A',1);
        $data['slotB'] = $this->get_slot_banner('B',1);
        $data['slotC'] = $this->get_slot_banner('C',1);
        $data['slotD'] = $this->get_slot_banner('D',1);
        $data['slotE'] = $this->get_slot_banner('E',1);
        $data['slotF'] = $this->get_slot_banner('F',1);
        $data['slotG'] = $this->get_slot_banner('G',1);
        $data['slotH'] = $this->get_slot_banner('H',1);
      

        if (Auth::Check()) {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                        ->orderBy('sell_now.id', 'desc')
                                        //  ->where('sell_now.is_featured', 1)
                                        // ->where('sell_now.is_approve', 1)
                                        // ->where('sell_now.status_id', 1)
                                        ->orWhere('sell_now.is_bumpup_featured','>', 0)
                                        ->orWhere('sell_now.is_search_featured','>', 0)
                                        ->orWhere('sell_now.is_category_featured','>', 0)
                                        ->orWhere('sell_now.is_brand_featured','>', 0)
                                        ->orWhere('sell_now.is_shop_featured','>', 0)
                                        ->orWhere('sell_now.is_hot_featured','>', 0)
                                        ->distinct()
                                        ->get([
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);
                
                  foreach ($data['SellNow'] as $key => $wl) {
                      
                      $data['SellNow'][$key]['is_bumpup_featured_approve'] = 0;
                      $data['SellNow'][$key]['is_search_featured_approve'] = $this->check_search_featured_approve($wl->id);
                      $data['SellNow'][$key]['is_category_featured_approve'] = 0;
                      $data['SellNow'][$key]['is_brand_featured_approve'] = 0;
                      $data['SellNow'][$key]['is_shop_featured_approve'] = 0;
                      $data['SellNow'][$key]['is_hot_featured_approve'] = 0;
                      
                    $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                    if (!empty($wishlist)) {
                        $data['SellNow'][$key]['is_wishlist'] = 1;
                    } else {
                        $data['SellNow'][$key]['is_wishlist'] = 0;
                    }
                    
                }
//   dd($data['SellNow']);

            // foreach ($data['SellNow'] as $key => $wl) {
            //     $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
            //     if (!empty($wishlist)) {
            //         $data['SellNow'][$key]['is_wishlist'] = 1;
            //     } else {
            //         $data['SellNow'][$key]['is_wishlist'] = 0;
            //     }



            //     // 
            //     $purchasescategoryfeatured  = Purchasesshopfeatured::join('purchases_shop_featured_items', 'purchases_shop_featured_items.purchases_id', 'purchases_shop_featured_listings.id')
            //         ->where('purchases_shop_featured_listings.status', 1)
            //         ->where('purchases_shop_featured_items.sell_now_id', $wl->id)->first();
            //     // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


            //     if (!empty($purchasescategoryfeatured)) {
            //         $data['SellNow'][$key]['is_shop_featured'] = 1;
            //     } else {
            //         $data['SellNow'][$key]['is_shop_featured'] = 0;
            //     }
            //     //  


            //     $purchasesbrandfeatured  = Purchasesbrandfeatured::join('purchases_brand_featured_items', 'purchases_brand_featured_items.purchases_id', 'purchases_brand_featured_listings.id')
            //         ->where('purchases_brand_featured_listings.status', 1)
            //         ->where('purchases_brand_featured_items.sell_now_id', $wl->id)->first();
            //     // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


            //     if (!empty($purchasesbrandfeatured)) {
            //         $data['SellNow'][$key]['is_brand_featured'] = 1;
            //     } else {
            //         $data['SellNow'][$key]['is_brand_featured'] = 0;
            //     }

            //     //  


            //     $purchasescategoryfeatured  = Purchasescategoryfeatured::join('purchases_category_featured_items', 'purchases_category_featured_items.purchases_id', 'purchases_category_featured_listings.id')
            //         ->where('purchases_category_featured_listings.status', 1)
            //         ->where('purchases_category_featured_items.sell_now_id', $wl->id)->first();
            //     // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


            //     if (!empty($purchasescategoryfeatured)) {
            //         $data['SellNow'][$key]['is_category_featured'] = 1;
            //     } else {
            //         $data['SellNow'][$key]['is_category_featured'] = 0;
            //     }
            // }
            
            
            
        } else {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->orderBy('sell_now.id', 'desc')
                                        //  ->where('sell_now.is_featured', 1)
                                        // ->where('sell_now.is_approve', 1)
                                        // ->where('sell_now.status_id', 1)
                                        
                                        ->orWhere('sell_now.is_bumpup_featured','>', 0)
                                        ->orWhere('sell_now.is_search_featured','>', 0)
                                        ->orWhere('sell_now.is_category_featured','>', 0)
                                        ->orWhere('sell_now.is_brand_featured','>', 0)
                                        ->orWhere('sell_now.is_shop_featured','>', 0)
                                        ->orWhere('sell_now.is_hot_featured','>', 0)
                                        ->get([
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);

                foreach ($data['SellNow'] as $key => $wl) {
                      
                      $data['SellNow'][$key]['is_bumpup_featured_approve'] = 1;
                      $data['SellNow'][$key]['is_search_featured_approve'] = 1;
                      $data['SellNow'][$key]['is_category_featured_approve'] = 1;
                      $data['SellNow'][$key]['is_brand_featured_approve'] = 1;
                      $data['SellNow'][$key]['is_shop_featured_approve'] = 1;
                      $data['SellNow'][$key]['is_hot_featured_approve'] = 1;
                    
                }


            // foreach ($data['SellNow'] as $key => $wl) {

            //     // 
            //     $purchasescategoryfeatured  = Purchasesshopfeatured::join('purchases_shop_featured_items', 'purchases_shop_featured_items.purchases_id', 'purchases_shop_featured_listings.id')
            //         ->where('purchases_shop_featured_listings.status', 1)
            //         ->where('purchases_shop_featured_items.sell_now_id', $wl->id)->first();
            //     // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


            //     if (!empty($purchasescategoryfeatured)) {
            //         $data['SellNow'][$key]['is_shop_featured'] = 1;
            //     } else {
            //         $data['SellNow'][$key]['is_shop_featured'] = 0;
            //     }
            //     //  


            //     $purchasesbrandfeatured  = Purchasesbrandfeatured::join('purchases_brand_featured_items', 'purchases_brand_featured_items.purchases_id', 'purchases_brand_featured_listings.id')
            //         ->where('purchases_brand_featured_listings.status', 1)
            //         ->where('purchases_brand_featured_items.sell_now_id', $wl->id)->first();
            //     // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


            //     if (!empty($purchasesbrandfeatured)) {
            //         $data['SellNow'][$key]['is_brand_featured'] = 1;
            //     } else {
            //         $data['SellNow'][$key]['is_brand_featured'] = 0;
            //     }

            //     //  


            //     $purchasescategoryfeatured  = Purchasescategoryfeatured::join('purchases_category_featured_items', 'purchases_category_featured_items.purchases_id', 'purchases_category_featured_listings.id')
            //         ->where('purchases_category_featured_listings.status', 1)
            //         ->where('purchases_category_featured_items.sell_now_id', $wl->id)->first();
            //     // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


            //     if (!empty($purchasescategoryfeatured)) {
            //         $data['SellNow'][$key]['is_category_featured'] = 1;
            //     } else {
            //         $data['SellNow'][$key]['is_category_featured'] = 0;
            //     }
            // }
            
            
        }


        // $data['sellnowsort'] = '';
        // foreach ($data['SellNow'] as $key => $wl) {
        //     if ($wl->is_shop_featured == 1 || $wl->is_brand_featured == 1 || $wl->is_category_featured == 1) {
        //         $sellnowsort[] = $wl;
        //     }
        //     else{
        //         // $sellnowsort = '';
        //     }
        // }

// dd($data['SellNow']);

        $data['sellnowsort'] = $data['SellNow'];
        
        $data['bumupsetting'] = Bannersetting::where('page_id',1)->first();


        
        $data['slider'] = Slider::where('status', 1)->get();

        return view('test.featured', $data);
    }




    public function home_offers()
    {


$data['bumupsetting'] = Bannersetting::where('page_id',1)->first();

        $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
            // ->join('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.sellid')
            ->where('purchases_bump_ads.status', 1)
            ->where('purchases_bump_ads.bump_placement', '=', 1)
            ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);



        foreach ($data['bumupads'] as $key => $wl) {
            $sellNow = SellNow::where('id', $wl->ads_id)->first();
             if (!empty($sellNow)) {
               
                $data['bumupads'][$key]['title']=$sellNow->ad_title;
                $data['bumupads'][$key]['price']=$sellNow->price;
                $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
                $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
            } else {
                
                $data['bumupads'][$key]['title']=0;
                $data['bumupads'][$key]['price']=0;     
                $data['bumupads'][$key]['disprice']=0;
                $data['bumupads'][$key]['bannerimage'] = 0;
            }
        }

        $data['bumupadsSetting'] = Bumpupsetting::where('id', 1)->first();



        $data['slotA'] = $this->get_slot_banner('A',1);
        $data['slotB'] = $this->get_slot_banner('B',1);
        $data['slotC'] = $this->get_slot_banner('C',1);
        $data['slotD'] = $this->get_slot_banner('D',1);
        $data['slotE'] = $this->get_slot_banner('E',1);
        $data['slotF'] = $this->get_slot_banner('F',1);
        $data['slotG'] = $this->get_slot_banner('G',1);
        $data['slotH'] = $this->get_slot_banner('H',1);
        $data['slotI'] = $this->get_slot_banner('I',1);

        if (Auth::Check()) {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                        ->orderBy('sell_now.id', 'desc')
                                        ->where('sell_now.is_offer', 1)
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)

                                        ->distinct()
                                        ->get([
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);

            foreach ($data['SellNow'] as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $data['SellNow'][$key]['is_wishlist'] = 1;
                } else {
                    $data['SellNow'][$key]['is_wishlist'] = 0;
                }
            }
        } else {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('user_map_location', 'user_map_location.id', 'sell_now.map_id')
                                        ->orderBy('sell_now.id', 'desc')
                                        ->where('sell_now.is_offer', 1)
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)
                                        ->get([
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);
        }

        $data['slider'] = Slider::where('status', 1)->get();
        return view('test.index', $data);
    }



    public function home_latest()
    {

$data['bumupsetting'] = Bannersetting::where('page_id',1)->first();

        $last_7_days = Carbon::now()->subDays(7);
        $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
            //  ->join('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.sellid')
            ->where('purchases_bump_ads.status', 1)
            ->where('purchases_bump_ads.bump_placement', '=', 1)
            ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);





        foreach ($data['bumupads'] as $key => $wl) {
            $sellNow = SellNow::where('id', $wl->ads_id)->first();
             if (!empty($sellNow)) {
                
                $data['bumupads'][$key]['title']=$sellNow->ad_title;
                $data['bumupads'][$key]['price']=$sellNow->price;
                $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
                $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
            } else {
               
                $data['bumupads'][$key]['title']=0;
                $data['bumupads'][$key]['price']=0;     
                $data['bumupads'][$key]['disprice']=0;
                $data['bumupads'][$key]['bannerimage'] = 0;
            }
        }

        $data['bumupadsSetting'] = Bumpupsetting::where('id', 1)->first();




        $data['slotA'] = $this->get_slot_banner('A',1);
        $data['slotB'] = $this->get_slot_banner('B',1);
        $data['slotC'] = $this->get_slot_banner('C',1);
        $data['slotD'] = $this->get_slot_banner('D',1);
        $data['slotE'] = $this->get_slot_banner('E',1);
        $data['slotF'] = $this->get_slot_banner('F',1);
        $data['slotG'] = $this->get_slot_banner('G',1);
        $data['slotH'] = $this->get_slot_banner('H',1);
         $data['slotI'] = $this->get_slot_banner('I',1);

        if (Auth::Check()) {

            $data['SellNow']  = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                        ->where('sell_now.created_at', '>=', $last_7_days)
                                        ->orderBy('sell_now.created_at', 'desc')
                                          ->where('sell_now.is_latest', 1)
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)
                                        ->distinct()
                                        ->get([
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);

            foreach ($data['SellNow']  as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $data['SellNow'][$key]['is_wishlist'] = 1;
                } else {
                    $data['SellNow'][$key]['is_wishlist'] = 0;
                }
            }
        } else {

            $data['SellNow']  = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->where('sell_now.created_at', '>=', $last_7_days)
                                        ->orderBy('sell_now.created_at', 'desc')
                                        //  ->where('sell_now.is_latest', 1)
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)
                                        ->get([
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);
        }



        // dd($data['SellNow']);

        $data['slider'] = Slider::where('status', 1)->get();
        return view('test.index', $data);
    }



public function child_category_product(Request $request, $slug){
    
        $data['bumupsetting'] = Bannersetting::where('page_id',7)->first();
        
        
       
        $data['bumupadsSetting'] = Bumpupsetting::where('id', 7)->first();
        
        $data['subCategory']  = SubCategory::where('slug', $slug)->first();
        $subcategory=($data['subCategory']->id);
        
        $CommonController = new CommonController();
        
        
        // dd('sub', $data['bumupsetting'] );
        
        $data['slotA'] = $CommonController->get_slot_banner_category('A',7,$data['subCategory']->id);
        $data['slotB'] = $CommonController->get_slot_banner_category('B',7,$data['subCategory']->id);
        $data['slotC'] = $CommonController->get_slot_banner_category('C',7,$data['subCategory']->id);
        $data['slotD'] = $CommonController->get_slot_banner_category('D',7,$data['subCategory']->id);
        $data['slotE'] = $CommonController->get_slot_banner_category('E',7,$data['subCategory']->id);
        $data['slotF'] = $CommonController->get_slot_banner_category('F',7,$data['subCategory']->id);
        $data['slotG'] = $CommonController->get_slot_banner_category('G',7,$data['subCategory']->id);
        $data['slotH'] = $CommonController->get_slot_banner_category('H',7,$data['subCategory']->id);
        $data['slotI'] = $CommonController->get_slot_banner_category('I',7,$data['subCategory']->id);
        
        
        $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads as purchaseTable', 'purchaseTable.id', 'purchases_bump_ads_items.purchase_id')
                                   ->join('sell_now', 'sell_now.id','purchases_bump_ads_items.ads_id')
                                    ->where('purchaseTable.status', 1)
                                    ->where('purchaseTable.bump_placement', '=', 7)
                                    ->get(['purchases_bump_ads_items.*','purchaseTable.bump_placement',
                                           'sell_now.id as sellid','sell_now.ad_title as title',
                                           'sell_now.price as price','sell_now.dis_price as disprice'
                                           ,'sell_now.main_image as bannerimage']);
                                           
        // $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
        //     ->where('purchases_bump_ads.status', 1)
        //     ->where('purchases_bump_ads.category_id', $data['subCategory']->id)
        //     ->where('purchases_bump_ads.bump_placement', '=', 7)
        //     ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);
            
            
        // foreach ($data['bumupads'] as $key => $wl) {
        //     $sellNow = SellNow::where('id', $wl->ads_id)->first();
        //      if (!empty($sellNow)) {
        //         $data['bumupads'][$key]['title']=$sellNow->ad_title;
        //         $data['bumupads'][$key]['price']=$sellNow->price;
        //         $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
        //         $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
        //     } else {
        //         $data['bumupads'][$key]['title']=0;
        //         $data['bumupads'][$key]['price']=0;     
        //         $data['bumupads'][$key]['disprice']=0;
        //         $data['bumupads'][$key]['bannerimage'] = 0;
        //     }
        // }
            
         $data['attributes']  = SubCategory::join('attributes', 'attributes.sub_category_id', 'sub_categories.id')
            ->join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
            ->where('sub_categories.category_id', $data['subCategory']->category_id)
            ->where('attributes.deleted_at', Null)
            ->distinct()
            ->get([
                'sub_categories.*', 'attributes.attributes_id', 'all_attributes.title as attributestitle',
                'all_attributes.slug as attributesslug', 'all_attributes.id as attributesid'
            ]);


        $data['properties']  = SubCategory::join('attributes', 'attributes.sub_category_id', 'sub_categories.id')
            ->join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
            ->join('properties', 'properties.attribute_id', 'all_attributes.id')
            ->where('sub_categories.category_id', $data['subCategory']->category_id)
            ->where('sub_categories.deleted_at', Null)
            ->where('attributes.deleted_at', Null)
            ->where('all_attributes.deleted_at', Null)
            ->where('properties.deleted_at', Null)
            ->distinct()
            ->get([
                'sub_categories.*', 'attributes.attributes_id', 'all_attributes.title as attributestitle',
                'all_attributes.slug as attributesslug', 'all_attributes.id as attributesid', 'properties.id as propertiesid', 'properties.title as propertiestitle'
            ]);







        if (Auth::Check()) {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                        
                                        //->orderBy('sell_now.id', 'desc')
                                        ->where('sell_now.sub_category_id', $subcategory)
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)
                                        ->orderBy('sell_now.is_category_featured','desc')
                                        ->orderBy('sell_now.created_at','desc')
                                        ->distinct()
                                        ->paginate(50, [
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);

            foreach ($data['SellNow'] as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $data['SellNow'][$key]['is_wishlist'] = 1;
                } else {
                    $data['SellNow'][$key]['is_wishlist'] = 0;
                }


                $purchasescategoryfeatured  = Purchasescategoryfeatured::join('purchases_category_featured_items', 'purchases_category_featured_items.purchases_id', 'purchases_category_featured_listings.id')
                    ->where('purchases_category_featured_listings.status', 1)
                    ->where('purchases_category_featured_items.sell_now_id', $wl->id)->first();
                // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


                if (!empty($purchasescategoryfeatured)) {
                    $data['SellNow'][$key]['is_category_featured'] = 1;
                } else {
                    $data['SellNow'][$key]['is_category_featured'] = 0;
                }
            }
          //  dd($data['SellNow']);
        } 
        else {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        //->orderBy('sell_now.id', 'desc')
                                        ->where('sell_now.sub_category_id', $data['subCategory']->category_id)
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)
                                        ->orderBy('sell_now.is_category_featured','desc')
                                        ->orderBy('sell_now.created_at','desc')
                                        ->paginate(50, [
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);

            foreach ($data['SellNow'] as $key => $wl) {
                $purchasescategoryfeatured  = Purchasescategoryfeatured::join('purchases_category_featured_items', 'purchases_category_featured_items.purchases_id', 'purchases_category_featured_listings.id')
                    ->where('purchases_category_featured_listings.status', 1)
                    ->where('purchases_category_featured_items.sell_now_id', $wl->id)->first();
                // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


                if (!empty($purchasescategoryfeatured)) {
                    $data['SellNow'][$key]['is_category_featured'] = 1;
                } else {
                    $data['SellNow'][$key]['is_category_featured'] = 0;
                }
            }
        }

        $adDetail = \App\Models\Category::join('sell_now', 'categories.id', 'sell_now.category_id')
                             ->where('categories.id', $data['subCategory']->category_id)
                             ->where('sell_now.status_id', 1)
                             ->where('sell_now.is_approve', 1)
                             ->distinct()->get('sell_now.*');

        //dd($data['SellNow']);
        \App\Helpers\Helper::set_data1_for_filters($data, $adDetail);
        
       
        // if(\Session::get('locale') == 'ar'){
        //   return view('arabic.test.categories', $data);
        //   }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
        //   return view('test.categories', $data);
        // }
         return view('test.sub-category', $data);
    
}

    public function category_product(Request $request, $slug)
    {

        
        $data['bumupsetting'] = Bannersetting::where('page_id',3)->first();
        $data['bumupadsSetting'] = Bumpupsetting::where('id', 3)->first();
        
        // $data['brand']  = Brand::where('status', 1)->get();//optimization-we are settig it accordig to ad_ids in set_data1
        // $data['categorylist']   = Category::where('status', 1)->get();//optimization-we are settig it accordig to ad_ids in set_data1
        $data['category']  = Category::where('slug', $slug)->first();
        
        $data['subCategory']  = SubCategory::where('category_id', $data['category']->id)->get();
        
         $CommonController = new CommonController();
         
        $data['slotA'] = $CommonController->get_slot_banner_category('A',3,$data['category']->id);
        $data['slotB'] = $CommonController->get_slot_banner_category('B',3,$data['category']->id);
        $data['slotC'] = $CommonController->get_slot_banner_category('C',3,$data['category']->id);
        $data['slotD'] = $CommonController->get_slot_banner_category('D',3,$data['category']->id);
        $data['slotE'] = $CommonController->get_slot_banner_category('E',3,$data['category']->id);
        $data['slotF'] = $CommonController->get_slot_banner_category('F',3,$data['category']->id);
        $data['slotG'] = $CommonController->get_slot_banner_category('G',3,$data['category']->id);
        $data['slotH'] = $CommonController->get_slot_banner_category('H',3,$data['category']->id);
        $data['slotI'] = $CommonController->get_slot_banner_category('I',3,$data['category']->id);
        
        
        
        $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads as purchaseTable', 'purchaseTable.id', 'purchases_bump_ads_items.purchase_id')
                                   ->join('sell_now', 'sell_now.id','purchases_bump_ads_items.ads_id')
                                    ->where('purchaseTable.status', 1)
                                    ->where('purchaseTable.bump_placement', '=', 3)
                                    ->get(['purchases_bump_ads_items.*','purchaseTable.bump_placement',
                                           'sell_now.id as sellid','sell_now.ad_title as title',
                                           'sell_now.price as price','sell_now.dis_price as disprice'
                                           ,'sell_now.main_image as bannerimage']);
                                           
                                           
                                           
        // $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
        //     ->where('purchases_bump_ads.status', 1)
        //     ->where('purchases_bump_ads.category_id', $data['category']->id)
        //     ->where('purchases_bump_ads.bump_placement', '=', 3)
        //     ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);





        // foreach ($data['bumupads'] as $key => $wl) {
        //     $sellNow = SellNow::where('id', $wl->ads_id)->first();
        //      if (!empty($sellNow)) {
        //         $data['bumupads'][$key]['title']=$sellNow->ad_title;
        //         $data['bumupads'][$key]['price']=$sellNow->price;
        //         $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
        //         $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
        //     } else {
        //         $data['bumupads'][$key]['title']=0;
        //         $data['bumupads'][$key]['price']=0;     
        //         $data['bumupads'][$key]['disprice']=0;
        //         $data['bumupads'][$key]['bannerimage'] = 0;
        //     }
        // }


        $data['attributes']  = SubCategory::join('attributes', 'attributes.sub_category_id', 'sub_categories.id')
            ->join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
            ->where('sub_categories.category_id', $data['category']->id)
            ->where('attributes.deleted_at', Null)
            ->distinct()
            ->get([
                'sub_categories.*', 'attributes.attributes_id', 'all_attributes.title as attributestitle',
                'all_attributes.slug as attributesslug', 'all_attributes.id as attributesid'
            ]);


        $data['properties']  = SubCategory::join('attributes', 'attributes.sub_category_id', 'sub_categories.id')
            ->join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
            ->join('properties', 'properties.attribute_id', 'all_attributes.id')
            ->where('sub_categories.category_id', $data['category']->id)
            ->where('sub_categories.deleted_at', Null)
            ->where('attributes.deleted_at', Null)
            ->where('all_attributes.deleted_at', Null)
            ->where('properties.deleted_at', Null)
            ->distinct()
            ->get([
                'sub_categories.*', 'attributes.attributes_id', 'all_attributes.title as attributestitle',
                'all_attributes.slug as attributesslug', 'all_attributes.id as attributesid', 'properties.id as propertiesid', 'properties.title as propertiestitle'
            ]);







        if (Auth::Check()) {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                        
                                        //->orderBy('sell_now.id', 'desc')
                                        ->where('sell_now.category_id', $data['category']->id)
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)
                                        ->orderBy('sell_now.is_category_featured','desc')
                                        ->orderBy('sell_now.created_at','desc')
                                        ->distinct()
                                        ->paginate(50, [
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);

            foreach ($data['SellNow'] as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $data['SellNow'][$key]['is_wishlist'] = 1;
                } else {
                    $data['SellNow'][$key]['is_wishlist'] = 0;
                }


                $purchasescategoryfeatured  = Purchasescategoryfeatured::join('purchases_category_featured_items', 'purchases_category_featured_items.purchases_id', 'purchases_category_featured_listings.id')
                    ->where('purchases_category_featured_listings.status', 1)
                    ->where('purchases_category_featured_items.sell_now_id', $wl->id)->first();
                // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


                if (!empty($purchasescategoryfeatured)) {
                    $data['SellNow'][$key]['is_category_featured'] = 1;
                } else {
                    $data['SellNow'][$key]['is_category_featured'] = 0;
                }
            }
          //  dd($data['SellNow']);
        } 
        else {

            $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        //->orderBy('sell_now.id', 'desc')
                                        ->where('sell_now.category_id', $data['category']->id)
                                        ->where('sell_now.is_approve', 1)
                                        ->where('sell_now.status_id', 1)
                                        ->orderBy('sell_now.is_category_featured','desc')
                                        ->orderBy('sell_now.created_at','desc')
                                        ->paginate(50, [
                                            'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);

            foreach ($data['SellNow'] as $key => $wl) {
                $purchasescategoryfeatured  = Purchasescategoryfeatured::join('purchases_category_featured_items', 'purchases_category_featured_items.purchases_id', 'purchases_category_featured_listings.id')
                    ->where('purchases_category_featured_listings.status', 1)
                    ->where('purchases_category_featured_items.sell_now_id', $wl->id)->first();
                // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


                if (!empty($purchasescategoryfeatured)) {
                    $data['SellNow'][$key]['is_category_featured'] = 1;
                } else {
                    $data['SellNow'][$key]['is_category_featured'] = 0;
                }
            }
        }

        $adDetail = \App\Models\Category::join('sell_now', 'categories.id', 'sell_now.category_id')
                             ->where('categories.slug', $slug)
                             ->where('sell_now.status_id', 1)
                             ->where('sell_now.is_approve', 1)
                             ->distinct()->get('sell_now.*');


        \App\Helpers\Helper::set_data1_for_filters($data, $adDetail);
        
         return view('test.categories', $data);
        
    }


    public function brand_product(Request $request, $slug)
    {


        $CommonController = new CommonController();
     
     
        $slotA = $CommonController->get_slot_banner('A',2);
        $slotB = $CommonController->get_slot_banner('B',2);
        $slotC = $CommonController->get_slot_banner('C',2);
        $slotD = $CommonController->get_slot_banner('D',2);
        $slotE = $CommonController->get_slot_banner('E',2);
        $slotF = $CommonController->get_slot_banner('F',2);
        $slotG = $CommonController->get_slot_banner('G',2);
        $slotH = $CommonController->get_slot_banner('H',2);
        $slotI = $CommonController->get_slot_banner('I',2);
        
        
        $brands = Brand::where('slug', $slug)->first();
       //dd($brands);

    // $bumupads  = Purchasesbumadsitem::join('purchases_bump_ads as purchaseTable', 'purchaseTable.id', 'purchases_bump_ads_items.purchase_id')
    //                                 ->join('purchases_bump_ads_items as itemTable', 'itemTable.ads_id', 'sell_now.sellid')
    //                                 ->where('purchaseTable.status', 1)
    //                                 ->where('purchaseTable.bump_placement', '=', 1)
    //                                 ->get(['itemTable.ads_id as sellid','itemTable.*', 'purchaseTable.bump_placement']);


$bumupads  = Purchasesbumadsitem::join('purchases_bump_ads as purchaseTable', 'purchaseTable.id', 'purchases_bump_ads_items.purchase_id')
                                   ->join('sell_now', 'sell_now.id','purchases_bump_ads_items.ads_id')
                                    ->where('purchaseTable.status', 1)
                                    ->where('purchaseTable.bump_placement', '=', 2)
                                    ->get(['purchases_bump_ads_items.*','purchaseTable.bump_placement',
                                           'sell_now.id as sellid','sell_now.ad_title as title',
                                           'sell_now.price as price','sell_now.dis_price as disprice'
                                           ,'sell_now.main_image as bannerimage']);
                                    
// dd($bumupads);

        // foreach ($bumupads as $key => $wl) {
           
        //     $sellNow = SellNow::where('id', $wl->ads_id)->first();
        //     if (!empty($sellNow)) {
                
        //         //  dd($sellNow->main_image);
        //         $data['bumupads'][$key]['title']=$sellNow->ad_title;
        //         $data['bumupads'][$key]['price']=$sellNow->price;
        //         $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
        //         $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
        //     } else {
               
        //         $data['bumupads'][$key]['title']=0;
        //         $data['bumupads'][$key]['price']=0;     
        //         $data['bumupads'][$key]['disprice']=0;
        //         $data['bumupads'][$key]['bannerimage'] = 0;
        //     }
        // }

        $bumupadsSetting = Bumpupsetting::where('id', 2)->first();
        
        $adDetail = Brand::join('sell_now', 'brands.id', 'sell_now.brand_id')->where('brands.slug', $slug)->where('sell_now.status_id', 1)->where('sell_now.is_approve', 1)->get(['sell_now.id', 'sell_now.country_id', 'sell_now.city_id']);
        
        $ad_ids = [];

        foreach($adDetail as $key=>$ad){
            
            $ad_ids[$key] = $ad->id;
        }

        $countries = [];

        foreach($adDetail as $key=>$country){
            
            $countries[$key] = $country->country_id;
        }
        
        $cities = [];

        foreach($adDetail as $key=>$city){
            
            $cities[$key] = $city->city_id;
        }

        
        $brand = Brand::join('sell_now', 'brands.id', 'sell_now.brand_id')->whereIn('sell_now.id', $ad_ids)->where('brands.status', 1)->distinct()->get('brands.*');
        $subBrand = SubBrand::join('sell_now', 'sub_brands.brand_id', 'sell_now.brand_id')->whereIn('sell_now.id', $ad_ids)->where('sub_brands.status', 1)->distinct()->get('sub_brands.*');
        $categorylist = Category::join('sell_now', 'categories.id', 'sell_now.category_id')->whereIn('sell_now.id', $ad_ids)->where('categories.status', 1)->distinct()->get('categories.*');
        $subCategories = SubCategory::join('sell_now', 'sub_categories.id', 'sell_now.sub_category_id')->whereIn('sell_now.id', $ad_ids)->where('sub_categories.status', 1)->distinct()->get('sub_categories.*');
        $countries = Location::join('sell_now', 'sell_now.country_id', 'geo_location.country')->whereIn('sell_now.country_id', $countries)->groupBy('geo_location.country')->get('geo_location.country');
        $cities = Location::join('sell_now', 'sell_now.city_id', 'geo_location.city')->whereIn('sell_now.city_id', $cities)->groupBy('geo_location.city')->get('geo_location.city');
        $attributes = Allattributes::join('attributes', 'attributes.attributes_id', 'all_attributes.id')
                                    ->join('sub_categories', 'attributes.sub_category_id', 'sub_categories.id')
                                    ->join('categories', 'sub_categories.category_id', 'categories.id')
                                    ->join('sell_now', 'categories.id', 'sell_now.category_id')
                                    ->where('all_attributes.status', 1)
                                    ->whereIn('sell_now.id', $ad_ids)
                                    ->distinct()
                                    ->get('all_attributes.*');
                
        $properties = Property::where('status', 1)->get();

        if (Auth::Check()) {

            $SellNow = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                            ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                            ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                            ->leftjoin('users', 'users.id', 'wish_list.user_id')
                            //->orderBy('sell_now.id', 'desc')
                            ->where('sell_now.brand_id', $brands->id)
                            ->where('sell_now.is_approve', 1)
                            ->where('sell_now.status_id', 1)
                            ->orderBy('sell_now.is_brand_featured','desc')
                            ->orderBy('sell_now.created_at','desc')
                            ->distinct()
                            ->paginate(40, [
                                'sell_now.*', 'sub_categories.title as sub_category',
                                'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                            ]);

            foreach ($SellNow as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $SellNow[$key]['is_wishlist'] = 1;
                } else {
                    $SellNow[$key]['is_wishlist'] = 0;
                }



                $purchasesbrandfeatured  = Purchasesbrandfeatured::join('purchases_brand_featured_items', 'purchases_brand_featured_items.purchases_id', 'purchases_brand_featured_listings.id')
                    ->where('purchases_brand_featured_listings.status', 1)
                    ->where('purchases_brand_featured_items.sell_now_id', $wl->id)->first();
                // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


                if (!empty($purchasesbrandfeatured)) {
                    $SellNow[$key]['is_brand_featured'] = 1;
                } else {
                    $SellNow[$key]['is_brand_featured'] = 0;
                }
            }
            //dd($SellNow);
        } else {

            $SellNow = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                //->orderBy('sell_now.id', 'desc')
                                ->where('sell_now.brand_id', $brands->id)
                                ->where('sell_now.is_approve', 1)
                                ->where('sell_now.status_id', 1)
                                 ->orderBy('sell_now.is_brand_featured','desc')
                            ->orderBy('sell_now.created_at','desc')
                                ->paginate(40, [
                                    'sell_now.*', 'sub_categories.title as sub_category',
                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                ]);

            foreach ($SellNow as $key => $wl) {

                $purchasesbrandfeatured  = Purchasesbrandfeatured::join('purchases_brand_featured_items', 'purchases_brand_featured_items.purchases_id', 'purchases_brand_featured_listings.id')
                    ->where('purchases_brand_featured_listings.status', 1)
                    ->where('purchases_brand_featured_items.sell_now_id', $wl->id)->first();
                // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


                if (!empty($purchasesbrandfeatured)) {
                    $SellNow[$key]['is_brand_featured'] = 1;
                } else {
                    $SellNow[$key]['is_brand_featured'] = 0;
                }
            }
        }
        
        $bumupsetting = Bannersetting::where('page_id',2)->first();
       
        $data = compact('slotA','slotB','slotC','slotD','slotE','slotF','slotG','slotH','slotI','bumupsetting','SellNow', 'subBrand', 'slug', 'categorylist', 'subCategories', 'countries', 'cities','bumupads', 'brand', 'attributes', 'properties', 'brands', 'bumupadsSetting');
         
        
        \App\Helpers\Helper::set_properties_of_products($data, $slug);

        // if(\Session::get('locale') == 'ar'){
        //     return view('arabic.test.brand', $data);              
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){            
        //     return view('test.brand', $data);
        // }
        // dd($bumupads);
        return view('test.brand', $data);
        
    }//end fn//
    //made by has
    public function sub_brand_product(Request $request, $slug)
    {
 
 
        $CommonController = new CommonController();

        $slotA = $CommonController->get_slot_banner('A',8);
        $slotB = $CommonController->get_slot_banner('B',8);
        $slotC = $CommonController->get_slot_banner('C',8);
        $slotD = $CommonController->get_slot_banner('D',8);
        $slotE = $CommonController->get_slot_banner('E',8);
        $slotF = $CommonController->get_slot_banner('F',8);
        $slotG = $CommonController->get_slot_banner('G',8);
        $slotH = $CommonController->get_slot_banner('H',8);
        $slotI = $CommonController->get_slot_banner('I',8);
        
        
        $subBrands = SubBrand::where('slug', $slug)->first();
     
       
        // $bumupads  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
        //       //->join('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.sellid')
        //     ->where('purchases_bump_ads.status', 1)
        //     ->where('purchases_bump_ads.bump_placement', '=', 1)
        //     ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);


        // foreach ($bumupads as $key => $wl) {
        //     $sellNow = SellNow::where('id', $wl->ads_id)->first();
        //     if (!empty($sellNow)) {
                
        //         $data['bumupads'][$key]['title']=$sellNow->ad_title;
        //         $data['bumupads'][$key]['price']=$sellNow->price;
        //         $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
        //         $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
        //     } else {
               
        //         $data['bumupads'][$key]['title']=0;
        //         $data['bumupads'][$key]['price']=0;     
        //         $data['bumupads'][$key]['disprice']=0;
        //         $data['bumupads'][$key]['bannerimage'] = 0;
        //     }
        // }
        
        $bumupads  = Purchasesbumadsitem::join('purchases_bump_ads as purchaseTable', 'purchaseTable.id', 'purchases_bump_ads_items.purchase_id')
                                   ->join('sell_now', 'sell_now.id','purchases_bump_ads_items.ads_id')
                                    ->where('purchaseTable.status', 1)
                                    ->where('purchaseTable.bump_placement', '=', 8)
                                    ->get(['purchases_bump_ads_items.*','purchaseTable.bump_placement',
                                           'sell_now.id as sellid','sell_now.ad_title as title',
                                           'sell_now.price as price','sell_now.dis_price as disprice'
                                           ,'sell_now.main_image as bannerimage']);

        $bumupadsSetting = Bumpupsetting::where('id', 8)->first();
        
        $adDetail = SubBrand::join('sell_now', 'sub_brands.id', 'sell_now.sub_brand_id')
        ->where('sub_brands.slug', $slug)
        ->where('sell_now.status_id', 1)->where('sell_now.is_approve', 1)->get(['sell_now.id', 'sell_now.country_id', 'sell_now.city_id']);
       
        
        $ad_ids = [];

        foreach($adDetail as $key=>$ad){
            
            $ad_ids[$key] = $ad->id;
        }
        $countries = [];

        foreach($adDetail as $key=>$country){
            
            $countries[$key] = $country->country_id;
        }
        
        $cities = [];

        foreach($adDetail as $key=>$city){
            
            $cities[$key] = $city->city_id;
        }

        
        $brand = Brand::join('sell_now', 'brands.id', 'sell_now.brand_id')->whereIn('sell_now.id', $ad_ids)->where('brands.status', 1)->distinct()->get('brands.*');
        $subBrand = SubBrand::join('sell_now', 'sub_brands.brand_id', 'sell_now.brand_id')->whereIn('sell_now.id', $ad_ids)->where('sub_brands.status', 1)->distinct()->get('sub_brands.*');
        $categorylist = Category::join('sell_now', 'categories.id', 'sell_now.category_id')->whereIn('sell_now.id', $ad_ids)->where('categories.status', 1)->distinct()->get('categories.*');
        $subCategories = SubCategory::join('sell_now', 'sub_categories.id', 'sell_now.sub_category_id')->whereIn('sell_now.id', $ad_ids)->where('sub_categories.status', 1)->distinct()->get('sub_categories.*');
        $countries = Location::join('sell_now', 'sell_now.country_id', 'geo_location.country')->whereIn('sell_now.country_id', $countries)->groupBy('geo_location.country')->get('geo_location.country');
        $cities = Location::join('sell_now', 'sell_now.city_id', 'geo_location.city')->whereIn('sell_now.city_id', $cities)->groupBy('geo_location.city')->get('geo_location.city');
        $attributes = Allattributes::join('attributes', 'attributes.attributes_id', 'all_attributes.id')
                                    ->join('sub_categories', 'attributes.sub_category_id', 'sub_categories.id')
                                    ->join('categories', 'sub_categories.category_id', 'categories.id')
                                    ->join('sell_now', 'categories.id', 'sell_now.category_id')
                                    ->where('all_attributes.status', 1)
                                    ->whereIn('sell_now.id', $ad_ids)
                                    ->distinct()
                                    ->get('all_attributes.*');
                
        $properties = Property::where('status', 1)->get();

        if (Auth::Check()) {

            $SellNow = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                            ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                            ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                            ->leftjoin('users', 'users.id', 'wish_list.user_id')
                            //->orderBy('sell_now.id', 'desc')
                            ->where('sell_now.sub_brand_id',$subBrands->id)
                            // ->where('sell_now.brand_id', $brands->id)
                            ->where('sell_now.is_approve', 1)
                            ->where('sell_now.status_id', 1)
                            ->orderBy('sell_now.is_brand_featured','desc')
                            ->orderBy('sell_now.created_at','desc')
                            ->distinct()
                            ->paginate(40, [
                                'sell_now.*', 'sub_categories.title as sub_category',
                                'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                            ]);

            foreach ($SellNow as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $SellNow[$key]['is_wishlist'] = 1;
                } else {
                    $SellNow[$key]['is_wishlist'] = 0;
                }



                $purchasesbrandfeatured  = Purchasesbrandfeatured::join('purchases_brand_featured_items', 'purchases_brand_featured_items.purchases_id', 'purchases_brand_featured_listings.id')
                    ->where('purchases_brand_featured_listings.status', 1)
                    ->where('purchases_brand_featured_items.sell_now_id', $wl->id)->first();
                // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


                if (!empty($purchasesbrandfeatured)) {
                    $SellNow[$key]['is_brand_featured'] = 1;
                } else {
                    $SellNow[$key]['is_brand_featured'] = 0;
                }
            }
            //dd($SellNow);
        } else {

            $SellNow = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                //->orderBy('sell_now.id', 'desc')
                                // ->where('sell_now.brand_id', $brands->id)
                                ->where('sell_now.sub_brand_id',$subBrands->id)
                                ->where('sell_now.is_approve', 1)
                                ->where('sell_now.status_id', 1)
                                 ->orderBy('sell_now.is_brand_featured','desc')
                            ->orderBy('sell_now.created_at','desc')
                                ->paginate(40, [
                                    'sell_now.*', 'sub_categories.title as sub_category',
                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                ]);

            foreach ($SellNow as $key => $wl) {

                $purchasesbrandfeatured  = Purchasesbrandfeatured::join('purchases_brand_featured_items', 'purchases_brand_featured_items.purchases_id', 'purchases_brand_featured_listings.id')
                    ->where('purchases_brand_featured_listings.status', 1)
                    ->where('purchases_brand_featured_items.sell_now_id', $wl->id)->first();
                // ->get(['purchases_category_featured_listings.*','purchases_category_featured_items.sell_now_id']);


                if (!empty($purchasesbrandfeatured)) {
                    $SellNow[$key]['is_brand_featured'] = 1;
                } else {
                    $SellNow[$key]['is_brand_featured'] = 0;
                }
            }
        }
        
        $bumupsetting = Bannersetting::where('page_id',8)->first();
       
        $data = compact('slotA','slotB','slotC','slotD','slotE','slotF','slotG','slotH','slotI','bumupsetting','SellNow', 'subBrand', 'slug', 'categorylist', 'subCategories', 'countries', 'cities','bumupads', 'brand', 'attributes', 'properties', 'subBrands', 'bumupadsSetting');
        // dd($data);
          
        

        \App\Helpers\Helper::set_properties_of_products($data, $slug);

        // if(\Session::get('locale') == 'ar'){
        //     return view('arabic.test.sub-brand', $data);              
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){            
        //     return view('test.sub-brand', $data);
        // }
        return view('test.sub-brand', $data);
    }
    //end

    

    public function get_product_type(Request $request)
    {


        $id = $request->id;
        $slug = $request->slug;


        $category = Category::where('slug', $request->slug)->first();

        if (Auth::Check()) {

            $SellNow = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                ->orderBy('sell_now.id', 'desc')
                                ->where('sell_now.category_id', $category->id)
                                ->distinct()
                                ->paginate(4, [
                                    'sell_now.*', 'sub_categories.title as sub_category',
                                    'categories.title as category', 'geo_states.name as statename', 'geo_cities.name as cityname'
                                ]);

            foreach ($SellNow as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $SellNow[$key]['is_wishlist'] = 1;
                } else {
                    $SellNow[$key]['is_wishlist'] = 0;
                }
            }
        } else {

            $SellNow = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                ->orderBy('sell_now.id', 'desc')
                                ->where('sell_now.category_id', $category->id)
                                ->paginate(4, [
                                    'sell_now.*', 'sub_categories.title as sub_category',
                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                ]);
        }

        return view('test.type', compact('SellNow'));
    }



    public function get_by_attributes(Request $request)
    {


        $values = $request->values;


        if (Auth::Check()) {
            for ($i = 0; $i < count($request->values); $i++) {


                $SellNow = Attributes::join('sell_now', 'sell_now.sub_category_id', 'attributes.sub_category_id')
                    ->leftjoin('user_map_location', 'user_map_location.id', 'sell_now.map_id')
                    ->where('attributes.attributes_id', $request->values[$i])
                    ->where('sell_now.is_approve', 1)
                    ->orderBy('sell_now.id', 'desc')
                    ->distinct()
                    ->paginate(40, ['sell_now.*', 'user_map_location.state as statename', 'user_map_location.city as cityname']);

                foreach ($SellNow as $key => $wl) {
                    $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                    if (!empty($wishlist)) {
                        $SellNow[$key]['is_wishlist'] = 1;
                    } else {
                        $SellNow[$key]['is_wishlist'] = 0;
                    }
                }
            }
        } else {

            $SellNow = Attributes::join('sell_now', 'sell_now.sub_category_id', 'attributes.sub_category_id')
                ->leftjoin('user_map_location', 'user_map_location.id', 'sell_now.map_id')
                ->where('attributes.attributes_id', $request->values[$i])
                ->where('sell_now.is_approve', 1)
                ->orderBy('sell_now.id', 'desc')
                ->distinct()
                ->paginate(40, ['sell_now.*', 'user_map_location.state as statename', 'user_map_location.city as cityname']);
        }


        return view('test.type', compact('SellNow'));
    }


    public function redirect_to_login(Request $request)
    {

        if (!empty($request->uri_segment_two)) {
            $wishlistSession = session(['wishlist_session' => $request->uri_segment_one . '/' . $request->uri_segment_two]);
        } else {
            $wishlistSession = session(['wishlist_session' => $request->uri_segment_one]);
        }
        return 1;
    }


    public function redirectToSignup(Request $request){
       
        if (!empty($request->uri_segment_two)) {
            $wishlistSession = session(['wishlist_session' => $request->uri_segment_one . '/' . $request->uri_segment_two]);
        } else {
            $wishlistSession = session(['wishlist_session' => $request->uri_segment_one]);
        }
        return 1;
    

    }





 public function test_product_detail(Request $reqeust, $id)
    {
      


        // $data['slotI'] = $this->get_slot_banner(9);
         $data['slotA'] = $this->get_slot_banner('A',4);
         
        // $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
        //                                                 ->where('purchases_bump_ads.status', 1)
        //                                                 ->where('purchases_bump_ads.bump_placement','=', 4)
        //                                                 ->get(['purchases_bump_ads_items.*','purchases_bump_ads.bump_placement']);



        $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
            //  ->join('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.sellid')
            ->where('purchases_bump_ads.status', 1)
            ->where('purchases_bump_ads.bump_placement', '=', 4)
            ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);

        foreach ($data['bumupads'] as $key => $wl) {
            $sellNow = SellNow::where('id', $wl->ads_id)->first();
            if (!empty($sellNow)) {
              
                $data['bumupads'][$key]['title']=$sellNow->ad_title;
                $data['bumupads'][$key]['price']=$sellNow->price;
                $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
                $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
            } else {
               
                $data['bumupads'][$key]['title']=0;
                $data['bumupads'][$key]['price']=0;     
                $data['bumupads'][$key]['disprice']=0;
                $data['bumupads'][$key]['bannerimage'] = 0;
            }
        }


        $data['sellnowgallery'] = Sellnowgallery::where('ads_id', $id)->get();


        $data['bumupadsSetting'] = Bumpupsetting::where('id', 4)->first();

        // dd($data['sellnowgallery']);



        if (Auth::Check()) {

            $data['sellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                ->leftjoin('users', 'users.id', 'wish_list.user_id')
                //  ->orderBy('sell_now.id', 'desc')
                //  ->where('wish_list.deleted_at', null)
                ->where('sell_now.id', $id)
                ->first([
                    'wish_list.ad_id', 'users.id as userid', 'sell_now.*', 'sub_categories.title as sub_category',
                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                ]);
            
            
            
            $wishlist = WishList::where('ad_id', $data['sellNow']->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($wishlist)) {
                $data['sellNow']['is_wishlist'] = 1;
            } else {
                $data['sellNow']['is_wishlist'] = 0;
            }

            $Like = Like::where('ad_id', $data['sellNow']->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($Like)) {
                $data['sellNow']['is_like'] = 1;
            } else {
                $data['sellNow']['is_like'] = 0;
            }

                $this->productchatWithSeller($data['sellNow']->user_id,$data['sellNow']->id);
            
            
        } else {

            $data['sellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                        //  ->orderBy('sell_now.id', 'desc')
                                        //  ->where('wish_list.deleted_at', null)
                                        ->where('sell_now.id', $id)
                                        ->first([
                                            'wish_list.ad_id', 'users.id as userid', 'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category',  'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);
                                        
                /*echo "<pre>";
                print_r($data['sellNow']);die;*/


            // $data['user'] = User::where('id', $data['sellNow']->user_id)->first();
        }

        $data['user'] = User::where('id', $data['sellNow']->user_id)->first();

      //var_dump(isset($data['user']));die;


    //changes done here         
         if(isset($data['user'])){
             
             if($data['user']->is_company == 1){
            
            $data['companyprofile'] = Companyprofile::where('user_id', $data['sellNow']->user_id)->first();
            
             }
             else{
            
            $data['companyprofile'] = '';
             }
          }else{
            
            return redirect()->back()->with('msg','User doesn\'t exists');
              
          }
         
        //changes end here  
         

        

        // dd($data['companyprofile']);
        $data['adAttribute'] = AdAttribute::where('ad_id', $data['sellNow']->id)->get();


        $data['brand'] = Brand::where('id', $data['sellNow']->brand_id)->first();
        $data['subBrand'] = SubBrand::where('id', $data['sellNow']->sub_brand_id)->first();
        
        


        if ($data['sellNow']->is_auction == 1) {

            $data['auction'] = Sellnowauction::where('sell_now_id', $data['sellNow']->id)->first();


            $data['sellnowbid'] = Sellnowbid::where('ads_id', $data['sellNow']->id)->orderBy('id', 'desc')->first();
        } else {
            $data['auction'] = '';
        }


        //   dd($data['sellnowbid']);

        if (Auth::Check()) {

            $data['relatedsellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                                ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                                ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                                ->orderBy('sell_now.id', 'desc')
                                                ->where('sell_now.is_approve', 1)
                                                ->where('sell_now.status_id', 1)
                                                ->where('sell_now.category_id', $data['sellNow']->category_id)
                                                ->where('sell_now.id', '!=', $data['sellNow']->id)
                                                //  ->where('wish_list.deleted_at', null)
                                                ->distinct()
                                                ->get([
                                                    'sell_now.*', 'sub_categories.title as sub_category',
                                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                                ]);
            foreach ($data['relatedsellNow'] as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $data['relatedsellNow'][$key]['is_wishlist'] = 1;
                } else {
                    $data['relatedsellNow'][$key]['is_wishlist'] = 0;
                }
            }
        } else {

            $data['relatedsellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                                ->orderBy('sell_now.id', 'desc')
                                                ->where('sell_now.is_approve', 1)
                                                ->where('sell_now.status_id', 1)
                                                ->where('sell_now.category_id', $data['sellNow']->category_id)
                                                ->where('sell_now.id', '!=', $data['sellNow']->id)
                                                ->get([
                                                    'sell_now.*', 'sub_categories.title as sub_category',
                                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                                ]);
        }

        $data['adReports'] = AdReport::where('status_id', 1)->get();


        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);

        $data['admin_banks'] = AdminBank::where('is_active',1)->get();

        $walletController = new \App\Http\Controllers\WalletController(); 
        $data['balance'] =  $walletController->userWalletBalance();
        $webSetting= WebSetting::find(1);
        $data['tax'] = $webSetting->tax_percent;  
        
         $data['bumupsetting'] = Bannersetting::where('page_id',4)->first();
         
         /*echo "<pre>";
         print_r($data['user']);die;*/
         
        
            return view('test.testproduct-details', $data);            
       
        
    }
    // 




    public function product_detail(Request $reqeust, $id)
    {
    
// dd($id,$reqeust->all()); 
  
        // $data['slotI'] = $this->get_slot_banner(9);
         $data['slotA'] = $this->get_slot_banner('A',4);
         $data['slotB'] = $this->get_slot_banner('B',4);
         $data['slotC'] = $this->get_slot_banner('C',4);
       // dd($data['slotB']);
        

        // $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
        //                                                 ->where('purchases_bump_ads.status', 1)
        //                                                 ->where('purchases_bump_ads.bump_placement','=', 4)
        //                                                 ->get(['purchases_bump_ads_items.*','purchases_bump_ads.bump_placement']);



        // $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
        //     //  ->join('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.sellid')
        //     ->where('purchases_bump_ads.status', 1)
        //     ->where('purchases_bump_ads.bump_placement', '=', 4)
        //     ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);

       
        // foreach ($data['bumupads'] as $key => $wl) {
        //     $sellNow = SellNow::where('id', $wl->ads_id)->first();
        //   if (!empty($sellNow)) {
             
        //         $data['bumupads'][$key]['title']=$sellNow->ad_title;
        //         $data['bumupads'][$key]['price']=$sellNow->price;
        //         $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
        //         $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
        //     } else {
               
        //         $data['bumupads'][$key]['title']=0;
        //         $data['bumupads'][$key]['price']=0;     
        //         $data['bumupads'][$key]['disprice']=0;
        //         $data['bumupads'][$key]['bannerimage'] = 0;
        //     }
        // }
//dd($data['bumupads']);


$data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads as purchaseTable', 'purchaseTable.id', 'purchases_bump_ads_items.purchase_id')
                                   ->join('sell_now', 'sell_now.id','purchases_bump_ads_items.ads_id')
                                    ->where('purchaseTable.status', 1)
                                    ->where('purchaseTable.bump_placement', '=', 4)
                                    ->get(['purchases_bump_ads_items.*','purchaseTable.bump_placement',
                                           'sell_now.id as sellid','sell_now.ad_title as title',
                                           'sell_now.price as price','sell_now.dis_price as disprice'
                                           ,'sell_now.main_image as bannerimage']);
                                           

        $data['sellnowgallery'] = Sellnowgallery::where('ads_id', $id)->get();


        $data['bumupadsSetting'] = Bumpupsetting::where('id', 4)->first();

        // dd($data['sellnowgallery']);



        if (Auth::Check()) {

            $data['sellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                ->leftjoin('users', 'users.id', 'wish_list.user_id')
                //  ->orderBy('sell_now.id', 'desc')
                //  ->where('wish_list.deleted_at', null)
                ->where('sell_now.id', $id)
                ->first([
                    'wish_list.ad_id', 'users.id as userid', 'sell_now.*', 'sub_categories.title as sub_category',
                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                ]);
            
            $wishlist = WishList::where('ad_id', $data['sellNow']->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($wishlist)) {
                $data['sellNow']['is_wishlist'] = 1;
            } else {
                $data['sellNow']['is_wishlist'] = 0;
            }

            $Like = Like::where('ad_id', $data['sellNow']->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($Like)) {
                $data['sellNow']['is_like'] = 1;
            } else {
                $data['sellNow']['is_like'] = 0;
            }

           $this->productchatWithSeller($data['sellNow']->user_id,$data['sellNow']->id);
            
            
        } else {

            $data['sellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                        //  ->orderBy('sell_now.id', 'desc')
                                        //  ->where('wish_list.deleted_at', null)
                                        ->where('sell_now.id', $id)
                                        ->first([
                                            'wish_list.ad_id', 'users.id as userid', 'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category',  'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);
                                        
                /*echo "<pre>";
                print_r($data['sellNow']);die;*/


            // $data['user'] = User::where('id', $data['sellNow']->user_id)->first();
        }




        $data['user'] = User::where('id', $data['sellNow']->user_id)->first();




      //var_dump(isset($data['user']));die;


    //changes done here         
         if(isset($data['user'])){
             
             if($data['user']->is_company == 1){
            
            $data['companyprofile'] = Companyprofile::where('user_id', $data['sellNow']->user_id)->first();
            
             }
             else{
            
               $data['companyprofile'] = '';
               
             }
          }else{
            
            return redirect()->back()->with('msg','User doesn\'t exists');
              
          }
         
        //changes end here  
         

        //  $data['sellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
        //                                 ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
        //                                 ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
        //                                 ->leftjoin('users', 'users.id', 'wish_list.user_id')
        //                                 //  ->orderBy('sell_now.id', 'desc')
        //                                 //  ->where('wish_list.deleted_at', null)
        //                                 ->where('sell_now.id', $id)
        //                                 ->first([
        //                                     'wish_list.ad_id', 'users.id as userid', 'sell_now.*', 'sub_categories.title as sub_category',
        //                                     'categories.title as category',  'sell_now.state_id as statename', 'sell_now.city_id as cityname'
        //                                 ]);


// all_attributes
// ad_attributes


        $data['adAttribute'] = AdAttribute::join('all_attributes', 'all_attributes.id', 'ad_attributes.attribute_key')
                                            ->leftJoin('properties', 'properties.id', 'ad_attributes.attribute_value')
                                           ->where('ad_attributes.ad_id', $data['sellNow']->id)
                                           ->get(['ad_attributes.*','all_attributes.title as attributesTitle','all_attributes.attribute_type_id','properties.title as propertiesTitle']);
                                           
                                           

        //  dd($data['adAttribute']);


        $data['brand'] = Brand::where('id', $data['sellNow']->brand_id)->first();
        // dd($data['sellNow']);
        $data['subBrand'] = SubBrand::where('id', $data['sellNow']->sub_brand_id)->first();
        
        

        // dd($data['subBrand']);


            if ($data['sellNow']->is_auction == 1) {
    
                $data['auction'] = Sellnowauction::where('sell_now_id', $data['sellNow']->id)->first();
                $data['sellnowbid'] = Sellnowbid::where('ads_id', $data['sellNow']->id)->orderBy('id', 'desc')->first();
    
            } else {
    
                $data['auction'] = '';
    
            }


        //   dd($data['sellnowbid']);

        if (Auth::Check()) {

            $data['relatedsellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                                ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                                ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                                ->orderBy('sell_now.id', 'desc')
                                                ->where('sell_now.is_approve', 1)
                                                ->where('sell_now.status_id', 1)
                                                ->where('sell_now.category_id', $data['sellNow']->category_id)
                                                ->where('sell_now.id', '!=', $data['sellNow']->id)
                                                //  ->where('wish_list.deleted_at', null)
                                                ->distinct()
                                                ->get([
                                                    'sell_now.*', 'sub_categories.title as sub_category',
                                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                                ]);
            foreach ($data['relatedsellNow'] as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $data['relatedsellNow'][$key]['is_wishlist'] = 1;
                } else {
                    $data['relatedsellNow'][$key]['is_wishlist'] = 0;
                }
            }
        } else {

            $data['relatedsellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                                ->orderBy('sell_now.id', 'desc')
                                                ->where('sell_now.is_approve', 1)
                                                ->where('sell_now.status_id', 1)
                                                ->where('sell_now.category_id', $data['sellNow']->category_id)
                                                ->where('sell_now.id', '!=', $data['sellNow']->id)
                                                ->get([
                                                    'sell_now.*', 'sub_categories.title as sub_category',
                                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                                ]);
        }

        $data['adReports'] = AdReport::where('status_id', 1)->get();


        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);

        $data['admin_banks'] = AdminBank::where('is_active',1)->get();

        $walletController = new \App\Http\Controllers\WalletController(); 
        $data['balance'] =  $walletController->userWalletBalance();
        $webSetting= WebSetting::find(1);
        $data['tax'] = $webSetting->tax_percent;  
        
         $data['bumupsetting'] = Bannersetting::where('page_id',4)->first();
         
         /*echo "<pre>";
         print_r($data['user']);die;*/
         
        // if(\Session::get('locale') == 'ar'){
        //     return view('arabic.test.product-details', $data);
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
        //     if (Auth::Check()) {
        //         if(!empty($data['sellNow']->user_id) && $data['sellNow']->user_id == Auth::user()->id){
        //             return view('test.my-product-details', $data); 
        //         }
        //         else{
        //             return view('test.product-details', $data); 
        //         }
        //     }
        //     else{
        //         return view('test.product-details', $data);   
        //     }
        // }
        
        
        
        // 
        if (Auth::Check()) {
                if(!empty($data['sellNow']->user_id) && $data['sellNow']->user_id == Auth::user()->id){
                    
                    return view('test.my-product-details',$data); 
                }
                else{
                    return view('test.product-details', $data);  
                }
            }
            else{
                    return view('test.product-details', $data);  
            }
        // 
        
        
        
        
        
        
    }
    // 

    public function add_product_bid(Request $request)
    {

        $store = new Sellnowbid();
        $store->ads_id = \Crypt::decrypt($request->sellnow_id);
        $store->sellnow_price = \Crypt::decrypt($request->sellnow_price);
        $store->sellnow_start_bid_amount = \Crypt::decrypt($request->sellnow_start_bid_amount);
        $store->sellnow_last_bid_amount = \Crypt::decrypt($request->sellnow_last_bid_amount);
        $store->bid_amount = $request->bid_amount;
        $store->user_id = Auth::user()->id;
        $store->save();


        return redirect()->back()->with('success', 'Bid Added');


        // dd($request->all());

    }



    // 
    public function chatWithSeller(Request $request)
    {

        $messageID = mt_rand(9, 999999999) + time();

        $validdata = Message::where('from_id',Auth::user()->id)->where('to_id',$request->user_id)->where('ad_id',$request->ad_id)->where('seller_view',1)->delete();
        
        $first = new Firstmessages();
        $first->type = 'user';
        $first->from_id = Auth::user()->id;
        $first->to_id = $request->user_id;
        $first->body = 'Hi';
        $first->ad_id = $request->ad_id;
        $first->save();
        
        
        $message = new Message();
        $message->id = $messageID;
        $message->type = 'user';
        $message->from_id = Auth::user()->id;
        $message->to_id = $request->user_id;
        $message->body = 'Hi';
        $message->ad_id = $request->ad_id;
        $message->save();
        
        $this->sendFireBaseMessage($request->user_id);
        
        

        return [
            'to_id'  =>$request->user_id,
            'request'=> $messageID,
            'status' => 'success',
        ];

        
    }
    
    
    
    
    public function sendFireBaseMessage($userid){
        
        
        $userdata = AndroidFcmToken::where('user_id',$userid)->first();
    
    
    if(!empty($userdata)){
        // 
        
         define( 'API_ACCESS_KEY', 'AAAAe_e_BNg:APA91bFRkG2r50C7VHyBMUIJvVuoxleG8JSyI7fk5OPJK2u6AuUO8hzpmu_FJzc0GtDalMkNFZ9J_JH37af4KMd_SQjXQotqbRVFsqrRHx8LXJ4_2DQm8kD0m_BgqY5kGbJkNCni2LjQ');
          //  $registrationIds = 
      
               $msg2 = array
                  (
                        'title' => 'Chat',
                        'body' => "Chat Notification",
                        'click_action' => 'NavigationDrawer',
                         'id'=> ""
                  );

              
                $fields = array
                  (
                    'to'    => $userdata->fcm_token,
                    'notification'  => $msg2,
                    'data' => $msg2
                  );
          
          
                $headers = array
                  (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                  );
              
                 #Send Reponse To FireBase Server  
                $ch = curl_init();
                curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                $result = curl_exec($ch );
               
            //   dd($result);
               
                curl_close( $ch );
                
        
        
        
        // 
    }
    
   
    
    
}


    
    
     public function productchatWithSeller($userId,$adId)
    {

        $messageID = mt_rand(9, 999999999) + time();



    $validdata = Message::where('from_id',Auth::user()->id)->where('to_id',$userId)->where('ad_id',$adId)->first();
 
 
 if(empty($validdata)){
     
        $first = new Firstmessages();
        $first->type = 'user';
        $first->from_id = Auth::user()->id;
        $first->to_id = $userId;
        $first->body = 'hello';
        $first->ad_id = $adId;
        $first->save();
        
        
        $message = new Message();
        $message->id = $messageID;
        $message->type = 'user';
        $message->from_id = Auth::user()->id;
        $message->to_id = $userId;
        $message->body = 'hello';
        $message->ad_id = $adId;
        $message->seller_view = 1;
        
        $message->save();
     
 }
       
        
    }




    public function contact_us()
    {
        // if(\Session::get('locale')=='ar')
        // {
        //         return view('arabic.contact-us');
        // }
        // elseif(\Session::get('locale')=='en')
        // {
        //     return view('contact-us');    
        // }
        
        return view('contact-us');
        
    }

    public function subscription()
    {
        //   if(\Session::get('locale')=='ar')
        // {
        //       return view('arabic.subscription');
        // }
        // elseif(\Session::get('locale')=='en')
        // {
        //     return view('subscription'); 
        // }
        
        return view('subscription');
        
    }

    public function service_plans()
    {
        // return "success";
        return view('service-plans');
        
        //  if(\Session::get('locale') == 'ar'){
            
        //  return view('arabic.service-plans');
        // }
        // elseif(\Session::get('locale') == 'en' || empty(\Session::get('locale'))){
            
        //     return view('service-plans');
        // }
        
       
    }

    public function wish_list()
    {
         return view('my-wishlist'); 
        // if(\Session::get('locale')=='en')
        // {
        //     return view('my-wishlist');    
        // }
        // elseif(\Session::get('locale')=='ar')
        // {
        //     return view('arabic.my-wishlist');
        // }
        
    }

    public function wallet()
    {
        return view('wallet');
    }

    public function post_category()
    {
        
        return view('select-category-post'); 
        
        // if(\Session::get('locale')=='en')
        // {
        //     return view('select-category-post');  
        // }
        // elseif(\Session::get('locale')=='ar')
        // {
        //      return view('arabic.select-category-post');
        // }
       
    }
    public function help()
    {
        
        return view('help');
        
        // if(\Session::get('locale')=='en')
        // {
        //     return view('help');  
        // }
        // elseif(\Session::get('locale')=='ar')
        // {
        //     return view('arabic.help');
        // }
        
    }
    public function notify()
    {
        
        
       return view('notifications',$data); 
    }
    
    
    public function userTransaction()
    {
        
        $data['transaction'] = TransactionData::join('banner_ads', 'banner_ads.id', 'transaction_data.plan_id')
                                                 ->join('users', 'users.id', 'transaction_data.user_id')
                                                 ->where('transaction_data.user_id',Auth::user()->id)
                                              ->get(['transaction_data.*','banner_ads.title as packageTitle','users.name as userName']);
                                              
                                             
                                             
        $data['allTransactions'] =  AllTransaction::where('all_transaction.user_id', Auth::user()->id)
                                                    ->join('services', 'services.id', 'all_transaction.record_id')
                                                    ->get([
                                                        'all_transaction.*',
                                                        'services.icon as sIcon',
                                                        'services.title as sTitle',
                                                        'services.icon as sIcon',
                                                    ]);
        
        ;                                   
                                            //   dd( $data['allTransactions'], Auth::user()->id);
                                              
                                              
       return view('transaction.user-transaction',$data);
       
    }
    
    

    public function chat_message()
    {
         return view('chat-message');
        //   if(\Session::get('locale')=='en')
        // {
        //     return view('chat-message');
        // }
        // elseif(\Session::get('locale')=='ar')
        // {
        //     return view('arabic.chat-message');
        // }
        
    }
    public function featured_ads()
    {
        return view('featured-ads');
    }



    public function get_search_data(Request $request)
    {

        $like_value = $request->like_value;


        $validate = SellNow::where('ad_title', 'LIKE', '%' . $like_value . '%')->distinct()->get('ad_title');


        return json_encode($validate);
    }


    public function saveAdReports(Request $request)
    {

        $request->validate([
            'report' => 'required|max:255',
            'comment' => 'required|max:255',
        ]);

        $ad_id = $request->adID;
        $report = $request->report;
        $comment = $request->comment;

        $store = new UserAdReport();
        $store->ad_id = $ad_id;
        $store->report = $report;
        $store->comment = $comment;
        $store->save();

            if ($store) {
                return [
                    'status' => 'success',
                ];
            } else {
    
                return [
                    'status' => 'error',
                ];
            }
    }



    public function thankyou(Request $request)
    {
        // $a=$request->$payment_type;
        // return $a;
        return view('test.thankyou');
    }

    public function seenNumber(){
        dd('check');
    }

    public function testhome(){
        return view('test.homecopy');
    }
    
    public function test_show_banner(){
       return view('test.banner_ads_shows_here');    
    }
    
    public function test_show_banner_ads(){
        return view('test.show_banner_advertisement');
    }
    
    public function test_show_search_featured_ads(){
        return view('test.search_featured_ads');
    }
    
    public function test_show_shop_plan_ads(){
        return view('test.shop_plans_ads');
    }
    public function knet(Request $request)
    {
        
         dd($request->all());
        // // if(!$request->has('total_amount')){
        // //     return abort(404);
        // // }
      $data = $request->all();
        return view('test.knet' , $data);
    }
    public function allComments($id){
  
        // $data['slotI'] = $this->get_slot_banner(9);
         $data['slotA'] = $this->get_slot_banner('A',4);
         $data['slotB'] = $this->get_slot_banner('B',4);
         $data['slotC'] = $this->get_slot_banner('C',4);
       // dd($data['slotB']);
        

        // $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
        //                                                 ->where('purchases_bump_ads.status', 1)
        //                                                 ->where('purchases_bump_ads.bump_placement','=', 4)
        //                                                 ->get(['purchases_bump_ads_items.*','purchases_bump_ads.bump_placement']);



        $data['bumupads']  = Purchasesbumadsitem::join('purchases_bump_ads', 'purchases_bump_ads.id', 'purchases_bump_ads_items.purchase_id')
            //  ->join('purchases_bump_ads_items', 'purchases_bump_ads_items.ads_id', 'sell_now.sellid')
            ->where('purchases_bump_ads.status', 1)
            ->where('purchases_bump_ads.bump_placement', '=', 4)
            ->get(['purchases_bump_ads_items.ads_id as sellid','purchases_bump_ads_items.*', 'purchases_bump_ads.bump_placement']);

       
        foreach ($data['bumupads'] as $key => $wl) {
            $sellNow = SellNow::where('id', $wl->ads_id)->first();
           if (!empty($sellNow)) {
             
                $data['bumupads'][$key]['title']=$sellNow->ad_title;
                $data['bumupads'][$key]['price']=$sellNow->price;
                $data['bumupads'][$key]['disprice']=$sellNow->dis_price;
              
                $data['bumupads'][$key]['bannerimage'] = $sellNow->main_image;
            } else {
               
                $data['bumupads'][$key]['title']=0;
                $data['bumupads'][$key]['price']=0;     
                $data['bumupads'][$key]['disprice']=0;
                $data['bumupads'][$key]['bannerimage'] = 0;
            }
        }
//dd($data['bumupads']);

        $data['sellnowgallery'] = Sellnowgallery::where('ads_id', $id)->get();


        $data['bumupadsSetting'] = Bumpupsetting::where('id', 4)->first();

        // dd($data['sellnowgallery']);



        if (Auth::Check()) {

            $data['sellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                ->leftjoin('users', 'users.id', 'wish_list.user_id')
                //  ->orderBy('sell_now.id', 'desc')
                //  ->where('wish_list.deleted_at', null)
                ->where('sell_now.id', $id)
                ->first([
                    'wish_list.ad_id', 'users.id as userid', 'sell_now.*', 'sub_categories.title as sub_category',
                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                ]);
            
            $wishlist = WishList::where('ad_id', $data['sellNow']->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($wishlist)) {
                $data['sellNow']['is_wishlist'] = 1;
            } else {
                $data['sellNow']['is_wishlist'] = 0;
            }

            $Like = Like::where('ad_id', $data['sellNow']->id)->where('user_id', Auth::user()->id)->first();
            if (!empty($Like)) {
                $data['sellNow']['is_like'] = 1;
            } else {
                $data['sellNow']['is_like'] = 0;
            }

           $this->productchatWithSeller($data['sellNow']->user_id,$data['sellNow']->id);
            
            
        } else {

            $data['sellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                        ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                        ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                        ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                        //  ->orderBy('sell_now.id', 'desc')
                                        //  ->where('wish_list.deleted_at', null)
                                        ->where('sell_now.id', $id)
                                        ->first([
                                            'wish_list.ad_id', 'users.id as userid', 'sell_now.*', 'sub_categories.title as sub_category',
                                            'categories.title as category',  'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                        ]);
                                        
                /*echo "<pre>";
                print_r($data['sellNow']);die;*/


            // $data['user'] = User::where('id', $data['sellNow']->user_id)->first();
        }




        $data['user'] = User::where('id', $data['sellNow']->user_id)->first();




      //var_dump(isset($data['user']));die;


    //changes done here         
         if(isset($data['user'])){
             
             if($data['user']->is_company == 1){
            
            $data['companyprofile'] = Companyprofile::where('user_id', $data['sellNow']->user_id)->first();
            
             }
             else{
            
               $data['companyprofile'] = '';
               
             }
          }else{
            
            return redirect()->back()->with('msg','User doesn\'t exists');
              
          }
         
        //changes end here  
         

        //  $data['sellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
        //                                 ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
        //                                 ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
        //                                 ->leftjoin('users', 'users.id', 'wish_list.user_id')
        //                                 //  ->orderBy('sell_now.id', 'desc')
        //                                 //  ->where('wish_list.deleted_at', null)
        //                                 ->where('sell_now.id', $id)
        //                                 ->first([
        //                                     'wish_list.ad_id', 'users.id as userid', 'sell_now.*', 'sub_categories.title as sub_category',
        //                                     'categories.title as category',  'sell_now.state_id as statename', 'sell_now.city_id as cityname'
        //                                 ]);


// all_attributes
// ad_attributes


        $data['adAttribute'] = AdAttribute::join('all_attributes', 'all_attributes.id', 'ad_attributes.attribute_key')
                                            ->leftJoin('properties', 'properties.id', 'ad_attributes.attribute_value')
                                           ->where('ad_attributes.ad_id', $data['sellNow']->id)
                                           ->get(['ad_attributes.*','all_attributes.title as attributesTitle','all_attributes.attribute_type_id','properties.title as propertiesTitle']);
                                           
                                           

        //  dd($data['adAttribute']);


        $data['brand'] = Brand::where('id', $data['sellNow']->brand_id)->first();
        // dd($data['sellNow']);
        $data['subBrand'] = SubBrand::where('id', $data['sellNow']->sub_brand_id)->first();
        
        

        // dd($data['subBrand']);


            if ($data['sellNow']->is_auction == 1) {
    
                $data['auction'] = Sellnowauction::where('sell_now_id', $data['sellNow']->id)->first();
                $data['sellnowbid'] = Sellnowbid::where('ads_id', $data['sellNow']->id)->orderBy('id', 'desc')->first();
    
            } else {
    
                $data['auction'] = '';
    
            }


        //   dd($data['sellnowbid']);

        if (Auth::Check()) {

            $data['relatedsellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                                ->leftjoin('wish_list', 'wish_list.ad_id', 'sell_now.id')
                                                ->leftjoin('users', 'users.id', 'wish_list.user_id')
                                                ->orderBy('sell_now.id', 'desc')
                                                ->where('sell_now.is_approve', 1)
                                                ->where('sell_now.status_id', 1)
                                                ->where('sell_now.category_id', $data['sellNow']->category_id)
                                                ->where('sell_now.id', '!=', $data['sellNow']->id)
                                                //  ->where('wish_list.deleted_at', null)
                                                ->distinct()
                                                ->get([
                                                    'sell_now.*', 'sub_categories.title as sub_category',
                                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                                ]);
            foreach ($data['relatedsellNow'] as $key => $wl) {
                $wishlist = WishList::where('ad_id', $wl->id)->where('user_id', Auth::user()->id)->first();
                if (!empty($wishlist)) {
                    $data['relatedsellNow'][$key]['is_wishlist'] = 1;
                } else {
                    $data['relatedsellNow'][$key]['is_wishlist'] = 0;
                }
            }
        } else {

            $data['relatedsellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                                ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                                ->orderBy('sell_now.id', 'desc')
                                                ->where('sell_now.is_approve', 1)
                                                ->where('sell_now.status_id', 1)
                                                ->where('sell_now.category_id', $data['sellNow']->category_id)
                                                ->where('sell_now.id', '!=', $data['sellNow']->id)
                                                ->get([
                                                    'sell_now.*', 'sub_categories.title as sub_category',
                                                    'categories.title as category', 'sell_now.state_id as statename', 'sell_now.city_id as cityname'
                                                ]);
        }

        $data['adReports'] = AdReport::where('status_id', 1)->get();


        $data['payment_list']  = Paymentlist::join('payment_setting', 'payment_setting.payment_id', 'payment_list.id')
            ->where('payment_setting.status', 1)
            ->get(['payment_list.*', 'payment_setting.status']);

        $data['admin_banks'] = AdminBank::where('is_active',1)->get();

        $walletController = new \App\Http\Controllers\WalletController(); 
        $data['balance'] =  $walletController->userWalletBalance();
        $webSetting= WebSetting::find(1);
        $data['tax'] = $webSetting->tax_percent;  
        
         $data['bumupsetting'] = Bannersetting::where('page_id',4)->first();
         
        
        // 
        if (Auth::Check()) {
                if(!empty($data['sellNow']->user_id) && $data['sellNow']->user_id == Auth::user()->id){
                    
                    return view('test.product-comments',$data); 
                }
                else{
                    return view('test.product-comments', $data);  
                }
            }
            else{
                    return view('test.product-comments', $data);  
            }
        
        
        
        
        
        
        
    
    }
    
}
