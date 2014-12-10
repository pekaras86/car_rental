<?php

require_once ('app_config.php'); 

$con = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
if(mysqli_connect_errno($con)){
	die("Failed to connect to mySQL!" . mysqli_error($con) . "<br>");
}

// echo "Connected with mySQL and database " . DATABASE_NAME . "<br>";

?>