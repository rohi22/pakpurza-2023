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
          <li class="breadcrumb-item active" aria-current="page"> <a href="forgotpassword.html">Forgot Password </a> </li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->
  <div class="container d-flex justify-content-center">
      <div class="row">
          <div class="">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="text-center">
                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                    <h2 class="text-center">Forgot Password?</h2>
                    <br>
                    <p>We will sent u a confirmation email.</p>
                    <br>
                    
                    <div class="panel-body">
      
                      <form id="register-form" role="form" autocomplete="off" class="form" method="post">
      
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                            <input id="email" name="email" placeholder="Your Email Address" class="form-control"  type="email">
                          </div>
                        </div>
                        <div class="form-group">
                          <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                        </div>
                        
                        <input type="hidden" class="hide" name="token" id="token" value=""> 
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
  </div>
  <br>
  <br>
  <br>
  <br>

@endsection

@section('scripts')

@endsection