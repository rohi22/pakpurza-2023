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
    <h1 class="title">404</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <a href="30-404_With_Banner-Page.html"> 404 - 2</a></li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 

<section class="error_section">
<div class="container">
<div class="error_parts text-center">
<div class="row  justify-content-center">
<div class="col-md-12 col-lg-6 col-sm-12">
<h3> 404 </h3>
<h4> Oop, that link is broken. </h4>
<p> We are sorry, but something went wrong </p>
<div class="form-group col-md-12 col-sm-12 col-xs-12  m-t-40">
                  <button class="btn btn-primary btn-skin back" name="submit" onClick="parent.location='01-Home-Page.html'" type="submit"> Back to homepage</button>
                </div>

<form class="search-form m-t-35">
          <input placeholder="Search..." type="text">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
</div>
</div>



</div>
</div>
</section>


@endsection

@section('scripts')

@endsection