@extends('admin.layouts.scaffold')

@section('title')
Simsar | All Transactions
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
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Transactions
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
            
            
            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="10%;"  class="center">#</th>
                                    <th width="15%;">Date</th>
                                    <th width="35%;">Purchase Type</th>
                                    <th width="35%;">Package Title</th>
                                    <th width="35%;">Payment Method</th>
                                    <th width="35%;">User Id</th>
                                    <th width="35%;">User Name</th>
                                    <th width="35%;">Total Amount</th>
                                    <th width="35%;">Transaction Id</th>
                                    <th width="15%;">Valid From</th>
                                    <th width="15%;">Valid To</th>
                                    <th width="15%;">Status</th>
                                    
                                    <th>
                                        Action
                                    </th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php $sno = 1; @endphp
                                @if($transaction->count() > 0)
                                    @foreach ($transaction as $key=>$t)
                                        <tr>
                                            
                                            <th scope="row" class="center">{{ $sno++ }}</th>
                                             <td >{{$t->created_at}}</td>
                                            <td >
                                                @if($t->package_type == 1)
                                                 Banner Advertisement
                                                @endif
                                                
                                            </td>
                                            
                                            <td >
                                                {{$t->packageTitle}}
                                                
                                            </td>
                                            <td>
                                                 @if($t->payment_type == 5)
                                                 Credit Card
                                                 @elseif($t->payment_type == 6)
                                                 Dedit Card
                                                @endif
                                            </td>
                                            
                                            <td >{{$t->user_id}}</td>
                                            <td >{{$t->userName}}</td>
                                            <td >KD : {{$t->total_amount}}</td>
                                            <td >{{$t->transaction_id}}</td>
                                            <td >{{$t->start_date}}</td>
                                            <td >{{$t->end_date}}</td>
                                            <td >
                                                 @if($t->t_status == 1)
                                                   Success
                                                 @else
                                                   Failed
                                                 @endif
                                                
                                               </td>
                                            
                                            
                                        </tr>    
                                    @endforeach
                                
                                @endif
                                
                                 @if(count($allTransactions))
                                      @foreach($allTransactions as $key => $t)
                                        <tr>
                                        <th scope="row" class="center">{{ $sno++ }}</th>
                                        <td>{{$t->created_at}}</td>
                                         <td >
                                            {{ $t->title }}
                                            
                                        </td>
                                        <td >
                                            {{$t->sTitle}}
                                            
                                        </td>
                                        <td>
                                            @if($t->payment_type == 5)
                                                Credit Card
                                            @elseif($t->payment_type == 6)
                                                Dedit Card
                                            @elseif($t->payment_type == 2)
                                                Cash
                                            @elseif($t->payment_type == 1)
                                                Bank
                                            @endif
                                        </td>
                                        <td>{{$t->user_id}}</td>
                                        <td>{{$t->user_id}}</td>
                                        <td> {{$t->total_amount}} </td>
                                        <td> {{$t->transaction_id}} </td>
                                        <td>---</td>
                                        <td>---</td>
                                         <td >
                                            @if($t->t_status == 1)
                                                Success
                                            @elseif($t->t_status == 0)
                                                Pending
                                            @else
                                                Failed    
                                            @endif
                                            
                                           </td>
                                    </tr>
                                    @endforeach
                                  @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- end:: Content -->
@endsection

@push('scripts')

@endpush