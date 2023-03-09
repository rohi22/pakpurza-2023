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
	<h1 class="title">Blog</h1>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.html">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page"><a href="06-Blog-Page.html"> Blog </a></li>
	  </ol>
	</nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 

<!-- blog -->
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
			  <div class="img-holder icon-space align-self-top"> <img src="images/latest1.png"  alt="Pak Purza"> </div>
			  <div class="title-holder"> <a href="#">
				<h5 class="post-title"> Ground on the shore of this on uncharted desert </h5>
				</a>
				<h6 class="post-date"> 5 mins ago </h6>
			  </div>
			</li>
			<li class="d-flex">
			  <div class="img-holder icon-space align-self-top"> <img src="images/latest2.png"  alt="Pak Purza"> </div>
			  <div class="title-holder"> <a href="#">
				<h5 class="post-title"> Ground on the shore of this on uncharted desert </h5>
				</a>
				<h6 class="post-date"> July 10, 2018 </h6>
			  </div>
			</li>
			<li class="d-flex">
			  <div class="img-holder icon-space align-self-top"> <img src="images/latest3.png"  alt="Pak Purza"> </div>
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
		<div class="img-holder"> <div class="img_up"><img src="images/blog1.png"  alt="Pak Purza"></div>
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
			<a class="readmore" href="07-Blog_Detail-Page.html">Continue Reading<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
		</div>
	  </div>
	  <div class="single-blog-post">
		<div class="img-holder"><div class="img_up"> <img src="images/blog2.png"  alt="Pak Purza"></div>
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
			<a class="readmore" href="07-Blog_Detail-Page.html">Continue Reading<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
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
<!-- End blog -->

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