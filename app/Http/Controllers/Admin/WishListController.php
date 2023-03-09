<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;

use Auth;


class WishListController extends Controller
{
     
   public function index(){

        $data['menu'] = 'wishmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
       
     $data['wishList'] = WishList::latest()->join('sell_now', 'sell_now.id', 'wish_list.ad_id')
                          ->join('users', 'users.id', 'wish_list.user_id')
                          ->where('wish_list.deleted_at',null)
     ->paginate(10,['wish_list.*','sell_now.ad_title','users.name as username']);
     
     
    //  dd($data['wishList']);
     return view('admin.wishlist.index',$data);
   }



     public function delete(Request $request){
     

     $delete = WishList::where('id',$request->id)->first();

     if(!empty($delete)){
            $delete->delete();
            // @unlink(public_path('/assets/media/brand/logo/' . $delete->image_logo));
            // @unlink(public_path('/assets/media/brand/banner/' . $delete->image_banner));
     }
     return 1;

   }
   
   
     public function sub_delete(Request $request){
     

     $delete = WishList::where('id',$request->id)->first();

     if(!empty($delete)){
            $delete->delete();
            // @unlink(public_path('/assets/media/brand/logo/' . $delete->image_logo));
            // @unlink(public_path('/assets/media/brand/banner/' . $delete->image_banner));
     }
     return 1;

   }
   
   
   
   
   public function deleteall(Request $request)
   {
       $deleteIds = explode(',', $request->deleteIds);
       $idsCount = count($deleteIds);
       
       if($idsCount > 0){
           
           for($i = 0; $i < $idsCount; $i++){
               $wishlist = WishList::where('id', $deleteIds[$i])->delete();
           }
           return redirect()->back()->with('success', 'Records deleted successfully');
       }else{
           return redirect()->back()->with('error', 'Record not found.');
       }
      
   }



}
