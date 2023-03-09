@extends('admin.layouts.scaffold')
@section('title')
Simsar | Create Sub Type 
@endsection
@push('styles')
<style>
    .c-w{
        color:white;
    }
    .p-b-1per{
    padding-bottom:1%; 
}
.bc-g{
    background-color:lightgray;
}
.w-150{
    width:150px;
}
.w-100{
    width:100px;
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
<div class="kt-portlet">
   <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
         <h3 class="kt-portlet__head-title">
            Adding  Sub Type in <a href="{{url('categories')}}">{{ ucfirst($brand->title) }}</a>
         </h3>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
         @if($errors->count() > 0)
         <br>
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
      </div>
      <div class="col-md-4">
      </div>
   </div>
   <!--begin::Form-->
   <form action="{{url('store-sub-type')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--label-right" id="" novalidate="novalidate">
      {{ csrf_field() }}
      <input type="hidden" name="brand_id" value={{ $brand->id }}>
      <div class="kt-portlet__body">
         <div class="row p-b-1per" >
            <div class="col-md-12 text-right">
               <a href="{{url('sub-types/'.$brand->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Sub Types Listing</button></a>
            </div>
         </div>
         <div class="full-width">
            <table class="table" border="0">
               <tr>
                  <td>
                     <a class="btn btn-brand add-row pull-right"><i class="fa fa-plus c-w"></i></a>
                  </td>
               </tr>
            </table>
            <table class="table" border="1">
               <thead>
                  <tr class="bc-g">
                     <th>S.No</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Image</th>
                     <th>Icon Image</th>
                     <th>Meta Keywords</th>
                     <th>Meta Descriptsion</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody class="table-rows">
                  <tr class="item-row">
                     <td class="sn">1</td>
                     <td>  
                        <input type="text" name="title[]" class="form-control" placeholder="Enter Title" required>
                     </td>
                     <td>
                        <textarea id="kt_maxlength_1" name="description[]" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>
                     </td>
                     <td>
                        <input type="file" name="image[]"  class="checkImageValid w-150">
                     </td>
                     <td>
                        <input type="file" name="icon[]"  class="checkImageValid w-150">
                     </td>
                     <td>  
                        <input id="kt_tagify_5" name='meta_keywords[]' placeholder="Add users" value="Chris Muller, Lina Nilson" >
                     </td>
                     <td>  
                        <textarea id="kt_maxlength_2" name="meta_description[]" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>
                     </td>
                     <td>
                        <select class="form-control kt-select2 w-100" name="status[]" id="kt_select2" name="select2"  >
                           <option value="1">Active</option>
                           <option value="0">De Active</option>
                        </select>
                     </td>
                     <td>
                        <a class="btn btn-primary delete-table-row c-w" ><i class="fa fa-trash c-w" ></i>
                        </a>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="kt-portlet__foot">
            <div class="kt-form__actions">
               <div class="row">
                  <div class="col-lg-12 text-right">
                     <button type="submit" class="btn btn-brand">Add</button>
                     <button type="reset" class="btn btn-secondary">Cancel</button>
                  </div>
               </div>
            </div>
         </div>
   </form>
   <!--end::Form-->
   </div>
</div>
<!-- end:: Content -->
<!---->
<div class="modal fade show p-r-17px" id="limitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <input type="hidden" id="deleteId">
         <div class="modal-body p-t-5per-p-b-11per">
            <center>
               <i class="la la-info-circle c-fb-f-s-70px"></i><br><br>
               <h3>Alert ?</h3>
               <P>You can Insert only 10 category at a time!</P>
               <div >
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close !</button>
                  &nbsp;
            </center>
            </div>
         </div>
      </div>
   </div>
</div>
<!---->
@endsection
@push('scripts')
<script>

   var htm = '<tr class="item-row">'+
   '<td class="sn">1</td>'+
   '<td>'+
   '<input type="text"  name="title[]" class="form-control" placeholder="Enter Title" required>'+
   '</td>'+
   '<td>'+
   '<textarea id="kt_maxlength_1" name="description[]" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>'+
   '</td>'+
   '<td>'+ 
   '<input type="file" name="image[]" style="width:150px;" accept="image/*">'+
   '</td>'+
   '<td>'+
   '<input type="file" name="icon[]" style="width:150px;" accept="image/*">'+
   '</td>'+
   '<td>'+  
   '<input id="kt_tagify_5" name="meta_keywords[]" placeholder="Add users" value="Chris Muller, Lina Nilson" >'+
   '</td>'+
   '<td>'+  
   '<textarea id="kt_maxlength_2" name="meta_description[]" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>'+
   '</td>'+
   '<td>'+
   '<select class="form-control kt-select2" name="status[]" id="kt_select2" name="select2" style="width:100px;">'+
   '<option value="1">Active</option>'+
   '<option value="0">De Active</option>'+
   '</select>'+
   '</td>'+
   '<td><a id="0" class="btn btn-primary delete-table-row" style="color:white;"><i class="fa fa-trash" style="color:white;">'+
   '</a></td>'+
   '</tr>';

   $(document).on('click','.add-row',function(){
      var ab;
      $('.sn').each(function(index){
            ab = index;
      });
      
      
      if(ab == 9){
         $('#limitModal').modal('show')
         return false;
      }
      else{
         
         //  var a = 1;
         $('.table-rows').append(htm);
         $('.final_total').remove();
         
         
         $('.sn').each(function(index){
            $(this).text(++index);
            $('#total_quantity').val(index++);
               
         });
         
         $('.abc').each(function(index){
               
            var id = $(this).attr('id');
            ++index;
            var a = index;
            if(id == "kt_user_avatar_3_"){
               $(this).attr('id',id+a);
               }
               
         });
         
         $('.abcd').each(function(index){
               
            var id = $(this).attr('id');
            ++index;
            var a = index;
            if(id == "kt_user_avatar_4_"){
               $(this).attr('id',id+a);
               }
               
         });
      }
   });




   $(document).on('click','.delete-table-row',function(){
      ths = $(this);
      if( $('.item-row').length > 1 ){
         if( $(this).attr('id') != 0 ){      
            if($(this).attr('id')=="-1"){
               $(this).parent().parent().remove();
            
               $('.sn').each(function(index){
                  $(this).text(++index);
               });}

            else{
               if( confirm('Are You Sure') ){
               }
            }
         }
         else{

            $(this).parent().parent().remove();
            $('.sn').each(function(index){
            $(this).text(++index);
            $('#total_quantity').val(index++);
               
            $("#total_discount_per").val(' ');
            $("#total_discount_amount").val(' ');
            $("#total_net_amount").val(' ');

         });}
      }
      else{
         $('.alert-sms').html('');
         $('#alertModal').modal('show');
         $('.alert-sms').html('<p>You are not allowed to delete this item</p>');        
   }});
               
               
               
   
             
</script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/custom/sub-category.js')}}" type="text/javascript"></script>
@endpush
