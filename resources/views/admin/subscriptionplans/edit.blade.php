@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Category
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
                    Edit Category
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{url('admin/update-subscription-plans/'.$subscriptionplans->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               
                 <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$subscriptionplans->title}}">
                    </div>
                    
                    <label class="col-lg-2 col-form-label">No. Of Post</label>
                    <div class="col-lg-3">
                        <input type="number" name="no_of_post" class="form-control" placeholder="Enter No. Of Post" value="{{$subscriptionplans->no_of_post}}">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Cost</label>
                    <div class="col-lg-3">
                        <input type="number" name="cost" class="form-control" placeholder="Enter Cost" value="{{$subscriptionplans->cost}}">
                    </div>
                    
                    <label class="col-lg-2 col-form-label">No Of Days</label>
                    <div class="col-lg-3">
                        <input type="number" name="duration" class="form-control" placeholder="Enter No Of Days" value="{{$subscriptionplans->duration}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="status" >
                            <option value="1" @if($subscriptionplans->status==1)  selected="selected" @endif>Active</option>
                            <option value="0" @if($subscriptionplans->status==0)  selected="selected" @endif>De Active</option>
                        </select>
                    </div>
                </div>
               

<div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;"  class="center">#</th>
                                    <th width="25%;">Title</th>
                                    <th width="10%;" class="center">Status</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                @if($setting->count() > 0)
                                @foreach ($setting as $key=>$s)
                                    <tr>
                                        <th scope="row" class="center">{{++$key}}</th>
                                        <td>
                                            {{ucfirst($s->field_title)}} 
                                        <input type="hidden" name="field_id[]" value="{{$s->id}}">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="checkbox_status[]"  @if($s->activestatus == 1) checked @endif value="0" />
                                            <input type="text" name="field_status[]" value="@if($s->activestatus == 1) 1 @else 0 @endif">
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
                    </div>
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