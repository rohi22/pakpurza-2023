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
          <li class="breadcrumb-item active" aria-current="page"> <a href="22-Offers_Messages-Page.html"> Offer Messages</a> </li>
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
            <ul class="list-unstyled  m-t-20">
              <li><span><i class="fa fa-sliders"></i></span><a href="17-Dashboard-Page.html"> Dashboard </a></li>
              <li><span><i class="fa fa-cog"></i></span><a href="18-Profile-Page.html"> Profile Settings </a></li>
              <li><span><i class="fa fa-database"></i></span><a href="19-My_Ads-Page.html"> My Ads </a></li>
              <li class="active"><span><i class="fa fa-envelope"></i></span><a href="22-Offers_Messages-Page.html"> Offers/Messages </a></li>
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
            <div class="row mt-3">
              <div id="recent-transactions" class="col-12">
                <div class="messages_heding">
                  <h3>Offers</h3>
                </div>
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
                      <tr class="devider">
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
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="messages_heding m-t-10">
              <h3>Messages</h3>
            </div>
            <div class="message_sec card">
              <div class="row">
                <div class="col-md-4 col-sm-4 message">
                  <div class="message-contact">
                    <form class="border-bottom">
                      <input  type="text" placeholder="Search Contact">
                    </form>
                    <div class="offers_main">
                      <div class="list-unstyled">
                        <div class="d-flex mt-3"> <span class="pl-2"> <img class="mr-2" src="images/messages/john_mac.png" alt="Classified Plus"/> </span>
                          <div class="box_name"> <a href="#">
                            <h4>John Mac Douglas </h4>
                            <p class="online">Online </p>
                            </a></div>
                        </div>
                        <div class="d-flex"> <span class="pl-2"> <img class="mr-2" src="images/messages/martin.png" alt="Classified Plus"/> </span>
                          <div class="box_name"> <a href="#">
                            <h4>Martin Descker </h4>
                            <p>Offline </p>
                            </a></div>
                        </div>
                        <div class="d-flex"><span class="pl-2"> <img class="mr-2" src="images/messages/kim.png" alt="Classified Plus"/> </span>
                          <div class="box_name"> <a href="#">
                            <h4>Kim Bauer </h4>
                            <p>Offline </p>
                            </a></div>
                        </div>
                        <div class="d-flex"> <span class="pl-2"> <img class="mr-2" src="images/messages/james.png" alt="Classified Plus"/> </span>
                          <div class="box_name"> <a href="#">
                            <h4>James Miller </h4>
                            <p class="online">Online </p>
                            </a></div>
                        </div>
                        <div class="d-flex"> <span class="pl-2"> <img class="mr-2" src="images/messages/sarah.png" alt="Classified Plus"/> </span>
                          <div class="box_name"> <a href="#">
                            <h4>Sarah Higgle </h4>
                            <p>Offline </p>
                            </a></div>
                        </div>
                        <div class="d-flex active"> <span class="pl-2"> <img class="mr-2" src="images/messages/meagan.png" alt="Classified Plus"/> </span>
                          <div class="box_name"> <a href="#">
                            <h4>Meagan Miller </h4>
                            <p class="online">Online </p>
                            </a></div>
                        </div>
                        <div class="d-flex  pl-2"> <img class="mr-2" src="images/messages/fred.png" alt="Classified Plus"/>
                          <div class="box_name"> <a href="#">
                            <h4>Fred Aster</h4>
                            <p>Offline </p>
                            </a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-sm-8 chat">
                  <div class="chat_message">
                    <h3 class="border-bottom"> Chat Message </h3>
                    <div class="chat_sec">
                      <ul class="px-3">
                        <li>
                          <div><img src="images/messages/meagan_chat.png" alt="blog post"></div>
                          <div class="content">
                            <div class="main_content_1">
                              <h4 class="mb-0">Meagan Miller</h4>
                              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                            </div>
                            <span>10.00 Am</span> </div>
                        </li>
                        <li class="justify-content-end">
                          <div class="content text-right">
                            <div class="main_content_2">
                              <h4 class="mb-0">Aditya</h4>
                              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                            </div>
                            <span>10.05 Am</span> </div>
                          <div><img src="images/messages/aditya_chat.png" alt="blog post"></div>
                        </li>
                        <li>
                          <div><img src="images/messages/meagan_chat.png" alt="blog post"></div>
                          <div class="content">
                            <div class="main_content_1">
                              <h4 class="mb-0">Meagan Miller</h4>
                              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing</p>
                            </div>
                            <span>11.00 Am</span> </div>
                        </li>
                      </ul>
                    </div>
                    <div class="chat_message_bottum d-flex justify-content-between border-top">
                      <div class="message_type pl-2">
                        <input class="border-0" type="text"  placeholder="Type Your Message">
                      </div>
                      <div class="message_send"> <i class="fa fa-smile-o"></i> <i class="fa fa-paperclip"></i>
                        <button type="submit" value="button">Send</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="single-sidebar m-t-50 m-b-50"> <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus"> </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Dashboard_sec -->
  

@endsection

@section('scripts')

@endsection