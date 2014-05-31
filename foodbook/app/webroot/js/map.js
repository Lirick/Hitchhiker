//(c) https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete
function initialize() {		
	//final address
	window['address'] = {}; 
	var address_parsed = {};
	
	var mapOptions = {
		center : new google.maps.LatLng(59.867917, 17.637062), //Uppsala, Sweden
		zoom : 13
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'),
			mapOptions);

	var input = /** @type {HTMLInputElement} */ (document.getElementById('address-search'));
	var autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo('bounds', map);

	var marker = new google.maps.Marker({
		map : map,
		anchorPoint : new google.maps.Point(0, -29)
	});

	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		marker.setVisible(false);
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			return;
		}

		// If the place has a geometry, then present it on a mapgoogle.maps.places.Autocomplete.
		if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
		} else {			
			address_parsed['lng'] = place.geometry.location.lng();
			address_parsed['lat'] = place.geometry.location.lat();
			
			map.setCenter(place.geometry.location);
			map.setZoom(17);
		}
		marker.setIcon(/** @type {google.maps.Icon} */({
			url : place.icon,
			size : new google.maps.Size(71, 71),
			origin : new google.maps.Point(0, 0),
			anchor : new google.maps.Point(17, 34),
			scaledSize : new google.maps.Size(35, 35)
		}));
		marker.setPosition(place.geometry.location);
		marker.setVisible(true);


		if (place.address_components) {
			var tmp = get_address(place.address_components);
			address_parsed['country'] = tmp['country'];
			address_parsed['city'] = tmp['city'];
		}
		
		window['address'] = '';
		address_parsed['display_address'] = place.formatted_address;
		window['address'] = address_parsed;		 
	});		
}


google.maps.event.addDomListener(window, 'load', initialize);

/**
 * Returns the Object with the fields: country and city or
 * Empty Object if nothing found
 * 
 * @param address_components array from Google Maps API
 */
function get_address(addr_comp) {
	var i = 0, j = 0, obj, 
		ret = {
			'city': '', 
			'country': ''
		};
	
	for (i = 0; i < addr_comp.length; i++) {
		obj = addr_comp[i];
		for (j = 0; j < obj.types.length; j++) {
			if (obj.types[j] == 'locality') {
				ret['city'] = obj.long_name;
			}

			if (obj.types[j] == 'country') {
				ret['country'] = obj.long_name;
			}

			if (ret['city'] && ret['country']) {
				return ret;				
			}
		}
	}
	return ret;
}