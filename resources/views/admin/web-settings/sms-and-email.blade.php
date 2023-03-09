@extends('admin.layouts.scaffold')
@section('title')
Simsar | SMS / EMAIL
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
               SMS Settings
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
      <form action="{{url('sms')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
         {{ csrf_field() }}
         <div class="kt-portlet__body">
            <h3 class="text-center">SMS Setting</h3>
            <hr>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">Username</label>
               <div class="col-lg-3">
                  <input type="text"  name="username" class="form-control" placeholder="Username" value="{{$sms->username}}">
               </div>
               <label class="col-lg-2 col-form-label">Password</label>
               <div class="col-lg-3">
                  <input type="text"  name="password" class="form-control" placeholder="password" value="{{$sms->password}}">
               </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Customer ID</label>
                <div class="col-lg-3">
                   <input type="text"  name="customerId" class="form-control" placeholder="Customer ID" value="{{$sms->customerId}}">
                </div>
                <label class="col-lg-2 col-form-label">Sender Name</label>
                <div class="col-lg-3">
                   <input type="text"  name="senderText" class="form-control" placeholder="Sender Text" value="{{$sms->senderText}}" >
                </div>
             </div>
             <div class="form-group row">
                <div class="col-lg-12 text-right">
                   <button class="btn btn-success" type="submit">Update</button>
                </div>
             </div>
            </form>
            <h3 class="text-center">Email Setting</h3>
            <hr>
            <form action="{{url('email')}}" method="POST">
                {{csrf_field()}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Background Color</label>
                <div class="col-lg-3">
                    <input class="background_color no-alpha"  name="background_color" value="{{$email->background_color}}" required>
               </div>
               <label class="col-lg-2 col-form-label">Content Background Color</label>
                <div class="col-lg-3">
                    <input class="content_background_color no-alpha"  name="content_background_color" value="{{$email->content_background_color}}"  required>
               </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Font Color</label>
                <div class="col-lg-3">
                    <input class="font_color no-alpha"  name="font_color"  value="{{$email->font_color}}" required>
               </div>
               <label class="col-lg-2 col-form-label">Footer Font Color</label>
                <div class="col-lg-3">
                    <input class="footer_font_color no-alpha"  name="footer_font_color"  value="{{$email->footer_font_color}}" required>
               </div>
            </div>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label">CC</label>
               <div class="col-lg-10">
                   <input class="form-control"  name="cc" type="email" value="{{$email->cc}}" required>
              </div>
           </div>
         <div class="form-group row">
            <label class="col-lg-2 col-form-label">Footer Content</label>
            <div class="col-lg-10">
               <textarea name="footer_content" id="footer_content" cols="30" rows="5" class="form-control" required>{{$email->footer_content}}</textarea>
           </div>
        </div>
         <div class="form-group row">
            <div class="col-lg-12 text-right">
               <button class="btn btn-success" type="submit">Update</button>
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
