@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Service Plan
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
                    Edit Service Plan
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
        <form action="{{url('admin/update-services/'.$services->id)}}" method="POST" enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
           <div class="kt-portlet__body">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title</label>
                    <div class="col-lg-3">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$services->title}}">
                    </div>
                    
                    <label class="col-lg-2 col-form-label">Description</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$services->description}}</textarea>
                    </div>
                   
                </div>
                
                 <div class="form-group row">
                     
                    <label class="col-lg-2 col-form-label">Per Day Cost *</label>
                    <div class="col-lg-3">
                        <input type="text" name="price" class="form-control" placeholder="Per Day Cost" value="{{$services->price}}">
                    </div>
                    
                    <label class="col-lg-2 col-form-label">Icon*</label>
                    <div class="col-lg-3">
                        
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url(https://minibigerp.com/simsar/public/assets/media/service/icon/{{$services->icon}});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="icon" class="checkImageValid w-100per" id="upload_image_first">
                                <input type="hidden" name="imgName" id="imgName">
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
                        <select class="form-control w-100per" name="status"  >
                            <option value="1" @if($services->status == 1) selected @endif>Active</option>
                            <option value="0" @if($services->status == 0) selected @endif>De Active</option>
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

<script src="{{URL::asset('public/asset/crop/croppie.js')}}" type="text/javascript"></script>
<script>
    $('#end_date').on('change', function() {

    
   
   var months = [
   'None',
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
  ];



  var sPrice=$("#charges").val();
  var dprice=parseInt(sPrice);

  var strStart =$("#start_date").val();
  if(strStart==""){
     
     alert("Select Start date");
    // $("#errormsg").text("Select Start date");
    $(this).val(''); 
    return false;
  }
  
  if(strStart > $(this).val() ){
      alert('start date Problem');
      $(this).val('');
  }

var startDate= $("#start_date").val();

var endDate= $(this).val(); 
var end = new Date(endDate);
    start   = new Date(startDate),
    diff  = new Date(end - start),
    days  = diff/1000/60/60/24;
var dDays = Math.round( days );
var perDprice=Math.round(dprice);

var amount=perDprice*dDays;
// $("#duePrice").html(amount);
$("#total").val(amount);

// alert(amount);

});




$('#start_date').on('change', function() {


   
   var months = [
   'None',
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
  ];

  var sPrice=$("#charges").val();
  var dprice=parseInt(sPrice);

  var strStart =$("#end_date").val();
  if(strStart==""){
     
    
  }
  else{
      
      if(strStart < $(this).val() ){
      alert('End Date Problem');
      $(this).val('');
      
    }
  
      
        var startDate= $("#end_date").val();
        var endDate= $(this).val(); 
        var end = new Date(endDate);
            start   = new Date(startDate),
            diff  = new Date(start - end),
            days  = diff/1000/60/60/24;
        var dDays = Math.round( days );
        var perDprice=Math.round(dprice);
        
        var amount=perDprice*dDays;
        // $("#duePrice").html(amount);
        $("#total").val(amount);
        
        // alert(amount);
   
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