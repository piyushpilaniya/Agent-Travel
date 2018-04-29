<!DOCTYPE html>
<html>
<head>
  <title></title>
  
    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="Contacts.css">

</head>
<body>
<?php
if(isset($_GET['value']) ){
$type = $_GET['value'];

}
?>
<script type="text/javascript">var type = "<?= $type ?>";</script>

<div id="findhotels">
 
</div>

<!-- <form method=POST name=exampleform id='locationField'> -->
  <div id="locationField">
  <input id="autocomplete" class="form-control" placeholder="Enter a city"   type="text" />
</div>
<!-- </form> -->

<!-- <div id="controls">
  <select id="country">
    <option value="us">U.S.A.</option>
    <option value="ind" selected>India</option>
    <option value="uk">United Kingdom</option>
  </select>
</div> -->

<div id="map"></div>

<div id="listing">
  <table id="resultsTable">
    <tbody id="results"></tbody>
  </table>
</div>

<div style="display: none">
  <div id="info-content">
    <table>
      <tr id="iw-url-row" class="iw_table_row">
        <td id="iw-icon" class="iw_table_icon"></td>
        <td id="iw-url"></td>
      </tr>
      <tr id="iw-address-row" class="iw_table_row">
        <td class="iw_attribute_name">Address:</td>
        <td id="iw-address"></td>
      </tr>
      <tr id="iw-phone-row" class="iw_table_row">
        <td class="iw_attribute_name">Telephone:</td>
        <td id="iw-phone"></td>
      </tr>
      <tr id="iw-rating-row" class="iw_table_row">
        <td class="iw_attribute_name">Rating:</td>
        <td id="iw-rating"></td>
      </tr>
      <tr id="iw-website-row" class="iw_table_row">
        <td class="iw_attribute_name">Website:</td>
        <td id="iw-website"></td>
      </tr>
    </table>
  </div>
</div>
<script type="text/javascript" src="Contacts.js"></script>
<!-- Replace the value of the key parameter with your own API key. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlGQTCzJ2JtXevw8xPqL9AGeyrctFR7A4&libraries=places&callback=initMap"
        async defer></script>
</body>
</html>