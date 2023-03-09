@extends('admin.layouts.scaffold')
@section('title')
Simsar | Edit Attributes
@endsection
@push('styles')
<style>
    .p-b-1-px{
        padding-bottom:1%;
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
            Adding Attributes in <a href="{{url('sub-categories/'.$attributes->category_id)}}">{{ ucfirst($attributes->title) }}</a>
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
   <form action="{{url('update-attribute/'.$attributes->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
      
      
      <div class="kt-portlet__body">
         <div class="row p-b-1-px">
            <div class="col-md-12 text-right">
               
            </div>
         </div>
         
         <div class="kt-section">
            <div class="kt-section__content">
               <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Title*</label>
                  <div class="col-lg-3">
                     <input type="text"  name="title" class="form-control" value="{{ $attributes->title }}" placeholder="Enter Title" required>
                  </div>
                  <label class="col-lg-2 col-form-label">Type</label>
                  <div class="col-lg-3">
                     <select name="type" class="form-control" id="type" >
                        <option value="">Please Select</option>
                        <option value="1" @if($attributes->attribute_type_id==1)  selected="selected" @endif>Drop Down</option>
                        <option value="2" @if($attributes->attribute_type_id==2)  selected="selected" @endif>Button</option>
                        <option value="3" @if($attributes->attribute_type_id==3)  selected="selected" @endif>Text Box</option>
                     </select>
                  </div>
               </div>
               
               <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Description</label>
                  <div class="col-lg-3">
                     <textarea id="kt_maxlength_1" name="description" class="form-control"  maxlength="255" rows="2" placeholder="Enter Description" >{{ $attributes->description }}</textarea>
                  </div>
                  <label class="col-lg-2 col-form-label">Status</label>
                  <div class="col-lg-3">
                     <select class="form-control kt-select2" name="status" id="kt_select2" name="select2" >
                        <option value="1" @if($attributes->status==1)  selected="selected" @endif >Active</option>
                        <option value="0" @if($attributes->status==0)  selected="selected" @endif >De Active</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="kt-portlet__foot">
            <div class="kt-form__actions">
               <div class="row">
                  <div class="col-lg-12 text-right">
                     <button type="submit" class="btn btn-type">Update</button>
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
@endpush
