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
          <li class="breadcrumb-item active" aria-current="page"> <a href="boostDETAIL.html"> Boost Details Page </a></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->
  <br>
  <div class="container ">
  <div class="jumbotron">
    <h5>Buy the plan to show your ad as featured on brand pages depending on the ad you select.</h5>
      <br>
      <center>
        <h3>Start Date</h3>
        <br>
      <div  class="date" id="date" data-target-input="nearest">
      <input style="padding: 10px; border-color:#006e9f; border-radius: 40px; " type="date" class="  border-4 datetimepicker-input" placeholder="Choose Date">
    </center>
    <br>
    <center>
      <h3>End Date</h3>
      <br>
    <div class="date" id="date" data-target-input="nearest">
    <input style="padding: 10px; border-color:#006e9f; border-radius: 40px; " type="date" class="  border-4 datetimepicker-input" placeholder="Choose Date">
  </center>
  <br>
  <center>
  <div>
    <h3>Select Brand</h3> 
    <br>
    <select style="padding: 15px; border-color: #006e9f;border-radius: 40px;" >
      <option>Honda</option>
      <option>Nissan</option>
      <option>KIA</option>
      <option>Toyota</option>
      <option>Hyundai</option>
     
    </select>
  </div>
  <br>
  <a href="checkout.html"><button class="change_btn mt-2 text-capitalize" type="submit" value="button">Next</button></a>
  </center>
  
  </div>
  </div>
  </div>

@endsection

@section('scripts')

@endsection