@extends('admin.layouts.scaffold')

@section('title')
Simsar | Wallet Funds
@endsection

@push('styles')
<style>
    
    .p-10px-m-t{
        padding:10px;margin-top:10px;
    }
    .t-f-c{
        text-transform: capitalize;
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
   .t-365-r-0px-h-200px{
       top: 365px; right: 0px; height: 200px; 
   }
   .t-130px-h-70px{
     top: 130px; height: 70px;   
   }
   .p-r-17px{
     padding-right: 17px;   
   }
   .d-r{
       display: none; padding-right: 17px;
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
                    Wallet Funds
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


        <div class="row p-10px-m-t" >
            <div class="col-md-6 text-left ">

                <!--<input type="text" name="search" method="GET" class="form-control form-control-pill" placeholder="Search" required>-->

                <!--<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>-->


            </div>

           
        </div>

        <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
            <div class="kt-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Amount</th>
                                <th>Tax</th>
                                <th>Payment Method</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($transactions as $k=>$i)
                            <tr>
                                <td>{{$k + $transactions->firstItem()}}</td>
                                <td>{{$i->user_id}}</td>
                                <td>{{$i->username}}</td>
                                <td>KD {{$i->amount}}</td>
                                <td>KD {{$i->tax}}</td>
                                <td>{{$i->payment_method}}</td>
                                <td>{{$i->product_name}}</td>
                                 <td class="t-f-c">
                                  {{ str_replace("_"," ",$i->status) }}</td>
                                <td>
                            
                                    @if($i->status==1 && !$i->is_released)
                                    <form action="" method="POST">@csrf
                                        <input type="hidden" value="{{ $i->id }}" name="id">
                                        <button type="submit" name="release" value="1" class="btn btn-success btn-sm display-in-float-left m-r-5 m-b-5">Release</button>
                                    </form>
                                    @endif
                                    @if($i->status==0 && $i->payment_method_id == 1 )
                                    <!--&& $i->is_bank_payment_approved ==-->
                                    <form action="" method="POST">@csrf
                                        <input type="hidden" value="{{ $i->id }}" name="id">
                                        <button type="submit" name="bank_payment_approved" value="1" class="btn btn-success btn-sm display-in-float-left m-r-5 m-b-5">Accept</button>
                                        <button type="submit" name="bank_payment_approved" value="0" class="btn btn-danger btn-sm display-in-float-left m-r-5 m-b-5">Reject</button>
                                    </form>
                                    @endif
                                    @if($i->status==2 && $i->payment_method_id == 1)
                                    <form action="" method="POST">@csrf
                                        <input type="hidden" value="{{ $i->id }}" name="id">
                                        <button type="submit" name="refund" value="1" class="btn btn-success btn-sm display-in-float-left m-r-5 m-b-5">Refund</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    
                    {!! $transactions->links() !!}
                    
                </div>
            </div>
        </div>




    </div>
</div>
</div>




<div class="modal fade show d-r" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll ps ps--active-y h-200px" data-scroll="true" data-height="200">
                    <p id="ajaxData"></p>
                    <div class="ps__rail-x l-0px-b-365px" >
                        <div class="ps__thumb-x l-0px-w-0px" tabindex="0" ></div>
                    </div>
                    <div class="ps__rail-y t-365-r-0px-h-200px" >
                        <div class="ps__thumb-y t-130px-h-70px" tabindex="0" ></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade show p-r-17px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per">
                <center>
                    <i class="la la-info-circle c-fb-f-s-70px"></i><br><br>
                    <h3>Are you sure?</h3>
                    <P>You won't be able to revert this!</P>
                    <P>All the data related to this particular category will be deleted permanently.</P>
                    <div>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="deleteRecord">Yes, delete it!</button></div>
                </center>

            </div>

        </div>
    </div>
</div>
<!-- end:: Content -->
@endsection

@push('scripts')
<script>
    $(".descriptionModal").click(function() {
        var id = $(this).attr('data-id');
        var description = $("#description" + id).val();
        $("#ajaxData").html(null);
        $("#ajaxData").html(description);
        $("#categoryModal").modal('show');
    });

    $(".metaKeywordsModal").click(function() {
        var id = $(this).attr('data-id');
        var metaKeywords = $("#metaKeywords" + id).val();
        $("#ajaxData").html(null);
        $("#ajaxData").html(metaKeywords);
        $("#categoryModal").modal('show');
    });

    $(".metaDescriptionModal").click(function() {

        var id = $(this).attr('data-id');
        var metaDescription = $("#metaDescription" + id).val();
        $("#ajaxData").html(null);
        $("#ajaxData").html(metaDescription);
        $("#categoryModal").modal('show');
    });

    $(".showDeleteModal").click(function() {
        var id = $(this).attr('data-id');
        $("#deleteId").val("");
        $("#deleteId").val(id);
        $("#deleteModal").modal('show');
    });

    $("#deleteRecord").click(function() {
        var id = $("#deleteId").val();

        $.ajax({
            type: "post",
            url: "{{ url('delete-category') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,

            },
            success: function(data) {
                if (data == 1) {
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

                    toastr.success('Record Deleted', 'Deleted');

                    location.reload().delay(8000);
                }
            },

        });
    });
</script>
@endpush