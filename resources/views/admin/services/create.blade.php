@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Service
@endsection

@push('styles')
<link rel="stylesheet" href="{{URL::asset('public/asset/crop/croppie.css')}}">

<style>
    
     .min{
        min-width:190px;
    }
   .p-b-1per{
       padding-bottom:1%; 
   } 
   .c-w{
     color:white;   
   }
   .b-c{
       background-color:lightgray; 
   }
   .w-100per{
       width:100%; 
   }
   
    .p-r-17px{
        padding-right: 17px; 
    }
    .w-1350px{
        width:1350px;
    }
    .p-t-5per-p-b-11per{
        padding-top:5%; padding-bottom:11%; 
    }
    
</style>


@endpush

@section('content')


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add Service
                </h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                @if($errors->count() > 0)
                <br>
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-md-4">
            </div>
        </div>
        
        <!--begin::Form-->
        <form action="{{url('admin/save-services')}}" id="brandform" method="POST" enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            
            
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title</label>
                    <div class="col-lg-3">
                        <input type="text" name="title" class="form-control" required placeholder="Enter Title">
                    </div>
                    
                    <label class="col-lg-2 col-form-label">Description</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="description" class="form-control" required maxlength="255" placeholder="" rows="2" placeholder="Enter Description"></textarea>
                    </div>
                   
                </div>
                
                 <div class="form-group row">
                     
                    <label class="col-lg-2 col-form-label">Per Day Cost *</label>
                    <div class="col-lg-3">
                        <input type="text" name="price" class="form-control"required placeholder="Per Day Cost">
                    </div>
                    
                    <label class="col-lg-2 col-form-label">Icon*</label>
                    <div class="col-lg-3">
                        
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="icon" class="checkImageValid w-100per" id="upload_image_second" required>
                                <input type="hidden" name="imgName" id="imgName" />
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>
                    
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">status</label>
                    <div class="col-lg-3">
                        <select class="form-control w-100per" name="status" required  >
                            <option value="1">Active</option>
                            <option value="0">De Active</option>
                         </select>
                    </div>
                </div>
            </div>
            
            
            
            
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-secondary" onclick="window.location='{{ URL::previous() }}'">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
</div>

<!-- end:: Content -->

      <div class="modal fade show p-r-17px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
         <div class="modal-dialog modal-dialog-centered center1" role="document">
        <div class="modal-content w-1350px" >
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                   <div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" class="w-100per"></div>
						  
  					</div>
				</div>
                    <div >
                        <button type="button" class="btn btn-danger hide-modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-primary" id="crop_image_one">Crop</button>
                            </div>
                        </center>
        
                    </div>
        
                </div>
            </div>
        </div>

@endsection

@push('scripts')
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>



<script src="{{URL::asset('public/asset/crop/croppie.js')}}" type="text/javascript"></script>


<script>
      $('#brandform').validate({
  errorElement: 'span', //default input error message container
  errorClass: 'help-block help-block-error', // default input error message class
  focusInvalid: true, // do not focus the last invalid input
  ignore: "", // validate all fields including form hidden input
  rules: {
      
      
      






title: {
            required: true,
        },
description: {
            required: true,
        },
price: {
            required: true,
        },
icon: {
            required: true,
        },
status: {
            required: true,
        },

    },

  messages: {
      
title: {
           required: "Title is required.",
        },
description: {
            required: "Description is required.",
        },
price: {
            required: "Price is required.",
        },
icon: {
            required: "Icon is required.",
        },
status: {
            required: "status is required.",
        },

        
        
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


      {{--crop--}}
      
       $image_crop = $('#image_demo').croppie({
            	enableExif: true,
            	viewport: {
            		width: 200,
            		height: 200,
            		type: 'square' //circle
            	},
            	boundary: {
            		width: 220,
            		height: 220
            	}
            });  
       

  $('#upload_image_second').on('change', function() {
        	var reader = new FileReader();
        	reader.onload = function(event) {
        		$image_crop.croppie('bind', {
        			url: event.target.result
        		}).then(function() {
        			console.log('jQuery bind complete');
        		});
        	};
        	reader.readAsDataURL(this.files[0]);
        	$('#deleteModal').css('display', 'block');
        });    
               
                  
        $('#crop_image_one').click(function() {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {

				$.ajax({
					type: "Post",
					url: "{{ url('crop-image') }}",
					data: {
						"_token": "{{ csrf_token() }}",
						"image": response
					},
					success: function(data) {
						$('#imgName').val(data.image);
						console.log(data.image);
						$('#deleteModal').css('display', 'none');
					},

				});
			});
});


             $(".hide-modal").click(function(){
     //console.log('ok 22');
     $('#deleteModal').css('display', 'none');
            // $("#deleteModal_one_one").modal('hide');
            $('#deleteId').val('');
        });

          
            $('#upload_image_second').on('change', function() {
            	var reader = new FileReader();
            	reader.onload = function(event) {
            		$image_crop.croppie('bind', {
            			url: event.target.result
            		}).then(function() {
            			console.log('jQuery bind complete');
            		});
            	};
            	reader.readAsDataURL(this.files[0]);
            	$('#deleteModal_one_one').css('display', 'block');
            });
 


</script>
@endpush