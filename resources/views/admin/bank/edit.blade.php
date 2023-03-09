@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Category
@endsection

@push('styles')
<style>
    .pb-1-percentage{
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
                    Edit Bank
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
        <form action="{{ route('admin.bank.update',$bank->id) }}" method="POST"  class="kt-form kt-form--fit kt-form--label-right"  >
            @csrf @method('PATCH')
            <div class="kt-portlet__body">
                <div class="row pb-1-percentage">
                    <div class="col-md-12 text-right">
                        <a href="{{route('admin.bank.create')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>Add Bank</button></a>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Bank Name</label>
                          <input type="text" name="name"  class="form-control" value="{{ $bank->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">A/C Title</label>
                            <input type="text" name="ac_title"  class="form-control" value="{{ $bank->ac_title }}">
                        </div>
                        <div class="form-group">
                            <label for="">A/C Number</label>
                            <input type="text" name="ac_number"  class="form-control" value="{{ $bank->ac_number }}">
                        </div>
                        <div class="form-group">
                            <label for="">Branch Name</label>
                            <input type="text" name="branch_name"  class="form-control" value="{{ $bank->branch_name }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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