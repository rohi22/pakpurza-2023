@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<!-- banner -->
<section class="banner">
    <div class="banner-innerpage Category_banner">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center"> 
  <!-- Column -->
  <div class="text-center">
    <h1 class="title">Search Results</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="10-search-result-Page.html"> Search Results </a></li>
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
<section class="top_listings">
<div class="top_listings_sec bg-light p-b-35 p-t-0">
<div class="container">
<div class="row">
<form class="top_listings_search">
                
                <div class="form-group selectdiv text-left">
                <label class="mr-sm-2">Location</label>
                  <select class="form-control text-truncate">
                    <option>Pakistan</option>
                    <option>Karachi</option>
                    <option>Lahore</option>
                    <option>Islamabad</option>
                    <option>Faisalabad</option>
                  </select>
                </div>
                <div class="form-group selectdiv text-left">
                <label class="mr-sm-2">Posted By</label>
                  <select class="form-control text-truncate">
                    <option>Posted By</option>
                    <option>Vehicles</option>
                    <option>Electronics</option>
                    <option>Mobiles</option>
                    <option>Furniture</option>
                    <option>Fashion</option>
                    <option>Real Estate</option>
                    <option>Animals</option>
                    <option>Education</option>
                    <option>Baby products</option>
                    <option>Services</option>
                    <option>Furniture</option>
                  </select>
                </div>
                <div class="form-group selectdiv text-left">
                <label class="mr-sm-2">Category</label>
                  <select class="form-control text-truncate">
                    <option>All Categories</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                 <div class="form-group text-left">
                                <p>
              <label for="amount"  class="Price_label2">Price Per Day</label>
              <input id="amount" readonly="readonly" value="$30 - $500" type="text">
            </p>
            <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content bg-secondary">
              
              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
             
            </div>
                </div>
                <div class="form-group text-left text-sm-center text-xs-center">
                <button type="submit" class="btn btn-primary booknow btn-skin "><i class="fa fa-search fa-custom"></i> Search</button></div>
              </form>
</div>
</div>
</div>
<div class="container"> 

<!-- Row  -->
<div class="row justify-content-center">
  <div class="col-md-7 text-center  m-b-10">
    <h2 class="title">The best listings</h2>
  </div>
</div>
<!-- Row  -->

<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-1.png" alt="Classified Plus">
        <div class="featured-new bg_warning1"> <a href="#"> New </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Mobile</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Smartphone for sele</p>
          </div>
      
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-2.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Fashion</a> </div>
          <div class="book-mark"><a href="#"> </a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Cloth for sele</p>
           </div>
       
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-3.png" alt="Classified Plus">
        <div class="discount"> <a href="#"> Discount 30% </a> </div>
        <div class="featured-price"> <a href="#"> $550.00 </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Matrimony</a> </div>
          <div class="book-mark"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>jewellery for sele</p>
           </div>
        
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-4.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Animals</a> </div>
          <div class="book-mark"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Greyhounds Dogs for sales</p>
          </div>
       
      </div>
    </div>
  </div>
  
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-9.png" alt="Classified Plus">
        
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Vehicles</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Renger cycle for sele</p>
          </div>
     
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-10.png" alt="Classified Plus"> 
      <div class="discount bg_warning2"> <a href="#"> Opening now </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Job</a> </div>
          <div class="book-mark"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Job for web designer</p>
        </div>
       
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-11.png" alt="Classified Plus">
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Real Estate</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Luxury house for sele</p>
         </div>
       
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-12.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Mobile</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Smartphone for sele</p>
         </div>
        
      </div>
    </div>
  </div>
  
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-13.png" alt="Classified Plus">
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Fashion</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Ladies sandal for sele</p>
         </div>
        
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-14.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Education</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>New courses for students</p>
          </div>
        
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-15.png" alt="Classified Plus">
        <div class="discount"> <a href="#"> Discount 30% </a> </div>
        <div class="featured-price"> <a href="#"> $550.00 </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Matrimony</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>jewellery for sele</p>
         </div>
       
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-16.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Vehicles</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Car BMW for sales</p>
        </div>
       
      </div>
    </div>
  </div>
  
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-17.png" alt="Classified Plus">
        <div class="featured-new bg_warning"> <a href="#"> New </a> </div>
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Matrimony</a> </div>
          <div class="book-mark"><a href="#"></div>
        </div>
        <div class="text-stars m-t-5">
          <p>jewellery for sele</p>
          </div>
       
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-18.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Furniture</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Bed sheet for sele</p>
          </div>
       
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-19.png" alt="Classified Plus">
      </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Baby products</a> </div>
          <div class="book-mark"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Bed sheet for sele</p>
         </div>
       
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="featured-parts rounded m-t-30">
      <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-20.png" alt="Classified Plus"> </div>
      <div class="featured-text">
        <div class="text-top d-flex justify-content-between ">
          <div class="heading"> <a href="#">Animals</a> </div>
          <div class="book-mark"><a href="#"></a></div>
        </div>
        <div class="text-stars m-t-5">
          <p>Cat for sales</p>
         </div>
        
      </div>
    </div>
  </div>
  <button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button>
</div>
<div class="row">
<div class="col-md-12">
       <div class="single-sidebar m-b-50 text-center">
          <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus">
        </div>
        </div>
        </div>
</div>
</section>
<!-- End Categories --> 

<!-- App_Store -->
<section class="app_store">
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