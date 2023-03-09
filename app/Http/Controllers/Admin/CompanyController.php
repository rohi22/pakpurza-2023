<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Companyprofile;

use App\Models\Category;

use App\Models\SubCategory;
use App\Models\Attributes;
use App\Models\Property;


use App\Models\Usersetting;
use App\Models\Useremailsetting;
use App\Models\Usersmssetting;
use App\Models\Userpushsetting;
use App\Models\User;


use Image;

use Auth;


class CompanyController extends Controller
{
     
   public function index(){
       
      $data['menu'] = 'companymenu';
      $data['submenu'] = '';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
       
     
     $data['company'] = Companyprofile::latest()->paginate(10);
     
     return view('admin.company.index',$data);
   }
   public function create(){

          $data['menu'] = 'categorymenu';
          $data['submenu'] = 'categorysubmenu2';
          $data['submenulevel1'] = '';
          $data['submenusub'] = '';
     
        return view('admin.categories.create',$data);
   }
   public function store(Request $request){
    
     $request->validate([
         'title' => 'required|max:255',
         'status' => 'required',
         'icon' => 'required',
         'slug' => 'unique:categories'
         
     ]);

    
for($i= 0;$i<count($request->title);$i++){
      
     $validate = Category::where('title', $request->title[$i])->first();
  
     if(empty($validate)){
        $store = new Category();
        $store->title = $request->title[$i];
        $store->slug = Str::slug($request->title[$i], '-');
        $store->description = $request->description[$i];
        $store->meta_keywords = $request->meta_keywords[$i];
        $store->meta_description = $request->meta_description[$i];
        $store->status = $request->status[$i]; 
        
        
        
        //  $image_name[$i] = '';
        if ($request->file('image')[$i]) {
            
            $featuredImage = $request->file('image')[$i];
            $featuredImageThumbnail = Image::make($featuredImage);
            $featured_image = time().$featuredImage->getClientOriginalName();
            $featuredImageThumbnailPath = public_path().'/assets/media/category/thumbnail_image/';
            $featuredImageThumbnail->save(public_path().'/assets/media/category/image/'.$featured_image);
            $featuredImageThumbnail->resize(267,267);
            $featuredImageThumbnail->save($featuredImageThumbnailPath.$featured_image);
            
        }
        
        $store->image = $featured_image;

        //  $icon_image_name = '';
        if ($request->file('icon')[$i]) {
              $icon_image = $request->file('icon')[$i];
              $icon_image_name = time().$icon_image->getClientOriginalName();
              $icon_image->move(public_path('/assets/media/category/icon'), $icon_image_name);
        }
        
        $store->icon_image = $icon_image_name;
        
        $store->save();
     }
     else{
        return redirect()->back()->with('error', $validate->title.' Category is already been taken');
        
     }
   
        
    }

    return redirect()->back()->with('success', 'Category Added');
    
    
    
     
   }
   
   
   public function edit(Request $reqeust, $id){

      $data['menu'] = 'companymenu';
      $data['submenu'] = '';
      $data['submenulevel1'] = '';
      $data['submenusub'] = '';
      
     
     $data['company'] = Companyprofile::where('id',$id)->first();
     
    //   dd($data['company']);
      
     return view('admin.company.edit',$data);

   }
   
