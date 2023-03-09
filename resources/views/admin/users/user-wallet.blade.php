@extends('admin.layouts.scaffold')
@section('title')
Simsar | Users Wallet
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
      
      <div class="kt-portlet__head">
         <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
               Users Wallet
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
            <!--<div class="col-md-12 text-right">-->
            <!--    <a href="{{url('create-slider')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add a Slide</button></a>-->
            <!--</div>-->
         </div>
         <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
            <div class="kt-section__content">
               <div class="table-responsive">
                  <table class="table table-bordered" width="100%;">
                     <thead>
                        <tr>
                           <th width="5%;"  class="center">#</th>
                           <th width="10%;" class="text-center">Unique Id</th>
                           <th width="10%;" class="text-center">Name</th>
                           <th width="15%;" class="text-center">Email</th>
                           <th width="10%;" class="text-center">Phone</th>
                           <th width="10%;" class="text-center">Date Of Joining</th>
                           <th width="10%;" class="text-center">Status</th>
                           
                           <th width="10%;" class="text-center">Wallet Amount</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if($User->count() > 0)
                        @foreach ($User as $key=>$user)
                        
                        @php
                           //  $userWallet = @App\Models\UserWallet::select('id', DB::raw('(SUM(debit) - SUM(credit)) AS balance'))->groupBy('user_id')
                           //  ->where('user_id', $user->id)
                           //  ->where('status', 1)
                           //  ->first();
                            
                           //  $balance = 0;
                            
                           //  if($userWallet){
                           //      $balance = $userWallet['balance'];
                           //  }
                            
                        @endphp
                        
                        <tr>
                           <th scope="row" class="center"> {{$key + $User->firstItem()}}</th>
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
                           
                           {{-- <td align="center"> KD <b>{{ $balance }}</b> </td> --}}
                           
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

  
<!-- end:: Content -->
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script>
   
</script>
@endpush
