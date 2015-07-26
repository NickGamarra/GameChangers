<?php // Example 26-6: checkuser.php
 require_once 'usa2sa_cred.php';


  if (isset($_POST['user']))
  {
      $mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
}
      //$mysqli = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
//if ($mysqli->connect_errno) {echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;}
    $user   = sanitizeString($mysqli,$_POST['user']);
      //$mysqli->query("INSERT INTO userlist (username,email) VALUES ('$user','emailz')");
    $result = $mysqli->query("SELECT * FROM userlist WHERE username='$user'");

    if ($result->num_rows)
     // echo "<span class =notgood><span class ='notgood glyphicon glyphicon-remove-circle'></span>This username is unavailable</span>";
     echo 'bad';
    else
        echo 'good';
      //echo "<span class =good><span class ='good glyphicon glyphicon-ok-circle'></span>This username is available</span>";
      $result->close();
  }

 if (isset($_POST['confirmBool']))
  {
    if ($_POST['confirmBool'])
    {
        echo 'good';
        //echo "<span class =good><span class ='good glyphicon glyphicon-ok-circle'></span>Passwords match</span>";
    }else{
      //echo "<span class =notgood><span class ='notgood glyphicon glyphicon-remove-circle'></span>Passwords do not match</span>";
      echo 'bad';
    }
 }
?>