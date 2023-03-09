@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Bump Up Ads
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
                    Edit Bump Up Ads
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
        <form action="{{url('admin/update-banner-ads/'.$bannerads->id)}}"   enctype="multipart/form-data"  method="POST" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               
               <div class="form-group row">
                   
                    <label class="col-lg-2 col-form-label">Page*</label>
                    <div class="col-lg-3">
                        <select class="form-control" id="page" name="page" style="width:100% !important;" >
                            <option value="">--Select--</option>
                             @if($pagelist->count() > 0)
                                @foreach ($pagelist as $key=>$b)
                                 <option value="{{$b->id}}" @if($bannerads->page_id==$b->id)  selected="selected" @endif >{{ucfirst($b->page_title)}}</option>
                                 @endforeach
                                @endif
                         </select>
                    </div>
                    
                    <label class="col-lg-2 col-form-label">Slots*</label>
                    <div class="col-lg-3">
                        
                        <select class="form-control" name="placement" style="width:100% !important;" >
                            
                            <option value="">--Select--</option>
                             @if($bannerslots->count() > 0)
                                @foreach ($bannerslots as $key=>$b)
                                 <option value="{{$b->id}}" @if($bannerads->placement==$b->id)  selected="selected" @endif >{{$b->title}}</option>
                                
                                 @endforeach
                                @endif
                           
                            
                         </select>
                        
                    </div>
                </div>
                
                
                <div class="form-group row" id="category" @if($bannerads->page_id != 3)  style="display:none;" @endif >
                    <label class="col-lg-2 col-form-label">Category </label>
                    <div class="col-lg-3">
                        <select class="form-control" name="category" style="width:100% !important;" >
                            <option value="">--Select--</option>
                             @if($categories->count() > 0)
                                @foreach ($categories as $key=>$c)
                                 <option value="{{$c->id}}" @if($bannerads->category_id ==$c->id)  selected="selected" @endif >{{ucfirst($c->title)}}</option>
                                 @endforeach
                                @endif
                         </select>
                    </div>
                </div>
                
                
                
                <div class="form-group row">
                    
                     <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="title"  class="form-control" placeholder="Title" value="{{$bannerads->title}}">
                    </div>
                    
                    
                     <label class="col-lg-2 col-form-label">Price*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="charges"  class="form-control" placeholder="Price" value="{{$bannerads->charges}}">
                    </div>
                    
                    
                   
                </div>
                
                <div class="form-group row">
                     <label class="col-lg-2 col-form-label">status</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="status" style="width:100px;" >
                            <option value="1" @if($bannerads->status==1)  selected="selected" @endif>Active</option>
                            <option value="0" @if($bannerads->status==0)  selected="selected" @endif>De Active</option>
                         </select>
                    </div>
                    
                    
                     <label class="col-lg-2 col-form-label">Default Image</label>
                    <div class="col-lg-3">
                        <input type="file" name="image" class="checkImageValid w-100per" id="upload_image_first" required>
                        <input type="hidden" name="imgName" id="imgName" />
                    </div>
                    
                    
                </div>
                

            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        
                        <div class="col-lg-12 text-right">
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



 $('#page').change(function(){
    var pageId = $(this).val();
    
    if(pageId == 3){
        
        $("#category").show();
    }
    else{
        $("#category").hide();
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