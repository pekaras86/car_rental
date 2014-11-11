<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");


?>


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
              <li><a href="index.php">Home</a></li>
			  <li><a href="about_us.php">About Us</a></li>
			  <li><a href="car_types.php">Car Types</a></li>
			  <li><a href="car_stations.php">Car Stations</a></li>
	      <li class="active"><a href="terms_conditions.php">Terms & Conditions</a></li>
			  <li><a href="contuct_us.php">Contuct Us</a></li>
			  <li><a href="" style="padding-right:5px;padding-left:5px;"><img src="images\langs\gr.jpg" alt="ελληνικά" title="ελληνικά" /></a></li>
			  <li><a href="" style="padding-right:5px;padding-left:5px;"><img src="images\langs\uk.jpg" alt="english" title="english" /></a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="log_in_form.php">Log in</a></li>
              <li><a href="sign_up_form.php">Sign up</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


    <div class="jumbotron"> 
      <h2> Terms & Conditions </h2>
      <ol>
      	<li>Drivers:</li>
        <ol type="a">
        	<li><b>driver's age:</b> drivers must be aged from 21 to 70.</li>
           	<li><b>driver's license:</b> the driver is required to display a valid Drivers' License issued at least a year before the pick-up date.</li>
        </ol>
      	<li>Minimum rental period:</li>
        The minimum rental period is 3 days.
        <li>Deliveries and collections:</li>
        Deliveries to or collections from airports or our stations are free from extra charge. Elsewhere, there will be an extra 25€ + VAT charge.
        <li>Cancellation policy:</li> To cancel your reservation you have to fill in the cancellation form, using your registration details. If you cancel your reservation 20 days before the pick-up date, 100% of the pre-paid amount will be refunded. Up to 10 days before, 50% and otherwise there will be no refund.
        <li>Additional services:</li>
        <ul>
        	<li><b>GPS:</b> the extra charge is 7€ per day. Maximum charge is 49€. Available upon request.</li>
            <li><b>snow chains:</b> the extra charge is 5€ per day. Maximum charge is 35€. Available upon request.</li>
            <li><b>child seat:</b> the extra charge is 4€ per day. Maximum charge is 28€. Available upon request.</li>
            <li><b>roof rack:</b> the extra charge is 5€ per day. Maximum charge is 35€. Available upon request.</li>
        </ul>
      </ol>


    </div>





<?php
  
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>