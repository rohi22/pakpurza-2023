@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

  <!-- breadcrumb -->
  <div class="iner_breadcrumb bg-light p-t-20 p-b-20">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> <a href="23-Boost-Your-Ad-Page.html"> Boost Your Ad </a></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->

  <!-- Dashboard_sec -->
  <section class="dashboard_sec m-t-50">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="dashboard_menu">
            <div class="dashbord_img">
              <div class="dashboard_back"> <img class="img-fluid w-100" src="images/dash-background.png"
                  alt="Classified Plus"> </div>
              <div class="rounded_img"> <img class="img-fluid" src="images/aditya.png" alt="Classified Plus"> </div>
              <div class="aditya">aditya</div>
            </div>
            <ul class="list-unstyled  m-t-20">
              <li><span><i class="fa fa-sliders"></i></span><a href="17-Dashboard-Page.html"> Dashboard </a></li>
              <li><span><i class="fa fa-cog"></i></span><a href="18-Profile-Page.html"> Profile Settings </a></li>
              <li><span><i class="fa fa-database"></i></span><a href="19-My_Ads-Page.html"> My Ads </a></li>
              <li><span><i class="fa fa-envelope"></i></span><a href="22-Offers_Messages-Page.html"> Offers/Messages
                </a></li>
              <li class="active"><span><i class="fa fa-shopping-cart"></i></span><a href="23-Boost-Your-Ad-Page.html">
                  Boost Your Ad </a></li>
              <li><span><i class="fa fa-shopping-cart"></i></span><a href="23-Payments-Page.html"> Payments </a></li>
              <li><span><i class="fa fa-heart"></i></span><a href="24-My_Favorits-Page.html"> My Favourites </a></li>
              <li><span><i class="fa fa-star"></i></span><a href="25-Prvacy_settings-Page.html"> Privacy Settings </a>
              </li>
              <li><span><i class="fa fa-sign-in"></i></span><a href="#"> Logout </a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="dashboard_profile_main">
            <div class="dashboard_heding">
              <h3> </h3>
            </div>
          </div>
          <!-------- Boost ad Main Content start -------->
          <div class="text-center container mt-5">
            <h1 class="text-dark">Choose one of our Featured Plans that's right for your business</h1><span
              class="text-dark"><br><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and
              typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
              an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived
              not only five centuries<br><br></span>
            <div class="row d-flex justify-content-center">
              <div class="col-md-3">
                <div class="text-center bg-white border p-3 table-pricing">
                  <h5 class="text-uppercase">Product Detail Package</h5>
                  <h1>PKR50</h1><span class="d-block">/Month</span><span>0-50000 pageviews</span><a href="boostDETAIL.html"><button
                    class="btn btn-outline-primary btn-block mt-4" type="button">Boost Now</button></a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center bg-white  border p-3 table-pricing">
                  <h5 class="text-uppercase">Child Category Package</h5>
                  <h1>PKR100</h1><span class="d-block">/Month</span><span>0-50000 pageviews</span><a href="boostDETAIL.html"><button
                    class="btn btn-outline-primary btn-block mt-4" type="button">Boost Now</button></a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center bg-white  border p-3 table-pricing">
                  <h5 class="text-uppercase">Child Brand  Page <br>  Package</h5>
                  <h1>PKR100</h1><span class="d-block">/Month</span><span>0-50000 pageviews</span><a href="boostDETAIL.html"><button
                    class="btn btn-outline-primary btn-block mt-4" type="button">Boost Now</button></a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center bg-white  border p-3 table-pricing">
                  <h5 class="text-uppercase">GROWTH YOUR BUSINESS  PACKAGE</h5>
                  <h1>PKR100 </h1><span class="d-block">/Month</span><span>0-50000 pageviews</span><a href="boostDETAIL.html"><button
                    class="btn btn-outline-primary btn-block mt-4" type="button" >Boost Now</button></a>
                </div>
              </div>
            </div>
            <div class="row mb-5  d-flex justify-content-center">
              <div class="col-md-3">
                <div class="text-center bg-white border p-3 table-pricing">
                  <h5 class="text-uppercase">Pro</h5>
                  <h1>PKR200</h1><span class="d-block">/Month</span><span>0-50000 pageviews</span><a href="boostDETAIL.html"><button
                    class="btn btn-outline-primary btn-block mt-4" type="button">Boost Now</button></a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center bg-white border p-3 table-pricing">
                  <h5 class="text-uppercase">Enterprise</h5>
                  <h1>Custom</h1><span class="d-block">/Month</span><span>0-50000 pageviews</span><a href="boostDETAIL.html"><button
                    class="btn btn-outline-primary btn-block mt-4" type="button">Boost Now</button></a>
                </div>
              </div>
            </div>
          </div>

          <!-------- Boost ad Main Content end -------->
        </div>
        </form>
      </div>
    </div>
    </div>
    </div>
    </div>
  </section>
  <!-- End Dashboard_sec -->

@endsection

@section('scripts')

@endsection