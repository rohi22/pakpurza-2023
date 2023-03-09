@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Faq
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
                    Edit Faq
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
        <form action="{{ url('admin/update-faq/'.$faq->id) }}" method="POST" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               
               
               
                <div class="form-group row">
                    <div class="col-lg-12">
                    <label>Faq Category</label>
                        <select class="form-control kt-select2" name="category_id" id="kt_select2" name="select2">
                            <option  >--Select--</option>
                            @if($faq_cat->count() > 0)
                                @foreach ($faq_cat as $key=>$f)
                                  <option value="{{$f->id}}" @if($faq->category_id == $f->id)  selected="selected" @endif >{{$f->title}}</option>
                                 @endforeach
                                @else
                            @endif
                        </select>
                        </div>
                 </div>
                 
                 
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Question</label>
                        <textarea id="kt_maxlength_1" name="q" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$faq->question}}</textarea>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Answer</label>
                        <textarea id="kt_maxlength_1" name="a" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$faq->answer}}</textarea>
                    </div>
                </div>

                

              
                
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        
                        <div class="col-lg-12 text-right">
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