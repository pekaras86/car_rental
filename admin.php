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
			  <li class="active"><a href="admin.php">Dashboard</a></li>
			  <li class=""><a href="newcar.php">New Car</a></li>
			  <li class=""><a href=""></a></li>
			  <li class=""><a href=""></a></li>
			  <li class=""><a href=""></a></li>
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
        <div class="row"> 
           <div class="table-responsive">
             <table class="table table-hover table-striped">
			    <tr>
				  <th style="text-align:center;" colspan="10">Current Orders</th>
				</tr>
				<tr>
				  <th>ID</th>
				  <th>Date</th>
				  <th>Purchaser</th>
				  <th>Car</th>
				  <th>Pickup</th>
				  <th>Drop Off</th>
				  <th>Days</th>
				  <th>Total</th>
				  <th>Status</th>
				  <th>Delete</th>
				</tr>
			    <tr>
				  <td>1123</td>
				  <td><a href="rental_details.php">11/24/2014 07:23</a></td>
				  <td>Name:Giorgos Last Name:Antoniadis email:anto@yahoo.gr</td>
				  <td>Seat Leon</td>
				  <td>11/25/2014 13:30</td>
				  <td>11/27/2014 21:30</td>
				  <td>2</td>
				  <td>230</td>
				  <td style="color:green;">Confirmed</td>
				  <td style="text-align:center;"><img src="images/other/delete.png" width="15" /></a></td>
				</tr>
				<tr>
				  <td>1124</td>
				  <td>11/24/2014 10:29</td>
				  <td>Name:Anestis Last Name:Papas email:anpap@hotmail.com</td>
				  <td>Honda Civic</td>
				  <td>11/25/2014 17:00</td>
				  <td>12/2/2014 22:30</td>
				  <td>7</td>
				  <td>386</td>
				  <td style="color:green;">Confirmed</td>
				  <td style="text-align:center;"><img src="images/other/delete.png" width="15" /></a></td>
				</tr>
				<tr>
				  <td>1125</td>
				  <td>11/24/2014 18:20</td>
				  <td>Name:Diamantis Last Name:Kalaitzis email:dkala@hotmail.com</td>
				  <td>Opel Ascona</td>
				  <td>11/30/2014 17:00</td>
				  <td>12/3/2014 22:30</td>
				  <td>4</td>
				  <td>310</td>
				  <td style="color:red;">Standby</td>
				  <td style="text-align:center;"><img src="images/other/delete.png" width="15" /></a></td>
				</tr>
				<tr>
				  <td>1126</td>
				  <td>11/24/2014 18:20</td>
				  <td>Name:Aleksis Last Name:Papadospoulos email:alpap@hotmail.com</td>
				  <td>Scoda Fabia</td>
				  <td>11/24/2014 17:00</td>
				  <td>12/1/2014 22:30</td>
				  <td>7</td>
				  <td>270</td>
				  <td style="color:green;">Confirmed</td>
				  <td style="text-align:center;"><img src="images/other/delete.png" width="15" /></a></td>
				</tr>
				<tr>
				  <td>1127</td>
				  <td>11/23/2014 18:20</td>
				  <td>Name:Stefanos Last Name:Saleas email:stesal@hotmail.com</td>
				  <td>Ford Focus</td>
				  <td>11/25/2014 20:00</td>
				  <td>12/01/2014 20:00</td>
				  <td>6</td>
				  <td>380</td>
				  <td style="color:green;">Standby</td>
				  <td style="text-align:center;"><img src="images/other/delete.png" width="15" /></a></td>
				</tr>
			 </table>
		  </div>
        </div>
      </div> <!-- / jumbotron-->
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