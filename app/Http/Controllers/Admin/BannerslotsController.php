<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pagelist;
use Auth;

use App\Models\Bannerslots;

class BannerslotsController extends Controller
{
     
   public function index(){
       
        $data['menu'] = 'bannerslotsdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       
      $data['bannerslots'] = Bannerslots::latest()->leftJoin('page_list','page_list.id','banner_slots.page_id')
                                        ->paginate(10,['banner_slots.*','page_list.page_title as page_title']);
                                        
                                        
     return view('admin.bannerslots.index',$data);
   }

   public function create(){
       
        $data['menu'] = 'bannerslotsdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
       $data['pagelist'] = Pagelist::all();
  return view('admin.bannerslots.create',$data);
      
   }

   public function store(Request $request){
    
        $store = new Bannerslots();
        $store->page_id = $request->page_id;
        $store->title   = $request->title;
        // $store->price   = $request->price;
        $store->slot_width = $request->slot_width;
        $store->slot_height = $request->slot_height;
    
       $name = '';
        if ($request->file('slotimage')) {
            
            $file = $request->file('slotimage');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path('/assets/media/defaultbanner'),$name);
            
        }
        
        $store->slot_banner = $name;
        $store->save();
     
     return redirect()->back()->with('success', 'Banner Slots Added');
     
     
   }



   public function edit(Request $reqeust, $id){
          $data['menu'] = 'bannerslotsdmenu';
       $data['submenu'] = '';
       $data['submenulevel1'] = '';
       $data['submenusub'] = '';
        $data['pagelist'] = Pagelist::all();

  $data['bannerslots'] = Bannerslots::where('id',$id)->first();

     return view('admin.bannerslots.edit',$data);
     
   }
   
   
   
   
   public function update(Request $request , $id)
   {
       
       $update = Bannerslots::where('id',$id)->first();
       $update->page_id = $request->page_id;
       $update->title = $request->title;
    //   $update->price = $request->price;
       $update->slot_width = $request->slot_width;
       $update->slot_height = $request->slot_height;
       
       
       $image_name = '';
        
        if($request->has('slotimage'))
        {
            @unlink(public_path('/assets/media/defaultbanner/'.$update->slot_banner));
            $image = $request->file('slotimage');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/defaultbanner/'), $image_name);
            
        }
        else
        {
            $image_name =$update->slot_banner; 
        }
        
         $update->slot_banner = $image_name;
        
        
        
       $update->save();
       
        return redirect()->route('admin/banner-slots')->with('success', 'Banner Slots Updated');
   }


   public function delete(Request $request){
       
       $delete = Bannerslots::where('id',$request->id)->first();
       
       
        if(!empty($delete)){
            
             $delete->delete();
        }
       
       
         return 1;
         
     
   }
   
   
            public function deleteall(Request $request){
       if(count($request->banner_id)>0){
           for($i=0;$i<count($request->banner_id);$i++){
               
               $services = Bannerslots::where('id',$request->banner_id[$i])->first();
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
