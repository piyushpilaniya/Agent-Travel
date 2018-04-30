<?php
require_once('Connection.php');
$data = new stdClass();

	$data->status = "OK";
 
	
	
	if(isset($_POST["company_name"])){
		if(isset($_POST["facility_ac"])){
		$ac = 1;}
		else{
			$ac = 0;
		}
		if(isset($_POST["facility_wifi"])){
		$wifi = 1;}
		else{
			$wifi = 0;
		}
		if(isset($_POST["facility_refreshment"])){
		$refreshment = 1;}
		else{
			$refreshment = 0;
		}
		
		$query = "insert into vehicle_facility(facility_ac,facility_wifi,facility_refreshment) values (".$ac .",".$wifi .",".$refreshment .")";
		
		$con -> query("$query");
		$query = "SELECT LAST_INSERT_ID()";
		$result = $con -> query("$query");
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$vehicle_id = $row["LAST_INSERT_ID()"];
				
				}
			}
			
        if(isset($_POST["company_name"])){
		$cname = $_POST["company_name"];}
		else{
			$cname = "None";
		}
		if(isset($_POST["office_address"])){
		$oaddress = $_POST["office_address"];}
		else{
			$oaddress = "None";
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

       if(isset($_POST["driver_contact"])){
		$contact  = $_POST["driver_contact"];}
		else{
			$contact = 0;
		}
		
		if(isset($_POST["company_email"])){
		$email  = $_POST["company_email"];}
		else{
			$email = 0;
		}

		
		$query = "insert into company(company_name,office_address ,city,state,pincode,company_contact ,company_email) values ('".$cname ."','".$oaddress ."','".$city ."','".$state ."','".$pincode ."','".$contact. "','".$email ."')";
		echo $query;
		$con -> query("$query");

		$query = "SELECT LAST_INSERT_ID()";
		$result = $con -> query("$query");
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$company_id = $row["LAST_INSERT_ID()"];
				}
			}

		if(isset($_POST["departure_time"])){
		$dtime = $_POST["departure_time"];}
		else{
			$dtime = "00:00:00";
		}
		if(isset($_POST["arrival_time"])){
		$atime = $_POST["arrival_time"];}
		else{
			$atime = "00:00:00";
		}
		if(isset($_POST["boarding_point"])){
		$bpoint = $_POST["boarding_point"];}
		else{
			$bpoint = "None";
		}
		if(isset($_POST["dropping_point"])){
		$dpoint= $_POST["dropping_point"];}
		else{
			$dpoint = "None";
		}

		if(isset($_POST["fare"])){
		$fare = $_POST["fare"];}
		else{
			$fare = 0;
		}

		$query = "insert into vehicles(departure_time,arrival_time,boarding_point,dropping_point,fare,company_id,vehicle_facility_id) values('".$dtime ."','".$atime ."','".$bpoint ."','".$dpoint. "','".$fare  ."','".$company_id ."','".$vehicle_id ."')";
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

		$con -> close();
		}
?>