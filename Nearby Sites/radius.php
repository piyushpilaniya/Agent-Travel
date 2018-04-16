<!DOCTYPE html>
<html lang="en">
<head>
	<title>Radius Modified</title>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="nearby.css">
	<script type="text/javascript" src = "https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBlGQTCzJ2JtXevw8xPqL9AGeyrctFR7A4"></script>
	
</head>
<body>
	<?php
		session_start();
	
		$city = $_SESSION['city'];
		$chkbox = $_SESSION['chkbox'];
		$weather = $_SESSION['weather'];
		foreach ($chkbox as $hobys) {
             echo "Hobby : ".$hobys."<br />";
        }
      	echo $city;
      	echo $weather;

	 ?>
	 <script type="text/javascript">var city = "<?= $city ?>";</script>
	 
	 <?php
	 $radius = $_POST['radius'];
	 ?>
	 <h1>Your currently selected radius is </h1>
	 <?php
      echo $radius;
      ?>
      <div id="map"></div>
      <script type="text/javascript">var rad = "<?= $radius ?>";</script>
      <script type="text/javascript" src="nearby.js"></script>

</body>
</html>