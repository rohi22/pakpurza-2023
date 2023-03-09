<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

use App\Models\CommonPages;
use App\Models\Contactus;
use App\Models\Property;
use App\Models\Message;
use App\Models\Gallery;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Post;
use App\Models\User;
use App\Models\WebSetting;
use Carbon\Carbon;
use Auth;
use DB;

class PagesController extends Controller
{
  
    public function about_us()
    {
       $data['page'] = CommonPages::findorfail(1);
        return view('pages.about_us',$data);
    }

    public function privacy_policy(){
            $data['page'] = CommonPages::findorfail(2);
            return view('pages.privacy_policy',$data);
       }
       public function terms_conditions(){
            $data['page'] = CommonPages::findorfail(3);
            
            return view('pages.terms_conditions',$data);
       }
    
    public function article_detail()
    {
        return view('pages.article_detail');
    }


    public function articles()
    {
        return view('pages.articles');
    }


    public function blog()
    {
        return view('pages.blog');
    }


    public function blog_detail()
    {
        return view('pages.blog_detail');
    }


    public function boost_detail()
    {
        return view('pages.boost_detail');
    }


    public function boost_your_ad()
    {
        return view('pages.boost_your_ad');
    }

    public function brand_child()
    {
        return view('pages.brand_child');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

     public function contact()
    {
        $data['contact'] = DB::table('contact_us_page')->first();
        $data['setting'] = WebSetting::first();

        return view('pages.contact',$data);
    }
    // Contact Store
    public function store(Request $request){
         

         
         $request->validate([
             'firstname' => 'required|max:255',
             'lastname' => 'required|max:255',
             'email' => 'required',
            //  'g-recaptcha-response' =>'required',
         ]);
         
        
        //  if(isset($_POST['g-recaptcha-response'])){
             
        //     $captcha = $_POST['g-recaptcha-response'];
          
        //  }
        //  else{
        //      return redirect()->back()->with('error', 'Verify Captcha');
        //  }

        // //   $captcha = $request->g-recaptcha-response;

        //     $secretKey = "6LfUnBUaAAAAAByDrx5c2_xPupvhnFACYYuUOtAt";
            
        //     $ip = $_SERVER['REMOTE_ADDR'];
        //     // post request to server
        //     $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        //     $response = file_get_contents($url);
        //     $responseKeys = json_decode($response,true);
            // should return JSON with success as true
            
            
            // if($responseKeys["success"]) {
                
            
                $store = new Contactus();
             
                $store->firstname= $request->firstname;
                $store->lastname= $request->lastname;
                $store->email= $request->email;
                $store->message= $request->message;
                
                $store->save();
            
                // $data = [
                //     'firstname' => $request->firstname,
                //     'lastname' => $request->lastname,
                //     'email' => $request->email,
                //     'dmessage' => $request->message,
                // ];
        
                // Mail::send('emails.contact', $data, function($message) use ($data) {
                //     $message->subject('Contact Email');
                //     $message->to($data['email'], $data['firstname'].' '.$data['lastname']);
                //     $message->bcc('technologiesmbt@gmail.com', 'Muhammad Ahmed');
                // });
                return redirect()->back()->with('success', 'Contact form create Successfuly!');
            
            
            // 
                  
        // } 
        // else{
        //     return redirect()->back()->with('error', 'Verify Captcha');
        // }
        
    
   }
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function detail_banner()
    {
        return view('pages.detail_banner');
    }


    public function detail_banner_in_slider()
    {
        return view('pages.detail_banner_in_slider');
    }

    public function detail_without_banner()
    {
        return view('pages.detail_without_banner');
    }

    public function editad()
    {
        return view('pages.editad');
    }

    public function events_detail()
    {
        return view('pages.events_detail');
    }

    public function events()
    {
        return view('pages.events');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function faq_right_category()
    {
        return view('pages.faq_right_category');
    }

    public function forgot_password()
    {
        return view('pages.forgot_password');
    }

    public function forum_detail()
    {
        return view('pages.forum_detail');
    }
    public function gallery()
    {
        return view('pages.gallery');
    }

    public function help_and_support()
    {
        return view('pages.help_and_support');
    }
    public function list_view_listing()
    {
        return view('pages.list_view_listing');
    }
    public function listing_left_sidebar()
    {
        return view('pages.listing_left_sidebar');
    }

    public function listing_top_serch()
    {
        return view('pages.listing_top_serch');
    }

    public function MyAds()
    {
        return view('pages.my_ads');
    }

    public function my_favorits()
    {
        return view('pages.my_favorits');
    }

    public function my_purchases()
    {
        return view('pages.my_purchases');
    }
    public function news_detail()
    {
        return view('pages.news_detail');
    }

    public function offers_messages()
    {
        return view('pages.offers_messages');
    }

    public function page()
    {
        return view('pages.page');
    }

    public function payment()
    {
        return view('pages.payment');
    }

    public function post_ad()
    {
        return view('pages.post_ad');
    }


    public function forums()
    {
        return view('pages.forums');
    }


    public function profile()
    {
        return view('pages.profile');
    }

    
    public function prvacy_settings()
    {
        return view('pages.prvacy_settings');
    }

    
    public function purchased_single_product()
    {
        return view('pages.purchased_single_product');
    }

    
    public function search_result()
    {
        return view('pages.search_result');
    }

    
    public function service_detail()
    {
        return view('pages.service_detail');
    }

    
    public function single_ad_duplicate()
    {
        return view('pages.single_ad_duplicate');
    }

    
    public function thank_you()
    {
        return view('pages.thank_you');
    }


    
    public function with_banner()
    {
        return view('pages.404_with_banner');
    }

    public function news()
    {
        return view('pages.news');
    }


    public function careers()
    {
        return view('pages.careers');
    }


    public function category()
    {
        return view('pages.category');
    }



}
