@extends('admin.layouts.scaffold')

@section('title')
Simsar | Safe Pay
@endsection

@push('styles')
<style>
    .t-t{
        text-transform: capitalize;
    }
    
    .m-w
    {
        min-width: 250px;
        
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
                    Safe Pay
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
            <!--<div class="row" style="padding-bottom:1%;">-->
            <!--    <div class="col-md-12 text-right">-->
            <!--        <a href="{{url('admin/create-bump-up-ads')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Bump Up Ads</button></a>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Date</th>
                                	<th class="text-center">Transaction Id</th>
                                	<th class="text-center">Sent by</th>
                                	<th class="text-center">Received by</th>
                                	<th class="text-center">Ad Id</th>
                                	<th class="text-center">Ad Title</th>
                                	<th class="text-center">Amount</th>
                                	<th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $k=>$i)
                          @php($u = App\User::find($i->product_user_id))
                          <tr>
                            <td>{{ $k }}</td>
                            <td>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($mytask->logon))->diffForHumans()‌​ }}
                                {{ /Carbon/Carbon::parse(->formate('d-m-Y')}}</td>
                            <td>{{ $i->tid }}</td>
                            <td>{{ $i->username }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $i->product_id }}</td>
                            <td>{{ $i->product_name }}</td> 
                            <td>{{ $i->debit }}</td>
                           <td class="t-t">
                                  {{ $i->status }}
                              
                            </td>
                            <td class="m-w">
                                @if($i->status=="reject_by_seller")
                                    <form method="POST" action="{{ route('recievedwallet_status_change') }}">@csrf
                                        <input type="hidden" name="id" value="{{ $i->id }}"> 
                                        <button name="status" value="2" class="btn btn-info btn-sm edit display-in-float-left m-r-5 m-b-5" type="submit">Refund</button>
                                    </form>
                                @endif
                                
                                @if($i->status=="appeal_by_seller")
                                    <form method="POST" action="{{ route('ticket-chat',$i->id) }}">@csrf
                                        <input type="hidden" name="id" value="{{ $i->id }}"> 
                                        <button name="status" value="2" class="btn btn-info btn-sm edit display-in-float-left m-r-5 m-b-5" type="submit">Chat</button>
                                    </form>
                                @endif
                                
                                {{-- @if($i->status==2)
                                <form hid method="POST" action="{{ route('recievedwallet_status_change') }}">@csrf
                                    <input type="hidden" name="id" value="{{ $i->id }}"> 
                                    <button name="status" value="2" class="btn btn-info btn-sm edit display-in-float-left m-r-5 m-b-5" type="submit">Refund</button>
                                  </form>
                                @endif --}}
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


<!-- end:: Content -->
@endsection

@push('scripts')
@endpush