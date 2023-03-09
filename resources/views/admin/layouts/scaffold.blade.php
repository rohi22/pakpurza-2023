@php $wSetting = \App\Models\WebSetting::first(); @endphp
<!DOCTYPE html>


<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>PakPurza | Dashboard</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		{{-- <link rel="shortcut icon" href="{{ asset('assets/media/web-settings/'.$wSetting->title_icon)}}" /> --}}
		@include('admin.partials.styles')
		@stack('styles')
	<style>
	     #overlay-loader{
          position: fixed;
          top: 0;
          z-index: 100;
          width: 100%;
          height:100%;
          display: none;
          background: rgba(0,0,0,0.6);
          z-index: 99999;
        }
	</style>
	</head>
			
	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--maximize kt-page--loading">
        <div id="overlay-loader">
            <div class="cv-spinner">
              <span class="spinner"></span>
            </div>
        </div>
		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
            <div class="kt-header-mobile__logo">
                <a href="index.html">
                    <img alt="Logo" src="{{ asset('public/backend/images/logo.png')}}" />
                </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <div class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></div>
                <div class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></div>
                <div class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></div>
            </div>
        </div>

        <!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				@include('admin.partials.left-navigation')
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					@include('admin.partials.top-navigation')
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
						@include('admin.partials.header-report')
						
						@if(Session::get('success'))<input type="hidden" id="tItLe" value="Success"><input type="hidden" id="mEsSeGe" value="{{ Session::get('success') }}">@elseif(Session::get('error'))<input type="hidden" id="tItLe" value="Error"><input type="hidden" id="mEsSeGe" value="{{ Session::get('error') }}">@endif


						@yield('content')
					</div>

					@include('admin.partials.footer')
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		@include('admin.partials.right-navigation')

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		

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

		@include('admin.partials.scripts')
		
		@stack('scripts')
		<script>
			var tItLe  = $("#tItLe").val();
			var mEsSeGe  = $("#mEsSeGe").val();
			
			@if(Session::get('success'))
			$(document).ready(function() {
				toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};

				toastr.success(mEsSeGe, tItLe);
        	});
			@elseif(Session::get('error'))
			
			$(document).ready(function() {
				toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};

				toastr.error(mEsSeGe, tItLe);
        	});

			@endif
			
		</script>
	</body>

	<!-- end::Body -->
</html>