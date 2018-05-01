
var map;
var infowindow;
var loop = 1;
var request;
var service;
var markers = [];
var text = document.getElementById('data');
var ratLimit = "";
var rate = "";
var str = Array();
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
console.log("hey");
function initialize(){
	str = [];
	loop = 1;
	ratLimit = document.getElementById('mySelect');
	rate = ratLimit.value;
	console.log(rate);
	// console.log("initialize");
	console.log("initialize");

	var center = new google.maps.LatLng(lat, lon);
	map = new google.maps.Map(document.getElementById('mapped'),{
			center: center,
			zoom: 13
	});

	request = {
		location: center,
		radius: rad,
		types: ['lodging']
	};

	infowindow = new google.maps.InfoWindow();
	service = new google.maps.places.PlacesService(map);
		console.log("begin");

	service.nearbySearch(request, callback);
		console.log("end");

	document.getElementById('mapped').style.visibility = 'visible';
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

function sortFunction(a, b) {
    if (a[3] === b[3]) {
        return 0;
    }
    else {
        return (a[3] < b[3]) ? 1 : -1;
    }
}

function createMarker(place){
	// console.log("createMarker");
	// console.log(place.rating);
	// console.log(parseInt(rate));

	if(place.rating>parseInt(rate))
	{
	var dummy = str + loop + ". " + place.name+"  "+place.rating+"\n";
	str.push(['!', place.name, "with a rating of",place.rating, "\n"]);
	str.sort(sortFunction);
	console.log(str);
	console.log(str.length);
	// for (var i = 0; i < str.length; i++) {
	// 	str.splice(i, 0, [i, ". ",str[i][0], str[i][1], str[i][2]]); 
	// }
	console.log(str);
	// str = dummy;
	console.log(str);
	loop = loop+1;
	text.textContent = str;
	text.innerHTML = text.innerHTML.replace(/\n/gi, "<br>");
	text.innerHTML = text.innerHTML.replace(/,/gi, " ");
	text.innerHTML = text.innerHTML.replace(/!/gi, "<li>");
	
	}
	var placeLoc = place.geometry.location;
	var marker = new google.maps.Marker({
		map: map,
		position: place.geometry.location 
	});

	google.maps.event.addListener(marker, 'click', function(){
		infowindow.setContent(place.name);
		infowindow.setContent(place.rating);
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


//function myFunction() {
	// fun();
//}
