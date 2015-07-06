<?php


$dbhost="localhost";  
$dbusername="root";   
$dbpassword="rootpassword";  
$dbname="neiuhost_cs_club";
/*
$dbhost="localhost";  
$dbusername="neiuhost";   
$dbpassword="softdelicious";
$dbname="neiuhost_cs_club";*/

$connect = mysqli_connect($dbhost, $dbusername, $dbpassword);
mysqli_select_db($connect,$dbname) or die ("no database");  

?>
