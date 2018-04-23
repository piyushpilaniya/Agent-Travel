var map;
var infowindow;

var request1, request2, request3, request4, request5, request6;
var service;
var markers = [];

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
	center = new google.maps.LatLng(lat, lon);
	map = new google.maps.Map(document.getElementById('map'),{
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

//  function callback(results){
// 	for (var i = 0; i < results.length; i++) {
			
// 			initMap(results[i]);
// 		}
// }

// function initMap(place){
// 	jQuery(document).ready(function( $ ) {
			
// 	   $("#map").googlePlaces({
// 	        placeId: place.place_id //Find placeID @: https://developers.google.com/places/place-id
// 	      , render: ['reviews']
// 	      , min_rating: 4
// 	      , max_rows:4
// 	   });
// 	});
// }

// function initMap(place) {
// 	// map = new google.maps.Map(document.getElementById('map'),{
// 	// 		center: center,
// 	// 		zoom: 13
// 	// });
// 	console.log("out "+place.name);
// 	console.log("HEY");
//   // var map = new google.maps.Map(document.getElementById('map'), {
//   //   center: {lat: -33.866, lng: 151.196},
//   //   zoom: 15
//   // });

//    infowindow = new google.maps.InfoWindow();
//    service = new google.maps.places.PlacesService(map);
//   if(place.place_id === 'ChIJDfKh-GkbdkgRqs2ecF8SYIE'){
//   	console.log("entered");
//   }
//   service.getDetails({
//     placeId: place.place_id

//   }, function(plac, status) {
  	 	

//   	console.log("init "+plac.name);
//     if (status === google.maps.places.PlacesServiceStatus.OK) {
//     	console.log("iniiit "+plac.name);
//       var marker = new google.maps.Marker({
//         map: map,
//         position: plac.geometry.location
//       });
//       google.maps.event.addListener(marker, 'click', function() {
//         infowindow.setContent('<div><strong>' + plac.name + '</strong><br>' +
//           'Place ID: ' + plac.place_id + '<br>' +
//           plac.formatted_address + '</div>');
//         infowindow.open(map, this);
//       });
//     }
//   });
// }

// // function callback(results){
// // 	for (var i = 0; i < results.length; i++) {
// // 			console.log("out "+results[i].name);
// // 			service.getDetails({
// // 		    placeId: results[i].place_id
// // 		  }, function(place, status) {

// // 		    // if (status === google.maps.places.PlacesServiceStatus.OK) {
// // 		      console.log("in "+results[i].name);
// // 		      var marker = new google.maps.Marker({
// // 		        map: map,
// // 		        position: results[i].geometry.location
// // 		      });
// // 		      google.maps.event.addListener(marker, 'click', function() {
// // 		        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
// // 		          'Place ID: ' + place.place_id + '<br>' +
// // 		          place.formatted_address + '</div>');
// // 		        infowindow.open(map, this);
// // 		      });
// // 		    // }
// // 		  });
// // 		}
	
// // }

// // function createMarker(place){

// // 	service.getDetails({
// // 	    placeId: place.place_id
// // 	  }, function(place, status) {
// // 	    if (status === google.maps.places.PlacesServiceStatus.OK) {
// // 	      var marker = new google.maps.Marker({
// // 	        map: map,
// // 	        position: place.geometry.location
// // 	      });
// // 	      google.maps.event.addListener(marker, 'click', function() {
// // 	        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
// // 	          'Place ID: ' + place.place_id + '<br>' +
// // 	          place.formatted_address + '</div>');
// // 	        infowindow.open(map, this);
// // 	      });
// // 	    }
// // 	  });
// // }

// // function callback(results, status){
// // 	// console.log("Hey2");
// // 	if(status == google.maps.places.PlacesServiceStatus.OK){
// // 		for (var i = 0; i < results.length; i++) {
// // 			markers.push(createMarker(results[i]));
// // 		}
// // 	}
// // }

// // function createMarker(place){
// // 	// console.log(place);

// // 	var placeLoc = place.geometry.location;
// // 	var marker = new google.maps.Marker({
// // 		map: map,
// // 		position: place.geometry.location 
// // 	});
// // 	google.maps.event.addListener(marker, 'click', function(){
// // 		infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
// //                 '<p>' + place.formatted_address );

// // 		infowindow.open(map, this);

// // 	});
// // 	return marker;
// // }

// // function clearResults(markers){
// // 	for(var m in markers){
// // 		markers[m].setMap(null);
// // 	}
// // 	markers = [];
// // }


google.maps.event.addDomListener(window, 'load', initialize);


