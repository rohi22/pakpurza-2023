@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Type
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
                    Add Type
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{url('update-sub-type/'.$brand->id)}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                <div class="row p-b-1per">
                    <div class="col-md-12 text-right">
                        <a href="{{url('admin/types')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Type Listing</button></a>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text" name="title" class="form-control" value="{{$brand->title}}" placeholder="Enter Title">
                    </div>
                    <label class="col-lg-2 col-form-label">Description</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$brand->description}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image*</label>
                    <div class="col-lg-3">
                   
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url(https://minibigerp.com/simsar/public/assets/media/sub-brand/image/{{ $brand->image }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="image" accept="image/*">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>

                    <label class="col-lg-2 col-form-label">Icon Image*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                            
                            
                            <div class="kt-avatar__holder" style="background-image: url(https://minibigerp.com/simsar/public/assets/media/sub-brand/icon/{{ $brand->icon_image }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="icon" accept="image/*">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Meta Keywords</label>
                    <div class="col-lg-3">
                        <input id="kt_tagify_5" name='meta_keywords' placeholder="Add users" class="form-control"  value="{{$brand->meta_keywords}}">
                        <div class="kt-margin-t-10">
                            Dropdown item and tag templates.
                        </div>
                    </div>
                    <label class="col-lg-2 col-form-label">Meta Descriptsion</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_2" name="meta_description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$brand->meta_description}}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control kt-select2" name="status" id="kt_select2" name="select2">
                            <option value="1" @if($brand->status==1)  selected="selected" @endif>Active</option>
                            <option value="0" @if($brand->status==0)  selected="selected" @endif>De Active</option>
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