@extends('admin.layouts.scaffold')

@section('title')
Simsar | SellNow
@endsection

@push('styles')
<style>
    
   .p-b-1per{
    padding-bottom:1%; 
}
 .center{
  text-align:center;  
}
.h-w{
    height:110px; width:250px;
}
.height{
    height:100px; width:100px;
}
    .d-r{
        display: none; padding-right: 17px;
    }
    .h-o{
        height: 200px; overflow: hidden;
    }
    .l-b{
        left: 0px; bottom: -365px;
    }
    .l-width{
        left: 0px; width: 0px;
    }
    .t-h{
        top: 365px; right: 0px; height: 200px;
    }
    .t-height{
        top: 130px; height: 70px;
    }
    .w-i-o{
        width:100% !important;padding-left:17px !important;overflow:hidden;
    }
    .m-x{
        max-width:100% !important;min-height:650px;
    }
    .w-i-d{
        width:100% !important;min-width:100%;
    }
    .w-h-b{
        width:100%;min-height:650px;border: #f5f5f5;
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
                    Pending Ads
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
            <div class="row p-b-1per" >
                <div class="col-md-12 text-right">
                    <a href="{{url('create-adsell-list')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Sell</button></a>
                </div>
                
                 <div class="col-md-12 text-right">
                    <select name="" id="changeGlobalStatus">
                        <option value="">--SELECT--</option>
                        <option value="1" >Approve</option>
                        <option value="2" >Dis Approve</option>
                        <option value="3" >Expired</option>
                    </select>
                </div>
                
                
            </div>

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                                            
                                            
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                     <th width="5%;"  class="text-center"><input type="checkbox" name="adssingle" id="adssingle" >#</th>
                                     <th width="37%;" class="text-center">Category</th>
                                     <th width="37%;" class="text-center">Sub Category</th>
                                     <th width="37%;" class="text-center">Ads Type</th>
                                     <th width="37%;" class="text-center">Main Image</th>
                                     <th width="37%;" class="text-center">Title</th>
                                     <th width="37%;" class="text-center">Ad Type</th>
                                     <th width="37%;" class="text-center">Featured</th>
                                     <th width="37%;" class="text-center">Offer</th>
                                     <th width="37%;" class="text-center">Latest</th>
                                     <th width="47%;" class="text-center">Status</th>
                                     <th width="20%;" class="text-center">view</th>
                                     <th width="37%;" class="text-center">Action</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                @if($SellNow->count() > 0)
                                @foreach ($SellNow as $key=>$sellNow)
                                    <tr>
                                        <th scope="row" class="center"> 
                                         <input type="checkbox" name="adsmultiple[]" id="adsmultiple" value="{{ $sellNow->id }}" > 
                                        {{++$key}}
                                        </th>
                                        <td align="center">{{ $sellNow->category }}</td>
                                        <td align="center">{{ $sellNow->sub_category }}</td>
                                        <td align="center">
                                                @if($sellNow->is_auction == 1)
                                                 Auction
                                                @else
                                                Normal
                                                @endif
                                            </td>
                                        <td align="center">
                                             @if(!empty($sellNow->main_image))
                                                <img src="{{URL::asset('public/asset/images/sell-now/'.$sellNow->main_image)}}"  class="h-w">
                                            @else
                                                <img src="{{URL::asset('public/assets/media/no_image.jpg')}}"  class="height">
                                            @endif
                                            
                                           </td>
                                            
                                        <td align="center">{{ $sellNow->ad_title }}</td>
                                        <td align="center">{{ $sellNow->ad_type }}</td>
                                        <td align="center">@if($sellNow->is_featured==1) Yes @else No @endif </td>
                                        <td align="center">@if($sellNow->is_latest==1) Yes @else No @endif </td>
                                        <td align="center">@if($sellNow->is_offer==1) Yes @else No @endif </td>
                                        
                                        
                                        <td align="center">
                                            <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill">
                                            @if($sellNow->is_approve==1) 
                                            Approved 
                                            @elseif($sellNow->is_approve==2)
                                            Rejected
                                            @elseif($sellNow->is_approve==3)
                                            Expired
                                            @else  
                                            Pending
                                            @endif 
                                                            
                                                            </span>
                                        </td>
                                         <td align="center">
                                                <a href="{{url('product-detail/'.$sellNow->id)}}"><i class="fa fa-eye"></i></a>
                                                
                                        </td>
                                        
                                        <td align="center">
                                            <select name="change_status[]" id="{{ $sellNow->id }}" postid="{{ $sellNow->post_id }}" >
                                                <option value="0" @if($sellNow->is_approve==0) Selected @else  @endif>--SELECT--</option>
                                                <option value="1" @if($sellNow->is_approve==1) Selected @else  @endif >Approve</option>
                                                <option value="2" @if($sellNow->is_approve==2) Selected @else  @endif >Rejected</option>
                                                <option value="4" >View</option>
                                            </select>
                                            
                                             <a href="{{url('edit-ads-list/'.$sellNow->post_id)}}"><button type="button" class="btn btn-brand btn-primary btn-sm btn-icon" data-toggle="kt-popover" data-placement="top" data-content="Edit"><i class="fa fa-edit"></i></button></a>
                                            
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade show" id="categoryModal d-r" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll ps ps--active-y h-o" data-scroll="true" data-height="200" >
                    <p id="ajaxData"></p>
                <div class="ps__rail-x l-b"><div class="ps__thumb-x l-width" tabindex="0" ></div></div><div class="ps__rail-y t-h" ><div class="ps__thumb-y t-height" tabindex="0" ></div></div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade show w-i-o" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"   aria-modal="true">
    <div class="modal-dialog modal-dialog-centered w-i-d" role="document">
        <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           </div>
            <div class="modal-body m-x" >
               
               
                    
                    <!--<h5 id="viewid"></h5>-->
                    <!--<h5 id="viewtitle"></h5>-->
                    <!--<P></P>-->
                    
                    
                    <iframe id="viewiframe" src="" allowfullscreen="true" class="w-h-b"></iframe>
                    
               

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

$(".showDeleteModal").click(function(){
    var id = $(this).attr('data-id');
    $("#deleteId").val("");
    $("#deleteId").val(id);
    $("#deleteModal").modal('show');
});

$("#deleteRecord").click(function(){
    var id = $("#deleteId").val();

    $.ajax({
        type : "post",
        url  : "{{ url('delete-slider') }}",
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

            toastr.success('Record Deleted', 'Deleted');

            location.reload().delay(8000);
           }
        },
    });
});




