<?php
  
  require_once ('scripts/app_config.php');
  require_once ('scripts/database_connection.php');
  require_once ('scripts/views.php');
  
  	
	$user_id = 94;  //pernw to $user_id tou xristi apo tin proigoumeni forma **panw apo to url
	
	$select_query = "SELECT * FROM cars WHERE car_id = " . $user_id;  //build the query
	
	$result = mysqli_query($con, $select_query);  //run the query
	
	if ($result) {  //ean einai swsto to query
		
		$row = mysqli_fetch_array($result);  //epidh einai SELECT
		
		$car_id		       = $row['car_id'];
		$car_name 	       = $row['car_name'];
		$car_category 	   = $row['car_category'];
		$car_description   = $row['car_description'];
		$car_location 	   = $row['car_location'];
		$car_price 		   = $row['car_price'];
		$car_pic_path      = $row['car_pic_path'];	
	
	} else {	//ean einai lathos to query exit_failure
		handle_error("there was a problem finding your " .
						"information in our system.",
						"Error locating user with ID");
	}
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "home";
  display_navbar($tag);

?>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="container"> 
	  
	 <div class="jumbotron">
       
	    <form method="get" action="confirm_order.php">
        <div class="car_result">
	    
		  <table class="car_result_table">
		    <tbody>
			  <tr>
			    <td align="left" width="130px" valign="top"> <!--car icon and price-->
				  <img class="imgresult" src="<?php echo $car_pic_path; ?>" alt="" height="" width="">
				  <div class="car-result-price-div">
				    <span class="vrcstartfrom">Price/Day</span>
					<span class="car_cost"><?php echo $car_price ?></span>
				  </div>
				</td> <!--end car icon and price-->
				<td align="left" width="80%" valign="top">
				  <table>
				    <tbody>
					  <tr>
					    <td class="vrcrowcname"><b><?php echo $car_category . " : " . $car_name; ?></b></td>
					  </tr>
					  <tr>
					    <td class="vrcrowdescr">
						  <p><?php echo $car_description ?></p>
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
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/compas.png">
							  <span><?php echo $car_location ?></span>
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
		  <div class="car_prices">
		    <span class="vrhword">Total Price:</span>
			<table>
			  <tbody>
			    <tr>
				  <td>
				    <label for="pid1">
                      <strong>Standard Insurance:</strong>
                      <strong>€ 100.00</strong>
                      <br>
                      Km inlcuded: 200
                    </label>
				  </td>
				  <td style="float:right; margin-left:150px;">
					<input id="pid1" type="radio" checked="checked" value="1" name="priceid">
				  </td>
				</tr>
				<tr>
				  <td>
				    <label for="pid1">
                      <strong>Full Insurance:</strong>
                      <strong>€ 150.00</strong>
                      <br>
                      Km inlcuded: Unlimited
                    </label>
				  </td>
				  <td style="float:right; margin-left:150px;">
					<input id="pid1" type="radio" checked="checked" value="1" name="priceid">
				  </td>
				</tr>
			  </tbody>
			</table>
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
		  <div class="book-submit">
		  <button type="submit" class="btn btn-default btn-lg btn-block">Book Now</button>
		  </div>
	   </div>
	  </form>
	  
	  
	  
	    
		
		
	  
	  
	  
	  
	  
	  
	  
		
      
      </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
    
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
