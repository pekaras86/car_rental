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
    <link href="bootstrap-3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.0/css/jquery.timepicker.css" />  <!--time_picker-->
	<link href="bootstrap-3.3.0/css/jquery.validate.password.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.0/css/custom-css.css" rel="stylesheet">

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
			  <li class=""><a href=""></a></li>
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
	  <div class="jumbotron">
        <div class="row"> 
           <div class="table-responsive">
		     <form method="post" action="admin.php" name="adminForm">
               <table class="table adminform">
			    <tbody>
				  <tr>
				    <td>
					  <p class="vrcorderof">
						Order Number: <span style="color:green">1205</span> - Order Date: <span style="color:green">11/23/2014 20:46</span>    
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
					   <i>eMail Address: </i>anto@yahoo.com <br>
					   <i>First Name: </i>Giorgos <br>
					   <i>Last Name: </i>Antoniadis <br>
					   <i>Date of Birth: </i>1 April 1987 <br>
					 </div>
					 <br>
					 <div>
					   <b>Car: </b>Seat Leon <br>
					   <b>Days of Rental: </b>2 <br>
					   <b>Pickup: </b>11/25/2014 13:30 <br>
					   <b>Drop Off: </b>11/27/2014 21:30 <br>
					   <b>Pickup Location: </b>Athens Airport <br>
					   <b>Drop Off Location: </b>Athens Airport <br>
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
					 <p class="totaleur"><b>Total: EUR 230</b></p>
					 
				   </td>
				  </tr>
				</tbody>
			   </table>
			 </form>  
		  </div>
        </div>
      </div> <!-- / jumbotron-->
    </div> <!-- /container -->
	
	
	
	
	
	
	
	
	
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<link href="http://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="bootstrap-3.3.0/js/jquery.validate.min.js"></script>
    <script src="bootstrap-3.3.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.0/js/jquery.timepicker.js"></script>  <!--time_picker-->
    <script src="bootstrap-3.3.0/js/modernizr.custom.52675.js"></script>
	
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>