     public function update(Request $request , $id)
   {
    //   dd($request->all());
       
        $update = Companyprofile::find($id);
        $update->company_name = $request->company_name;
        $update->about_company = $request->about_company;
        $update->web_link = $request->web_link;
        $update->fb_link = $request->fb_link;
        $update->youtube_link = $request->youtube_link;
        $update->insta_link = $request->insta_link;
        $update->twitter_link = $request->twitter_link;
        $update->linked_link = $request->linked_link;
        $update->establishment_date = $request->establishment_date;
        
        $company_logo = '';
    
        if ($request->file('company_logo')) {
            
              @unlink(public_path('/assets/media/company/logo/'.$update->company_logo));
              $image = $request->file('company_logo');
              $company_logo = time().$image->getClientOriginalName();
              $image->move(public_path('/assets/media/company/logo'), $company_logo);
              
        }
        else{
            
            $company_logo =$update->company_logo; 
        }
        
        $update->company_logo = $company_logo;
        
        $document_image_name = '';
    
        if ($request->file('document_image')) {
            
              @unlink(public_path('/assets/media/company/documentimage/'.$update->document_image));
              $image = $request->file('document_image');
              $document_image_name = time().$image->getClientOriginalName();
              $image->move(public_path('/assets/media/company/documentimage'), $document_image_name);
              
        }
        else{
            
            $document_image_name =$update->document_image; 
        }
        
        $update->document_image = $document_image_name;
        $document_pdf_name = '';
    
        if ($request->file('document_pdf')) {
            
              @unlink(public_path('/assets/media/company/documentimage/'.$update->document_pdf));
              $image = $request->file('document_pdf');
              $document_pdf_name = time().$image->getClientOriginalName();
              $image->move(public_path('/assets/media/company/documentpdf'), $document_pdf_name);
              
        }
        else{
            $document_pdf_name =$update->document_pdf; 
        }
        
        $update->document_pdf = $document_pdf_name;
        $document_cnic_front = '';
    
        if ($request->file('cnic_front')) {
            
              @unlink(public_path('/assets/media/company/documentcnic/'.$update->cnic_front));
              $image = $request->file('cnic_front');
              $document_cnic_front = time().$image->getClientOriginalName();
              $image->move(public_path('/assets/media/company/documentcnic'), $document_cnic_front);
              
        }
        else{
            
            $document_cnic_front = $update->cnic_front;
            
        }
        
        $update->cnic_front = $document_cnic_front;
        $document_cnic_back = '';
    
        if ($request->file('cnic_back')) {
            
              @unlink(public_path('/assets/media/company/documentcnic/'.$update->cnic_back));
              $image = $request->file('cnic_back');
              $document_cnic_back = time().$image->getClientOriginalName();
              $image->move(public_path('/assets/media/company/documentcnic'), $document_cnic_back);
              
        }
        else{
            
            $document_cnic_back = $update->cnic_back;
            
        }
        
        $update->cnic_back = $document_cnic_back;
        $document_cnic_holding = '';
    
        if ($request->file('cnic_holding')) {
            
              @unlink(public_path('/assets/media/company/documentcnic/'.$update->cnic_holding));
              $image = $request->file('cnic_holding');
              $document_cnic_holding = time().$image->getClientOriginalName();
              $image->move(public_path('/assets/media/company/documentcnic'), $document_cnic_holding);
              
        }
        else{
            
             $document_cnic_holding = $update->cnic_holding;
            
        }
        
        $update->cnic_holding = $document_cnic_holding;
        $update->save();
        
    
        return redirect()->back()->with('success', 'Company Profile Updated');

   }
   
   
   
   
   
   public function delete(Request $request){
     

     $delete = Category::where('id',$request->id)->first();

     if(!empty($delete)){

        $subCategory = SubCategory::where('category_id',$request->id)->get();
        if(!empty($subCategory)){
            foreach($subCategory as $sc){
              
                @unlink(public_path('/assets/media/sub-category/image/'.$sc->image));
                @unlink(public_path('/assets/media/sub-category/icon/' .$sc->icon_image));      
            }
            $validate = SubCategory::where('category_id',$request->id)->delete();
        }
        
            // $Attributesdelete = Attributes::where('category_id',$request->id)->delete();
            // $Propertydelete = Property::where('category_id',$request->id)->delete();
            
            $delete->delete();
            @unlink(public_path('/assets/media/category/category' . $delete->image));
            @unlink(public_path('/assets/media/category/icon' . $delete->icon_image));
              
          
     }
     

     return 1;

   }

   
    


