<?php
require_once('Connection.php');
$data = new stdClass();
echo "Hi";
	$data->status = "OK";
 
	
	
	if(isset($_POST["owner_name"])){
		if(isset($_POST["ac"])){
		$ac = 1;}
		else{
			$ac = 0;
		}
		if(isset($_POST["wifi"])){
		$wifi = 1;}
		else{
			$wifi = 0;
		}
		if(isset($_POST["bedroom"])){
		$bedroom = 1;}
		else{
			$bedroom = 0;
		}
		if(isset($_POST["geyser"])){
		$geyser = 1;}
		else{
			$geyser = 0;
		}
		if(isset($_POST["breakfast"])){
		$breakfast = 1;}
		else{
			$breakfast = 0;
		}
		if(isset($_POST["taken"])){
		$taken = 1;}
		else{
			$taken = 0;
		}

		if(isset($_POST["price"])){
		$price = $_POST["price"];}
		else{
			$price = 0;
		}
		
		$query = "insert into facility(facility_ac,facility_wifi,facility_bedroom,facility_geyser,facility_freebreakfast,price,taken) values (".$ac .",".$wifi .",".$bedroom .",".$geyser .",".$breakfast .",".$price. ",".$taken .")";
		echo $query;
		$con -> query("$query");
		$query = "SELECT LAST_INSERT_ID()";
		$result = $con -> query("$query");
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$facility_id = $row["LAST_INSERT_ID()"];
				echo $facility_id;
				}
			}
			
        if(isset($_POST["parking"])){
		$parking = 1;}
		else{
			$parking = 0;
		}
		if(isset($_POST["laundry"])){
		$laundry = 1;}
		else{
			$laundry = 0;
		}
		if(isset($_POST["room_service"])){
		$room_service = 1;}
		else{
			$room_service = 0;
		}
		if(isset($_POST["restaurent"])){
		$restaurent = 1;}
		else{
			$restaurent = 0;
		}

       if(isset($_POST["swimming_pool"])){
		$swimming_pool = 1;}
		else{
			$swimming_pool = 0;
		}
		if(isset($_POST["spa"])){
		$spa = 1;}
		else{
			$spa = 0;
		}
		if(isset($_POST["gym"])){
		$gym = 1;}
		else{
			$gym = 0;
		}
		if(isset($_POST["any_other"])){
		$any = 1;}
		else{
			$any = 0;
		}

		
		$query = "insert into amenity(parking,laundry,room_service,restaurent,swimming_pool,spa,gym,any_other) values (".$parking .",".$laundry .",".$room_service .",".$restaurent .",".$swimming_pool .",".$spa. ",".$gym .",".$any .")";
		echo $query;
		$con -> query("$query");

		$query = "SELECT LAST_INSERT_ID()";
		$result = $con -> query("$query");
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$amenity_id = $row["LAST_INSERT_ID()"];
				}
			}

		if(isset($_POST["address_line1"])){
		$line1 = $_POST["address_line1"];}
		else{
			$line1 = "None";
		}
		if(isset($_POST["address_line2"])){
		$line2 = $_POST["address_line2"];}
		else{
			$line2 = "None";
		}
		if(isset($_POST["city"])){
		$city = $_POST["city"];}
		else{
			$city = "None";
		}
		if(isset($_POST["state"])){
		$state = $_POST["state"];}
		else{
			$state = "None";
		}

		if(isset($_POST["pincode"])){
		$pincode = $_POST["pincode"];}
		else{
			$pincode = 0;
		}

		$query = "insert into address(address_line1,address_line2,city,state,pincode) values('".$line1 ."','".$line2 ."','".$city ."','".$state. "','".$pincode  ."')";
		$con -> query("$query");
		echo $query;
		$query = "SELECT LAST_INSERT_ID()";
		$result = $con -> query("$query");
		
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$address_id = $row["LAST_INSERT_ID()"];
				}
			}

		if(isset($_POST["hotel_name"])){
		$hotel_name = $_POST["hotel_name"];}
		else{
			$hotel_name = "None";
		}
		if(isset($_POST["owner_name"])){
		$owner_name = $_POST["owner_name"];}
		else{
			$owner_name = "None";
		}
		if(isset($_POST["owner_contact"])){
		$owner_contact = $_POST["owner_contact"];}
		else{
			$owner_contact = 0;
		}
		if(isset($_POST["Email_id"])){
		$Email_id = $_POST["Email_id"];}
		else{
			$Email_id = "None";
		}
		if(isset($_POST["rating_of_hotel"])){
		$rating_of_hotel = $_POST["rating_of_hotel"];}
		else{
			$rating_of_hotel = 0;
		}
		if(isset($_POST["availability"])){
		$availability = 1;}
		else{
			$availability = 0;
		}
		$query = "insert into hotel(hotel_name,owner_name,owner_contact,Email_id,rating_of_hotel,availability, address_id, facility_id, amenity_id) values ('".$hotel_name ."','".$owner_name ."','".$owner_contact ."','".$Email_id ."','".$rating_of_hotel ."','".$availability. "','".$address_id ."','".$facility_id ."','".$amenity_id ."')";
				echo $query;
		$con -> query("$query");
		$con -> close();
		}
?>