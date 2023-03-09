@extends('admin.layouts.scaffold')
@section('title')
Simsar | Developer Mode
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
               Developer Mode Settings
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
      <form action="{{url('developer-mode')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
         {{csrf_field()}}
         <div class="kt-portlet__body">
             
             <div class="form-group row">
               <label class="col-lg-3 mt-2 col-form-label">Title</label>
               <div class="col-lg-3 mt-2">
                  <input type="text"  name="title" class="form-control" placeholder="Title" value="{{ $websetting->developer_title }}" required>
               </div>
            </div>
             
            <div class="form-group row">
               <label class="col-lg-3 mt-2 col-form-label">Tag Line</label>
               <div class="col-lg-3 mt-2">
                  <input type="text" name="tag_line" class="form-control" placeholder="Tag Line" value="{{ $websetting->developer_tag_line }}" required>
               </div>
            </div>
            
            <div class="form-group row">
                <label class="col-lg-3 mt-2 col-form-label">Description</label>
                <div class="col-lg-3">
                    <textarea id="kt_maxlength_1" name="description" class="form-control"  placeholder="" rows="5" placeholder="Enter Description" required>{{ $websetting->developer_description }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-lg-3 mt-2 col-form-label">Background Image</label>
                <div class="col-lg-3">
                    <input type="file" name="image" />
                </div>
                <div class="col-lg-3">
                    @if($websetting->developer_image)
                        <img src="{{URL::asset('public/assets/media/developer-mode/'.$websetting->developer_image)}}"  style="height:110px; width:250px;">
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-lg-3 mt-2 col-form-label">Status</label>
                <div class="col-lg-3">
                    <select class="form-control" name="status" required>
                        <option value="">--- Select ---</option>
                        <option value="1" @if($websetting->is_developer_mode == 1) selected @endif>On</option>
                        <option value="0" @if($websetting->is_developer_mode == 0) selected @endif>Off</option>
                    </select>
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

@endpush
