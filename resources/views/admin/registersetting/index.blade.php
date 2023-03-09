@extends('admin.layouts.scaffold')

@section('title')
Simsar | Register Setting
@endsection

@push('styles')
<style>
      
.center{
  text-align:center;  
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
   .t-365-r-0px-h-200px{
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



</style>
@endpush

@section('content')


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Register Setting
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
           
            
            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="10%;"  class="center">#</th>
                                    <th width="35%;">Title</th>
                                    <th width="10%;" class="center">Status</th>
                                    <th width="15%;"  class="center">Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($setting->count() > 0)
                                    @foreach ($setting as $key=>$s)
                                        <tr>
                                            
                                            <th scope="row" class="center">{{$key + $setting->firstItem()}}</th>
                                            <td >{{ucfirst($s->title)}}</td>
                                            <td  align="center">
                                               
                                                    @if($s->status==0)
                                                       ONN
                                                   
                                                    @else
                                                        OFF
                                                    @endif
                                               
                                            </td>
                                           
                                            <td align="center">
                                                
                                                 <select name="change_status[]" postid="{{ $s->id }}" >
                                                        <option value="0" @if($s->status==0) Selected @else  @endif>ONN</option>
                                                        <option value="1" @if($s->status==1) Selected @else  @endif >OFF</option>
                                                        
                                            </select>
                                            
                                            
                                            </td>
                                        </tr>    
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="center">No Record Found</td>
                                </tr>
                                @endif
                                
                              
                            </tbody>
                        </table>
                        
                        {!! $setting->links() !!}
                        
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
                <div class="kt-scroll ps ps--active-y h-200px" data-scroll="true" data-height="200">
                    <p id="ajaxData"></p>
                <div class="ps__rail-x l-0px-b-365px" ><div class="ps__thumb-x l-0px-w-0px" tabindex="0" ></div></div><div class="ps__rail-y t-365-r-0px-h-200px" ><div class="ps__thumb-y t-130px-h-70px" tabindex="0" ></div></div></div>
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
                    <i class="la la-info-circle c-fb-f-s-70px"></i><br><br>
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
@endsection

@push('scripts')
<script>


$("[name='change_status[]']").change(function(){
    var id = $(this).attr('postid');
    var val = $(this).val();

    
    $.ajax({
        type : "post",
        url  : "{{ url('registration-setting-status') }}",
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
    
    
 
});
</script>
@endpush