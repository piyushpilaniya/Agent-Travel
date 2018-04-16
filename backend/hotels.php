<!DOCTYPE html>
<html lang="en">
<head>
	<title>hotels</title>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="hotels.css">
	</head>
<body>


<?php
require_once('Connection.php');
$data = new stdClass();
	$data->status = "OK";
	if(isset($_POST["check"])){
		$city = $_POST["city"];
	$query = "select * from hotel where address_id in(select address_id from address where city = ".$city;
		$result = $con -> $query;
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$data->name = $row["hotel_name"];
				$data->rating = $row["rating_of_hotel"];
				$data->availability = $row["availability"];
			}
			else{
				$data->status = "No hotels found in the given region.";
			}
		}
		else{
			$data->status = "Invaild Query";
		}
	}
		echo json_encode(data);
?>

</body>
</html>
