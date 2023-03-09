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
    <h1 class="title">All Products</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="04-Category-Page.html">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <a href="09-Listing_left-sidebar-Page.html"> All Products Page</a></li>
        <li class="breadcrumb-item"><a href="brandchildpage.html">Brand Child Page</a></li>
        
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 

<!-- listing_left_sidebar -->
<section class="top_listings">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center">
  <div class="col-md-7 text-center">
    <h2 class="title">Select one of the best listings</h2>
    <h6 class="subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6>
  </div>
</div>
<!-- Row  -->


<div class="row m-t-40 margin_top">
<div class="col-md-3 col-sm-12 col-xs-12">
    <div class="sidebar-wrapper">
      <div class="single-sidebar">
        <form class="search-form" action="#">
          <input placeholder="Keywords" type="text">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>
      <div class="single-sidebar">
        <div class="sec-title">
          <h3 class="all-categories">All Category</h3>
          <ul class="categories clearfix slide">
            <li><a href="#">Vehicles (1029)</a></li>
            <li><a href="#">Electronics (175)</a></li>
            <li><a href="#">Mobiles (1800)</a></li>
            <li><a href="#">Furniture (3129)</a></li>
            <li><a href="#">Fashion (7160)</a></li>
            <li><a href="#">Real Estate (600)</a></li>
            <li><a href="#">Animals (460)</a></li>
            <li><a href="#">Education (540)</a></li>
            <li><a href="#">Baby products (4300)</a></li>
            <li><a href="#">Services (12000)</a></li>
          </ul>
        </div>
        <div class="single-sidebar">
          <div class="sec-title">
            <h3 class="condition mb-2">Condition</h3>
                          <div class="form-group form-check condition-slide">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label text-uppercase">New</label>
          </div>
          <div class="form-group form-check condition-slide">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label text-uppercase">Used</label>
          </div>
          </div>
          
        </div>
        <div class="single-sidebar">
          <div class="sec-title">
            <h3 class="post-by mb-2">Posted By</h3>
                                          <div class="form-group form-check post-slide">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label text-uppercase">Individual</label>
              </div>
              <div class="form-group form-check post-slide">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label text-uppercase">Dealer</label>
              </div>
              <div class="form-group form-check post-slide">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label text-uppercase">Reseller</label>
              </div>
              <div class="form-group form-check post-slide">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label text-uppercase">Manufacturer</label>
              </div>
          </div>
        </div>
        
        <div class="single-sidebar">
          <div class="sec-title">
            <h3 class="price_r mb-2">Price Range</h3>
              <div class="price-range-block">
<div id="slider-range" class="price-filter-range slider-range2"></div>

<div class="m-t-20 m-b-20">
  <input type="text" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
  <input type="text" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field price-range-field2"/>
</div>

</div>
            </div>
            </div>

      </div>
    </div>
                <div class="single-sidebar mt-4">
          <img class="add_img img-fluid" src="images/google_adds1.png" alt="Classified Plus"/>
        </div>
  </div>
<div class="col-md-9 col-sm-12 col-xs-12">   
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 m-b-10">
    <div class="listing-select-parts d-flex justify-content-between">
      <div class="listing-select-head-left d-inline-block">
        <h3> Showing ( 1-12 products of 7,371 products  ) </h3>
      </div>
      <div class="listing-select-head-right d-inline-block ">
        <p class="d-inline-block px-3"> View </p>
        <span class="d-inline-block bars px-2"><a href="#"><i class="fa fa-list"></i></a></span>
        <span class="d-inline-block bars px-2"><a href="#"><i class="fa fa-th"></i></a></span> 
        <div class="sort_by d-inline-block pl-3">
        <form>
          <div class="form-group">
            <select class="form-control">
              <option>Short by</option>
              <option>popular</option>
              <option>prize</option>
              <option>relivante</option>
              <option>offers</option>
            </select>
          </div>
        </form>
        </div> </div>
        </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6"><a href="13-Datile_Without_banner-Page.html">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"><img class="img-fluid rounded-top" src="images/Featured-img-1.png" alt="Classified Plus">
        <div class="featured-new bg_warning1"> <a href="#"> New </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="13-Datile_Without_banner-Page.html">Mobile</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Smartphone for sele</p>
          </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div></a>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <a href="13-Datile_Without_banner-Page.html"><img class="img-fluid rounded-top" src="images/Featured-img-2.png" alt="Classified Plus"> </div></a>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"><a href="13-Datile_Without_banner-Page.html">Fashion</a> </div>
          <div class="book-mark"><a href="#"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Cloth for sele</p>
         </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  
  
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-9.png" alt="Classified Plus">
        
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Vehicles</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Renger cycle for sele</p>
          </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-10.png" alt="Classified Plus"> 
      <div class="discount bg_warning2"> <a href="#"> Opening now </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between">
          <div class="heading"> <a href="#">Job</a> </div>
          <div class="book-mark"><a href="#"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Job for web designer</p>
           </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-11.png" alt="Classified Plus">
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Real Estate</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Luxury house for sele</p>
           </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-13.png" alt="Classified Plus">
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Fashion</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Ladies sandal for sele</p>
         </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-14.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Education</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>New courses for students</p>
         </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-15.png" alt="Classified Plus">
        <div class="discount"> <a href="#"> Discount 30% </a> </div>
        <div class="featured-price"> <a href="#"> $550.00 </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Matrimony</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>jewellery for sele</p>
         </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-16.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Vehicles</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Car BMW for sales</p>
         </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
        
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-18.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Furniture</a> </div>
          <div class="book-mark"><a href="#"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Bed sheet for sele</p>
          </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-19.png" alt="Classified Plus">
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Baby products</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Bed sheet for sele</p>
          </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-12.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Mobile</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Smartphone for sele</p>
          </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-20.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Animals</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Cat for sales</p>
         </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-17.png" alt="Classified Plus">
        <div class="featured-new bg_warning"> <a href="#"> New </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Matrimony</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>jewellery for sele</p>
       </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-4.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Animals</a> </div>
          <div class="book-mark"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Greyhounds Dogs for sales</p>
         </div>
        <div class="featured-bottum m-t-30">
          <ul class="d-flex justify-content-between list-unstyled m-b-20">
            <li><a href="#"></li>
            <li><a href="#"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12">
  <button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button>
  </div>
  <div class="col-md-12">
       <div class="single-sidebar">
          <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus"/>
        </div>
        </div>
</div>
</div>
</div>
</div>
</section>
<!-- End listing_left_sidebar --> 

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


@endsection

@section('scripts')

@endsection