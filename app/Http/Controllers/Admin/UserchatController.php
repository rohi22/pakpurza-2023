<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail; 
use Session;



// use App\Models\Category;
// use App\Models\SubCategory;
// use App\Models\Brand;
// use App\Models\SellNow;
// use App\Models\Sellnowgallery;
// use App\Models\AdAttribute;
// use App\Models\Attributes;
// use App\Models\Map;
// use App\Models\Sellnowauction;
// use App\Models\User;
// use App\Models\Property;
// use App\Models\Adbrand;
// use App\Models\GeoCountry;
// use App\Models\AssignAttributeToBrand;
// use App\Models\SubBrand;
// use App\Models\AssignAttributeToSubBrand;
// use App\Models\State;
// use App\Models\City;
// use App\Models\Location;
// use App\Models\Usersetting;
// use App\Models\Useremailsetting;
// use App\Models\Usersmssetting;
// use App\Models\Userpushsetting;

use App\Models\Allattributes;
use App\Models\Brand;
use App\Models\Message;
use App\Models\Firstmessages;


class UserchatController extends Controller
{
     
     
     
     
    public function index(){
        $data['menu'] = 'brandmenu';
       $data['submenu'] = 'brandsubmenu';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       $data['message_list'] = Firstmessages::latest()->join('users as fromuser', 'fromuser.id', 'first_messages.from_id')
                                             ->join('users as touser', 'touser.id', 'first_messages.to_id')
                                              ->join('sell_now', 'sell_now.id', 'first_messages.ad_id')
                                               ->paginate(10,['first_messages.*', 'fromuser.unique_id as fromId','fromuser.name as fromName', 
                                                      'touser.unique_id as toId','touser.name as toName','sell_now.ad_title','sell_now.post_id']);
                                                    
       
       
    //  dd($data['message_list']);
       
       
    //   $data['brands'] = Brand::all();
     
       return view('admin.userchat.index',$data);
     
     
     

        //   $data['menu'] = 'listingmenu';
        //   $data['submenu'] = '';
        //   $data['submenulevel1'] = '';
        //   $data['submenusub'] = '';
       
        //  $data['SellNow'] = SellNow::join('categories', 'categories.id', 'sell_now.category_id')
        //                             ->join('sub_categories', 'sub_categories.id', 'sell_now.sub_category_id')
        //                             ->orderBy('sell_now.id','Desc')
        //                             ->get(['sell_now.*','sub_categories.title as sub_category', 'categories.title as category']);
            
        // return view('admin.sell.index',$data);
    }
     public function view($id){
         
         
        $data['menu'] = 'brandmenu';
        $data['submenu'] = 'brandsubmenu';  
        $data['submenulevel1'] = '';
        $data['submenusub'] = ''; 
       
      $data['message_list'] = Firstmessages::join('users as fromuser', 'fromuser.id', 'first_messages.from_id')
                                             ->join('users as touser', 'touser.id', 'first_messages.to_id')
                                            ->join('sell_now', 'sell_now.id', 'first_messages.ad_id')
                                            ->select('first_messages.*', 'fromuser.unique_id as fromId','fromuser.name as fromName', 
                                                      'touser.unique_id as toId','touser.name as toName','sell_now.ad_title','sell_now.post_id')
                                            ->where('first_messages.id',$id)
                                              ->first();
                                           
           $fromId = $data['message_list']->from_id;
           $toId = $data['message_list']->to_id;
   
   
            $data['messages'] = DB::table('messages')
            ->join('users as fromuser', 'fromuser.id', 'messages.from_id')
            ->join('users as touser', 'touser.id', 'messages.to_id')
            ->join('sell_now', 'sell_now.id', 'messages.ad_id') 
            ->select('messages.*', 'fromuser.unique_id as fromId','fromuser.name as fromName', 
              'touser.unique_id as toId','touser.name as toName','sell_now.ad_title','sell_now.post_id')
             ->whereIn('messages.from_id', [$fromId, $toId])
             ->whereIn('messages.to_id', [$fromId, $toId])
            ->where('messages.ad_id',$data['message_list']->ad_id)
            ->orderby('messages.created_at','asc')
            ->get();
        
        
        
       
          return view('admin.userchat.viewchat',$data);
     }
     
     public function deleteselectedchat(Request $request){
         if(count($request->chatid)>0){
             for($i=0;$i<count($request->chatid);$i++){
                 $find=Firstmessages::find($request->chatid[$i]);
                if(!empty($find)){
                       $fromId = $find->from_id;
                    $toId = $find->to_id;
                    $adid=$find->ad_id;
                   $del= DB::table('messages')->whereIn('messages.from_id', [$fromId, $toId])
                     ->whereIn('messages.to_id', [$fromId, $toId])
                    ->where('messages.ad_id',$adid)->delete();
                    if($del){
                        $find->delete();
                    }
                }
             }
             return 1;
         }
     }
    
    
    
    
    
    
    
    
    
    


    



}


















