<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\UserWallet;
use App\Models\SubCategory;
use App\Models\Attributes;
use App\Models\Property;
use App\Models\User;
use App\Models\SafePay;
use App\Models\SellNow;
use App\Models\AdminBank;
use Mail;
use DB;

use Auth;


class WalletController extends Controller
{

  public function wallet_funds()
  {
    $data['menu'] = 'walletpanelmenu';
    $data['submenu'] = 'walletsubmenu2';
    $data['submenulevel1'] = '';
    $data['submenusub'] = '';

    $query = DB::table('safe_pays')->latest()
      ->join('payment_list', 'safe_pays.payment_method', 'payment_list.id')
      ->join('sell_now', 'safe_pays.product_id', 'sell_now.id')
      ->join('users', 'sell_now.user_id', 'users.id');

    $data['transactions'] = $query->paginate(10,['users.name as username', 'users.unique_id as user_id', 'users.unique_id', 'sell_now.ad_title as product_name', 'safe_pays.*', 'payment_list.payment_title as payment_method','payment_list.id as payment_method_id']);

    return view('admin.wallet.wallet-funds', $data);
  }

  public function wallet_funds_status_change(Request $request){
    //   dd($request->all());

    if($request->exists('release')){
      $safe_pay = SafePay::find($request->id);
      $safe_pay->is_released = 1;
      $safe_pay->save();

      $seller = SellNow::find($safe_pay->product_id);
      
      $userWallet = new UserWallet();
      $userWallet->user_id =  $seller->user_id;
      $userWallet->debit   =  $safe_pay->amount;
      $userWallet->status  =  1;
      $userWallet->safe_pay_id  =  $safe_pay->id;
      $userWallet->request_type  =  "safe_pay";
      $userWallet->save();

      return redirect()->back()->with('success', 'Payment Released');
    }

    if($request->exists('bank_payment_approved')){

      if($request->bank_payment_approved){
        $safe_pay = SafePay::find($request->id);
        // $safe_pay->is_bank_payment_approved = 1;
        $safe_pay->status = $request->bank_payment_approved;
        $safe_pay->save();

               // email to user
      // email to user
      // email to user
      $data['title'] = "Safe Pay Request Bank deposit approved ";
      $data['body']  = "Your payment against safe pay request with id “".$safe_pay->product_id."” has been received by admin. Your request is also sent to seller and you will be notified once the seller accepts the request.";
      $data['rows1']  = array(
          "Transaction ID"=> strtoupper($safe_pay->tid),
          "Ad Title" => $safe_pay->product->ad_title,
          "Amount" => $safe_pay->amount,
      );
      $data['body1'] = "You will be notified once your request is sent to the seller.";
      $bank = AdminBank::find($safe_pay->admin_bank_id);
      $data['rows']  = [];
        // $home->sendEmail('emails.users.email',$data);
        // $home->sendSMS(auth()->user()->email,"Safe pay “".$safe_pay->product_id."” bank deposit received by admin.");


        return redirect()->back()->with('success', 'Payment Accepted');
      }else{
        $safe_pay = SafePay::find($request->id);
        // $safe_pay->is_bank_payment_approved = 0;
        $safe_pay->status = $request->bank_payment_approved;
        $safe_pay->save();
        return redirect()->back()->with('success', 'Payment Rejected');
      }



    }

    if($request->exists('refund')){

      $safe_pay = SafePay::find($request->id);
      $safe_pay->is_refund = 1;
      $safe_pay->save();


      $userWallet = new UserWallet();
      $userWallet->user_id =  $safe_pay->user_id;
      $userWallet->debit   =  $safe_pay->amount;
      $userWallet->safe_pay_id  =  $safe_pay->id;
      $userWallet->request_type  =  "safe_pay";
      $userWallet->save();

      return redirect()->back()->with('success', 'Payment Refund');
    }
  }

