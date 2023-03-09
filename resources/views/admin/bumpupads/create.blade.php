@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Bump Up Ads
@endsection

@push('styles')
<style>
    .w-100per{
        width:100%; 
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
                    Add Bump Up Ads
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
        <form action="{{url('admin/save-bump-up-ads')}}" method="POST" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Placement*</label>
                    <div class="col-lg-3">
                        <select class="form-control" id="placement" name="placement" style="width:100%;" >
                            <option value="">--Select--</option>
                              @if($pagelists->count() > 0)
                                @foreach ($pagelists as $key=>$pagelist)
                                
                                <option value="{{$pagelist->id}}">{{ucfirst($pagelist->page_title)}}</option>
                                  @endforeach
                                @endif
                          
                         </select>
                    </div>
                    
                    
                     <label class="col-lg-2 col-form-label category" style="display:none;">Select Category *</label>
                    <div class="col-lg-3 category"  style="display:none;">
                        <select class="form-control" id="select_category" name="select_category" style="width:100%;" >
                            <option value="0">--Select--</option>
                               d
                                @if($category->count() > 0)
                                @foreach ($category as $key=>$c)
                                
                                <option value="{{$c->id}}">{{ucfirst($c->title)}}</option>
                                  @endforeach
                                @endif
                          
                         </select>
                    </div>
                    
                    
                    <label class="col-lg-2 col-form-label type" style="display:none;">Select Type *</label>
                    <div class="col-lg-3 type"  style="display:none;">
                        <select class="form-control" id="select_type" name="select_type" style="width:100%;" >
                            <option value="0">--Select--</option>
                               
                                @if($brands->count() > 0)
                                @foreach ($brands as $key=>$b)
                                
                                <option value="{{$b->id}}">{{ucfirst($b->title)}}</option>
                                  @endforeach
                                @endif
                          
                         </select>
                    </div>
                    
                    
                    
                   
                </div>
                
                <div class="form-group row">
                     <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
                        <!--<input type="text"  name="charges" id="charges" class="form-control" placeholder="Charges">-->
                    </div>
                      <label class="col-lg-2 col-form-label">Per Day Cost *</label>
                    <div class="col-lg-3">
                        <input type="text" name="price" class="form-control" placeholder="Per Day Cost">
                    </div>
                    
                </div>
                
                
                 <div class="form-group row">
                  
                     <label class="col-lg-2 col-form-label">Quantity *</label>
                    <div class="col-lg-3">
                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                    </div>
                    
                    <label class="col-lg-2 col-form-label">status</label>
                    <div class="col-lg-3">
                        <select class="form-control w-100per" name="status"  >
                            <option value="1">Active</option>
                            <option value="0">De Active</option>
                         </select>
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




<script>
$("#placement").change(function(){
    var val = $(this).val();
    // alert(val);

    if(val == 3){
        $('.category').css('display','block');
        $('.type').css('display','none');
    }
    else  if(val == 2){
        $('.type').css('display','block');
         $('.category').css('display','none');
    }
    else{
        
         $('#select_category option').prop('selected', false);
        
         $('.category').css('display','none');
         $('.type').css('display','none');
    }
});



</script>

@endpush