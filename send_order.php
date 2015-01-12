<?php
require_once ('scripts/database_connection.php');
require_once ('scripts/db_cars.php');
require_once ('scripts/views.php');

// stoixeia user
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];

// eksagwgi id apo ton pinaka users
$user_query = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
$user_result = mysqli_query($con, $user_query);
$user_rows = mysqli_fetch_array($user_result);
$user_id = $user_rows['id'];

// eksagwgi id apo ton pinaka customers
$custom_query = "SELECT * FROM customers WHERE user_id='{$user_id}'";
$custom_result = mysqli_query($con, $custom_query);
$custom_rows = mysqli_fetch_array($custom_result);
$customer_id = $custom_rows['id'];


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

$total_cost = $_REQUEST['total_cost'];  //to amount



$insert_car_reservation = sprintf("INSERT INTO reservations " .
								         "(reserv_date, " .
								         "customer_id, car_id, pickup_location_id, pickup_datetime, dropoff_location_id, dropoff_datetime, amount, status_id) " .
							          "VALUES ('%s', '%d', '%d', '%d', '%s', '%d', '%s', '%d', '%d');",
							           mysql_real_escape_string($reserv_day), //
							           mysql_real_escape_string($customer_id), //
							           mysql_real_escape_string($car_id),  //
							           mysql_real_escape_string($ro['id']),  //
							           mysql_real_escape_string($pickup),  // 
							           mysql_real_escape_string($dropoff_location),  //
									   mysql_real_escape_string($dropoff),  // 
									   mysql_real_escape_string($total_cost),  //
									   mysql_real_escape_string($status_id)); //
							
mysqli_query($con, $insert_car_reservation); 



$success_message = "Your request has been sent.";
header("Location: user_panel.php?" .
         "success_message={$success_message}");
exit();



?>