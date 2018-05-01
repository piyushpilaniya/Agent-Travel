<?php
require_once('Connection.php');
$data = new stdClass();
	$data->status = "OK";
	if(isset($_POST["rating"])){
		if(isset($_POST["is"])){
			if($_POST["is"] == "hotel"){
	if(isset($_POST["rating"])){
		$review = $_POST["rating"];}
	else{
		$review = 0;
	}
	if(isset($_POST["comment"])){
		$comment = $_POST["comment"];
	}else{
			$comment = "None";
		}
	if(isset($_POST["email"])){
		$email = $_POST["email"];}
	else{
		$email = "None";
	}
	if(isset($_POST["name"])){
		$name = $_POST["name"];}
	else{
				$name = "None";
	}

		$query = "insert into hotel_rating(rating,email,comment,hotel_name) values(".$review. ",'" .$email. "','" .$comment ."','".$name ."')";
		$con -> query("$query");
		$query = "SELECT LAST_INSERT_ID()";
		$result = $con -> query("$query");
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$rating_id = $row["LAST_INSERT_ID()"];
				
				}
			}
		}
	}
		if(isset($_POST["is"])){
			if($_POST["is"] == "transport"){
			if(isset($_POST["rating"])){
		$review = $_POST["rating"];}
	else{
		$review = 0;
	}
	if(isset($_POST["comment"])){
		$comment = $_POST["comment"];
	}else{
			$comment = "None";
		}
	if(isset($_POST["email"])){
		$email = $_POST["email"];}
	else{
		$email = "None";
	}
	if(isset($_POST["name"])){
		$name = $_POST["name"];}
	else{
				$name = "None";
	}

		$query = "insert into transportation_rating(rating,email,comment,transport_name) values(".$review. ",'" .$email. "','" .$comment ."','".$name ."')";
		$con -> query("$query");
		$query = "SELECT LAST_INSERT_ID()";
		$result = $con -> query("$query");
		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$rating_id = $row["LAST_INSERT_ID()"];
				
				}
			}
		}
	}

		
}

?>