@extends('admin.layouts.scaffold')

@section('title')
Simsar | Payment Control Setting
@endsection

@push('styles')
<style>
    .center{
        text-align:center;
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
                    Payment Control Setting
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
        <form action="{{url('update-payment-setting')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               

                <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;"  class="center">#</th>
                                    <th width="25%;">Title</th>
                                    <th width="10%;" clss="center">Status</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                @if($paymentsetting->count() > 0)
                                @foreach ($paymentsetting as $key=>$s)
                                    <tr>
                                       
                                        <th scope="row" class="center">{{$key + $paymentsetting->firstItem()}}</th>
                                        <td>{{ucfirst($s->getPayment->payment_title)}} <input type="hidden" name="field_id[]" value="{{$s->id}}"></td>
                                        <td>
                                            <input type="checkbox" name="checkbox_status[]"  @if($s->status == 1) checked @endif value="0" />
                                            <input type="hidden" name="field_status[]" value="@if($s->status == 1) 1 @else 0 @endif">
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="center">No Record Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        {!! $paymentsetting->links() !!}
                        
                    </div>
                </div>
            </div>
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{url('payment-setting')}}" type="reset" class="btn btn-secondary">Cancel</a>
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

<script>

 $('input[name="checkbox_status[]"]').click(function(){
    if ($(this).is(":checked")) { 
                $(this).next().val(1); 
            } else { 
                $(this).next().val(0); 
            } 
   });
</script>
@endpush