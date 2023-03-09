<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Models\UserBank;

use Auth;


class BankController extends Controller
{
     
   public function index(){
    
    $data['menu'] = 'w_fundsmenu';
    $data['submenu'] = 'walletsubmenu4';
    $data['submenulevel1'] = '';
    $data['submenusub'] = '';
    $data['banks'] = UserBank::where('user_id',auth()->user()->id)->get();
     
    return view('wallet.bank',$data);
   }

   public function create(){
       
        $data['menu'] = 'bankmenu';
        $data['submenu'] = 'categorysubmenu2';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        return view('admin.bank.create',$data);
     
   }

   public function store(Request $request){

               
        //create new
        $table =  new userBank();
        $table->user_id = auth()->user()->id;
        $table->name = $request->name;
        $table->ac_title = $request->ac_title;
        $table->ac_number = $request->ac_number; 
        $table->branch_code = $request->branch_code;
        $table->branch_address = $request->branch_address;
        $table->iban_no = $request->iban_no;
        $table->swift_code = $request->swift_code;
        $table->save();

        return redirect()->back()->with('success', 'Bank Added');
     
   }



   public function edit(Request $request, $id){

    return UserBank::find($id);

   }
   
   
   
   
   public function update(Request $request , $id)
   {
     
    $table =  UserBank::find($id);
    $table->name = $request->name;
    $table->ac_title = $request->ac_title;
    $table->ac_number = $request->ac_number; 
    $table->branch_code = $request->branch_code;
    $table->branch_address = $request->branch_address;
    $table->iban_no = $request->iban_no;
    $table->swift_code = $request->swift_code;
    $table->save();

    return redirect()->back()->with('success', 'Bank Updated');
   }


   public function destroy (Request $request, $id){
     
        UserBank::find($id)->delete();
        return redirect()->back()->with('success', 'Bank Deleted');

   }

   
    



}
