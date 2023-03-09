@extends('admin.layouts.scaffold')
@section('title')
Simsar | Edit Property
@endsection
@push('styles')
<style>
    .p-b-1per{
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
            Adding  Properties in <a href="{{url('attributes/'.$property->attribute_id)}}">{{ ucfirst($property->title) }}</a>
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
   <form action="{{url('update-property/'.$property->id)}}" method="POST"  class="kt-form kt-form--label-right" id="" novalidate="novalidate">
      {{ csrf_field() }}
       
      
      <div class="kt-portlet__body">
         <div class="row p-b-1per" >
            <div class="col-md-12 text-right">
               <a href="{{url('properties/'.$property->attribute_id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Properties Listing For {{ ucfirst($property->title) }}</button></a>
            </div>
         </div>
         <div class="kt-section">
            <div class="kt-section__content">
               <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Title*</label>
                  <div class="col-lg-3">
                     <input type="text"  name="title" class="form-control" placeholder="Enter Title" value="{{ $property->title }}" required>
                  </div>
                  <label class="col-lg-2 col-form-label">Description</label>
                  <div class="col-lg-3">
                     <textarea id="kt_maxlength_1" name="description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" >{{ $property->description }}</textarea>
                  </div>
               </div>
               
               <div class="form-group row">
              
                  <label class="col-lg-2 col-form-label">Status</label>
                  <div class="col-lg-3">
                     <select class="form-control kt-select2" name="status" id="kt_select2" name="select2" >
                        <option value="1" @if($property->status==1)  selected="selected" @endif>Active</option>
                        <option value="0" @if($property->status==0)  selected="selected" @endif>De Active</option>
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
