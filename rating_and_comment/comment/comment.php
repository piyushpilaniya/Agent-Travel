<?php
 
require_once('dbConfig.php');
	$data = new stdClass();
	$data->status = "OK";

// create a variable
$login_id=$_POST['login'];
$comment=$_POST['comment'];
 
 
mysqli_query($connect"INSERT INTO hotel_comments(login_id,comment)
				VALUES('$login_id','$comment');

?>
