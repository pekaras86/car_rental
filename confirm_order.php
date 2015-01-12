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
  
  
  //eksagoume ta xaraktiristika tou sygekrienou amaksiou
  $car_id = $_REQUEST['car_id'];

  $result = getCarByID($con, $car_id);

  $car = mysqli_fetch_array($result);
  
  $car_id		       = $car['id'];
  $car_name 	       = $car['name'];
  $car_category 	   = $car['car_category'];
  $car_description     = $car['description'];
  $car_location 	   = $car['car_location'];
  $car_price 		   = $car['price'];
  $car_pic_path        = $car['pic_path']; 
  
  //oi plirofories pou pira me cookies
  $dropoff_location = $_COOKIE['dropoff_location'];
  $pickup_date = $_COOKIE['pickup_date'];
  $dropoff_date = $_COOKIE['dropoff_date'];
  
  
  
  
  //car characteristics
  $char_result = getCarCharacteristics($con, $car_id);
  $char = mysqli_fetch_array($char_result);
		  
  $air_con 		= $char['air_con'];
  $cccar 		= $char['cc'];
  $airbags 		= $char['airbags'];
  $passengers 	= $char['passengers'];
  $doors 		= $char['doors'];
  $radio 		= $char['radio'];
  
  
  
  //metatropoi timis dropoff location apo id se name
  $select_query = "SELECT * FROM car_locations WHERE id = " . $dropoff_location;
  $result = mysqli_query($con, $select_query);
  $r = mysqli_fetch_array($result);
  
  
  
  
  
  
  //oi epipleon ypiresies
  if(isset($_REQUEST['gps'])) {
    $gps_choice = $_REQUEST['gps'];
  } else {
    $gps_choice = 0;
  }
  
  if(isset($_REQUEST['baby_seat'])) {
    $baby_seat_choice = $_REQUEST['baby_seat'];
  } else {
    $baby_seat_choice = 0;
  }
  
  if(isset($_REQUEST['snow_chains'])) {
    $snow_chains_choice = $_REQUEST['snow_chains'];
  } else {
    $snow_chains_choice = 0;
  }
  
  if(isset($_REQUEST['car_roof'])) {
    $car_roof_choice = $_REQUEST['car_roof'];
  } else {
    $car_roof_choice = 0;
  }
  
 //Standard or Full Insurance
  if(isset($_REQUEST['priceid'])) {
    $fullOrStan = $_REQUEST['priceid'];
  } else {
    $fullOrStan = 0;
  }
  
  //posa pliromis
  $tax = 17.36;
  $total_cost = $fullOrStan + $tax;
  
  
  // difference in days from american format to european format
  function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
  {
    $d1 = explode("/", $date_1);
    $dTemp = explode(" ", $d1[2]);
	$d1[2] = $dTemp[0];
	$dt1 = $d1[1]."/".$d1[0]."/".$d1[2];
    $datetime1 = date_create($dt1);
    $d2 = explode("/", $date_2);
	$dTemp = explode(" ", $d2[2]);
	$d2[2] = $dTemp[0];
    $dt2 = $d2[1]."/".$d2[0]."/".$d2[2];
    $datetime2 = date_create($dt2);
    $interval = date_diff($datetime1, $datetime2);
    return $interval->format($differenceFormat);  
    
  }
  
  $diff = dateDifference($pickup_date, $dropoff_date);

?>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="container" style="margin-bottom:10px;"> 
	    
		
		<div class="contsite">
		  <p>Order Summary:</p>
		  <div class="vrcrentforlocs">
		    <p class="vrcrentalfor">
             <span class="vrcrentalforone"><?php echo $car_name; ?></span>
            </p>
		    <div class="vrcrentalfortwo">
			  <p>
                 <span class="vrcrentalfordate">From <span style="color:green;"><?php echo $pickup_date; ?> 00:00</span></span>
			  </p>
			  <p>
                 <span class="vrcrentalfordate">To <span style="color:green;"><?php echo $dropoff_date; ?> 00:00</span></span>
			  </p>
			</div>
			<div class="vrclocsboxsum">
			  <p class="vrcpickuploc">
                Pickup Location:
                <span class="vrcpickuplocname"><?php echo $car_location; ?></span>
             </p>
			 <p class="vrcdropoffloc">
               Drop Off Location:
               <span class="vrcdropofflocname"><?php echo $r['name']; ?></span>
             </p>
			</div>
		  </div>
		  <table class="vrctableorder">
		    <tbody>
			  <tr class="vrctableorderfrow">
				<td> </td>
				<td align="center">Days</td>
				<td align="center">Net Price</td>
				<td align="center">Tax</td>
				<td align="center">Total Price</td>
			  </tr>
			  <tr>
			    <td align="left">
			      <?php echo $car_name; ?>
                  <br>
				  <?php 
				    if($car_price < $fullOrStan){
					  echo <<<EOD
					    Full Insurance
                        <br>
                        Km inlcuded: Unlimited
EOD;
					} else {
					  echo <<<EOD
					    Standard Insurance
                        <br>
                        Km inlcuded: 200
EOD;
					}
				  ?>
                </td>
				<td align="center"><?php echo $diff; ?></td>
				<td align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice"><?php echo $fullOrStan; ?></span>
               </td>
			   <td align="center">
                    <span class="vrccurrency">€</span>
                    <span class="vrcprice"><?php echo $tax; ?></span>
               </td>
			   <td align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice"><?php echo $total_cost; ?></span>
			   </td>
			  </tr>
			  <tr height="20px">
				<td height="20px" colspan="5"> </td>
			  </tr>
			  <tr class="vrcordrowtotal">
			    <td>Total</td>
				<td align="center"> </td>
				<td align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice"><?php echo $fullOrStan; ?></span>
				</td>
				<td align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice"><?php echo $tax; ?></span>
				</td>
				<td class="vrctotalord" align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice"><?php echo $total_cost; ?></span>
				</td>
			  </tr>
			</tbody>
		  </table>
		  
		  
		  
		<?php
		
		if(isset($_COOKIE['user'])) {
		  echo <<<EOD
		  <form method="post" action="send_order.php?car_id={$car_id}&car_location={$car_location}&total_cost={$total_cost}" role="form" id="conorform">
		    <input class="btn btn-default" type="submit" value="Confirm Order" name="saveorder">   
		  </form>
EOD;
		} else {
		  echo <<<EOD
		  <form method="post" action="" role="form" id="conorform">
		    <input class="btn btn-info btn-block" type="submit" value="Confirm Order" name="saveorder" style="width:150px;">   
		  </form>
EOD;
		}

        ?>		
		
		
		
		</div>
	  </div> <!-- /container -->


<?php

  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
