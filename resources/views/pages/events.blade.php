@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<!-- banner -->
<section class="banner">
    <div class="banner-innerpage Category_banner">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center "> 
  <!-- Column -->
  <div class="text-center">
    <h1 class="title">All Events</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <a href="04-Events-Page.html"> All Events </a></li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 

<!-- Trending_ads -->
<section class="trending_ads">
<div class="container">
<!-- Row  -->
<div class="row justify-content-center">
  <div class="col-md-7 text-center m-b-10">
    <h2 class="title">Newest Events</h2>
  </div>
</div>
<!-- Row  -->
<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="trending-parts bg-light rounded m-t-30">
      <a href="07-Events_Detail-Page.html"><div class="trending-img"> <img class="img-fluid rounded-top" src="images/Trending-img-1.png"
          alt="Pak Purza" /></a>
        <div class="featured-new"> <a href="#"> Open New </a> </div>
        <div class="trending_hed text-left">
          <a href="07-Events_Detail-Page.html"><h4> Mobile Ads </h4> </a>
          <p> Lorem Ipsum </p>
        </div>
      </div>
      <div class="trending-text p-t-25 p-b-20 p-l-15 p-r-15">
        <div class="text-top d-flex justify-content-between  m-t-15 p-b-10">
          <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                class="fa fa-comment-o"></i> 8</a> </div>
          <div class="trending-right"> <a href="#"> Laptop </a> </div>
        </div>
        <div class="trending-bottum d-flex p-t-15 p-b-10"> <a href=""
            class="a m-r-15 text-uppercase m-t-5 color_1"> a </a>
          <p> Lorem Ipsum is simply dummy text and of the printing typesetting </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="trending-parts bg-light rounded m-t-30">
      <div class="trending-img"> <img class="img-fluid rounded-top" src="images/Trending-img-2.png"
          alt="Pak Purza" />
        <div class="trending_hed text-left">
          <h4>Top Furniture </h4>
          <p> Kenny Dr Granada Hills, CA 91344 </p>
        </div>
      </div>
      <div class="trending-text p-t-25 p-b-20 p-l-15 p-r-15">
        <div class="text-top d-flex justify-content-between  m-t-15 p-b-10">
          <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                class="fa fa-comment-o"></i> 8</a> </div>
          <div class="trending-right"> <a href="#"> Furniture </a> </div>
        </div>
        <div class="trending-bottum d-flex p-t-15 p-b-10"> <a href=""
            class="a m-r-15 text-uppercase m-t-5 color_2"> b </a>
          <p> Lorem Ipsum is simply dummy text and of the printing typesetting </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="trending-parts bg-light rounded m-t-30">
      <div class="trending-img"> <img class="img-fluid rounded-top" src="images/Trending-img-3.png"
          alt="Pak Purza" />
        <div class="featured-new"> <a href="#"> Open New </a> </div>
        <div class="trending_hed text-left">
          <h4> Tablet Ads</h4>
          <p> Lorem Ipsum </p>
        </div>
      </div>
      <div class="trending-text p-t-25 p-b-20 p-l-15 p-r-15">
        <div class="text-top d-flex justify-content-between  m-t-15 p-b-10">
          <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                class="fa fa-comment-o"></i> 8</a> </div>
          <div class="trending-right"> <a href="#"> Fast Food </a> </div>
        </div>
        <div class="trending-bottum d-flex p-t-15 p-b-10"> <a href=""
            class="a m-r-15 text-uppercase m-t-5 color_3"> c </a>
          <p> Lorem Ipsum is simply dummy text and of the printing typesetting </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="trending-parts bg-light rounded m-t-30">
      <div class="trending-img"> <img class="img-fluid rounded-top" src="images/Trending-img-4.png"
          alt="Pak Purza" />
        <div class="trending_hed text-left">
          <h4> Laptop Ads </h4>
          <p> Lorem Ipsum </p>
        </div>
      </div>
      <div class="trending-text p-t-25 p-b-20 p-l-15 p-r-15">
        <div class="text-top d-flex justify-content-between  m-t-15 p-b-10">
          <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                class="fa fa-comment-o"></i> 8</a> </div>
          <div class="trending-right"> <a href="#"> Vehicles </a> </div>
        </div>
        <div class="trending-bottum d-flex p-t-15 p-b-10"> <a href=""
            class="a m-r-15 text-uppercase m-t-5 color_1"> e </a>
          <p> Lorem Ipsum is simply dummy text and of the printing typesetting </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="trending-parts bg-light rounded m-t-30">
      <div class="trending-img"> <img class="img-fluid rounded-top" src="images/Trending-img-5.png"
          alt="Pak Purza" />
        <div class="featured-new"> <a href="#"> Open New </a> </div>
        <div class="trending_hed text-left">
          <h4> Electronic Ads </h4>
          <p> lorem ipsum </p>
        </div>
      </div>
      <div class="trending-text p-t-25 p-b-20 p-l-15 p-r-15">
        <div class="text-top d-flex justify-content-between  m-t-15 p-b-10">
          <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                class="fa fa-comment-o"></i> 8</a> </div>
          <div class="trending-right"> <a href="#"> Education </a> </div>
        </div>
        <div class="trending-bottum d-flex p-t-15 p-b-10"> <a href=""
            class="a m-r-15 text-uppercase m-t-5 color_1"> e </a>
          <p> Lorem Ipsum is simply dummy text and of the printing typesetting </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="trending-parts bg-light rounded m-t-30">
      <div class="trending-img"> <img class="img-fluid rounded-top" src="images/Trending-img-6.png"
          alt="Pak Purza" />
        <div class="featured-new"> <a href="#"> Open New </a> </div>
        <div class="trending_hed text-left">
          <h4> Automotives </h4>
          <p> Lorem Ipsum </p>
        </div>
      </div>
      <div class="trending-text p-t-25 p-b-20 p-l-15 p-r-15">
        <div class="text-top d-flex justify-content-between  m-t-15 p-b-10">
          <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                class="fa fa-comment-o"></i> 8</a> </div>
          <div class="trending-right"> <a href="#"> Matrimony </a> </div>
        </div>
        <div class="trending-bottum d-flex p-t-15 p-b-10"> <a href=""
            class="a m-r-15 text-uppercase m-t-5 color_3"> c </a>
          <p> Lorem Ipsum is simply dummy text and of the printing typesetting </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<!-- End Trending_ads -->

