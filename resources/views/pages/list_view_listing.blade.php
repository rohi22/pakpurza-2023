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
            <h1 class="title">Listings</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="11-List_View_Listing-Page.html"> Listings </a> </li>
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
  <section class="list_view_listing">
    <div class="top_listings_sec bg-light p-b-35 p-t-0">
  <div class="container">
  <div class="row">
      <form class="top_listings_search">
                      
                      <div class="form-group selectdiv text-left">
                      <label class="mr-sm-2">Category</label>
                        <select class="form-control text-truncate">
                          <option>All categories</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
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
                          <option>All Condition</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                       <div class="form-group text-left">
                                      <p>
                    <label for="amount"  class="Price_label">Price Per Day</label>
                    <input id="amount" readonly="readonly" value="$30 - $500" type="text">
                  </p>
                  <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    
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
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_mobile.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Mobile</a> </div>
                <div class="book-mark"><a href="#"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Smartphone for sele</p>
                </div>
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
              
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_fashion.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Fashion</a> </div>
                <div class="book-mark"><a href="#"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Cloth for sele</p>
               </div>
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
              
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_matrimony.png" alt="Classified Plus">
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
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
             
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_vehicles.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Vehicles</a> </div>
                <div class="book-mark"><a href="#"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Car BMW for sales</p>
               </div>
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
              
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_furniture.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Furniture</a> </div>
                <div class="book-mark"><a href="#"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Bed sheet for sele</p>
               </div>
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
              
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_real_estate.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Real Estate</a> </div>
                <div class="book-mark"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Luxury house for sele</p>
                </div>
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
             
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_baby_products.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Baby products</a> </div>
                <div class="book-mark"><a href="#"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Bed sheet for sele</p>
                </div>
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
             
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_animals.png" alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Animals</a> </div>
                <div class="book-mark"><a href="#"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Cat for sales</p>
               </div>
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
              
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_job.png" alt="Classified Plus">
              <div class="discount bg_warning2"> <a href="#"> Opening now </a> </div>
            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Job</a> </div>
                <div class="book-mark"><a href="#"></a></div>
              </div>
              <div class="text-stars m-t-5">
                <p>Job for web designer</p>
               </div>
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
              
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="featured-parts rounded m-t-30 d-flex">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/card_matrimony_2.png" alt="Classified Plus">
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
              <p class="m-t-10 featured_font">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
              
            </div>
          </div>
        </div>
        <button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="single-sidebar m-b-50 text-center"> <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus"> </div>
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