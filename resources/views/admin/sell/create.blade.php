@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Ads Sell
@endsection

@push('styles')

<link rel="stylesheet" href="{{URL::asset('public/asset/crop/croppie.css')}}">

<style>
    
.center{
  text-align:center;  
}
   
   .p-r-17px{
     padding-right: 17px;   
   }
   .p-t-5per-p-b-11per{
       padding-top:5%; padding-bottom:11%; 
   }
   .m-h{
       min-height: 180px;
   }
   
   .w-h{
    width:70px;height:70px;    
   }
   
   .m{
    margin: 1.75rem 19.1rem !important;"   
   }
   
   .wd{
       width:151% !important;
   }
   
   .w{
       width:100%;
   }
   
   .w-px-h{
       width: 100%; height: 400px;
   }
   
   .margin{
       margin:0px !important;
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
                    Add Ads Sell
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
        <form action="{{url('save-adsell-list')}}" method="POST" enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                

               <div class="form-group row">
                    <label class="col-lg-1 col-form-label">User:*</label>
                    <div class="col-lg-11">
                        <select class="form-control kt-select2" id="user" name="user">
                               <option >Select</option>
                                @if($user->count() > 0)
                                @foreach($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->unique_id }}</option>
                                @endforeach
                                @else
                                <option>No User Available</option>
                                @endif
                        </select>
                    </div>
                </div>
                
                
                
                <div class="form-group row">
                    <label class="col-lg-1 col-form-label pull-left">Category:*</label>
                    
                    <div class="col-lg-4">
                        <select class="form-control kt-select2" id="category" name="category"  >
                           <option >Select</option>
                               
                                @if($category->count() > 0)
                                @foreach($category as $c)
                                <option value="{{ $c->id }}">{{ ucfirst($c->title) }}</option>
                                @endforeach
                                @else
                                <option>No Category Available</option>
                                @endif
                    
                        </select>
                    </div>
                    <div class="col-lg-1"></div>
                    <label class="col-lg-2 col-form-label">Sub Category:</label>
                    <div class="col-lg-4">
                        <select class="form-control kt-select2" id="sub_category" name="sub_category"   >
                            
                        </select>
                    </div>
                </div>
                
                
                
                        <div class="form-group row">
                                <div class="col-lg-12" id="brandDowns"></div>
                                <div class="col-lg-12" id="dropDowns"></div>
                                <div class="col-lg-12" id="buttons"></div>
                                <div class="col-lg-12" id="txtBoxes"></div>
                                <div class="col-lg-12" id="getAttributesz"></div>
                                <div class="col-lg-12" id="subBrands" style="display:none"></div>
                                <div class="col-12" id="subBrandsAttribute" style="display:none"></div>
                        </div>
                        
                        
                        
                        
                        
                    <div class="col-12 form-group" id="onCall">
                       <h6 for="my-text-field" class="font-18 color-70 m-t-10">On Call:</h6>
                       <select class="form-control border-rad-10 m-t-10 font-14" name="is_call" id="is_call" >
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                       </select>
                    </div>
                    
                    
                      <div class="col-12 col-md-12 form-group" id="uper_price">
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Price:</h6>
                        <input type="number" name="price" id="price" placeholder="price" class="form-control border-rad-10 m-t-10 font-14" required value="0" >
                      </div>
                       <div class="col-12 col-md-12 form-group" id="uper_discount_price">
                           
                        <label for="my-text-field" class="font-18 color-70 m-t-10">Offer Price:</label>
                        <input type="number" name="dis_price" id="dis_price" placeholder="Discount Price" class="form-control border-rad-10 m-t-10 font-14" value="0" required>
                      </div>
                      <div class="col-12 col-md-12 form-group" id="uper_discount_percentage">
                        <label for="my-text-field" class="font-18 color-70 m-t-10">% Off:</label>
                        <input type="number" name="dis_percentage" id="dis_percentage" placeholder="Discount Percentage" class="form-control border-rad-10 m-t-10 font-14 haveBackgroundColorWhite" value="0" required readonly>
                      </div>
                      <div class="col-12 col-md-12 form-group" id="start_date">
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Offer Start Date:<span class="colorRed"></span></h6>
                          <input type="date" class="form-control border-rad-10 m-t-10 font-14" name="start_offer" id="start_offer" value="2020-07-27 13:33:00" >
                      </div>
                      <div class="col-12 col-md-12 form-group" id="end_date">
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Offer End Date:<span class="colorRed"></span></h6>
                        <input type="date" class="form-control border-rad-10 m-t-10 font-14" name="end_offer" id="end_offer" value="2020-07-29 13:33:00" >
                      </div>
                      
                    
                    
                    
                    <div class="col-md-5 mx-auto text-left">
                        <div class="row">
                          <div class="col-12 form-group">
                            <h6 for="my-text-field" class="font-18 color-70 m-t-10">Ad. Title: <span class="colorRed">*</span></h6>
                            <input id="title" maxlength="70" name="title"  class="form-control border-rad-10 m-t-10 font-14" required>
                            
                         </div>
                          <div class="col-12" style="display:none;">
                            <!--<h6 for="my-textarea" class="font-18 color-70 m-t-10">Short Description <span class="colorRed">*</span></h6>-->
                            <!--  <textarea class="form-control border-rad-10 m-t-10 font-14" id="my-textarea" maxlength="100"  name="short_description" data-counter-label="0/{remaining} characters left." style="min-height: 180px;" required></textarea>-->
                            <!--    <span id="span-my-textarea">100/0</span>-->
                          </div>
                          <div class="col-12">
                            <h6 for="my-textarea" class="font-18 color-70 m-t-10">Description: <span class="colorRed">*</span></h6>
                              <textarea class="form-control border-rad-10 m-t-10 font-14 m-h" id="long_description" maxlength="4096"  name="long_description" data-counter-label="0/{remaining} characters left." required></textarea>
                          <span id="span-long-description">4096/0</span>
                          </div>
                        </div>
                  </div>
                  
                  
                  
                
                </div>
                
                 
                 

                  
                <div class="form-group row">
                     <div class="col-lg-10 ml-2">
                        <h3 class="color-70">Upload Featured Photos</h3>
                      </div>
                      <div class="col-lg-10 ml-2">
                        <p>To give us the best overview of your ad. Please enter all the required details as accurately as possible.</p>
                      </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Main Image*</label>
                        <div class="col-lg-3">
                            <img class="profile-pic upload-button max-size-70 w-h" src="{{ asset('public/asset/images/upload-image-vector.png') }}"  title="Cover Image" />
                            <input type="file" name="mainImage" id="mainImage" style="display:none;" />
                            <input type="hidden" name="imgProfileImage" id="imgProfileImage"/>
                        </div>
                    <label class="col-lg-2 col-form-label">Hover Image*</label>
                        <div class="col-lg-3">
                            <img class="profile-pic1 upload-buttons max-size-70 w-h" src="{{ asset('public/asset/images/upload-image-vector.png') }}"  title="Orignal Image" />
                            <input type="file" name="hoverImage" id="hoverImage" style="display:none;" />
                            <input type="hidden" name="imgProfileImage1" id="imgProfileImage1"/>  
                        </div>
                </div>
                
                
                
                <div class="form-group row">
                     <div class="col-lg-10 ml-2">
                        <h3 class="color-70">Upload Gallery Photos</h3>
                      </div>
                      <div class="col-lg-10">
                      </div>
                </div>
                <div class="form-group row">
                     <?php  for($x = 2; $x < 12; $x++){  ?>
                     
                     
                     
                        <label class="col-lg-2 col-form-label">Gallery Image*</label>
                        <div class="col-lg-4 mb-2">
                            <img class="gallery-pics{{$x}} upload-button{{$x}} max-size-70 w-h" src="{{ asset('public/asset/images/upload-image-vector.png') }}"  title="Gallery Image">
                                <input type="file" name="galleryImage[]" id="hoverImage{{$x}}" style='display:;'>
                                <input type="hidden" name="imgGalleryImage[]" id="imgProfileImage{{$x}}" />
                        </div>
                        
                        
                        
            <div id="cropModal{{$x}}" class="modal" role="dialog">
	<div class="modal-dialog  modal-dialog-banner m">
		<div class="modal-content border-rad-20 wd">
      		<div class="modal-header">
        		<h4 class="modal-title center" >Upload & Crop Image</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo{{$x}}" class="w"></div>
						  <!--<div class="loader-crop"></div>-->
  					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-success crop_image{{$x}}" >Crop & Save Image</button>
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>



                        
                        
                        
                    <?php  }  ?>
                    
                 </div>
                <div class="form-group row">
                     <div class="col-lg-10 ml-2">
                        <h3 class="color-70">Update Your Location</h3>
                      </div>
                      <div class="col-lg-10 ml-2">
                        <p>Please fill below the following fields.</p>
                      </div>
                </div>
                
                
                
                
         @if($is_kuwait == 1)
         
         
         <input type="hidden" name="country" value="Kuwait">
                    <input type="hidden" name="state">
                    <input type="hidden" name="city">
                    <input type="hidden" name="lati">
                    <input type="hidden" name="long">
                     <input type="hidden" name="countryIp" value="{{$is_kuwait}}">
                    
                    
                  <div class="row ">
                    <div class="col-md-4 mt-2">
                      <select  id="country" class="form-control ml-2">
                        <option value="">Select Country</option>
                        <option value="29.31166,47.481766,6" selected="selected">Kuwait</option>
                      </select>
                    </div>
                      <div class="col-md-4 mt-2">
                          <select  id="state" class="form-control" >
                            <option value="">Select State</option>
                            @if ($states->count() > 0)
                                @foreach ($states as $state)
                                    <option value="{{$state->latitude.','.$state->longitude.',12'}}">{{$state->name}}</option>
                                @endforeach
                            @endif
                          </select>
                        </div>
                        <div class="col-md-4 mt-2">
                          <select  id="city" class="form-control city mr-2">
                            <option value="">Select City</option>
                          </select>
                        </div>
                        <div class="col-md-12 mt-3">
                          <div class="showMap">
                            <div id="map2" class="w-px-h"></div>
                          </div>
                      </div>
                    </div>
                
                
            @else
            
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label ">Select Location</label>
                    <div class="col-lg-8">
                        <select class="form-control kt-select2" name="sell_location" id="sell_location"   >
                              
                        </select>
                    </div>
                </div>
                 <div id="makemap" style="display:none;">
                      
                          <script src="{{ URL::asset('public/asset/js/map.js') }}"></script>
                          
                <div id="map"></div>
                            
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Search Location</label>
                    <div class="col-lg-8">
                        <input id="pac-input" class="form-control" type="text" placeholder="Enter a location">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Country</label>
                    <div class="col-lg-3">
                          <input id="country" name="country" class="form-control" readonly type="text" placeholder="Country">
                    </div>
                     <label class="col-lg-2 col-form-label">State</label>
                    <div class="col-lg-3">
                        <input id="state" name="state" class="form-control" readonly type="text" placeholder="State">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">City</label>
                    <div class="col-lg-3">
                         <input id="city" name="city" class="form-control" readonly type="text" placeholder="City">
                    </div>
                     <label class="col-lg-2 col-form-label">Latitude</label>
                    <div class="col-lg-3">
                        <input id="lati" name="lati" class="form-control" readonly type="text" placeholder="Latitude">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Longitude</label>
                    <div class="col-lg-3">
                          <input id="long" name="long" class="form-control" readonly type="text" placeholder="Longitude">
                    </div>
                     <label class="col-lg-2 col-form-label">Address</label>
                    <div class="col-lg-3">
                        <input id="address" name="address" class="form-control" readonly type="text" placeholder="Address">
                        <input type="hidden" name="countryIp" value="0">
                    </div>
                </div>


            
            </div>
                
        
         @endif
        
        
        
                <div class="form-group row">
                     <div class="col-lg-10 mt-2 ml-2">
                        <h3 class="color-70">Review Your Contact Details</h3>
                      </div>
                      <div class="col-lg-10 ml-2">
                        <p>Please fill the following fields</p>
                      </div>
                      
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label"> Name</label>
                    <div class="col-lg-3">
                          <input id="name" name="name" class="form-control" readonly type="text" placeholder="Name">
                    </div>
                     <label class="col-lg-2 col-form-label">Number</label>
                    <div class="col-lg-3">
                        <input id="number" name="number" class="form-control" readonly type="text" placeholder="Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label"> Show number on ads </label>
                    <div class="col-lg-3 mt-3">
                         <input type="checkbox" id="is_number" name="is_number" value="0">
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




