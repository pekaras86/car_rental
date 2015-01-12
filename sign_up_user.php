<?php

require_once ('scripts/database_connection.php');
require_once ('scripts/db_cars.php');
require_once ('scripts/views.php');

$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

$phone = $_POST['phone'];
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$birth = $_POST['birth'];

$user_group_id = 2;

//users query
$insert_sql = sprintf("INSERT INTO users " .
								"(user_group_id," .
								"username, password) " .
							"VALUES ('%d', '%s', '%d');",
							mysql_real_escape_string($user_group_id),
							mysql_real_escape_string($username),
							mysql_real_escape_string($password));
							
mysqli_query($con, $insert_sql);


// eisagwgi ston pinaka customers
$custom_sql = sprintf("INSERT INTO customers " .
								"(user_id, name, lastname, email, phone, " .
								"address, zipcode, city, birthdate) " .
							"VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d');",
							mysqli_insert_id($con),
							mysql_real_escape_string($fname),
							mysql_real_escape_string($lname),
							mysql_real_escape_string($email),
							mysql_real_escape_string($phone), 
							mysql_real_escape_string($address),
							mysql_real_escape_string($zipcode),
							mysql_real_escape_string($city),
							mysql_real_escape_string($birth));  
                      
	
	
	//Insert the user into the database
	mysqli_query($con, $custom_sql);

?>