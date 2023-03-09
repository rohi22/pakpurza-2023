<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use App\Models\CoinWalletSetting;
use App\Models\SellnowSetting;
use App\Models\Sellnowfield;
use App\Models\SmsApi;
use App\Models\EmailSetting;
use App\Models\DepositLimit;




class WebSettingsController extends Controller
{
    
    public function adsSetting()
    {
        $data['menu'] = 'webmenu';
        $data['submenu'] = 'websubmenu7';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        
        $data['websetting'] = WebSetting::where('id', 1)->firstOrFail();
        
        return view('admin.web-settings.ads-setting',$data);
    }
    
    public function saveAdsSetting(Request $request)
    {
        $websetting = WebSetting::where('id', 1)->firstOrFail();
        $websetting->is_ad_auto_approve = $request->status;
        $websetting->save();
        
        \Session::flash('success', 'Status updated successfully.');
        
        return redirect()->back();
    }
    
     
     public function sell_now_setting(){
         
       
         $data['menu'] = 'sellnowmenu';
       $data['submenu'] = 'sellnowsubmenu';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
 
     $data['setting'] = Sellnowfield::get();
     

     return view('admin.web-settings.sell-now-settings',$data);
     
   }
   
   public function update_sell_now_field(Request $request){
       
       
       for($i= 0;$i<count($request->field_id);$i++){
           
            $update = Sellnowfield::where('id',$request->field_id[$i])->first();
            
             $update->field_status = $request->field_status[$i];
             $update->save();
           
       }
       
    //   dd($request->all());
        return redirect()->back()->with('success', 'Setting Updated');
   }
   
   
   public function headerSetting(){
       
    //     $menu = 'webmenu';
    //  $submenu = 'websubmenu1';
     
      $data['menu'] = 'webmenu';
       $data['submenu'] = 'websubmenu1';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
     
     $data['setting'] = WebSetting::first();
     return view('admin.web-settings.header-settings',$data);
   }
   
   public function headerEdit(Request $request){
      

      $request->validate([
         'title' => 'required|max:255|string',
         'description' => 'max:255',
        //  'logo' => 'required|mimes:jpeg,bmp,png',
        //  'title_icon' => 'required|mimes:jpeg,bmp,png',
         'meta_title' => 'max:255',
         'meta_keywords' => 'max:255',
         'meta_description' => 'max:255',
      ]);

     
       $edit = WebSetting::first();
       $edit->title  = $request->title;
       $edit->description  = $request->description;
      
       $logo_name = '';
       if ($request->hasFile('logo')) {
         @unlink(public_path('/assets/media/web-settings' . $edit->logo));
         $logo = $request->file('logo');
         $logo_name = time() . $logo->getClientOriginalName();
         $logo->move(public_path('/assets/media/web-settings'), $logo_name);
       } else {
         $logo_name = $edit->logo;
       }
       $edit->logo  = $logo_name;


       $title_icon_name = '';
       if ($request->hasFile('title_icon')) {
         @unlink(public_path('/assets/media/web-settings' . $edit->title_icon));
         $title_icon = $request->file('title_icon');
         $title_icon_name = time() . $title_icon->getClientOriginalName();
         $title_icon->move(public_path('/assets/media/web-settings'), $title_icon_name);
       } else {
         $title_icon_name = $edit->title_icon;
       }
       $edit->title_icon  = $title_icon_name;

       $edit->meta_title  = $request->meta_title;
       $edit->meta_keywords  = $request->meta_keywords;
       $edit->meta_description  = $request->meta_description;
    //   Colors


    // Featured Button
    $edit->f_bg         = $request->f_bg;
    $edit->f_border     = $request->f_border;
    $edit->f_text       = $request->f_text;
    $edit->f_icon       = $request->f_icon;
    
    // Offer  Button
    $edit->off_bg        = $request->off_bg;
    $edit->off_border    = $request->off_border;
    $edit->off_text      = $request->off_text;
    $edit->off_icon      = $request->off_icon;
    
    // Latest  Button
    $edit->late_bg      = $request->late_bg;
    $edit->late_border  = $request->late_border;
    $edit->late_text    = $request->late_text;
    $edit->late_icon    = $request->late_icon;
            


       
       $edit->save();


       return redirect()->back()->with('success', 'Setting Updated');

      
   }



