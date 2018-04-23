<?php
require_once('Connection.php');
$data = new stdClass();
	$data->status = "OK";
	if(isset($_POST["register"])){
		$ac = $_POST["ac"];
		$wifi = $_POST["wifi"];
		$bedroom = $_POST["bedroom"];
		$geyser = $_POST["geyser"];
		$breakfast = $_POST["breakfast"];
		$price = $_POST["price"];
		$last_update = $_POST["last_update"];
		$taken = $_POST["taken"];
		$query = "insert into table facility(facility_ac,facility_wifi,facility_bedroom,facility_geyser,facility_freebreakfast,price,taken,last_update) output facility_id values (".$ac .",".$wifi .",".$bedroom .",".$geyser .",".$breakfast .",".$price. ",".$taken .",".$last_update .")";
		$result = $con -> $query;
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$facility_id = $row["facility_id"];
				
			}

		$longitude = $_POST["longitude"];
		$latitude = $_POST["latitude"];
		$line1 = $_POST["address_line1"];
		$line2 = $_POST["address_line2"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$last_update = $_POST["last_update"];
		$pincode = $_POST["pincode"];
		$query = "insert into table address(longitude,latitude,address_line1,address_line2,city,state,pincode,last_update) output address_id values (".$longitude .",".$latitude .",".$line1 .",".$line2 .",".$city .",".$state. ",".$pincode .",".$last_update .")";
		$result = $con -> $query;
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$address_id = $row["address_id"];
				
			}

		$parking = $_POST["parking"];
		$laundry = $_POST["laundry"];
		$room_service = $_POST["room_service"];
		$restaurent = $_POST["restaurent"];
		$swimming_pool = $_POST["swimming_pool"];
		$spa = $_POST["spa"];
		$last_update = $_POST["last_update"];
		$gym = $_POST["gym"];
		$any = $_POST["any_other"];
		$query = "insert into table amenity(parking,laundry,room_service,restaurent,swimming_pool,spa,gym,any_other,last_update) output amenity_id values (".$parking .",".$laundry .",".$room_service .",".$restaurent .",".$swimming_pool .",".$spa. ",".$gym .",".$any .",".$last_update .")";
		$result = $con -> $query;
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$amenity_id = $row["amenity_id"];
				
			}

		$hotel_name = $_POST["hotel_name"];
		$owner_name = $_POST["owner_name"];
		$owner_contact = $_POST["owner_contact"];
		$Email_id= $_POST["Email_id"];
		$rating_of_hotel = $_POST["rating_of_hotel"];
		$availability = $_POST["availability"];
		$last_update = $_POST["last_update"];
		$query = "insert into table hotel(hotel_name,owner_name,owner_contact,Email_id,rating_of_hotel,availability,last_update, address_id, facility_id, amenity_id) values (".$hotel_name .",".$owner_name .",".$owner_contact .",".$Email_id .",".$rating_of_hotel .",".$availability. ",".$last_update .",".$address_id .",".facility_id .",".$amenity_id .")";
		$con -> $query;
		
		}
	}
?>
