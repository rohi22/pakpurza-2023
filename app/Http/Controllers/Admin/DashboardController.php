<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Purchasesbumads;
use App\Models\Purchasesbannerads;
use App\Models\Pagelist;
use App\Models\Searchfeaturedlistings;
use App\Models\Categoryfeaturedlistings;
use App\Models\Brandfeaturedlistings;
use App\Models\Shopfeaturedlistings;
use App\Models\Hotfeaturedlistings;
use App\Models\Homefeaturedlistings;
use App\Models\Allattributes;
use App\Models\Subscriptionplans;
use App\Models\Bumpupads;
use App\Models\User;
use App\Models\SellNow;
use App\Models\Bannerads;





class DashboardController extends Controller
{
     
    public function index(){
        $todayDate = date("Y-m-d");    
        $data['pendingAds']  = SellNow::where('is_approve',0)->count();
        $data['deactive'] = User::where('is_active',0)->count();
        $data['locked']   = User::where('is_ban',1)->count();
        
        $data['totalAds'] = SellNow::count();
        $data['expiredAds'] = SellNow::where('is_approve',3)->count(); 
        
        $data['rejectAds'] = SellNow::where('is_approve', 2)->count();
        $data['approvedAds'] = SellNow::where('is_approve', 1)->count();
        
        $data['totalUsers'] = User::count();
        $data['newUsers'] = User::whereDate('created_at', date('Y-m-d'))->count();
        
        $data['resetUserPasswords'] = User::where('is_password_reset', 1)->count();
        
        // Banner Ads
        $data['totalBannerAds'] = Bannerads::count();
        $data['activeBannerAds'] = Bannerads::where('status',1)->count();
        $data['expiredBannerAds'] = Bannerads::where('status',0)->count();
        $data['todayBannerAds'] = Bannerads::where('created_at',date('y-m-d'))->count();
        // Category Featured 
        $data['totalCategoryFeatured'] =Categoryfeaturedlistings::count();
        $data['activeCategoryFeatured'] = Categoryfeaturedlistings::where('status',1)->count();
        $data['expiredCategoryFeatured'] = Categoryfeaturedlistings::where('status',0)->count();
        $data['todayCategoryFeatured'] = Categoryfeaturedlistings::whereDate('created_at',$todayDate)->count();
        
        //Brand Featured Listings   
        $data['totalTypeFeatured'] = Brandfeaturedlistings::count();
        $data['activeTypeFeatured'] = Brandfeaturedlistings::where('status',1)->count();
        $data['expiredTypeFeatured'] = Brandfeaturedlistings::where('status',0)->count();
        $data['todayTypeFeatured'] = Brandfeaturedlistings::whereDate('created_at',$todayDate)->count();
        
        //Search Featured Listings
        $data['totalSearchFeatured'] = Searchfeaturedlistings::count();
        $data['activeSearchFeatured'] = Searchfeaturedlistings::where('status',1)->count();
        $data['expiredSearchFeatured'] = Searchfeaturedlistings::where('status',0)->count();
        $data['todaySearchFeatured'] = Searchfeaturedlistings::whereDate('created_at',$todayDate)->count();
        
       //Shop Featured Listings
        $data['totalShopFeatured'] =Shopfeaturedlistings::count();
        $data['activeShopFeatured'] =Shopfeaturedlistings::where('status',1)->count();
        $data['expiredShopFeatured'] =Shopfeaturedlistings::where('status',0)->count();
        $data['todayShoFeatured'] = Shopfeaturedlistings::whereDate('created_at',$todayDate)->count();
        
       
        //Bump Up Ads
        $data['totalBump'] = Bumpupads::count();
        $data['activeBump'] = Bumpupads::where('status',1)->count();
        $data['expiredBump'] = Bumpupads::where('status',0)->count();
        $data['todayBump'] = Bumpupads::whereDate('created_at',$todayDate)->count();
       
       
        $data['menu'] = 'dashboardmenu';
        $data['submenu'] = 'dashboardsubmenu';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
 
 
        
        // $data['purchasesbumadsCount']  = Purchasesbumads::count();
        // $data['purchasesbanneradsCount']  = Purchasesbannerads::count();
        
        // dd($data);
        return view('admin.dashboard',$data);
    }
    
    public function deactivated(){
      $data['menu'] = 'Deactivated Users';
      $data['submenu'] = '';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
        $data['users'] = User::where('is_active',0)->get();
        return view('admin.users.deactivatedUsers',$data);
        
        
    }
    
