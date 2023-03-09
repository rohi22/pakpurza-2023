@extends('admin.layouts.scaffold')
@section('title')
Simsar | Footer Setting
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

         

    .select2 .select2-selection__arrow{
            height: 26px !important;
    position: absolute !important;
    top: 15px !important; 
    right: 1px !important;
    width: 20px !important;
    }
    .select2 .select2-selection__rendered{
        line-height:11px !important;
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
               Footer Setting
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
    <form action="{{url('edit-footer-setting')}}" method="POST" enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
        {{ csrf_field() }}
        <div class="kt-portlet__body">
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Footer Content Heading</label>
               <div class="col-lg-3">
                  <input type="text"  name="footer_content_heading" class="form-control" placeholder="Footer Content Heading" value="{{ $setting->footer_content_heading }}">
               </div>
               <label class="col-lg-2 col-form-label">Footer Content</label>
               <div class="col-lg-3">
                  <textarea id="kt_maxlength_1" name="footer_content" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Footer Content">{{ $setting->footer_content }}</textarea>
               </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Payment Logo </label>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                        <div class="kt-avatar__holder" style="width:450px; background-image: url(http://127.0.0.1:8000/public/assets/media/web-settings/{{ $setting->payment_gateway_logo }});"></div>
                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                            <i class="fa fa-pen"></i>
                            <!--<input type="file" name="payment_gateway_logo" class="checkImageValid w-100per" id="upload_image_first" required >-->
                            <!--<input type="hidden" name="imgNam" id="imgNam" />-->
                        </label>
                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                            <i class="fa fa-times"></i>
                        </span>
                    </div>
                </div>
                <label class="col-lg-2 col-form-label">Right Reserved</label>
                <div class="col-lg-3">
                  <textarea id="kt_maxlength_1" name="right_reserved" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Right Reserved">{{ $setting->right_reserved }}</textarea>
                </div>
            </div>
            <h3 class="text-center">Social</h3>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Social Icons Heading</label>
               <div class="col-lg-8 col-md-8">
                  <input type="text" class="form-control" name="social_icon_heading" placeholder="Social Icons Heading" value="{{ $setting->social_icon_heading }}">
               </div>
            </div>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Twitter Icon</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                     <div class="kt-avatar__holder" style="background-image: url(http://127.0.0.1:8000/public/assets/media/web-settings/{{ $setting->twitter_icon }});"></div>
                     <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                     <i class="fa fa-pen"></i>
                     <input type="file" name="twitter_icon" >
                     </label>
                     <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                     <i class="fa fa-times"></i>
                     </span>
                  </div>
               </div>
               <label class="col-lg-2 col-form-label">Twitter Account Link</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="url" name="twitter_link" class="form-control" placeholder="Twitter Account Link"   value="{{ $setting->twitter_link }}">
               </div>
            </div>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Instagram Icon</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_3">
                     <div class="kt-avatar__holder" style="background-image: url(http://127.0.0.1:8000/public/assets/media/web-settings/{{ $setting->instagram_icon }});"></div>
                     <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                     <i class="fa fa-pen"></i>
                     <input type="file" name="instagram_icon" >
                     </label>
                     <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                     <i class="fa fa-times"></i>
                     </span>
                  </div>
               </div>
               <label class="col-lg-2 col-form-label">Instagram Account Link</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="url" name="instagram_link" class="form-control" placeholder="Instagram Account Link"  value="{{ $setting->instagram_link }}">
               </div>
            </div>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Facebook Icon</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_4">
                     <div class="kt-avatar__holder" style="background-image: url(http://127.0.0.1:8000/public/assets/media/web-settings/{{ $setting->facebook_icon }});"></div>
                     <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                     <i class="fa fa-pen"></i>
                     <input type="file" name="facebook_icon" >
                     </label>
                     <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                     <i class="fa fa-times"></i>
                     </span>
                  </div>
               </div>
               <label class="col-lg-2 col-form-label">Facebook Account Link</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="url" name="facebook_link" class="form-control" placeholder="Facebook Account Link" value="{{ $setting->facebook_link }}">
               </div>
            </div>
            
            <h3 class="text-center">Applications</h3>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Application Heading Icons</label>
               <div class="col-lg-8 col-md-8">
                  <input type="text" name="apps_icon_heading" class="form-control" placeholder="Application Icons Heading" value="{{ $setting->apps_icon_heading }}">
               </div>
            </div>
            
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Android Icon</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_5">
                     <div class="kt-avatar__holder" style="width:360px; background-image: url(http://127.0.0.1:8000/public/assets/media/web-settings/{{ $setting->android_icon }});"></div>
                     <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                     <i class="fa fa-pen"></i>
                     <input type="file" name="android_icon" >
                     </label>
                     <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                     <i class="fa fa-times"></i>
                     </span>
                  </div>
               </div>
               <label class="col-lg-2 col-form-label">Android Link</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="url" name="android_link" class="form-control" placeholder="Android Link" value="{{ $setting->android_link }}">
               </div>
            </div>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Apple Icon</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_6">
                     <div class="kt-avatar__holder" style="width:360px; background-image: url(http://127.0.0.1:8000/public/assets/media/web-settings/{{ $setting->apple_icon }});"></div>
                     <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                     <i class="fa fa-pen"></i>
                     <input type="file" name="apple_icon" >
                     </label>
                     <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                     <i class="fa fa-times"></i>
                     </span>
                  </div>
               </div>
               <label class="col-lg-2 col-form-label">Apple Link</label>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="url" name="apple_link" class="form-control" placeholder="Apple Link" value="{{ $setting->apple_link }}">
               </div>
            </div>
            
            <h3 class="text-center">REACH TO US</h3>
            
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Number</label>
               <div class="col-lg-8 col-md-8">
                  <input type="text" name="reach_us_number" class="form-control" placeholder="REACH TO US NUMBER" value="{{ $setting->reach_us_number }}">
               </div>
            </div>
            
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Email</label>
               <div class="col-lg-8 col-md-8">
                  <input type="text" name="reach_us_email" class="form-control" placeholder="REACH TO US EMAIL" value="{{ $setting->reach_us_email }}">
               </div>
            </div>
            
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Address</label>
               <div class="col-lg-8 col-md-8">
                  <input type="text" name="reach_us_address" class="form-control" placeholder="REACH TO US ADDRESS" value="{{ $setting->reach_us_address }}">
               </div>
            </div>
            
        </div>
        <div class="kt-portlet__foot kt-portlet__foot--fit-x">
            <div class="kt-form__actions">
               <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <input type="submit" value="submit" class="btn btn-success">
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
<script src="{{ asset('frontend/js/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{URL::asset('asset/crop/croppie.js')}}" type="text/javascript"></script>
<script>
    
        $image_crop = $('#image_demo').croppie({
            	enableExif: true,
            	viewport: {
            		width: 975,
            		height: 365,
            		type: 'square' //circle
            	},
            	boundary: {
            		width: 1000,
            		height: 400
            	}
            });  
            
              $('#upload_image_first').on('change', function() {
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
						$('#imgNam').val(data.image);
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

          
            $('#upload_image_first').on('change', function() {
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

<script src="{{URL::asset('assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>
@endpush
