<?php
  $servername = "127.0.0.1:3307"; //servername
  $username = "root"; //name of the user
  $password = ""; // password
  $dbname="hospitalmgmt";

  $con=mysqli_connect("$servername","$username","$password","$dbname");
  if(!$con){
      die("Connection failed :".mysqli_connect_error());
  }
?>