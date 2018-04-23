<!DOCTYPE html>
<html lang="en">
<head>
	<title>signin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0, user-scalable=no">
	</head>
<body>


<?php
require_once('Connection.php');
$data = new stdClass();
	$data->status = "OK";
	if(isset($_POST["check"])){
		$email = $_POST["email"];
		$password = $_POST["password"];
	$query = "select first_name,last_name from login where email = ".$email + " and password = ".$password;
		$result = $con -> $query;
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$data->first_name = $row["first_name"];
				$data->last_name = $row["last_name"];
				
			}
			else{
				$data->status = "please signup.";
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