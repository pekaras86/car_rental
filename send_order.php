<?php
require_once ('scripts/database_connection.php');
require_once ('scripts/db_cars.php');
require_once ('scripts/views.php');

//customer
$custom_fname = $_REQUEST['fname'];
$custom_lname = $_REQUEST['lname'];
$custom_email = $_REQUEST['email'];

$custom_phone 	    = $_REQUEST['phone'];
$custom_address     = $_REQUEST['address'];
$custom_zipcode	    = $_REQUEST['zipcode'];
$custom_city 		= $_REQUEST['city'];
$custom_birthdate 	= $_REQUEST['birth'];
$custom_message 	= $_REQUEST['message'];

$custom_user_id = 2;



//reservation
$reserv_day = date("Y-m-d h:i:sa");
$car_id = $_REQUEST['car_id'];
$status_id = 0;


$pickup_date = $_COOKIE['pickup_date'];
$d = str_replace('/', '-', $pickup_date);
$pickup =  date('Y-m-d h:i:sa', strtotime($d));

$dropoff_date = $_COOKIE['dropoff_date'];
$d = str_replace('/', '-', $dropoff_date);
$dropoff =  date('Y-m-d h:i:sa', strtotime($d));

//$d = str_replace('/', '-', $pickup_date);
//echo date('Y-m-d h:i:sa', strtotime($d));



$dropoff_location = $_COOKIE['dropoff_location'];
$car_location = $_REQUEST['car_location'];

//metatropoi timis car_location apo name se id
$select_query = "SELECT * FROM car_locations WHERE name ='{$car_location}';";
$result = mysqli_query($con, $select_query);
$ro = mysqli_fetch_array($result);

$total_cost = $_REQUEST['total_cost'];



//queries
$insert_customer = sprintf("INSERT INTO customers " .
								         "(user_id, " .
								         "name, lastname, email, phone, address, zipcode, city, birthdate) " .
							          "VALUES ('%d', '%s', '%s', '%s', '%d', '%s', '%d', '%s', '%d');",
							           mysql_real_escape_string($custom_user_id),
							           mysql_real_escape_string($custom_fname),
							           mysql_real_escape_string($custom_lname),
							           mysql_real_escape_string($custom_email),
									   mysql_real_escape_string($custom_phone),
									   mysql_real_escape_string($custom_address),
									   mysql_real_escape_string($custom_zipcode),
									   mysql_real_escape_string($custom_city),
									   mysql_real_escape_string($custom_birthdate));
							
mysqli_query($con, $insert_customer);



$insert_car_reservation = sprintf("INSERT INTO reservations " .
								         "(reserv_date, " .
								         "customer_id, car_id, pickup_location_id, pickup_datetime, dropoff_location_id, dropoff_datetime, amount, status_id, notes) " .
							          "VALUES ('%s', '%d', '%d', '%d', '%s', '%d', '%s', '%d', '%d', '%s');",
							           mysql_real_escape_string($reserv_day), //
							           mysqli_insert_id($con), //
							           mysql_real_escape_string($car_id), //
							           mysql_real_escape_string($ro['id']),
							           mysql_real_escape_string($pickup), //
							           mysql_real_escape_string($dropoff_location),//
									   mysql_real_escape_string($dropoff), //
									   mysql_real_escape_string($total_cost),
									   mysql_real_escape_string($status_id), //
									   mysql_real_escape_string($custom_message)); //
							
mysqli_query($con, $insert_car_reservation); 



$success_message = "Your request has been sent.";
header("Location: index.php?" .
         "success_message={$success_message}");
exit();




?>