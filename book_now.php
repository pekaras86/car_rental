<?php
  
  require_once ('scripts/database_connection.php');
  require_once ('scripts/db_cars.php');
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "home";
  display_navbar($tag);
  
  //ean mpei o xristis se afti ti selida xwris na exei epileksei amaksi 
  //anakatefthine ton stin kentriki
  if (!isset($_REQUEST['car_id']))
  {
    header("Location: index.php");
    exit();
  }
  
  //anazitisi amaksiou me to sygekrimeno id 
  $car_type_id = $_REQUEST['car_id'];
  $pickup_location = $_REQUEST['pickup_location'];
  $dropoff_location = $_COOKIE['dropoff_location'];
  $pickup_date = $_COOKIE['pickup_date'];
  $dropoff_date = $_COOKIE['dropoff_date'];


  //$result = getCarByID($con, $car_id);
   $result = getFirstAvailableCarByTypeID($con, $pickup_location, $pickup_date, $dropoff_date, $car_type_id);

  $available_car = mysqli_fetch_array($result);

  $result = getCarByID($con, $available_car['id']);

  $car = mysqli_fetch_array($result);

  $car_id		       = $car['id'];
  $car_name 	       = $car['name'];
  $car_category 	   = $car['car_category'];
  $car_description     = $car['description'];
  $car_location 	   = $car['car_location'];
  $car_price 		   = $car['price'];
  $car_pic_path        = $car['pic_path'];  
  
  //car characteristics
  $char_result = getCarCharacteristics($con, $car_id);
  $char = mysqli_fetch_array($char_result);
		  
  $air_con 		= $char['air_con'];
  $cccar 		= $char['cc'];
  $airbags 		= $char['airbags'];
  $passengers 	= $char['passengers'];
  $doors 		= $char['doors'];
  $radio 		= $char['radio'];
  
?>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="container" style="margin-bottom:20px;"> 
	  
	    <form method="post" action="confirm_order.php?car_id=<?php echo $car_id ?>">
        <div class="car_result" style="margin-top:0px;">
	    
		  <table class="car_result_table">
		    <tbody>
			  <tr>
			    <td align="left" width="130px" valign="top"> <!--car icon and price-->
				  <img class="imgresult" src="<?php echo $car_pic_path ?>" alt="" height="" width="">
				  <div class="car-result-price-div">
				    <span class="vrcstartfrom">Price/Day</span>
					<span class="car_cost"><?php echo $car_price ?></span>
				  </div>
				</td> <!--end car icon and price-->
				<td align="left" width="80%" valign="top">
				  <table>
				    <tbody>
					  <tr>
					    <td class="vrcrowcname"><b><?php echo $car_category . " : " . $car_name ?></b></td>
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
							  <span><?php echo $cccar; ?></span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/airbag.png">
							  <span>x<?php echo $airbags; ?></span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/body.png">
							  <span>x<?php echo $passengers; ?></span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/door.png">
							  <span>x<?php echo $doors; ?></span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/radio.png">
							  <span>Radio CD</span>
							</div>
							<div class="char-icon">
							  <img class="char-img" src="images/char-icons/compas.png">
							  <span>Athens</span>
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
                      <strong>€ <?php echo $car_price; ?></strong>
                      <br>
                      Km inlcuded: 200
                    </label>
				  </td>
				  <td style="float:right; margin-left:150px;">
					<input id="pid1" type="radio" checked="checked" value="<?php echo $car_price; ?>" name="priceid">
				  </td>
				</tr>
				<tr>
				  <td>
				    <label for="pid1">
                      <strong>Full Insurance:</strong>
                      <strong>€ <?php echo $car_price + 20; ?></strong>
                      <br>
                      Km inlcuded: Unlimited
                    </label>
				  </td>
				  <td style="float:right; margin-left:150px;">
					<input id="pid1" type="radio" checked="checked" value="<?php echo $car_price + 20; ?>" name="priceid">
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
			    <td align="center"><input type="checkbox" value="30" name="gps"></td>
			  </tr> <!--row-->
	           <tr height="30px">
				<td><img class="maxthirty" src="images/char-icons/child_seat.png"><span style="padding:2px;">Child Seat</span></td>
				<td><strong>€ 26</strong></td>
				<td align="center"><input type="checkbox" value="26" name="baby_seat"></td>
			  </tr>
              <tr height="30px">
				<td><img class="maxthirty" src="images/char-icons/snow_chains.jpg"><span style="padding:2px;">Snow Chains</span></td>
				<td><strong>€ 12</strong></td>
				<td align="center"><input type="checkbox" value="12" name="snow_chains"></td>
			  </tr>	
              <tr height="30px">
				<td><img class="maxthirty" src="images/char-icons/Car_Roof_Rack.jpg"><span style="padding:2px;">Roof Rack</span></td>
				<td><strong>€ 21</strong></td>
				<td align="center"><input type="checkbox" value="21" name="car_roof"></td>
			  </tr>				  
			</tbody>
		   </table>
	      </div> <!--end car option-->
		  <div class="book-submit">
		  <button type="submit" class="btn btn-default btn-lg btn-block">Book Now</button>
		  </div>
	   </div>
	  </form>

      

    </div> <!-- /container -->


<?php
    
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
