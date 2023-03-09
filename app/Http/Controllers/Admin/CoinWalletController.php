<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\UserWallet;
use App\Models\SubCategory;
use App\Models\Attributes;
use App\Models\Property;
use App\Models\User;
use App\Models\SafePay;
use App\Models\SellNow;
use App\Models\EarnedCoins;
use Mail;
use DB;

use Auth;


class CoinWalletController extends Controller
{

    public function index()
    {
     //   $data['transactions'] = EarnedCoins::orderBy('date', 'DESC')->count();
     //  dd($data['transactions'])
      $data['transactions'] = EarnedCoins::leftJoin('users', 'earned_coins.user_id', 'users.id')->orderBy('date', 'DESC')->paginate(10);
        
        $data['menu'] = 'coins_menu';
        $data['submenu'] = 'coins_sub_menu';
        $data['submenusub'] = '';
        $data['submenulevel1'] = '';
        return view('admin.coin-wallet.index',$data);
    }

    public function coinTrasactionStatusWise(Request $request){

        $data['transactions'] = EarnedCoins::orderBy('date', 'DESC');
        if($request->id==1){ $data['transactions'] = $data['transactions']->where('type', 'Credit'); }
        if($request->id==2){ $data['transactions'] = $data['transactions']->where('type', 'Debit'); }
        $data['transactions'] = $data['transactions']->get();

        return view('admin.coin-wallet.coin-transaction-status-wise',$data);
        


        
        
        
    }
}
