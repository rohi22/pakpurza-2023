@extends('admin.layouts.scaffold')

@section('title')
Simsar | Wallet Transaction
@endsection

@push('styles')
<style>
    
   .p-b-1per{
    padding-bottom:1%; 
}
.center{
  text-align:center;  
}

.center-1{
    text-align:center;text-transform: uppercase
}
    
   .l-0px-b-365px{
     left: 0px; bottom: -365px;   
   }
   c
   .t-365-r-0px-h-200px{
       top: 365px; right: 0px; height: 200px; 
   }
   
   
   
   
   .p-px{
       padding:10px;margin-top:10px;
   }
   .d-px{
       display: none; padding-right: 17px;
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
                    Wallet Transaction
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
            <div class="row p-b-1per" >
                <div class="col-md-8 text-right"></div>
                   <div>
                   <button type="button" class="btn btn-danger" id="btbdeleteall"><i class="fa fa-trash"></i>delete</button></a>
                </div>
                </div>
    
            <div class="row p-px" >
                <div class="col-md-4 text-left ">
                    <form action="{{url('search')}}">
                        <input type="text" name="search" method="GET" class="form-control form-control-pill" placeholder="Search">
                    </form>


                </div>
                <div class="col-md-5  ">
                   <form action="{{ url()->current() }}" method="GET">
                    <select name="uid" class="filter uid">
                        <option value="">User ID</option>
                        @if(count($filter_user_id))
                            @php($arr[] = array())
                            @foreach($filter_user_id as $key=>$item)
                                @if(!in_array($item->unique_id, $arr))                                
                                    <option>{{ $item->unique_id }}</option>
                                    @php(array_push($arr,$item->unique_id))
                                @endif
                            @endforeach
                        @endif
                    </select>

                    <select name="uname" class="filter uname">
                        <option value="">User Name</option>
                        @if(count($filter_user_name))
                            @php($arr[] = array())
                            @foreach($filter_user_name as $key=>$item)
                                @if(!in_array($item->name, $arr))                                
                                    <option>{{ $item->name }}</option>
                                    @php(array_push($arr,$item->name))
                                @endif
                            @endforeach
                        @endif
                    </select>

                    <select name="rt" class="filter rt">
                        <option value="">Request Type</option>
                        @if(count($filter_type))
                            @php($arr[] = array())
                            @foreach($filter_type as $key=>$item)
                                @if(!in_array($item->request_type, $arr))                                
                                    <option>{{ $item->request_type }}</option>
                                    @php(array_push($arr,$item->request_type))
                                @endif
                            @endforeach
                        @endif
                    </select>

                    <select name="status" class="filter status">
                        <option value="">Status</option>
                        @if(count($filter_status))
                            @php($arr[] = array())
                            @foreach($filter_status as $key=>$item)
                                @if(!in_array($item->status, $arr))                                
                                    <option>{{ $item->status }}</option>
                                    @php(array_push($arr,$item->status))
                                @endif
                            @endforeach
                        @endif
                    </select>
                    
                </form>

                </div>

                <div class="col-md-3 text-right">
                    {{-- <a href="{{url('create-category')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Funds</button></a> --}}
                </div>
            </div>

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;" class="center">#</th>
                                    <th width="25%;">Date</th>
                                    <th width="10%;" class="center">User ID</th>
                                    <th width="17%;" class="center">User Name</th>
                                    <th width="8%;" class="center">Transaction ID</th>
                                    <th width="10%;" class="center">Request Type</th>
                                    <th width="10%;" class="center">Payment Method</th>
                                    <th width="10%;" class="center">Debit</th>
                                    <th width="10%;" class="center">Credit</th>
                                    <th width="10%;" class="center">Status</th>
                                    <th width="15%;" class="center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $key=>$item)
                                <tr>
                                    <th width="5%;" class="center">{{ $key+1 }}</td>
                                    <td width="25%;" class="center">{{ $item->created_at }}</th>
                                    <td width="10%;" class="center">{{ $item->unique_id }}</td>
                                    <td width="17%;" class="center">{{ $item->name }}</td>
                                    <td width="8%;" class="center-1">{{ $item->tid }}</td>
                                    <td width="10%;" class="center">{{ $item->request_type }}</td>
                                    <td width="10%;" class="center">{{ $item->payment_method }}</td>
                                    <td width="10%;" class="center">{{ $item->debit }}</td>
                                    <td width="10%;" class="center">{{ $item->credit }}</td>
                                    <td width="10%;" class="center">@if($item->status == 0) <span class='badge badge-secondary'>Pending</span> @elseif($item->status == 1) <span class='badge badge-success'>Approved</span> @endif</td>
                                    <td width="15%;" class="center">
                                        @if($item->status == 0 && $item->request_type == "deposit" )
                                            <form class="deposit_form" action="{{ url()->current() }}" method="POST" > @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <input type="hidden" value="{{ $item->request_type }}" name="request_type">
                                            <button type="button" data-id="{{ $item->id }}" class="deposit_form_submit btn btn-success btn-icon btn-sm"><i class="fas  fa-check"></i></button>
                                        </form>
                                        @elseif($item->status == 0 && $item->request_type == "withdraw")
                                        <button type="button" data-id="{{ $item->id }}" data-req-type="{{ $item->request_type }}" class="withdraw_form_submit btn btn-success btn-icon btn-sm"><i class="fas  fa-dollar-sign"></i></button>
                                       
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
categoryModal


<button id="withdrawModalTrigger" hidden data-toggle="modal" data-target="#withdrawModal"></button>
<div class="modal fade show d-px" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModal" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Transection ID </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
            <form class="" action="{{ url()->current() }}" method="POST" > @csrf
                    <input type="hidden" class="modal_tran_req_type" name="request_type">
                    <input type="hidden" class="modal_id" name="id">
                    <input type="text" placeholder="Enter Transection ID" name="bank_receipt_id" class="form-control tran_id">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" >Submit</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
            </form>
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

    $(".test").click(function() {

        var id = $(this).attr('data-id');
        var metaDescription = $("#metaDescription" + id).val();
        $("#ajaxData").html(null);
        $("#ajaxData").html(metaDescription);
        $("#categoryModal").modal('show');
    });




    $(document).ready(function() {
        $(document).on('click', '.deposit_form_submit', function() {
            if (confirm('Approve?')) {
                $(this).closest('form').submit();
            }
        });
        $(document).on('click', '.withdraw_form_submit', function() {
           
            $("#withdrawModalTrigger").click();
            $(".modal_id").val($(this).attr('data-id'));
            $(".modal_tran_req_type").val($(this).attr('data-req-type'));
        });

        $(document).on('change', '.filter', function() {
            $(this).closest('form').submit();
        });

       
        $('select.uid').val("{{ request('uid') }}");
        $('select.uname').val("{{ request('uname') }}");
        $('select.rt').val("{{ request('rt') }}");
        $('select.status').val("{{ request('status') }}");
        
    });
</script>
@endpush