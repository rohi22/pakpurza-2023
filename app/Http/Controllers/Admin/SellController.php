<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\SellNow;
use App\Models\Sellnowgallery;
use App\Models\AdAttribute;
use App\Models\Attributes;
use App\Models\Map;
use App\Models\Sellnowauction;
use App\Models\User;
use App\Models\Property;
use App\Models\Adbrand;

use App\Models\GeoCountry;
use App\Models\AssignAttributeToBrand;
use App\Models\SubBrand;
use App\Models\AssignAttributeToSubBrand;
use App\Models\State;
use App\Models\City;

use App\Models\Location;
use App\Models\WebSetting;
use App\Models\Usersetting;
use App\Models\Useremailsetting;
use App\Models\Usersmssetting;
use App\Models\Userpushsetting;

use DB;
use Mail; 
use Session;

class SellController extends Controller
{
     
    public function index(){

           $data['menu'] = 'listingmenu';
           $data['submenu'] = '';
           $data['submenulevel1'] = '';
           $data['submenusub'] = '';
           
          
       
         $data['SellNow'] = SellNow::latest()->join('categories', 'categories.id', 'sell_now.category_id')
                                    ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                    ->orderBy('sell_now.id','Desc')
                                    ->paginate(10,['sell_now.*','sub_categories.title as sub_category', 'categories.title as category']);
            
        return view('admin.sell.index',$data);
    }
    
    
    
    
     public function searchproducts(){

           $data['menu'] = 'listingmenu';
           $data['submenu'] = '';
           $data['submenulevel1'] = '';
           $data['submenusub'] = '';
           
           
            $status = $_GET['status'];
           
           
           if($status == 3){
               
                $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                    ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                    // ->where('sell_now.is_approve',$status)
                                    ->orWhere('sell_now.is_bumpup_featured','>', 0)
                                        ->orWhere('sell_now.is_search_featured','>', 0)
                                        ->orWhere('sell_now.is_category_featured','>', 0)
                                        ->orWhere('sell_now.is_brand_featured','>', 0)
                                        ->orWhere('sell_now.is_shop_featured','>', 0)
                                        ->orWhere('sell_now.is_hot_featured','>', 0)
                                    ->orderBy('sell_now.id','Desc')
                                    ->get(['sell_now.*','sub_categories.title as sub_category', 'categories.title as category']);
                                    
           }
           else{
               
                $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                    ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                    ->where('sell_now.is_approve',$status)
                                    ->orderBy('sell_now.id','Desc')
                                    ->get(['sell_now.*','sub_categories.title as sub_category', 'categories.title as category']);
               
           }
       
        
            
        return view('admin.sell.index',$data);
    }
    
    
    
    
    
      public function pendingads (){

           $data['menu'] = 'pendingads';
           $data['submenu'] = '';
           $data['submenulevel1'] = '';
           $data['submenusub'] = '';
       
         $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
                                    ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
                                    ->orderBy('sell_now.id','Desc')
                                    ->where('sell_now.is_approve',0)
                                    ->get(['sell_now.*','sub_categories.title as sub_category', 'categories.title as category']);
            
        return view('admin.sell.pendingads',$data);
    }
    
    
    
    public function create(){

           $data['menu'] = 'listingmenu';
           $data['submenu'] = '';
           $data['submenulevel1'] = '';
           $data['submenusub'] = '';
           
           $data['states'] = State::all();
           $data['cities'] = City::all();
        
        
            // $ip = '149.147.0.0'; // Kuwait IP
        $ip = request()->ip(); // Client IP
        $data['geoIP'] = \Location::get($ip);
        $validateKuwait = $data['geoIP']->countryName;
        if ($validateKuwait == "Kuwait") {
            $data['is_kuwait'] = 1;
        } else {
            $data['is_kuwait'] = 0;
        }
        
        
        // dd($data);
        
        $data['user'] =  User::all();
        
        $data['category'] =  Category::where('status',1)->get();
     
        return view('admin.sell.create',$data);
   }
   
   
   public function get_subCategories(Request $request){
       $subCategories = SubCategory::where('category_id',$request->categoryId)->where('status',1)->get(['id','title']);
         $categorydata = '';
                if(!empty($subCategories)){
                     $categorydata.='<option>Select</option>';
                    foreach($subCategories as $p){
                        $categorydata.='<option value="'.$p->id.'">'.ucfirst($p->title).'</option>';
                    }
                }
                else{
                    $categorydata.='<option>No Data Found</option>';
                }
        return [
            'categorydata'=>$categorydata,
            
        ];
   }
   
   
   
   
   public function get_user_data(Request $request){
       
       $user = User::where('id',$request->userId)->first();
       
       $map = Map::where('user_id',$request->userId)->get();
       
         $mapdata = '';
                if(!empty($map)){
                     $mapdata.='<option>Select</option>';
                     $mapdata.='<option value="make">Make New Location</option>';
                    foreach($map as $p){
                        $mapdata.='<option value="'.$p->id.'">'.$p->address.'</option>';
                    }
                }
                else{
                    $mapdata.='<option value="make">Make New Location</option>';
                }
        
        
        return [
            'username'=>$user->name,
            'userphone'=>$user->phone,
            'mapdata'=>$mapdata,
            
        ];
   }
   
   
   
   
   public function get_subCategories_data(Request $request){
       $dropDown = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->categoryId)
          ->where('attributes.sub_category_id',$request->subcategoryId)
          ->where('all_attributes.attribute_type_id', 1)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
          
