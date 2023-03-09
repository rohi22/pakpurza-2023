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
    <h1 class="title">Gallery</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <a href="gallery.html">Gallery </a> </li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
  </div>
  </div>
  </div>
  </section>
  <!-- End banner --> 
  
  <br>
  <!-- Gallery -->
  <div class="container">
  <div class="row">
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Boat on Calm Water"
        />
    
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Wintry Mountain Landscape"
        />
      </div>
    
      <div class="col-lg-4 mb-4 mb-lg-0">
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Mountains in the Clouds"
        />
    
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Boat on Calm Water"
        />
      </div>
    
      <div class="col-lg-4 mb-4 mb-lg-0">
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Waves at Sea"
        />
    
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Yosemite National Park"
        />
      </div>
    </div>
  </div>
    <!-- Gallery -->
  

@endsection

@section('scripts')

@endsection