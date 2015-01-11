<?php

require_once 'scripts/app_config.php';
require_once 'scripts/database_connection.php';

$car_id = $_GET['car_id'];

$query = "UPDATE reservations SET status_id='2' WHERE car_id='{$car_id}'";
$result = mysqli_query($con, $query);

$success_message = 'Your reservation has been canceled!';
header("Location: user_panel.php?" .
         "success_message={$success_message}");
exit();












?>