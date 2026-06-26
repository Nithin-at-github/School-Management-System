<?php

$server = getenv('DB_HOST') ?: "localhost";
$name = getenv('DB_USER') ?: "root";
$pass = getenv('DB_PASSWORD') ?: "";
$db = getenv('DB_NAME') ?: "sms";

$con=mysqli_connect($server,$name,$pass,"$db");
if(!$con){
	die("could not connect to mysql:".mysqli_connect_error());
}

?>