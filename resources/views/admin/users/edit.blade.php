@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit User
@endsection

@push('styles')
<link rel="stylesheet" href="{{URL::asset('public/asset/crop/croppie.css')}}">
<style>


       .min{
        min-width:190px;
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
                    Edit User
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
         <form action="{{url('update-user-list/'.$user->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Name*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="name" class="form-control" placeholder="Enter Title" value="{{$user->name}}">
                    </div>
                    
                     <label class="col-lg-2 col-form-label">Email*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="email" class="form-control" placeholder="Enter Email" value="{{$user->email}}">
                    </div>
                    
                </div>
                
                
                
                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Phone*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="phone" class="form-control" placeholder="Enter Phone" value="{{$user->phone}}">
                    </div>
                   
                  
                </div>
                
                
                
                 <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">About Me</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="about_me" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$user->about_me}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Profile Pic*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url('http://simsar.com/testsimsar/public/assets/images/profilepic/{{ $user->profile_pic.'\'' }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="profile_pic" class="checkImageValid w-100per" id="upload_image_first" required>
                                <input type="hidden" name="imgNam" id="imgNam" />
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>

                    <label class="col-lg-2 col-form-label">Profile Banner*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                            <div class="kt-avatar__holder" style="background-image: url(http://127.0.0.1:8000/public/asset/images/profilepic/{{ $user->profile_banner }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="profile_banner"class="checkImageValid w-100per" id="upload_image_second" required >
                                <input type="hidden" name="imgName" id="imgName" />
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>
                </div>

                <!--<div class="form-group row">-->
                <!--    <label class="col-lg-2 col-form-label">Meta Keywords</label>-->
                <!--    <div class="col-lg-3">-->
                <!--        <input id="kt_tagify_5" name='meta_keywords' placeholder="Add users" value="Chris Muller, Lina Nilson">-->
                <!--        <div class="kt-margin-t-10">-->
                <!--            Dropdown item and tag templates.-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <label class="col-lg-2 col-form-label">Meta Descriptsion</label>-->
                <!--    <div class="col-lg-3">-->
                <!--        <textarea id="kt_maxlength_2" name="meta_description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description"></textarea>-->
                <!--    </div>-->
                <!--</div>-->
                
                
                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Father Name</label>
                    <div class="col-lg-3">
                        <input class="form-control"  type="text" name="father_name" placeholder="Father Name" value="{{$user->father_name}}">  
                    </div>
                    
                     <label class="col-lg-2 col-form-label">CNIC</label>
                     
                    <div class="col-lg-3">
                            <input class="form-control"  type="text" name="cnic" placeholder="CNIC" value="{{$user->cnic}}">  
                    </div>
                    
                </div>
                
                
                
                 <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Date Of Birth</label>
                    <div class="col-lg-3">
                        <input class="form-control "  type="date" name="date_of_birth" placeholder="Date Of Birth" value="{{$user->date_of_birth}}">   
                    </div>
                    
                     <label class="col-lg-2 col-form-label">Place Of Birth</label>
                     
                    <div class="col-lg-3">
                            <input class="form-control"  type="text" name="place_of_birth" placeholder="Place Of Birth" value="{{$user->place_of_birth}}"> 
                    </div>
                    
                </div>
                
                
                
                
                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Employment Status</label>
                    <div class="col-lg-3">
                         <select class="form-control" name="employment_status">
                            <option value="1" @if($user->employment_status==1)  selected="selected" @endif>Self Employed</option>
                            <option value="2" @if($user->employment_status==2)  selected="selected" @endif>Not Employed</option>
                            <option value="3" @if($user->employment_status==3)  selected="selected" @endif>Employeed</option>
                        </select> 
                    </div>
                    
                    <label class="col-lg-2 col-form-label">Gender</label>
                    <div class="col-lg-3">
                            <select class="form-control" name="gender">
                            <option value="1" @if($user->gender==1)  selected="selected" @endif>Male</option>
                            <option value="2" @if($user->gender==2)  selected="selected" @endif>Female</option>
                            <option value="3" @if($user->gender==3)  selected="selected" @endif>Other</option>
                        </select>
                    </div>
                    
                </div>
                
               
                
                
                
                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">FaceBook</label>
                    <div class="col-lg-3">
                         <input class="form-control" type="text" name="facebook_link" placeholder="FaceBook Link" value="{{$user->facebook_link}}"> 
                    </div>
                    
                    <label class="col-lg-2 col-form-label">Google</label>
                    <div class="col-lg-3">
                           <input class="form-control" type="text" name="google_link" placeholder="Google Link" value="{{$user->google_link}}">  
                    </div>
                    
                </div>
                
               
                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Twitter</label>
                    <div class="col-lg-3">
                         <input class="form-control" type="text" name="twitter_link" placeholder="Twitter Link" value="{{$user->twitter_link}}"> 
                    </div>
                    
                    <label class="col-lg-2 col-form-label">LinkedIn</label>
                    <div class="col-lg-3">
                           <input class="form-control" type="text" name="linkedIn_link" placeholder="LinkedIn Link" value="{{$user->linkedIn_link}}">  
                    </div>
                    
                </div>
                
                
                
                <div class="form-group row">
                    
                    <label class="col-lg-2 col-form-label">Skype</label>
                    <div class="col-lg-3">
                         <input class="form-control" type="text" name="skype_link" placeholder="Skype Link" value="{{$user->skype_link}}"> 
                    </div>
                    
                </div>
                
                
                 <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Map</label>
                    <div class="col-lg-8">
                        <div id="map" > </div>
                         <input id="pac-input" class="form-control" name="location" @if(!empty($map)) @if(!empty($map->country))@endif @else required @endif  type="text" placeholder="Enter a location">
                    </div>
                </div>
                
                
                
                <div class="form-group row">
                    
                    <label class="col-lg-2 col-form-label">Country</label>
                    <div class="col-lg-3">
                        
                         <input id="country" name="country" value="@if(!empty($map)){{$map->country}}@endif" class="form-control" type="text" placeholder="" readonly="">
                    </div>
                    
                    
                    <label class="col-lg-2 col-form-label">State</label>
                    <div class="col-lg-3">
                        
                        <input id="state" name="state" value="@if(!empty($map)){{$map->state}}@endif" class="form-control" type="text" placeholder="" readonly="">
                    </div>
                </div>
              



                <div class="form-group row">
                    
                    <label class="col-lg-2 col-form-label">City</label>
                    <div class="col-lg-3">
                        
                         <input id="city" name="city" value="@if(!empty($map)){{$map->city}}@endif" class="form-control" type="text" placeholder="" readonly="">
                    </div>
                    
                    
                    <label class="col-lg-2 col-form-label">latitude</label>
                    <div class="col-lg-3">
                        
                        <input id="lati" name="lati" value="@if(!empty($map)){{$map->lati}}@endif" class="form-control" type="text" placeholder="" readonly="">
                    </div>
                    
                    
                </div>
                
                
                
                 <div class="form-group row">
                    
                    <label class="col-lg-2 col-form-label">longitude</label>
                    <div class="col-lg-3">
                         <input id="long" name="long" value="@if(!empty($map)){{$map->lon}}@endif" class="form-control" type="text" placeholder="" readonly="">
                    </div>
                    
                    
                    <label class="col-lg-2 col-form-label">Address</label>
                    <div class="col-lg-3">
                        <input id="address" name="address" value="@if(!empty($map)){{$map->address}}@endif" class="form-control" type="text" placeholder="" readonly="">
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
  
@endsection

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6OZhI5cRY-lBG3v3TQjYq9IodHanSZdQ&libraries=places&callback=initMap" ></script>


<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>-->
<!--<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>-->
<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>-->
<!--<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>-->

<script src="{{URL::asset('public/asset/crop/croppie.js')}}" type="text/javascript"></script>
<script>
{{--crop--}}
  
   $image_crop = $('#image_demo').croppie({
            	enableExif: true,
            	viewport: {
            		width: 200,
            		height: 200,
            		type: 'square' //circle
            	},
            	boundary: {
            		width: 220,
            		height: 220
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
               
                  
        $('#crop_image_one').click(function() {
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
						$('#imgName').val(data.image);
						console.log(data.image);
						$('#deleteModal').css('display', 'none');
					},

				});
			});
});


             $(".hide-modal").click(function(){
     //console.log('ok 22');
     $('#deleteModal').css('display', 'none');
            // $("#deleteModal_one_one").modal('hide');
            $('#deleteId').val('');
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
            	$('#deleteModal_one_one').css('display', 'block');
            });
            
               $image_crop_two = $('#image_demo_two').croppie({
            	enableExif: true,
            	viewport: {
            		width: 200,
            		height: 200,
            		type: 'square' //circle
            	},
            	boundary: {
            		width: 220,
            		height: 220
            	}
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
        	$('#deleteModal').css('display', 'block');
        });    
               
                  
        $('#crop_image_two').click(function() {
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
						$('#imgName').val(data.image);
						console.log(data.image);
						$('#deleteModal').css('display', 'none');
					},

				});
			});
});


             $(".hide-modal").click(function(){
     //console.log('ok 22');
     $('#deleteModal').css('display', 'none');
            // $("#deleteModal_one_one").modal('hide');
            $('#deleteId').val('');
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

 initMap();

function initMap() {



    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 24.926294,
            lng: 67.022095
        },
        zoom: 13
    });


    var input = /** @type {!HTMLInputElement} */ (document.getElementById('pac-input'));



    var types = document.getElementById('type-selector');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

    // var autocomplete = new google.maps.places.Autocomplete(input,options);
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        anchorPoint: new google.maps.Point(0, -29)
    });

    marker.addListener('dblclick', function() {
        // 3 seconds after the center of the map has changed, pan back to the
        // marker.
        window.setTimeout(function() {
            map.panTo(marker.getPosition());
        }, 3000);

    });



    autocomplete.addListener('place_changed', function() {


        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();

        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
        }
        marker.setIcon( /** @type {google.maps.Icon} */ ({

                // url: place.icon,
                // size: new google.maps.Size(71, 71),
                // origin: new google.maps.Point(0, 0),
                // anchor: new google.maps.Point(17, 34),
                // scaledSize: new google.maps.Size(35, 35)

            })


        );

        console.log(place);
        console.log(place.geometry.location.lat());

        var country_array = place.address_components.filter(function(address_component) {
            return address_component.types.includes("country");
        });

        var country = country_array.length ? country_array[0].long_name : "";


        var state_array = place.address_components.filter(function(address_component) {
            return address_component.types.includes("administrative_area_level_1");
        });

        var state = state_array.length ? state_array[0].long_name : "";



        var city_array = place.address_components.filter(function(address_component) {
            return address_component.types.includes("locality");
        });

        var city = city_array.length ? city_array[0].long_name : "";



        $("#country").val(country);
        $("#state").val(state);
        $("#city").val(city);

        $("#lati").val(place.geometry.location.lat());
        $("#long").val(place.geometry.location.lng());
        $("#address").val(place['formatted_address']);


        // marker.addListener('click', toggleBounce);
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        google.maps.event.addListener(marker, 'dblclick', function(event) {});

        geocoder = new google.maps.Geocoder();


        google.maps.event.addListener(marker, 'dragend', function() {

            console.log("lat: " + marker.position.lat())
            console.log("lon: " + marker.position.lng())

            $("#lat").val(marker.position.lat());
            $("#lon").val(marker.position.lng());


            geocoder.geocode({
                latLng: marker.getPosition()
            }, function(responses) {
                if (responses && responses.length > 0) {
                    // infoWindow.setContent(



                    $("#location").val(responses[0].formatted_address);
                    $("#pac-input").val(responses[0].formatted_address);
                    $(".gm-style-iw-d").parent().remove();

                    // + "<br /> <small>" 
                    // + "Latitude: " + marker.getPosition().lat() + "<br>" 
                    // + "Longitude: " + marker.getPosition().lng() + "</small></div>"
                    // );
                    // infoWindow.open(map, marker);
                } else {
                    alert('Error: Google Maps could not determine the address of this location.');
                }
            });


        });


        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }




        var item_Lat = place.geometry.location.lat()
        var item_Lng = place.geometry.location.lng()
        var item_Location = place.formatted_address;

        $("#lat").val(item_Lat);
        $("#lon").val(item_Lng);
        $("#location").val(item_Location);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
    });

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    function setupClickListener(id, types) {
        var radioButton = document.getElementById(id);
        radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
        });
    }

    setupClickListener('changetype-all', []);
    setupClickListener('changetype-address', ['address']);
    setupClickListener('changetype-establishment', ['establishment']);
    setupClickListener('changetype-geocode', ['geocode']);
}




function getAdd(lat, lon) {

    var latlngPlace = new google.maps.LatLng(lat, lon);
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        'latLng': latlngPlace
    }, function(results, status) {



        if (status ==
            google.maps.GeocoderStatus.OK) {
            if (results[1]) {



                document.getElementById('location').innerHTML = results[1].formatted_address;

            } else {
                alert('No results found');
            }
        } else {
            alert('Geocoder failed due to: ' + status);
        }
    });
}

</script>
@endpush