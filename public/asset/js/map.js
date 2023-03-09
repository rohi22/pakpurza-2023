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
    
     autocomplete.setComponentRestrictions({
    country: ["kw"],
  });
  
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
        //   console.log(place.geometry.location.lat());

        // $("#country").val(place['address_components'][7]['long_name']);



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



        if (status == google.maps.GeocoderStatus.OK) {
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