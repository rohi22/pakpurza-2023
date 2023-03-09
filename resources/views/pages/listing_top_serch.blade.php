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
            <h1 class="title">All Brands Page</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="04-Category-Page.html">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="08-Listing_Top_serch-Page.html"> All Brands Page </a></li>
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
    <div class="container">
      <!-- Row  -->
      <div class="row justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="title">Select one of the best listings</h2>
        </div>
      </div>

      <!------------------- Category Selectors ------------>
      <div class="row">

        <div class="col-md-3 m-t-30">
          <div class="categories_box"> <a href="#"><img src="images/Categories/categories7.png"
                alt="Classified Plus" /></a>
            <div class="overlay text-center"> <a href="brandchildpage.html"><img src="images/Categories/jobs.png" alt="Classified Plus" />
                <p> job </p>
              </a> </div>
          </div>
        </div>
        <div class="col-md-6 m-t-30">
          <div class="categories_box"> <a href="#"><img src="images/Categories/categories8.png"
                alt="Classified Plus" /></a>
            <div class="overlay text-center"> <a href="brandchildpage.html"><img src="images/Categories/Baby-products.png"
                  alt="Classified Plus" />
                <p> Baby products </p>
              </a> </div>
          </div>
        </div>

        <div class="col-md-3 m-t-30">
          <div class="categories_box"> <a href="#"><img src="images/Categories/categories9.png"
                alt="Classified Plus" /></a>
            <div class="overlay text-center"> <a href="brandchildpage.html"><img src="images/Categories/Services.png"
                  alt="Classified Plus" />
                <p> services </p>
              </a> </div>
          </div>
        </div>
      </div>

      <!-- Row  -->
      <div class="row">
        <form class="top_listings_search">
          <div class="form-group">
            <input class="form-control text-truncate" placeholder="Keywords" type="email">
          </div>
          <div class="form-group selectdiv">
            <select class="form-control text-truncate">
              <option>All categories</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group selectdiv">
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

          <div class="form-group selectdiv">
            <select class="form-control text-truncate">
              <option>Price Range</option>
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
        </form>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6"><a href="09-Listing_left-sidebar-Page.html">
            <div class="featured-parts rounded m-t-30">
              <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-1.png"
                  alt="Classified Plus">
                <div class="featured-new bg_warning1"> <a href="#"> New </a> </div>
              </div>
              <div class="featured-text">
                <div class="text-top d-flex justify-content-between ">
                  <div class="heading"> <a href="09-Listing_left-sidebar-Page.html">Asian Mobiles</a> </div>
                  
                </div>
                <div class="text-stars m-t-5">
                  <p>Smartphone for sele</p>
             
                </div>
                <div class="featured-bottum m-t-30">
                  <ul class="d-flex justify-content-between list-unstyled m-b-20">
                   
                  </ul>
                </div>
              </div>
            </div>
        </div></a>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-2.png"
                alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Fashion</a> </div>
               
              </div>
              <div class="text-stars m-t-5">
                <p>Cloth for sele</p>
               
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-3.png"
                alt="Classified Plus">
              <div class="discount"> <a href="#"> Discount 30% </a> </div>
              <div class="featured-price"> <a href="#"> $550.00 </a> </div>
            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Matrimony</a> </div>
      
              </div>
              <div class="text-stars m-t-5">
                <p>jewellery for sele</p>
                
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-4.png"
                alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Animals</a> </div>
              </div>
              <div class="text-stars m-t-5">
                <p>Greyhounds Dogs for sales</p>
               
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
               
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-9.png"
                alt="Classified Plus">

            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Vehicles</a> </div>
         
              </div>
              <div class="text-stars m-t-5">
                <p>Renger cycle for sele</p>
                
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-10.png"
                alt="Classified Plus">
              <div class="discount bg_warning2"> <a href="#"> Opening now </a> </div>
            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Job</a> </div>
               
              </div>
              <div class="text-stars m-t-5">
                <p>Job for web designer</p>
              
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-11.png"
                alt="Classified Plus">
            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Real Estate</a> </div>
        
              </div>
              <div class="text-stars m-t-5">
                <p>Luxury house for sele</p>
               
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-12.png"
                alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Mobile</a> </div>
         
              </div>
              <div class="text-stars m-t-5">
                <p>Smartphone for sele</p>
              
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-13.png"
                alt="Classified Plus">
            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Fashion</a> </div>
      
              </div>
              <div class="text-stars m-t-5">
                <p>Ladies sandal for sele</p>
               
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-14.png"
                alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Education</a> </div>
      
              </div>
              <div class="text-stars m-t-5">
                <p>New courses for students</p>
                
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-15.png"
                alt="Classified Plus">
              <div class="discount"> <a href="#"> Discount 30% </a> </div>
              <div class="featured-price"> <a href="#"> $550.00 </a> </div>
            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Matrimony</a> </div>

              </div>
              <div class="text-stars m-t-5">
                <p>jewellery for sele</p>
                
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-16.png"
                alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Vehicles</a> </div>
     
              </div>
              <div class="text-stars m-t-5">
                <p>Car BMW for sales</p>
             
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-17.png"
                alt="Classified Plus">
              <div class="featured-new bg_warning"> <a href="#"> New </a> </div>
            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Matrimony</a> </div>
       
              </div>
              <div class="text-stars m-t-5">
                <p>jewellery for sele</p>
                
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-18.png"
                alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Furniture</a> </div>
 
              </div>
              <div class="text-stars m-t-5">
                <p>Bed sheet for sele</p>
           
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-19.png"
                alt="Classified Plus">
            </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Baby products</a> </div>

              </div>
              <div class="text-stars m-t-5">
                <p>Bed sheet for sele</p>
               
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-20.png"
                alt="Classified Plus"> </div>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between ">
                <div class="heading"> <a href="#">Animals</a> </div>

              </div>
              <div class="text-stars m-t-5">
                <p>Cat for sales</p>
               
              </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
     
                </ul>
              </div>
            </div>
          </div>
        </div>
        <button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button>
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
          <h6 class="subtitle">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
            believable.</h6>
        </div>
      </div>
      <!-- Row  -->
      <div class="row">
        <div class="app_parts ">
          <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-apple app-icon "></i> Apple Store
          </button>
          <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-android app-icon"></i> Apple Store
          </button>
          <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-windows app-icon"></i> Apple Store
          </button>
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
          <li data-target="#carouselExampleIndicators2" data-slide-to="0" class=""><img class="testimonial-image"
              src="images/testimonials_2.png" alt="Classified Plus"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="1" class="active"><img class="testimonial-image"
              src="images/testimonials_1.png" alt="Classified Plus"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="2"><img class="testimonial-image"
              src="images/testimonials_3.png" alt="Classified Plus"></li>
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
          </div>
          <div class="carousel-item active">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's<br>
              standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
              to<br>
              make a type specimen book. It has survived not only five centuries, </p>
            <h3>Williams Sherry</h3>
            <h4>User</h4>
          </div>
          <div class="carousel-item">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's<br>
              standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
              to<br>
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