@extends('admin.layouts.scaffold')
@section('title')
Simsar | Sub Create Category
@endsection
@push('styles')
<style>
    .center{
        text-align:center;
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
            Adding Attributes in <a href="{{url('sub-categories/'.$subCategory->category_id)}}">{{ ucfirst($subCategory->title) }}</a>
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
   <form action="{{url('store-attribute')}}" method="POST"  class="kt-form kt-form--label-right" id="" novalidate="novalidate">
      {{ csrf_field() }}
      <input type="hidden" name="sub_category_id" value={{ $subCategory->id }}>
      <input type="hidden" name="category_id" value={{ $subCategory->category_id }}>
      
      <div class="kt-portlet__body">
         <div class="row" style="padding-bottom:1%;">
            <div class="col-md-12 text-right">
               <a href="{{url('attributes/'.$subCategory->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Attributes Listing For {{ ucfirst($subCategory->title) }}</button></a>
            </div>
         </div>
         
         
         
         <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="10%;" class="center">#</th>
                                    <th width="35%;">Title</th>
                                    <th width="10%;" class="center">Type</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($attributes->count() > 0)
                                    @foreach ($attributes as $key=>$attribute)
                                        <tr>
                                            
                                            <th scope="row" class="center">
                                                {{++$key}}
                                                <?php if(empty($attribute->attributes_status)){
                                                ?>
                                                <input type="checkbox" name="addselected[]" value="{{$attribute->id}}" >
                                                <?php  }?>
                                                
                                            </th>
                                            <td>{{ucfirst($attribute->title)}}</td>
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
                                           
                                            
                                        </tr>    
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5" style="text-align:center;">No Record Found</td>
                                </tr>
                                @endif
                                
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         
         
         
         
         
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
'<select name="type[]" class="form-control" id="type" >'+
'<option value="">Please Select</option>'+
'<option value="1">Drop Down</option>'+
'<option value="2">Button</option>'+
'<option value="3">Text Box</option>'+
'</select>'+
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
                            
                        // $.ajax({
                        //     url: '<?php echo "";?>delete-purchase-item',
                        //     type: 'POST',
                        //     data: { 'source':$(this).attr('id') },
                        //     success:function(data){
                        //         //console.log(data);
                        //       ths.parent().parent().remove();
                        //     }});
                            
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