    public function locked()
    {
      $data['menu'] = 'Locked Users';
      $data['submenu'] = '';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
        $data['users'] = User::where('is_ban',1)->get();
        return view('admin.users.lockedUsers',$data);
    }
    
    
    public function totalAds()
    {
        $data['menu'] = 'Total Ads';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['ads'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                    ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                    ->orderBy('sell_now.id','Desc')
                                    ->get(['sell_now.*','sub_categories.title as sub_category', 'categories.title as category']);
        return view('admin.sell.totalAds',$data);
    }
    
    public function rejectAds()
    {
        $data['menu'] = 'Total Ads';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['ads'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                    ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                    ->where('is_approve', 2)
                                    ->orderBy('sell_now.id','Desc')
                                    ->get(['sell_now.*','sub_categories.title as sub_category', 'categories.title as category']);
        return view('admin.sell.totalAds',$data);
    }
    
    public function approvedAds()
    {
        $data['menu'] = 'Total Ads';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['ads'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                    ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                    ->where('is_approve', 1)
                                    ->orderBy('sell_now.id','Desc')
                                    ->get(['sell_now.*','sub_categories.title as sub_category', 'categories.title as category']);
        return view('admin.sell.totalAds',$data);
    }
    
    public function expiredAds()
    {
        $data['menu'] = 'Expired Ads';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['ads'] = SellNow::where('is_approve',3)->get();
        return view('admin.sell.expiredAds',$data);   
    }
    public function totalUsers()
    {
        $data['menu'] = 'Total Users';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['users'] = User::paginate(5);
        return view('admin.users.all-users',$data); 
    }
    
    public function newUsers()
    {
        $data['menu'] = 'Total Users';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['users'] = User::whereDate('created_at', date('Y-m-d'))->paginate(5);
        return view('admin.users.all-users',$data); 
    }
    
    public function activeBannerAds(){
        
        
      $data['menu'] = 'Active Banner Ads';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       $data['bannerads'] = Bannerads::join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
                                        ->orderBy('banner_ads.id', 'desc')
                                        ->where('status',1)
                                        ->get(['banner_ads.*','banner_slots.title as slot_title']);
                        
        return view('admin.bannerads.activeBannerAds',$data);
        
    }
    public function expiredBannerAds(){
       $data['menu'] = 'Expired Banner Ads';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       $data['bannerads'] = Bannerads::join('banner_slots', 'banner_slots.id', 'banner_ads.placement')
                                        ->orderBy('banner_ads.id', 'desc')
                                        ->where('status',0)
                                        ->get(['banner_ads.*','banner_slots.title as slot_title']);
                        
        return view('admin.bannerads.activeBannerAds',$data);
        
    }
    
    // Category Featured 
    public function totalFeatured(){
        
       
       $data['menu'] = 'Total Category Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['searchfeaturedlistings'] = Categoryfeaturedlistings::all();
     return view('admin.featuredlistings.categoryfeatured.totalfeatured',$data);
        
    }
    public function activeFeatured(){
        
       
       $data['menu'] = 'Active Category Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['searchfeaturedlistings'] = Categoryfeaturedlistings::where('status',1)->get();
     return view('admin.featuredlistings.categoryfeatured.activefeatured',$data);
        
    }
    public function expiredFeatured(){
        
       
       $data['menu'] = 'Expired Category Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
       $data['searchfeaturedlistings'] = Categoryfeaturedlistings::where('status',0)->get();
     return view('admin.featuredlistings.categoryfeatured.expiredfeatured',$data);
        
    }
    public function todayFeatured(){
        
       $data['menu'] = 'Today Category Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       $data['date']=Categoryfeaturedlistings::all();
       $todayDate = date("Y-m-d");     
       $data['searchfeaturedlistings'] = Categoryfeaturedlistings::whereDate('created_at',$todayDate)->get();
       
    //   dd($data['searchfeaturedlistings']);
      
      
      
     return view('admin.featuredlistings.categoryfeatured.todatefeatured',$data);
    }
    
    // Brand Featured
    public function totalBrand(){
        
       
       $data['menu'] = 'Total Brand Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['searchfeaturedlistings'] = Brandfeaturedlistings::all();
     return view('admin.featuredlistings.brandfeatured.totalfeatured',$data);
        
    }
    public function activeBrand(){
        
       
       $data['menu'] = 'Active Brand Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['searchfeaturedlistings'] = Brandfeaturedlistings::where('status',1)->get();
     return view('admin.featuredlistings.brandfeatured.activefeatured',$data);
        
    }
    public function expiredBrand(){
        
       
       $data['menu'] = 'Expired Category Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
       $data['searchfeaturedlistings'] = Brandfeaturedlistings::where('status',0)->get();
   
       return view('admin.featuredlistings.brandfeatured.expiredfeatured',$data);
        
    }
    public function todayBrand(){
        
       $data['menu'] = 'Today Category Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
      $data['date']=Brandfeaturedlistings::all();
       $todayDate = date("Y-m-d");     
       $data['searchfeaturedlistings'] = Brandfeaturedlistings::whereDate('created_at',$todayDate)->get();
       
    //   $data['searchfeaturedlistings'] = Categoryfeaturedlistings::where('created_at', date("Y-m-d"))->get();
      
      
      
     return view('admin.featuredlistings.brandfeatured.todatefeatured',$data);
    }
    
    
    // Search Featured 
    public function totalSearchFeatured(){
        
       
       $data['menu'] = 'Total Search Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['searchfeaturedlistings'] = Searchfeaturedlistings::all();
     return view('admin.featuredlistings.searchfeatured.totalfeatured',$data);
        
    }
    public function activeSearchFeatured(){
        
       
       $data['menu'] = 'Active Search Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['searchfeaturedlistings'] = Searchfeaturedlistings::where('status',1)->get();
     return view('admin.featuredlistings.searchfeatured.activefeatured',$data);
        
    }
    public function expiredSearchFeatured(){
        
       
       $data['menu'] = 'Expired Search Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
       $data['searchfeaturedlistings'] = Searchfeaturedlistings::where('status',0)->get();
   
       return view('admin.featuredlistings.searchfeatured.expiredfeatured',$data);
        
    }
    public function todaySearchFeatured(){
        
       $data['menu'] = 'Today Search Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       $data['date']=Searchfeaturedlistings::all();
       $todayDate = date("Y-m-d");     
       $data['searchfeaturedlistings'] = Searchfeaturedlistings::whereDate('created_at',$todayDate)->get();
      
     return view('admin.featuredlistings.searchfeatured.todatefeatured',$data);
    }
    
    
    // Shop Featured 
    public function totalShopFeatured(){
        
       
       $data['menu'] = 'Total Shop Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['searchfeaturedlistings'] = Shopfeaturedlistings::all();
     return view('admin.featuredlistings.shopfeatured.totalfeatured',$data);
        
    }
    public function activeShopFeatured(){
        
       
       $data['menu'] = 'Active Home Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['searchfeaturedlistings'] = Shopfeaturedlistings::where('status',1)->get();
     return view('admin.featuredlistings.shopfeatured.activefeatured',$data);
        
    }
    public function expiredShopFeatured(){
        
       
       $data['menu'] = 'Expired Shop Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
       $data['searchfeaturedlistings'] = Shopfeaturedlistings::where('status',0)->get();
   
       return view('admin.featuredlistings.shopfeatured.expiredfeatured',$data);
        
    }
    public function todayShopFeatured(){
        
       $data['menu'] = 'Today Shp Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       $data['date']=Shopfeaturedlistings::all();
       $todayDate = date("Y-m-d");     
       $data['searchfeaturedlistings'] = Shopfeaturedlistings::whereDate('created_at',$todayDate)->get();
     return view('admin.featuredlistings.shopfeatured.todatefeatured',$data);
    }
    
    // Bump Up Ads 
    public function totalBumpUp(){
        
           
        $data['menu'] = 'Total Bump Up';
        $data['submenu'] = '';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
           
           
        $data['bumpupads'] = Bumpupads::join('page_list', 'page_list.id', 'bump_up_ads.placement')
                                            ->orderBy('bump_up_ads.id', 'desc')
                                            ->get(['bump_up_ads.*','page_list.page_title as page_title']);
                            
                            
        return view('admin.bumpupads.totalBumpUp',$data);
        
    }
    public function activeBumpUp(){
        
       
       $data['menu'] = 'Active Bump Up';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
      $data['bumpupads'] = Bumpupads::join('page_list', 'page_list.id', 'bump_up_ads.placement')
                                                ->orderBy('bump_up_ads.id', 'desc')
                                                ->where('bump_up_ads.status',1)
                                                ->get(['bump_up_ads.*','page_list.page_title as page_title']);
     return view('admin.bumpupads.activeBumpUp',$data);
        
    }
    public function expiredBumpUp(){
        
       
       $data['menu'] = 'Expired Bump Up';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
       $data['bumpupads'] = Bumpupads::join('page_list', 'page_list.id', 'bump_up_ads.placement')
                                                    ->orderBy('bump_up_ads.id', 'desc')
                                                    ->where('bump_up_ads.status',0)
                                                    ->get(['bump_up_ads.*','page_list.page_title as page_title']);
     return view('admin.bumpupads.expiredBumpUp',$data);
        
    }
    public function todayBumpUp(){
        
       $data['menu'] = 'Today Shp Featured';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
        $data['date']=Bumpupads::all();
       $todayDate = date("Y-m-d");     
       $data['bumpupads'] = Bumpupads::whereDate('created_at',$todayDate)->get();
      
      
      
     return view('admin.bumpupads.todatefeatured',$data);
    }
    
    
    
    
}