    public function change_company_status(Request $request){
        
        $id = $request->id;
        $approve = $request->val;
        
        $edit = Companyprofile::where('id', $id)->first();

        $edit->status = $approve;
        $edit->save();

        if($approve == 1 ){ 
            $action = 'actived'; 
            $userdetail = User::where('id',$edit->user_id)->first();
            if($userdetail){
                $userdetail->is_company = 1;
                $userdetail->save();
                $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
                $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
                if($useremailsetting->user_account_alerts == 1){
                    $data = [
                        'full_name' => $userdetail->name, 
                        'email' => $userdetail->email,
                        'verification_code' => '12345', 
                        'via' => 'EMAIL', 
                        'source' => $userdetail->email, 
                        'subject' => 'Your Company active on simsar.com', 
                    ];
                
                    $goto = new  \App\Http\Controllers\HomeController();
                    $view = "emails.reset-password";
                    $goto->sendEmail($view, $data);
                }
                $content = "Your Company active on simsar.com";
                $notify = new  \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, $edit->user_id);
                if($usersmssetting->user_account_alerts == 1){
                    if($userdetail->phone){
                        $to = $userdetail->phone;
                        $msg = 'HI, Your Company active on simsar';
                        $goto = new  \App\Http\Controllers\HomeController();
                        $goto->sendSMS($to, $msg);
                        
                    }
                }
            }
        }elseif($approve == 0){ 
            $action = 'deactived';
            $userdetail = User::where('id',$edit->user_id)->first();
            if($userdetail){
                $userdetail->is_company = 2;
                $userdetail->save();
                $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
                $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
                if($useremailsetting->user_account_alerts == 1){
                    $data = [
                        'full_name' => $userdetail->name, 
                        'email' => $userdetail->email,
                        'verification_code' => '12345', 
                        'via' => 'EMAIL', 
                        'source' => $userdetail->email, 
                        'subject' => 'Your Company deactived on simsar.com', 
                    ];
                    $goto = new  \App\Http\Controllers\HomeController();
                    $view = "emails.reset-password";
                    $goto->sendEmail($view, $data);
                }
                $content = "Your Company deactived on simsar.com";
                $notify = new  \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, $edit->user_id);
                if($usersmssetting->user_account_alerts == 1){
                    if($userdetail->phone){
                            $to = $userdetail->phone;
                            $msg = 'HI, Your Company deactived on simsar';
                            $goto = new  \App\Http\Controllers\HomeController();
                            $goto->sendSMS($to, $msg);
                        
                    }
                }
            }
        }
        elseif($approve == 2){ 
            $action = 'pending';
            $userdetail = User::where('id',$edit->user_id)->first();
            if($userdetail){
                $userdetail->is_company = 3;
                $userdetail->save();
                $useremailsetting = Useremailsetting::where('user_id', $userdetail->id)->first(); 
                $usersmssetting = Usersmssetting::where('user_id', $userdetail->id)->first(); 
                if($useremailsetting->user_account_alerts == 1){
                    $data = [
                        'full_name' => $userdetail->name, 
                        'email' => $userdetail->email,
                        'verification_code' => '12345', 
                        'via' => 'EMAIL', 
                        'source' => $userdetail->email, 
                        'subject' => 'Your Company is pending on simsar.com', 
                    ];
                    $goto = new  \App\Http\Controllers\HomeController();
                    $view = "emails.reset-password";
                    $goto->sendEmail($view, $data);
                }
                $content = "Your Company is pending on simsar.com";
                $notify = new  \App\Http\Controllers\HomeController();
                $notify->sendNotification($content, $edit->user_id);
                if($usersmssetting->user_account_alerts == 1){
                    if($userdetail->phone){
                            $to = $userdetail->phone;
                            $msg = 'HI, Your Company is pending on simsar';
                            $goto = new  \App\Http\Controllers\HomeController();
                            $goto->sendSMS($to, $msg);
                        
                    }
                }
            }
        }
        
        return [
            'status' => 'success',
        ];
    }
    


}
