<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SafePay;
use App\Models\SellNow;
use App\Models\UserWallet;


use Illuminate\Support\Str;
use Auth;
use DB;


class SavePayController extends Controller
{
public function index(){
    
      $data['menu'] = 'walletpanelmenu';
      $data['submenu'] = 'walletsubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
    
      $query = DB::table('safe_pays')
            ->join('payment_list', 'safe_pays.payment_method', 'payment_list.id')
            ->join('sell_now', 'safe_pays.product_id', 'sell_now.id')
            ->join('users', 'safe_pays.user_id', 'users.id');
 
      $data['transactions'] = $query->latest()->paginate(10,['users.name as username','users.unique_id as user_id','users.unique_id','sell_now.ad_title as product_name','sell_now.user_id as product_user_id','safe_pays.*']);

    return view('admin.savepay.index',$data);
}

public function update(Request $request, $id)
{
        $safepay = SafePay::find($id);
        $safepay->status = $request->status;
        $safepay->save();
        
        if($request->status == "appeal_win_by_seller"){
          $userWallet = new UserWallet();
          $userWallet->tid = uniqid();
          $userWallet->user_id =  $safepay->product->user_id;
          $userWallet->debit   =  $safepay->amount;
          $userWallet->status  =  1;
          $userWallet->safe_pay_id  =  $safepay->id;
          $userWallet->request_type =  "safe_pay";
          $userWallet->save();
        }
        
        if($request->status == "appeal_lost_by_seller_and_refunded_to_buyer" || $request->status == "refunded_to_buyer"){
          $userWallet = new UserWallet();
          $userWallet->tid = uniqid();
          $userWallet->user_id =  $safepay->user_id;
          $userWallet->debit   =  $safepay->amount;
          $userWallet->status  =  1;
          $userWallet->safe_pay_id  =  $safepay->id;
          $userWallet->request_type =  "safe_pay";
          $userWallet->save();
         
        }
        
         

  return redirect()->back();
     
      
}



public function ticket(){
    
      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['table'] = SafePay::where('is_appealed',1)->get();
    return view('admin.savepay.ticket',$data);
}


public function ticket_conversation(){
    
      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
    return view('admin.savepay.ticket-conversation',$data);
}







}
