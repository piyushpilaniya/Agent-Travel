<!doctype html>
<html lang="en">
  <head>
    <title>Explore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/entry1.js"></script>

    <style>
      .dropbtn {
          background-color: #3498DB;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          cursor: pointer;
      }

      .dropbtn:hover, .dropbtn:focus {
          background-color: #2980B9;
      }

      .dropdown {
          float: right;
          position: relative;
          display: inline-block;
      }

      .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          overflow: auto;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
      }

      .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
      }

      .dropdown a:hover {background-color: #ddd}

      .show {display:block;}

    </style>

  </head>
  <body>
    
    <header class="site-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 site-logo" data-aos="fade"><a href="index.html"><em>Travel</em></a></div>
          <div class="col-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                      </ul>
                    </div>
                    <div class="col-md-6 extra-info">
                      <div class="row">
                        <div class="col-md-6 mb-5">
                          <h3></h3>
                          <p> <br> </p>
                          <p></p>
                          <p></p>
                          
                        </div>
                        <div class="col-md-6">
                          <h3>Connect With Us</h3>
                          <ul class="list-unstyled">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <section class="site-hero overlay" style="background-image: url(img/pic_1.jpg)">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center">
           
            <!-- Ask the user for the input in form of a form and Checkbox  -->
  <form class="form-horizontal" method="post" action="../Nearby Sites/index.php">
  <div class="form-group">
    <label for="exampleInputEmail1" class="sub-heading mb-2" data-aos="fade-up" data-aos-delay="100">Where you're heading</label>
    <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Location"> -->
    <input type="text" id="YOUR_INPUT_ELEMENT_ID" class="form-control" placeholder="Enter Location" name="city" />
  </div>
  
  <input id="prodId" name="prodId" type="hidden" value="xm234jq">
  <script >
 
  getLocation();

  </script>
   <div  class="checkbox" >
    <label class="sub-heading mb-2" data-aos="fade-up" data-aos-delay="100">
      <input type="checkbox" name="chk[]" value="Weather"> Weather
    </label>
  </div>

 <div  class="checkbox" >
    <label class="sub-heading mb-2" data-aos="fade-up" data-aos-delay="100">
      <input type="checkbox" name="chk[]" value="Hotels"> Hotels
    </label>
  </div>
  <div  class="checkbox" >
    <label class="sub-heading mb-2" data-aos="fade-up" data-aos-delay="100">
      <input type="checkbox" name="chk[]" value="Nearby Sites"> Nearby Sites
    </label>
  </div>
  <div  class="checkbox" >
    <label class="sub-heading mb-2" data-aos="fade-up" data-aos-delay="100">
      <input type="checkbox" name="chk[]" value="Transportation"> Transportation
      <input type="text" name="depart" class="form-control" placeholder="Enter Your Boarding Point">
    </label>
  </div>
  
  <!-- <button type="submit" class="btn btn-default" id="btnQueryString" name="submit1" data-aos="fade-up" data-aos-delay="100">Submit</button>
  <button  type="submit" class="btn btn-default" id="btnQueryString" name="submit2" data-aos="fade-up" data-aos-delay="100" onclick="getLocation()">Use Current Location</button>
   -->
   <input type="submit" name="submit1" value="Submit" class="btn btn-default" id="btnQueryString" data-aos="fade-up" data-aos-delay="100">
   <input type="submit" name="submit2" value="Use Current Location" class="btn btn-default" id="btnQueryString" data-aos="fade-up" data-aos-delay="100">
</form>
 
<!-- <a href="../Nearby Sites/Contacts.html" style="float: right;font-size: 22px;
  font-weight: bold;
  font-family: Georgia;
  border-bottom: 2px solid #444; ">See Emergency Numbers</a> -->
<!-- Form and checkbox ends here -->

<div class="dropdown" data-aos="fade-up" data-aos-delay="100">
<button onclick="myFunction()" class="dropbtn">Get Contact Info</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="../Nearby Sites/Contacts.php?value=police">Police</a>
    <a href="../Nearby Sites/Contacts.php?value=hospital">Hospital</a>
    <a href="../Nearby Sites/Contacts.php?value=doctor">Doctor</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

          </div>
        </div>
        <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
      </div>
    </section>
    <!-- END section -->


          <!-- END col -->
        </div>
      </div>
    </section>

   
    
    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
         
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block">Address:</span> <span> Indian Institute of Technology, Ropar</span></p>
            <p><span class="d-block">Phone:</span> <span> Not Available</span></p>
            <p><span class="d-block">Email:</span> <span> info@iitrpr.ac.in</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our updates</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row bordertop pt-5">
          
        </div>
      </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtXJ3El7ZsueYDx6kD1G2R1AaEt1DuENg&libraries=places&callback=initAutocomplete" async defer></script>

  </body>
</html>


9648
AIzaSyAtXJ3El7ZsueYDx6kD1G2R1AaEt1DuENg 