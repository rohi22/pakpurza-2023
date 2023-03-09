@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->

<!-- <div class="iner_breadcrumb bg-light p-t-20 p-b-20">
	<div class="container">
	  <nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
		  <li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('contact')}}">{{ $contact->title }}</a> </li>
		</ol>
	  </nav>
	</div>
  </div> -->
  <!-- End breadcrumb -->
  
  
  <!-- banner -->
<section class="banner">
    <div class="banner-innerpage <!--Category_banner-->" style="background-image: url({{ asset('assets/media/contact/banner/'.$contact->banner)}});">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center"> 
  <!-- Column -->
  <div class="text-center">
    <h1 class="title">{{ $contact->title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('contact') }}">{{ $contact->title }} </a> </li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
  
  
  
  <section id="Contact_form">
	<div class="container">
	  <div class="contacts_mape">
		<div class="row">
		  <div class="col-md-12">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1229.5864897864183!2d75.76904979762698!3d26.886852269789564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1499667244188" allowfullscreen="" width="1170" height="512"></iframe>
		  </div>
		</div>
	  </div>
	  <div class="contacts_bottom">
		<div class="row">
		  <div class="col-lg-9 col-md-9 feature_box single-blog-post">
			<div class="row justify-content-center">
			  <div class="col-lg-12 text-left">
				<h2 class="title">Contact Form</h2>
			  </div>
			</div>
			<div class="row">
			  <div class="col-lg-12">
			   <div class="row">
				<div class="col-md-12">
				 

					<form id="createContactValidation" action="{{ route('contact_us') }}" method="POST"  class="kt-form kt-form--fit kt-form--label-right"  >
					@csrf
				  <div class="row">
					  <div class="form-group col-md-4 col-sm-12 col-xs-12">
						<input class="form-control" id="name" name="firstname" placeholder="Full Name" type="text">
					  </div>
					  <div class="form-group col-md-4 col-sm-12 col-xs-12">
						<input class="form-control" id="name" name="lastname" placeholder="Full Name" type="text">
					  </div>
					  <div class="form-group col-md-4 col-sm-12 col-xs-12">
						<input class="form-control" name="email" placeholder="Email" type="text">
					  </div>
					  <div class="form-group col-md-4 col-sm-12 col-xs-12">
						<input class="form-control" id="Subject" name="Subject" placeholder="Subject" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="form-group col-md-12 col-sm-12 col-xs-12">
						<div class="input-group">
						  <textarea class="form-control" rows="6" name="message" placeholder="Message"></textarea>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="form-group col-md-12 col-sm-12 col-xs-12">
						<button type="submit" class="btn btn-primary btn-skin" name="submit" > SUBMIT NOW</button>
					  </div>
					</div>
					@if(session()->has('success'))
						<div class="alert alert-success">
							{{ session()->get('success') }}
						</div>
					@endif
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
			<div class="row m-t-30">
			  <div class="col-lg-12">
				<div class="row">
				  <div class="col-md-12  col-sm-12">
				  <p class=" subtitle">{{ $contact->content }}</p>
					<div class="card">
					  <div class="card-body d-flex">
						<div class="icon-space align-self-top"> <i class="fa fa-map-marker" aria-hidden="true"></i> </div>
						<div class="align-self-center">
						  <h5>Address : </h5>
						  <p class="m-t-10">{{ $setting->reach_us_address }}</p>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col-md-12  col-sm-12">
					<div class="card">
					  <div class="card-body d-flex">
						<div class="icon-space align-self-top"> <i class="fa fa-envelope-o" aria-hidden="true"></i> </div>
						<div class="align-self-center">
						  <h5>Have any questions? </h5>
						  <p class="m-t-10">{{ $setting->reach_us_email }}</p>
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
						  <h5>Call us &amp; Hire us </h5>
						  <p class="m-t-10"> {{ $setting->reach_us_number }}</p>
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
						  <p class="m-t-10">{{ $setting->reach_us_email }}</p>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>

<script>

 $('#createContactValidation').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules:{
            
            firstname: {
                    required: true,
                    maxlength: 255
                },
            lastname: {
                    required: true,
                    maxlength: 255
                },
            email: {
                    required: true,
                    email:true
                },
            message: {
                    required: true,
                    maxlength: 255
                },
                  
            },

        messages: {
            password2: {
                    required: "Password is required",
                },
            confirm_password2: {
                    required: "Please re-enter password",
                }  
                
            },

        invalidHandler: function(event, validator) { //display error alert on form submit

        },
        focusInvalid: function() {
            // put focus on tinymce on submit validation
            if (this.settings.focusInvalid) {
                try {
                    var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
                    if (toFocus.is("textarea")) {
                        tinyMCE.get(toFocus.attr("id")).focus();
                    } else {
                        toFocus.filter(":visible").focus();
                    }
                } catch (e) {
                    // ignore IE throwing errors when focusing hidden elements
                }
            }
        },

        errorPlacement: function(error, element) {
        if (element.is(':checkbox')) {
            error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
        } else if (element.is(':radio')) {
            error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
        } else if (element.hasClass('select2')) {
            error.insertAfter(element.next('span'));
        }
        else if (element.hasClass('textarea')) {
            error.insertAfter(element.next('span'));
        }
        else {
            error.insertAfter(element); // for other inputs, just perform default behavior
        }
        },

        highlight: function(element) { // hightlight error inputs
        $(element)
            .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function(element) { // revert the change done by hightlight
        $(element)
            .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function(label) {
        label
            .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function(form) {
        form.submit();
        }
    });
</script>
@endpush