<div id="cropModal" class="modal" role="dialog">
	<div class="modal-dialog  modal-dialog-banner m">
		<div class="modal-content border-rad-20 wd">
      		<div class="modal-header">
        		<h4 class="modal-title center">Upload & Crop Image</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" class="w"></div>
						  <!--<div class="loader-crop"></div>-->
  					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-success crop_image" >Crop & Save Image</button>
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>

<div id="cropModal1" class="modal" role="dialog">
	<div class="modal-dialog  modal-dialog-banner border-rad-20 m">
		<div class="modal-content border-rad-20 wd">
      		<div class="modal-header">
        		<h4 class="modal-title center">Upload & Crop Image</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo1" clas="w"></div>
						  <!--<div class="loader-crop"></div>-->
  					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-success crop_image1" >Crop & Save Image</button>
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>

<div class="modal fade show p-r-17px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered margin" role="document">
        <div class="modal-content">
           <input type="hidden" id="deleteId">
            <div class="modal-body p-t-5per-p-b-11per">
                <center>
                   <div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" class="w"></div>
						  
  					</div>
				</div>
                    <div >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancel!</button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" id="crop_image">Yes, Crop it!</button>
                    </div>
                </center>

            </div>

        </div>
    </div>
</div>

<!-- end:: Content -->
@endsection