$("[name='change_status[]']").change(function(){
    var id = $(this).attr('id');
    var val = $(this).val();
if(val == 1 || val == 2 || val == 3){
    
    $.ajax({
        type : "post",
        url  : "{{ url('ads-change-status') }}",
        data : {
        "_token": "{{ csrf_token() }}",
        "id": id,
        "val":val,

        },
        success:function(data){
           if(data==1){
                location.reload().delay(8000);
           }
        },
    });
}
else if(val == 4 ){
     var postid = $(this).attr('id');
     const url = new URL('/testsimsar/product-detail/', location.href).href;
     $('#viewiframe').attr('src',url+postid);
     $("#"+id+" option[value='0']").attr("selected","selected");
     $("#viewModal").modal('show');
  }
});


    $(document).ready(function(){
        $('#adssingle').click(function(){
            if($(this).prop("checked") == true){
                $("[name='adsmultiple[]']").attr("checked", "checked");
            }
            else if($(this).prop("checked") == false){
                $("[name='adsmultiple[]']").removeAttr("checked");
            }
        });
    });
    
    
    
    
    
       $('#changeGlobalStatus').change(function(){
         
         var listingStatus = $(this).val();
 
        if(listingStatus.length != ''){
            
            var selectedArr = $('[name="adsmultiple[]"]:checked').map(function () {
                 return this.value;
            }).get();
    
    
            
        $.ajax({
                type : "post",
                url  : "{{ url('change-multi-status') }}",
                data : {
                "_token": "{{ csrf_token() }}",
                "listingStatus":listingStatus,
                "selectedArr":selectedArr,

        },
        success:function(data){
            
           if(data==1){
               
            // $("#deleteModal").modal('hide');
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

            toastr.success('Record Updated', 'Deleted');

            location.reload().delay(8000);
           }
        },

    });
    
    // 
            
            
            
            
        }
        else{
        }
        
        
    });
</script>
@endpush