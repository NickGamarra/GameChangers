<?php
function sanitizeString($_db, $str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return mysqli_real_escape_string($_db, $str);
}

function getAttractions($_db, $location)
{
    $query = "SELECT `Name`, `Location`, `Description`, `Image`, `Type` FROM `USA2SA Attractions` WHERE `Location` = '$location'";
    
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    
    $output = '';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '<li class="span3"><h3>' . $row['Name'] . '<br><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h3><a href="#" class="thumbnail"> <img src="' . $server_root . 'Pictures/' . $row['Image'] . '" alt=""></a></li>' ;
    }
    
    return $output;
}
function getComments($_db, $location)
{
    $query = "SELECT `User_name`, `Profile_pic`, `Comment`, `Time_Stamp` FROM `USA2SA Comments` WHERE `Location` = '$location' ORDER BY `Time_Stamp` DESC";
    
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    
    $output = '';
    while($row = $result->fetch_assoc())
    {
        $time = date('Y-m-d H:i:s', $row['Time_Stamp']);
        $output = $output . '<img src="' . $server_root . 'Profile/' . $row['Profile_pic'] . '" class="img-circle" width="60">
        <div class="panel panel-default">
          <div class="panel-body">
            <span class = "username">' . $row['User_name'] .'</span><span class = "time">' . $time .'</span><br>' . $row['Comment'] . '</div></div>' ;
    }
    
    return $output;
}
function getEvents($_db, $category, $param)
{
    if($param == "All"){
        $query = "SELECT `Name`, `Location`, `Description`, `Image`, `Type` FROM `USA2SA Attractions` WHERE `Type` = '$category'";
    }
    else{
        $query = "SELECT `Name`, `Location`, `Description`, `Image`, `Type` FROM `USA2SA Attractions` WHERE `Type` = '$category' AND `Location` = '$param'";
    }
    
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    
    $output = '';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '  <div class="span4 offer">
    	<div class="offer-wrap">
   	    <a href = "#"><img src="' . $server_root . 'Pictures/' . $row['Image'] .'" /></a>
        <span class="label label-success">
        <i class="icon-star icon-white"></i>
        <i class="icon-star icon-white"></i>
        <i class="icon-star icon-white"></i>
        <i class="icon-star icon-white"></i>
        <i class="icon-star icon-white"></i>
        </span>
        <div class="padding">
        <h2 class="text-center text-info">' . $row['Name'] .'</h2>
          <h4 class="text-center">Description</h4>
        </div>
        </div>
    </div>' ;
    }
    
    return $output;
}

function rating($_db, $place){
    $query = "SELECT ROUND(AVG(Rating)) FROM `USA2SA Rating` WHERE `Place` = '$place'";
    $output = '';
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    while($row = $result->fetch_assoc())
    {
        $rate = $row['ROUND(AVG(Rating))'];
    }
    $empty = 5;
    for($x = 1; $x <= $rate; $x++)
    {
        $output = $output .'<i class="icon-star"></i>';
        $empty--;
    }
    for($x = 1; $x <= $empty; $x++)
    {
        $output = $output .'<i class="icon-star-empty"></i>';   
    }
    return $output;
}
?>