@push('scripts')
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

<script src="https://maps.googleapis.com/maps/api/js?key="APIKEY"&libraries=places&callback=initMap" ></script>

<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>-->
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>

<script src="{{ URL::asset('public/asset/js/map.js') }}"></script>

<script src="https://ticketwala.pk/assets/crop/croppie.js"></script>

<script>
    
var geocoder;
var map;
var geoMarker;
function initialize() {
    var map = new google.maps.Map(
        document.getElementById("map2"), {
            center: new google.maps.LatLng(29.31166, 47.481766),
            zoom: 6,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    geoMarker = new google.maps.Marker();
    geoMarker.setPosition(map.getCenter());
    geoMarker.setMap(map);

    

    $("#country").change(function() {
        const input = $(this).val();
        const latlngStr = input.split(",", 3);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            location: latlng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                geoMarker.setOptions({
                    position: results[0].geometry.location,
                });
                map.setZoom(parseFloat(latlngStr[2]));
            } else {
                alert("Something got wrong " + status);
            }
        });
    });
    $("#state").change(function() {
        const input = $(this).val();
        const latlngStr = input.split(",", 3);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };
        
        $.ajax({
            type:'GET',
            url:"{{url('get-city')}}",
            data:{
            city_id : jQuery(this).val(),
            },
    beforeSend:function(){
        $(".loader").show();
    },
            success:function(res){
              
        $(".loader").hide();
                $("[name='state']").val("");
                $("[name='city']").val("");

                $("[name='state']").val(res.state_name);
                $('.city').empty();
                $('.city').append('<option value="">Select City</option>');
                jQuery.each(res.city, function(i, v) {
                    jQuery(".city").append('<option value="'+[v.lat, v.lng,v.zoom].join(',')+'">'+v.name+'</option>');
              });                
            }  
        })

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            location: latlng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                geoMarker.setOptions({
                    position: results[0].geometry.location,
                });
                map.setZoom(parseFloat(latlngStr[2]));
            } else {
                alert("Something got wrong " + status);
            }
        });
    });
    $("#city").change(function() {
        const input = $(this).val();
        const latlngStr = input.split(",", 3);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };

        $.ajax({
            type:'GET',
            url:"{{url('get-city-name')}}",
            data:{
            city_id : jQuery(this).val(),
            },
    beforeSend:function(){
        $(".loader").show();
    },
            success:function(res){
        $(".loader").hide();
                $("[name='city']").val(res.city_name);
                $("[name='lati']").val(res.latitude);
                $("[name='long']").val(res.longitude);
                              
            }  
        })

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            location: latlng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                geoMarker.setOptions({
                    position: results[0].geometry.location,
                });
                    map.setZoom(parseFloat(latlngStr[2]));
            } else {
                alert("Something got wrong " + status);
            }
        });
    });

}
google.maps.event.addDomListener(window, "load", initialize);
</script>

