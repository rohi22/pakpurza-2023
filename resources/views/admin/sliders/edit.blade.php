@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Slider
@endsection

@push('styles')
<style>
    .p-b-1per{
    padding-bottom:1%; 
}
.w-m-m{
    width:100%;margin-top:5px;margin-bottom:5px;
}
.b-g-color{
    background-color: rgb(162, 63, 3); color: rgb(221, 221, 221);
}
 .p-r-17px{
     padding-right: 17px;   
   }
  .w-1350{
      width:1350px;
  }
.p-t-5per-p-b-11per{
       padding-top:5%; padding-bottom:11%; 
   }
   .w-100{
       width:100%;
   }

</style>
@endpush

@section('content')
<link rel="stylesheet" href="{{URL::asset('public/asset/crop/croppie.css')}}">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add Slider
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
        <form action="{{url('update-slider/'.$slide->id)}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                <div class="row p-b-1per">
                    <div class="col-md-12 text-right">
                        <a href="{{url('slider')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Slider Listing</button></a>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Slider</label>
                    <div class="col-lg-3">
                        <!--<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">-->
                        <!--    <div class="kt-avatar__holder" style="width:500px; height:210px; background-image: url(https://mrcpotencia.com/simsar/public/assets/media/slider/{{ $slide->slider }});"></div>-->
                        <!--    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">-->
                        <!--        <i class="fa fa-pen"></i>-->
                        <!--        <input type="file" name="slider" >-->
                        <!--    </label>-->
                        <!--    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">-->
                        <!--        <i class="fa fa-times"></i>-->
                        <!--    </span>-->
                        <!--</div>-->
                        <!--<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>-->
                        
                    <input type="file" name="slider"  class="checkImageValid">
                   
                    <img id="img1" src="{{URL::asset('assets/media/slider/'.$slide->slider)}}" class="w-m-m" />
                    <input type="hidden" name="imgName" id="imgName" value="{{ $slide->slider }}" />
                         <span class="form-text text-muted">1300px Width * 300px Height</span>
                    </div>
                    
                    
                    <label class="col-lg-2 col-form-label">Back Link</label>
                    <div class="col-lg-3">
                        <input type="url" name="back_link" class="form-control" value="{{ $slide->back_link }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Background Color</label>
                    <div class="col-lg-3">
                        <input class="color no-alpha form-control b-g-color" value="{{ $slide->background_color }}" name="background_color">
                    </div>

                    
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control kt-select2" name="status" id="kt_select2" name="select2">
                            <option value="1" @if($slide->status==1)selected="selected" @endif>Active</option>
                            <option value="0" @if($slide->status==0)selected="selected" @endif>De Active</option>
                        </select>
                    </div>
            </div>
            
             <div  class="form-group row">
                 <label class="col-lg-2 col-form-label">Image Alt</label>
                    <div class="col-lg-3">
                        <input type="text" name="image_alt" class="form-control" value="{{ $slide->image_alt }}">
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





<div class="modal fade show p-r-17px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-1350">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per">
                <center>
                   <div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" class="w-100"></div>
						  
  					</div>
				</div>
                    <div >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="crop_image">Yes, delete it!</button>
                    </div>
                </center>

            </div>

        </div>
    </div>
</div>

<!-- end:: Content -->
@endsection

@push('scripts')
<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>-->
<!--<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/tinyColorPicker/1.1.1/jqColorPicker.min.js"></script>-->
<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>-->

<script type="text/javascript">
    // $('.color').colorPicker(); // that's it
</script>
<script src="{{URL::asset('public/asset/crop/croppie.js')}}" type="text/javascript"></script>

<script type="text/javascript">
    // $('.color').colorPicker(); // that's it
    
//   $(document).ready(function(){
        
	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:1300,
      height:300,
      type:'square' //circle
    },
    boundary:{
      width:1350,
      height:350
    }
  });
    $('#upload_image').on('change', function(){
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
        
    
    $.ajax({
        type : "Post",
        url  : "{{ url('crop-image') }}",
        data : {
             "_token": "{{ csrf_token() }}",
        "image": response

        },
        success:function(data){
           
           $('#img1').attr('src',data.path);
           
           $('#imgName').val(data.image);
        //   console.log(data.image);
           
           $('#deleteModal').modal('hide');
        },

    }); 
  })
  });

// }); 
</script>

@endpush