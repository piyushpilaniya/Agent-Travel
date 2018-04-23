<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nearby Sites</title>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="nearby.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBlGQTCzJ2JtXevw8xPqL9AGeyrctFR7A4&libraries=places"></script>
	
	<script src="https://cdn.rawgit.com/stevenmonson/googleReviews/6e8f0d79/google-places.js"></script>


	
</head>
<body>
	<?php
	 $city = $_POST['city'];
	 $chkbox = $_POST['chk'];
	 $weather = "";
	 echo $city;
	  foreach ($chkbox as $hobys) {
             echo "Selection : ".$hobys."<br />";
     ?>
     <?php if($hobys == 'Weather') :?>
             <?php
             	function curl($url) {
		        
		            $ch = curl_init();
		            curl_setopt($ch, CURLOPT_URL, $url);
		            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		            $data = curl_exec($ch);
		            curl_close($ch);

		            return $data;
		        } 

		         $urlContents = curl("http://api.openweathermap.org/data/2.5/weather?q=".$city."&type=accurate&appid=cd3f619625a99d256fcf8c12bf3cbb12");
		        
		        $weatherArray = json_decode($urlContents, true);
		        
		        $weather = "The weather in ".$city." is currently ".$weatherArray['weather'][0]['description'].".";
		        
		        $tempInFahrenheit = intval($weatherArray['main']['temp']* 9/5 - 459.67);
		        
		        $speedInMPH = intval($weatherArray['wind']['speed']*2.24);
		        
		        $weather .=" The temperature is ".$tempInFahrenheit."&deg; F with a wind speed of ".$speedInMPH." MPH.";
		        echo $weather;
		        ?>
		<?php endif; ?>

		 <?php if($hobys == 'Hotels') :?>
             	<script type="text/javascript">var city = "<?= $city ?>";</script>
                <script type="text/javascript">var rad = 8047;</script>
				
				<h1>The Default radius for search is 5 miles</h1>
				<div id="mapped"></div>
				<script type="text/javascript" src="../backend/hotels.js"></script>
		
				

             <?php endif; ?>

        <?php if($hobys == 'Nearby Sites') :?>
             	<script type="text/javascript">var city = "<?= $city ?>";</script>
                <script type="text/javascript">var rad = 8047;</script>
				<h1>The Default radius for search is 5 miles. Put your radius of interest if you want to(in meters)!</h1>
				<form action="radius.php" method="post">
				<input type="text" id="radius1"  placeholder="Radius" name="radius" />
				<button type="submit"  id="btn" name="submit">Go</button>
				</form>
				<div id="map"></div>

				<script type="text/javascript" src="nearby.js"></script>
		
				<?php	
					session_start();
					$_SESSION['city'] = $city;
					$_SESSION['chkbox'] = $chkbox;
					$_SESSION['weather'] = $weather;
					?>

             <?php endif; ?>
       <?php 
   		}
   		?> 

	 		
	 
    

	
	 
</body>
</html>
