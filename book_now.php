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
       
	    <form method="get" action="">
        <div class="car_result">
	    
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
		  <div class="book-submit">
		  <button type="submit" class="btn btn-primary btn-lg btn-block">Book Now</button>
		  </div>
		  <div class="car_options">
	      <span class="vrhword">Options:</span>
		    <table cellspacing="0" cellpadding="0" width="90%">
		     <tbody>
		       <tr height="30px"> <!--row-->
			    <td><img class="maxthirty" src="images/char-icons/abs.png"><span style="padding:2px;">GPS</span></td>
			    <td><strong>€ 30</strong></td>
			    <td align="center"><input type="checkbox" value="1" name="optid3"></td>
			  </tr> <!--row-->
	           <tr height="30px">
				<td><img class="maxthirty" src="images/char-icons/child_seat.png"><span style="padding:2px;">Child Seat</span></td>
				<td><strong>€ 26</strong></td>
				<td align="center"><input type="checkbox" value="1" name="optid3"></td>
			  </tr>
              <tr height="30px">
				<td><img class="maxthirty" src="images/char-icons/snow_chains.jpg"><span style="padding:2px;">Snow Chains</span></td>
				<td><strong>€ 12</strong></td>
				<td align="center"><input type="checkbox" value="1" name="optid3"></td>
			  </tr>	
              <tr height="30px">
				<td><img class="maxthirty" src="images/char-icons/Car_Roof_Rack.jpg"><span style="padding:2px;">Roof Rack</span></td>
				<td><strong>€ 21</strong></td>
				<td align="center"><input type="checkbox" value="1" name="optid3"></td>
			  </tr>				  
			</tbody>
		   </table>
	      </div> <!--end car option-->
		
	   </div>
	  </form>
	  
	  
	  
	    
		
		
	  
	  
	  
	  
	  
	  
	  
		
      
      </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
    
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
