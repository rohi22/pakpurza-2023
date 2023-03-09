@extends('admin.layouts.scaffold')

@section('title')
Simsar | Banner Ads
@endsection

@push('styles')
<style>
    .pb-1-percent{
        padding-bottom:1%;
    }
    .center{
        text-align:center;
    }
    .pr-17-px{
         padding-right: 17px;
    }
    .l-0-b-365{
        left: 0px; bottom: -365px;
    }
    .l-w-0{
        left: 0px; width: 0px;
    }
    .hl{
        top: 365px; right: 0px; height: 200px;
    }
    .t-h-70{
        top: 130px; height: 70px;
    }
    .pt-5-pb-11{
        padding-top:5%; padding-bottom:11%;
    }
    .color-font-70{
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
                    Banner Ads
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
            
            <div class="row pb-1-percent">
                <div class="col-md-8 text-right"></div>
                 <div class="col-md-2 text-right">  
                   <button type="button" class="btn btn-danger" id="btbdeleteall"><i class="fa fa-trash"></i>delete</button></a>
                   </div>
                   <div class="col-md-2 text-right">
                    <a href="{{url('admin/create-banner-ads')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Banner Ads</button></a>
                </div>
            </div>

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;" class="center"><input type="checkbox" name="bannerads" id="bannerads">#</th>
                                    <th width="10%;" class="center">Title</th>
                                    <th width="10%;" class="center">Slots</th>
                                    <th width="10%;" class="center">banner</th>
                                	<th width="10%;" class="center">charges</th>
                                	
                                	<th width="10%;" class="center">Status</th>
                                    <th width="15%;" class="center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($bannerads->count() > 0)
                                @foreach ($bannerads as $key=>$bannerad)
                                    <tr>
                                    
                                        <th scope="row" class="center"><input type="checkbox" value="{{$bannerad->id}}" name="bannerads[]" > {{$key + $bannerads->firstItem()}} </th>
                                        <td >{{ucfirst($bannerad->title)}}</td>
                                        <td >{{ucfirst($bannerad->slot_title)}}</td>
                                         <td >
                                             @if( isset($bannerad->banner_img) )
                            
                                             <img src="{{  asset('/public/assets/media/defaultbanner').'/'.$bannerad->banner_img  }}" height="100" widh="100"/>
                                             @else
                                             {{ "No Banner Found" }}
                                             @endif
                                             </td>
                                        <td >{{$bannerad->charges}}</td>
                                        
                                         <td >
                                          @if($bannerad->status == 0)
                                               De Active
                                            @else
                                                Active
                                            @endif
                                            
                                         </td>
                        <td align="center">
                        <a href="{{url('admin/edit-banner-ads/'.$bannerad->id)}}"><button type="button" class="btn btn-type btn-primary btn-sm btn-icon" data-placement="top" data-content="Edit" title="edit"><i class="fa fa-edit"></i></button>
                        <!--<a href="javascript:;" ><button type="button"  class="showDeleteModal btn btn-type btn-danger  btn-sm btn-icon"  data-id="{{$bannerad->id}}" data-placement="top" data-content="Delete"><i class="fa fa-trash"></i></button></a>-->
                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="10" style="text-align:center;">No Record Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        {!! $bannerads->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade show pr-17-px" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll ps ps--active-y" data-scroll="true" data-height="200" style="height: 200px; overflow: hidden;">
                    <p id="ajaxData"></p>
                <div class="ps__rail-x l-0-b-365"><div class="ps__thumb-x l-w-0" tabindex="0"></div></div><div class="ps__rail-y hl"><div class="ps__thumb-y t-h-70" tabindex="0"></div></div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade show pr-17-px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body pt-5-pb-11">
                <center>
                    <i class="la la-info-circle color-font-70"></i><br><br>
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
<div class="modal fade show" id="deleteallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body pt-5-pb-11">
                <center>
                    <i class="la la-info-circle color-font-70"></i><br><br>
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
        url  : "{{ url('admin/delete-banner-ads/') }}",
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
$('#btbdeleteall').click(function(){
       var values = $("input[name='bannerads[]']:checked")
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
      var values = $("input[name='bannerads[]']:checked")
              .map(function(){return $(this).val();}).get();
                   $.ajax({
        type : "post",
        url  : "{{ url('delete-all-banner-ads-all') }}",
        data : {
        "_token": "{{ csrf_token() }}",
       "ad_id":values,

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

$(document).ready(function(){
        $('#bannerads').click(function(){
            if($(this).prop("checked") == true){
                $("[name='bannerads[]']").attr("checked", "checked");
            }
            else if($(this).prop("checked") == false){
                $("[name='bannerads[]']").removeAttr("checked");
            }
        });
    });


</script>
@endpush