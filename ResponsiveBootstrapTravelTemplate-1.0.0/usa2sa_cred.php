<?php
  $dbhost  = 'localhost';    // Unlikely to require changing
  $dbname  = 'usa2sa';   // Modify these...
  $dbuser  = 'root';   // ...variables according
  $dbpass  = '';   // ...to your installation
  $appname = "usa2sa"; 

  function sanitizeString($_db, $str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return mysqli_real_escape_string($_db, $str);
}
function destroySession()
{
    session_destroy();
}
function connect($dbhost,$dbuser,$dbpass,$dbname)
{
    $mysqli = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
    if ($mysqli->connect_errno)
    {    
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    return $mysqli;
}
?>