<?php

require_once ('app_config.php'); 

$con = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

mysqli_set_charset($con,'utf8'); //set character set gia na apothikeuei swsta ellinikous xaraktires

if(mysqli_connect_errno($con)){
	die("Failed to connect to mySQL!" . mysqli_error($con) . "<br>");
} 

//echo "Connected with mySQL and database " . DATABASE_NAME . "<br>";

function Sanitized($Input) {
	return (get_magic_quotes_gpc()) ?
	mysql_real_escape_string(stripslashes($Input)) :
	mysql_real_escape_string($Input);
}

?>