<?php for($x = 2; $x < 12; $x++){  ?>
<script>
$('#hoverImage{{$x}}').on('change', function(){
   
                                                var reader = new FileReader();
                                                reader.onload = function (event) {
                                                  $image_crop{{$x}}.croppie('bind', {
                                                    url: event.target.result
                                                    
                                                  }).then(function(){
                                                    
                                                    // console.log('jQuery bind complete');
                                                  });
                                                }
                                                
                                                reader.readAsDataURL(this.files[0]);
                                                initialized_the_cropper_{{$x}}()
                                                $('#cropModal{{$x}}').modal('show');
                                            
                                              });
//   
// 
// 
$('.crop_image{{$x}}').click(function(event){
    $image_crop{{$x}}.croppie('result',{
    }).then(function(result) {
        
        
        $(".loader").show();
      $.ajax({
        url:"gallery-crop-image",
        type: "POST",
        data:{
            "_token": "{{ csrf_token() }}",
            "image": result},
        success:function(data)
        {
        
        
            // alert('asdsadsad');
          
        $(".loader").hide();
          
          
          
          <?php  for($xx = 2; $xx < 12; $xx++){ ?>
                
                if($("#imgProfileImage{{$xx}}").val() == ''){
                    
                    $("#imgProfileImage{{$xx}}").val(data.image);
                    $('.gallery-pics{{$xx}}').attr('src', data.path);
                    
                    if($("#imgProfileImage{{$xx}}").val() != ''){
                        $('#cropModal{{$x}}').modal('hide');
                        
                        $('#hoverImage{{$x}}').val('');
                        
                        return false;
                        
                    }
                    
                }
            
        <?php } ?>
          
        //   $('.gallery-pics{{$x}}').attr('src', data.path);  
          
          
          
        //   $('#hoverImage{{$x}}').val('');
          
          
        //  alert($('#imgProfileImage').val());
        }
      });
    })
  });
function initialized_the_cropper_{{$x}}(){

            
             $image_crop{{$x}} = $('#image_demo{{$x}}').croppie({
                
                  viewport: {
                    width: 724,
                    height: 559 ,
                    type:'square' // or 'circle'
                  },
                  boundary: {
                    width: 724,
                    height: 559
                  },
                  orientationControls: {
                    enabled:true,
                    leftClass:'',
                    rightClass:''
                  },
                  resizeControls: {
                    width:true,
                    height:true
                  },
                  enableResize:false,
                  showZoomer:true,
                  mouseWheelZoom:true,
                  enableExif:false,
                  enforceBoundary:true,
                  enableOrientation:true,
                  enableKeyMovement:true,
         
        });
        
        }
</script>
<?php    } ?>

