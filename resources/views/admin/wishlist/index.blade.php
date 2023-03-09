@extends('admin.layouts.scaffold')

@section('title')
Simsar | Wishlist
@endsection

@push('styles')
<style>
    
    .center{
  text-align:center;  
}
.h-w-px{
    height:110px; width:250px;
}
.h-w-100{
    height:100px; width:100px;
}
.d-n{
    display: none; padding-right: 17px;
}
.h-20px{
  height: 200px; overflow: hidden;  
}
.l-0px{
    left: 0px; bottom: -365px;
}    
.l-w{
    left: 0px; width: 0px;
}
.t-365px{
    top: 365px; right: 0px; height: 200px;
}
.t-h{
  top: 130px; height: 70px;  
}
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
                    Wishlist
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
            <div class="row p-b-1per">
                   <div class="col-md-8"></div>
                   
                   <div class="col-md-12 text-right">
                   <button type="button" class="btn btn-danger" id="btbdeleteall"><i class="fa fa-trash"></i>delete</button></a>
                </div>
                
            </div>

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;"  class="center"><input type="checkbox" name="adssingle" id="adssingle" > #</th>
                                    <th width="25%;">Ad Id</th>
                                    <th width="25%;">Ad Title</th>
                                    <th width="25%;">Ad Image</th>
                                    <th width="25%;">User</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($wishList->count() > 0)
                                @foreach ($wishList as $key=>$w)
                                    <tr>
                                       
                                        <th scope="row" class="center"><input type="checkbox" name="adsmultiple[]" id="adsmultiple" value="{{ $w->id }}" >{{$key + $wishList->firstItem()}}</th>
                                        <td>{{$w->post_id}}</td>
                                        <td>{{$w->ad_title}}</td>
                                        <td align="center">
                                             @if(!empty($w->main_image))
                                                <img src="{{URL::asset('public/asset/images/sell-now/'.$w->main_image)}}"  class="h-w-px">
                                            @else
                                                <img src="{{URL::asset('public/assets/media/no_image.jpg')}}"  class="h-w-100">
                                            @endif
                                            
                                        </td>
                                           
                                         <td> <a href="{{url('view-user-profile/'.$w->user_id)}}" >{{$w->username}}</a></td>
                                         
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="center">No Record Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        {!! $wishList->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade show d-n" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll ps ps--active-y h-20px" data-scroll="true" data-height="200" >
                    <p id="ajaxData"></p>
                <div class="ps__rail-x l-0px" ><div class="ps__thumb-x l-w" tabindex="0" ></div></div><div class="ps__rail-y t-365px" ><div class="ps__thumb-y t-h" tabindex="0" ></div></div></div>
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
            <div class="modal-body p-t-5per-p-b-11per" >
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
<!-- end:: Content -->

<div class="modal fade show p-r-17px" id="deleteallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per">
                <form action="{{ url('admin/delete-wishlist') }}" method="post">@csrf
                    <center>
                        <i class="la la-info-circle c-fb-f-s-70px" ></i><br><br>
                        <h3>Are you sure?</h3>
                        <P>You won't be able to revert this!</P>
                        <div >
                            <input type="hidden" id="deleteIds" name="deleteIds" value="" />
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                            &nbsp;
                            <button type="submit" class="btn btn-danger" id="deleteall">Yes, delete it!</button></div>
                    </center>
                </form>
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
        url  : "{{ url('delete-category') }}",
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

$('#btbdeleteall').click(function(){
        var values = $("input[name='adsmultiple[]']:checked")
              .map(function(){return $(this).val();}).get();
                 if(values.length == 0){
               alert('Select First');
               return false;
           }
           else{
               console.log(values);
              $('#deleteIds').val('');
              $('#deleteIds').val(values);
              $('#deleteallModal').modal("show");
           }
           
});



</script>
@endpush