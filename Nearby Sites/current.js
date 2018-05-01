var geocoder;
 function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}
function showPosition(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  // map.setCenter(new google.maps.LatLng(lat, lng));
  console.log(lat);
  console.log(lng);
  geocoder= new google.maps.Geocoder();
  codeLatLng(lat, lng);
}


function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
         console.log(results[2].formatted_address);
         console.log(results[2].name);
        //find country name
             for (var i=0; i<results[2].address_components.length; i++) {
            for (var b=0;b<results[2].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[2].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[2].address_components[i];
                    break;
                }
            }
        }
        //city data
        console.log(city.short_name + " hh  " + city.long_name)
        document.getElementById("prodId").value=results[2].formatted_address;

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }

  function fun(){
  document.getElementById('autocomplete').value = document.getElementById("prodId").value;
  console.log("HI");
  initMap();
}