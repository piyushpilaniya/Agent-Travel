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

    if ($_GET['city']) {
        
        $urlContents = curl("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&type=accurate&appid=cd3f619625a99d256fcf8c12bf3cbb12");
        
        $weatherArray = json_decode($urlContents, true);
        
        $weather = "The weather in ".$_GET['city']." is currently ".$weatherArray['weather'][0]['description'].".";
        
        $tempInFahrenheit = intval($weatherArray['main']['temp']* 9/5 - 459.67);
        
        $speedInMPH = intval($weatherArray['wind']['speed']*2.24);
        
        $weather .=" The temperature is ".$tempInFahrenheit."&deg; F with a wind speed of ".$speedInMPH." MPH.";
          
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      
  <style type="text/css">
      
      html { 
          background: url(background4.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
      
      body {
          
          background: none;
          
      }
      
      @media (min-width: 768px) {
            
            .container{
                
                max-width: 576px;
                
            }
          
          }

        @media (min-width: 992px) {
            
            .container{
                
                max-width: 576px;
                
            }
          
          }

        @media (min-width: 1200px) {
            
            .container{
                
                max-width: 576px;
                
            }
          
          }
      
      .container {
          
          text-align: center;
          margin-top: 100px;
          
      }
      
      input {
          
          
          margin: 20px 0;
      }
      
      #weather {
          
          margin-top: 20px;
      }





  </style>
      
  </head>
  <body>
      
     <div class="container">
         
        <h1>To know weather condition.</h1>
         
         <form>
          <div class="form-group">
            <label for="city">Enter city name.</label>
            <input type="text" class="form-control" id="city" name="city" aria-describedby="city" placeholder="E.g. New York, Tokyo" value="<?php echo $_GET['city']; ?>">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
             
        </form>
         
         <div id="weather">
          
          <?php 
            
            if($weather) {
                
                echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
                
            } else {
                
                if ($_GET['city'] !="") {
                    
                    echo '<div class="alert alert-danger" role="alert">Sorry, that city could not be found.</div>';
                }
            }
          
          ?>
      
      </div>
         
     </div> 
      
      
      

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