<script>
// 
// 
$('.cr-slider').attr({'min':0.5000, 'max':1.5000});
// 
// 
// 
$('#mainImage').on('change', function(){
   
//   $('#mainImage').change(function(){
//   alert('asdsad');
   
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
        
      }).then(function(){
        
        // console.log('jQuery bind complete');
      });
    }
    
    reader.readAsDataURL(this.files[0]);
    initialized_the_cropper()
    
    $('#cropModal').modal('show');
    
    // $('#cropModal').css('display','block');

  });
//   
// 
// 
 $('.crop_image').click(function(event){
    $image_crop.croppie('result',{
    }).then(function(result) {
        
        // console.log(result);
        $(".loader").show();
      $.ajax({
        url:"sellnow-crop-image",
        type: "POST",
        data:{
            "_token": "{{ csrf_token() }}",
            "image": result},
        success:function(data)
        {
            
          $(".loader").hide();
        
          $("#imgProfileImage").val(data.image);
          $('.profile-pic').attr('src', data.path);          
          $('#cropModal').modal('hide');
        }
      });
    })
  });
//  
// 
// 
$('#hoverImage').on('change', function(){
    
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop1.croppie('bind', {
        url: event.target.result
        
      }).then(function(){
        
        // console.log('jQuery bind complete');
      });
    }
    
    reader.readAsDataURL(this.files[0]);
    initialized_the_cropper_second()
    $('#cropModal1').modal('show');

  });
