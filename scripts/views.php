<?php 

// Requires the <HEAD></HEAD> part of a page
function display_head($page_title = "") {
  
  echo <<<EOD
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>{$page_title}</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.1/css/jquery.timepicker.css" />  <!--time_picker-->
	<link href="bootstrap-3.3.1/css/jquery.validate.password.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.1/css/custom-css.css" rel="stylesheet">

    <!-- Just for debugging purposes. Dont actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  
EOD;
}


// Requires the footer (JS declarations) part of the page 
function display_footer($jqScripts = NULL) {

echo <<<EOD
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
	{$jqScripts}
  </body>
</html>
		
EOD;
}


// Requires the navbar
function display_navbar($tag = NULL) {

$home = NULL;
$about = NULL;
$carTypes = NULL;
$carStations = NULL;
$terms = NULL;
$contactUs = NULL;
$logIn = NULL;
$signUp = NULL;

switch($tag) {
  case "home":
    $home = "active";
	break;
  case "about":
    $about = "active";
	break;
  case "carTypes":
    $carTypes = "active";
	break;
  case "carStations":
    $carStations = "active";
	break;
  case "terms":
    $terms = "active";
	break;
  case "contactUs":
    $contactUs = "active";
	break;
  case "logIn":
    $logIn = "active";
	break;
  case "signUp":
    $signUp = "active";
	break;
}

echo <<<EOD
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
              <li class="<?php {$home} ?>"><a href="index.php">Home</a></li>
			  <li class="<?php {$about} ?>"><a href="about_us.php">About Us</a></li>
			  <li class="<?php {$carTypes} ?>"><a href="car_types.php">Car Types</a></li>
			  <li class="<?php {$carStations} ?>"><a href="car_stations.php">Car Stations</a></li>
			  <li class="<?php {$terms} ?>"><a href="terms_conditions.php">Terms & Conditions</a></li>
			  <li class="<?php {$contactUs} ?>"><a href="contact_us.php">Contact Us</a></li>
EOD;
			  if (isset($_COOKIE['admin'])) {
			    echo "<li class=''><a href='admin.php'>Admin Panel</a></li>";
			  }
echo <<<EOD
            </ul>
            <ul class="nav navbar-nav navbar-right">
EOD;
            
		if (isset($_COOKIE['user_id'])) {
         echo "<li><a href='logout.php'>Log Out</a>";
        } else {
         echo "<li class='{$logIn}'><a href='log_in_form.php'>Log In</a></li>";
		 echo "<li class='{$signUp}'><a href='sign_up_form.php'>Sign up</a></li>";
        }

echo <<<EOD
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div> <!-- /container -->	
EOD;
}

?>