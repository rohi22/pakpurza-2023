@extends('admin.layouts.scaffold')
@section('title')
Simsar | Sub Create Category
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
         Adding Attributes in 
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
<form action="{{url('admin/save-attributes')}}" method="POST"  class="kt-form kt-form--label-right" id="" novalidate="novalidate">
   {{ csrf_field() }}
   <div class="kt-portlet__body">
      <div class="" style="padding-bottom:1%;">
         <div class="form-group row">
            <label class="col-lg-2 col-form-label">Title*</label>
            <div class="col-lg-3">
               <input type="text"  name="title"  class="form-control" placeholder="Title">
            </div>
            <label class="col-lg-2 col-form-label">Type</label>
            <div class="col-lg-3">
               <select name="type" class="form-control" id="type" >
                  <option value="">Please Select</option>
                  <option value="1">Drop Down</option>
                  <option value="2">Button</option>
                  <option value="3">Text Box</option>
               </select>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-lg-2 col-form-label">Description*</label>
            <div class="col-lg-3">
               <textarea id="kt_maxlength_1" name="description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>
            </div>
            <label class="col-lg-2 col-form-label">status</label>
            <div class="col-lg-3">
               <select class="form-control kt-select2" name="status" id="kt_select2" name="select2" >
                  <option value="1">Active</option>
                  <option value="0">De Active</option>
               </select>
            </div>
         </div>
         
         <div class="form-group row text_box_type" style="display:none;">
             <label class="col-lg-2 col-form-label">Text Box Type</label>
            <div class="col-lg-3">
               <select class="form-control kt-select2" name="text_box_type" id="text_box_type" name="select2" >
                  <option value="">Please Select</option>
                  <option value="1">Allow Numeric</option>
                  <option value="2">Allow Alphabetic</option>
                  <option value="3">Allow Both</option>
               </select>
            </div>
         </div>
         <div class="kt-portlet__foot">
            <div class="kt-form__actions">
               <div class="row">
                  <div class="col-lg-12 text-right">
                     <button type="submit" class="btn btn-type">Add</button>
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
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/custom/sub-category.js')}}" type="text/javascript"></script>
<script>
    $("#type").change(function(){
        var value = $(this).val();
        if(value==3){
            $('.text_box_type').show();
            $("#text_box_type").attr('required',true);
            $('#text_box_type option[value=""]').prop('selected', true);
        }
        else{
            $('.text_box_type').hide();
            $("#text_box_type").attr('required',true);
            $('#text_box_type option[value=""]').prop('selected', true);
        }
    });
</script>
@endpush
