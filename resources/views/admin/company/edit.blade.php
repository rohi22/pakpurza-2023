@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit company
@endsection

@push('styles')
<link rel="stylesheet" href="{{URL::asset('public/asset/crop/croppie.css')}}">
@endpush

@section('content')


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
       
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Edit company
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{url('update-company-list/'.$company->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Company*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="company_name" class="form-control" value="{{$company->company_name}}" placeholder="Enter Title">
                    </div>
                    <label class="col-lg-2 col-form-label">About Company</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="about_company" class="form-control"  maxlength="255"  rows="2" placeholder="Enter Description">{{$company->about_company}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Company Logo*</label>
                    <div class="col-lg-3">
                        
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url('http://simsar.com/testsimsar/public/assets/media/company/logo/{{ $company->company_logo.'\'' }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="company_logo"  class="checkImageValid w-100per" id="upload_image_first">
                                <input type="hidden" name="imgName" id="imgName">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        <span>250px Width * 250px Height</span>
                    </div>
                </div>
                <div class="form-group row">
                             <label class="col-lg-2 col-form-label">Website Link</label>
                             <div class="col-lg-3">
                                <input class="form-control" type="text" name="web_link" placeholder="Website Link" value="{{$company->web_link}}">
                             </div>
                               <label class="col-lg-2 col-form-label">Facebook Link</label>
                               <div class="col-lg-3">
                                    <input class="form-control" type="text" name="fb_link" placeholder="Facebook Link" value="{{$company->fb_link}}">
                               </div>
                        </div>
                <div class="form-group row">
                             <label class="col-lg-2 col-form-label">Youtube Link</label>
                             <div class="col-lg-3">
                                <input class="form-control" type="text" name="youtube_link" placeholder="Youtube Link" value="{{$company->youtube_link}}">
                             </div>
                               <label class="col-lg-2 col-form-label">Instagram Link</label>
                               <div class="col-lg-3">
                                    <input class="form-control" type="text" name="insta_link" placeholder="Instagram Link" value="{{$company->insta_link}}">
                               </div>
                        </div>
                <div class="form-group row">
                             <label class="col-lg-2 col-form-label">Twitter Link</label>
                             <div class="col-lg-3">
                                 <input class="form-control" type="text" name="twitter_link" placeholder="Twitter Link" value="{{$company->twitter_link}}" >
                             </div>
                               <label class="col-lg-2 col-form-label">Linkedin Link</label>
                               <div class="col-lg-3">
                                   <input class="form-control" type="text" name="linked_link" placeholder="Linkedin Link" value="{{$company->linked_link}}">
                               </div>
                        </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control kt-select2" name="status" id="kt_select2" name="select2">
                            <option value="1" @if($company->status==1)  selected="selected" @endif>Active</option>
                            <option value="0" @if($company->status==0)  selected="selected" @endif>De Active</option>
                        </select>
                    </div>
                    
                    <label class="col-lg-2 col-form-label">Year Of company Establishment</label>
                    <div class="col-lg-3">
                        <input class="form-control" type="date" name="establishment_date" value="{{$company->establishment_date}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Document Image*</label>
                    <div class="col-lg-3">
                        
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url('http://simsar.com/testsimsar/public/assets/media/company/documentimage/{{ $company->document_image.'\'' }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="document_image" >
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        <span>250px Width * 250px Height</span>
                    </div>
                    
                     <label class="col-lg-2 col-form-label">Document PDF*</label>
                    <div class="col-lg-3">
                        
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url('http://simsar.com/testsimsar/public/assets/media/company/documentpdf/{{ $company->document_pdf.'\'' }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="document_pdf" >
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        <span>250px Width * 250px Height</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">CNIC Of Owner Front*</label>
                    <div class="col-lg-3">
                        
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url('http://simsar.com/testsimsar/public/assets/media/company/documentcnic/{{ $company->cnic_front.'\'' }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="cnic_front" >
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        <span>250px Width * 250px Height</span>
                    </div>
                    
                     <label class="col-lg-2 col-form-label">CNIC Of Owner Back*</label>
                    <div class="col-lg-3">
                        
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url('http://simsar.com/testsimsar/public/assets/media/company/documentcnic/{{ $company->cnic_back.'\'' }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="cnic_back" >
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        <span>250px Width * 250px Height</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image of owner holding CNIC*</label>
                    <div class="col-lg-3">
                        
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url('http://simsar.com/testsimsar/public/assets/media/company/documentcnic/{{ $company->cnic_holding.'\'' }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="cnic_holding" >
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        <span>250px Width * 250px Height</span>
                    </div>
                    
                    
                </div>
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
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
<script src="{{URL::asset('public/asset/crop/croppie.js')}}" type="text/javascript"></script>
<script>
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
@endpush