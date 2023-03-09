<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Allattributes;
use App\Models\AllTransaction;
use App\Models\TransactionData;
use App\Models\Sellnowfield;
use Illuminate\Support\Str;
use Auth;
use App\Models\AssignAttributeToBrand;
class TransactionsController extends Controller
{
     
   public function index(){
       
       $data['menu'] = 'transactionsmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       

     $data['transaction'] = TransactionData::join('banner_ads', 'banner_ads.id', 'transaction_data.plan_id')
                                                 ->join('users', 'users.id', 'transaction_data.user_id')
                                              ->get(['transaction_data.*','banner_ads.title as packageTitle','users.name as userName']);
                                              
      $data['allTransactions'] =  AllTransaction::join('services', 'services.id', 'all_transaction.record_id')
                                                    ->get([
                                                        'all_transaction.*',
                                                        'services.icon as sIcon',
                                                        'services.title as sTitle',
                                                        'services.icon as sIcon',
                                                    ]);
     
     
    //  dd($data['transaction']);
     return view('admin.transactions.index',$data);
     
   }

   
    



}
