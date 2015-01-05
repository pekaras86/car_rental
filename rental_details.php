<?php

require_once 'scripts/app_config.php';
require_once 'scripts/database_connection.php';

// Order number
$reserv_id = $_GET['reserv_id'];

// Days of reservation
$total_days = $_GET['total_days'];

/*======Table Reservations======*/
$reserv_query = "SELECT * FROM reservations WHERE id='{$reserv_id}'";
$reserv_result = mysqli_query($con, $reserv_query);
$reserv_row = mysqli_fetch_array($reserv_result);		

$reserv_date = date('d-m-Y h:m:s',strtotime($reserv_row['reserv_date']));	 // reservation date
$pickup_datetime =  date('d-m-Y h:m:s',strtotime($reserv_row['pickup_datetime'])); // pickup datetime 
$dropoff_datetime =  date('d-m-Y h:m:s',strtotime($reserv_row['dropoff_datetime'])); // dropoff datetime 

/*======Table Customers======*/
$custom_query = "SELECT * FROM customers WHERE id='{$reserv_row['customer_id']}'";
$custom_result = mysqli_query($con, $custom_query);
$custom_row = mysqli_fetch_array($custom_result);

$birthdate =  date('d-m-Y h:m:s',strtotime($custom_row['birthdate'])); // customer's birthdate 

/*======Table Car Types======*/
// Pickup Location
$location_query = "SELECT * FROM car_locations WHERE id='{$reserv_row['pickup_location_id']}'";
$location_result = mysqli_query($con, $location_query);
$location_row = mysqli_fetch_array($location_result);
$pickup_location = $location_row['name'];

// Dropoff Location
$location_query = "SELECT * FROM car_locations WHERE id='{$reserv_row['dropoff_location_id']}'";
$location_result = mysqli_query($con, $location_query);
$location_row = mysqli_fetch_array($location_result);
$dropoff_location = $location_row['name'];


/*======Table Car Items======*/
$item_query = "SELECT * FROM car_items WHERE id='{$reserv_row['car_id']}'";
$item_result = mysqli_query($con, $item_query);
$item_row = mysqli_fetch_array($item_result);


/*======Table Car Type======*/
$type_query = "SELECT * FROM car_types WHERE id='{$item_row['car_type_id']}'";
$type_result = mysqli_query($con, $type_query);
$type_row = mysqli_fetch_array($type_result);

 

				 

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
              <li class=""><a href="index.php">View Site</a></li>
			  <li class="active"><a href="admin_panel/admin.php">Dashboard</a></li>
			  <li class=""><a href=""></a></li>
			  <li class=""><a href=""></a></li>
			  <li class=""><a href=""></a></li>
			  <li class=""><a href=""></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class=""><a href="log_in_form.php">Log in</a></li>
              <li class=""><a href="sign_up_form.php">Sign up</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div> <!-- /container -->	
	
    
	
	
	
	<div class="container"> 
        <div class="row"> 
           <div class="table-responsive">
		     <form method="post" action="admin_panel/admin.php" name="adminForm">
               <table class="table adminform">
			    <tbody>
				  <tr>
				    <td>
					  <p class="vrcorderof">
						Order Number: <span style="color:green"><?php echo $reserv_id; ?></span> - Order Date: <span style="color:green"><?php echo $reserv_date; ?></span>    
					  </p>
					  <div class="status">
					  <p class="vrcorderpar">Status:</p>
					  <span style="color:green;">Confirmed</span>
					  </div>
					  <div class="statusbutton">
					    <button type="button" class="btn btn-danger">Cancel Reservation</button>
					  </div>
					</td>
				  </tr>
				  <tr>
				   <td valign="top">
				   <br>
				     <p class="vrcorderpar"><b>Purchaser Info:</b></p>
					 <div>
					   <i>eMail Address: </i><?php echo $custom_row['email']; ?><br>
					   <i>First Name: </i><?php echo $custom_row['name']; ?><br>
					   <i>Last Name: </i><?php echo $custom_row['lastname']; ?><br>
					   <i>Date of Birth: </i><?php echo $birthdate; ?><br>
					 </div>
					 <br>
					 <div>
					   <b>Car: </b><?php echo $type_row['name']; ?><br>
					   <b>Car ID: </b><?php echo $reserv_row['car_id']; ?><br>
					   <b>Plate Number: </b><?php echo $item_row['plate_number']; ?><br>
					   <b>Days of Rental: </b><?php echo $total_days; ?><br>
					   <b>Pickup: </b><?php echo $pickup_datetime; ?><br>
					   <b>Drop Off: </b><?php echo $dropoff_datetime; ?><br>
					   <b>Pickup Location: </b><?php echo $pickup_location; ?><br>
					   <b>Drop Off Location: </b><?php echo $dropoff_location; ?><br>
					 </div>
				   </td>
				   <td>
				     <p class="vrcorderpar"><b>Fare:</b></p>
					 <div>
					   Standard Insurance : EUR 100 <br>
					   Km inlcuded: 700
					 </div>
					 <br>
					 <p class="vrcorderpar"><b>Options:</b></p>
					 <div>
					   ABS <br>
					   Baby Seat <br>
					 </div>
					 <br>
					 <p class="totaleur"><b>Total: EUR <?php echo $reserv_row['amount']; ?></b></p>
					 <p><a href="admin_panel/admin.php"><img src="images/other/left_arrow.png" alt="" style="width:50px;"></a></p>
				   </td>
				  </tr>
				</tbody>
			   </table>
			 </form>  
		  </div>
        </div>
    </div> <!-- /container -->
	
	
	
	
	
	
	
	
	
	
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