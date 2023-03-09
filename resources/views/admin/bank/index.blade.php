@extends('admin.layouts.scaffold')

@section('title')
Simsar | banks List
@endsection

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .pb-1-percentage{
        padding-bottom:1%;
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
                    banks List
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
        
       
								
								
								
        <div class="kt-portlet__body" >
            <div class="row pb-1-percentage">
                <div class="col-md-12 text-right"></div>
                <div class="col-md-10 text-right">
                <button type="button" class="btn btn-danger" id="btbdeleteall"><i class="fa fa-trash"></i>delete</button></a>
                </div>
                
                <div class="col-md-2 text-right">
                    
                    <a href="{{route('admin.bank.create')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Bank</button></a>
                </div>
            </div>

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                                            
                                            
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;" class='center'>#</th>
                                    <th width="15%;" class='center'>Bank Name</th>
                                    <th width="15%;" class='center'>A/C Title</th>
                                    <th width="15%;"  class='center'>A/C Number</th>
                                    <th width="15%;"  class='center'>Branch Name</th>
                                    <th width="20%;"  class='center'>Status</th>
                                    <th width="37%;"  class='center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($banks->count() > 0)
                                @foreach ($banks as $key=>$bank)
                                    <tr>
                                        <th scope="row" class='center'><input type="checkbox" value="{{$bank->id}}" name="banks[]" >  {{$key + $banks->firstItem()}}</th>
                                        <td align="center">{{ $bank->name }}</td>
                                        <td align="center">{{ $bank->ac_title }}</td>
                                        <td align="center">{{ $bank->ac_number }}</td>
                                        <td align="center">{{ $bank->branch_name }}</td>
                                        <td align="center">
                                            
                                            
                                            <select class="form-control status" name="change_status[]" id="{{ $bank->id }}"  >
                                                <option value="1" @if($bank->is_active==1) Selected @else  @endif >Active</option>
                                                <option value="0" @if($bank->is_active==0) Selected @else  @endif >InActive</option>
                                            </select>
                                            
                                          
                                            
                                            </td>
                                            {{-- <td align="center">
                                                <a href=""><i class="fa fa-eye"></i></a>
                                                
                                                </td> --}}
                                       
                                        <td align="center">
                                             <a href="{{route('admin.bank.edit',$bank->id)}}"><button type="button" class="btn btn-type btn-primary btn-sm btn-icon" data-toggle="kt-popover" data-placement="top" data-content="Edit"><i class="fa fa-edit"></i></button></a>
                                                <form action="{{ route('admin.bank.destroy',$bank->id) }}" method="post" class="float-right"> @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-type btn-danger btn-sm btn-icon" ><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        
                                        
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class='center'>No Record Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        {!! $banks->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
</div>





<!-- end:: Content -->
<div class="modal fade show" id="deleteallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body" style="padding-top:5%; padding-bottom:11%;">
                <center>
                    <i class="la la-info-circle" style="color:#fb02e6; font-size:70px;" ></i><br><br>
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
<script>

    
$(".status").change(function(){
    
    var id = $(this).attr('id');
    var val = $(this).val();
   
    $.ajax({
        type : "post",
        url  : "{{ route('admin.bank.store') }}",
        data : {
        "_token": "{{ csrf_token() }}",
        "id": id,
        "val": val,
        "ajax":1
        },
        success:function(data){
            // alert(data);
            if(data==1){
                toastr.success('Bank status updated', 'Updated');
                location.reload().delay(8000);
            }
        },

    });
  
});
$('#btbdeleteall').click(function(){
        var values = $("input[name='banks[]']:checked")
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
    var values = $("input[name='banks[]']:checked").map(function(){return $(this).val();}).get();
    $.ajax({
        type : "post",
        url  : "{{  route('delete-bank-all') }}",
        data : {
        "_token": "{{ csrf_token() }}",
       "banks_id":values,

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



//     var KTAppOptions = {
// 				"colors": {
// 					"state": {
// 						"type": "#22b9ff",
// 						"light": "#ffffff",
// 						"dark": "#282a3c",
// 						"primary": "#5867dd",
// 						"success": "#34bfa3",
// 						"info": "#36a3f7",
// 						"warning": "#ffb822",
// 						"danger": "#fd3995"
// 					},
// 					"base": {
// 						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
// 						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
// 					}
// 				}
// 			};
    
    
    
      
</script>

<!--<script src="https://mrcpotencia.com/simsar/public/assets/dist/crud/metronic-datatable/base/html-table.js" type="text/javascript"></script>-->
@endpush