<?php

require_once 'scripts/app_config.php';
require_once 'scripts/database_connection.php';

if (!isset($_COOKIE['user'])) {
  header("Location: index.php");
  exit();
}

// stoixeia syndesis sygekrimenou pelati
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];


// eksagwgi id user apo ton pinaka users
$user_query = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
$user_result = mysqli_query($con, $user_query);
$user_rows = mysqli_fetch_array($user_result);
$user_id = $user_rows['id'];


// eksagwgi id user apo ton pinaka customers
$custom_query = "SELECT * FROM customers WHERE user_id='{$user_id}'";
$custom_result = mysqli_query($con, $custom_query);
$custom_rows = mysqli_fetch_array($custom_result);
$customer_id = $custom_rows['id'];



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
			  <li class=""><a href="car_types.php">Our Fleet</a></li>
			  <li class=""><a href="car_stations.php">Car Stations</a></li>
			  <li class=""><a href="terms_conditions.php">Terms & Conditions</a></li>
			  <li class=""><a href="contact_us.php">Contact us</a></li>
			  <li class="active"><a href="#">User Panel</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
			<?php
			  if (isset($_COOKIE['user_id'])) {
                echo "<li><a href='logout.php'>Log Out</a>";
              } else {
                echo "<li class=''><a href='log_in_form.php'>Log In</a></li>";
				//echo "<li class=''><a href='sign_up_form.php'>Sign up</a></li>";
              }
			?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div> <!-- /container -->	
	
	
	
	<div class="container"> 
	  <div class="jumbotron">
	  
	  <div>
	  <div><b>Last Name:</b> <?php echo $custom_rows['lastname']; ?></div>
	  <div><b>Name:</b> <?php echo $custom_rows['name']; ?></div>
	  <!--<div><b>Email:</b> <?php /*echo $custom_rows['email']; */?></div> -->
	  <div><b>Phone:</b> <?php echo $custom_rows['phone']; ?></div>
	  </div>
	  <div>
		  <!--<div><b>Address:</b> <?php /*echo $custom_rows['address']; ?></div>
	  <div><b>Zipcode:</b> <?php echo $custom_rows['zipcode']; ?></div>
	  <div><b>City:</b> <?php echo $custom_rows['city']; ?></div>
	  <div><b>Birthdate:</b> <?php echo date("d-m-Y",strtotime($custom_rows['birthdate'])); */?></div> -->
	  </div>
	  
	    <br>
		<br>
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
        <?php
		
		while($row = mysqli_fetch_array($result)){     // vgale ta records apo ton pinaka reservations
            
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
EOD;
	     } // end while	
		
		
		if ($num_rows == 0) {
              echo <<<EOD
				<tr>
				  <td colspan="10">No Reservations so far</td>
				</tr>
EOD;
        }
		
	    //gia epitixi akyrwsi kratisis
	    if(isset($_GET['success_message'])) {
	      echo <<<EOD
	        <script>
	           alert('{$_GET['success_message']}');
	       </script>
EOD;
	    }
		
		?>
        </tbody>
       </table>
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