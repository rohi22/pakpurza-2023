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
            <h1 class="title">Help & Support</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="05-Help-and-Support-Page.html"> Help & Support </a></li>
              </ol>
            </nav>
          </div>
          <!-- Column -->
        </div>
      </div>
    </div>
  </section>
  <!-- End banner -->

  <!-- Help Form Start -->

  <section id="Contact_form">
    <div class="container">
      <div class="contacts_bottom">
        <div class="row">
          <div class="col-lg-9 col-md-9 feature_box single-blog-post">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-left">
                <h2 class="title">Help & Support Form</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
               <div class="row">
                <div class="col-md-12">
                  <form method="post" class="m-t-40">
                    <div class="row">
                      <div class="form-group col-md-4 col-sm-12 col-xs-12">
                        <input class="form-control" id="name" name="name" placeholder="Full Name" type="text">
                      </div>
                      <div class="form-group col-md-4 col-sm-12 col-xs-12">
                        <input class="form-control" name="Email" placeholder="Email" type="text">
                      </div>
                      <div class="form-group col-md-4 col-sm-12 col-xs-12">
                        <input class="form-control" id="Subject" name="Subject" placeholder="Subject" type="text">
                      </div>
                      <div class="form-group col-md-4 col-sm-12 col-xs-12">
                        <input class="form-control" id="name" name="name" placeholder="Cell Number" type="number">
                      </div>
                      <div class="form-group col-md-4 col-sm-12 col-xs-12">
                        <input class="form-control" name="Email" placeholder="Country" type="text">
                      </div>
                      <div class="form-group col-md-4 col-sm-12 col-xs-12">
                        <input class="form-control" id="Subject" name="Subject" placeholder="City" type="text">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group">
                          <textarea class="form-control" rows="6" placeholder="Message"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary btn-skin" name="submit" type="submit"> SUBMIT NOW</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 feature_box">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-left">
                <h2 class="title">Get In Touch</h2>
                
              </div>
            </div>
            <div class="row m-t-30">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-md-12  col-sm-12">
                  <p class=" subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-map-marker" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Address : </h5>
                          <p class="m-t-10">Level 13, 2 Elizabeth St,
                            Lorem Ipsum is simply dummy text </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-envelope-o" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Have any questions? </h5>
                          <p class="m-t-10">Support@themes.com</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Call us &amp; Hire us </h5>
                          <p class="m-t-10"> +01 (0) 23456 7891</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-fax" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Have any questions? </h5>
                          <p class="m-t-10">Support@themes.com</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- Help Form End -->

  <!-- App_Store -->
  <section class="app_store m-t-50">
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