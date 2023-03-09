<div class="topbar">
    <!-- Header  -->
    <div class="header">
      <div class="container po-relative">
        <nav class="navbar navbar-expand-lg hover-dropdown header-nav-bar"> <a href="{{route('index')}}"
            class="navbar-brand"><img src="frontend/images/logo.png" alt="Pak Purza"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h5-info"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
          <div class="collapse navbar-collapse" id="h5-info">
            <ul class="navbar-nav">
              <li class="nav-item"> <a class="nav-link" href="{{route('index')}}">Home</a></li>

              <li class="nav-item"> <a class="nav-link" href="{{route('about.us')}}">About</a></li>
              

              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Media</a>
                <ul class="b-none dropdown-menu font-14 animated fadeInUp">
                  <li><a class="dropdown-item" href="{{route('blog')}}">Blogs</a></li>
                  <li><a class="dropdown-item" href="{{route('news')}}">News</a></li>
                  <li><a class="dropdown-item" href="{{route('forums')}}">Forum</a></li>
                  <li><a class="dropdown-item" href="{{route('careers')}}">Careers</a></li>
                  <li><a class="dropdown-item" href="{{route('events')}}">Events</a></li>
                  <li><a class="dropdown-item" href="{{route('articles')}}">Article</a></li>
                </ul>
              </li>
              

              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Ads Categories</a>
                <ul class="b-none dropdown-menu font-14 animated fadeInUp">
             
              </li>
            </ul>
            </li>
         
            </ul>
            <div class="header_r d-flex">
              <div class="loin"> <a class="nav-link" href="#" data-toggle="modal" data-target="#login"><i
                    class="fa fa-user m-r-5"></i>Register/Sign In</a> </div>
              <ul class="ml-auto post_ad">
                <li class="nav-item search"><a class="nav-link" href="20-Post_Ad-Page.html">Post Your Ad</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login to Pak Purza</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><img
                  src="frontend/images/close.png" alt="Pak Purza"></span> </button>
          </div>
          <div class="modal-body">
            <div class="list-unstyled list-inline social-login">
              <a href="#" class="facebook"> <img src="frontend/images/fb.png" alt="Pak Purza">Continue wiith Facbook</a>
              <a href="#" class="google"> <img src="frontend/images/google_p.png" alt="Pak Purza"> <span>Continue with
                  Google</span></a>
            </div>
            <div class="or-divider">
              <h6>or</h6>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" name="log_username" placeholder="Email/Username">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="log_password" placeholder="Password">
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="buttons login_btn" name="login" value="Login">
                Continue
              </button>
            </div>
            <div class="form-info">
              <div class="md-checkbox">
                <input type="checkbox" name="rememberme" id="rememberme" value="forever">
                <label for="rememberme" class="">Remember me</label>
              </div>
              <div class="forgot-password">
                <a href="forgotpassword.html">Forgot password?</a>
              </div>
            </div>

          </div>
          <div class="register text-center">Not a member yet? <a href="#" data-toggle="modal"
              data-target="#register">Register</a></div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login to Pak Purza</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><img
                  src="frontend/images/close.png" alt="Pak Purza"></span> </button>
          </div>
          <div class="modal-body">
            <div class="list-unstyled list-inline social-login">
              <a href="#" class="facebook"> <img src="frontend/images/fb.png" alt="Pak Purza">Continue wiith Facbook</a>
              <a href="#" class="google"> <img src="frontend/images/google_p.png" alt="Pak Purza"> <span>Continue with
                  Google</span></a>
            </div>
            <div class="or-divider">
              <h6>or</h6>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" name="log_username" placeholder="Name">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group has-feedback">
                  <input type="number" class="form-control" id="Phone_No" name="log_password" placeholder="Number">
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group has-feedback">
                  <input type="Email" class="form-control" id="Email" name="Email" placeholder="Email">
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="log_password" placeholder="Password">
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" id="Confirm_password" name="Confirm_password"
                    placeholder="Confirm Password">
                </div>
              </div>

            </div>
            <div class="form-group">
              <button type="submit" class="buttons login_btn" name="login" value="Login">
                Continue
              </button>
            </div>
            <div class="form-info">
              <p class="text-center p-b-10">By Register I agree to receive emails.</p>
            </div>

          </div>
          <div class="register text-center">Already a member? <a href="#">Login</a></div>
        </div>
      </div>
    </div>
    <!-- End Header  -->
  </div>