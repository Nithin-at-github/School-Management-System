<?php

$server="localhost";
$name="root";
$pass="";
$db="sms";

$con=mysqli_connect($server,$name,$pass,"$db");
if(!$con){
	die("could not connect to mysql:".mysql_error());
}

?>