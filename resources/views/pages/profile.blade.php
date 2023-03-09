@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="iner_breadcrumb bg-light p-t-20 p-b-20">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> <a href="18-Profile-Page.html"> Profile Setting </a></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->
  
  <section class="dashboard_sec m-t-50">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="dashboard_menu">
            <div class="dashbord_img">
              <div class="dashboard_back"> <img class="img-fluid w-100" src="images/dash-background.png" alt="Classified Plus"> </div>
              <div class="rounded_img"> <img class="img-fluid" src="images/aditya.png" alt="Classified Plus"> </div>
              <div class="aditya">aditya</div>
            </div>
            <ul class="list-unstyled  m-t-20">
  <li><span><i class="fa fa-sliders"></i></span><a href="17-Dashboard-Page.html"> Dashboard </a></li>
              <li class="active"><span><i class="fa fa-cog"></i></span><a href="18-Profile-Page.html"> Profile Settings </a></li>
              <li><span><i class="fa fa-database"></i></span><a href="19-My_Ads-Page.html"> My Ads </a></li>
              <li><span><i class="fa fa-envelope"></i></span><a href="22-Offers_Messages-Page.html"> Offers/Messages </a></li>
              <li><span><i class="fa fa-shopping-cart"></i></span><a href="23-Boost-Your-Ad-Page.html"> Boost Your Ad </a></li>
              <li><span><i class="fa fa-shopping-cart"></i></span><a href="23-Payments-Page.html"> Payments </a></li>
              <li><span><i class="fa fa-heart"></i></span><a href="24-My_Favorits-Page.html"> My Favourites </a></li>
              <li><span><i class="fa fa-star"></i></span><a href="25-Prvacy_settings-Page.html"> Privacy Settings </a></li>
              <li><span><i class="fa fa-sign-in"></i></span><a href="#"> Logout </a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="dashboard_profile_main">
            <div class="dashboard_profile d-flex justify-content-between">
              <div class="profile_setting text-capitalize">
                <h3> Profile Setting </h3>
              </div>
              <div class="title_edit text-capitalize"><a href="#"><i class="fa fa-pencil"></i>  edit</a></div>
            </div>
            <div class="profile m-t-25">
              <h3> Profile Photo</h3>
              <div class="profile_sec d-flex justify-content-between m-t-20">
                <div class="profile_photo"><a href="#"><img src="images/profile_photos.png" alt="Classified Plus"/></a></div>
                <div class="profile_contant">
                  <p>Update your photo manually If the photo is not set the default Gravatar will be the same as your login email account</p>
                  <button class="submit_btn" type="submit" value="button">Upload Photo</button>
                </div>
              </div>
            </div>
          </div>
          
          
          
          <div class="row">
       <div class="col-md-6 m-t-40 margin_top">
       <div class="profile_detail">
       <h3>profile detail </h3>
       <form>
       <div class="form-group">
       <label>username</label>
  <input type="text"  class="form-control">
      </div>
      <div class="form-group">
          <label>email</label>
  <input type="email"  class="form-control">
  </div>
    <div class="form-group">
           <label>first name</label>
  <input type="text"  class="form-control">
   </div>
   <div class="form-group">
           <label>last name</label>
  <input type="text"  class="form-control">
      </div>
      <div class="form-group">
           <label>teleplone</label>
  <input type="tel"  class="form-control">
  </div>
       
  <form action="?" method="POST">
    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
    <br/>
   
    <script src="https://www.google.com/recaptcha/api.js"></script>
  </form>
  
  
  </form>
       <button class="update_btn mt-2 text-capitalize" type="submit" value="button">update</button>
       </form>
       </div>
       </div> 
       
       <div class="col-md-6 m-t-40 margin_top">
       <div class="change_password m-t-0">
       <h3>change password</h3>
          <form>
          <div class="form-group">
       <label>current password</label>
  <input type="password"  class="form-control">
  </div>
      <div class="form-group">
       <label>new password</label>
  <input type="password"  class="form-control">
     </div>
     <div class="form-group">
       <label>confirm new password</label>
  <input type="password"  class="form-control">
  </div>
    <button class="change_btn mt-2 text-capitalize" type="submit" value="button">change now</button>
   </form>
       
       
       </div>
       
       </div>
       </div>
          <div class="single-sidebar m-t-50 m-b-50">
                <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus">
              </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')

@endsection