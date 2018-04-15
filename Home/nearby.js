var map;
var infowindow;

var request;
var service;
var markers = [];

function initialize(){
	var center = new google.maps.LatLng(32.7147992, 74.7899237);
	map = new google.maps.Map(document.getElementsByClassName('map')[0],{
			center: center,
			zoom: 13
	});

	request = {
		location: center,
		radius: 8047,
		types: ['cafe']
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
			types: ['cafe']
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