   public function footerSetting(){
       
        //  $menu = 'webmenu';
        //  $submenu = 'websubmenu2';
         
          $data['menu'] = 'webmenu';
       $data['submenu'] = 'websubmenu2';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
     
      $data['setting'] = WebSetting::first();
      return view('admin.web-settings.footer-settings',$data);
    }
    
    public function footerEdit(Request $request){
       
      
       $request->validate([
          'footer_content_heading' => 'max:255',
          'footer_content' => 'max:255',
          'right_reserved' => 'max:255',
          'social_icon_heading' => 'max:255',
          'twitter_link' => 'max:255',
          'instagram_link' => 'max:255',
          'facebook_link' => 'max:255',
          'apps_icon_heading' => 'max:255',
          'android_link' => 'max:255',
          'apple_link' => 'max:255',
          'payment_gateway_logo' => 'mimes:jpeg,jpg,bmp,png',
          'twitter_icon' => 'mimes:jpeg,jpg,bmp,png',
          'instagram_icon' => 'mimes:jpeg,jpg,bmp,png',
          'facebook_icon' => 'mimes:jpeg,jpg,bmp,png',
          'android_icon' => 'mimes:jpeg,jpg,bmp,png',
          'apple_icon' => 'mimes:jpeg,jpg,bmp,png',
       ]);
 
      
        $edit = WebSetting::first();
        $edit->footer_content_heading  = $request->footer_content_heading;
        $edit->footer_content  = $request->footer_content;
        $edit->right_reserved  = $request->right_reserved;
        $edit->social_icon_heading  = $request->social_icon_heading;
        $edit->twitter_link  = $request->twitter_link;
        $edit->instagram_link  = $request->instagram_link;
        $edit->facebook_link  = $request->facebook_link;
        $edit->apps_icon_heading  = $request->apps_icon_heading;
        $edit->android_link  = $request->android_link;
        $edit->apple_link  = $request->apple_link;
        
        $edit->reach_us_number = $request->reach_us_number;
        $edit->reach_us_email = $request->reach_us_email;
        $edit->reach_us_address = $request->reach_us_address;
        
       
        $payment_gateway_logo_name = '';
        if ($request->hasFile('payment_gateway_logo')) {
          @unlink(public_path('/assets/media/web-settings' . $edit->payment_gateway_logo));
          $payment_gateway_logo = $request->file('payment_gateway_logo');
          $payment_gateway_logo_name = time() . $payment_gateway_logo->getClientOriginalName();
          $payment_gateway_logo->move(public_path('/assets/media/web-settings'), $payment_gateway_logo_name);
        } else {
          $payment_gateway_logo_name = $edit->payment_gateway_logo;
        }
        $edit->payment_gateway_logo  = $payment_gateway_logo_name;


        $twitter_icon_name = '';
        if ($request->hasFile('twitter_icon')) {
          @unlink(public_path('/assets/media/web-settings' . $edit->twitter_icon));
          $twitter_icon = $request->file('twitter_icon');
          $twitter_icon_name = time() . $twitter_icon->getClientOriginalName();
          $twitter_icon->move(public_path('/assets/media/web-settings'), $twitter_icon_name);
        } else {
          $twitter_icon_name = $edit->twitter_icon;
        }
        $edit->twitter_icon  = $twitter_icon_name;


        $instagram_icon_name = '';
        if ($request->hasFile('instagram_icon')) {
          @unlink(public_path('/assets/media/web-settings' . $edit->instagram_icon));
          $instagram_icon = $request->file('instagram_icon');
          $instagram_icon_name = time() . $instagram_icon->getClientOriginalName();
          $instagram_icon->move(public_path('/assets/media/web-settings'), $instagram_icon_name);
        } else {
          $instagram_icon_name = $edit->instagram_icon;
        }
        $edit->instagram_icon  = $instagram_icon_name;


        $facebook_icon_name = '';
        if ($request->hasFile('facebook_icon')) {
          @unlink(public_path('/assets/media/web-settings' . $edit->facebook_icon));
          $facebook_icon = $request->file('facebook_icon');
          $facebook_icon_name = time() . $facebook_icon->getClientOriginalName();
          $facebook_icon->move(public_path('/assets/media/web-settings'), $facebook_icon_name);
        } else {
          $facebook_icon_name = $edit->facebook_icon;
        }
        $edit->facebook_icon  = $facebook_icon_name;


        $android_icon_name = '';
        if ($request->hasFile('android_icon')) {
          @unlink(public_path('/assets/media/web-settings' . $edit->android_icon));
          $android_icon = $request->file('android_icon');
          $android_icon_name = time() . $android_icon->getClientOriginalName();
          $android_icon->move(public_path('/assets/media/web-settings'), $android_icon_name);
        } else {
          $android_icon_name = $edit->android_icon;
        }
        $edit->android_icon  = $android_icon_name;


        $apple_icon_name = '';
        if ($request->hasFile('apple_icon')) {
          @unlink(public_path('/assets/media/web-settings' . $edit->apple_icon));
          $apple_icon = $request->file('apple_icon');
          $apple_icon_name = time() . $apple_icon->getClientOriginalName();
          $apple_icon->move(public_path('/assets/media/web-settings'), $apple_icon_name);
        } else {
          $apple_icon_name = $edit->apple_icon;
        }
        $edit->apple_icon  = $apple_icon_name;
 
 
        
        $edit->save();
 
 
        return redirect()->back()->with('success', 'Setting Updated');
 
       
    }

