<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Models\AdminBank;

use Auth;


class BankController extends Controller
{
     
    public function index(){
        $data['menu'] = 'walletpanelmenu';
        $data['submenu'] = 'walletsubmenu4';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        
    
        $data['banks'] = AdminBank::latest()->paginate(10);
        return view('admin.bank.index',$data);
    }

    public function create(){
       
        $data['menu'] = 'walletpanelmenu';
        $data['submenu'] = 'walletsubmenu4';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        return view('admin.bank.create',$data);
     
    }

    public function store(Request $request){

        //chnage status
        if($request->ajax){
            $adminBank = AdminBank::find($request->id);
            $adminBank->is_active = $request->val;
            $adminBank->save();
            return 1;             
        }
        
        //create new
        $table =  new AdminBank();
        $table->name = $request->name;
        $table->ac_title = $request->ac_title;
        $table->ac_number = $request->ac_number; 
        $table->branch_name = $request->branch_name;
        $table->save();

        return redirect()->back()->with('success', 'Bank Added');
     
    }



    public function edit(Request $request, $id){

    $data['menu'] = 'bankmenu';
    $data['submenu'] = 'banksubmenu1';
    $data['submenulevel1'] = '';
    $data['submenusub'] = '';
    

    $data['bank'] = AdminBank::find($id);
    return view('admin.bank.edit',$data);

    }
   
   
   
   
   public function update(Request $request , $id)
   {
     
    $table =  AdminBank::find($id);
    $table->name = $request->name;
    $table->ac_title = $request->ac_title;
    $table->ac_number = $request->ac_number; 
    $table->branch_name = $request->branch_name;
    $table->save();

    return redirect(route('admin.bank.index'))->with('success', 'Bank Updated');
   }


   public function destroy (Request $request, $id){
     
        AdminBank::find($id)->delete();
        return redirect(route('admin.bank.index'))->with('success', 'Bank Deleted');

   }
   
    public function deleteBankAll(Request $request){
        AdminBank::whereIn('id', $request->banks_id)->get()->delete();
        return redirect(route('admin.bank.index'))->with('success', 'Bank Deleted');
    } 

   
    



}
