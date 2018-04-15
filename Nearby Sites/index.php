<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nearby Sites</title>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="nearby.css">
	<script type="text/javascript" src = "https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBlGQTCzJ2JtXevw8xPqL9AGeyrctFR7A4"></script>
	
</head>
<body>
	<?php
	 $city = $_POST['city'];
	 $chkbox = $_POST['chk'];
	  foreach ($chkbox as $hobys) {
             echo "Hobby : ".$hobys."<br />";
        }
      echo $city;
	 
	 ?>
	
	 <h1>Enter radius around which you want to see the result</h1>
	 <form action="#" method="post">
	 <input type="text" id="radius1"  placeholder="Radius" name="radius" />
	 <button type="submit"  id="btn" name="submit">Go</button>
	 </form>
	   <?php
	   	if(isset($_POST['submit']))
		{
			$radius = $_POST['radius'];
			echo $radius;
		 ?>
	
	 <div id="map"></div>
	 <script type="text/javascript">var city = "<?= $city ?>";</script>
	 <script type="text/javascript" src="nearby.js"></script>
	 <?php
	 	}
	 ?>

</body>
</html>