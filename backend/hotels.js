var map;
var infowindow;

var request;
var service;
var markers = [];

console.log(city);
var geocoder = new google.maps.Geocoder();
var lat,lon;
geocoder.geocode( { 'address': city}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK)
  {
      lat = results[0].geometry.location.lat();
      lon =  results[0].geometry.location.lng();
  }
});

console.log(lat);
console.log(lon);

function initialize(){
	var center = new google.maps.LatLng(lat, lon);
	map = new google.maps.Map(document.getElementById('map'),{
			center: center,
			zoom: 13
	});

	request = {
		location: center,
		radius: 8047,
		types: ['lodging']
	};

	infowindow = new google.maps.InfoWindow();
	service = new google.maps.places.PlacesService(map);
	service.nearbySearch(request, callback);

	google.maps.event.addListener(map, 'rightclick', function(event){
		map.setCenter(event.latLng);
		clearResults(markers);

		var request= {
			location : event.latLng,
			radius : 8047,
			types: ['lodging']
		};
		service.nearbySearch(request, callback);
	})
}

function callback(results, status){
	if(status == google.maps.places.PlacesServiceStatus.OK){
		for (var i = 0; i < results.length; i++) {
			markers.push(createMarker(results[i]));
		}
	}
}

function createMarker(place){
	console.log(place);
	var placeLoc = place.geometry.location;
	var marker = new google.maps.Marker({
		map: map,
		position: place.geometry.location 
	});

	google.maps.event.addListener(marker, 'click', function(){
		infowindow.setContent(place.name);
		infowindow.open(map, this);
	});
	return marker;
}

function clearResults(markers){
	for(var m in markers){
		markers[m].setMap(null);
	}
	markers = [];
}


google.maps.event.addDomListener(window, 'load', initialize);