//   
// 
// 
 $('.crop_image1').click(function(event){
    $image_crop1.croppie('result',{
    }).then(function(result) {
        
        // console.log(result);
        $(".loader").show();
      $.ajax({
        url:"sellnow-crop-image",
        type: "POST",
        data:{
            "_token": "{{ csrf_token() }}",
            "image": result},
        success:function(data)
        {
            
            // alert('asdsadsad');
        //   console.log(data);
        $(".loader").hide();
          $("#imgProfileImage1").val(data.image);
          $('.profile-pic1').attr('src', data.path);          
          $('#cropModal1').modal('hide');
        //  alert($('#imgProfileImage').val());
        }
      });
    })
  });
//  
// 
// 
// 
// 
$('#user').change(function(){
    var userId = $(this).val();
    if(userId != ''){
        $.ajax({
            type : "post",
            url  : "{{ url('admin/get-user-data') }}",
            data : {
                "_token": "{{ csrf_token() }}",
                "userId": userId,
            },
            beforeSend:function(){
              $(".loader").show();
            },
            success:function(data){
                $('#name').val(data.username);
                $('#number').val(data.userphone);
                $('#sell_location').html(data.mapdata);
            },
    });
  }
});
$('#category').change(function(){
    var categoryId = $(this).val();
    if(categoryId != ''){
        $.ajax({
            type : "post",
            url  : "{{ url('admin/get-subCategories') }}",
            data : {
                "_token": "{{ csrf_token() }}",
                "categoryId": categoryId,
            },
            beforeSend:function(){
              $(".loader").show();
            },
            success:function(data){
                
                
      $("#subBrands").empty();
      $("#getAttributesz").empty();
      
      $("#dropDowns").empty();
      $("#buttons").empty();
      $("#txtBoxes").empty();
      $("#brandDowns").empty();
      $("#Brands").empty();
      $("#oldSubCategoryDropDown").empty();
      $("#oldSubCategoryButton").empty();
      $("#oldSubCategoryInput").empty();
      $("#oldBrand").empty();
       $('.clearAttributes').remove();
        $('.clearSubAttributes').remove();
      
      
                $("#sub_category").html(data.categorydata);
            },
    });
  }
});
$('#sub_category').change(function(){

    var subCategoryId = $(this).val();
   
    $("#subBrands").empty();
     $("#getAttributesz").empty();
      $("#dropDowns").empty();
      $("#buttons").empty();
      $("#txtBoxes").empty();
      $("#brandDowns").empty();
      
      $("#Brands").empty();
      $("#oldSubCategoryDropDown").empty();
      $("#oldSubCategoryButton").empty();
      $("#oldSubCategoryInput").empty();
       $('.clearAttributes').remove();
        $('.clearSubAttributes').remove();
      
      $("#oldBrand").empty();
      
    $.ajax({
        type : "post",
        url  : "{{ url('get-attributes') }}",
        data : {
            "_token": "{{ csrf_token() }}",
            "subCategoryId": subCategoryId,
            

        },
       
        success:function(data){
           
          $("#getAttributesz").show();
          $("#getAttributesz").html(data);
          if(data.dropDowns != null){
            $("#dropDowns").show();
            $("#dropDowns").append(data.dropDowns);
          }
          
           if(data.brandDowns != null){
            $("#brandDowns").show();
            $("#brandDowns").append(data.brandDowns);
          }
          if(data.buttons != null){
            $("#buttons").show(data);
            $("#buttons").append('<div class="radio-toolbar">'+data.buttons+'</div>');
          }
          
           if(data.inputbox != null){
            $("#txtBoxes").show(data);
            $("#txtBoxes").append(data.inputbox);
          }
          
        },
    });
    
   });
