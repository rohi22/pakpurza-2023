@extends('admin.layouts.scaffold')

@section('title')
Simsar | Type
@endsection

@push('styles')

<style>
    
    .p-b-1per{
        padding-bottom:1%;
    }
    .center{
        text-align:center;
    }
    .h-100px-w-100px{
        height:100px; width:100px;  
    }
    .h-50px-w-50px{
      height:50px; width:50px;   
    }
    .h-200px{
        height: 200px; overflow: hidden; 
    }
    .l-0px-b-365px{
        left: 0px; bottom: -365px;
    }
    .l-0px-w-0px{
      left: 0px; width: 0px;  
    }
    .t-365px-r-0px-h-200px{
        top: 365px; right: 0px; height: 200px; 
    }
    .t-130px-h-70px{
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
    .p-r-17px{
        padding-right: 17px; 
    }
</style>



@endpush

@section('content')
<style>
    .select2{
        width:100% !important;
    }
</style>

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Type
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
        <div class="kt-portlet__body">
            <div class="row p-b-1per" >
                <div class="col-md-12 text-right">
                    <a href="javascript:;" ><button type="button"  class="addAttributesModal btn btn-type btn-danger" >Add Attributes</button></a>
                    <a href="{{url('admin/create-types')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Types</button></a>
                </div>
            </div>
              
            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;"  class="center">#</th>
                                  
                                    <th width="10%;" class="center">Title</th>
                                    <th width="17%;"  class="center">Meta Title</th>
                                    <th width="8%;"  class="center">Image Banner</th>
                                    <th width="8%;"  class="center">Image Logo</th>
                                    <th width="10%;" class="center">Status</th>
                                    <th width="15%;"  class="center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($brands->count() > 0)
                                @foreach ($brands as $key=>$brand)
                                    <tr>
                                       
                                        <th scope="row" class="center"><input type="checkbox" name="addselected[]" value="{{$brand->id}}">
                                        {{$key + $brands->firstItem()}}</th>
                                        <td >{{ucfirst($brand->title)}}</td>
                                        <td >{{ucfirst($brand->meta_title)}}</td>
                                       
                                        <td align="center">
                                            @if(!empty($brand->image_banner))
                                            <!-- assets/media/type/banner/ -->
                                                <img src="{{ asset('assets/media/brand/banner/'.$brand->image_banner)}}" att="{{$brand->title}}" class=" h-100px-w-100px ">
                                            @else
                                                <img src="{{ asset('assets/media/no_image.jpg')}}" att="{{$brand->title}}" class=" h-100px-w-100px ">
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if(!empty($brand->image_logo))
                                            <!-- assets/media/type/logo -->
                                                <img src="{{ asset('assets/media/brand/logo/'.$brand->image_logo)}}" att="{{$brand->title}}" class="h-50px-w-50px"> 
                                            @else
                                                <img src="{{ asset('assets/media/no_image.jpg')}}" att="{{$brand->title}}" class="h-50px-w-50px">
                                            @endif
                                        </td>
                                       <td >
                                           <?php 
                                           if($brand->status == 0){
                                               echo "De Active";
                                           }
                                           else{
                                               echo "Active";
                                           }?>
                                           </td>
                                        <td align="center">
                                            <a href="{{url('admin/edit-types/'.$brand->id)}}"><button type="button" class="btn btn-type btn-primary btn-sm btn-icon" data-toggle="kt-popover" data-placement="top" data-content="Edit"><i class="fa fa-edit"></i></button>
                                            <a href="javascript:;" ><button type="button"  class="showDeleteModal btn btn-type btn-danger  btn-sm btn-icon" data-toggle="kt-popover" data-id="{{$brand->id}}" data-placement="top" data-content="Delete"><i class="fa fa-trash"></i></button></a>
                                            <a href="{{url('create-sub-type/'.$brand->id)}}"><button type="button" class="btn btn-type btn-info  btn-sm btn-icon" data-placement="top" data-content="Add Sub Category" title="Add sub category"><i class="fa fa-list"></i></button></a>
                                            <a href="{{url('view-type-attributes/'.$brand->id)}}"><button type="button" class="btn btn-type btn-info  btn-sm btn-icon" data-placement="top" data-content="Add Sub Category" title="add attribute"><i class="fa fa-list"></i></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="center;">No Record Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        {{-- {!! $brands->links() !!} --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade show" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll ps ps--active-y  h-200px " data-scroll="true" data-height="200" >
                    <p id="ajaxData"></p>
                <div class="ps__rail-x l-0px-b-365px" >
                    <div class="ps__thumb-x l-0px-w-0px" tabindex="0" >
                        
                    </div></div><div class="ps__rail-y t-365px-r-0px-h-200px" >
                        <div class="ps__thumb-y t-130px-h-70px" tabindex="0" ></div></div></div>
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

<div class="modal fade show p-r-17px" id="attributesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="attributesId">
           <input type="hidden" id="categoryId">
            <div class="modal-body .p-t-5per-p-b-11per" >
                <center>
                    <!--<i class="la la-info-circle" style="color:#fb02e6; font-size:70px;" ></i><br><br>-->
                    <h3>Select Attributes</h3>
                 
               
					<select class="form-control kt-select2 ktt" id="kt_select2_3" name="allattributes" multiple tyle="width:100% !important;">
						            <option>--Select--</option>
						    @if($allattributes->count() > 0)
                                @foreach ($allattributes as $key=>$a)
                                    <option value="{{$a->id}}">{{$a->title}}</option>
							    @endforeach
                            @endif
					</select>
						<br />
						<br />
						<br />
                    <div>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="addAttributes">Yes, Submit</button></div>
                </center>

            </div>
          
        </div>
    </div>
</div>



<!-- end:: Content -->
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
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
        url  : "{{ url('admin/delete-types/') }}",
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

$(".addAttributesModal").click(function(){

   var categoryid = $('#categoryid').val();
console.log(categoryid)
     var values = $("input[name='addselected[]']:checked")
              .map(function(){return $(this).val();}).get();
           
           if(values.length == 0){
               alert('Select First');
               return false;
           }
           else{
               // var id = 12;
                $("#attributesId").val("");
                $("#attributesId").val(values);
                $("#categoryId").val("");
                $("#categoryId").val(categoryid);
                $("#attributesModal").modal('show');
           }
          
});


$("#addAttributes").click(function(){
    
var attributesId = $("#attributesId").val();
/*var typeId = $("#categoryId").val();*/
var allattributes = $(".ktt").val();

// alert(allattributes);

    var id = $("#deleteId").val();
    
    $.ajax({
        type : "post",
        url  : "{{ url('add-type-attributes') }}",
        data : {
        "_token": "{{ csrf_token() }}",
        "attributesId":attributesId,
        /*"typeId":typeId,*/
        "allattributes":allattributes,

        },
        success:function(data){
            // alert(data);
            
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

            toastr.success('Record Added', 'Deleted');

            location.reload().delay(8000);
           }
        },

    });
});

</script>
@endpush