<?php

require_once 'scripts/app_config.php';
require_once 'scripts/database_connection.php';

$name = "Giorgos";
$lastname = "Kalimeris";
$customer_id = 15128;


// epilogi stoixeiwn apo ton pinaka reservations
$query = "SELECT * FROM reservations WHERE customer_id='{$customer_id}'";
$result = mysqli_query($con, $query);
$num_rows = mysqli_num_rows($result);  // elegkse ean yparxoun kataxwriseis

?>


<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.1/css/jquery.timepicker.css" />  <!--time_picker-->
	<link href="bootstrap-3.3.1/css/jquery.validate.password.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.1/css/custom-css.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Thessaloniki Car Rentals</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class=""><a href="index.php">Home</a></li>
			  <li class=""><a href="">Our Fleet</a></li>
			  <li class=""><a href="">Car Stations</a></li>
			  <li class=""><a href="">Terms & Conditions</a></li>
			  <li class=""><a href="">Contact us</a></li>
			  <li class="active"><a href="">User Panel</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
			<?php
			  if (isset($_COOKIE['user_id'])) {
                echo "<li><a href='logout.php'>Log Out</a>";
              } else {
                echo "<li class=''><a href='log_in_form.php'>Log In</a></li>";
				echo "<li class=''><a href='sign_up_form.php'>Sign up</a></li>";
              }
			?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div> <!-- /container -->	
	
	
	
	<div class="container"> 
	  <div class="jumbotron">
    
	
	<?php
	
	//emfanisi stoixeiwn sti selida
	
	
	
	
	
	if ($num_rows == 1) {  //ean yparxoun 
  
    $row = mysqli_fetch_array($result);    // vgale ta records apo ton pinaka reservations
  
    $reserv_date = $row['reserv_date'];
    $car_id = $row['car_id'];
    $pickup_location_id = $row['pickup_location_id'];
    $pickup_datetime = $row['pickup_datetime'];
    $dropoff_location_id = $row['dropoff_location_id'];
    $dropoff_datetime = $row['dropoff_datetime'];
    $amount = $row['amount'];
	$status_id = $row['status_id'];
	if ($status_id == 0) {
	  $status_id = 'Standby';
	} else if ($status_id == 1) {
	  $status_id = 'Confirmed';
	} else if ($status_id == 2) {
	  $status_id = 'Canceled';
	}
	
	//evresi dropoff location
	$loc_query = "SELECT * FROM car_locations WHERE id='{$dropoff_location_id}'";
	$loc_result = mysqli_query($con, $loc_query);
	$loc_row = mysqli_fetch_array($loc_result);
	
	//evresi pickup location
	$ploc_query = "SELECT * FROM car_locations WHERE id='{$pickup_location_id}'";
	$ploc_result = mysqli_query($con, $ploc_query);
	$ploc_row = mysqli_fetch_array($ploc_result);
	
	//evresi plate number
	$plate_query = "SELECT * FROM car_items WHERE id='{$car_id}'";
	$plate_result = mysqli_query($con, $plate_query);
	$plate_row = mysqli_fetch_array($plate_result);
	$car_type_id = $plate_row['car_type_id']; 
	
	//evresi car type
	$type_query = "SELECT * FROM car_types WHERE id='{$car_type_id}'";
	$type_result = mysqli_query($con, $type_query);
	$type_row = mysqli_fetch_array($type_result);
	
	
    
    echo <<<EOD
     <table class="table">
       <thead>
	     <tr>
		   <th>Car Name</th>
		   <th>Plate Number</th>
		   <th>Pickup Location</th>
		   <th>Dropff Location</th>
		   <th>Pickup Datetime</th>
		   <th>Dropoff Datetime</th>
		   <th>Amount</th>
		   <th>Reserv Date</th>
		   <th>Status</th>
		   <th>Cancel</th>
		 </tr>
	   </thead>
	   <tbody>
	     <tr>
		   <td>{$type_row['name']}</td>
		   <td>{$plate_row['plate_number']}</td>
		   <td>{$ploc_row['name']}</td>
		   <td>{$loc_row['name']}</td>
		   <td>{$pickup_datetime}</td>
		   <td>{$dropoff_datetime}</td>
		   <td>{$amount}</td>
		   <td>{$reserv_date}</td>
		   <td>{$status_id}</td>
		   <td style="text-align:center;"><a href="cancel_reservation.php?car_id={$car_id}"><img src="images/other/delete.png" width="15" /></a></td>
		 </tr>
	   </tbody>
     </table>
		
EOD;

  
    } else if ($num_rows == 0) {
      echo 'Den yparxoyn kratiseis gia to sygekrimeno logariasmo';
    }
	
  ?>
	
	  </div>
	</div>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<link href="http://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="bootstrap-3.3.1/js/jquery.validate.min.js"></script>
    <script src="bootstrap-3.3.1/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.1/js/jquery.timepicker.js"></script>  <!--time_picker-->
    <script src="bootstrap-3.3.1/js/modernizr.custom.52675.js"></script>
	
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
		
	</body>
</html>