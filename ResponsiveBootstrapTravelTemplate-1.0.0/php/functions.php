<?php
function sanitizeString($_db, $str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return mysqli_real_escape_string($_db, $str);
}

function getAttractions($_db)
{
    $query = "SELECT `Name`, `Location`, `Description`, `Image`, `Type` FROM `USA2SA Attractions` WHERE `Location` = 'Cape Town'";
    
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
?>