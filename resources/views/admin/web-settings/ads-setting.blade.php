@extends('admin.layouts.scaffold')
@section('title')
Simsar | Ads Setting
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
      <form action="{{url('ads-setting')}}" method="POST" class="kt-form kt-form--fit kt-form--label-right"  >
         {{csrf_field()}}
         <div class="kt-portlet__body">
            
            
            <div class="form-group row">
                <label class="col-lg-3 mt-2 col-form-label">Auto Ad Approve</label>
                <div class="col-lg-3">
                    <select class="form-control" name="status" required>
                        <option value="">--- Select ---</option>
                        <option value="1" @if($websetting->is_ad_auto_approve == 1) selected @endif>Yes</option>
                        <option value="0" @if($websetting->is_ad_auto_approve == 0) selected @endif>No</option>
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
