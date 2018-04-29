var map;
var infowindow;
var loop;
var request1, request2, request3, request4, request5, request6;
var service;
var markers = [];
var city = window.opener.city; 
var rate = window.opener.rate;
var ratLimit = "";

var str ;
var rad = window.opener.rad;
console.log("city is "+city);
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
var center;
function initialize(){
	// console.log("Hey");
	str = Array();
	loop = 0;
	// ratLimit = document.getElementById('mySelect');
	// rate = 4;
	center = new google.maps.LatLng(lat, lon);
	map = new google.maps.Map(document.getElementById('mapped'),{
			center: center,
			zoom: 13
	});

	request1 = {
		location: center,
		radius: rad,
		types: ['amusement_park']
	};

	request2 = {
		location: center,
		radius: rad,
		types: ['cafe']
	};

	request3 = {
		location: center,
		radius: rad,
		types: ['art_gallery']
	};

	request4 = {
		location: center,
		radius: rad,
		types: ['movie_theater']
	};

	request5 = {
		location: center,
		radius: rad,
		types: ['night_club']
	};

	request6 = {
		location: center,
		radius: rad,
		types: ['shopping_mall']
	};

	infowindow = new google.maps.InfoWindow();
	service = new google.maps.places.PlacesService(map);
	service.nearbySearch(request2, callback);
	service.nearbySearch(request1, callback);
	service.nearbySearch(request3, callback);
	service.nearbySearch(request4, callback);
	service.nearbySearch(request5, callback);
	service.nearbySearch(request6, callback);

	google.maps.event.addListener(map, 'rightclick', function(event){
		console.log("Hey1");
		map.setCenter(event.latLng);
		clearResults(markers);

			var request1= {
				location : event.latLng,
				radius : rad,
				types: ['cafe']
			};
			var request2 = {
				location: center,
				radius: rad,
				types: ['school']
			};
			var request3 = {
				location: center,
				radius: rad,
				types: ['art_gallery']
			};

			var request4 = {
				location: center,
				radius: rad,
				types: ['movie_theater']
			};

			var request5 = {
				location: center,
				radius: rad,
				types: ['night_club']
			};

			var request6 = {
				location: center,
				radius: rad,
				types: ['shopping_mall']
			};
		service.nearbySearch(request2, callback);
		service.nearbySearch(request1, callback);
		service.nearbySearch(request3, callback);
		service.nearbySearch(request4, callback);
		service.nearbySearch(request5, callback);
		service.nearbySearch(request6, callback);
	})
}

function callback(results, status){
	if(status == google.maps.places.PlacesServiceStatus.OK){
		for (var i = 0; i < results.length; i++) {
			markers.push(createMarker(results[i]));
		}
	}
}

function sortFunction(a, b) {
    if (a[1] === b[1]) {
        return 0;
    }
    else {
        return (a[1] < b[1]) ? 1 : -1;
    }
}

function createMarker(place){
	// console.log(place.types[0]);
	// if(place.rating>parseInt(rate))
	// {
	// 	var review='';
	// 	if(place.reviews){
	// 		review = place.reviews;
	// 	}
	// 	else{
	// 		review = "Not Available";
	// 	}
	// 	var dummy = place.name+"  "+place.rating+place.types[0]+review+"\n";
	// 	str.push([place.name, place.rating, place.types[0],review,"\n"]);
	// 	str.sort(sortFunction);
	// 	console.log(str);
	// 	loop = loop+1;
	// 	text.textContent = str;
	// 	text.innerHTML = text.innerHTML.replace(/\n/gi, "<br />");
	// 	text.innerHTML = text.innerHTML.replace(/,/gi, " ");
	// }

	 if(place.rating>parseInt(rate))
	{
	var placeLoc = place.geometry.location;
	var marker = new google.maps.Marker({
		map: map,
		position: place.geometry.location 
	});
	var ratingHtml = '';
	google.maps.event.addListener(marker, 'click', function(){
		// infowindow.setContent(place.name);
		infowindow.open(map, this);
		if (place.rating) {
	    
	    for (var i = 0; i < 5; i++) {
	      if (place.rating < (i + 0.5)) {
	        ratingHtml += '&#10025;';
	      } else {
	        ratingHtml += '&#10029;';
	      }
	    infowindow.setContent('');
	    infowindow.setContent(place.name +" "+ratingHtml);
	    }
	  } else {
	    infowindow.setContent('none');
	  }
	});
	console.log(ratingHtml);
}
	// console.log(place.name+" "+place.rating);
	return marker;
}

function clearResults(markers){
	for(var m in markers){
		markers[m].setMap(null);
	}
	markers = [];
}


google.maps.event.addDomListener(window, 'load', initialize);


