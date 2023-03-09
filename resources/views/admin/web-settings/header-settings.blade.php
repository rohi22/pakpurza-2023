@extends('admin.layouts.scaffold')

@section('title')
Simsar | Header Setting
@endsection

@push('styles')

 <link rel="stylesheet" href="{{asset('asset/crop/croppie.css')}}">

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
    .ml-20px{
        margin-left:20px;margin-top:20px;
    }
    .b-color{
        background-color: rgb(162, 63, 3); color: rgb(221, 221, 221);
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
                    Header Setting
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
        <form action="{{url('edit-header-setting')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="title" class="form-control" placeholder="Enter Title" value="{{ $setting->title }}">
                    </div>
                    <label class="col-lg-2 col-form-label">Description</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{ $setting->description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="width:450px; height:120px; background-image: url('{{ asset('assets/media/web-settings/'. $setting->logo)}}');"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="logo" class="checkImageValid w-100per" id="upload_image_first" required >
                                <input type="hidden" name="imgNam" id="imgNam" />
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>

                    <label class="col-lg-2 col-form-label">Icon Image*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                            <div class="kt-avatar__holder" style="background-image:url('{{ asset('assets/media/web-settings/'. $setting->title_icon)}}');"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="title_icon" class="checkImageValid w-100per" id="upload_image_second" required >
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
                    <label class="col-lg-2 col-form-label">Meta Title</label>
                    <div class="col-lg-3">
                        <input id="kt_tagify_5" name='meta_title' placeholder="Meta Title" class="form-control" value="{{ $setting->meta_title }}">
                    </div>
                    <label class="col-lg-2 col-form-label">Meta Keywords</label>
                    <div class="col-lg-3">
                        <input id="kt_tagify_5" name='meta_keywords' placeholder="Add users" class="form-control" value="{{ $setting->meta_keywords }}">
                        <div class="kt-margin-t-10">
                            Dropdown item and tag templates.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-lg-2 col-form-label">Meta Descriptsion</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_2" name="meta_description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{ $setting->meta_description }}</textarea>
                    </div>
                </div>

            </div>
         
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Colors
                        </h3>
                        
                    </div>
                </div>
                 
                
            <div class="row ml-20px" >
                <div class="col-md-12">
                    <h5>Featured Button</h5>
                    <label>Background Color</label>
                    <input class="f_bg no-alpha"  name="f_bg"  value="{{ $setting->f_bg}}" required>

            
            
                    <label>Border Color</label>
                    
                    <input class="f_border no-alpha "  name="f_border" value="{{ $setting->f_border}}" required>


                    <label>Text Color</label>
                    <input class="f_text no-alpha "  name="f_text"  value="{{ $setting->f_text}}" required>


                    <label>Icon Color</label>
                    <input class="f_icon no-alpha " name="f_icon" value="{{ $setting->f_icon}}" required>

            
            
                </div>
            </div>
            
            
            
            <div class="row ml-20px" >
                <div class="col-md-12">
                    <h5>Offers Button</h5>
                    
                    <label>Background Color</label>
                    <input class="off_bg no-alp b-color"  name="off_bg"  value="{{ $setting->off_bg}}" required>

            
            
                    <label>Border Color</label>
                    <input class="off_border no-alpha b-color"  name="off_border"  value="{{ $setting->off_border}}" required>


                    <label>Text Color</label>
                    <input class="off_text no-alpha b-color" name="off_text"  value="{{ $setting->off_text}}" required>


                    <label>Icon Color</label>
                    <input class="off_icon no-alpha b-color" name="off_icon"   value="{{ $setting->off_icon}}" required>

            
            
                </div>
            </div>
            
            
            <div class="row ml-20px" >
                <div class="col-md-12">
                    <h5>Latest Button</h5>
                   
                   
                    <label>Background Color</label>
                    <input class="late_bg no-alp b-color"  name="late_bg"  value="{{ $setting->late_bg}}" required>

            
            
                    <label>Border Color</label>
                    <input class="late_border no-alpha b-color" name="late_border"  value="{{ $setting->late_border}}" required>


                    <label>Text Color</label>
                    <input class="late_text no-alpha b-color"  name="late_text"  value="{{ $setting->late_text}}" required>


                    <label>Icon Color</label>
                    <input class="late_icon no-alpha b-color" name="late_icon"  value="{{ $setting->late_icon}}" required>


            
            
                </div>
            </div>
            
           
           
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
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
 <div class="modal fade show p-r-17px" id="deleteModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered center1" role="document">
        <div class="modal-content w-1350px" >
           <input type="hidden" id="deleteId2">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                   <div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo2" class="w-100per"></div>
						  
  					</div>
				</div>
                    <div >
                        <button type="button" class="btn btn-danger hide-modal2">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-primary" id="crop_image_two">Crop</button>
                    </div>
                </center>

            </div>

        </div>
    </div>
</div>






@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinyColorPicker/1.1.1/jqColorPicker.min.js"></script>
<script src="{{URL::asset('asset/crop/croppie.js')}}" type="text/javascript"></script>

<script type="text/javascript">
        $('.f_bg').colorPicker(); 
        $('.f_border').colorPicker(); 
        $('.f_icon').colorPicker(); 
        $('.f_text').colorPicker(); 
        
        
        $('.off_bg').colorPicker(); 
        $('.off_border').colorPicker(); 
        $('.off_icon').colorPicker(); 
        $('.off_text').colorPicker(); 
        
        
        
        
        $('.late_bg').colorPicker(); 
        $('.late_border').colorPicker(); 
        $('.late_icon').colorPicker(); 
        $('.late_text').colorPicker(); 
        
        
           $image_crop = $('#image_demo').croppie({
            	enableExif: true,
            	viewport: {
            		width: 450,
            		height: 120,
            		type: 'square' //circle
            	},
            	boundary: {
            		width: 900,
            		height: 240
            	}
            });  
            $image_crop2 = $('#image_demo2').croppie({
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
        		$image_crop2.croppie('bind', {
        			url: event.target.result
        		}).then(function() {
        			console.log('jQuery bind complete');
        		});
        	};
        	reader.readAsDataURL(this.files[0]);
        	$('#deleteModal2').css('display', 'block');
        });    
               
                  
        $('#crop_image_two').click(function() {
			$image_crop2.croppie('result', {
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
						$('#deleteModal2').css('display', 'none');
					},

				});
			});
});


             $(".hide-modal2").click(function(){
     //console.log('ok 22');
     $('#deleteModal2').css('display', 'none');
            // $("#deleteModal_one_one").modal('hide');
            $('#deleteId2').val('');
        });

          
            $('#upload_image_second').on('change', function() {
            	var reader = new FileReader();
            	reader.onload = function(event) {
            		$image_crop2.croppie('bind', {
            			url: event.target.result
            		}).then(function() {
            			console.log('jQuery bind complete');
            		});
            	};
            	reader.readAsDataURL(this.files[0]);
            	$('#deleteModal_one_one').css('display', 'block');
            });
            
    {{--forr icon--}}
    
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