          $button = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->categoryId)
          ->where('attributes.sub_category_id',$request->subcategoryId)
          ->where('all_attributes.attribute_type_id', 2)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
          $inputBox = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->categoryId)
          ->where('attributes.sub_category_id',$request->subcategoryId)
          ->where('all_attributes.attribute_type_id', 3)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
            $brandDowns = '';
            $brand = Adbrand::join('brands', 'brands.id', 'ad_brands.brands_id')
            ->where('ad_brands.sub_category_id',$request->subcategoryId)
            ->get(['ad_brands.*','brands.id as brandid','brands.title as brandtitle']);
            $brandDowns.='<option value="0">--Select--</option>';
                if(!empty($brand)){
                         $brandDowns.='<option>Select</option>';
                        foreach($brand as $p){
                            $brandDowns.='<option value="'.$p->brandid.'">'.ucfirst($p->brandtitle).'</option>';
                        }
                    }
                else{
                    $brandDowns.='<option>No Data Found</option>';
                }
                
               
        
        $dropDowns = '';
        foreach($dropDown as $key=>$dd){
           
            $dropDowns.='<div class="form-group row"> <label class="col-lg-2 col-form-label">'.ucfirst($dd->title).'</label> <div class="col-lg-3">';
            $property = Property::where('attribute_id',$dd->ids)->where('status',1)->get();
            $dropDowns.='<select class="form-control kt-select2" name="'.$dd->slug.'">';
            foreach($property as $p){
                $dropDowns.='<option value="'.$p->title.'">'.ucfirst($p->title).'</option>';
            }
            $dropDowns.='</select> </div> 
                    </div>';
            
        }

        $buttons = '';
        foreach($button as $key=>$b){
            $buttons.='<h6 for="my-text-field" class="font-18 color-70 m-t-10">'.ucfirst($b->title).'<span class="colorRed">*</span></h6>';
            $property = Property::where('attribute_id',$b->ids)->where('status',1)->get();
            foreach($property as $key=>$p){
                if($key==0){
                    
                    $buttons.='<label class="container-radio">'.$p->title.'
                      <input type="radio" id="'.$b->slug.'" name="'.$b->slug.'" value="'.$p->title.'" checked="checked">
                      <span class="checkmark"></span>
                    </label>';    
                }
                else{
                    $buttons.='<label class="container-radio">'.$p->title.'
                      <input type="radio" id="'.$b->slug.'" name="'.$b->slug.'" value="'.$p->title.'" checked="checked">
                      <span class="checkmark"></span>
                    </label>';
                }
                
            }
        }


        $inputbox = '';

        foreach($inputBox as $key=>$b){
             $inputbox.='<div class="form-group row"> ';
             $inputbox.='<label class="col-lg-2 col-form-label"> '.$b->title.'</label>  <div class="col-lg-3">';
             $inputbox.='<input class="form-control" type="text" id="'.$b->slug.'" name="'.$b->slug.'" value="" >';
             $inputbox.='</div></div>';
        }
        
         return [
            'brandDowns'=>$brandDowns,
            'dropDowns' => $dropDowns,
            'buttons' => $buttons,
            'inputbox'=>$inputbox,
        ];
        
   }
   