  public function wallet_transactions()
  {
    $data['menu'] = 'walletpanelmenu';
    $data['submenu'] = 'walletsubmenu3';
    $data['submenulevel1'] = '';
    $data['submenusub'] = '';
    $data['transactions'] = UserWallet::all();

    $query = DB::table('user_wallets')->leftJoin('users', 'user_wallets.user_id', 'users.id')
      ->leftJoin('payment_list', 'user_wallets.payment_method', 'payment_list.id');
     
    $data['filter_user_id']   = $query->orderby('user_wallets.id','desc')->paginate(10,['unique_id']);
     $data['filter_user_name'] = $query->get(['name']);
     $data['filter_status']    = $query->get(['status']);
     $data['filter_type']      = $query->get(['request_type']);

    // $data['filter_user_id']   = $query->groupby('users.unique_id')->get(['unique_id']);
    // $data['filter_user_name'] = $query->groupby('users.name')->get(['name']);
    // $data['filter_status']    = $query->groupby('user_wallets.status')->get(['status']);
    // $data['filter_type']      = $query->groupby('user_wallets.request_type')->get(['request_type']);

    if (request('uid')) {
      $query->where('users.unique_id', request('uid'));
    }
    if (request('uname')) {
      $query->where('users.name', request('uname'));
    }
    if (request('rt')) {
      $query->where('user_wallets.request_type', request('rt'));
    }
    if (request('status')) {
      $query->where('user_wallets.status', request('status'));
    }

    $data['transactions'] = $query->where('user_wallets.request_type', '!=', 'pay_safe')->get(['users.name', 'users.unique_id', 'user_wallets.*', 'payment_list.payment_title as payment_method']);

// dd($data['transactions']);
    return view('admin.wallet.wallet-transactions', $data);
  }

  public function bank_accounts()
  {
    $data['menu'] = 'w_fundsmenu';
    $data['submenu'] = 'walletsubmenu3';
    $data['submenulevel1'] = '';
    $data['submenusub'] = '';

    return view('admin.wallet.bankaccount', $data);
  }

  public function wallet_deposit()
  {
    $data['menu'] = 'w_fundsmenu';
    $data['submenu'] = 'walletsubmenu4';
    $data['submenulevel1'] = '';
    $data['submenusub'] = '';

    return view('admin.wallet.wallet-deposit', $data);
  }

  public function wallet_transactions_status_change(Request $reqeust)
  { 
    $home = new HomeController();

    if ($reqeust->request_type == "deposit") {
      $table = UserWallet::find($reqeust->id);
      $table->status = 1;
      $table->tid = uniqid();
      $table->save();

      // emaiil send to user
      // emaiil send to user
      // emaiil send to user
      $data['subject']   = 'Deposit Request Approved - Simsar.com';
      $data['full_name'] = $table->user['name'];
      $data['email']     = $table->user['email'];
      
      $data['title'] = "Deposit Request Approved";
      $data['body']  = "Your request for deposit is approved by admin on ".$table->created_at.". Your Request Transaction Id is ".strtoupper($table->tid)." for amount KD. ".$table->debit.". You may check your wallet and transaction for further details. For any query or details you can contact us any time.";
      $data['rows']  = array();

      $home->sendEmail('emails.users.email',$data);
      $home->sendSMS($table->user['phone'],"Your deposit request against transaction id ".strtoupper($table->tid)." has been approved.");

       $logs = new  \App\Http\Controllers\Auth\LoginController();
        $logs->userlogs(auth()->user()->id,"Deposit Request Approved");
        
        $content = "deposit request Approved";
        $notify = new \App\Http\Controllers\HomeController();
        $notify->sendNotification($content, Auth::user()->id);


      return redirect()->back()->with('success', 'request approved');
    }

    if ($reqeust->request_type == "withdraw") {

      $table = UserWallet::find($reqeust->id);
      $table->status = 1;
      $table->bank_receipt_id = $reqeust->bank_receipt_id;
      $table->save();

      

      // emaiil send to user
      // emaiil send to user
      // emaiil send to user
      $data['subject']   = 'Wallet Withdrawal Request Sent – Simsar.com';
      $data['full_name'] = $table->user['name'];
      $data['email']     = $table->user['email'];
      
      $data['title'] = "Wallet Withdrawal Request Sent";
      $data['body']  = "Your request for withdrawal is approved by admin on ".$table->created_at.". Your Request Transaction Id is ".strtoupper($table->tid)." and admin transaction id for deposit in your bank account is ".$table->bank_receipt_id." for amount KD. ".$table->credit.". You may check your Bank account, wallet and transaction page for further details. For any query or details you can contact us any time.";
      

      $home->sendEmail('emails.users.email',$data);
      $home->sendSMS($table->user['phone'],"Your withdrawal request against transaction id ".strtoupper($table->tid)." has been processed.");

     
      return redirect()->back()->with('success', 'request approved');
    }
  }


  public function create()
  {

    $data['menu'] = 'categorymenu';
    $data['submenu'] = 'categorysubmenu2';
    $data['submenulevel1'] = '';
    $data['submenusub'] = '';

    return view('admin.categories.create', $data);
  }

