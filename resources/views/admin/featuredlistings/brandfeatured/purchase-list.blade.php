@extends('admin.layouts.scaffold')

@section('title')
Simsar | Purchases Type Featured List
@endsection

@push('styles')
<style>
 .center{
     text-align:center;
 }   
 .h-200px{
     height: 200px; overflow: hidden; 
 }
 .l-0px-b-365px{
   left: 0px; bottom: -365px;   
 }
 .l-0px-w-0px{
   left: 0px; width: 0px;   
 }
 .t-365px-r-0px-h-200px{
    top: 365px; right: 0px; height: 200px;  
 }
 .t-130px-h-70px{
  top: 130px; height: 70px;    
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
 .p-r-17px{
   padding-right: 17px;   
 }
 .c-fb-f-s-70px{
  color:#fb02e6; font-size:70px;    
 }
 .{
     
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
                    Purchases Type Featured List
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
        <div class="kt-portlet__body">
            <!--<div class="row" style="padding-bottom:1%;">-->
            <!--    <div class="col-md-12 text-right">-->
            <!--        <a href="{{url('admin/create-subscription-plans')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Subscription Plans</button></a>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;"  class="center">#</th>
                                    <th width="25%;">User Id</th>
                                    <th width="25%;">Purchase Id</th>
                                    <th width="25%;">Plan</th>
                                    <th width="25%;">Amount</th>
                                    <th width="25%;">Start Date</th>
                                    <th width="25%;">End Date</th>
                                    <!--<th width="25%;">Validity</th>-->
                                    <th width="25%;">Payment Method</th>
                                    
                                     <th width="25%;">Status</th>
                                    
                                    <th width="15%;"  class="center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($purchasessearchfeatured->count() > 0)
                                @foreach ($purchasessearchfeatured as $key=>$p)
                                    <tr>
                                       
                                        <th scope="row" class="center">{{$key + $purchasessearchfeatured->firstItem()}}</th>
                                        <td>
                                           <a href="javascript:;" ><span class="showUserModal" data-toggle="kt-popover" data-id="{{$p->id}}" data-placement="top" data-content="view">{{$p->user_id}}</i></span></a> 
                                        </td>
                                        <td >Purchase</td>
                                        <td >{{$p->Plan_title}}</td>
                                        <td >{{$p->total_amount}}</td>
                                         <td >{{$p->start_date}}</td>
                                        <td >{{$p->end_date}}</td>
<!--                                        <td >-->
                 
<!--$date1 = new DateTime("now");-->
<!--$date2 = new DateTime($p->end_date);-->

<!--$diff=date_diff($date1,$date2);-->
<!--echo $diff->format("%R%a days");-->
<!--?>-->
<!--</td>-->
                                        <td>  
                                            @if($p->payment_type == 1)
                                                Bank Deposit
                                            @else
                                                Other
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->status == 0)
                                                Pending
                                            @elseif($p->status == 1)
                                                Acive
                                            @elseif($p->status == 2)
                                                Expired
                                            @elseif($p->status==3)
                                                Rejected
                                            @elseif($p->status==4)
                                                 Acive
                                            @endif
                                        </td>

                                        
                                       
                                        <td align="center">
                                        <?php //if($p->payment_type == 1 && $p->status == 0){ ?>
                                        <?php if($p->status == 0){ ?>
                                            
                                            <a href="javascript:;" ><button type="button"  class="showApproveModal btn btn-type btn-success  btn-sm btn-icon" data-toggle="kt-popover" data-id="{{$p->id}}" data-placement="top" data-content="Approve"><i class="fa fa-check"></i></button></a>
                                            <a href="javascript:;" ><button type="button"  class="showrejectModal btn btn-type btn-danger  btn-sm btn-icon" data-toggle="kt-popover" data-id="{{$p->id}}" data-placement="top" data-content="Reject"><i class="fas fa-window-close"></i></button></a>
                                           
                                            <?php } else{
                                            echo "None";
                                        }?>
                                          
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
                        
                        {!! $purchasessearchfeatured->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade show" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll ps ps--active-y h-200px" data-scroll="true" data-height="200" >
                    <p id="ajaxData"></p>
                <div class="ps__rail-x l-0px-b-365px" ><div class="ps__thumb-x l-0px-w-0px" tabindex="0" ></div></div><div class="ps__rail-y t-365px-r-0px-h-200px" ><div class="ps__thumb-y t-130px-h-70px" tabindex="0" ></div></div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade show p-r-17px" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                    <i class="la la-info-circle c-fb-f-s-70px"  ></i><br><br>
                    <h3>Are you sure?</h3>
                    <p>Are You Sure?  You Want To Verify The Transaction with ID: <b> <span id='transaction_id'></span> ?</b> </p>
                    {{--
                    <P>You won't be able to revert this!</P>
                    <P>All the data related to this particular category will be deleted permanently.</P>
                    --}}
                    <div >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="approveRecord">Yes, Approve it!</button></div>
                </center>

            </div>

        </div>
    </div>
</div>

<!--//made by h-->
<div class="modal fade show p-r-17px" id="rejectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="rejdeleteId">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                    <i class="la la-info-circle c-fb-f-s-70px"  ></i><br><br>
                    <h3>Are you sure?</h3>
                    <!--<P>You won't be able to revert this!</P>-->
                    <!--<P>All the data related to this particular category will be deleted permanently.</P>-->
                    <div >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="rejectRecord">Yes, Reject it!</button></div>
                </center>

            </div>

        </div>
    </div>
</div>

<!--made by h end-->

<div class="modal fade show p-r-17px" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                    <!--<i class="la la-info-circle" style="color:#fb02e6; font-size:70px;" ></i><br><br>-->
                    <h3>User Detail</h3>
                    <!--<P>You won't be able to revert this!</P>-->
                    <!--<P>All the data related to this particular category will be deleted permanently.</P>-->
                    
                </center>

            </div>

        </div>
    </div>
</div>
<!-- end:: Content -->
@endsection

@push('scripts')
<script>

$(".descriptionModal").click(function(){
    var id = $(this).attr('data-id');
    var description = $("#description"+id).val();
    $("#ajaxData").html(null);
    $("#ajaxData").html(description);
    $("#categoryModal").modal('show');
});

$(".metaKeywordsModal").click(function(){
    var id = $(this).attr('data-id');
    var metaKeywords = $("#metaKeywords"+id).val();
    $("#ajaxData").html(null);
    $("#ajaxData").html(metaKeywords);
    $("#categoryModal").modal('show');
});

$(".metaDescriptionModal").click(function(){

    var id = $(this).attr('data-id');
    var metaDescription = $("#metaDescription"+id).val();
    $("#ajaxData").html(null);
    $("#ajaxData").html(metaDescription);
    $("#categoryModal").modal('show');
});

$(".showApproveModal").click(function(){
    var id = $(this).attr('data-id');
    $("#deleteId").val("");
    $("#deleteId").val(id);
     $("#transaction_id").html(id);
    $("#approveModal").modal('show');
});

$(".showrejectModal").click(function(){
    var id = $(this).attr('data-id');
    
    $("#rejdeleteId").val("");
    $("#rejdeleteId").val(id);
    $("#rejectmodal").modal('show');
});

$(".showUserModal").click(function(){
    var id = $(this).attr('data-id');
    
    $("#userModal").modal('show');
});

$("#approveRecord").click(function(){
    var id = $("#deleteId").val();

    $.ajax({
        type : "post",
        url  : "{{ url('admin/approve-type-plans/') }}",
        data : {
        "_token": "{{ csrf_token() }}",
        "id": id,

        },
        success:function(data){
           if(data==1){
            $("#deleteModal").modal('hide');
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

            toastr.success('Approve', 'Success');

            location.reload().delay(8000);
           }
        },

    });
});
        console.log("{{ csrf_token() }}");
$("#rejectRecord").click(function(){
    var id = $("#rejdeleteId").val();
   
    $.ajax({
        type : "post",
        url  : "{{ url('admin/reject-type-plans/') }}",
        data : {
        "_token": "{{ csrf_token() }}",
        "id": id,
        
        },
        success:function(data){
        console.log(data);
          if(data==1){
                $("#rejectmodal").modal('hide');
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
    
                toastr.success('Record Rejected', 'Rejected');
    
                location.reload().delay(8000);
          }
           
        },

    });
});
</script>
@endpush