@extends('admin.layouts.scaffold')

@section('title')
Simsar | Sub Categories
@endsection

@push('styles')
<style>
    .p-b-1{
        padding-bottom:1%;
    }
    .center{
        text-align:center;
    }
    .display-none{
        display: none; 
    }
    .p-r-17-px{
        padding-right: 17px;
    }
    .height-200{
        height: 200px;
    }
    .overflow-hidden{
         overflow: hidden;
    }
    .left-bottom{
        left: 0px; bottom: -365px;
    }
    .left-width{
       left: 0px; width: 0px;
    }
    .top-right{
        top: 365px; right: 0px;
    }
    .top-height-70{
        top: 130px; height: 70px;
    }
    .padding-top-bottom-5-11{
        padding-top:5%; padding-bottom:11%;
    }
    .color-fb-font-70{
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
                    Attributes
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
            <div class="row p-b-1">
                <div class="col-md-8 text-right"></div>
               
               <div class="col-md-2 text-right">
                   <button type="button" class="btn btn-danger" id="btbdeleteall"><i class="fa fa-trash"></i>delete</button></a>
                </div>
               
               
                <div class="col-md-2 text-right">
                    <a href="{{url('admin/create-attributes')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Attributes </button></a>
                </div>
            </div>
            
            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                    <th width="10%;" class="center"><input type="checkbox" name="attributes" id="attributes">#</th>
                    <th width="35%;">Title</th>
                    <th width="10%;" class="center">Type</th>
                    <th width="30%;" class="center">Description</th>
                    <th width="15%;" class="center">Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($attributes->count() > 0)
                                    @foreach ($attributes as $key=>$attribute)
                                        <tr>
                                            <input type="hidden" id="description{{$attribute->id}}" value="{{$attribute->description}}">
                                            <th scope="row" style="text-align:center;"><input type="checkbox" value="{{$attribute->id}}" name="attributes[]" > {{$key + $attributes->firstItem()}}</th>
                                            <td >{{ucfirst($attribute->title)}}</td>
                                            <td  align="center">
                                                @if(!empty($attribute->attribute_type_id))
                                                    @if($attribute->attribute_type_id==1)
                                                        <select name="" id="" class="form-control"><option value="">{{ucfirst($attribute->getAttributeType->name)}}</option></select></span>
                                                    @elseif($attribute->attribute_type_id==2)
                                                        <span class="btn btn-sm btn-primary">{{ucfirst($attribute->getAttributeType->name)}}</span>
                                                    @elseif($attribute->attribute_type_id==3)
                                                        <input type="text" disabled value="{{ucfirst($attribute->getAttributeType->name)}}" class="form-control">
                                                    @endif
                                                @endif
                                            </td>
                                            <td align="center"><a href="javascript:;" class="descriptionModal" data-id="{{$attribute->id}}"><i class="fa fa-eye"></i></a></td>
                                            <td align="center">
                                                <a href="{{url('admin/edit-attributes/'.$attribute->id)}}"><button type="button" class="btn btn-type btn-primary btn-sm btn-icon"  data-placement="top" data-content="Edit"><i class="fa fa-edit" title="edit"></i></button>
                                                <a href="javascript:;" ><button type="button"  class="showDeleteModal btn btn-type btn-danger  btn-sm btn-icon" data-id="{{$attribute->id}}" data-placement="top" data-content="Delete" title="delete"><i class="fa fa-trash"></i></button></a>
                                                 <a href="{{ url('create-property/'.$attribute->id) }}" ><button type="button"  class="btn btn-type btn-info  btn-sm btn-icon"  data-placement="top" data-content="Add Properties" title="add property"><i class="fa fa-parking "></i></button></a>
                                                   </td>
                                        </tr>    
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5" style="text-align:center;">No Record Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        {!! $attributes->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade show p-r-17-px" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display:none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll ps ps--active-y overflow-hidden height-200" data-scroll="true" data-height="200">
                    <p id="ajaxData"></p>
                <div class="ps__rail-x left-bottom"><div class="ps__thumb-x left-width" tabindex="0"></div></div><div class="ps__rail-y top-right height-200"><div class="ps__thumb-y top-height-70" tabindex="0"></div></div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade show p-r-17-px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body padding-top-bottom-5-11">
                <center>
                    <i class="la la-info-circle color-fb-font-70"></i><br><br>
                    <h3>Are you sure?</h3>
                    <P>You won't be able to revert this!</P>
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
<div class="modal fade show p-r-17-px" id="deleteallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body padding-top-bottom-5-11">
                <center>
                    <i class="la la-info-circle color-fb-font-70"></i><br><br>
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
        url  : "{{ url('admin/delete-attributes/') }}",
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
        var values = $("input[name='attributes[]']:checked")
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
      var values = $("input[name='attributes[]']:checked")
              .map(function(){return $(this).val();}).get();
                   $.ajax({
        type : "post",
        url  : "{{ url('delete-attribute-all') }}",
        data : {
        "_token": "{{ csrf_token() }}",
       "attribute_id":values,

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
        $('#attributes').click(function(){
            if($(this).prop("checked") == true){
                $("[name='attributes[]']").attr("checked", "checked");
            }
            else if($(this).prop("checked") == false){
                $("[name='attributes[]']").removeAttr("checked");
            }
        });
    });
    

</script>
@endpush