    public function storeSlider(Request $request){
      dd($request->all());
    }


    public function smsEmailSetting(Request $request){

             
      $data['menu'] = 'webmenu';
      $data['submenu'] = 'websubmenu3';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['sms'] = SmsApi::first();
      $data['email'] = EmailSetting::first();
      

      return view('admin.web-settings.sms-and-email',$data);

    }


    public function sms(Request $request){
      
        $update = SmsApi::where('id', 1)->first();
        $update->username = $request->username;
        $update->password = $request->password;
        $update->customerId = $request->customerId;
        $update->senderText = $request->senderText;
        $update->save();

        return redirect()->back()->with('success', 'Setting Updated');

        
        
    }


    public function email(Request $request){
        
        $update =  EmailSetting::where('id', 1)->first();
        $update->background_color = $request->background_color;
        $update->content_background_color = $request->content_background_color;
        $update->font_color = $request->font_color;
        $update->cc = $request->cc;
        $update->footer_font_color = $request->footer_font_color;
        $update->footer_content = $request->footer_content;
        $update->save();

        return redirect()->back()->with('success', 'Setting Updated');

    }


    public function coinWalletSetting(Request $request){

      $data['menu'] = 'webmenu';
      $data['submenu'] = 'websubmenu4';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
      $data['cw'] = CoinWalletSetting::first();
      return view('admin.coin-wallet.create',$data);
    }

    public function coinWalletSettingSave(Request $request){

        $update = CoinWalletSetting::where('id', 1)->first();
        $update->points_per_share = $request->points_per_share;
        $update->number_of_coins  = $request->number_of_coins;
        $update->points_equal_to_money = $request->points_equal_to_money;
        $update->coins_on_purchasing = $request->coins_on_purchasing;
        $update->save();

        return redirect()->back()->with('success', 'Setting updated');
        
        
    }
    
    public function depositLimitSetting()
    {
        $data['menu'] = 'webmenu';
        $data['submenu'] = 'websubmenu5';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['deposit_limit'] = DepositLimit::first();
        
        return view('admin.deposit-limit.create',$data);
    }
    
    public function depositLimitSettingSave(Request $request)
    {
        $update = DepositLimit::where('id', 1)->first();
        $update->amount = $request->amount;
        $update->min_amount = $request->min_amount;
        $update->save();

        return redirect()->back()->with('success', 'Setting updated');
    }
   
}
