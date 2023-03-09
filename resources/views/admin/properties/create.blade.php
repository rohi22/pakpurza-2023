@extends('admin.layouts.scaffold')
@section('title')
Simsar | Sub Create Category
@endsection
@push('styles')
<style>
    .p-b-1per{
      padding-bottom:1%;   
    }
    .c-w{
        color:white; 
    }
    .b-c-l{
        background-color:lightgray; 
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
            Adding  Properties 
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
   <form action="{{url('store-property')}}" method="POST"  class="kt-form kt-form--label-right" id="" novalidate="novalidate">
      {{ csrf_field() }}
      <input type="hidden" name="attribute_id" value={{ $attribute->id }}>
      <!--<input type="hidden" name="category_id" value={{ $attribute->category_id }}>-->
      <!--<input type="hidden" name="sub_category_id" value={{ $attribute->sub_category_id }}>-->
      
      
      <div class="kt-portlet__body">
         <div class="row p-b-1per" >
            <div class="col-md-12 text-right">
               <a href="{{url('properties/'.$attribute->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Properties Listing For {{ ucfirst($attribute->title) }}</button></a>
            </div>
         </div>
         
         <!---->
         <!---->
         
   <div class="full-width">  

<table class="table" border="0">
<tr>
<td>
<a class="btn btn-type add-row pull-right c-w"><i class="fa fa-plus" ></i></a>
</td>
</tr>
</table>


<table class="table" border="1">
<thead>
<tr class=" b-c-l">
<th>S.No</th>
<th>Title</th>
<th>Description</th>
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
<select class="form-control kt-select2" name="status[]" id="kt_select2" name="select2" >
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
    
         <!---->
         <!---->
         
         <div class="kt-portlet__foot">
            <div class="kt-form__actions">
               <div class="row">
                  <div class="col-lg-12 text-right">
                     <button type="submit" class="btn btn-type">Add</button>
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
@endsection
@push('scripts')
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/custom/sub-category.js')}}" type="text/javascript"></script>




<script>


var htm =   '<tr class="item-row">'+
'<td class="sn">1</td>'+
'<td>'+
'<input type="text"  name="title[]" class="form-control" placeholder="Enter Title" required>'+
'</td>'+
'<td>'+
'<textarea id="kt_maxlength_1" name="description[]" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>'+
'</td>'+
'<td>'+
'<select class="form-control kt-select2" name="status[]" id="kt_select2" name="select2" >'+
'<option value="1">Active</option>'+
'<option value="0">De Active</option>'+
'</select>'+
'</td>'+
'<td><a id="0" class="btn btn-primary delete-table-row" style="color:white;"><i class="fa fa-trash" style="color:white;">'+
'</a></td>'+
'</tr>';


        <?php //else:?>
        //var htm = $('.table-rows').html();
        <?php //endif;?>
        $(document).on('click','.add-row',function(){
            $('.table-rows').append(htm);
            $('.final_total').remove();
            $('.sn').each(function(index){
                $(this).text(++index);

                $('#total_quantity').val(index++);
            });
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
                }else{
                    $(this).parent().parent().remove();
                    $('.sn').each(function(index){
                        $(this).text(++index);
                        $('#total_quantity').val(index++);
                         
                         $("#total_discount_per").val(' ');
                         $("#total_discount_amount").val(' ');
                         $("#total_net_amount").val(' ');
                    });}
            }else{
                $('.alert-sms').html('');
                $('#alertModal').modal('show');
                $('.alert-sms').html('<p>You are not allowed to delete this item</p>');
                  
            }});
            
            
            

          </script>


@endpush
