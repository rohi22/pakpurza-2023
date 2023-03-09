<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\AdminWallet;
use App\Models\SafePayChat;
use App\Models\SafePay;
use App\Models\UserWallet;
use App\Models\UserBank;
use App\Models\WebSetting;

use Auth;


class ChatController extends Controller
{

    public function index()
    {
        return view('chat-message');
    } 
    
    public function select_ticket($id)
    {
        
            $data['table'] =  SafePayChat::where('paysafe_id',$id)->get();
            $data['paysafe'] = SafePay::find($id);

        $data['menu'] = 'categorymenu';
        $data['submenu'] = 'categorysubmenu1';
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        
        return view('admin.savepay.ticket-conversation',$data);
    }
    
    public function send(Request $request,$id)
    {
        $paysafe_id = $id;
        
        $table      = new SafePayChat();

        $last = $table->where('paysafe_id',$paysafe_id)->latest()->first();
        
        $paysafe = SafePay::find($paysafe_id);

        $table->sender_id = auth('admins')->user()->id;
        $table->msg = $request->msg;
        $table->is_admin = 1;
        $table->msg_for_id = $paysafe->product->user_id;
        $table->paysafe_id = $paysafe_id;
        
        
        if($request->has('file'))
        {
            $image = $request->file('file');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('asset/images/ticket-attachments/'), $image_name);
            $table->file = $image_name;

        }
        
        
        $table->save();
        
        return redirect()->back()->with('success', 'Message sent successfully');
    }
    
}
