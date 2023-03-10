@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="iner_breadcrumb p-t-20 p-b-20">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="12-Datile_banner-Page.html">Detail</a></li>
          <li class="breadcrumb-item active" aria-current="page"> <a href="singleadduplicate.html"> Mobile</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->
  
  <!-- Detail_part -->
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
              <ul class="list-unstyled text-capitalize m-b-0 m-t-15">
                <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-clock-o"></i> <span> 7 Jan, 17 10:10 pm </span></a> </li>
                <li class="d-inline-block p-r-20"><a href="#"> <i class="fa fa-tags"></i><span> new </span></a> </li>
                <li class="d-inline-block"><a href="#"> <i class="fa fa-eye"></i> <span> view </span> </a> </li>
              </ul>
            </div>
            <ul class="list-unstyled d-inline-block float-left detail_left m-b-0">
              <li>Handset color :</li>
              <li>Primary Camera :</li>
              <li>Processor :</li>
              <li>Screen Size :</li>
              <li>Internal Memory :</li>
            </ul>
            <ul class="list-unstyled d-inline-block m-l-40 detail_right  m-b-0">
              <li>Black</li>
              <li>13 MP</li>
              <li>1.56 GHz + 1.82 GHz</li>
              <li>5.5 Inches</li>
              <li>6 GB</li>
            </ul>
            <div class="detail_bottum m-t-15">
              <div class="row">
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 col-12">
                  <div class="form-check">
                    <input class="form-check-input" value="" type="checkbox">
                    <label class="form-check-label"> </label>
                    <img src="images/warrenty.png" alt="Classified Plus">
                    <div class="warranty d-inline-block">Onsite Assure Warranty*<br>
                      $15 (6 months)</div>
                  </div>
                </div>
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 col-12">
                  <div class="form-check">
                    <input class="form-check-input" value="" type="checkbox">
                    <label class="form-check-label"> </label>
                    <img src="images/insurance.png" alt="Classified Plus">
                    <div class="warranty d-inline-block">SyncNscan Insurance (12 mon.)<br>
                      For just $50</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="detail_prize p-t-10">
              <ul class="list-unstyled">
                <li class="d-inline-block pr-3"> Deal Price Price : </li>
                <li class="d-inline-block Price_m"> $950.00 </li>
              </ul>
            </div>
            <div class="detail_btn d-flex m-t-20">
              <button class="btn_chat w-100 text-white mr-3 py-2 border-0" type="submit" value="button">Deactive</button>
              <button class="btn_chat w-100 text-white py-2  border-0" type="submit" value="button">Edit</button>
            </div>
            <div class="detail_btn d-flex m-t-20">
              <button class="btn_chat w-100 text-white mr-3 py-2 border-0" type="submit" value="button">Remove</button>
              <button class="btn_chat w-100 text-white py-2  border-0" type="submit" value="button">Sold</button>
            </div>
  
  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End Description -->
  
  <!-- Description -->
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
  <!-- End Description --> 
  
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
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-2.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Fashion</a> </div>
                <div class="book-mark"></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Cloth for sele</p>
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
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-3.png" alt="Classified Plus">
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
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
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
                  <li><a href="#"> </li>
                </ul>
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
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                  <li><a href="#"></li>
                  <li><a href="#"></li>
                </ul>
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
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                  <li><a href="#"></li>
                  <li><a href="#"> </li>
                </ul>
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
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                  <li><a href="#"></li>
                  <li><a href="#"> </li>
                </ul>
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
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                  <li><a href="#"></a></li>
                  <li><a href="#"></a> </li>
                </ul>
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