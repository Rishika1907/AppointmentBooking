<?php
// $successdb=false;
include("connection.php");

// $database="Hospitalmgmt";
//Select the database
// $db=mysqli_select_db($con,$database);
// If database does not exist create one
// if(!$db){
//     $sql=mysqli_query($con,"CREATE DATABASE ".$database);
//     if($sql){
//         $successdb=true;
//     }
//     else{
//         die("Could not create database");
//     }
// }
mysqli_query($con,"INSERT INTO department(`depid`,`depname`) VALUES('10GM01','General Medicine')");

mysqli_query($con,"INSERT INTO department(`depid`,`depname`) VALUES('10PA01','Pediatrics')");
?>