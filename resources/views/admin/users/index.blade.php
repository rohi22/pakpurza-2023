@extends('admin.layouts.scaffold')
@section('title')
Simsar | Users List
@endsection
@push('styles')
<style>
    .margin-top-bottom{
            margin-top: 25px;
    margin-left: 15px;
    }
    .p-b-1per{
    padding-bottom:1%; 
}
.center{
  text-align:center;  
}
.f-f{
    float:left;
}

    
    
</style>
@endpush
@section('content')

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
   <div class="kt-portlet kt-portlet--height-fluid">
      
      <form method="get" action="{{ url('user-filter') }}"> @csrf
          <div class="kt-portlet__head">
            <div class='row'>
                
                <div class="col-lg-3">
                    <label>ID:</label>
                    <select name="user_id" class="form-control">
                        <option value="">Select</option>
                        @if($user_filter->count() > 0)
                            @foreach ($user_filter as $key => $val)
                                <option value="{{ $val->id }}" @if(!empty($_GET['user_id']) && $_GET['user_id'] == $val->id) selected @endif>{{ $val->id }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <div class="col-lg-3">
                    <label>Name:</label>
                    <select name="user_name" class="form-control">
                        <option value="">Select</option>
                        @if($user_filter->count() > 0)
                            @foreach ($user_filter as $key => $val)
                                <option value="{{ $val->name }}" @if(!empty($_GET['user_name']) && $_GET['user_name'] == $val->name) selected @endif>{{ $val->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <div class="col-lg-3">
                    <label>Email:</label>
                    <select name="user_email" class="form-control">
                        <option value="">Select</option>
                        @if($user_filter->count() > 0)
                            @foreach ($user_filter as $key => $val)
                                @if(!empty($val->email))
                                    <option value="{{ $val->email }}" @if(!empty($_GET['user_email']) && $_GET['user_email'] == $val->email) selected @endif>{{ $val->email }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <div class="col-lg-3">
                    <label>Number:</label>
                    <select name="user_number" class="form-control">
                        <option value="">Select</option>
                        @if($user_filter->count() > 0)
                            @foreach ($user_filter as $key => $val)
                                @if(!empty($val->phone))
                                    <option value="{{ $val->phone }}" @if(!empty($_GET['user_number']) && $_GET['user_number'] == $val->phone) selected @endif>{{ $val->phone }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                
            </div>
            <div class="row">
                 <div class='col-lg-6'>
                    <button type="submit" class="btn btn-md btn-primary margin-top-bottom">Submit</button>
                </div>
                <div class="col-lg-6"></div>
            </div>
          </div>
      </form>
      
      <div class="kt-portlet__head">
         <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
               Users List
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
                           </svg>
                        </span>
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
            <div class="col-md-12 text-right">
                   <button type="button" class="btn btn-danger" id="btbdeleteall"><i class="fa fa-trash"></i>delete</button></a>
                </div>
         </div>
         <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
            <div class="kt-section__content">
               <div class="table-responsive">
                  <table class="table table-bordered" width="100%;">
                     <thead>
                        <tr>
                           <th width="5%;"  class="center"><input type="checkbox" name="user" id="user">#</th>
                           <th width="10%;" class="text-center">Unique Id</th>
                           <th width="10%;" class="text-center">Name</th>
                           <th width="15%;" class="text-center">Email</th>
                           <th width="10%;" class="text-center">Phone</th>
                           <th width="10%;" class="text-center">Date Of Joining</th>
                           <!--<th width="37%;" class="text-center">Role</th>-->
                           <th width="10%;" class="text-center">Status</th>
                           <th width="5%;" class="text-center">view</th>
                           <th width="5%;" class="text-center">Socials</th>
                           <th width="37%;" class="text-center">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if($User->count() > 0)
                        @foreach ($User as $key=>$user)
                        <tr>
                           <th scope="row" class="center"><input type="checkbox" value="{{$user->id}}" name="user[]" >   {{$key + $User->firstItem()}}</th>
                           <td align="center">{{ $user->unique_id }}</td>
                           <td align="center">{{ $user->name }}</td>
                           <td align="center">@if(!empty($user->email)) {{ $user->email }} @else Un Verified @endif</td>
                           <td align="center">@if(!empty($user->phone)) {{ $user->phone }} @else Un Verified @endif</td>
                           <td align="center">
                              {{ \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->format('d-m-Y') }}
                           </td>
                           <td align="center">
                              @if($user->is_block_count == 5)
                              Locked
                              @elseif($user->is_active==1)
                              Active
                              @else
                              Deactive
                              @endif
                           </td>
                           <td align="center">
                              <a href="{{url('admin-user-detail/'.$user->unique_id)}}"><i class="fa fa-eye"></i></a>
                           </td>
                           <td align="center">
                              <a href="javascript:;" onclick="socialAccounts($(this))" user-id="{{$user->id}}"><i class="fa fa-eye"></i></a>
                           </td>
                           <td align="center">
                              <select class="form-control f-f" name="change_status[]" id="{{ $user->id }}" >
                              <option value="1" @if($user->is_active==1) Selected @else  @endif >Active</option>
                              <option value="0" @if($user->is_active==0) Selected @else  @endif >DeActive</option>
                              </select>
                               @if($user->is_ban == 0)
                                <a href="{{url('user-block', $user->id)}}" class="btn btn-sm btn-danger btn-icon" title="Block"><i class="fa fa-ban"></i></a>
                              @else
                                <a href="{{url('user-un-block', $user->id)}}" class="btn btn-sm btn-warning btn-icon" title="Un Block"><i class="fa fa-check"></i></a>
                              @endif
                              <a href="{{url('edit-user-list/'.$user->id)}}"><button type="button" class="btn btn-type btn-primary btn-sm btn-icon" data-toggle="kt-popover" data-placement="top" data-content="Edit"><i class="fa fa-edit"></i></button>
                              <a href="javascript:;" onclick="generatePassword($(this))" data-user-id="{{$user->id}}"><button type="button" class="btn btn-type btn-success btn-sm btn-icon" data-toggle="kt-popover" data-placement="top" data-content="Generate Password"><i class="fa fa-lock"></i></button>
                              <!--<a href="javascript:;" ><button type="button"  class="showDeleteModal btn btn-type btn-danger  btn-sm btn-icon" data-toggle="kt-popover" data-id="{{$user->id}}" data-placement="top" data-content="Delete"><i class="fa fa-trash"></i></button></a>-->
                           </td>
                        </tr>
                
                        @endforeach
                        
                        {{--
                        {{$User->links()}}
                        --}}
                        
                        @else
                        
                        <tr>
                           <td colspan="8" class="center">No Record Found</td>
                        </tr>
                        @endif
                     </tbody>
                  </table>
                  {{$User->links()}}
                  
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="clipBoardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <div class="row">
               <div class="col-1"></div>
               <div class="col-8 text-right">
                  <input type="text" class="form-control" id="url" readonly="">
               </div>
               <div class="col-2 pull-left">
                  <button class="btn btn-success" onclick="copyToClipboard()">COPY</button>
               </div>
               <div class="col-1"></div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="socialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Social Accounts</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body socialModalData">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
<!-- end:: Content -->

<div class="modal fade show p-r-17px" id="deleteallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per">
                <center>
                    <i class="la la-info-circle c-fb-f-s-70px" ></i><br><br>
                    <h3>Are you sure?</h3>
                    <P>You won't be able to revert this!</P>
                    <div >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="deleteall">Yes, delete it!</button></div>
                </center>

            </div>
          
        </div>
    </div>
</div>


@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script>
   $("[name='change_status[]']").change(function(){
       var id = $(this).attr('id');
       var val = $(this).val();
       $.ajax({
           type : "post",
           url  : "{{ url('change-user-status') }}",
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
   
   
   function copyToClipboard() {
       $link = $("#url").select();
       document.execCommand('copy');
       $.notify("Copied", "success");
   }
   
   
   function generatePassword(elm){
       var user_id = elm.attr('data-user-id');
       
       $.ajax({
           type : "get",
           url  : "{{ url('generate-password') }}",
           data : {
           "user_id": user_id,
           },
           success:function(data){
              if(data.status=='success'){
                   $.notify("SMS/Email sent to user", "success");
                   $("#url").val(data.url);
                   $("#clipBoardModal").modal('show');
              }
              else if(data.status == 'error'){
                   $.notify("Error while generating link", "error");
              }
           },
           error:function(res){
               $.notify("Error while generating link", "error");
           }
       });
   }


   function socialAccounts(elm){
        user_id = elm.attr('user-id');
        $.ajax({
            type : "get",
            url  : "{{url('social-accounts')}}",
            data : {
                user_id : user_id,                
            },
            success:function(data){
                $(".socialModalData").empty();
                $(".socialModalData").html(data);
                $("#socialModal").modal('show');
            },
            error:function(data){

            }
        })
   }
   
   
   $('#btbdeleteall').click(function(){
        var values = $("input[name='user[]']:checked")
              .map(function(){return $(this).val();}).get();
                 if(values.length == 0){
               alert('Select First');
               return false;
           }
           else{
              $('#deleteallModal').modal("show");
           }
           
});
$('#deleteall').click(function(){
      var values = $("input[name='user[]']:checked")
              .map(function(){return $(this).val();}).get();
                   $.ajax({
        type : "post",
        url  : "{{ url('delete-user-all') }}",
        data : {
        "_token": "{{ csrf_token() }}",
       "user_id":values,

        },
        success:function(data){
            // alert(data);
           if(data==1){
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

            toastr.success('Record deleted', 'Deleted');

            location.reload().delay(8000);
           }
        },

    });
})
   
   
   
   
  $(document).ready(function(){
        $('#user').click(function(){
            if($(this).prop("checked") == true){
                $("[name='user[]']").attr("checked", "checked");
            }
            else if($(this).prop("checked") == false){
                $("[name='user[]']").removeAttr("checked");
            }
        });
    }); 
   
</script>
@endpush
