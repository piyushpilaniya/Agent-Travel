+<!DOCTYPE html>
 +<html lang="en">
 +<head>
 +	<title>Vehicles</title>
 +	<meta charset="utf-8">
 +	<meta name="viewport" content="initial-scale = 1.0, user-scalable=no">
 +	<link rel="stylesheet" type="text/css" href="nearby.css">
 +	</head>
 +<body>
 +
 +
 +<?php
 +require_once('Connection.php');
 +$data = new stdClass();
 +	$data->status = "OK";
 +	if(isset($_POST["check"])){
 +		$boardingcity = $_POST["boardingcity"];
		$droppingcity = $_POST["droppingcity"];
 +	$query = "select * from vehicles where boarding_point = ".$boardingcity. "and dropping_point = ".$droppingcity;  
 +		$result = $con -> $query;
 +		if($result){
 +			if($result->num_rows > 0){
 +				$row = $result->fetch_assoc();
 +				$data->vehicle_id = $row["vehicle_id"];
 +				$data->company_id = $row["company_id"];
 +				$data->availability = $row["availability"];
				$data->fare = $row["fare"];
				
 +			}
 +			else{
 +				$data->status = "No vehicles found between given points.";
 +			}
 +		}
 +		else{
 +			$data->status = "Invaild Query";
 +		}
 +	}
 +		echo json_encode(data);
 +?>
 +
 +</body>
 +</html> 