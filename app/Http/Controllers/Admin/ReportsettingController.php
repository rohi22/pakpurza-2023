<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdReport;
use Image;
use Auth;


class ReportsettingController extends Controller
{
     
   public function index(){
       
      $data['menu'] = 'controlpanelmenu';
      $data['submenu'] = 'controlpanelsubmenu3';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
     
     $data['adReport'] = AdReport::latest()->paginate(10);
     
     
     return view('admin.reportlist.index',$data);
   }
   public function create(){
      
      $data['menu'] = 'controlpanelmenu';
      $data['submenu'] = 'controlpanelsubmenu3';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
      
        return view('admin.reportlist.create',$data);
   }
   public function store(Request $request){
    
     $request->validate([
         'title' => 'required',
         'status' => 'required',
        
         
     ]);
     
        $store = new AdReport();
        $store->report = $request->title;
        $store->status_id = $request->status; 
        $store->save();
   
    return redirect()->back()->with('success', 'Report Added');
   }
   
   
   public function edit(Request $reqeust, $id){

      
      $data['menu'] = 'controlpanelmenu';
      $data['submenu'] = 'controlpanelsubmenu3';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
     $data['adReport'] = AdReport::where('id',$id)->first();
     return view('admin.reportlist.edit',$data);

   }
   public function update(Request $request , $id){
       
    $update = AdReport::where('id',$id)->first();
        
      $request->validate([
         'title' => 'required',
         'status' => 'required',
     ]);
     
        $update->report = $request->title; 
         $update->status_id = $request->status;
         $update->save();
    
         return redirect()->route('report-setting')->with('success', 'Report Updated');

   }
   
   
   public function delete(Request $request){
     $delete = AdReport::where('id',$request->id)->first();
     $delete->delete();
   
     return 1;
   }
   
    public function deleteall(Request $request){
       if(count($request->adReport_id)>0){
           for($i=0;$i<count($request->adReport_id);$i++){
               
               $services = AdReport::where('id',$request->adReport_id[$i])->first();
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
