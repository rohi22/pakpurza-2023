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
            <h1 class="title">Forums</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="06-Forums-Page.html"> Forums </a> </li>
              </ol>
            </nav>
          </div>
          <!-- Column -->
        </div>
      </div>
    </div>
  </section>
  <!-- End banner -->

  <!-- Forum -->
  <section id="blog-area" class="blog-with-sidebar-area">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header pr-0 pl-0">
              <div class="row no-gutters align-items-center w-100">
                <div class="col font-weight-bold pl-3">General</div>
                <div class="d-none d-md-block col-6 text-muted">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">Threads</div>
                    <div class="col-3">Replies</div>
                    <div class="col-6">Last update</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="07-Forum_Detail-Page.html" class="text-big font-weight-semibold"
                    data-abc="true">Getting started with BBBootstrap.com</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">120</div>
                    <div class="col-3">14</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/Ur43esv.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">Thankyou for your help. appreciate your
                          solution</a>
                        <div class="text-muted small text-truncate">2d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">William Smith</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="m-0">
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="07-Forum_Detail-Page.html" class="text-big font-weight-semibold"
                    data-abc="true">Announcements</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">23</div>
                    <div class="col-3">12</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/J6l19aF.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">We have created a new feature for developers and
                          designers</a>
                        <div class="text-muted small text-truncate">1d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">Rodie Angel</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="m-0">
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="07-Forum_Detail-Page.html" class="text-big font-weight-semibold"
                    data-abc="true">Guides</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">42</div>
                    <div class="col-3">654</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/8RKXAIV.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">To enable new notifications. just go to
                          settings.</a>
                        <div class="text-muted small text-truncate">1d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">Kim Nicolas </a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header pr-0 pl-0">
              <div class="row no-gutters align-items-center w-100">
                <div class="col font-weight-bold pl-3">News</div>
                <div class="d-none d-md-block col-6 text-muted">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">Threads</div>
                    <div class="col-3">Replies</div>
                    <div class="col-6">Last update</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="07-Forum_Detail-Page.html" class="text-big font-weight-semibold"
                    data-abc="true">Getting started with BBBootstrap.com</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">120</div>
                    <div class="col-3">14</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/Ur43esv.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">Thankyou for your help. appreciate your
                          solution</a>
                        <div class="text-muted small text-truncate">2d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">William Smith</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="m-0">
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="07-Forum_Detail-Page.html" class="text-big font-weight-semibold"
                    data-abc="true">Announcements</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">23</div>
                    <div class="col-3">12</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/J6l19aF.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">We have created a new feature for developers and
                          designers</a>
                        <div class="text-muted small text-truncate">1d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">Rodie Angel</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="m-0">
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="07-Forum_Detail-Page.html" class="text-big font-weight-semibold"
                    data-abc="true">Guides</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">42</div>
                    <div class="col-3">654</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/8RKXAIV.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">To enable new notifications. just go to
                          settings.</a>
                        <div class="text-muted small text-truncate">1d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">Kim Nicolas </a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header pr-0 pl-0">
              <div class="row no-gutters align-items-center w-100">
                <div class="col font-weight-bold pl-3">Events</div>
                <div class="d-none d-md-block col-6 text-muted">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">Threads</div>
                    <div class="col-3">Replies</div>
                    <div class="col-6">Last update</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="07-Forum_Detail-Page.html" class="text-big font-weight-semibold"
                    data-abc="true">Getting started with BBBootstrap.com</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">120</div>
                    <div class="col-3">14</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/Ur43esv.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">Thankyou for your help. appreciate your
                          solution</a>
                        <div class="text-muted small text-truncate">2d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">William Smith</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="m-0">
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="07-Forum_Detail-Page.html" class="text-big font-weight-semibold"
                    data-abc="true">Announcements</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">23</div>
                    <div class="col-3">12</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/J6l19aF.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">We have created a new feature for developers and
                          designers</a>
                        <div class="text-muted small text-truncate">1d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">Rodie Angel</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="m-0">
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col"><a href="javascript:void(0)" class="text-big font-weight-semibold"
                    data-abc="true">Guides</a></div>
                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3">42</div>
                    <div class="col-3">654</div>
                    <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/8RKXAIV.jpg" alt=""
                        class="d-block ui-w-30 rounded-circle">
                      <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)"
                          class="d-block text-truncate" data-abc="true">To enable new notifications. just go to
                          settings.</a>
                        <div class="text-muted small text-truncate">1d ago &nbsp;&middot;&nbsp; <a
                            href="javascript:void(0)" class="text-muted" data-abc="true">Kim Nicolas </a></div>
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
  <!-- End Forum -->

  <!-- App_Store -->
  <section class="app_store">
    <div class="container">
      <!-- Row  -->
      <div class="row justify-content-center">
        <div class="col-md-10 text-center">
          <h2 class="title">Download on App Store</h2>
          <div class="clearfix"></div>
          <h6 class="subtitle">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
            believable.</h6>
        </div>
      </div>
      <!-- Row  -->
      <div class="row">
        <div class="app_parts ">
          <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-apple app-icon "></i> Apple Store
          </button>
          <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-android app-icon"></i> Apple Store
          </button>
          <button class="app-btn btn" type="submit" value="butten"><i class="fa fa-windows app-icon"></i> Apple Store
          </button>
        </div>
      </div>
    </div>
  </section>
  <!-- End App_Store -->

@endsection

@section('scripts')

@endsection