<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "home";
  display_navbar($tag);

?>

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
				    <span class="vrcstartfrom">Price/Day</span>
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
							  <img class="char-img" src="images/char-icons/engine.png">
							  <span>1000cc</span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/abs.png">
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/airbag.png">
							  <span>x2</span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/body.png">
							  <span>x4</span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/door.png">
							  <span>x4</span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/radio.png">
							  <span>Radio CD</span>
							</div>
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
