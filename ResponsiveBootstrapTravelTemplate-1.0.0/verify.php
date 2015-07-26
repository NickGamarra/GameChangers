<?php
require_once 'p2cred.php';
$mysqli=connect($dbhost,$dbuser,$dbpass,$dbname);
$email=$_GET['email'];
$gHash=$_GET['hash'];
$result = $mysqli->query("SELECT Verify_Hash FROM userlist WHERE email='$email'");
$hash=$result->fetch_array();
if($hash[0] == $gHash)
{
    $mysqli->query("UPDATE userlist SET verified ='1' WHERE email ='$email'");
    echo'You have been verified please log in';
}else
{
    echo'Not verified';
}

?>