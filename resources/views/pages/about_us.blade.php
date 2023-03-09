@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<!-- banner -->
<section class="banner">
    <div class="banner-innerpage <!--Category_banner-->" style="background-image: url({{ asset('images/common-pages/'.$page->image)}});">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center"> 
  <!-- Column -->
  <div class="text-center">
    <h1 class="title">{{ $page->title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('about-us') }}">{{ $page->title }} </a> </li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 

<!-- Categories -->
<section class="about_us">
<div class="container"> 
<!-- Row  -->
<div class="row">
  <div class="col-md-7">
    <h2 class="title">Why Choose Us?</h2>
    <div class="clearfix"></div>
    <p class="p-t-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
    <ul class="list-unstyled p-0 m-t-20">
    <li>veniam, quis nostrud exercitation ullamco laboris nisi commodo consequat. </li>
    <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum fugiat </li>
    <li>nulla pariatur. Excepteur dolore magna aliqua. </li>
    <li>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </li>
    <li>consequat.  sint occaecat cupidatat non proident, sunt in culpa</li>
    <li>qui officia deserunt mollit anim id est Lorem ipsum dolor sit amet, </li>
    <li>consectetur adipisicing elit, sed do eiusmod tempor incididunt </li>
    <li>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</li>
    <li>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
    </ul>
  </div>
        <div class="col-md-5 text-left m-t-50">
        @if(!empty($page->image))
            <img src="{{ asset('images/common-pages/'.$page->image)}}" width="100%">
        @endif
          </div>
</div>
</div>
</section>
<!-- End Categories --> 

<!-- how_it_work -->
<section class="how_it_work bg-light p-b-50">
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-9 text-center">
    <h2 class="title">How it Work</h2>
  </div>
 
                   {!!$page->content!!}
            
  <!-- <h6 class="subtitle col-md-10 text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not 
only five centuries,</h6> -->
</div>

<div class="row m-t-40">
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
<div class="work-parts text-center">
<div class="work-img m-auto">
<i class="fa fa-user"></i>

</div>
<div class="work-part text-center">
<h3 class="text-capitalize"> join us </h3>
<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has. </p>
</div>

</div>
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
<div class="work-parts text-center">
<div class="work-img m-auto">
<i class="fa fa-pencil"></i>
</div>
<div class="work-part text-center">
<h3 class="text-capitalize"> create ad </h3>
<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has. </p>
</div>

</div>
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
<div class="work-parts text-center">
<div class="work-img m-auto">
<i class="fa fa-bullhorn"></i>
</div>
<div class="work-part text-center">
<h3 class="text-capitalize"> get offers </h3>
<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has. </p>
</div>

</div>
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
<div class="work-parts text-center">
<div class="work-img m-auto">
<i class="fa fa-usd"></i>
</div>
<div class="work-part text-center">
<h3 class="text-capitalize"> sell it </h3>
<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has. </p>
</div>

</div>
</div>

</div>




</div>
</section>
<!-- End how_it_work -->

<!-- we_bes -->
<section class="we_bes">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center">
  <div class="col-md-7 text-center">
    <h2 class="title">Why We Are Best</h2>
    <h6 class="subtitle">Explore the greates places in the city.</h6>
  </div>
</div>
<!-- Row  -->
<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="d-flex m-t-40">
      <div class="counter_icon mr-3"><i class="fa fa-eye"></i> </div>
      <div class="counter_number">
        <h3> Eye on Quality </h3>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="d-flex m-t-40 justify-content-between">
      <div class="counter_icon mr-3"><i class="fa fa-lock"></i> </div>
      <div class="counter_number">
        <h3> Protection Guaranteed </h3>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="d-flex m-t-40">
      <div class="counter_icon mr-3"><i class="fa fa-comments"></i></div>
      <div class="counter_number">
        <h3> 24/7 Support </h3>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="d-flex m-t-40">
      <div class="counter_icon mr-3"><i class="fa fa-laptop"></i></div>
      <div class="counter_number">
        <h3> Prompt Complaint Response </h3>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="d-flex m-t-40 d-flex">
      <div class="counter_icon mr-3"><i class="fa fa-check-square-o"></i></div>
      <div class="counter_number">
        <h3> Verified Ads </h3>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="d-flex m-t-40 d-flex">
      <div class="counter_icon mr-3"><i class="fa fa-leaf"></i></div>
      <div class="counter_number">
        <h3> Secure Payment Gateway </h3>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<!-- End we_bes -->

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
    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class=""><img class="testimonial-image" src="frontend/images/testimonials_2.png"  alt="Classified Plus"></li>
    <li data-target="#carouselExampleIndicators2" data-slide-to="1" class="active"><img class="testimonial-image" src="frontend/images/testimonials_1.png"  alt="Classified Plus"></li>
    <li data-target="#carouselExampleIndicators2" data-slide-to="2"><img class="testimonial-image" src="frontend/images/testimonials_3.png"  alt="Classified Plus"></li>
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