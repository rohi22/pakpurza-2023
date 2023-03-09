<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class LoginController extends Controller
{
     
    public function form(){
       
        return view('admin.login');
    }

    public function verifyCredentials(Request $request){
        
        $email = $request->email;
        $password = $request->password;


        if (Auth::guard('admins')->attempt(['email' => $email, 'password' => $password])){
            
            
            return redirect()->route('admin-dashboard')->with('success', 'Welcome');
            
            // return redirect('admin-dashboard');
        
        }else{
            
            return redirect('admin-login')->with('inc_pass','Incorrect username or password. Try again.');
        
        }

    }

    public function logout(Request $request){
        Auth::guard('admins')->logout();
    
        $request->session()->flush();
        $request->session()->regenerate();
        
        return redirect()->route('admin-login')->with('success', 'Thank you');
        // return redirect( 'admin-login' );
    }
    
    
    // public function login(){

    //    return view('admin/login');

    //    }

    //     public function verifyLogin(Request $request){
          
      

    //    $this->validate($request,[


    //         'email' => 'required|email|exists:admins,email',
    //         'password' => 'required|string',

    //     ]);

    //    $email = $request->email;
    //    $password = $request->password;


    //     if (Auth::guard('admins')->attempt(['email' => $email, 'password' => $password])) {

    //      return redirect('admin/dashboard');

    //      }else{

    //      return redirect('admin-login')->with('inc_pass','password is incorrect');

 
    //     }


    //   }


    //    public function logout(Request $request)
    // {
    //     Auth::guard('admins')->logout();
    
    //     $request->session()->flush();
    //     $request->session()->regenerate();
    //     return redirect( 'admin-login' );
    // }
}
