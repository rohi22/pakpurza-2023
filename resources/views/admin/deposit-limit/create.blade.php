@extends('admin.layouts.scaffold')
@section('title')
Simsar | Deposit Limit
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
               Deposit Limit Settings
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
      <form action="{{url('deposit-limit-setting')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
         {{csrf_field()}}
         <div class="kt-portlet__body">
             
             <div class="form-group row">
               <label class="col-lg-3 mt-2 col-form-label">Minimum Amount</label>
               <div class="col-lg-3 mt-2">
                  <input type="text"  name="min_amount" class="form-control" placeholder="Minimum Amount" value="{{ $deposit_limit->min_amount }}">
               </div>
            </div>
             
            <div class="form-group row">
               <label class="col-lg-3 mt-2 col-form-label">Maximum  Amount</label>
               <div class="col-lg-3 mt-2">
                  <input type="text"  name="amount" class="form-control" placeholder="Amount" value="{{$deposit_limit->amount}}">
               </div>
            </div>
             <div class="form-group row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <button class="btn btn-block btn-success" type="submit">Update</button>
                </div>
                <div class="col-lg-4">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinyColorPicker/1.1.1/jqColorPicker.min.js"></script>

<script type="text/javascript">
    $('.background_color').colorPicker();
    $('.content_background_color').colorPicker();
    $('.font_color').colorPicker();
    $('.footer_font_color').colorPicker();
     
</script>
@endpush
