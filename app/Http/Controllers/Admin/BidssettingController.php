<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bidssetting;
use App\Models\User;
use Image;
use Auth;


class BidssettingController extends Controller
{
     
   public function index(){
     
      $data['menu'] = 'controlpanelmenu';
      $data['submenu'] = 'controlpanelsubmenu2';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['bidssetting'] = Bidssetting::all();
     return view('admin.bidssetting.index',$data);
   }
   public function create(){

      $data['menu'] = 'controlpanelmenu';
      $data['submenu'] = 'controlpanelsubmenu2';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['user'] = User::all();
        return view('admin.bidssetting.create',$data);
   }
   public function store(Request $request){
     $request->validate([
         'user' => 'required',
         'status' => 'required',
     ]);
      
     $validate = Bidssetting::where('user_id', $request->user)->first();
     if(empty($validate)){
        $store = new Bidssetting();
        $store->user_id = $request->user;
        $store->status = $request->status; 
        $store->save();
     }
     else{
        return redirect()->back()->with('error', 'Bid Setting is already been taken');
        
     }

    return redirect()->back()->with('success', 'Bid Setting Added');
   }
   public function edit(Request $reqeust, $id){

      $data['menu'] = 'categorymenu';
      $data['submenu'] = 'categorysubmenu1';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      $data['bidssetting'] = Bidssetting::where('id', $id)->first();
      $data['user'] = User::all();
   
      return view('admin.bidssetting.edit',$data);

   }
   public function update(Request $request , $id){
      
    $update = Bidssetting::where('id',$id)->first();
      $request->validate([
         'user' => 'required',
         'status' => 'required',
         
      ]);
     
        $update->user_id = $request->user; 
        $update->status = $request->status;
        $update->save();
    
        return redirect()->back()->with('success', 'Bids Setting Updated');
   }
   public function delete(Request $request){
     $delete = Bidssetting::where('id',$request->id)->first();
     $delete->delete();
     return 1;

   }
    public function deleteall(Request $request){
       if(count($request->bids_id)>0){
           for($i=0;$i<count($request->bids_id);$i++){
               
               $services = Bidssetting::where('id',$request->bids_id[$i])->first();
               if(!empty($services)){

        
            
            $services->delete();
              
        
        
     }
               
               
           }
           return 1;
       }
       else{
           return 0;
       }
       
   }

}
