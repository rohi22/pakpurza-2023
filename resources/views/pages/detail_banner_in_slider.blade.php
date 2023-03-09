@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<!-- banner -->
<section class="banner slider_datile">
    <div class="slider-innerpage">
      <ul class="owl-carousel list-unstyled m-b-0" id="datile_slider">
        <li> <img class="img-fluid" src="images/detail3.png" alt="slide 1"> </li>
        <li> <img class="img-fluid" src="images/detail4.png" alt="slide 2"> </li>
        <li> <img class="img-fluid" src="images/detail5.png" alt="slide 3"> </li>
        <li> <img class="img-fluid" src="images/detail3.png" alt="slide 4"> </li>
        <li> <img class="img-fluid" src="images/detail4.png" alt="slide 5"> </li>
        <li> <img class="img-fluid" src="images/detail5.png" alt="slide 6"> </li>
      </ul>
    </div>
    <div class="banner_bottum">
      <div class="container d-flex justify-content-between">
        <div class="detail_left">
          <ul class="list-unstyled text-white">
            <li class="d-inline-block"><i class="fa fa-map-marker"></i> East 7th street 98 </li>
            <li class="d-inline-block ml-3"><i class="fa fa-phone"></i> +91 (0) xxxxxxxx33 </li>
          </ul>
        </div>
        <div class="detail_right">
          <button class="d-inline-block save text-capitalize border-0" type="submit" value="button"><i class="fa fa-heart-o"></i> save </button>
          <button class="d-inline-block shair text-capitalize border-0" type="submit" value="button"><i class="fa fa-share-alt"></i> shair </button>
        </div>
      </div>
    </div>
    <div class="slider_datile_heding">
      <div class="container"> 
        <!-- Row  -->
        <div class="row justify-content-center "> 
          <!-- Column -->
          <div class="text-center">
            <h1 class="title">Detail</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="14-Datile_banner_in_slider-Page.html"> Detail </a></li>
              </ol>
            </nav>
          </div>
          <!-- Column --> 
        </div>
      </div>
    </div>
  </section>
  <!-- End banner -->
  
  <section class="detail_part m-t-50">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="detail_box"> <img class="img-fluid" src="images/iphone_6s.png" alt="Classified Plus">
            <div class="m-t-20">
              <ul class="owl-carousel list-unstyled m-b-0" id="product_slider">
                <li> <img class="img-fluid" src="images/slider-1.png" alt="slide 1"> </li>
                <li> <img class="img-fluid" src="images/slider-2.png" alt="slide 2"> </li>
                <li> <img class="img-fluid" src="images/slider-3.png" alt="slide 3"> </li>
                <li> <img class="img-fluid" src="images/slider-4.png" alt="slide 4"> </li>
                <li> <img class="img-fluid" src="images/slider-5.png" alt="slide 5"> </li>
                <li> <img class="img-fluid" src="images/slider-2.png" alt="slide 6"> </li>
                <li> <img class="img-fluid" src="images/slider-3.png" alt="slide 7"> </li>
                <li> <img class="img-fluid" src="images/slider-4.png" alt="slide 8"> </li>
                <li> <img class="img-fluid" src="images/slider-2.png" alt="slide 9"> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="detail_box">
            <div class="detail_head">
              <h3> Apple iPhone 6S (Space Gray, 16 GB)<br>
                Good Condition </h3>
              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
              <div class="detail_saller m-t-15">
                <h4 class="text-uppercase p-b-10">saller</h4>
                <ul class="list-unstyled p-0 m-b-0">
                  <li class="d-inline-block">
                    <h5 class="text-uppercase text-white">a<span class="dot"></span></h5>
                  </li>
                  <li class="d-inline-block">
                    <h6 class="text-capitalize">Aditya </h6>
                    <p> +91 (0) xxxxxxxx33 </p>
                  </li>
                  <li class="d-inline-block">
                    <h6>location </h6>
                    <p> Est 7th street 98 block </p>
                  </li>
                  <li class="d-inline-block">
                    <h6>Ad Updated </h6>
                    <p> 20 days ago </p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div>
          <div class="detail_left_box d-inline-block">
            <ul class="list-unstyled d-inline-block float-left detail_left">
              <li>Handset color :</li>
              <li>Primary Camera :</li>
              <li>Processor :</li>
            </ul>
            <ul class="list-unstyled d-inline-block m-l-40 detail_right">
              <li>Black</li>
              <li>13 MP</li>
              <li>1.56 GHz</li>
            </ul>
          </div>
          <div class="detail_right_box d-inline-block">
            <ul class="list-unstyled d-inline-block detail_left">
              <li>Screen Size :</li>
              <li>Internal Memory :</li>
            </ul>
            <ul class="list-unstyled d-inline-block m-l-40 detail_right">
              <li>5.5 Inches</li>
              <li>6 GB</li>
            </ul>
          </div>
          </div>
          <div class="detail_prize p-t-0 text-left">
            <ul class="list-unstyled">
              <li class="d-inline-block pr-3"> Deal Price Price : </li>
              <li class="d-inline-block Price_m"> $950.00 </li>
            </ul>
          </div>
          <div class="detail_btn d-flex m-t-20">
           <a href="checkout.html"> <button class="btn_chat w-100 text-white mr-3 py-2 border-0" type="submit" value="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Now</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Related Ads -->
  <section class="description">
    <div class="container"> 
      
      <!-- Row  -->
      <div class="row justify-content-left">
        <div class="col-md-7 text-left">
          <h2 class="title">Description</h2>
        </div>
      </div>
      <!-- Row  -->
      
      <div class="row">
        <div class="col-md-9">
          <div class="description_box">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
            <p>Condition 10/10 White color 32gb internal memory 3gb RAM Model SM-N9005 (4G/LTE) All accessories (box, hands-free, charger, data cable)
              Not refurb, Not copy, original samsung phone</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="single-sidebar"> <img class="add_img img-fluid" src="images/google_adds2.png" alt="Classified Plus"> </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Related Ads --> 
  
  <!-- Top_listings -->
  <section class="top_listings">
    <div class="container"> 
      
      <!-- Row  -->
      <div class="row justify-content-center">
        <div class="col-md-7 text-center m-b-10">
          <h2 class="title">Related Ads</h2>
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
                <div class="book-mark"><a href="#"></a></div>
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
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-4.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Animals</a> </div>
                <div class="book-mark"><a href="#"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Greyhounds Dogs for sales</p>
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
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-19.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Baby products</a> </div>
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
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="single-sidebar m-b-50 m-t-50 text-center"> <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus"> </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End top_listings -->  
  

@endsection

@section('scripts')

@endsection