public function store(Request $request){
    
    //  echo "<pre>";
     
    //  echo count($request->imgGalleryImage);
    //  print_r($request->imgGalleryImage);
    //  echo "</pre>";
    //  die;
    //   dd($request->all());
    
    
     $allRequests = $request->all();
        //Appending all request element in $request Array
        $requests = [];
        //Count that will break index
        $count = 0;
        //Session Array for Attributes
        $_SESSION['attributes'] = [];
        //Getting Attributes form Database against category_id & sub_category_id
        // $brand = Adbrand::join('brands', 'brands.id', 'ad_brands.brands_id')
        //     ->where('ad_brands.sub_category_id',$request->sub_category)
        //     ->get(['ad_brands.*','brands.id as brandid','brands.title as brandtitle']);
        
        $dropDown = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
                                ->where('attributes.category_id',$request->category)
                                ->where('attributes.sub_category_id', $request->sub_category)
                                ->where('all_attributes.attribute_type_id', 1)->where('all_attributes.status', 1)
                                ->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        
     
      
        $dropDown1 = DB::table('assign_attributes_to_sub_brands as brand')
                        ->join('all_attributes', 'all_attributes.id', 'brand.attribute_id')
                        ->where('brand.brand_id', $request->sell_brands)
                        ->where('all_attributes.attribute_type_id', 1)
                        ->where('all_attributes.status', 1)
                        ->get(['brand.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);

  
        $dropDown2 = DB::table('assign_attributes_to_brands as sub_brands')
                        ->join('all_attributes', 'all_attributes.id', 'sub_brands.attribute_id')
                        ->where('sub_brands.sub_brand_id', $request->sub_brand)
                        ->where('all_attributes.attribute_type_id', 1)
                        ->where('all_attributes.status', 1)
                        ->get(['sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        
       
        $button = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
                            ->where('attributes.category_id', $request->category)
                            ->where('attributes.sub_category_id', $request->sub_category)
                            ->where('all_attributes.attribute_type_id', 2)
                            ->where('all_attributes.status', 1)
                            ->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
       
        
        
        $button1 =  DB::table('assign_attributes_to_sub_brands as brand')
                        ->join('all_attributes', 'all_attributes.id', 'brand.attribute_id')
                        ->where('brand.brand_id', $request->sell_brands)
                        ->where('all_attributes.attribute_type_id', 2)
                        ->where('all_attributes.status', 1)
                        ->get(['brand.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);


 
                        
                        

        $button2 =  DB::table('assign_attributes_to_brands as sub_brands')
                        ->join('all_attributes', 'all_attributes.id', 'sub_brands.attribute_id')
                        ->where('sub_brands.sub_brand_id', $request->sub_brand)
                        ->where('all_attributes.attribute_type_id', 2)
                        ->where('all_attributes.status', 1)
                        ->get(['sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        
        
        $inputBox = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
                                ->where('attributes.category_id', $request->category)
                                ->where('attributes.sub_category_id', $request->sub_category)
                                ->where('all_attributes.attribute_type_id', 3)
                                ->where('all_attributes.status', 1)
                                ->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.text_box_type', 'all_attributes.id as ids']);
        
       
        
        $inputBox1 = DB::table('assign_attributes_to_sub_brands as brand')
                        ->join('all_attributes', 'all_attributes.id', 'brand.attribute_id')
                        ->where('brand.brand_id', $request->sell_brands)
                        ->where('all_attributes.attribute_type_id', 3)
                        ->where('all_attributes.status', 1)
                        ->get(['brand.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);

   $inputBox2 =  DB::table('assign_attributes_to_brands as sub_brands')
                        ->join('all_attributes', 'all_attributes.id', 'sub_brands.attribute_id')
                        ->where('sub_brands.sub_brand_id', $request->sub_brand)
                        ->where('all_attributes.attribute_type_id', 3)
                        ->where('all_attributes.status', 1)
                        ->get(['sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);

       

        
        $removeObjectofdropDown = [];
        $removeObjectofdropDown1 = [];
        $removeObjectofdropDown2 = [];
        $removeObjectofButton = [];
        $removeObjectofButton1 = [];
        $removeObjectofButton2 = [];
        $removeObjectofinputBox = [];
        $removeObjectofinputBox1 = [];
        $removeObjectofinputBox2 = [];
        foreach ($dropDown as $key => $dd) {
            $removeObjectofdropDown[$key] = $dd;
        }
        foreach ($dropDown1 as $key => $dd1) {
            $removeObjectofdropDown1[$key] = $dd1;
        }
        if(!empty($request->sub_brand)){
            foreach ($dropDown2 as $key => $dd2) {
                $removeObjectofdropDown2[$key] = $dd2;
            }
        }
        
        foreach ($button as $key => $b) {
            $removeObjectofButton[$key] = $b;
        }
        foreach ($button1 as $key => $b1) {
            $removeObjectofButton1[$key] = $b1;
        }
        if(!empty($request->sub_brand)){
            foreach ($button2 as $key => $b2) {
                $removeObjectofButton2[$key] = $b2;
            }
        }
        
        foreach ($inputBox as $key => $i) {
            $removeObjectofinputBox[$key] = $i;
        }
        foreach ($inputBox1 as $key => $i2) {
            $removeObjectofinputBox1[$key] = $i2;
        }
        if(!empty($request->sub_brand)){
            foreach ($inputBox2 as $key => $i3) {
                $removeObjectofinputBox2[$key] = $i3;
            }
        }
        


      
        // $removeObjectofdropDown = []; $removeObjectofdropDown1 = [];
        // $removeObjectofButton = []; $removeObjectofButton1 = [];
        // $removeObjectofinputBox = []; $removeObjectofinputBox1 = [];
        $mergeArray = array_merge($removeObjectofdropDown, $removeObjectofdropDown1, $removeObjectofdropDown2, $removeObjectofButton, $removeObjectofButton1, $removeObjectofButton2, $removeObjectofinputBox, $removeObjectofinputBox1, $removeObjectofinputBox2);
      
      
    //   dd($request->all());
      
       
        unset($allRequests['_token']);
        unset($allRequests['category']);
        unset($allRequests['sub_category']);
        unset($allRequests['sell_brands']);
        unset($allRequests['sub_brand']);
        unset($allRequests['user']);




//  dd($allRequests);

        foreach ($allRequests as $key => $ar) {
            if ($count == count($mergeArray)) {
                break;
            } else {
                if($key != 'sub_brand'){
                         $requests[$key] = $ar;
                         $count++;     
                }
            }
        }






        //Seperating keys from $request array
        $key = array_keys($requests);
        //Seperating values from $request array
        $value = array_values($requests);
        // //Appending key & values in attributes session array
        // foreach($mergeArray as $index=>$ma){
        //     $_SESSION['attributes'][$index] = [$key[$index]=>$value[$index]];
        // }
        
       
        
        Session::put('attributesKey', $key);
        Session::put('attributesValue', $value);
        
        
        
        // $delete = AdAttribute::where('ad_id',$id)->delete();
        
        
           
    
        
        
        // $getdata = AdAttribute::where('ad_id',$id)->get();
        
        
        if ($request->sell_location == 'make') {
            $store = new Map();
            $store->user_id = $request->user;
            $store->country = $request->country;
            $store->state = $request->state;
            $store->city = $request->city;
            $store->lati = $request->lati;
            $store->lon = $request->long;
            $store->address = $request->address;
            $store->save();
            $validateMap = Location::where('country', $request->country)->where('state', $request->state)->where('city', $request->city)->first();
            if (empty($validateMap)) {
                $location = new Location();
                $location->country = $request->country;
                $location->state = $request->state;
                $location->city = $request->city;
                $location->save();
            }
            $mapid = $store->id;
        } else {
            $mapid = $request->sell_location;
        }
        
        
        
        
        
      
        
        
        if ($request->dis_percentage > 0) {
            $is_offer = 1;
        } else {
            $is_offer = 0;
        }
        
        $webSetting = WebSetting::where('id', 1)->firstOrFail();
        
        if($webSetting->is_ad_auto_approve == 1){
            $is_approve = 1;
        }else{
            $is_approve = 0;
        }
        
        $store = new SellNow();
        
        // $update = SellNow::where('id', $id)->first();
         $store->user_id = $request->user;
         $store->post_id = $randomNumber = rand(0000000000, 1000000000);
        $store->category_id = $request->category;
        $store->sub_category_id = $request->sub_category;
        $store->brand_id = $request->sell_brands;
        $store->sub_brand_id = $request->sub_brand;
        $store->ad_type = 'Normal';
        $store->ad_title = $request->title;
        $store->is_call_price = $request->is_call;
        $store->price = $request->price;
        $store->dis_price = $request->dis_price;
        $store->dis_percentage = $request->dis_percentage;
        $store->offer_start_date = $request->start_offer;
        $store->offer_end_date = $request->end_offer;
        $store->short_description = $request->short_description;
        $store->long_description = $request->long_description;
        $store->map_id = $mapid;
        // $store->is_auction = $auctionvalue;
        $store->is_auction = 0;
        
        // $update->is_featured = $request->is_featured;
        // $update->is_latest = $request->is_latest;
        $store->is_offer = $is_offer;
        // $update->offer_start_date = $request->start_offer;
        // $update->offer_end_date = $request->end_offer;
        // $update->short_description = $request->short_description;
        // $update->long_description = $request->long_description;
        $store->country_id = $request->country;
        $store->state_id = $request->state;
        $store->city_id = $request->city;
        $store->is_number = $request->is_number == null ? 0 : $request->is_number;
        
        $store->is_approve = $is_approve;
        
        $store->status_id = 1;
        $store->country_ip = $request->countryIp;
        $store->latitude = $request->lati;
        $store->longitude = $request->long;
        
         $store->seller_name = $request->name;
        $store->seller_number = $request->number;
        
        
        if ($request->imgProfileImage) {
            $image_name = $request->imgProfileImage;
        }
       
        $store->main_image = $image_name;
        
        
        
        if ($request->imgProfileImage1) {
            $icon_image_name = $request->imgProfileImage1;
        }
       
        $store->hover_image = $icon_image_name;
        $store->save();
        
       
        
        $sellid = $store->id;
        
        foreach (Session::get('attributesKey') as $index => $kv) {
           
                    $storeAttributes = new AdAttribute();
                    $storeAttributes->ad_id = $sellid;
                    $storeAttributes->attribute_key = Session::get('attributesKey') [$index];
                    $storeAttributes->attribute_value = Session::get('attributesValue') [$index];
                    $storeAttributes->save();
              
        }
        
        
          if ($request->auction == 1 || $request->auction == 2) {
            // $updates = Sellnowauction::where('sell_now_id', $id)->first();
            $store = new Sellnowauction();
           
            $store->auction = $request->auction;
            $store->start_date_auction = $request->start_date_auction;
            $store->end_date_auction = $request->end_date_auction;
            $store->start_time_auction = $request->start_time_auction;
            $store->end_time_auction = $request->end_time_auction;
            $store->live_bid_time = $request->live_bid_time;
            $store->start_amount_biding = $request->start_amount_biding;
            $store->save();
            $store = 1;
        } else {
            $auctionvalue = 0;
        }
        
        
    if($request->imgGalleryImage[0] != null){
        // $delete = Sellnowgallery::where('ads_id',$id)->delete();
         for ($i = 0;$i < count($request->imgGalleryImage);$i++) {
            if ($request->imgGalleryImage[$i] != null) {
                $store = new Sellnowgallery();
                $store->ads_id = $sellid;
                $store->gallery_image = $request->imgGalleryImage[$i];
                $store->save();
            }
        }
    }
    
    
       return redirect()->back()->with('success', 'Ads Sell Added');
    
    
    
}



   public function storesss(Request $request){
    
     
     

        
        $brand = Adbrand::join('brands', 'brands.id', 'ad_brands.brands_id')
            ->where('ad_brands.sub_category_id',$request->sub_category)
            ->get(['ad_brands.*','brands.id as brandid','brands.title as brandtitle']);
            
            
        $dropDown = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->category)
          ->where('attributes.sub_category_id',$request->sub_category)
          ->where('all_attributes.attribute_type_id', 1)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
          
          $button = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->category)
          ->where('attributes.sub_category_id',$request->sub_category)
          ->where('all_attributes.attribute_type_id', 2)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
          $inputBox = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->category)
          ->where('attributes.sub_category_id',$request->sub_category)
          ->where('all_attributes.attribute_type_id', 3)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
          
       

        //Removing Objects
        $removeDropDownObject = [];
        $removeButtonObject = [];
        $removeInputObject = [];
        $removebrandObject = [];

        //Removing Object of DropDown
        foreach($dropDown as $key=>$dd){
            $removeDropDownObject[$key] = $dd;
        }
        
         foreach($brand as $key=>$dd){
            $removebrandObject[$key] = $dd;
        }

        //Removing Object of Butons
        foreach($button as $key=>$b){
            $removeButtonObject[$key] = $b;    
        }
        
         //Removing Object of input
        foreach($inputBox as $key=>$I){
            $removeInputObject[$key] = $I;    
        }

        //Merging Both array into one to get count
        $mergeArray = array_merge($removeDropDownObject,$removeButtonObject,$removeInputObject,$removebrandObject);
        
        
        

            if($request->sell_location == 'make'){
               
                 $store = new Map();
                 $store->user_id = $request->user;
                 $store->country =$request->country;
                 $store->state = $request->state;
                 $store->city = $request->city;
                 $store->lati = $request->lati;
                 $store->lon = $request->long; 
                 $store->address = $request->address; 
                 $store->save();
                
                
                $mapid = $store->id;
                
            }
            else{
                $mapid = $request->sell_location;
            }
            
            
            if($request->ad_type == 'auction'){
                $is_auction = 1;
            }
            else{
                $is_auction = 0;
            }
            
            if(!empty($request->dis_percentage)){
                $is_offer = 1;
            }
            else{
                $is_offer = 0;
            }
            
            
             $offer_end_date = date("Y-m-d");
             
             
             
        $store = new SellNow();
        $store->post_id = $randomNumber = rand(0000000000, 1000000000);
        $store->user_id = $request->user;
        $store->category_id = $request->category;
        $store->sub_category_id = $request->sub_category;
        $store->brand_id = $request->brand;
        $store->ad_type = $request->ad_type;
        $store->ad_title = $request->title;
        $store->price = $request->price;
        $store->dis_price = $request->dis_price;
        $store->dis_percentage = $request->dis_percentage;
        $store->is_featured = 0;
        $store->is_latest = 0;
        $store->is_auction = $is_auction;
        $store->is_offer = $is_offer;
        $store->map_id = $mapid;
        $store->offer_start_date = $offer_end_date;
        $store->offer_end_date = date("Y-m-d", strtotime("$offer_end_date +30 days"));
        $store->short_description = $request->short_description;
        $store->long_description = $request->long_description;
        
          
        $image_name = '';
        
        if($request->has('mainImage'))
        {
            $image = $request->file('mainImage');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('asset/images/sell-now/'), $image_name);
            
        }
        
         $store->main_image = $image_name;
         
        $hover_name = '';
        
        if($request->has('hoverImage'))
        {
            $image = $request->file('hoverImage');
            $hover_name = time().$image->getClientOriginalName();
            $image->move(public_path('asset/images/sell-now/'), $hover_name);
            
        }
        
        $store->hover_image = $hover_name;

       
        $store->seller_name = $request->name;
        $store->seller_number = $request->number;
        $store->is_number = $request->is_number;
        $store->expiry_date = date('Y-m-d', strtotime('+1 months'));
        $store->status_id = 1;
        $store->save();
        
        $sellNowid = $store->id;
        $postid = $store->post_id;
        
        
        
        
         foreach($mergeArray as $key=>$ar){
            $a = $ar->slug;
            if($request->$a){
                $storeAttributes = new AdAttribute();
                $storeAttributes->ad_id = $sellNowid;
                 $storeAttributes->attribute_key = $ar->slug;
                 $storeAttributes->attribute_value = $request->$a;
                $storeAttributes->save();
            }
        }
        
        
         
       
    
for($i= 0;$i<count($request->galleryImage);$i++){
    
    
                $store = new Sellnowgallery();
                $store->ads_id = $sellNowid;
                $image_gallery = '';
    
        if ($request->file('galleryImage')[$i]) {
            
             $image = $request->file('galleryImage')[$i];
             $image_gallery = time().$image->getClientOriginalName();
             $image->move(public_path('asset/images/sell-now/gallery/'), $image_gallery);
            
        }
         $store->gallery_image = $image_gallery;
        
         $store->save();
            
}
        
        if($request->ad_type == 'auction'){
              
            $store = new Sellnowauction();
            $store->sell_now_id = $sellNowid;
            $store->auction = $request->auction;
            $store->start_date_auction = $request->start_date_auction;
            $store->end_date_auction = $request->end_date_auction;
            $store->start_time_auction = $request->start_time_auction;
            $store->end_time_auction = $request->end_time_auction;
            $store->live_bid_time = $request->live_bid_time;
            $store->start_amount_biding = $request->start_amount_biding;
            $store->save();
            
            
        }
                
            
    //  dd($request->all());
     
     
     
    return redirect()->back()->with('success', 'Ads Sell Added');
    
    
    
     
   }
    
    
     public function change_multi_status(Request $request){
      
        $status = $request->listingStatus;
        for($i=0;$i<count($request->selectedArr);$i++){
             $update = SellNow::where('id',$request->selectedArr[$i])->first();
             $update->is_approve = $status;
             $update->save();
        }
         return 1;
     }
    
    
    public function ads_change_status(Request $request){
        
        $id = $request->id;
        $approve = $request->val;
        $edit = SellNow::where('id', $id)->first();
        $edit->is_approve = $approve;
        $edit->save();
        
          if($approve == 1){
              
              
            $userdetail = User::where('id',$edit->user_id)->first();
            $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
            $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 

          if($useremailsetting->new_ad_posted == 1 ){
                $data = [
                    'user_name' => $userdetail->name,
                    'email' => $userdetail->email,
                    'ad_id' => $edit->post_id,
                    'ad_title' =>$edit->ad_title,
                ];
                
                Mail::send('emails.admin.ad-approval', $data, function($message) use ($data) {
                    $message->subject('Ad Approved on simsar.com');
                    $message->to($data['email'], $data['user_name']);
                });
               
            
          }
          
             $content = "<a href='https://simsar.com/testsimsar/product-detail/".$id."'> \" ". $edit->ad_title . "</a> \" Approved Successfully";
             $notify = new  \App\Http\Controllers\HomeController();
             $notify->sendNotification($content, $edit->user_id);
             
             
          }
          
          if($approve == 2){
            
                $userdetail = User::where('id',$edit->user_id)->first();
                $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
                $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
                // dd($request->all());
          if($useremailsetting->new_ad_posted == 1 ){
                $data = [
                    'user_name' => $userdetail->name,
                    'email' => $userdetail->email,
                    'ad_id' => $edit->post_id,
                    'ad_title' =>$edit->ad_title,
                ];
                
                Mail::send('emails.admin.ad-deactivated', $data, function($message) use ($data) {
                    $message->subject('Ad Rejected on simsar.com');
                    $message->to($data['email'], $data['user_name']);
                });
               
          }
           
            
        
           $content = "<a href='https://simsar.com/testsimsar/product-detail/".$id."'> \" ". $edit->ad_title . "</a> \" Your Ad is Rejected";
             $notify = new  \App\Http\Controllers\HomeController();
             $notify->sendNotification($content, $edit->user_id);
           
  
       
      
           
            
            

        if($usersmssetting->new_ad_posted == 1){
            if($userdetail->phone){
                    $to = $userdetail->phone;
                    $msg = 'HI, your Ad approval';
                    $goto = new  \App\Http\Controllers\HomeController();
                    $goto->sendSMS($to, $msg);
                
            }
        }
              
               
      }
        return 1;
    
    
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function view_ads_data(Request $request){
      $id = $request->id;
      $edit = SellNow::where('id', $id)->first();
      return json_encode($edit);
    }
    
    
    

 


    public function edit(Request $request, $post_id){
        
        
           $data['menu'] = 'listingmenu';
           $data['submenu'] = '';
           $data['submenulevel1'] = '';
           $data['submenusub'] = '';
           
    
        $data['category'] = Category::where('status', 1)->get();
        // $data['subCategories'] = SubCategory::where('status', 1)->get();
        $data['sellNow'] = SellNow::where('post_id', $post_id)->first();
        
         $data['subCategories'] = SubCategory::where('category_id', $data['sellNow']->category_id)->where('status', 1)->get();
        
        $data['sellnowgallery'] = Sellnowgallery::where('ads_id', $data['sellNow']->id)->get();
        $data['adAttribute'] = AdAttribute::where('ad_id', $data['sellNow']->id)->get(['attribute_key', 'attribute_value', 'ad_id']);
       
    //   dd($data['adAttribute']);
       
        $data['dropDown'] = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')->where('attributes.category_id', $data['sellNow']->category_id)->where('attributes.sub_category_id', $data['sellNow']->sub_category_id)->where('all_attributes.attribute_type_id', 1)->where('all_attributes.status', 1)->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        $data['button'] = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')->where('attributes.category_id', $data['sellNow']->category_id)->where('attributes.sub_category_id', $data['sellNow']->sub_category_id)->where('all_attributes.attribute_type_id', 2)->where('all_attributes.status', 1)->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        $data['inputBox'] = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')->where('attributes.category_id', $data['sellNow']->category_id)->where('attributes.sub_category_id', $data['sellNow']->sub_category_id)->where('all_attributes.attribute_type_id', 3)->where('all_attributes.status', 1)->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        $data['countries'] = GeoCountry::all();
        
        $data['maplist'] = Map::where('user_id',  $data['sellNow']->user_id)->get();
        
        $data['brand'] = Adbrand::join('brands', 'brands.id', 'ad_brands.brands_id')
                ->where('ad_brands.sub_category_id', $data['sellNow']->sub_category_id)
                ->get(['ad_brands.*', 'brands.id as brandid', 'brands.title as brandtitle']);
        $data['branddropDown'] = AssignAttributeToBrand::join('all_attributes', 'all_attributes.id', 'assign_attributes_to_sub_brands.attribute_id')->where('assign_attributes_to_sub_brands.brand_id', $data['sellNow']->brand_id)->where('all_attributes.attribute_type_id', 1)->where('all_attributes.status', 1)->get(['assign_attributes_to_sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        $data['brandbutton'] = AssignAttributeToBrand::join('all_attributes', 'all_attributes.id', 'assign_attributes_to_sub_brands.attribute_id')->where('assign_attributes_to_sub_brands.brand_id', $data['sellNow']->brand_id)->where('all_attributes.attribute_type_id', 2)->where('all_attributes.status', 1)->get(['assign_attributes_to_sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        $data['brandinputBox'] = AssignAttributeToBrand::join('all_attributes', 'all_attributes.id', 'assign_attributes_to_sub_brands.attribute_id')->where('assign_attributes_to_sub_brands.brand_id', $data['sellNow']->brand_id)->where('all_attributes.attribute_type_id', 3)->where('all_attributes.status', 1)->get(['assign_attributes_to_sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug','all_attributes.text_box_type','all_attributes.id as ids']);
        $data['subBrand'] = SubBrand::where('brand_id', $data['sellNow']->brand_id)->where('status', 1)->get();
        $data['subBranddropDown'] = AssignAttributeToSubBrand::join('all_attributes', 'all_attributes.id', 'assign_attributes_to_brands.attribute_id')->where('assign_attributes_to_brands.brand_id', $data['sellNow']->brand_id)->where('assign_attributes_to_brands.sub_brand_id', $data['sellNow']->sub_brand_id)->where('all_attributes.attribute_type_id', 1)->where('all_attributes.status', 1)->get(['assign_attributes_to_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        $data['subBrandbutton'] = AssignAttributeToSubBrand::join('all_attributes', 'all_attributes.id', 'assign_attributes_to_brands.attribute_id')->where('assign_attributes_to_brands.brand_id', $data['sellNow']->brand_id)->where('assign_attributes_to_brands.sub_brand_id', $data['sellNow']->sub_brand_id)->where('all_attributes.attribute_type_id', 2)->where('all_attributes.status', 1)->get(['assign_attributes_to_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.text_box_type', 'all_attributes.id as ids']);
        $data['subBrandinputBox'] = AssignAttributeToSubBrand::join('all_attributes', 'all_attributes.id', 'assign_attributes_to_brands.attribute_id')->where('assign_attributes_to_brands.brand_id', $data['sellNow']->brand_id)->where('assign_attributes_to_brands.sub_brand_id', $data['sellNow']->sub_brand_id)->where('all_attributes.attribute_type_id', 3)->where('all_attributes.status', 1)->get(['assign_attributes_to_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
      
        $data['states'] = State::all();
        
       
        
        if($data['sellNow']->country_ip == 1){
             $data['getstates'] = State::where('name',$data['sellNow']->state_id)->first();
            
            $data['cities'] = City::where('state_id',$data['getstates']->id)->get();
        
        }
       
        
        
        $sellnowauction = Sellnowauction::where('sell_now_id', $data['sellNow']->id)->first();
        // dd($data);
        
        return view('admin.sell.edit',$data);
    }



    public function updatesss(Request $request, $id){

     

        $requests = [];
        //Count that will break index
        $count = 0;
        
        
        $dropDown = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->category)
          ->where('attributes.sub_category_id',$request->sub_category)
          ->where('all_attributes.attribute_type_id', 1)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
          
          $button = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->category)
          ->where('attributes.sub_category_id',$request->sub_category)
          ->where('all_attributes.attribute_type_id', 2)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
          $inputBox = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
          ->where('attributes.category_id',$request->category)
          ->where('attributes.sub_category_id',$request->sub_category)
          ->where('all_attributes.attribute_type_id', 3)
          ->where('all_attributes.status',1)
          ->get(['attributes.*','all_attributes.title','all_attributes.description','all_attributes.slug','all_attributes.id as ids']);
          
          
          
          
        $removeDropDownObject = [];
        $removeButtonObject = [];
        $removeInputObject = [];

        //Removing Object of DropDown
        foreach($dropDown as $key=>$dd){
            $removeDropDownObject[$key] = $dd;
        }
        

        //Removing Object of Butons
        foreach($button as $key=>$b){
            $removeButtonObject[$key] = $b;    
        }
        
         //Removing Object of input
        foreach($inputBox as $key=>$I){
            $removeInputObject[$key] = $I;    
        }

        //Merging Both array into one to get count
        $mergeArray = array_merge($removeDropDownObject,$removeButtonObject,$removeInputObject);
        
      
        

        foreach($mergeArray as $key=>$ar){
            
            $a = $ar->slug;

            $updatess = AdAttribute::where('attribute_key', $a)->where('ad_id',$id)->first();
            $updatess->attribute_value = $request->$a;
            $updatess->save();
            // echo $a ."<br />"; 
            
        }
        
       
        $sellnowgallery = Sellnowgallery::where('ads_id',$id)->get();
        
          foreach($sellnowgallery as $key=>$s){
                $ID = $s->id;
                $sellupdate = Sellnowgallery::where('id',$ID)->first();
                $image_name = '';
                if($request->has('galleryImage'.$ID))
                {
                    @unlink(public_path('asset/images/sell-now/gallery/'.$sellupdate->gallery_image));
                    $image = $request->file('galleryImage'.$ID);
                    $image_name = time().$image->getClientOriginalName();
                    $image->move(public_path('asset/images/sell-now/gallery/'), $image_name);
                }
                else
                {
                    $image_name = $sellupdate->gallery_image; 
                }
                 $sellupdate->gallery_image = $image_name;
                 $sellupdate->save();
          }
          
        
        if($request->sell_location == 'make'){
               
                 $store = new Map();
                 $store->user_id = $request->user_id;
                 $store->country =$request->country;
                 $store->state = $request->state;
                 $store->city = $request->city;
                 $store->lati = $request->lati;
                 $store->lon = $request->long; 
                 $store->address = $request->address; 
                 $store->save();
                
                
                $mapid = $store->id;
                
            }
            else{
                
                $mapid = $request->sell_location;
            }
            
            
        if($request->auction == 1 || $request->auction == 2){
            
            
            $updates = Sellnowauction::where('sell_now_id',$id)->first();
             
            // $store = new Sellnowauction();
            
            // $store->sell_now_id = $sellNowid;
            $updates->auction = $request->auction;
            $updates->start_date_auction = $request->start_date_auction;
            $updates->end_date_auction = $request->end_date_auction;
            $updates->start_time_auction = $request->start_time_auction;
            $updates->end_time_auction = $request->end_time_auction;
            $updates->live_bid_time = $request->live_bid_time;
            $updates->start_amount_biding = $request->start_amount_biding;
            $updates->save();
            
            $auctionvalue = 1;
            
        }
        else{
            
            $auctionvalue = 0;
        }
        
        
        if($request->dis_percentage){
            
            $is_offer = 1;
        }
        else{
            $is_offer = 0;
        }
              
            
        
        $update = SellNow::where('id',$id)->first();
        $update->ad_title = $request->title;
        $update->price = $request->price;
        $update->dis_price = $request->dis_price;
        $update->dis_percentage = $request->dis_percentage;
        $update->map_id = $mapid;
        $update->is_auction = $auctionvalue;
        $update->expiry_date = $request->expiry_date;
        
        // $update->is_latest = $request->is_latest;
        $update->is_offer = $is_offer;
        // $update->offer_start_date = $request->start_offer;
        // $update->offer_end_date = $request->end_offer;
        
        $update->short_description = $request->short_description;
        $update->long_description = $request->long_description;
        // $update->country_id = $request->country;
        // $update->state_id = $request->state;
        // $update->city_id = $request->city;
        
        
        
        $image_name = '';
        
        if($request->has('mainImage'))
        {
            @unlink(public_path('asset/images/sell-now/'.$update->main_image));
            $image = $request->file('mainImage');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('asset/images/sell-now/'), $image_name);
            
        }
        else
        {
            $image_name = $update->main_image; 
        }
        
        $update->main_image = $image_name;
        
         $icon_image_name = '';
        if($request->has('hoverImage'))
        {
            @unlink(public_path('asset/images/sell-now/'.$update->hover_image));
            $image = $request->file('hoverImage');
            $icon_image_name = time().$image->getClientOriginalName();
            $image->move(public_path('asset/images/sell-now/'), $icon_image_name);
            
        }
        else
        {
            $icon_image_name =$update->hover_image; 
        }
        
        $update->hover_image = $icon_image_name;
        $update->save();
        return redirect()->back()->with('success', 'Ads Sell Updated');

    }



 public function update(Request $request, $id) {
        
         $allRequests = $request->all();
        //Appending all request element in $request Array
        $requests = [];
        //Count that will break index
        $count = 0;
        //Session Array for Attributes
        $_SESSION['attributes'] = [];
        //Getting Attributes form Database against category_id & sub_category_id
        // $brand = Adbrand::join('brands', 'brands.id', 'ad_brands.brands_id')
        //     ->where('ad_brands.sub_category_id',$request->sub_category)
        //     ->get(['ad_brands.*','brands.id as brandid','brands.title as brandtitle']);
        
        $dropDown = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
                                ->where('attributes.category_id',$request->category)
                                ->where('attributes.sub_category_id', $request->subCategory)
                                ->where('all_attributes.attribute_type_id', 1)->where('all_attributes.status', 1)
                                ->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        
     
      
        $dropDown1 = DB::table('assign_attributes_to_sub_brands as brand')
                        ->join('all_attributes', 'all_attributes.id', 'brand.attribute_id')
                        ->where('brand.brand_id', $request->sell_brands)
                        ->where('all_attributes.attribute_type_id', 1)
                        ->where('all_attributes.status', 1)
                        ->get(['brand.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);

  
        $dropDown2 = DB::table('assign_attributes_to_brands as sub_brands')
                        ->join('all_attributes', 'all_attributes.id', 'sub_brands.attribute_id')
                        ->where('sub_brands.sub_brand_id', $request->sub_brand)
                        ->where('all_attributes.attribute_type_id', 1)
                        ->where('all_attributes.status', 1)
                        ->get(['sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        
       
        $button = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
                            ->where('attributes.category_id', $request->category)
                            ->where('attributes.sub_category_id', $request->subCategory)
                            ->where('all_attributes.attribute_type_id', 2)
                            ->where('all_attributes.status', 1)
                            ->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
       
        
        
        $button1 =  DB::table('assign_attributes_to_sub_brands as brand')
                        ->join('all_attributes', 'all_attributes.id', 'brand.attribute_id')
                        ->where('brand.brand_id', $request->sell_brands)
                        ->where('all_attributes.attribute_type_id', 2)
                        ->where('all_attributes.status', 1)
                        ->get(['brand.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);


 
                        
                        

        $button2 =  DB::table('assign_attributes_to_brands as sub_brands')
                        ->join('all_attributes', 'all_attributes.id', 'sub_brands.attribute_id')
                        ->where('sub_brands.sub_brand_id', $request->sub_brand)
                        ->where('all_attributes.attribute_type_id', 2)
                        ->where('all_attributes.status', 1)
                        ->get(['sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);
        
        
        $inputBox = Attributes::join('all_attributes', 'all_attributes.id', 'attributes.attributes_id')
                                ->where('attributes.category_id', $request->category)
                                ->where('attributes.sub_category_id', $request->subCategory)
                                ->where('all_attributes.attribute_type_id', 3)
                                ->where('all_attributes.status', 1)
                                ->get(['attributes.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.text_box_type', 'all_attributes.id as ids']);
        
       
        
        $inputBox1 = DB::table('assign_attributes_to_sub_brands as brand')
                        ->join('all_attributes', 'all_attributes.id', 'brand.attribute_id')
                        ->where('brand.brand_id', $request->sell_brands)
                        ->where('all_attributes.attribute_type_id', 3)
                        ->where('all_attributes.status', 1)
                        ->get(['brand.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);

   $inputBox2 =  DB::table('assign_attributes_to_brands as sub_brands')
                        ->join('all_attributes', 'all_attributes.id', 'sub_brands.attribute_id')
                        ->where('sub_brands.sub_brand_id', $request->sub_brand)
                        ->where('all_attributes.attribute_type_id', 3)
                        ->where('all_attributes.status', 1)
                        ->get(['sub_brands.*', 'all_attributes.title', 'all_attributes.description', 'all_attributes.slug', 'all_attributes.id as ids']);

       

        
        $removeObjectofdropDown = [];
        $removeObjectofdropDown1 = [];
        $removeObjectofdropDown2 = [];
        $removeObjectofButton = [];
        $removeObjectofButton1 = [];
        $removeObjectofButton2 = [];
        $removeObjectofinputBox = [];
        $removeObjectofinputBox1 = [];
        $removeObjectofinputBox2 = [];
        foreach ($dropDown as $key => $dd) {
            $removeObjectofdropDown[$key] = $dd;
        }
        foreach ($dropDown1 as $key => $dd1) {
            $removeObjectofdropDown1[$key] = $dd1;
        }
        if(!empty($request->sub_brand)){
            foreach ($dropDown2 as $key => $dd2) {
                $removeObjectofdropDown2[$key] = $dd2;
            }
        }
        
        foreach ($button as $key => $b) {
            $removeObjectofButton[$key] = $b;
        }
        foreach ($button1 as $key => $b1) {
            $removeObjectofButton1[$key] = $b1;
        }
        if(!empty($request->sub_brand)){
            foreach ($button2 as $key => $b2) {
                $removeObjectofButton2[$key] = $b2;
            }
        }
        
        foreach ($inputBox as $key => $i) {
            $removeObjectofinputBox[$key] = $i;
        }
        foreach ($inputBox1 as $key => $i2) {
            $removeObjectofinputBox1[$key] = $i2;
        }
        if(!empty($request->sub_brand)){
            foreach ($inputBox2 as $key => $i3) {
                $removeObjectofinputBox2[$key] = $i3;
            }
        }
        


      
        // $removeObjectofdropDown = []; $removeObjectofdropDown1 = [];
        // $removeObjectofButton = []; $removeObjectofButton1 = [];
        // $removeObjectofinputBox = []; $removeObjectofinputBox1 = [];
        $mergeArray = array_merge($removeObjectofdropDown, $removeObjectofdropDown1, $removeObjectofdropDown2, $removeObjectofButton, $removeObjectofButton1, $removeObjectofButton2, $removeObjectofinputBox, $removeObjectofinputBox1, $removeObjectofinputBox2);
      
       
       
        unset($allRequests['_token']);
        unset($allRequests['category']);
        unset($allRequests['subCategory']);
        unset($allRequests['sell_brands']);
        unset($allRequests['sub_brand']);
        unset($allRequests['user_id']);
        

        foreach ($allRequests as $key => $ar) {
            if ($count == count($mergeArray)) {
                break;
            } else {
                if($key != 'sub_brand'){
                         $requests[$key] = $ar;
                         $count++;     
                }
            }
        }


        //Seperating keys from $request array
        $key = array_keys($requests);
        //Seperating values from $request array
        $value = array_values($requests);
        // //Appending key & values in attributes session array
        // foreach($mergeArray as $index=>$ma){
        //     $_SESSION['attributes'][$index] = [$key[$index]=>$value[$index]];
        // }
        
        Session::put('attributesKey', $key);
        Session::put('attributesValue', $value);
        
        $delete = AdAttribute::where('ad_id',$id)->delete();
    
        foreach (Session::get('attributesKey') as $index => $kv) {
           
                    $storeAttributes = new AdAttribute();
                    $storeAttributes->ad_id = $id;
                    $storeAttributes->attribute_key = Session::get('attributesKey') [$index];
                    $storeAttributes->attribute_value = Session::get('attributesValue') [$index];
                    $storeAttributes->save();
              
        }
        
        $getdata = AdAttribute::where('ad_id',$id)->get();
        
        
        
        if ($request->sell_location == 'make') {
            $store = new Map();
            $store->user_id = $request->user_id;
            $store->country = $request->country;
            $store->state = $request->state;
            $store->city = $request->city;
            $store->lati = $request->lati;
            $store->lon = $request->long;
            $store->address = $request->address;
            $store->save();
            
            $validateMap = Location::where('country', $request->country)->where('state', $request->state)->where('city', $request->city)->first();
            
            if (empty($validateMap)) {
                $location = new Location();
                $location->country = $request->country;
                $location->state = $request->state;
                $location->city = $request->city;
                $location->save();
            }
            $mapid = $store->id;
        } else {
            $mapid = $request->sell_location;
        }
        if ($request->auction == 1 || $request->auction == 2) {
            $updates = Sellnowauction::where('sell_now_id', $id)->first();
            // $store = new Sellnowauction();
            // $store->sell_now_id = $sellNowid;
            $updates->auction = $request->auction;
            $updates->start_date_auction = $request->start_date_auction;
            $updates->end_date_auction = $request->end_date_auction;
            $updates->start_time_auction = $request->start_time_auction;
            $updates->end_time_auction = $request->end_time_auction;
            $updates->live_bid_time = $request->live_bid_time;
            $updates->start_amount_biding = $request->start_amount_biding;
            $updates->save();
            $auctionvalue = 1;
        } else {
            $auctionvalue = 0;
        }
        if ($request->dis_percentage > 0) {
            $is_offer = 1;
        } else {
            $is_offer = 0;
        }
        
        $update = SellNow::where('id', $id)->first();
        $update->category_id = $request->category;
        $update->sub_category_id = $request->subCategory;
        $update->brand_id = $request->sell_brands;
        $update->sub_brand_id = $request->sub_brand;
        $update->ad_title = $request->title;
        $update->is_call_price = $request->is_call;
        $update->price = $request->price;
        $update->dis_price = $request->dis_price;
        $update->dis_percentage = $request->dis_percentage;
        $update->offer_start_date = $request->start_offer;
        $update->offer_end_date = $request->end_offer;
        $update->short_description = $request->short_description;
        $update->long_description = $request->long_description;
        $update->map_id = $mapid;
        $update->is_auction = $auctionvalue;
        // $update->is_featured = $request->is_featured;
        // $update->is_latest = $request->is_latest;
        $update->is_offer = $is_offer;
        // $update->offer_start_date = $request->start_offer;
        // $update->offer_end_date = $request->end_offer;
        // $update->short_description = $request->short_description;
        // $update->long_description = $request->long_description;
        $update->country_id = $request->country;
        $update->state_id = $request->state;
        $update->city_id = $request->city;
        
        $update->latitude = $request->lati;
        $update->longitude = $request->long;
        
        
        $image_name = '';
        if ($request->has('mainImage')) {
            @unlink(public_path('asset/images/sell-now/' . $update->main_image));
            $image = $request->file('mainImage');
            $image_name = time() . $image->getClientOriginalName();
            $image->move(public_path('asset/images/sell-now/'), $image_name);
        } else {
            $image_name = $update->main_image;
        }
        $update->main_image = $image_name;
        $icon_image_name = '';
        if ($request->has('hoverImage')) {
            @unlink(public_path('asset/images/sell-now/' . $update->hover_image));
            $image = $request->file('hoverImage');
            $icon_image_name = time() . $image->getClientOriginalName();
            $image->move(public_path('asset/images/sell-now/'), $icon_image_name);
        } else {
            $icon_image_name = $update->hover_image;
        }
        $update->hover_image = $icon_image_name;
        $update->save();
        $sellnowgallery = Sellnowgallery::where('ads_id', $id)->get();
        foreach ($sellnowgallery as $key => $s) {
            $ID = $s->id;
            $sellupdate = Sellnowgallery::where('id', $ID)->first();
            $image_name = '';
            if ($request->has('galleryImage' . $ID)) {
                @unlink(public_path('asset/images/sell-now/gallery/' . $sellupdate->gallery_image));
                $image = $request->file('galleryImage' . $ID);
                $image_name = time() . $image->getClientOriginalName();
                $image->move(public_path('asset/images/sell-now/gallery/'), $image_name);
            } else {
                $image_name = $sellupdate->gallery_image;
            }
            $sellupdate->gallery_image = $image_name;
            $sellupdate->save();
        }
        return redirect()->back()->with('success', 'Sell Now Updated');
    }
    


    public function delete(Request $request){
       
    }



    public function check_expire(){
        
          $update = SellNow::where('is_featured',0)
                ->where('is_bumpup_featured',0)
                ->where('is_search_featured',0)
                ->where('is_category_featured',0)
                ->where('is_brand_featured',0)
                ->where('is_shop_featured',0)
                ->where('is_hot_featured',0)
                ->where('expiry_date',date("Y-m-d"))
                ->update(['is_approve'=>3,'status_id'=>0]);
        
        
    }


    



}


















