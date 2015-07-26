<?php
require_once 'usa2sa_cred.php';
session_start();
require_once 'alreadyloggedin.php';

//$mysqli=connect($dbhost,$dbuser,$dbpass,$dbname);
$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
}
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 
$email=$_POST['e-mail'];
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$result = $mysqli->query("SELECT * FROM userlist WHERE username='$myusername'");
echo" $mypassword ";
if($result->num_rows==0)
{
    
    $hash = password_hash($mypassword, PASSWORD_DEFAULT);
    $bytes = openssl_random_pseudo_bytes(32);
    $hash2 = password_hash($bytes, PASSWORD_DEFAULT);
    $mysqli->query("INSERT INTO userlist (username,password,email,Verify_Hash) VALUES ('$myusername','$hash','$email','$hash2')");  
    echo $mysqli->connect_errno;
    mkdir("memberassets/$myusername");
    //$mysqli->query("SELECT email FROM userlist WHERE username='$myusername'");
    //$email=$result->fetch_array();
    $result->close();
    $message = "Thanks for joining the USA2SA community. Please click this link below to verify you're account for USA2SA localhost/principles%20of%20soft%20eng/verify.php?email='.$email.'&verify_hash='.$hash2.'";
    $message = wordwrap($message, 70, "\r\n");
    $message = str_replace("\n.", "\n..", $message);
    echo $message;
    $_SESSION['registered']=true;
  //  mail($email, 'Usa2sa', $message,'From: USA2SA2015@gmail.com');
   
} else
{
    $_SESSION['taken']=true; //this is pointless since checking with ajax
}
//sleep(25);
//header("location:verify.php");
exit();
?>