  public function store(Request $request)
  {

    $request->validate([
      'title' => 'required|max:255',
      'status' => 'required',
      'icon' => 'required',
      'slug' => 'unique:categories'

    ]);


    for ($i = 0; $i < count($request->title); $i++) {

      $validate = Category::where('title', $request->title[$i])->first();

      if (!empty($validate)) {

        return redirect()->back()->with('error', $validate->title . ' Category is already been taken');
      } else {

        $store = new Category();
        $store->title = $request->title[$i];
        $store->slug = Str::slug($request->title[$i], '-');
        $store->description = $request->description[$i];
        $store->meta_keywords = $request->meta_keywords[$i];
        $store->meta_description = $request->meta_description[$i];
        $store->status = $request->status[$i];



        //  $image_name[$i] = '';
        if ($request->file('image')[$i]) {
          //  dd('check');
          $image = $request->file('image')[$i];
          $image_name = time() . $image->getClientOriginalName();
          $image->move(public_path('/assets/media/category/image'), $image_name);
        }

        $store->image = $image_name;



        //  $icon_image_name = '';
        if ($request->file('icon')[$i]) {
          $icon_image = $request->file('icon')[$i];
          $icon_image_name = time() . $icon_image->getClientOriginalName();
          $icon_image->move(public_path('/assets/media/category/icon'), $icon_image_name);
        }

        $store->icon_image = $icon_image_name;




        //  dd($store);
        $store->save();
        return redirect()->back()->with('success', 'Category Added');
      }
    }
  }



  public function edit(Request $reqeust, $id)
  {

    $data['menu'] = 'categorymenu';
    $data['submenu'] = 'categorysubmenu1';
    $data['submenulevel1'] = '';
    $data['submenusub'] = '';


    $data['category'] = Category::where('id', $id)->first();

    return view('admin.categories.edit', $data);
  }




  public function update(Request $request, $id)
  {

    // dd($request);


    //   $update = Category::find($id);
    $update = Category::where('id', $id)->first();



    $request->validate([
      'title' => 'required|max:255',
      'description' => 'max:255',
      'meta_keywords' => 'max:255',
      'meta_description' => 'max:255',
      'status' => 'required',
      'image' => $request->hasFile('image') ? 'required' : '',
      'icon_image' => $request->hasFile('icon_image') ? 'required' : '',
    ]);

    $update->title = $request->title;
    $update->slug = Str::slug($request->title, '-');
    $update->description = $request->description;
    $update->meta_keywords = $request->meta_keywords;
    $update->meta_description = $request->meta_description;

    $image_name = '';

    if ($request->has('image')) {
      @unlink(public_path('/assets/media/category/image/' . $update->image));
      $image = $request->file('image');
      $image_name = time() . $image->getClientOriginalName();
      $image->move(public_path('/assets/media/category/image'), $image_name);
    } else {
      $image_name = $update->image;
    }

    $update->image = $image_name;

    $icon_image_name = '';
    if ($request->has('icon_image')) {
      @unlink(public_path('/assets/media/category/icon/' . $update->icon_image));
      $image = $request->file('icon_image');
      $icon_image_name = time() . $image->getClientOriginalName();
      $image->move(public_path('/assets/media/category/icon'), $icon_image_name);
    } else {
      $icon_image_name = $update->icon_image;
    }

    $update->icon_image = $icon_image_name;
    $update->status = $request->status;
    $update->save();

    return redirect('categories')->with('success', 'Category Updated');
  }


  public function delete(Request $request)
  {


    $delete = Category::where('id', $request->id)->first();

    if (!empty($delete)) {

      $subCategory = SubCategory::where('category_id', $request->id)->get();
      if (!empty($subCategory)) {
        foreach ($subCategory as $sc) {

          @unlink(public_path('/assets/media/sub-category/image/' . $sc->image));
          @unlink(public_path('/assets/media/sub-category/icon/' . $sc->icon_image));
        }
        $validate = SubCategory::where('category_id', $request->id)->delete();
      }

      $Attributesdelete = Attributes::where('category_id', $request->id)->delete();
      $Propertydelete = Property::where('category_id', $request->id)->delete();

      $delete->delete();
      @unlink(public_path('/assets/media/category/category' . $delete->image));
      @unlink(public_path('/assets/media/category/icon' . $delete->icon_image));
    }


    return 1;
  }
  
    public function adminEarning()
    {
        $data['menu'] = 'adminearning';
        $data['submenu'] = 'adminearningsubmenu1';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        
        return view('admin.admin-earning.index', $data);
    }
    
}
