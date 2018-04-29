<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nearby Sites</title>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="nearby.css">

	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/weather.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBlGQTCzJ2JtXevw8xPqL9AGeyrctFR7A4&libraries=places"></script>
	
	<script src="https://cdn.rawgit.com/stevenmonson/googleReviews/6e8f0d79/google-places.js"></script>


	
</head>
<body>
 <section class="site-hero overlay" style="background-image: url(img/pic_2.jpg)">
      <div class="container">
        <!-- <div class="row site-hero-inner justify-content-center align-items-center"> -->
          <div class="col-md-10 text-center">

	<?php
	 $city = $_POST['city'];
	 $chkbox = $_POST['chk'];
	 $weather = "";
	 // echo $city;
	 ?>
	 <div id = 'CITY'>	
     <a href="../Home/entry1.php"><?php echo $city; ?></a></div>;

<h1>The Default radius for search is 5 miles(8074m). Put your radius of interest if you want to(in meters)!</h1>
				<form action="radius.php" method="post">
				<input type="text" id="radius1"  placeholder="Radius" name="radius" />
				<button type="submit"  id="btn" name="submit">Go</button>
				</form>

			<?php	
					 if(!isset($_SESSION)) 
   					 { 
					session_start();
				}
					$_SESSION['city'] = $city;
					$_SESSION['chkbox'] = $chkbox;
					
					?>
     <div class = "htls">Change rating limit: 
                <select id="mySelect" onchange="initialize();initialize1()">
				  <option value="4">4</option>
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  
				</select>
                </div>
	 <?php
	  foreach ($chkbox as $hobys) {
             // echo "Selection : ".$hobys."<br />";
    
     ?>
    
     <?php if($hobys == 'Weather') :?>
             <?php

             	$address = urlencode($city);
                $url = "http://maps.googleapis.com/maps/api/geocode/json?address=$address";
				$json_data = file_get_contents($url);
				$result = json_decode($json_data, TRUE);
				$latitude = $result['results'][0]['geometry']['location']['lat'];
				// echo $latitude;
				$longitude = $result['results'][0]['geometry']['location']['lng'];
			     // echo $longitude;
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
		        // echo $weather;
		        ?>
		        <iframe id="forecast_embed" frameborder="0" height="245" width="100%" src="https://forecast.io/embed/#lat=<?php echo $latitude; ?>&lon=<?php echo $longitude; ?>&name=<?php echo $city; ?>&font=Georgia"></iframe>

		<?php endif; ?>
		<link rel="stylesheet" type="text/css" href="index.css">
		 <?php if($hobys == 'Hotels') :?>
		 		<div id="htl">Hotels</div>
             	<script type="text/javascript">var city = "<?= $city ?>";</script>
                <script type="text/javascript">var rad = 8047;</script>
				<link rel="stylesheet" type="text/css" href="css/hotel.css">

                
				<div id="mapped"></div>
				<a href="hotelMap/hotelMap.php" onclick="javascript:void window.open('hotelMap/hotelMap.php','1524914810588','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Click to see on Map</a>
				<h1 id="data" class="htls"></h1> 
		
					<script type="text/javascript" async=false defer=false src="../backend/hotels.js"></script>
					<br>

             <?php endif; ?>

        <?php if($hobys == 'Nearby Sites') :?>
        		<div id="htl">Nearby Sites</div>
             	<script type="text/javascript">var city = "<?= $city ?>";</script>
                <script type="text/javascript">var rad = 8047;</script>
				
				<div id="map"></div>
				<a href="NearbyMap/NearbyMap.php" onclick="javascript:void window.open('NearbyMap/NearbyMap.php','1524914810588','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Click to see on Map</a>
				<h1 id="nearbyData" class="htls"></h1> 

				<script type="text/javascript" async=false defer=false src="nearby.js"></script>
		
				

             <?php endif; ?>



        <?php if($hobys == 'Transportation') :?>
        		<div id="htl">Emergency Numbers</div>
             	<script type="text/javascript">var city = "<?= $city ?>";</script>
                <script type="text/javascript">var rad = 8047;</script>
				<div id="mapping"></div>
				<a href="NearbyMap/NearbyMap.php" onclick="javascript:void window.open('NearbyMap/NearbyMap.php','1524914810588','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Click to see on Map</a>
				<h1 id="numbers" class="htls"></h1>
				<script type="text/javascript" src="number.js"></script>

				

             <?php endif; ?>
       <?php 
   		}
   		?> 

	 		
	 
    

	
          </div>
        <!-- </div> -->
        <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
      </div>
    </section>
    <!-- END section -->
	 
</body>
</html>