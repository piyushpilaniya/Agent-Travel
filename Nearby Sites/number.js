var map;
var infowindow;
var hostnameRegexp = new RegExp('^https?://.+?/');

var request1, request2, request3, request4, request5, request6;
var service;
var markers = [];

var text = document.getElementById('numbers');
var ratLimit = "";
var rate = "";
var str ;

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
	rate = 4;
	center = new google.maps.LatLng(lat, lon);
	map = new google.maps.Map(document.getElementById('mapping'),{
			center: center,
			zoom: 13
	});

	request1 = {
		location: center,
		radius: rad,
		types: ['police']
	};

	request2 = {
		location: center,
		radius: rad,
		types: ['hospital']
	};

	request3 = {
		location: center,
		radius: rad,
		types: ['doctor']
	};
	
	infowindow = new google.maps.InfoWindow();
	service = new google.maps.places.PlacesService(map);
	service.nearbySearch(request2, callback);
	service.nearbySearch(request1, callback);
	service.nearbySearch(request3, callback);

	google.maps.event.addListener(map, 'rightclick', function(event){
		console.log("Hey1");
		map.setCenter(event.latLng);
		clearResults(markers);

			var request1= {
				location : event.latLng,
				radius : rad,
				types: ['police']
			};
			var request2 = {
				location: center,
				radius: rad,
				types: ['hospital']
			};
			var request3 = {
				location: center,
				radius: rad,
				types: ['doctor']
			};

		service.nearbySearch(request2, callback);
		service.nearbySearch(request1, callback);
		service.nearbySearch(request3, callback);
	})
}

function callback(results, status){
	// if(status == google.maps.places.PlacesServiceStatus.OK){
		for (var i = 0; i < results.length; i++) {
				markers.push(showInfoWindow(results[i]));
			// markers.push(createMarker(results[i]));
		}
	// }
}

function sortFunction(a, b) {
    if (a[1] === b[1]) {
        return 0;
    }
    else {
        return (a[1] < b[1]) ? 1 : -1;
    }
}

function showInfoWindow(place) {
  // var marker = this;
  console.log(place.name);
  service.getDetails({placeId: place.place_id},
      function(place, status) {
        if (status !== google.maps.places.PlacesServiceStatus.OK) {
          return;
        }
        // infoWindow.open(map, marker);
        buildIWContent(place);
      });
}


// Load the place information into the HTML elements used by the info window.
function buildIWContent(place) {
  // document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon" ' +
  //     'src="' + place.icon + '"/>';
  // document.getElementById('iw-url').innerHTML = '<b><a href="' + place.url +
  //     '">' + place.name + '</a></b>';
  // document.getElementById('iw-address').textContent = place.vicinity;


  if (place.formatted_phone_number) {
    // document.getElementById('iw-phone-row').style.display = '';
    // document.getElementById('iw-phone').textContent =
    //     place.formatted_phone_number;
    console.log(place.formatted_phone_number);
  } else {
    // document.getElementById('iw-phone-row').style.display = 'none';
    console.log("No contact number");
  }
  // Assign a five-star rating to the hotel, using a black star ('&#10029;')
  // to indicate the rating the hotel has earned, and a white star ('&#10025;')
  // for the rating points not achieved.
  // if (place.rating) {
  //   var ratingHtml = '';
  //   for (var i = 0; i < 5; i++) {
  //     if (place.rating < (i + 0.5)) {
  //       ratingHtml += '&#10025;';
  //     } else {
  //       ratingHtml += '&#10029;';
  //     }
  //   document.getElementById('iw-rating-row').style.display = '';
  //   document.getElementById('iw-rating').innerHTML = ratingHtml;
  //   }
  // } else {
  //   document.getElementById('iw-rating-row').style.display = 'none';
  // }

  // The regexp isolates the first part of the URL (domain plus subdomain)
  // to give a short URL for displaying in the info window.
  
  if (place.website) {
    var fullUrl = place.website;
    var website = hostnameRegexp.exec(place.website);
    if (website === null) {
      website = 'http://' + place.website + '/';
      fullUrl = website;

    }
    // document.getElementById('iw-website-row').style.display = '';
    // document.getElementById('iw-website').textContent = website;
    console.log(website);
  } else {
    // document.getElementById('iw-website-row').style.display = 'none';
    console.log("no site");
}
}


function createMarker(place){

	console.log(place);

	if(place.rating>parseInt(rate))
	{
		var number, site;
		if (place.formatted_phone_number) {
	    // document.getElementById('iw-phone-row').style.display = '';
	    // document.getElementById('iw-phone').textContent =
	        // place.formatted_phone_number;
	        number = place.formatted_phone_number;
	  } else {
	    // document.getElementById('iw-phone-row').style.display = 'none';
	    number = 'none';
	  }
	if (place.website) {
	    var fullUrl = place.website;
	    var website = hostnameRegexp.exec(place.website);
	    if (website === null) {
	      website = 'http://' + place.website + '/';
	      fullUrl = website;
	    }
	    // document.getElementById('iw-website-row').style.display = '';
	    // document.getElementById('iw-website').textContent = website;
	    site = website;
	  } else {
	    // document.getElementById('iw-website-row').style.display = 'none';
	    site='none';
	}


		var dummy = place.name+"  "+place.rating+" "+site+" "+number+"\n";
		str.push([place.name, place.rating, site, number,"\n"]);
		str.sort(sortFunction);
		console.log(str);
		loop = loop+1;
		text.textContent = str;
		text.innerHTML = text.innerHTML.replace(/\n/gi, "<br />");
		text.innerHTML = text.innerHTML.replace(/,/gi, " ");
	}
	var placeLoc = place.geometry.location;
	var marker = new google.maps.Marker({
		map: map,
		position: place.geometry.location 
	});

	google.maps.event.addListener(marker, 'click', function(){
		// infowindow.setContent(place.name);
		infowindow.open(map, this);
		 if (place.formatted_phone_number) {
	   infowindow.setContent(place.formatted_phone_number);
	  } else {
	    infowindow.setContent('none');
	  }
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


