@php
$setting = App\Models\WebSetting::first(); 
@endphp


<footer class="footer_all">
  <div class="footer p-t-40">
    <div class="container spacer b-t">
      <div class="row">
        <div class="col-lg-4 col-md-4 m-b-30">
          <h3 class="mb-3"> About Us </h3>
          <p>{{$setting->footer_content}}<a
            href="#">read more</a></p>
            <div class="contact_footer m-t-15">
              <ul class="p-l-0  d-flex">
                <li> <a href="#" class="d-flex"><i class="fa fa-phone mr-2"></i>{{$setting->reach_us_number}}</a></li>
                <li class="p-l-15"><a href="#" class="d-flex"><i class="fa fa-envelope-o mr-2"></i>{{$setting->reach_us_email}}</a>
                </li>
                
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 m-b-30">
            <h3 class="mb-3">Quick Links</h3>
            <div class="d-flex">
              <ul class="w-50 p-0">
                <li><a href="08-Listing_Top_serch-Page.html">Brands</a></li>
                <li><a href="06-News-Page.html">News</a></li>
                <li><a href="Articles2.html">Articles</a></li>
                <li><a href="06-Blog-Page.html">Blogs</a></li>
                <li><a href="06-Forums-Page.html">Forums</a></li>
                <li><a href="04-Events-Page.html">Events</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
              <ul class="w-50 p-0">
                <li><a href="{{ url('about-us')}}">About Us</a></li>
                <li><a href="{{ url('contact')}}">Contact Us</a></li>
                <li><a href="05-About_Us-Page.html">FAQs</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="23-Boost-Your-Ad-Page.html">Boost Your Ad</a></li>
                <li><a href="23-our-ads-plan-Page.html">Our Ads Plan</a></li>
                <li><a href="allads.html">All Ads</a></li>
                
                <li><a href="05-Help-and-Support-Page.html">Get Support</a></li>
                <li><a href="{{ url('privacy-policy')}}">Privacy Policy</a></li>
                <li><a href="{{ url('terms-conditions')}}">Terms and Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 m-b-30">
            <h3 class="mb-3">Let's Stay in Touch</h3>
            <p>We have over 15 years of experience.</p>
            <p>Our support available to help you 24 hours a day, seven days week. </p>
            <div class="input-group m-t-20">
              <input class="form-control bg-light" placeholder="Enter Email" aria-label="Recipient's username"
              type="text">
              <div class="input-group-append">
                <button class="btn btn-outline-primary btn-bg-primary" type="button">SUBMIT <i
                  class="fa fa-check"></i></button>
                </div>
                
              </div>
            </div>
          </div>
          <div class="footer_bootom">
            <div class="row justify-content-center">
              <div class="col-md-6 text-center">
                <div class="footer-logo">      <a href="{{ url('/') }}">@if(!empty($setting))<img src="{{ URL::asset('assets/media/web-settings/'.$setting->logo) }}" class="width-100 " alt="Logo-Simsar" >@endif</a></div>
                <ul class="justify-content-center list-unstyled d-flex p-0 soical-icon m-t-25">
                  <li class="mr-2"><a href="https://www.facebook.com/PakPurza/"><i class="fa fa-facebook-f rounded-circle "></i> </a></li>
                  <li class="mr-2"><a href="https://twitter.com/pakpurza"><i class="fa fa-twitter rounded-circle"></i> </a></li>
                  <li class="mr-2"><a href="https://www.instagram.com/pakpurza/"><i class="fa fa-instagram rounded-circle"></i> </a></li>
                  <li class="mr-2"><a href="https://www.linkedin.com/company/pakpurzaofficial/"><i class="fa fa-linkedin rounded-circle"></i> </a></li>
                  <li class="mr-2"><a href="http://reddit.com/u/pakpurza"><i class="fa fa-reddit rounded-circle"></i> </a></li>
                  <li class="mr-2"><a href="https://www.pinterest.com/pin/867717053177982589/"><i class="fa fa-pinterest rounded-circle "></i> </a></li>
                  <li class="mr-2"><a href="https://www.youtube.com/channel/UC9zHzNYZ2axLUiawZ1HDUIQ/featured"><i class="fa fa-youtube rounded-circle"></i> </a></li></i> </a></li>
                </ul>
                <p class="mt-3 mb-3 copyright">&copy; {{$setting->footer_content_heading}} </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>