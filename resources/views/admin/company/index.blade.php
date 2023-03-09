@extends('admin.layouts.scaffold')

@section('title')
Simsar | Comapny List
@endsection

@push('styles')
<style>
    .p-b-1per{
        padding-bottom:1%; 
    }
    .center{
        text-align:center;
    }
    .f-l{
        float:left;
    }
    
</style>
@endpush

@section('content')


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Comapny List
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon-more-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md" >

                        <!--begin::Nav-->
                        <ul class="kt-nav">
                            <li class="kt-nav__head">
                                Export Options
                                <span data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Export data as Excel & Pdf">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--type kt-svg-icon--md1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                            <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"></rect>
                                            <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"></rect>
                                        </g>
                                    </svg> </span>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-sheet"></i>
                                    <span class="kt-nav__link-text">Export Excel</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-sheet"></i>
                                    <span class="kt-nav__link-text">Export Pdf</span>
                                </a>
                            </li>
                        </ul>

                        <!--end::Nav-->
                    </div>
                </div>
            </div>
        </div>
        
       
							
								
        <div class="kt-portlet__body" >
            <div class="row p-b-1per" >
                <div class="col-md-8"></div>
                
                <div class="col-md-2 text-right">
                   <button type="button" class="btn btn-danger" id="btbdeleteall"><i class="fa fa-trash"></i>delete</button></a>
                </div>
                
                <div class="col-md-2 text-right">
                    <a href="{{url('create-slider')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add a Slide</button></a>
                </div>
            </div>

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                                            
                                            
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;"  class="center"><input type="checkbox" name="company" id="company">#</th>
                                    <th width="10%;" class="text-center">User Id</th>
                                    <th width="10%;" class="text-center">Company Name</th>
                                   <th width="5%;" class="text-center">view</th>
                                    <th width="37%;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($company->count() > 0)
                                @foreach ($company as $key=>$c)
                                    <tr>
                                        <th scope="row" class="center"> <input type="checkbox" value="{{$c->id}}" name="company[]" >  {{$key + $company->firstItem()}}</th>
                                         <td>{{ $c->user_id }}</td>
                                         <td align="center">{{ $c->company_name }}</td>
                                         <td align="center"><a href="{{url('admin-user-detail/'.$c->id)}}"><i class="fa fa-eye"></i></a></td>
                                         <td align="center">
                                             
                                            <select class="form-control f-l" name="change_status[]" id="{{ $c->id }}"  >
                                                <option value="1" @if($c->status==1) Selected @else  @endif >Active</option>
                                                <option value="0" @if($c->status==0) Selected @else  @endif >DeActive</option>
                                                <option value="2" @if($c->status==2) Selected @else  @endif >Request Pending</option>
                                            </select>
                                               
                                             <a href="{{url('edit-company-list/'.$c->id)}}"><button type="button" class="btn btn-type btn-primary btn-sm btn-icon" data-toggle="kt-popover" data-placement="top" data-content="Edit"><i class="fa fa-edit"></i></button>
                                            <!--<a href="javascript:;" ><button type="button"  class="showDeleteModal btn btn-type btn-danger  btn-sm btn-icon" data-toggle="kt-popover" data-id="{{$c->id}}" data-placement="top" data-content="Delete"><i class="fa fa-trash"></i></button></a>-->
                                           
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
                        
                        {!! $company->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- end:: Content -->
@endsection

@push('scripts')
<script>
$("[name='change_status[]']").change(function(){
    var id = $(this).attr('id');
    var val = $(this).val();
         $.ajax({
        type : "post",
        url  : "{{ url('change-company-status') }}",
        data : {
        "_token": "{{ csrf_token() }}",
        "id": id,
        "val": val,
        },
        success:function(data){
           if(data.status=='success'){
                $.notify("Status updated", "success");   
                location.reload().delay(8000);
           }
           else if(data.status == 'error'){
                $.notify("Error while updating status", "error");
           }
        },
    });
});


$(document).ready(function(){
        $('#company').click(function(){
            if($(this).prop("checked") == true){
                $("[name='company[]']").attr("checked", "checked");
            }
            else if($(this).prop("checked") == false){
                $("[name='company[]']").removeAttr("checked");
            }
        });
    });

</script>

@endpush