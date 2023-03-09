@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Bids Setting
@endsection

@push('styles')

<style>
    .w-10per{
        width:100% !important;
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
                    Edit Bids Setting
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{url('update-bids-setting',$bidssetting->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                
                
                 <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Users </label>
                    <div class="col-lg-3">
                        <select class="form-control w-10per" id="" name="user"   >
                            <option value="">--Select--</option>
                             @if($user->count() > 0)
                                @foreach ($user as $key=>$u)
                                 <option value="{{$u->id}}" @if($bidssetting->user_id == $u->id)  selected="selected" @endif>{{$u->unique_id}}</option>
                                 @endforeach
                             @endif
                         </select>
                    </div>
                </div>

                
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control kt-select2" name="status" id="kt_select2" name="select2">
                            <option value="1" @if($bidssetting->status==1)  selected="selected" @endif>Active</option>
                            <option value="0" @if($bidssetting->status==0)  selected="selected" @endif>De Active</option>
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

@endpush