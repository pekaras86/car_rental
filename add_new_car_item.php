<?php

require_once 'scripts/app_config.php';
require_once 'scripts/database_connection.php';

// pianoume tis metavlites apo ti forma
$car_location = $_REQUEST['clocation'];
$plate_number = $_REQUEST['plate'];
$car_category = $_REQUEST['ccat'];

//upload car query
$insert_car_query = sprintf("INSERT INTO car_items " .
								"(plate_number, car_type_id, " .
								"location_ID) " .
							"VALUES ('%s', '%d', '%d');",
							mysql_real_escape_string($plate_number),
							mysql_real_escape_string($car_category),
							mysql_real_escape_string($car_location));						

mysqli_query($con, $insert_car_query); 


$success_message = "{$plate_number} added successfully!";

header("Location: new_car_item.php?" .
         "success_message={$success_message}");
exit();

?>



