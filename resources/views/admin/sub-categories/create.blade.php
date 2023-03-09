@extends('admin.layouts.scaffold')
@section('title')
Simsar | Sub Create Category
@endsection
@push('styles')
<link rel="stylesheet" href="{{URL::asset('public/asset/crop/croppie.css')}}">
<style>
.form-control-cus {
    width: unset !important;
    height: auto !important;
}

td span {
    display: block;
}
         .cv-spinner {
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .spinner {
          width: 40px;
          height: 40px;
          border: 4px #ddd solid;
          border-top: 4px #2e93e6 solid;
          border-radius: 50%;
          animation: sp-anime 0.8s infinite linear;
        }
        @keyframes sp-anime {
          100% {
            transform: rotate(360deg);
          }
        }
        .is-hide{
          display:none;
        }
        
   .p-b-1per{
       padding-bottom:1%; 
   } 
   .c-w{
     color:white;   
   }
   .b-c{
       background-color:lightgray; 
   }
   .w-100per{
       width:100%; 
   }
    .p-r-17px{
        padding-right: 17px; 
    }
    .w-1350px{
        width:1350px;
    }
    .p-t-5per-p-b-11per{
        padding-top:5%; padding-bottom:11%; 
    }
    .table_wrapper{
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    
</style>
    
</style>
@endpush
@section('content')
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="kt-portlet">
   <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
         <h3 class="kt-portlet__head-title">
            Adding  Sub Category in <a href="{{url('categories')}}">{{ ucfirst($category->title) }}</a>
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
   <form action="{{url('store-sub-category')}}" method="POST"   enctype="multipart/form-data" class="kt-form kt-form--label-right" id="" >
      {{ csrf_field() }}
      <input type="hidden" name="category_id" value={{ $category->id }}>
      <div class="kt-portlet__body">
         <div class="row p-b-1per">
            <div class="col-md-12 text-right">
               <a href="{{url('sub-categories/'.$category->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Sub Category Listing</button></a>
            </div>
         </div>
         
         
         
         <div class="full-width">  


<table class="table" border="0">
<tr>
<td>
<a class="btn btn-brand add-row pull-right"><i class="fa fa-plus c-w" ></i></a>
</td>
</tr>
</table>

<div class="table_wrapper">
  <div class="table-responsive">
    <table class="table table-bordered" style="width:auto;">
<thead>
<tr class="b-c">
<th width="25%;">S.No</th>
<th >Title</th>
<th class="min:190px;">Description</th>
<th class="min:190px;">Image</th>
<th class="min:190px;">Icon Image</th>
<th class="min:190px;">Meta Keywords</th>
<th class="min:190px;">Meta Descriptsion</th>
<th class="min:190px;">Name of 1st Dropdown</th>
<th class="min:190px;">Name of 2nd Dropdown</th>
<th class="min:190px;">Status</th>
<th class="min:190px;">Action</th>
</tr>
</thead>
<tbody class="table-rows">
<tr class="item-row">
<td class="sn">1</td>

<td>  
<input type="text" name="title[]" class="form-control form-control-cus" placeholder="Enter Title" required>
</td>

<td>
 <textarea id="kt_maxlength_1" name="description[]" class="form-control form-control-cus" required  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>
                  
</td>

<td>  
<input type="file" name="images[]"  class="checkImageValid w-100per" id="upload_image_first" required >
<input type="hidden" name="imgName" id="imgName" />
      <span>975px Width * 365px Height</span>
                  <!--  <div class="col-lg-3">-->
                  <!--   <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">-->
                  <!--      <div class="kt-avatar__holder" style="background-image: url(https://mrcpotencia.com/simsar/public/assets/media/users/100_1.jpg);"></div>-->
                  <!--      <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar" > -->
                  <!--      <i class="fa fa-pen"></i>-->
                  <!--      <input type="file" name="image[]" >-->
                  <!--      </label>-->
                  <!--      <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">-->
                  <!--      <i class="fa fa-times"></i>-->
                  <!--      </span>-->
                  <!--   </div>-->
                     
                  <!--</div>-->
                  
</td>
<td> 
<input type="file" name="icon[]"  class="checkImageValid w-100per" id="upload_image_second" required >
<input type="hidden" name="iconName" id="iconName" />
     <span>35px Width * 35px Height</span>

<!--<div class="col-lg-3">-->
<!-- <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">-->
<!--    <div class="kt-avatar__holder" style="background-image: url(https://mrcpotencia.com/simsar/public/assets/media/users/100_1.jpg);"></div>-->
<!--    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">-->
<!--    <i class="fa fa-pen"></i>-->
<!--    <input type="file" name="icon" >-->
<!--    </label>-->
<!--    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">-->
<!--    <i class="fa fa-times"></i>-->
<!--    </span>-->
<!-- </div>-->
 
<!--</div>-->
</td>
<td>  
<input id="kt_tagify_5" name='meta_keywords[]' placeholder="Add users" value="Chris Muller, Lina Nilson"  required>
</td>
<td>  
<textarea id="kt_maxlength_2" name="meta_description[]" class="form-control form-control-cus" required maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>
</td>
<td>  
<input type="text" name='name_of_first_dropdown[]' class="form-control form-control-cus" placeholder="Name of First Drop Down"  required>
</td>
<td>  
   <input type="text" name='name_of_second_dropdown[]' class="form-control form-control-cus" placeholder="Name of Second Drop Down"  required>
</td>
<td>
<select class="form-control form-control-cus kt-select2 w-100px" name="status[]" id="kt_select2" name="select2"  >
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
</div>
</div>




         <div class="kt-portlet__foot">
            <div class="kt-form__actions">
               <div class="row">
                  <div class="col-lg-12 text-right">
                     <button type="submit" class="btn btn-brand">Add</button>
                     <button type="reset" class="btn btn-secondary" onclick="window.location='{{ URL::previous() }}'">Cancel</button>
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
                    <i class="la la-info-circle c-fb-f-s-70px" ></i><br><br>
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

<div class="modal fade show p-r-17px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered center1" role="document">
        <div class="modal-content w-1350px" >
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                   <div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" class="w-100per"></div>
						  
  					</div>
				</div>
                    <div >
                        <button type="button" class="btn btn-danger hide-modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-primary" id="crop_image_one">Crop</button>
                    </div>
                </center>

            </div>

        </div>
    </div>
</div>
<div class="modal fade show p-r-17px" id="deleteModal_one_one" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
    <div class="modal-dialog modal-dialog-centered center1" role="document">
        <div class="modal-content w-1350px" >
           <input type="hidden" id="deleteIdOne">
            <div class="modal-body p-t-5per-p-b-11per" >
                <center>
                   <div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo_two" class="w-100per"></div>
						  
  					</div>
				</div>
                    <div >
                        <button type="button" class="btn btn-danger hide-modal_two">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-primary" id="crop_image_two">Crop</button>
                    </div>
                </center>

            </div>

        </div>
    </div>
</div>
<!---->
@endsection
@push('scripts')
<script src="{{URL::asset('public/asset/crop/croppie.js')}}" type="text/javascript"></script>





<script>



var htm = '<tr class="item-row">'+
'<td class="sn">1</td>'+
'<td>'+
'<input type="text"  name="title[]" class="form-control form-control-cus" placeholder="Enter Title" required>'+
'</td>'+
'<td>'+
'<textarea id="kt_maxlength_1" name="description[]" class="form-control form-control-cus" required maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>'+
'</td>'+
'<td>'+ 
'<input type="file" name="images[]" style="width:150px;" required>'+
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
'<input type="file" name="icon[]" style="width:150px;" required>'+
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
'<input id="kt_tagify_5" name="meta_keywords[]" required placeholder="Add users" value="Chris Muller, Lina Nilson" >'+
'</td>'+
'<td>'+  
'<textarea id="kt_maxlength_2" name="meta_description[]" required class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description" ></textarea>'+
'</td>'+
'<td>'+  
'<input type="text" name="name_of_first_dropdown[]" required class="form-control"  maxlength="255" placeholder="Name of First Drop Down" >'+
'</td>'+
'<td>'+  
'<input  type="text" name="name_of_second_dropdown[]" required class="form-control"  maxlength="255" placeholder="Name of Second Drop Down" >'+
'</td>'+
'<td>'+
'<select class="form-control kt-select2 form-control-cus" name="status[]" id="kt_select2" name="select2" style="width:100px;">'+
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
            
            
             var ab;
             $('.sn').each(function(index){
                   ab = index;
            });
            
            
          if(ab == 9){
                $('#limitModal').modal('show')
                return false;
            }
           else{
              
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
                }
          });


 $(".hide-modal").click(function(){
     //console.log('ok 22');
     $('#deleteModal').css('display', 'none');
            // $("#deleteModal_one_one").modal('hide');
            $('#deleteId').val('');
        });
        
         $(".hide-modal_two").click(function(){
     //console.log('ok 22');
     $('#deleteModal_one_one').css('display', 'none');
            // $("#deleteModal_one_one").modal('hide');
            $('#deleteIdOne').val('');
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
          
           $image_crop = $('#image_demo').croppie({
            	enableExif: true,
            	viewport: {
            		width: 975,
            		height: 365,
            		type: 'square' //circle
            	},
            	boundary: {
            		width: 1000,
            		height: 400
            	}
            });  
            
            $image_crop_two = $('#image_demo_two').croppie({
                	enableExif: true,
                		viewport: {
                    		width: 350,
                    		height: 350,
                    		type: 'square' //circle
                    	},
                    	boundary: {
                    		width: 1000,
                    		height: 400
                    	}
                });
                        
        $('#upload_image_first').on('change', function() {
        	var reader = new FileReader();
        	reader.onload = function(event) {
        		$image_crop.croppie('bind', {
        			url: event.target.result
        		}).then(function() {
        			console.log('jQuery bind complete');
        		});
        	};
        	reader.readAsDataURL(this.files[0]);
        	$('#deleteModal').css('display', 'block');
        });    
        
        $('#upload_image_second').on('change', function() {
        	var reader = new FileReader();
        	reader.onload = function(event) {
        		$image_crop_two.croppie('bind', {
        			url: event.target.result
        		}).then(function() {
        			console.log('jQuery bind complete');
        		});
        	};
        	reader.readAsDataURL(this.files[0]);
        	$('#deleteModal_one_one').css('display', 'block');
        });

        
        $('#crop_image_one').click(function() {
            
            loaderShow()
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {

				$.ajax({
					type: "Post",
					url: "{{ url('crop-image') }}",
					data: {
						"_token": "{{ csrf_token() }}",
						"image": response
					},
					success: function(data) {
					loaderHide()
						$('#imgName').val(data.image);
						console.log(data.image);
						$('#deleteModal').css('display', 'none');
					},

				});
			});
});






// $('#crop_image').click(function() {

//             loaderShow();
// 			$image_crop_two.croppie('result', {
// 				type: 'canvas',
// 				size: 'viewport'
// 			}).then(function(response) {
   
// 				$.ajax({
// 					type: "Post",
// 					url: "{{ url('crop-image') }}",
// 					data: {
// 						"_token": "{{ csrf_token() }}",
// 						"icon": response
// 					},
// 					success: function(data) {
					    
// 					    loaderHide();
// 						$('#iconName').val(data.image);
// 						console.log(data.image);
// 						$('#deleteModal_one_one').css('display', 'none');
// 					},

// 				});
// 			});
// });

        $('#crop_image_two').click(function() {
            
            loaderShow()
			$image_crop_two.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {

				$.ajax({
					type: "Post",
					url: "{{ url('crop-image') }}",
					data: {
						"_token": "{{ csrf_token() }}",
						"image": response
					},
					success: function(data) {
				        	loaderHide();
							$('#iconName').val(data.image);
					console.log(data.image);
						$('#deleteModal_one_one').css('display', 'none');
					},

				});
			});
});


  function loaderShow(){
      $("#overlay-loader").fadeIn(300);
  }

  function loaderHide(){
    $("#overlay-loader").fadeOut(300);
  }
          </script>
          
          
          <script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/custom/sub-category.js')}}" type="text/javascript"></script>
@endpush
