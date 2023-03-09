@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Shop Featured
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
                    Edit Shop Featured
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{url('admin/update-shop-featured-listings/'.$searchfeaturedlistings->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               
               <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$searchfeaturedlistings->title}}">
                    </div>
                    
                   <label class="col-lg-2 col-form-label">Shop Item Limit</label>
                    <div class="col-lg-3">
                        <input type="number" name="shop_item_limit" class="form-control" placeholder="Enter Shop Item Limit" value="{{$searchfeaturedlistings->shop_item_limit}}">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Cost</label>
                    <div class="col-lg-3">
                        <input type="number" name="cost" class="form-control" placeholder="Enter Cost" value="{{$searchfeaturedlistings->cost}}">
                    </div>
                    
                   
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="status" >
                            <option value="1" @if($searchfeaturedlistings->status==1)  selected="selected" @endif>Active</option>
                            <option value="0" @if($searchfeaturedlistings->status==0)  selected="selected" @endif>De Active</option>
                        </select>
                    </div>
                </div>
               

             
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        
                        <div class="col-lg-12">
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
@endpush