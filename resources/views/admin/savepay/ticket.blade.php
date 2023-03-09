@extends('admin.layouts.scaffold')

@section('title')
Simsar | Safe Pay
@endsection

@push('styles')
<style>
    
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
                    Ticket
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
                                	<th class="text-center">User Id</th>
                                	<th class="text-center">Ad Id</th>
                                	<th class="text-center">Amount</th>
                                	<th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($table as $k=>$i )
                                    <tr>
                                       
                                        <td class="text-center">{{$k+1}}</th>
                                        <td class="text-center">{{ $i->created_at }}</td>
                                        <td class="text-center">{{ $i->user_id }}</td>
                                        <td class="text-center">{{ $i->product_id }}</td>
                                         <td class="text-center">{{ $i->amount }}</td>
                                         <td class="text-center">
                                             
                                             @if($i->is_win==1) Win @endif
                                             @if($i->is_win==0) Lose @endif
                                             @if($i->is_win==null) In Conversation @endif
                                             
                                         </td>

                                         
                                         <td class="text-center">
                                            @if($i->is_win == null)
                                                <form method="post" action="{{ route('admin.safepay.update',$i->id) }}">@method('PATCH') @csrf
                                                    <a href="{{route('admin.select_ticket',$i->id)}}" class="btn btn-danger btn-sm">Conversations</a>
                                                    <button type="submit" name="status" value="win" class="btn btn-success btn-sm">Win</button>
                                                    <button type="submit" name="status" value="lose" class="btn btn-info btn-sm">Lose</button>
                                                    <input type="hidden" name="ticket_status_update" value="">
                                                </form>      
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
<div class="modal fade show p-r-17px" id="winModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
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
                        <button type="button" class="btn btn-danger" id="deleteRecord">Yes, delete it!</button></div>
                </center>

            </div>

        </div>
    </div>
</div>
<div class="modal fade show p-r-17px" id="loseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per">
                <center>
                    <i class="la la-info-circle c-fb-f-s-70px" ></i><br><br>
                    <h3>Are you sure?</h3>
                    <P>You won't be able to revert this!</P>
                    <P>All the data related to this particular category will be deleted permanently.</P>
                    <div >
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
@endpush