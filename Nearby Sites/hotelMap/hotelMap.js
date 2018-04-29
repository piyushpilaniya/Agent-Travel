var city = window.opener.city; 
var rate = window.opener.rate;
var rad = window.opener.rad;
console.log(rate);
console.log(city);
var map;
var infowindow;

var request;
var service;
var markers = [];
// console.log(city);
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
console.log("hey");
function initialize(){
	// str = "";
	// ratLimit = document.getElementById('mySelect');
	// rate = ratLimit.value;
	console.log("hi");
	// console.log("initialize");
	// google.maps.event.trigger(map, "resize");
	var center = new google.maps.LatLng(lat, lon);
	map = new google.maps.Map(document.getElementById('mapped'),{
			center: center,
			zoom: 13
	});
	google.maps.event.trigger(map, "resize");
	request = {
		location: center,
		radius: rad,
		types: ['lodging']
	};

	infowindow = new google.maps.InfoWindow();
	service = new google.maps.places.PlacesService(map);
	service.nearbySearch(request, callback);
	// document.getElementById('mapped').style.visibility = 'visible';
	google.maps.event.addListener(map, 'rightclick', function(event){
		map.setCenter(event.latLng);
		clearResults(markers);

		var request= {
			location : event.latLng,
			radius : rad,
			types: ['lodging']
		};
		service.nearbySearch(request, callback);
	})
	
}

function callback(results, status){
	console.log("callback");
	if(status == google.maps.places.PlacesServiceStatus.OK){
		for (var i = 0; i < results.length; i++) {
			markers.push(createMarker(results[i]));
		}
	}

}

function createMarker(place){
	if(place.rating>parseInt(rate))
	{
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
}
	return marker;
}

function clearResults(markers){
	for(var m in markers){
		markers[m].setMap(null);
	}
	markers = [];
}

	
google.maps.event.addDomListener(window, 'load', initialize);

