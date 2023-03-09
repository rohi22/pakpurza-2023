@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Category
@endsection

@push('styles')
<link rel="stylesheet" href="{{URL::asset('public/asset/crop/croppie.css')}}">

<style>
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
    
     .cv-spinner {
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .spinner {
          width: 40px;
          height: 40px;
          border: 4px #ddd solid;
          border-top: 4px #2e93e6 solid;
          border-radius: 50%;
          animation: sp-anime 0.8s infinite linear;
        }
        @keyframes sp-anime {
          100% {
            transform: rotate(360deg);
          }
        }
        .is-hide{
          display:none;
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
                    Edit Category
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{url('update-category/'.$category->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                <div class="row p-b-1per" >
                    <div class="col-md-12 text-right">
                        <a href="{{url('categories')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Category Listing</button></a>
                    </div>
                </div><br>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="title" class="form-control" value="{{$category->title}}" placeholder="Enter Title">
                    </div>
                    <label class="col-lg-2 col-form-label">Description</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$category->description}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Previous Image*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder iconName" style="background-image: url('http://127.0.0.1:8000/public/assets/media/category/image/{{ $category->image.'\'' }});"></div>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                         <span>1017px Width * 380px Height</span>
                    </div>

                    <label class="col-lg-2 col-form-label">Previous Icon Image*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                            <div class="kt-avatar__holder iconNameImage" style="background-image: url('http://simsar.com/public/assets/media/category/icon/{{ $category->icon_image.'\'' }});"></div>
                        </div>
                      
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                         <span>40px Width * 40px Height</span>
                    </div>
                </div>
                <div class="form-group row">
                    
                     <label class="col-lg-2 col-form-label">Image *</label>
                    <div class="col-lg-3">
                        <input type="file" name="image" class="checkImageValid w-100per" id="upload_image_first"   >
                        <input type="hidden" name="image" value="{{ $category->image??''}}" id="imgName" />
                          <span>1017px Width * 380px Height</span>
                            <span class="form-text" style="color:red;">(this will replace the previous image)</span>
                    </div>

                    <label class="col-lg-2 col-form-label">Icon Image *</label>
                    <div class="col-lg-3">
                       <input type="file" name="icon"  id="upload_image_second" class="checkImageValid w-100per"  >
                        <input type="hidden" value="{{ $category->icon_image??''}}" name="icon_image"  id="iconName" />
                         <span>40px Width * 40px Height</span>
                           <span class="form-text" style="color:red;">(this will replace the previous image)</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Meta Keywords</label>
                    <div class="col-lg-3">
                        <input class="form-control" id="kt_tagify_5" name='meta_keywords' placeholder="Add users"  value="{{$category->meta_keywords}}">
                        <div class="kt-margin-t-10">
                            Dropdown item and tag templates.
                        </div>
                    </div>
                    <label class="col-lg-2 col-form-label">Meta Descriptsion</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_2" name="meta_description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$category->meta_description}}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control kt-select2" name="status" id="kt_select2" name="select2">
                            <option value="1" @if($category->status==1)  selected="selected" @endif>Active</option>
                            <option value="0" @if($category->status==0)  selected="selected" @endif>De Active</option>
                        </select>
                    </div>
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



<div class="modal fade show p-r-17px" id="deleteModal_one_one" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
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
                        <button type="button" class="btn btn-primary" id="crop_image">Crop</button>
                    </div>
                </center>

            </div>

        </div>
    </div>
</div>



<div class="modal fade show p-r-17px" id="deleteModal_one_two" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered center1" role="document">
        <div class="modal-content w-1350px" >
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                   <div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo_two" class="w-100per"></div>
						  
  					</div>
				</div>
                    <div >
                        <button type="button" class="btn btn-danger hide-modal">No, cancel!</button>
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
<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>-->
<!--<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>-->
<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>-->
<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>-->
<script src="{{URL::asset('public/asset/crop/croppie.js')}}" type="text/javascript"></script>
<script type="text/javascript">

