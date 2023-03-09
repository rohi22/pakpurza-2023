@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Category
@endsection

@push('styles')
<style>
    .select2 .select2-selection__arrow{
            height: 26px !important;
    position: absolute !important;
    top: 15px !important; 
    right: 1px !important;
    width: 20px !important;
    }
    .select2 .select2-selection__rendered{
        line-height:11px !important;
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
                    Edit Category
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{url('admin/faq-category-update/'.$faqcategory->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                <!--<div class="row" style="padding-bottom:1%;">-->
                <!--    <div class="col-md-12 text-right">-->
                <!--        <a href="{{url('categories')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Category Listing</button></a>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="title" class="form-control" value="{{$faqcategory->title}}" placeholder="Enter Title">
                    </div>
                   
                </div>

                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control kt-select2" name="status" id="kt_select2" name="select2">
                            <option value="1" @if($faqcategory->status==1)  selected="selected" @endif>Active</option>
                            <option value="0" @if($faqcategory->status==0)  selected="selected" @endif>De Active</option>
                        </select>
                    </div>
                 </div>
               

             
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
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