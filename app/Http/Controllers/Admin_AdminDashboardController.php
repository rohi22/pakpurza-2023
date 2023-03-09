<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class Admin_AdminDashboardController extends Controller
{
    
    public function adminLoginForm(){

    }

    public function adminLogin(Request $request){
        
        $email = $request->email;
        $password = $request->password;


        if (Auth::guard('admins')->attempt(['email' => $email, 'password' => $password])) {

         return redirect('admin.dashboard');

         }else{

         return redirect('admin-login')->with('inc_pass','password is incorrect');

 
        }
    }
    
    
    public function index(){
        
        return view('admin.ai.dashboard');
    }
}
