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
          <li class="breadcrumb-item active" aria-current="page"> <a href="17-Dashboard-Page.html"> Dashbord </a></li>
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
            <ul class="list-unstyled  m-t-25">
              <li class="active"><span><i class="fa fa-sliders"></i></span><a href="17-Dashboard-Page.html"> Dashboard </a></li>
              <li><span><i class="fa fa-cog"></i></span><a href="18-Profile-Page.html"> Profile Settings </a></li>
              <li><span><i class="fa fa-database"></i></span><a href="19-My_Ads-Page.html"> My Ads </a></li>
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
          <div class="dashboard_main">
            <div class="dashboard_heding">
              <h3> Dashboard </h3>
            </div>
            <div class="row">
              <div class="col-xl-4 col-lg-6 col-12">
                <div class="card-content bg-white">
                  <div class="card-body d-flex"> <img src="images/dash_box_1.png" alt="Classified Plus">
                    <div class="card_body_text">
                      <h4>Total Ad Posted</h4>
                      <p>480 Add Posted </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-12">
                <div class="card-content bg-white">
                  <div class="card-body d-flex"> <img src="images/dash_box_2.png" alt="Classified Plus">
                    <div class="card_body_text">
                      <h4>Featured Ads</h4>
                      <p>80 Add Posted </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-12">
                <div class="card-content bg-white m-0">
                  <div class="card-body d-flex"> <img src="images/dash_box_3.png" alt="Classified Plus">
                    <div class="card_body_text">
                      <h4>Offers / Messages</h4>
                      <p>2040 messages </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div id="recent-transactions" class="col-12">
                <h4 class="card-title">Recent Approved Ads</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements"> </div>
                <div class="table">
                  <table class="table table-xl mb-0 table-responsive">
                    <thead>
                      <tr>
                        <th class="border-top text-capitalize ml-44"> <input class="form-check-input" value="" type="checkbox">
                          photos </th>
                        <th class="border-top text-capitalize">title </th>
                        <th class="border-top text-capitalize">category </th>
                        <th class="border-top text-capitalize">ad status </th>
                        <th class="border-top text-capitalize">price </th>
                        <th class="border-top text-capitalize">action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-truncate"><div class="form-check">
                            <input class="form-check-input" value="" type="checkbox">
                            <div class="recent_img"> <img src="images/recent_add_1.png" alt="Classified Plus"> </div>
                          </div></td>
                        <td class="text-truncate"><p>Electronics canon Camera.<br>
                            Ad ID: ng3D5hAMHPajQrM</p></td>
                        <td class="text-truncate"><a href="#">Electronics </a></td>
                        <td><button type="button" class="btn btn-sm active_btn">Active</button></td>
                        <td class="text-truncate"><strong>$ 200</strong></td>
                        <td class="text-truncate"><button type="submit" value="butten"><i class="fa fa-eye"></i></button>
                          <span>
                          <button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button>
                          </span><span>
                          <button type="submit" value="butten"> <i class="fa fa-trash"></i> </button>
                          </span></td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><div class="form-check">
                            <input class="form-check-input" value="" type="checkbox">
                            <div class="recent_img"> <img src="images/recent_add_2.png" alt="Classified Plus"> </div>
                          </div></td>
                        <td class="text-truncate"><p>Electronics canon Camera.<br>
                            Ad ID: ng3D5hAMHPajQrM</p></td>
                        <td class="text-truncate"><a href="#">Matrimony </a></td>
                        <td><button type="button" class="btn btn-sm sold_btn">Sold</button></td>
                        <td class="text-truncate"><strong>$ 500</strong></td>
                        <td class="text-truncate"><button type="submit" value="butten"><i class="fa fa-eye"></i></button>
                          <span>
                          <button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button>
                          </span><span>
                          <button type="submit" value="butten"> <i class="fa fa-trash"></i> </button>
                          </span></td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><div class="form-check">
                            <input class="form-check-input" value="" type="checkbox">
                            <div class="recent_img"> <img src="images/recent_add_3.png" alt="Classified Plus"> </div>
                          </div></td>
                        <td class="text-truncate"><p>Electronics canon Camera.<br>
                            Ad ID: ng3D5hAMHPajQrM</p></td>
                        <td class="text-truncate"><a href="#">Animals</a></td>
                        <td><button type="button" class="btn btn-sm active_btn">Active</button></td>
                        <td class="text-truncate"><strong>$ 300 </strong></td>
                        <td class="text-truncate"><button type="submit" value="butten"><i class="fa fa-eye"></i></button>
                          <span>
                          <button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button>
                          </span><span>
                          <button type="submit" value="butten"> <i class="fa fa-trash"></i> </button>
                          </span></td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><div class="form-check">
                            <input class="form-check-input" value="" type="checkbox">
                            <div class="recent_img"> <img src="images/recent_add_4.png" alt="Classified Plus"> </div>
                          </div></td>
                        <td class="text-truncate"><p>Electronics canon Camera.<br>
                            Ad ID: ng3D5hAMHPajQrM</p></td>
                        <td class="text-truncate"><a href="#">Vehicles</a></td>
                        <td><button type="button" class="btn btn-sm active_btn">Active</button></td>
                        <td class="text-truncate"><strong>$ 100 </strong></td>
                        <td class="text-truncate"><button type="submit" value="butten"><i class="fa fa-eye"></i></button>
                          <span>
                          <button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button>
                          </span><span>
                          <button type="submit" value="butten"> <i class="fa fa-trash"></i> </button>
                          </span></td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><div class="form-check">
                            <input class="form-check-input" value="" type="checkbox">
                            <div class="recent_img"> <img src="images/recent_add_5.png" alt="Classified Plus"> </div>
                          </div></td>
                        <td class="text-truncate"><p>Electronics canon Camera.<br>
                            Ad ID: ng3D5hAMHPajQrM</p></td>
                        <td class="text-truncate"><a href="#">Real Estate</a></td>
                        <td><button type="button" class="btn btn-sm sold_btn">sold</button></td>
                        <td class="text-truncate"><strong>$ 9000 </strong></td>
                        <td class="text-truncate"><button type="submit" value="butten"><i class="fa fa-eye"></i></button>
                          <span>
                          <button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button>
                          </span><span>
                          <button type="submit" value="butten"> <i class="fa fa-trash"></i> </button>
                          </span></td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><div class="form-check">
                            <input class="form-check-input" value="" type="checkbox">
                            <div class="recent_img"> <img src="images/recent_add_6.png" alt="Classified Plus"> </div>
                          </div></td>
                        <td class="text-truncate"><p>Electronics canon Camera.<br>
                            Ad ID: ng3D5hAMHPajQrM</p></td>
                        <td class="text-truncate"><a href="#">Mobile</a></td>
                        <td><button type="button" class="btn btn-sm active_btn">Active</button></td>
                        <td class="text-truncate"><strong>$ 900 </strong></td>
                        <td class="text-truncate"><button type="submit" value="butten"><i class="fa fa-eye"></i></button>
                          <span>
                          <button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button>
                          </span><span>
                          <button type="submit" value="butten"> <i class="fa fa-trash"></i> </button>
                          </span></td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><div class="form-check">
                            <input class="form-check-input" value="" type="checkbox">
                            <div class="recent_img"> <img src="images/recent_add_7.png" alt="Classified Plus"> </div>
                          </div></td>
                        <td class="text-truncate"><p>Electronics canon Camera.<br>
                            Ad ID: ng3D5hAMHPajQrM</p></td>
                        <td class="text-truncate"><a href="#">Fashion</a></td>
                        <td><button type="button" class="btn btn-sm sold_btn">sold</button></td>
                        <td class="text-truncate"><strong>$ 100</strong></td>
                        <td class="text-truncate"><button type="submit" value="butten"><i class="fa fa-eye"></i></button>
                          <span>
                          <button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button>
                          </span><span>
                          <button type="submit" value="butten"> <i class="fa fa-trash"></i> </button>
                          </span></td>
                      </tr>
                      <tr class="border-bottom">
                        <td class="text-truncate"><div class="form-check">
                            <input class="form-check-input" value="" type="checkbox">
                            <div class="recent_img"> <img src="images/recent_add_8.png" alt="Classified Plus"> </div>
                          </div></td>
                        <td class="text-truncate"><p>Electronics canon Camera.<br>
                            Ad ID: ng3D5hAMHPajQrM</p></td>
                        <td class="text-truncate"><a href="#">Vehicles</a></td>
                        <td><button type="button" class="btn btn-sm active_btn">Active</button></td>
                        <td class="text-truncate"><strong>$ 50000 </strong></td>
                        <td class="text-truncate"><button type="submit" value="butten"><i class="fa fa-eye"></i></button>
                          <span>
                          <button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button>
                          </span><span>
                          <button type="submit" value="butten"> <i class="fa fa-trash"></i> </button>
                          </span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="single-sidebar m-t-30 m-b-50"> <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus"> </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection

@section('scripts')

@endsection