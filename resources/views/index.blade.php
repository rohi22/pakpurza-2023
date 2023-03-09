@extends('frontend.layouts.app')

@section('content')


  <!--Search-bar-->
  <section class="slider">
  <div class="slide-text">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <h1 style="margin-top: 0% ">World's Largest Classifieds Site</h1>
  <p>Search from over 15,00,000 classifieds & Post unlimited<br>
  classifieds free!</p>
  <div>
  <form class="book-now-home">
  <div class="form-group d-flex">
    <label><i class="fa fa-bullhorn"></i></label>
    <input type="search" class="form-control text-truncate" placeholder="What are you looking for">
  </div>
  <div class="form-group selectdiv">
    <label><i class="fa fa-location-arrow"></i></label>
    <select class="form-control border-right-0 text-truncate">
      <option>Select Country</option>
      <option>America</option>
      <option>United Kingdom</option>
      <option>China</option>
      <option>Russia</option>
      <option>Pakistan</option>
    </select>
  </div>
  <div class="form-group selectdiv">
    <label><i class="fa fa-bars"></i></label>
    <select class="form-control border-right-0 text-truncate">
      <option>Select Category</option>
      <option>Vehicles</option>
      <option>Electronics</option>
      <option>Mobiles</option>
      <option>Laptop</option>
      <option>Tablet</option>
      <option>Services</option>
    </select>
  </div>
  <!-- Change this while creating backend (i.e: remove anchor tag)-->
  <button type="submit" class="btn btn-primary booknow btn-skin"><a
    href="10-search-result-Page.html" class="text-light text-decoration-none">Search
    Now</a></button>
    <!-- Change this while creating backend -->
  </form>
  <div style="margin-right: 50%;">
    <a class="text-light" href="#">Ads At Your Location</a>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  
  
  
  
  </div>
  </div>
  
  
  <!--cAROSUEL-->
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  @for($i=0; $i<$slider->count(); $i++)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if($i==0) class="active" @endif></li>
    @endfor
  </ol>
  @if($slider->count() > 0)
  <div class="carousel-inner">
  @foreach($slider as $key=>$s)
    <div class="carousel-item @if($key==0) active @endif">
      <img src="{{ URL::asset('assets/media/slider/'.$s->slider) }}" class="slide-image" alt="Pak Purza">
    </div>
  @endforeach  
  </div>
  @endif
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
  </a>
  </div>
  
  
  
  
  
  
  
  <!-- Categories -->
  <section class="categories p-b-50" >
  <div class="container"data-aos="fade-down"data-aos-duration="2000" >
  
  <!-- Row  -->
  <div class="row justify-content-center">
  
  <div class="col-md-7 text-center m-b-10">
  <h2 class="title">Ads Categories</h2>
  </div>
  </div>
  
  <!-- Row  -->
  <div class="row">
  <div class="col-md-3 m-t-30">
  <div class="categories_box"> <a href="product.html"><img
  src="frontend/images/02-Home-Page/categories1.png" alt="Pak Purza" /></a>
  <div class="overlay text-center"> <a href="product.html"><img
  src="frontend/images/02-Home-Page/machine.png" alt="Pak Purza">
  <p> Products </p>
  </a> </div>
  </div>
  </div>
  <div class="col-md-3 m-t-30">
  <div class="categories_box"> <a href="s.html"><img
  src="frontend/images/02-Home-Page/categories2.png" alt="Pak Purza" /></a>
  <div class="overlay text-center"> <a href="s.html"><img
  src="frontend/images/02-Home-Page/crane.png" alt="Pak Purza" />
  <p> Services </p>
  </a> </div>
  </div>
  </div>
  <div class="col-md-6 m-t-30">
  <div class="categories_box"> <a href="l.html"><img
  src="frontend/images/02-Home-Page/categories3.png" alt="Pak Purza" /></a>
  <div class="overlay text-center"> <a href="l.html"><img
  src="frontend/images/02-Home-Page/laptop.png" alt="Pak Purza" />
  <p> Laptop </p>
  </a> </div>
  </div>
  </div>
  <div class="col-md-6 m-t-30">
  <div class="categories_box"> <a href="m.html"><img
  src="frontend/images/02-Home-Page/categories4.png" alt="Pak Purza" /></a>
  <div class="overlay text-center"> <a href="m.html"><img
  src="frontend/images/02-Home-Page/Mobiles.png" alt="Pak Purza" />
  <p> Mobiles </p>
  </a> </div>
  </div>
  </div>
  <div class="col-md-6 m-t-30">
  <div class="categories_box"> <a href="t.html"><img
  src="frontend/images/02-Home-Page/categories4.png" alt="Pak Purza" /></a>
  <div class="overlay text-center"> <a href="t.html"><img
  src="frontend/images/02-Home-Page/tablet.png" alt="Pak Purza" />
  <p> Tablets </p>
  </a> </div>
  </div>
  </div>
  </div>
  
  </div>
  </section>
  <!-- End Categories -->
  
  <!-- Featured_ads -->
  <section class="featured_ads bg-light p-b-3">
  <div class="container" data-aos="fade-up"data-aos-duration="1000">
  
  
  <!-- Row  -->
  <div class="row justify-content-center"data-aos="fade-down" data-aos-duration="2000">
  
  <div class="col-md-7 text-center m-b-10">
  <h2 class="title">Featured Ads</h2>
  </div>
  </div>
  <!-- Row  -->
  <div class="row"data-aos="fade-right" data-aos-duration="2000">
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-5.png"
  alt="Pak Purza" />
  <div class="featured-new"> <a href="#"> New </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Mobile</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <p>Smartphone for sale</p>
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="m.html" style="float: right;">  Mobiles</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class=""> <img  class="img-fluid rounded-top" src="frontend/images/google_adds2.png"
  alt="Pak Purza" />
  
  <div class="featured-bottum m-t-30">
    
  </div>
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-7.png"
  alt="Pak Purza" />
  <div class="discount"> <a href="#"> Discount 30% </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top d-flex justify-content-between ">
    <div class="heading  p-b-5"> <a href="#">Laptop</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <p>Laptop for sale</p>
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="l.html" style="float: right;">  Laptops</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-8.png"
  alt="Pak Purza" />
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Furniture</a> </div>
  </div>
  <div class="text-stars m-t-5">
    
    <p>Smartphone for sale</p>
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="t.html" style="float: right;">  Tablets</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  </div>  
  
  <button class="view-btn hvr-pulse-grow" onclick="window.location.href='04-Category-Page.html';" type="submit"
  value="button">View all</button>
  </div>  
  
  </section>
  
  <!-- End Featured_ads -->
  <section class="featured_ads bg-light p-b-3">
  <div class="container">
  
  
  <!-- Row  -->
  <div class="row justify-content-center"data-aos="fade-down" data-aos-duration="2000">
  
  <div class="col-md-7 text-center m-b-10">
  <h2 class="title">Product Ads</h2>
  </div>
  </div>
  <!-- Row  -->
  <div class="row"data-aos="fade-right" data-aos-duration="2000">
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-5.png"
  alt="Pak Purza" />
  <div class="featured-new"> <a href="#"> New </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Mobile</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Smartphone for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="product.html" style="float: right;">  Products</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-7.png"
  alt="Pak Purza" />
  <div class="discount"> <a href="#"> Discount 30% </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top d-flex justify-content-between ">
    <div class="heading  p-b-5"> <a href="#">Laptop</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Cloth for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="product.html" style="float: right;">  Products</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-8.png"
  alt="Pak Purza" />
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Furniture</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Furniture for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="product.html" style="float: right;">  Products</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class=""> <img  class="img-fluid rounded-top" src="frontend/images/google_adds2.png"
  alt="Pak Purza" />
  
  </div>
  </div>
  </div>
  </div>
  </div>
  <button class="view-btn hvr-pulse-grow" onclick="window.location.href='product.html';" type="submit"
  value="button">View all</button>
  </section>
  <section class="featured_ads bg-light p-b-3">
  <div class="container">
  
  
  <!-- Row  -->
  <div class="row justify-content-center"data-aos="fade-down" data-aos-duration="2000">
  
  <div class="col-md-7 text-center m-b-10">
  <h2 class="title">Service Ads</h2>
  </div>
  </div>
  <!-- Row  -->
  <div class="row"data-aos="fade-right" data-aos-duration="2000">
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class=""> <img  class="img-fluid rounded-top" src="frontend/images/google_adds2.png"
  alt="Pak Purza" />
  
  <div class="featured-bottum m-t-30">
    
  </div>
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-5.png"
  alt="Pak Purza" />
  <div class="featured-new"> <a href="#"> New </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Mobile</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Smartphone for sale</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="s.html" style="float: right;">  Services</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-7.png"
  alt="Pak Purza" />
  <div class="discount"> <a href="#"> Discount 30% </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top d-flex justify-content-between ">
    <div class="heading  p-b-5"> <a href="#">Laptop</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Cloth for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="s.html" style="float: right;">  Services</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-8.png"
  alt="Pak Purza" />
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Furniture</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Furniture for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="s.html" style="float: right;">  Services</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  
  </div>
  <button class="view-btn hvr-pulse-grow" onclick="window.location.href='s.html';" type="submit"
  value="button">View all</button>
  </div>
  </section>
  
  
  <section class="featured_ads bg-light p-b-3">
  <div class="container">
  
  
  <!-- Row  -->
  <div class="row justify-content-center"data-aos="fade-down" data-aos-duration="2000">
  
  <div class="col-md-7 text-center m-b-10">
  <h2 class="title">Laptop Ads</h2>
  </div>
  </div>
  <!-- Row  -->
  <div class="row"data-aos="fade-right" data-aos-duration="2000">
  
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-5.png"
  alt="Pak Purza" />
  <div class="featured-new"> <a href="#"> New </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Laptop</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Laptop for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="l.html" style="float: right;">  Laptops</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-7.png"
  alt="Pak Purza" />
  <div class="discount"> <a href="#"> Discount 30% </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top d-flex justify-content-between ">
    <div class="heading  p-b-5"> <a href="#">Laptop</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Laptop for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="l.html" style="float: right;">  Laptops</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class=""> <img  class="img-fluid rounded-top" src="frontend/images/google_adds2.png"
  alt="Pak Purza" />
  
  <div class="featured-bottum m-t-30">
    
  </div>
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-8.png"
  alt="Pak Purza" />
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Laptop</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Laptop for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="l.html" style="float: right;">  Laptops</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  
  </div>
  <button class="view-btn hvr-pulse-grow" onclick="window.location.href='l.html';" type="submit"
  value="button">View all</button>
  </div>
  </section>
  
  
  
  <section class="featured_ads bg-light p-b-3">
  <div class="container">
  
  <!-- Row  -->
  <div class="row justify-content-center"data-aos="fade-down" data-aos-duration="2000">
  
  <div class="col-md-7 text-center m-b-10">
  <h2 class="title">Mobile Ads</h2>
  </div>
  </div>
  <!-- Row  -->
  <div class="row"data-aos="fade-right" data-aos-duration="2000">
  
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-5.png"
  alt="Pak Purza" />
  <div class="featured-new"> <a href="#"> New </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Mobile</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Smartphone for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="m.html" style="float: right;">  Mobiles</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class=""> <img  class="img-fluid rounded-top" src="frontend/images/google_adds2.png"
  alt="Pak Purza" />
  
  <div class="featured-bottum m-t-30">
    
  </div>
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-7.png"
  alt="Pak Purza" />
  <div class="discount"> <a href="#"> Discount 30% </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top d-flex justify-content-between ">
    <div class="heading  p-b-5"> <a href="#">Mobile</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Smartphone for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="m.html" style="float: right;">  Mobiles</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-8.png"
  alt="Pak Purza" />
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Mobile</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">smartphone for sele</h3>
    
    
    <p>7000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="m.html" style="float: right;">  Mobiles</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  
  </div>
  <button class="view-btn hvr-pulse-grow" onclick="window.location.href='m.html';" type="submit"
  value="button">View all</button>
  </div>
  </section>
  
  <section class="featured_ads bg-light p-b-3">
  <div class="container">
  
  
  <!-- Row  -->
  <div class="row justify-content-center"data-aos="fade-down" data-aos-duration="2000">
  
  <div class="col-md-7 text-center m-b-10">
  <h2 class="title">Tablets Ads</h2>
  </div>
  </div>
  <!-- Row  -->
  <div class="row"data-aos="fade-right" data-aos-duration="2000">
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class=""> <img  class="img-fluid rounded-top" src="frontend/images/google_adds2.png"
  alt="Pak Purza" />
  
  <div class="featured-bottum m-t-30">
    
  </div>
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-5.png"
  alt="Pak Purza" />
  <div class="featured-new"> <a href="#"> New </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Tablet</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Tablet for sale</h3>
    
    <p>9000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="s.html" style="float: right;">  Services</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-7.png"
  alt="Pak Purza" />
  <div class="discount"> <a href="#"> Discount 30% </a> </div>
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top d-flex justify-content-between ">
    <div class="heading p-b-5"> <a href="#">Tablet</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Tablet for sale</h3>
    
    <p>9000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="s.html" style="float: right;">  Services</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
  <div class="featured-img"> <img class="img-fluid rounded-top" src="frontend/images/Featured-img-8.png"
  alt="Pak Purza" />
  <div class="overlay text-center"> <a href="#"><i class="fa fa-heart-o"></i></a> </div>
  </div>
  <div class="featured-text">
  <div class="text-top">
    <div class="heading p-b-5"> <a href="#">Tablet</a> </div>
  </div>
  <div class="text-stars m-t-5">
    <h3 class="m-t-10">Tablet for sale</h3>
    
    <p>9000 PKR</p>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Karachi</span> </a> </li>
    <br>
    <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-map-marker"></i><span> Pakistan</span> </a> </li>
    <br>
    <br>
    <!-- Start -->
    <a class="d-inline-block" href="12-Datile_banner-Page.html" style="color: black;">View Details</a>
    <a class="d-inline-block" href="s.html" style="float: right;">  Services</a>
    <p><br></p>
    <!--End-->
  </div>
  
  </div>
  </div>
  </div>
  
  </div>
  <button class="view-btn hvr-pulse-grow" onclick="window.location.href='t.html';" type="submit"
  value="button">View all</button>
  </div>
  </section>
  
  
  <!-- Trending_ads -->
  <section class="trending_ads">
  <div class="container"data-aos="fade-left"data-aos-duration="2000">
  <!-- Row  -->
  <div class="row justify-content-center">
  <div class="col-md-7 text-center m-b-10">
  <h2 class="title">Blogs</h2>
  </div>
  </div>
  <!-- Row  -->
  <div class="row"data-aos="fade-left" data-aos-duration="2000">
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="trending-parts bg-light rounded m-t-30">
  <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-1.png"
  alt="Pak Purza" />
  <div class="featured-new"> <a href="#"> Open New </a> </div>
  <div class="trending_hed text-left">
    <h4> Mobile Ads </h4>
    <p> Lorem Ipsum </p>
  </div>
  </div>
  <div class="trending-text p-t-25  p-l-15 p-r-15">
  <div class="text-top d-flex justify-content-between  m-t-15 ">
    <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
      class="fa fa-comment-o"></i> 8</a> </div>
      <div class="trending-right"> <a href="#"> Laptop </a> </div>
    </div>
    <div class="trending-bottum d-flex p-t-15"> <a href=""
      class="a m-r-15 text-uppercase m-t-5 color_1"> a </a>
      <p> Lorem Ipsum is simply dummy text and of the printing typesetting<button  class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button>
      </p> 
    </div>
  </div>
  </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="trending-parts bg-light rounded m-t-30">
  <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-2.png"
    alt="Pak Purza" />
    <div class="trending_hed text-left">
      <h4>Top Furniture </h4>
      <p> Kenny Dr Granada Hills, CA 91344 </p>
    </div>
  </div>
  <div class="trending-text p-t-25 p-l-15 p-r-15">
    <div class="text-top d-flex justify-content-between  m-t-15 ">
      <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
        class="fa fa-comment-o"></i> 8</a> </div>
        <div class="trending-right"> <a href="#">  Product</a> </div>
      </div>
      <div class="trending-bottum d-flex p-t-15 "> <a href=""
        class="a m-r-15 text-uppercase m-t-5 color_2"> b </a>
        <p> Lorem Ipsum is simply dummy text and of the printing typesetting <button  class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button></p>
      </div>
    </div>
  </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="trending-parts bg-light rounded m-t-30">
    <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-3.png"
      alt="Pak Purza" />
      <div class="featured-new"> <a href="#"> Open New </a> </div>
      <div class="trending_hed text-left">
        <h4> Tablet Ads</h4>
        <p> Lorem Ipsum </p>
      </div>
    </div>
    <div class="trending-text p-t-25  p-l-15 p-r-15">
      <div class="text-top d-flex justify-content-between  m-t-15 ">
        <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
          class="fa fa-comment-o"></i> 8</a> </div>
          <div class="trending-right"> <a href="#"> Service </a> </div>
        </div>
        <div class="trending-bottum d-flex p-t-15 "> <a href=""
          class="a m-r-15 text-uppercase m-t-5 color_3"> c </a>
          <p> Lorem Ipsum is simply dummy text and of the printing typesetting <button  class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button></p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"data-aos="fade-right" data-aos-duration="2000">
    <div class="trending-parts bg-light rounded m-t-30">
      <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-4.png"
        alt="Pak Purza" />
        <div class="trending_hed text-left">
          <h4> Laptop Ads </h4>
          <p> Lorem Ipsum </p>
        </div>
      </div>
      <div class="trending-text p-t-25  p-l-15 p-r-15">
        <div class="text-top d-flex justify-content-between  m-t-15 ">
          <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
            class="fa fa-comment-o"></i> 8</a> </div>
            <div class="trending-right"> <a href="#"> Vehicles </a> </div>
          </div>
          <div class="trending-bottum d-flex p-t-15 "> <a href=""
            class="a m-r-15 text-uppercase m-t-5 color_1"> e </a>
            <p> Lorem Ipsum is simply dummy text and of the printing typesetting <button  class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button> </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
      <div class="trending-parts bg-light rounded m-t-30">
        <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-5.png"
          alt="Pak Purza" />
          <div class="featured-new"> <a href="#"> Open New </a> </div>
          <div class="trending_hed text-left">
            <h4> Electronic Ads </h4>
            <p> lorem ipsum </p>
          </div>
        </div>
        <div class="trending-text p-t-25  p-l-15 p-r-15">
          <div class="text-top d-flex justify-content-between  m-t-15 ">
            <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
              class="fa fa-comment-o"></i> 8</a> </div>
              <div class="trending-right"> <a href="#"> Education </a> </div>
            </div>
            <div class="trending-bottum d-flex p-t-15 "> <a href=""
              class="a m-r-15 text-uppercase m-t-5 color_1"> e </a>
              <p> Lorem Ipsum is simply dummy text and of the printing typesetting <button  class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"data-aos="fade-up" data-aos-duration="2000">
        <div class="trending-parts bg-light rounded m-t-30">
          <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-6.png"
            alt="Pak Purza" />
            <div class="featured-new"> <a href="#"> Open New </a> </div>
            <div class="trending_hed text-left">
              <h4> Automotives </h4>
              <p> Lorem Ipsum </p>
            </div>
          </div>
          <div class="trending-text p-t-25  p-l-15 p-r-15">
            <div class="text-top d-flex justify-content-between  m-t-15 ">
              <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                class="fa fa-comment-o"></i> 8</a> </div>
                <div class="trending-right"> <a href="#"> Mobile </a> </div>
              </div>
              <div class="trending-bottum d-flex p-t-15 "> <a href=""
                class="a m-r-15 text-uppercase m-t-5 color_3"> c </a>
                <p> Lorem Ipsum is simply dummy text and of the printing typesetting<button  class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button> </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"data-aos="fade-down" data-aos-duration="2000">
          <div class="trending-parts bg-light rounded m-t-30">
            <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-4.png"
              alt="Pak Purza" />
              <div class="trending_hed text-left">
                <h4> Laptop Ads </h4>
                <p> Lorem Ipsum </p>
              </div>
            </div>
            <div class="trending-text p-t-25  p-l-15 p-r-15">
              <div class="text-top d-flex justify-content-between  m-t-15 ">
                <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                  class="fa fa-comment-o"></i> 8</a> </div>
                  <div class="trending-right"> <a href="#"> Vehicles </a> </div>
                </div>
                <div class="trending-bottum d-flex p-t-15"> <a href=""
                  class="a m-r-15 text-uppercase m-t-5 color_1"> e </a>
                  <p> Lorem Ipsum is simply dummy text and of the printing typesetting <button   class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button> </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"data-aos="fade-down" data-aos-duration="2000">
            <div class="trending-parts bg-light rounded m-t-30">
              <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-5.png"
                alt="Pak Purza" />
                <div class="featured-new"> <a href="#"> Open New </a> </div>
                <div class="trending_hed text-left">
                  <h4> Electronic Ads </h4>
                  <p> lorem ipsum </p>
                </div>
              </div>
              <div class="trending-text p-t-25  p-l-15 p-r-15">
                <div class="text-top d-flex justify-content-between  m-t-15 ">
                  <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                    class="fa fa-comment-o"></i> 8</a> </div>
                    <div class="trending-right"> <a href="#"> Education </a> </div>
                  </div>
                  <div class="trending-bottum d-flex p-t-15 "> <a href=""
                    class="a m-r-15 text-uppercase m-t-5 color_1"> e </a>
                    <p> Lorem Ipsum is simply dummy text and of the printing typesetting <button   class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"data-aos="fade-down" data-aos-duration="2000">
              <div class="trending-parts bg-light rounded m-t-30">
                <div class="trending-img"> <img class="img-fluid rounded-top" src="frontend/images/Trending-img-6.png"
                  alt="Pak Purza" />
                  <div class="featured-new"> <a href="#"> Open New </a> </div>
                  <div class="trending_hed text-left">
                    <h4> Automotives </h4>
                    <p> Lorem Ipsum </p>
                  </div>
                </div>
                <div class="trending-text p-t-25  p-l-15 p-r-15">
                  <div class="text-top d-flex justify-content-between  m-t-15 ">
                    <div class="trending-left"><a href="#" class="m-r-5"><i class="fa fa-heart-o"></i> 5</a> <a href="#"><i
                      class="fa fa-comment-o"></i> 8</a> </div>
                      <div class="trending-right"> <a href="#"> Tablet </a> </div>
                    </div>
                    <div class="trending-bottum d-flex p-t-15 "> <a href=""
                      class="a m-r-15 text-uppercase m-t-5 color_3"> c </a>
                      <p> Lorem Ipsum is simply dummy text and of the printing typesetting<button  class="view-btn hvr-pulse-grow m-r-15" onclick="window.location.href='06-Blog-Page.html';" type="submit"value="button">Read more...</button> </p>
                    </div>
                  </div>
                </div>
              </div>
              <button class="view-btn hvr-pulse-grow" onclick="window.location.href='19-My_Ads-Page.html';" type="submit"
              value="button">View all</button>
            </div>
          </div>
        </section>
        <!-- End Trending_ads -->
        
        <!-- Trusted -->
        <div class="container"data-aos="fade-right"data-aos-duration="2000">
          
          <div class="row">
            
            <div class="four col-md-3">
              <div class="counter-box colored">
                <i class="fa fa-thumbs-o-up"></i>
                <span class="counter">2147</span>
                <p>Happy Customers</p>
              </div>
            </div>
            <div class="four col-md-3">
              <div class="counter-box colored">
                <i class="fa fa-group"></i>
                <span class="counter">3275</span>
                <p>Registered Members</p>
              </div>
            </div>
            <div class="four col-md-3">
              <div class="counter-box colored">
                <i class="fa  fa-shopping-cart"></i>
                <span class="counter">289</span>
                <p>Available Products</p>
              </div>
            </div>
            <div class="four col-md-3">
              <div class="counter-box colored">
                <i class="fa  fa-user"></i>
                <span class="counter">220</span>
                <p>Award Winner</p>
              </div>
            </div>
          </div>	
        </div>
        <!-- End Trusted -->
        
        <!-- How it Work -->
        <section class="how_it_work p-b-50">
          <div class="container"data-aos="zoom-in"data-aos-duration="2000">
            <div class="row justify-content-center">
              <div class="col-md-9 text-center">
                <h2 class="title">How it Work</h2>
              </div>
              <h6 class="subtitle col-md-10 text-center">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                only five centuries,</h6>
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
          <!-- End How it Work -->
          
          <!-- Testimonial -->
          <section class="testimonials">
            <div class="container"data-aos="fade-down"data-aos-duration="2000">
              <div class="row justify-content-center">
                <div class="col-lg-5 text-center">
                  <h2>Testimonials</h2>
                  <p>What Are Clients Says</p>
                </div>
              </div>
              <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carouse2">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators2" data-slide-to="0" class=""><img class="testimonial-image"
                    src="frontend/images/testimonials_2.png" alt="Classified Plus"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="1" class="active"><img class="testimonial-image"
                      src="frontend/images/testimonials_1.png" alt="Classified Plus"></li>
                      <li data-target="#carouselExampleIndicators2" data-slide-to="2"><img class="testimonial-image"
                        src="frontend/images/testimonials_3.png" alt="Classified Plus"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item">
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's<br>
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                            to<br>
                            make a type specimen book. It has survived not only five centuries, </p>
                            <h3>Williams Sherry</h3>
                            <h4>User</h4>
                            <h4>Deputy Head</h4>
                            <h4>Honda</h4>
                          </div>
                          <div class="carousel-item active">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                              industry's<br>
                              standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                              to<br>
                              make a type specimen book. It has survived not only five centuries, </p>
                              <h3>Williams Sherry</h3>
                              <h4>User</h4>
                              <h4>Operation Manager</h4>
                              <h4>Aramco</h4>
                            </div>
                            <div class="carousel-item">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's<br>
                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                to<br>
                                make a type specimen book. It has survived not only five centuries, </p>
                                <h3>Williams Sherry</h3>
                                <h4>User</h4>
                                <h4>Director</h4>
                                <h4>SGS</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <!-- End Testimonial -->
                      
                      <!-- We_Bes -->
                      <section class="we_bes p-b-45">
                        <div class="container"data-aos="fade-left"data-aos-duration="2000">
                          <!-- Row  -->
                          <div class="row justify-content-center">
                            <div class="col-md-7 text-center">
                              <h2 class="title">Why We Are Best</h2>
                            </div>
                          </div>
                          <!-- Row  -->
                          <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                              <div class="d-flex m-t-40">
                                <div class="counter_icon mr-3"><i class="fa fa-eye"></i> </div>
                                <div class="counter_number">
                                  <h3> Eye on Quality </h3>
                                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                    industry's. </p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="d-flex m-t-40 justify-content-between">
                                  <div class="counter_icon mr-3"><i class="fa fa-lock"></i> </div>
                                  <div class="counter_number">
                                    <h3> Protection Guaranteed </h3>
                                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                      industry's. </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                  <div class="d-flex m-t-40">
                                    <div class="counter_icon mr-3"><i class="fa fa-comments"></i></div>
                                    <div class="counter_number">
                                      <h3> 24/7 Support </h3>
                                      <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                        industry's. </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="d-flex m-t-40">
                                      <div class="counter_icon mr-3"><i class="fa fa-laptop"></i></div>
                                      <div class="counter_number">
                                        <h3> Prompt Complaint Response </h3>
                                        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                          industry's. </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                      <div class="d-flex m-t-40 d-flex">
                                        <div class="counter_icon mr-3"><i class="fa fa-check-square-o"></i></div>
                                        <div class="counter_number">
                                          <h3> Verified Ads </h3>
                                          <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                            industry's. </p>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="d-flex m-t-40 d-flex">
                                          <div class="counter_icon mr-3"><i class="fa fa-leaf"></i></div>
                                          <div class="counter_number">
                                            <h3> Secure Payment Gateway </h3>
                                            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                              industry's. </p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                  <!-- End We_Bes -->
                                  
                                  <section>
                                    <div class="container mb-5 mt-5"data-aos="zoom-out" data-aos-duration="2000">
                                      <div class="row">
                                        <div class="col">
                                          <img class="add_img img-fluid" src="frontend/images/discount-img.png" alt="Classified Plus"> 
                                        </div>
                                        <div class="col">
                                          <img class="add_img img-fluid" src="frontend/images/discount-img.png" alt="Classified Plus"> 
                                        </div>
                                      </div>
                                    </section>
                                    
                                    <!-- App_Store -->
                                    <section class="app_store p-b-50">
                                      <div class="container"data-aos="fade-up"data-aos-duration="2000">
                                        <!-- Row  -->
                                        <div class="row justify-content-center">
                                          <div class="col-md-6">
                                            <h2 class="title">Download on App Store</h2>
                                            <div class="clearfix"></div>
                                            <h6 class="subtitle">Make your a Pak Purza Machine</h6>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="app_parts ">
                                              <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-apple app-icon "></i> Apple Store
                                              </button>
                                              <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-android app-icon"></i> Google Play
                                              </button>
                                              <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-windows app-icon"></i> Windows
                                                Store </button>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- Row  -->
                                        </div>
                                      </section>
                                      <!-- End App_Store -->
                                      
                                      
                                      <!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title">Login to PakPurza</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><img
  src="frontend/images/close.png" alt="Pak Purza"></span> </button>
  </div>
  <div class="modal-body">
  <form method="POST" action="{{ route('login') }}">
      @csrf
          <div class="list-unstyled list-inline social-login">
          <a href="{{url('login/facebook')}}" class="facebook"> <img src="frontend/images/fb.png" alt="Pak Purza">Continue wiith Facbook</a>
          <a href="{{url('login/google')}}" class="google"> <img src="frontend/images/google_p.png" alt="Pak Purza"> <span>Continue with
          Google</span></a>
          <a href="{{url('login/apple')}}" class="google mt-3"> <img src="frontend/images/apple.png" alt="Pak Purza">Continue with Apple</a>
          </div>
          <div class="or-divider">
          <h6>or</h6>
          </div>
          <div class="row">
          <div class="col-sm-12">
          <div class="form-group has-feedback">
          <input type="text" class="form-control" name="email" placeholder="Email/Username">
          </div>
          </div>
          <div class="col-sm-12">
          <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          </div>
          </div>
            <div class="g-recaptcha" data-sitekey="your_site_key"></div>
             <br>
             <script src="https://www.google.com/recaptcha/api.js"></script>
            <div class="form-group">
         <button type="submit" class="buttons login_btn" name="login" value="Login">
      Continue
      </button>
      </div>
            <div class="form-info">
        <div class="md-checkbox">
  <input type="checkbox" name="rememberme" id="rememberme" value="forever">
  <label for="rememberme" class="">Remember me</label>
  </div>
         <div class="forgot-password">
  <a href="forgotpassword.html">Forgot password?</a>
  </div>
  </div>
      </from>
      </div>
      <div class="register text-center">Not a member yet? <a href="{{route('register')}}" data-toggle="modal"
      data-target="#register">Register</a></div>
  </div>
  </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title">Register to PakPurza</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><img
  src="frontend/images/close.png" alt="Pak Purza"></span> </button>
  </div>
  <div class="modal-body">
  <form method="POST" action="{{ route('register') }}">
     @csrf
  <div class="list-unstyled list-inline social-login">
    <a href="{{url('login/facebook')}}" class="facebook"> <img src="frontend/images/fb.png" alt="Pak Purza">Continue wiith Facbook</a>
  <a href="{{url('login/google')}}" class="google"> <img src="frontend/images/google_p.png" alt="Pak Purza"> <span>Continue with
  Google</span></a>
  <a href="{{url('login/apple')}}" class="google mt-3"> <img src="frontend/images/apple.png" alt="Pak Purza">Continue with Apple</a>
  </div>
  <div class="or-divider">
  <h6>or</h6>
  </div>

  <div class="row">
  <div class="col-sm-12">
  <div class="form-group has-feedback">
  <input  type="text" class="form-control" name="name" placeholder="Username">
  </div>
  </div>
  <div class="col-sm-12">
  <div class="form-group has-feedback">
  <input type="text" class="form-control" name="name" placeholder="Name">
  </div>
  </div>
  <div class="col-sm-12">
  <div class="form_group has-feedback ">
  <input style="width: 330px;" type="tel" id="txtPhone1" name="phone_no " class="form-control" placeholder="Number" >
  </div>
  </div>
  <br>
  <br>
  <br>
  <div class="col-sm-12">
  <div class="form-group has-feedback">
  <input type="Email" class="form-control" id="Email" name="email" placeholder="Email">
  </div>
  </div>
  
  <div class="col-sm-12">
  <div class="form-group has-feedback">
  <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  </div>
  
  <div class="col-sm-12">
  <div class="form-group has-feedback">
  <input type="password" class="form-control" id="Confirm_password" name="password_confirmation"
  placeholder="Confirm Password">
  <br>
  <div class="g-recaptcha" data-sitekey="your_site_key"></div>
  
  
  <script src="https://www.google.com/recaptcha/api.js"></script>
  </div>
  </div>
  
  </div>
  <div class="form-group">
  <button type="submit" class="buttons login_btn" name="login" value="Login">
  Continue
  </button>
  </div>
  <div class="form-check d-flex mb-4">
  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
  <label class="form-check-label" for="form2Example33">
  I Agree With Terms And Conditions Of PakPurza
  </label>
  </div>
   </from>
  </div>
 
  <div class="register text-center">Already a member? <a href="{{ route('login')}}">Login</a></div>
  </div>
  </div>
  </div>
  <!-- End Header  -->
                                      

@endsection
