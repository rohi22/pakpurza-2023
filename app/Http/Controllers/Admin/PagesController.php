<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommonPages;
use App\Models\Contactuspage;
use DB;
class PagesController extends Controller
{
    
      public function common_pages($id){
        $data['menu'] = 'cmsmenu';
        $data['submenu'] = 'cmssubmenu'.$id;
        $data['submenulevel1'] = '';
        $data['submenusub'] = '';
        $data['page'] = CommonPages::findorfail($id);
        
        
        return view('admin/common-pages',$data);
      }


      public function update_common_page(Request $request,$id){


      $check = CommonPages::findorfail($id);


      $this->validate($request,[

      'title' => 'required|unique:common_pages,title,'.$check->id,

       ]);
  

                if ($request->hasFile('image')) {
            
                @unlink(public_path('/images/common-pages/'.$check->image));      
                $image = $request->file('image');
                $image_name = time().$image->getClientOriginalName();
                $image->move(public_path('/images/common-pages/'),$image_name);	
            
                }else{
            
                 $image_name = $check->image;
            
                }

     

    $check->update([

     'title'=>$request->title,
     'status'=>$request->status,
     'image'=>$image_name,
     'content'=>$request->content,
     'slug'=>\Str::slug($request->title,'-'),

    ]);

    
    return redirect()->back()->with('success','Update Successfully');




      }




      public function show_contact_form(){

         $data['menu'] = 'cmsmenu';
         $data['submenu'] = 'cmssubmenu7';
          $data['submenulevel1'] = '';
      $data['submenusub'] = '';
         
      $data['page'] = DB::table('contact_us_page')->get()->first();

      return view('admin/pages/contact-us',$data);

      }


      public function update_contact_page(Request $request,$id){

    //   Contactuspage
    
     $update = Contactuspage::where('id',$id)->first();
        
    //   $request->validate([
    //      'title' => 'required|max:255',
    //      'description' => 'max:255',
    //      'meta_keywords' => 'max:255',
    //      'meta_description' => 'max:255',
    //      'status' => 'required',
    //      'image' => $request->hasFile('image') ? 'required' : '',
    //      'icon_image' => $request->hasFile('icon_image') ? 'required' : '', 
    //  ]);
    
    
            
            
             
             
             
     
        $update->title = $request->title; 
        $update->slug = Str::slug($request->title, '-');
        $update->content = $request->content;
        $update->status = $request->status; 
       
       
        $image_name = '';
        
        if($request->has('banner'))
        {
            @unlink(public_path('/assets/media/contact/banner/'.$update->banner));
            $image = $request->file('banner');
            $image_name = time().$image->getClientOriginalName();
            $image->move(public_path('/assets/media/contact/banner'), $image_name);
            
        }
        else
        {
            $image_name =$update->banner; 
        }
        
        $update->banner = $image_name;
        
        
        
         $update->save();
         
         
    //   DB::table('contact_us_page')->where('id',$id)->update([


    //          'title'=>$request->title,
    //          'status'=>$request->status,
    //          'map'=>$request->map,
    //          'content'=>$request->content,
    //          'slug'=>\Str::slug($request->title,'-'),

    //   ]);
      

    
    return redirect()->back()->with('success','Update Successfully');


      }


}
