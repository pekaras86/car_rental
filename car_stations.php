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
			  <li class="active"><a href="car_stations.php">Car Stations</a></li>
                <li><a href="terms_conditions.php">Terms & Conditions</a></li>
			  <li><a href="contact_us.php">Contact Us</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="log_in_form.php">Log in</a></li>
              <li><a href="sign_up_form.php">Sign up</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


    <div class="jumbotron"> 
      <h2> Car stations </h2>

        <iframe  src="https://mapsengine.google.com/map/embed?mid=zMkCKgEPr2rU.kWx_lXDFFNY0" width="640" height="480"></iframe>


    </div>





<?php
  
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>