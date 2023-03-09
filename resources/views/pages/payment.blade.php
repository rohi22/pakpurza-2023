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
          <li class="breadcrumb-item active" aria-current="page"> <a href="23-Payments-Page.html"> Payments </a></li>
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
              <div class="dashboard_back"> <img class="img-fluid w-100" src="images/dash-background.png" alt="Classified Plus"> </div>
              <div class="rounded_img"> <img class="img-fluid" src="images/aditya.png" alt="Classified Plus"> </div>
              <div class="aditya">aditya</div>
            </div>
            <ul class="list-unstyled  m-t-20">
              <li><span><i class="fa fa-sliders"></i></span><a href="17-Dashboard-Page.html"> Dashboard </a></li>
              <li><span><i class="fa fa-cog"></i></span><a href="18-Profile-Page.html"> Profile Settings </a></li>
              <li><span><i class="fa fa-database"></i></span><a href="19-My_Ads-Page.html"> My Ads </a></li>
              <li><span><i class="fa fa-envelope"></i></span><a href="22-Offers_Messages-Page.html"> Offers/Messages </a></li>
              <li><span><i class="fa fa-shopping-cart"></i></span><a href="23-Boost-Your-Ad-Page.html"> Boost Your Ad </a></li>
              <li class="active"><span><i class="fa fa-shopping-cart"></i></span><a href="23-Payments-Page.html"> Payments </a></li>
              <li><span><i class="fa fa-heart"></i></span><a href="24-My_Favorits-Page.html"> My Favourites </a></li>
              <li><span><i class="fa fa-star"></i></span><a href="25-Prvacy_settings-Page.html"> Privacy Settings </a></li>
              <li><span><i class="fa fa-sign-in"></i></span><a href="#"> Logout </a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="dashboard_profile_main">
            <div class="dashboard_heding">
              <h3> Payments </h3>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-6">
              <div class="profile_detail">
                <h3>Plan - Remaining Listing </h3>
                <form>
                  <div class="form-group selectdiv">
                    <label>Modify Your Plan? </label>
                    <select class="form-control">
                      <option>Basic</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group selectdiv">
                    <label>Proceed with </label>
                    <select class="form-control">
                      <option>Proceed with PayPal</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <button class="change_btn mt-2 text-capitalize" type="submit" value="button">Update Plan</button>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <div class="change_password">
                <h3>Already registered?</h3>
                <form>
                  <div class="form-group">
                    <label>Pleace login below</label>
                    <input type="text"  class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="text"  class="form-control m-t-30" placeholder="password">
                  </div>
                  <button class="change_btn mt-2 text-capitalize" type="submit" value="button">Login</button>
                </form>
              </div>
            </div>
          </div>
          <div class="row mt-4 mb-5">
            <div class="payment_forms">
              <div class="col-md-12">
                <h3>Credit / Debit Card </h3>
              </div>
              <form>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6 col-lg-4  col-sm-6">
                      <div class="form-group">
                        <label>Card Number</label>
                        <input type="tel" class="form-control" placeholder="Valid Card Number" />
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-5  col-sm-6">
                      <div class="row">
                        <label class="p-l-15">Expiration Date (MM/YYYY)</label>
                        <div class="col-md-6  col-sm-6">
                          <div class="form-group">
                            <input type="tel" class="form-control" placeholder="12" />
                          </div>
                        </div>
                        <div class="col-md-6  col-sm-6">
                          <div class="form-group">
                            <input type="tel" class="form-control" placeholder="2025" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-3  col-sm-12">
                      <div class="form-group">
                        <label>CVC</label>
                        <input type="tel" class="form-control" placeholder="123" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12  col-lg-12 col-sm-12">
                      <div class="form-group">
                        <label>Name On Card</label>
                        <input type="text"  class="form-control" placeholder="Say Less Do More">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-lg-4  col-sm-6">
                      <div class="form-group">
                        <label>Card holder name</label>
                        <input type="text"  class="form-control" placeholder="Wisconsin">
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-4  col-sm-6">
                      <div class="form-group">
                        <label>Card holder's City</label>
                        <input type="text"  class="form-control" placeholder="Wisconsin">
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-4  col-sm-12">
                      <div class="form-group selectdiv">
                        <label>Card holder's Country </label>
                        <select class="form-control">
                          <option>United States (US)</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6  col-sm-6">
                      <div class="form-group">
                        <label>Card holder's Email</label>
                        <input type="text"  class="form-control" placeholder="example@gmail.com">
                      </div>
                    </div>
                    <div class="col-md-6  col-sm-6">
                      <div class="form-group">
                        <label>Card holder's Phone</label>
                        <input type="text"  class="form-control" placeholder="123456789">
                      </div>
                    </div>
                  </div>
                       
                  <form action="?" method="POST">
                    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                    <br/>
                   
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                  </form>
              
                
                </form>
                  <div class="row">
                    <div class="col-md-12  col-sm-12">
                      <button class="change_btn mt-2 text-capitalize m-b-0" type="submit" value="button">Save Card</button>
                    </div>
                  </div>
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