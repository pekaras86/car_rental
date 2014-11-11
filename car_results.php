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
              <li class="active"><a href="index.php">Home</a></li>
			  <li><a href="about_us.php">About Us</a></li>
			  <li><a href="car_types.php">Car Types</a></li>
			  <li><a href="car_stations.php">Car Stations</a></li>
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
    </div> <!-- /container -->
	  
	  
	 
	 <!-- Main component for a primary marketing message or call to action -->
	 <div class="container"> 
	  
	  <div class="jumbotron">
       
	  
	  <div class="car_result">
	    <form method="get" action="">
		  <table class="car_result_table">
		    <tbody>
			  <tr>
			    <td align="left" width="130px" valign="top"> <!--car icon and price-->
				  <img class="imgresult" src="images/cars/honda-accord-v6.jpg" alt="" height="" width="">
				  <div class="car-result-price-div">
				    <span class="vrcstartfrom">Total Price</span>
					<span class="car_cost">€ 104.00</span>
				  </div>
				</td> <!--end car icon and price-->
				<td align="left" width="80%" valign="top">
				  <table>
				    <tbody>
					  <tr>
					    <td class="vrcrowcname"><b>City Car : Honda Accord V6</b></td>
					  </tr>
					  <tr>
					    <td class="vrcrowdescr">
						  <p>perigrafi perigrafi perigrafi perigrafi perigrafi perigrafi  
						  perigrafi perigrafi perigrafi perigrafi perigrafi perigrafi.</p>
						</td>
					  </tr>
					  <tr>
					    <td>
						  <div class="characteristics">
						    <div class="char-icon">
							  <img class="char-img" src="images/char-icons/ac.png">
							  <span>A/C</span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/ac.png">
							  <span>1000cc</span>
							</div>
							<div class="char-icon"></div>
							<div class="char-icon"></div>
							<div class="char-icon"></div>
							<div class="char-icon"></div>
							<div class="char-icon"></div>
							<div class="char-icon"></div>
						  </div>
						</td>
					  </tr>
					</tbody>
				  </table>
				</td>
			  </tr>
			</tbody>
		  </table>
		</form>
	  </div>
      
		
		
		
		  
		 
		 
		    
			

		 
		 
		 
		 
		 
      </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
    
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
