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
          <li class="breadcrumb-item active" aria-current="page" > <a href="20-Post_Ad-Page.html">Post Your Ad</a> </li>
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
              <li class="active"><span><i class="fa fa-database"></i></span><a href="19-My_Ads-Page.html"> My Ads </a></li>
              <li><span><i class="fa fa-envelope"></i></span><a href="22-Offers_Messages-Page.html"> Offers/Messages </a></li>
              <li><span><i class="fa fa-shopping-cart"></i></span><a href="23-Boost-Your-Ad-Page.html"> Boost Your Ad </a></li>
              <li><span><i class="fa fa-shopping-cart"></i></span><a href="23-Payments-Page.html"> Payments </a></li>
              <li><span><i class="fa fa-heart"></i></span><a href="24-My_Favorits-Page.html"> My Favourites </a></li>
              <li><span><i class="fa fa-star"></i></span><a href="25-Prvacy_settings-Page.html"> Privacy Settings </a></li>
              <li><span><i class="fa fa-sign-in"></i></span><a href="#"> Logout </a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="dashboard_profile_main">
            <div class="dashboard_heding">
              <h3> Post Your Ad </h3>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-7">
              <div class="profile_detail">
                <h3>Ad detail </h3>
                <form>
                  <div class="form-group">
                    <label> <b>Product Title*</b> </label>
                    <input type="text"  class="form-control" placeholder="Title">
                  </div>
                  <div class="form-group selectdiv">
                    <label><b> Select Category*</b> </label>
                    <select class="form-control">
                      <option>Select a Category</option>
                      <option>Machines and Products</option>
                      <option>Spare Parts</option>
                      <option>Tools</option>
                      <option>Safety And Firefighting</option>
                      <option>Lift Elevators And Escalators</option>
                      <option>HVAC  </option>
                    </select>
                  </div>
                  <div class="form-group selectdiv">
                    <label> <b> Select Sub Category*</b> </label>
                    <select class="form-control">
                      <option>Sugar Industry</option>
                      <option>Automotive And Transportation</option>
                      <option>Tools</option>
                      <option>Safety And Firefighting</option>
                      <option>Lift Elevators And Escalators</option>
                      <option>HVAC  </option>
                    </select>
                  </div>
                  <form>
                    <div class="form-group">
                      <label> <b> Brand </b> </label>
                      <input type="text"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="textAreaExample"> <b> Description* </b> </label>
                      <textarea class="form-control" id="textAreaExample" rows="4"></textarea>                   
                    </div>              
                    <div class="img_browse">
                      <label> <b> Photos for your Ad </b> </label>
                      <div class="form-group">
                        <div class="tg-fileuploadlabel">
                          <label>Please add images of your ad</label>
                          <button class="form-control-file text-capitalize" type="submit" value="button">Select Files</button>
                          <span>Maximum upload file size: 500 KB</span> </div>
                      </div>
                    </div>
                    <div class="form-group selectdiv">
                      <label> <b> Country </b>  </label>
                      <select class="form-control">
                        <option>Pakistan</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </select>
                    </div>
                    <div class="form-group selectdiv">
                      <label> <b> City </b>  </label>
                      <select class="form-control">
                        <option>Karachi</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </select>
                    </div>
            
                
                <form action="?" method="POST">
                  <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                  <br/>
                 
                  <script src="https://www.google.com/recaptcha/api.js"></script>
                </form>
                </form>
            
                 
                  <center>
                  <button class="change_btn mt-2 text-capitalize" type="submit" value="button">Submit</button>
                </center>
                <br>
                <br>
                <br>
              <br>
                </form>
              </div>
            </div>
           
            <div style="margin-top: 40px;" class="col-md-5">
              <div class="change_password">
                <form>
                  <div class="form-group">
                      <label><b> Condition</b> </label>                  
                    </div>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">New</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">Used</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option3">
                      <label class="form-check-label" for="inlineRadio3">Surplus</label>
                    </div>
                    <div class="form-group">
                      <label> <b>Availability</b> </label>                  
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option1">
                      <label class="form-check-label" for="inlineRadio4">Ready Stock</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option2">
                      <label class="form-check-label" for="inlineRadio5">Within One Week</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option3">
                      <label class="form-check-label" for="inlineRadio6">More Than One Week</label>
                    </div>
                    <div class="form-group">
                      <label> <b> Unit Price* </b> </label>
                      <input type="text"  class="form-control">                   
                    </div>
                    <div class="form-group selectdiv">
                      <label> <b>  Select Currency* </b>  </label>
                      <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </select>
                    </div>
                    <label> <b> Price Validity (Valid Till) </b> </label>
                    <div class="form-group">
                      <div class="date" id="date" data-target-input="nearest">
                        <input type="date" class="form-control border-0 datetimepicker-input" placeholder="Choose Date">
                      </div>
                      <div class="form-group">
                          <label> <b> Whatsapp No. </b> </label>
                          <input type="number"  class="form-control">                   
                        </div>
                        <div class="form-group">
                          <label> <b> Email </b> </label>
                          <input type="email"  class="form-control">                   
                        </div>
                       
                  <button class="change_btn mt-2 text-capitalize" type="submit" value="button">Post AD</button>
                </form>
          
             
              </div>
            </div>
          </div>
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