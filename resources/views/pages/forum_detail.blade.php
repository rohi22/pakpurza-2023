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
    <h1 class="title">Forum Detail</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="06-Forums-Page.html">Forums</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <a href="07-Forum_Detail-Page.html"> Forum Detail </a></li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 

<!-- Forum_Detail -->
<section id="blog-area" class="blog-with-sidebar-area">
<div class="container">
<div class="row"> 
  <!--Start sidebar Wrapper-->
  <div class="col-md-3 col-sm-12 col-xs-12">
    <div class="sidebar-wrapper">
      <div class="single-sidebar">
        <form class="search-form" action="#">
          <input placeholder="Keywords" type="text">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>
      <div class="single-sidebar">
        <div class="sec-title">
          <h3 class="all-categories">All Category</h3>
          <ul class="categories clearfix slide">
            <li><a href="#">Vehicles (1029)</a></li>
            <li><a href="#">Electronics (175)</a></li>
            <li><a href="#">Mobiles (1800)</a></li>
            <li><a href="#">Furniture (3129)</a></li>
            <li><a href="#">Fashion (7160)</a></li>
            <li><a href="#">Real Estate (600)</a></li>
            <li><a href="#">Animals (460)</a></li>
            <li><a href="#">Education (540)</a></li>
            <li><a href="#">Baby products (4300)</a></li>
            <li><a href="#">Services (12000)</a></li>
          </ul>
        </div>
        <div class="single-sidebar">
          <div class="sec-title">
            <h3 class="d_none">Latest Post</h3>
          </div>
          <ul class="latest-post">
            <li class="d-flex">
              <div class="img-holder icon-space align-self-top"> <img src="images/latest1.png"  alt="Classified Plus"> </div>
              <div class="title-holder"> <a href="#">
                <h5 class="post-title"> Ground on the shore of this on uncharted desert </h5>
                </a>
                <h6 class="post-date"> 5 mins ago </h6>
              </div>
            </li>
            <li class="d-flex">
              <div class="img-holder icon-space align-self-top"> <img src="images/latest2.png"  alt="Classified Plus"> </div>
              <div class="title-holder"> <a href="#">
                <h5 class="post-title"> Ground on the shore of this on uncharted desert </h5>
                </a>
                <h6 class="post-date"> July 10, 2018 </h6>
              </div>
            </li>
            <li class="d-flex">
              <div class="img-holder icon-space align-self-top"> <img src="images/latest3.png"  alt="Classified Plus"> </div>
              <div class="title-holder"> <a href="#">
                <h5 class="post-title"> Ground on the shore of this on uncharted desert </h5>
                </a>
                <h6 class="post-date"> May 12, 2018 </h6>
              </div>
            </li>
          </ul>
        </div>
        <div class="single-sidebar popular-tag">
          <div class="sec-title">
            <h3 class="d_none">Tags</h3>
          </div>
          <ul class="popular-tag m-t-5">
            <li class="d-flex"><a href="#">Blogging</a></li>
            <li class="d-flex"><a href="#">marketing</a></li>
            <li class="d-flex"><a href="#">Crafts</a></li>
            <li class="d-flex"><a href="#">Creativity</a></li>
            <li class="d-flex"><a href="#">Social</a></li>
            <li class="d-flex"><a href="#">Crafting</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--End Sidebar Wrapper-->
  <div class="col-md-9 col-sm-12 col-xs-12">
    <div class="blog-post"> 
      <!--Start single blog post-->
      <div class="single-blog-post">
        <div class="img-holder"> <div class="img_up"><img src="images/Article1.png" alt="Classified Plus"></div>
          <div class="overlay-style-two">26<br>
            February</div>
          <div class="date_more">
            <div class="text-holder">
              <h3 class="blog-title">Lorem ipsum dolor sit amet,</h3>
              <div class="meta-info clearfix">
                <ul class="post-info">
                  <li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Mano</a></li>
                  <li><i class="fa fa-eye" aria-hidden="true"></i><a href="#">95 Views</a></li>
                  <li><i class="fa fa-comment-o" aria-hidden="true"></i> <a href="#">5 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="text m-t-30">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p class="blog_p col-md-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
            <p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est </p>
          </div>
          <div class="blog_post_barr">
            <div class="Share pull-left">
              <ul>
                <li>Share: </li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
              </ul>
            </div>
            <ul class="pager pull-right">
              <li class="previous"> <a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> Prev</a> </li>
              <li class="next"> <a href="#">Next <i class="fa fa-angle-right" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
        <hr>
        <div class="media2">
          <h3 class="panel-heading">About The Author</h3>
          <div class="d-flex"> <img class="media-object icon-space align-self-top" src="images/Article4.png" alt="Classified Plus">
            <div class="media-body">
              <h4 class="media-heading">Mr.John Christopher</h4>
              <p>Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. uni harum quidem sed rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihilares impedit quo repellendus eligendi optio cumque nihilare impedit quo minus id quod maxime.</p>
              <a href="#" class="m-t-15 d-block">Support@Themes.com</a> </div>
          </div>
        </div>
        <hr>
        <div class="container-fluid mt-50">
          <div class="row">
              <div class="col-md-12">
                <h3 class="py-3">Replies</h3>
                  <div class="card mb-4">
                      <div class="card-header">
                          <div class="media flex-wrap w-100 align-items-center"> <img src="https://i.imgur.com/iNmBizf.jpg" class="d-block ui-w-40 rounded-circle" alt="">
                              <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true">Gerrard Peek</a>
                                  <div class="text-muted small">1 days ago</div>
                              </div>
                              <div class="text-muted small ml-3">
                                  <div>Member since <strong>01/10/2022</strong></div>
                                  <div><strong>14</strong> posts</div>
                              </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <p> Very nice, a shiny new discussion forum!
                            I'll try and keep an eye in here and see if I can help out.
                            Glad to see this new section!)
                            Welcome to all aboard!!
                            Have fun, be nice, make friends, play fair.
                          </p>
                      </div>
                      <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                          <div class="px-4 pt-3"> <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-heart text-danger"></i>&nbsp; <span class="align-middle">15</span> </a> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">132</span> </span> </div>
                          <div class="px-4 pt-3"> <button type="button" class="btn btn-primary"><i class="ion ion-md-create"></i>&nbsp; Reply</button> </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="card mb-2">
                    <div class="card-header">
                        <div class="media flex-wrap w-100 align-items-center"> <img src="https://i.imgur.com/iNmBizf.jpg" class="d-block ui-w-40 rounded-circle" alt="">
                            <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true">Tom Harry</a>
                                <div class="text-muted small">13 days ago</div>
                            </div>
                            <div class="text-muted small ml-3">
                                <div>Member since <strong>01/1/2022</strong></div>
                                <div><strong>134</strong> posts</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p> For me, getting my business website made was a lot of tech wizardry things. Thankfully i get an ad on Facebook ragarding commence website. I get connected with BBB team. They made my stunning website live in just 3 days.
                            With the increase demand of online customers. I had to take my business online. BBB Team guided me at each step and enabled me to centralise my work and have control on all aspect of my online business.
                        </p>
                        <p> For me, getting my business website made was a lot of tech wizardry things. Thankfully i get an ad on Facebook ragarding commence website. I get connected with BBB team. They made my stunning website live in just 3 days.
                            With the increase demand of online customers. I had to take my business online. BBB Team guided me at each step and enabled me to centralise my work and have control on all aspect of my online business.
                        </p>
                    </div>
                    <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                        <div class="px-4 pt-3"> <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-heart text-danger"></i>&nbsp; <span class="align-middle">445</span> </a> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">14532</span> </span> </div>
                        <div class="px-4 pt-3"> <button type="button" class="btn btn-primary"><i class="ion ion-md-create"></i>&nbsp; Reply</button> </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <form method="post">
              <h3 class="panel-heading m-t-10 leave_reply">Leave a Reply</h3>
              <div class="row">
                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <input class="form-control" id="name" name="name" placeholder="Full Name" type="text">
                </div>
                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <input class="form-control" id="email" name="Email" placeholder="Email" type="text">
                </div>
                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <input class="form-control" id="Subject" name="Subject" placeholder="Subject" type="text">
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
                <div class="form-group col-md-12 col-sm-12 col-xs-12 m-b-0">
                  <button class="btn btn-primary btn-skin" name="submit" type="submit"> Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>
</div>
</section>
<!-- End Forum_Detail -->

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