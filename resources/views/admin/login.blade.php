<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="../../../">
		<meta charset="utf-8" />
		<title>Simsar | Admin Login</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="{{URL::asset('public/assets/css/pages/login/login-1.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{URL::asset('public/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{URL::asset('public/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		 <link rel="shortcut icon" href="{{URL::asset('public/assets/media/logos/favicon.ico')}}" />
		<style>
		    .alert.alert-outline-danger{
		        border: 1px solid #006e9f;
                color: #006e9f;
		    }
		    .alert.alert-outline-danger .alert-text{
		        font-weight: 500;
		        color: #006e9f;
		    }
		    .alert.alert-outline-danger .alert-close i{
		        font-weight: 500;
		        color: #006e9f;
		    }
		    .alert.alert-outline-danger .alert-icon i{
		        font-weight: 500;
		        color: #006e9f;
		    }
		    .m-20px-m-width{
		        margin-bottom:20px;max-width: 200px;
		    }
		    .b-c-solid{
		        background:#006e9f !important;border: 1px solid #006e9f !important;width: 100%;margin-top:20px;
		    }
		</style>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

					<!--begin::Aside-->
					<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url({{URL::asset('public/assets/images/1190187206029892.A6EwcWk9HjgZG14WZW47_height640.png')}});">
						<div class="kt-grid__item">
							<a href="#" class="kt-login__logo">
								<!--<img src="{{URL::asset('public/assets/media/logos/logo-4.png')}}">-->
								<img src="{{URL::asset('public/assets/images/1190187206029893.CdVonmheSQDhmDB6NnAv_height640.png')}}">
							</a>
						</div>
						<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
							<div class="kt-grid__item kt-grid__item--middle">
								<h3 class="kt-login__title">Welcome to Simsar admin dashboard! </h3>
								<!--<h4 class="kt-login__subtitle">The ultimate Bootstrap & Angular 6 admin theme framework for next generation web apps.</h4>-->
							</div>
						</div>
						<div class="kt-grid__item">
							<div class="kt-login__info">
								<div class="kt-login__copyright">
									&copy; Copyrights 2020 Simsar
								</div>
								<div class="kt-login__menu">
									<!--<a href="#" class="kt-link">Privacy</a>-->
									<!--<a href="#" class="kt-link">Legal</a>-->
									<!--<a href="#" class="kt-link">Contact</a>-->
								</div>
							</div>
						</div>
					</div>

					<!--begin::Aside-->

					<!--begin::Content-->
					<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

						<!--begin::Head-->
						{{-- <div class="kt-login__head">
							<span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
							<a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>
						</div> --}}

						<!--end::Head-->

						<!--begin::Body-->
						<div class="kt-login__body">

							<!--begin::Signin-->
							<div class="kt-login__form">
								<div class="kt-login__title">
								    <img class="m-20px-m-width" src="{{URL::asset('public/assets/media/web-settings/1589655042Simsar_logo.png')}}">
									<!--<h3>Sign In</h3>-->
								</div>
                                @if(Session::get('inc_pass'))
                                <div class="alert alert-outline-danger fade show" role="alert">
                                    <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                                    <div class="alert-text">{{Session::get('inc_pass')}}</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                                @endif	
								<!--begin::Form-->
                                <form class="kt-form" action="{{url('admin-login')}}"  method="POST" novalidate="novalidate" id="kt_login_form">
                                    {{csrf_field()}}
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Username" name="email" autocomplete="off">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off">
									</div>

									<!--begin::Action-->
									<div class="kt-login__actions">
										<!--<a href="#" class="kt-link kt-login__link-forgot">-->
										<!--	Forgot Password ?-->
										<!--</a>-->
										<button  class="btn btn-primary btn-elevate kt-login__btn-primary b-c-solid" >Sign In</button>
									</div>

									<!--end::Action-->
								</form>

								<!--end::Form-->

								{{-- <!--begin::Divider-->
								<div class="kt-login__divider">
									<div class="kt-divider">
										<span></span>
										<span>OR</span>
										<span></span>
									</div>
								</div>

								<!--end::Divider-->

								<!--begin::Options-->
								<div class="kt-login__options">
									<a href="#" class="btn btn-primary kt-btn">
										<i class="fab fa-facebook-f"></i>
										Facebook
									</a>
									<a href="#" class="btn btn-info kt-btn">
										<i class="fab fa-twitter"></i>
										Twitter
									</a>
									<a href="#" class="btn btn-danger kt-btn">
										<i class="fab fa-google"></i>
										Google
									</a>
								</div> --}}

								<!--end::Options-->
							</div>

							<!--end::Signin-->
						</div>

						<!--end::Body-->
					</div>

					<!--end::Content-->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"type": "#22b9ff",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{URL::asset('public/assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
		<script src="{{URL::asset('public/assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="{{URL::asset('public/assets/js/pages/custom/login/login-1.js')}}" type="text/javascript"></script>

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>