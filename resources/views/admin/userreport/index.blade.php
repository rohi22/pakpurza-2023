@extends('admin.layouts.scaffold')

@section('title')
Simsar | User Report List
@endsection

@push('styles')
<style>
    .center{
  text-align:center;  
}
.f-f{
    float:left;
}
.d-p-px{
    display: none; padding-right: 19px;
}
.p-t-5per-p-b-11per{
       padding-top:5%; padding-bottom:11%; 
   }
   .f-70px{
       font-size:70px;
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
                    User Report List
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon-more-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md" style="">

                        <!--begin::Nav-->
                        <ul class="kt-nav">
                            <li class="kt-nav__head">
                                Export Options
                                <span data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Export data as Excel & Pdf">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
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
        <div class="kt-portlet__body">
        

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;"  class="center">#</th>
                                    <th width="25%;">Report Title</th>
                                    <th width="10%;" class="center">Ad Id</th>
                                    <th width="17%;" class="center">Comment</th>
                                   
                                    <th width="15%;" class="center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($userAdReport->count() > 0)
                                @foreach ($userAdReport as $key=>$r)
                                    <tr>
                                      
                                        <th scope="row" class="center"> <input type="checkbox" value="{{$r->id}}" name="userAdReport[]" > {{$key + $userAdReport->firstItem()}}</th>
                                        
                                        <td>{{ucfirst($r->report)}}</td>
                                        <td>{{$r->ad_id}}</td>
                                        <td>{{$r->comment}}</td>
                                      
                                        <td align="center">
                                            
                                            
                                            <select class="form-control f-f" name="change_status[]" id="{{ $r->id }}" >
                                              <option>--Select--</option>
                                              <option value="1" @if($r->action_status == 1) selected @endif>Deactivate User</option>
                                              <option value="2" @if($r->action_status == 2) selected @endif>Ban User</option>
                                              <option value="3" @if($r->action_status == 3) selected @endif>Ban User & Deactivate Post</option>
                                              <option value="4" @if($r->action_status == 4) selected @endif>Post Deactivate</option>
                                              <option value="5" @if($r->action_status == 5) selected @endif>Delete Post</option>
                                              <option value="6" @if($r->action_status == 6) selected @endif>Ignore Report</option>
                                              
                                              </select>
                              
                                            <!--<a href="{{url('edit-category/'.$r->id)}}"><button type="button" class="btn btn-brand btn-primary btn-sm btn-icon" data-toggle="kt-popover" data-placement="top" data-content="Edit"><i class="fa fa-edit"></i></button>-->
                                            <!--<a href="javascript:;" ><button type="button"  class="showDeleteModal btn btn-brand btn-danger  btn-sm btn-icon" data-toggle="kt-popover" data-id="{{$r->id}}" data-placement="top" data-content="Delete"><i class="fa fa-trash"></i></button></a>-->
                                            <!--<a href="{{url('create-sub-category/'.$r->id)}}" ><button type="button"  class="btn btn-brand btn-info  btn-sm btn-icon" data-toggle="kt-popover"  data-placement="top" data-content="Add Sub Category"><i class="fa fa-list"></i></button></a>-->
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
                        
                        {!! $userAdReport->links() !!}
                        
                    </div>
                </div>
            </div>
            
            
            
            
        </div>
    </div>
</div>

<!-- reason modal -->
<div class="modal fade show d-p-px" id="reasonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per">
                <center>
                    <i class="fa fa-comments f-70px" ></i><br><br>
                    <labe>Reason:</labe>
                    <textarea class="form-control" id="reasnContent"></textarea> <br>
                    
                    <div>
                        <input type="hidden" id="id" />
                        <input type="hidden" id="val" />
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="update">Save</button></div>
                </center>

            </div>

        </div>
    </div>
</div>
<!-- end -->

@endsection

@push('scripts')
<script>



    $("[name='change_status[]']").change(function(){
        
        $('#id').val('');
        $('#val').val('');
        $('#reasnContent').val('');
        
       var id = $(this).attr('id');
       var val = $(this).val();
       
        $('#id').val(id);
        $('#val').val(val);
        
        $('#reasonModal').modal('show'); // return false; 
      
   });
   
   $('#update').click( function(){
       
       var id = $('#id').val();
       var val = $('#val').val();
       var reasnContent = $('#reasnContent').val();
       
       console.log(id, val, reasnContent);// return false;
       
       $.ajax({
           type : "post",
           url  : "{{ url('change-report-status') }}",
           data : {
           "_token": "{{ csrf_token() }}",
           "id": id,
           "val": val,
           "reasnContent" : reasnContent
           },
           success:function(data){
              if(data.status=='success'){
                  
                  $('#reasonModal').modal('hide');
                  
                   $.notify("Status updated", "success");   
                //   location.reload().delay(8000);
              }
              else if(data.status == 'error'){
                   $.notify("Error while updating status", "error");
              }
           },
       });
   });
   
   
   
</script>
@endpush