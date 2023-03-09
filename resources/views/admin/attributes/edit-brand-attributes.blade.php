@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Category
@endsection

@push('styles')
<style>
    .p-b-1-px{
        padding-bottom:1%;
    }
</style>
@endpush

@section('content')


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Edit Type Attributes
                </h3>
            </div>
        </div>

        
        <form action="{{url('update-type-attributes')}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <input type='hidden' value='{{$attributes[0]->id}}' name='attribute_id'>
            <div class="kt-portlet__body">
                <div class="row p-b-1-px">
                    <div class="col-md-12 text-right">
                        <a href="{{url('#')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Type Attributes Listing</button></a>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="title" class="form-control" value="{{$attributes[0]->title}}" placeholder="Enter Title">
                    </div>
                    <label class="col-lg-2 col-form-label">Description</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$attributes[0]->description}}</textarea>
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

       
    </div>
</div>


@endsection

@push('scripts')
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>
@endpush