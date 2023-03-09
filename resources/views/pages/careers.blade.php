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
          <li class="breadcrumb-item active" aria-current="page"> <a href="28-Careers-Page.html">Careers </a> </li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->



  <section id="Contact_form">
    <div class="container">
      <div class="contacts_bottom">
        <div class="row">
          <div class="col-lg-9 col-md-9 feature_box single-blog-post">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-left">
                <h2 class="title">Submit An Application</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-md-12">
                    <form method="post" class="m-t-40">
                      <div class="row">
                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                          <input class="form-control" id="name" name="name" placeholder="Full Name" type="text">
                        </div>
                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                          <input class="form-control" name="Email" placeholder="Email" type="text">
                        </div>
                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                          <input class="form-control" name="Age" placeholder="Age" type="number">
                        </div>
                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                            <input class="form-control" id="name" name="phone" placeholder="Mobile Number" type="number">
                        </div>
                        <div class="form-group col-md-8 col-sm-12 col-xs-12">
                          <input class="form-control" id="Subject" name="Applied For" placeholder="Applied For"
                            type="text">
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <input class="form-control" id="name" name="Complete Address" placeholder="Complete Address"
                            type="text">
                        </div>
                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                          <label>Upload Your Resume</label>
                          <input class="form-control center" type="file" id="myFile" name="filename">
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
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 pb-4">
                          <button class="btn btn-primary btn-skin" name="submit" type="submit"> SUBMIT NOW</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 feature_box">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-left">
                <h2 class="title">Get In Touch</h2>

              </div>
            </div>
            <div class="row m-t-30 m-b-50">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-md-12  col-sm-12">
                    <p class=" subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      Lorem Ipsum has been the industry's.</p>
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="align-self-center">
                          <h5>Address : </h5>
                          <p class="m-t-10">Level 13, 2 Elizabeth St,
                            Lorem Ipsum is simply dummy text </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="align-self-center">
                          <h5>Have any questions? </h5>
                          <p class="m-t-10">Support@themes.com</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Call us</h5>
                          <p class="m-t-10">+92 3102545555</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-fax" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Have any questions? </h5>
                          <p class="m-t-10">info@pakpurza.com</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')

@endsection