<!-- App_Store -->
<section class="app_store m-t-50">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center">
  <div class="col-md-10 text-center">
    <h2 class="title">Download on App Store</h2>
    <div class="clearfix"></div>
    <h6 class="subtitle">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</h6>
  </div>
</div>
<!-- Row  -->
<div class="row">
  <div class="app_parts ">
    <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-apple app-icon "></i> Apple Store </button>
    <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-android app-icon"></i> Apple Store </button>
    <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-windows app-icon"></i> Apple Store </button>
  </div>
</div>
</div>
</section>
<!-- End App_Store -->

<!-- Testimonial -->
<section class="testimonials">
<div class="container">
<div class="row justify-content-center">
  <div class="col-lg-5 text-center">
    <h2 class="title">Testimonials</h2>
    <h6 class="subtitle">What Our Clients Says</h6>
  </div>
</div>
<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carouse2">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class=""><img class="testimonial-image" src="images/testimonials_2.png" alt="Classified Plus"></li>
    <li data-target="#carouselExampleIndicators2" data-slide-to="1" class="active"><img class="testimonial-image" src="images/testimonials_1.png"  alt="Classified Plus"></li>
    <li data-target="#carouselExampleIndicators2" data-slide-to="2"><img class="testimonial-image" src="images/testimonials_3.png"  alt="Classified Plus"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br>
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to<br>
        make a type specimen book. It has survived not only five centuries, </p>
      <h3>Williams Sherry</h3>
      <h4>User</h4>
    </div>
    <div class="carousel-item active">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br>
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to<br>
        make a type specimen book. It has survived not only five centuries, </p>
      <h3>Williams Sherry</h3>
      <h4>User</h4>
    </div>
    <div class="carousel-item">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br>
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to<br>
        make a type specimen book. It has survived not only five centuries, </p>
      <h3>Williams Sherry</h3>
      <h4>User</h4>
    </div>
  </div>
</div>
</div>
</section>
<!-- End Testimonial -->


@endsection

@section('scripts')

@endsection