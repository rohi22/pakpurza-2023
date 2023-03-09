@extends('admin.layouts.scaffold')
@section('title')
Simsar | Coin Transactions
@endsection
@push('styles')
<style>
   .p-10px-m-t-10px{
       padding:10px;margin-top:10px; 
   } 
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
               Coin Transactions
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
      <div class="row p-10px-m-t-10px" >
         <div class="col-md-7 text-left ">
            <!--<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>-->
         </div>
         <div class="col-md-3 text-right"></div>
         <div class="col-md-2 text-right">
             <select name="" id="coinType" class="form-control">
                 <option value="0">All</option>
                 <option value="1">Credit Coins</option>
                 <option value="2">Debit Coins</option>
             </select>
         </div>
         
      </div>
      <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
         <div class="kt-section__content">
            <div class="table-responsive">
               <table class="table table-bordered" width="100%;">
                  <thead>
                     <tr>
                        <th class="center">#</th>
                        <th class="center">User ID</th>
                        <th class="center">Date</th>
                        <th class="center">Transaction ID</th>
                        <th class="center">Plan</th>
                        <th class="center">Type</th>
                        <th class="center">Coins</th>
                     </tr>
                  </thead>
                  <tbody class="coinStatusWise">
                     @if ($transactions->count() > 0)
                        @foreach ($transactions as $index=>$item)
                            <tr>
                                <td align="center">{{$index + $transactions->firstItem()}}</td>
                                <td align="center">{{$item->unique_id}}</td>
                                <td align="center">{{ date("d-m-Y", strtotime($item->date))}}</td>
                                <td align="center">{{$item->transaction_id}}</td>
                                <td align="center">{{$item->plan}}</td>
                                <td align="center">{{$item->type}}</td>
                                <td align="center">@if($item->type=="Credit") +{{number_format($item->coins,2)}} @elseif($item->type=="Debit") -{{number_format($item->coins,2)}} @endif</td>
                            </tr>
                        @endforeach
                     @endif
                  </tbody>
               </table>
               
               {!! $transactions->links() !!}
               
            </div>
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
   $("#coinType").change(function(){

        $.ajax({
           type: "get",
           url: "{{ url('coin-transaction-status-wise') }}",
           data: {
               id: $(this).val(),
   
           },
           success: function(data) {
            $(".coinStatusWise").html(data);
           },
   
       });
        
   });
</script>
@endpush