function getSubBrands(elm){
  brand_id = elm.val();
  $("#properties").css('display','none');
 var h1 = '';
 var select1='';
 var option1 = '';
 var data1 = '';
 
 var h2 = '<h6 for="my-text-field" class="font-18 color-70 m-t-10"><span class="colorRed"></span></h6>';
 var select2='';
 var option2 = '';
 var data2 = '';
  $.ajax({
      type : 'GET',
      url  : "{{url('get-sub-brands')}}",
      data : {
        brand_id : elm.val(),
      },
    //   beforeSend:function(){
    //     $(".loader").show();
    //   },
      success:function(res){
        //   console.log(res);
          $("#subBrands").after('');
            // $(".loader").hide();
            
        if(res==1){
          $.notify("Something went wrong", "error");
        }
        else{
          $("#subBrands").show();
          if( $('.clearAttributes').length > 0) {
           $('.clearAttributes').remove();
          }
          $("#oldBrand").hide();
          $("#subBrands").after(res);
          $('.clearSubAttributes').remove();
          
        }
      },
      error:function(res){
        //  $(".loader").hide();
      },
  })
}
function getAssignedAttriubtes(elm){

  $.ajax({
    type : "GET",
    url  : "{{url('get-sub-brands-attributes')}}",
    data : {
      brand_id     : elm.attr('brand-id'),
      sub_brand_id : elm.val(),
    },
    // beforeSend:function(){
    //     $(".loader").show();
    // },
    success:function(res){
        
        console.log(res);
    //   $(".loader").hide();
      // $('.clearAttributes').remove();
    //   $("#subBrands").after(res);
    
      $('.clearSubAttributes').remove();
      $("#subBrandsAttribute").after(res);
      
    },
    error:function(res){
        $(".loader").hide();
    } 
  })
}
$('#pac-input').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
</script>


<script>

var was_cropper_initialized = false;
var was_cropper_initialized_second = false;

function initialized_the_cropper(){
    
    if(was_cropper_initialized == false){
        
        was_cropper_initialized = true;
          $image_crop = $('#image_demo').croppie({
    
        
        
          viewport: {
            width: 724,
            height: 559 ,
            type:'square' // or 'circle'
          },
          boundary: {
            width: 724,
            height: 559
          },
          orientationControls: {
            enabled:true,
            leftClass:'',
            rightClass:''
          },
          resizeControls: {
            width:true,
            height:true
          },
          enableResize:false,
          showZoomer:true,
          mouseWheelZoom:true,
          enableExif:false,
          enforceBoundary:true,
          enableOrientation:true,
          enableKeyMovement:true,
 
});
    }
    else{
        return false;
    }
}
// initialized_the_cropper_second
function initialized_the_cropper_second(){
    
  
    
    if(was_cropper_initialized_second == false){
        
        was_cropper_initialized_second = true;
        
        
          $image_crop1 = $('#image_demo1').croppie({
        
          viewport: {
            width: 724,
            height: 559 ,
            type:'square' // or 'circle'
          },
          boundary: {
            width: 724,
            height: 559
          },
          orientationControls: {
            enabled:true,
            leftClass:'',
            rightClass:''
          },
          resizeControls: {
            width:true,
            height:true
          },
          enableResize:false,
          showZoomer:true,
          mouseWheelZoom:true,
          enableExif:false,
          enforceBoundary:true,
          enableOrientation:true,
          enableKeyMovement:true,
 
});
    }
    else{
        return false;
    }
}

$("#sell_location").change(function(){
    location_val = $(this).val();

    if(location_val == 'make' ){
        $('#makemap').css('display','block');
    }
    else{
        $('#makemap').css('display','none');

        $.ajax({
          type : "GET",
          url  : "{{url('get-country-city')}}",
          data : {
            location_val : location_val,
          },
          success:function(res){
            if(res.status == 'error'){
                $.notify("Country & City are not fetched", "error");
            }
          },
          error:function(res){
              //console.log(res);
          },
        })
    }
});





$("#is_call").change(function(){
    
    is_call_val = $(this).val();
    
    
    if(is_call_val != 1 ){
        
        $('#start_offer').val(' ');
        // $('#start_offer').val(' ');
        $('#end_offer').val(' ');
        $('#price').val(0);
        $('#dis_price').val(0);
        $('#dis_percentage').val(0);

        // $('#makemap').css('display','block');
        
             $('#start_date').css('display','block');
             $('#end_date').css('display','block');
             $('#uper_price').css('display','block');
             $('#uper_discount_price').css('display','block');
             $('#uper_discount_percentage').css('display','block');

    }
    else{
        
             $('#start_date').css('display','none');
             $('#end_date').css('display','none');
             $('#uper_price').css('display','none');
             $('#uper_discount_price').css('display','none');
             $('#uper_discount_percentage').css('display','none');
             
             
             
        
        // $('#makemap').css('display','none');

    }
});

</script>




@endpush