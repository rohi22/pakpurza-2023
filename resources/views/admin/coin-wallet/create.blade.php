@extends('admin.layouts.scaffold')
@section('title')
Simsar | Coin Wallet
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
               Coin Wallet Settings
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
      <form action="{{url('coin-wallet-setting')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
         {{csrf_field()}}
         <div class="kt-portlet__body">
            <div class="form-group row">
               <label class="col-lg-3 mt-2 col-form-label">Points On WhatsApp share</label>
               <div class="col-lg-3 mt-2">
                  <input type="text"  name="points_per_share" class="form-control" placeholder="Points  per share" value="{{$cw->points_per_share}}">
               </div>
               <label class="col-lg-3  mt-2 col-form-label">Coins on Purchasing</label>
               <div class="col-lg-3 mt-2">
                  <input type="text"  name="coins_on_purchasing" class="form-control" placeholder="Coins on Purchasing" value="{{$cw->coins_on_purchasing}}">
               </div>
               <label class="col-lg-3  mt-2col-form-label">No. of Coins</label>
               <div class="col-lg-3 mt-2">
                  <input type="text"  name="number_of_coins" class="form-control" placeholder="Points equal to money" value="{{$cw->number_of_coins}}">
               </div>
               <label class="col-lg-3 mt-2 col-form-label">Points equal to money</label>
               <div class="col-lg-3 mt-2">
                  <input type="text"  name="points_equal_to_money" class="form-control" placeholder="Points equal to money" value="{{$cw->points_equal_to_money}}">
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
