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


class CoinController extends Controller
{

    public function index()
    {
        $data['coins'] = EarnedCoins::all();
        $data['menu'] = 'coins_menu';
        $data['submenu'] = 'coins_sub_menu';
        return view('admin.coin-wallet.index',$data);
    }








}
