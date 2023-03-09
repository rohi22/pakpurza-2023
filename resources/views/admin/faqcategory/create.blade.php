@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Faq Categories
@endsection

@push('styles')
<style>
    .select2 .select2-selection__arrow{
            height: 26px !important;
    position: absolute !important;
    top: 15px !important; 
    right: 1px !important;
    width: 20px !important;
    }
    .select2 .select2-selection__rendered{
        line-height:11px !important;
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
                    Add Faq Categories
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
        <form action="{{url('admin/faq-category-store')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                
                
                <!--<div class="row" style="padding-bottom:1%;">-->
                <!--    <div class="col-md-12 text-right">-->
                <!--        <a href="{{url('categories')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Category Listing</button></a>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Title*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="title" class="form-control" placeholder="Enter Title">
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control kt-select2" name="status" id="kt_select2" name="select2">
                            <option  >--Select--</option>
                            <option value="1" >Active</option>
                            <option value="0" >De Active</option>
                        </select>
                    </div>
                 </div>

               
                
                
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
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
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>



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
'<input type="file" name="image[]" style="width:150px;">'+
// '<div class="col-lg-3">'+
// '<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_3">'+
// '<div class="kt-avatar__holder" style="background-image: url(https://mrcpotencia.com/simsar/public/assets/media/users/100_1.jpg);"></div>'+
// '<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar" >'+ 
// '<i class="fa fa-pen"></i>'+
// '<input type="file" name="image[]" >'+
// '</label>'+
// '<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">'+
// '<i class="fa fa-times"></i>'+
// '</span>'+
// '</div>'+
// '</div>'+
'</td>'+
'<td>'+
'<input type="file" name="icon[]" style="width:150px;" >'+
// '<div class="col-lg-3">'+
// '<div class="kt-avatar kt-avatar--outline abcd" id="kt_user_avatar_4">'+
// '<div class="kt-avatar__holder" style="background-image: url(https://mrcpotencia.com/simsar/public/assets/media/users/100_1.jpg);"></div>'+
// '<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">'+
// '<i class="fa fa-pen"></i>'+
// '<input type="file" name="icon" >'+
// '</label>'+
// '<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">'+
// '<i class="fa fa-times"></i>'+
// '</span>'+
// '</div>'+
// '</div>'+
'</td>'+
'<td>'+  
'<input id="kt_tagify_5" name="meta_keywords[]" placeholder="Add users" value="Chris Muller, Lina Nilson" >'+
'</td>'+
'<td>'+  
'<textarea id="kt_maxlength_2" name="meta_description[]" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>'+
'</td>'+
'<td>'+
'<select class="form-control kt-select2" name="status[]" id="kt_select2" name="select2" style="width:100px;" >'+
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
            //  var a = 1;
            $('.table-rows').append(htm);
            $('.final_total').remove();
           
           
            $('.sn').each(function(index){
                $(this).text(++index);
                
                // $(this).text(++index);
                 
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