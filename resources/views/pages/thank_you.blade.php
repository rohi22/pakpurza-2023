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
          <li class="breadcrumb-item active" aria-current="page"> <a href="21-Thank_you-Page.html"> Thank You</a></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->
  
  <!-- Dashboard_sec -->
  <section class="dashboard_sec m-t-50">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-5">
          <div class="dashboard_menu">
            <div class="dashbord_img">
              <div class="dashboard_back"> <img class="img-fluid w-100" src="images/dash-background.png" alt="Classified Plus"> </div>
              <div class="rounded_img"> <img class="img-fluid" src="images/aditya.png" alt="Classified Plus"> </div>
              <br>
              <div class="aditya">aditya</div>
            </div>
            <ul class="list-unstyled  m-t-20">
              <li><span><i class="fa fa-sliders"></i></span><a href="17-Dashboard-Page.html"> Dashboard </a></li>
              <li><span><i class="fa fa-cog"></i></span><a href="18-Profile-Page.html"> Profile Settings </a></li>
              <li class="active"><span><i class="fa fa-database"></i></span><a href="19-My_Ads-Page.html"> My Ads </a></li>
              <li><span><i class="fa fa-envelope"></i></span><a href="22-Offers_Messages-Page.html"> Offers/Messages </a></li>
              <li><span><i class="fa fa-shopping-cart"></i></span><a href="23-Boost-Your-Ad-Page.html"> Boost Your Ad </a></li>
              <li><span><i class="fa fa-shopping-cart"></i></span><a href="23-Payments-Page.html"> Payments </a></li>
              <li><span><i class="fa fa-heart"></i></span><a href="24-My_Favorits-Page.html"> My Favourites </a></li>
              <li><span><i class="fa fa-star"></i></span><a href="25-Prvacy_settings-Page.html"> Privacy Settings </a></li>
              <li><span><i class="fa fa-sign-in"></i></span><a href="#"> Logout </a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9  col-sm-7">
          <div class="thank_you_sec text-center">
            <div class="check_icon"><img class="img-fluid" src="images/th_q.png" alt="Classified Plus"> </div>
            <h3 class="text-capitalize">thank you! </h3>
            <p>Your submission received and we will contact you soon.</p>
          <a href="index.html">  <button class="back_home mt-2 text-capitalize" type="submit" value="button"> <i class="fa fa-long-arrow-left"></i> Back to Home </button></a>
          </div>
          <div class="single-sidebar m-t-50 m-b-50"> <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus"> </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Dashboard_sec -->
  

@endsection

@section('scripts')

@endsection