// $(document).ready(function(){
//     loaderShow()
// });
 $(".hide-modal").click(function(){
     console.log('ok 22');
     $('#deleteModal_one_one').css('display', 'none');
            // $("#deleteModal_one_one").modal('hide');
            $('#deleteId').val('');
        });

        <?php //else:?>
        var htm = $('.table-rows').html();
        <?php //endif;?>
  $(document).on('click','.add-row',function(){
            
            var ab;
             $('.sn').each(function(index){
                   ab = index;
            });
            
            
            if(ab == 9){
                $('#limitModal').modal('show')
                return false;
            }
            else{
                    $('.table-rows').append(htm);
                    $('.final_total').remove();
                    $('.sn').each(function(index){
                        $(this).text(++index);
                        $('#total_quantity').val(index++);
                    });
                    $('.abc').each(function(index){
                        var id = $(this).attr('id');
                        ++index;
                        var a = index;
                        if(id == "kt_user_avatar_3_"){
                             $(this).attr('id',id+a);
                        }
                    });
                    $('.abcd').each(function(index){
                        var id = $(this).attr('id');
                        ++index;
                        var a = index;
                        if(id == "kt_user_avatar_4_"){
                             $(this).attr('id',id+a);
                        }
                    });
                
            }
           
           
            
            
           
          });
  $(document).on('click','.delete-table-row',function(){
            ths = $(this);
            if( $('.item-row').length > 1 ){
                if( $(this).attr('id') != 0 ){      
                            if($(this).attr('id')=="-1"){
                             
                           $(this).parent().parent().remove();
                            
                               $('.sn').each(function(index){
                                    $(this).text(++index);

                                    
                                  });}
                            else{
                        if( confirm('Are You Sure') ){
                            
                        // $.ajax({
                        //     url: '<?php echo "";?>delete-purchase-item',
                        //     type: 'POST',
                        //     data: { 'source':$(this).attr('id') },
                        //     success:function(data){
                        //         //console.log(data);
                        //       ths.parent().parent().remove();
                        //     }});
                            
                        }
                                
                            }
                }else{
                    $(this).parent().parent().remove();
                    $('.sn').each(function(index){
                        $(this).text(++index);
                        $('#total_quantity').val(index++);
                         
                         $("#total_discount_per").val(' ');
                         $("#total_discount_amount").val(' ');
                         $("#total_net_amount").val(' ');
                    });}
            }else{
                $('.alert-sms').html('');
                $('#alertModal').modal('show');
                $('.alert-sms').html('<p>You are not allowed to delete this item</p>');
                  
            }});
  
 $image_crop = $('#image_demo').croppie({
	enableExif: true,
	viewport: {
		width: 1017,
		height: 380,
		type: 'square' //circle
	},
	boundary: {
		width: 1037,
		height: 400
	}
});


$image_crop_two = $('#image_demo_two').croppie({
	enableExif: true,
	viewport: {
		width: 40,
		height: 40,
		type: 'square' //circle
	},
	boundary: {
		width: 50,
		height: 50
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
	$('#deleteModal_one_one').css('display', 'block');
});
$('#crop_image').click(function() {
            loaderShow();
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {

				$.ajax({
					type: "Post",
					url: "{{ url('crop-image-banner') }}",
					data: {
						"_token": "{{ csrf_token() }}",
						"image": response
					},
					success: function(data) {
						$('#imgName').val(data.image);
						console.log(data.image);
						loaderHide();
						var url  = "http://127.0.0.1:8000/public/asset/images/profilepic/";
                        $(".iconName").css("background-image", "url(" + data.path + ")");
						$('#deleteModal_one_one').css('display', 'none');
					},

				});
			});
});



$('#upload_image_second').on('change', function() {
	var reader = new FileReader();
	reader.onload = function(event) {
		$image_crop_two.croppie('bind', {
			url: event.target.result
		}).then(function() {
			console.log('jQuery bind complete');
		});
	};
	reader.readAsDataURL(this.files[0]);
	$('#deleteModal_one_two').css('display', 'block');
});


$('#crop_image_two').click(function() {
            loaderShow();
			$image_crop_two.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {

				$.ajax({
					type: "Post",
					url: "{{ url('crop-image-icon') }}",
					data: {
						"_token": "{{ csrf_token() }}",
						"image": response
					},
					success: function(data) {
						$('#iconName').val(data.image);
						console.log(data.image);
						var url  = "http://127.0.0.1:8000/public//assets/media/category/icon/";
                        $(".iconNameImage").css("background-image", "url(" + url + data.image + ")");
						loaderHide();
						$('#deleteModal_one_two').css('display', 'none');
					},

				});
			});
});

  function loaderShow(){
      $("#overlay-loader").fadeIn(300);
  }

  function loaderHide(){
    $("#overlay-loader").fadeOut(300);
  }

</script>

@endpush