@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Type
@endsection

@push('styles')

<style>
    
    .w-100per{
        width:100%; 
    }
    .p-r-17px{
        padding-right: 17px;
    }
    .m-0px{
       margin:0px !important; 
    }
    .p-t-5per-p-b-11per{
        padding-top:5%; padding-bottom:11%; 
    }
    
</style>

@endpush

@section('content')

<!--<link rel="stylesheet" href="{{URL::asset('public/asset/crop/bootstrap.min.css')}}">-->
<link rel="stylesheet" href="{{URL::asset('public/asset/crop/croppie.css')}}">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Create Type
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
        <form action="{{url('admin/save-types')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="title" class="form-control" placeholder="Enter Title">
                    </div>
                    <label class="col-lg-2 col-form-label">Meta Title</label>
                    <div class="col-lg-3">
                        <input type="text"  name="meta_title" class="form-control" placeholder="Enter Title">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    
                    <label class="col-lg-2 col-form-label">Meta Description</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="meta_description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description"></textarea>
                    </div>
                </div>
                
                

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label checkImageValid w-100per">Image Logo*</label>
                   <div class="col-lg-3">
                       
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
                        <button type="button" class="btn btn-primary" id="crop_image">Crop</button>
                    </div>
                </center>

            </div>

        </div>
    </div>
</div>
                       
                        <!--<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">-->
                        <!--    <div class="kt-avatar__holder" style="background-image: url(https://mrcpotencia.com/simsar/public/assets/media/users/100_1.jpg);"></div>-->
                        <!--    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">-->
                        <!--        <i class="fa fa-pen"></i>-->
                        <!--        <input type="file" name="logo" >-->
                        <!--    </label>-->
                        <!--    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">-->
                        <!--        <i class="fa fa-times"></i>-->
                        <!--    </span>-->
                        <!--</div>-->
                        <!--<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>-->
                        
                        <input type="file" name="logo" id="" class="checkImageValid">
                    </div>

                    <label class="col-lg-2 col-form-label">Image Banner*</label>
                    <div class="col-lg-3">
                        <!--<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">-->
                        <!--    <div class="kt-avatar__holder" style="background-image: url(https://mrcpotencia.com/simsar/public/assets/media/users/100_1.jpg);"></div>-->
                        <!--    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">-->
                        <!--        <i class="fa fa-pen"></i>-->
                        <!--        <input type="file" name="banner" >-->
                        <!--    </label>-->
                        <!--    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">-->
                        <!--        <i class="fa fa-times"></i>-->
                        <!--    </span>-->
                        <!--</div>-->
                        <!--<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>-->
                        
                        <input type="file" name="banner" class="checkImageValid">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image </label>
                    <div class="col-lg-3">
                        
                        <input type="file" name="image" id="upload_image" class="checkImageValid">
                    </div>
                </div>

                
                
                 <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control w-100per" name="status"  >
                            <option >--Select--</option>
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
                            <button type="reset" onclick="window.location='{{ URL::previous() }}'" class="btn btn-secondary">Cancel</button>
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
    <div class="modal-dialog modal-dialog-centered m-0px" role="document" >
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                   <div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" class="w-100per"></div>
						  
  					</div>
				</div>
                    <div >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="crop_image">Yes, Crop it!</button>
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


<!--<script src="{{URL::asset('public/asset/crop/jquery.min.js')}}" type="text/javascript"></script>-->
<script src="{{URL::asset('public/asset/crop/croppie.js')}}" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        
	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:350,
      height:300
    }
  });
    $('#upload_images').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    
    
    reader.readAsDataURL(this.files[0]);
    $('#deleteModal').modal('show');
    
    
    //   $('#deleteModal').css('display','block');
    //  $("#categoryModal").modal('show');
    // alert('asds');
  });
    $('#crop_image').click(function(event){
    //   $(".loader-crop").fadeIn();
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
        
        console.log(response);
      $.ajax({
        url:"http://127.0.0.1:8000/testsimsar/crop-image",
        type: "POST",
        data:{
            "_token": "{{ csrf_token() }}",
            "image": response},
        success:function(data)
        {
          var res = JSON.parse(data);
          $("#event_img_final").val(res[0]);
          $('#uploaded_image').html(res[1]);
          $('#uploadimageModal').modal('hide');
        //   $(".loader-crop").fadeOut();
        }
      });
    })
  });

}); 
</script>
@endpush