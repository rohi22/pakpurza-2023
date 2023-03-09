@extends('admin.layouts.scaffold')

@section('title')
Simsar | User Chat
@endsection

@push('styles')
<style>
    
   .p-b-1per{
    padding-bottom:1%; 
}
.center{
  text-align:center;  
}
.p-r-17px{
     padding-right: 17px;   
   }
.p-t-5per-p-b-11per{
       padding-top:5%; padding-bottom:11%; 
   }
.c-fb-f-s-70px{
       color:#fb02e6; font-size:70px; 
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
                    User Chat List
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
        <div class="kt-portlet__body">
            
            <div class="row p-b-1per">
                <div class="col-md-12 text-right">
                    <button type="button" id="btndeleteall" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                    {{--<a href="javascript:;" ><button type="button"  class="addAttributesModal btn btn-type btn-danger" >Add Attributes</button></a>
                    <a href="{{url('admin/create-types')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Types</button></a>--}}
                </div>
            </div>
              
            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;"  class="center"><input type="checkbox" name="chatid" id="chatid"> #</th>
                                    <th width="10%;" class="center"> S.no</th>
                                    <th width="10%;" class="center"> Date</th>
                                    <th width="10%;" class="center"> Buyer Id</th>
                                    <th width="10%;" class="center"> Buyer Name</th>
                                    <th width="10%;" class="center"> Seller ID</th>
                                    <th width="10%;" class="center"> Seller Name</th>
                                    <th width="10%;" class="center"> Ad ID</th>
                                    <th width="10%;" class="center"> Ad Title</th>
                                    <th width="10%;" class="center"> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($message_list->count() > 0)
                                @foreach ($message_list as $key=>$m)
                                    <tr>
                                       
                                       <td><input type="checkbox" value="{{$m->id}}" name="chatid[]"/>&nbsp;&nbsp;&nbsp;{{$key + $message_list->firstItem()}}</td>
                                        <td>{{$m->created_at}}</td>
                                        <td>{{$m->fromId}}</td>
                                        <td>{{$m->fromName}}</td>
                                        <td>{{$m->toId}}</td>
                                        <td>{{$m->toName}}</td>
                                        <td>{{$m->post_id}}</td>
                                        <td>{{$m->ad_title}}</td>
                                        <td><a class="btn btn-info btn-sm edit display-in-float-left m-r-5 m-b-5"  href="{{URL::to('admin/user-chat/'.$m->id)}}">
                                            View Chat
                                                </a></td>
                                       
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="center">No Record Found</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                        
                         {!! $message_list->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show p-r-17px" id="deleteallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per">
                <center>
                    <i class="la la-info-circle c-fb-f-s-70px"  ></i><br><br>
                    <h3>Are you sure?</h3>
                    <P>You won't be able to revert this!</P>
                    <P>All the data related to this particular category will be deleted permanently.</P>
                    <div >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="deleteall">Yes, delete it!</button></div>
                </center>

            </div>

        </div>
    </div>
</div>

<!-- end:: Content -->
@endsection

@push('scripts')
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
<script>
    $('#btndeleteall').click(function(){
         var values = $("input[name='chatid[]']:checked")
              .map(function(){return $(this).val();}).get(); 
                  if(values.length == 0){
               alert('Select First');
               return false;
           }else{
              $("#deleteallModal").modal('show'); 
           }
           
    });
    $('#deleteall').click(function(){
                 var values = $("input[name='chatid[]']:checked")
              .map(function(){return $(this).val();}).get(); 
               $.ajax({
                 type:"post",
                 url:"{{url('delete-chat-selected')}}",
                 data:{
                      "_token": "{{ csrf_token() }}",
                        "chatid": values,
                 },
                   success:function(datas){
            if(datas==1){
            $("#deleteallModal").modal('hide');
               toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};

            toastr.success('Record Deleted', 'Deleted');

            location.reload().delay(8000);
           }
                   },
                   error:function(data){}
             });
    });
    
$(document).ready(function(){
        $('#chatid').click(function(){
            if($(this).prop("checked") == true){
                $("[name='chatid[]']").attr("checked", "checked");
            }
            else if($(this).prop("checked") == false){
                $("[name='chatid[]']").removeAttr("checked");
            }
        });
    });    
    
    
</script>
@endpush