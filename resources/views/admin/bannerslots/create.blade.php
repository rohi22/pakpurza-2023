@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Bump Up Ads
@endsection

@push('styles')
@endpush

@section('content')


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add Banner Slots
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
        <form action="{{url('admin/save-banner-slots')}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               
                    <div class="form-group row">
                         <label class="col-lg-2 col-form-label">Pages List</label>
                            <div class="col-lg-3">
                                <select name="page_id" class="form-control" required>
                                    <option value="">Please Select</option>
                                    @foreach($pagelist as $value)
                                    <option value="{{$value->id}}">{{ucfirst($value->page_title)}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                <div class="form-group row">
                   
                    <label class="col-lg-2 col-form-label">Slot Title</label>
                    <div class="col-lg-3">
                        <input type="text"  name="title" class="form-control" placeholder="Enter Slot Title">
                    </div>
                    <!-- <label class="col-lg-2 col-form-label">Price*</label>-->
                    <!--<div class="col-lg-3">-->
                    <!--    <input type="text"  name="price" id="charges" class="form-control" placeholder="Enter Price">-->
                    <!--</div>-->
                </div>
                
                
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Slot Width</label>
                    <div class="col-lg-3">
                        <input type="text"  name="slot_width" class="form-control" placeholder="Enter Slot Width">
                    </div>
                     <label class="col-lg-2 col-form-label">Slot Height</label>
                    <div class="col-lg-3">
                        <input type="text"  name="slot_height"  class="form-control" placeholder="Enter Slot Height">
                    </div>
                </div>
                 

                <div class="form-group row">
                    
                   
                    <label class="col-lg-2 col-form-label">Default Image</label>
                    <div class="col-lg-3">
                        <input type="file" name="slotimage" class="checkImageValid">
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
@endsection

@push('scripts')
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>



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

</script>

@endpush