@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Slider
@endsection

@push('styles')
<style>
    .bg-height-width{
       
    }
    .pb-1-percentage{
        padding-bottom:1%;
    }
    .select2 .select2-selection__arrow{
        line-height:18px;
    }
    .select2 span{
        line-height:9px;
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
                    Add Slider
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
        <form action="{{url('store-application-slider')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                <div class="row pb-1-percentage">
                    <div class="col-md-12 text-right">
                        <a href="{{url('application-slider')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Application Slider Listing</button></a>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Slider</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="width:350px; height:220px; background-image: url(https://mrcpotencia.com/simsar/public/assets/media/users/100_1.jpg);"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="slider" class="checkImageValid" >
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        <span class="form-text text-muted">350px Width * 220px Height</span>
                    </div>
                    
                     <label class="col-lg-2 col-form-label">Image Alt</label>
                    <div class="col-lg-3">
                        <input type="text" name="image_alt" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control kt-select2" name="status" id="kt_select2" name="select2">
                            <option value="1">Active</option>
                            <option value="0">De Active</option>
                        </select>
                    </div>
                    <label class="col-lg-2 col-form-label">Back Link</label>
                    <div class="col-lg-3">
                        <input type="url" name="back_link" class="form-control">
                    </div>
                </div>
        </div>
        <div class="kt-portlet__foot kt-portlet__foot--fit-x">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-secondary" onclick="window.location='{{ URL::previous() }}'">Cancel</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinyColorPicker/1.1.1/jqColorPicker.min.js"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>

<script type="text/javascript">
    $('.color').colorPicker(); // that's it
</script>

@endpush