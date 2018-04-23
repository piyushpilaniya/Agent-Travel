<?php
include_once 'dbConfig.php';
if(!empty($_POST['ratingPoints'])){
    $hotelID = $_POST['hotelID'];
    $ratingNum = 1;
    $ratingPoints = $_POST['ratingPoints'];
    
    //Check the rating row with same hotel ID
    $prevRatingQuery = "SELECT * FROM post_rating WHERE post_id = ".$postID;
    $prevRatingResult = $db->query($prevRatingQuery);
    if($prevRatingResult->num_rows > 0):
        $prevRatingRow = $prevRatingResult->fetch_assoc();
        $ratingNum = $prevRatingRow['rating_number'] + $ratingNum;
        $ratingPoints = $prevRatingRow['total_points'] + $ratingPoints;
        //Update rating data into the database
        $query = "UPDATE hotel_rating SET rating_number = '".$ratingNum."', total_points = '".$ratingPoints."' WHERE hotel_id = ".$hotelID;
        $update = $db->query($query);
    else:
        //Insert rating data into the database
        $query = "INSERT INTO hotel_rating (hotel_id,rating_number,total_points,created) VALUES(".$hotelID.",'".$ratingNum."','".$ratingPoints."','".date("Y-m-d H:i:s"))";
        $insert = $db->query($query);
    endif;
