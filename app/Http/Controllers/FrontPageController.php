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

class FrontPageController extends Controller
{
    
    public function index()
    {
       $slider = Slider::where('status', 1)->get();
        return view('index',compact('slider'));
    }


}
