<?php
  
  //ean mpei o xristis se afti ti selida xwris na exei epileksei amaksi 
  //anakatefthine ton stin kentriki
  if (!isset($_REQUEST['category']))
  {
    header("Location: index.php");
    exit();
  }
  
  require_once ('scripts/database_connection.php');
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

		<div class="row">
	  <?php  
	  
	  // pianei ta stoixeia apo ti forma	   
	  $category = $_REQUEST['category'];
	  $pickup_location = $_REQUEST['pickup_location'];
	  setcookie('dropoff_location', $_REQUEST['dropoff_location']);
	  setcookie('pickup_date', $_REQUEST['pickup_date']);
	  setcookie('dropoff_date', $_REQUEST['dropoff_date']);
	  
	  
	  
	  // dimiourgia query anazitisis sti vasi
	  if ($category == 'Any') {
	    $select_query = "SELECT * FROM cars WHERE car_location = '{$pickup_location}'";
	  } else {
	    $select_query = "SELECT * FROM cars WHERE car_category ='{$category}' " .
	                    "AND car_location = '{$pickup_location}'";  
	    }
     
	  // run the query	  
	  $result = mysqli_query($con, $select_query);  
    
	  
	  //emfanise ola ta amaksia
	  if($result) {
	    while ($car = mysqli_fetch_array($result)) {   //$car['car_category'];
		
		  $car_id		       = $car['car_id'];
		  $car_name 	       = $car['car_name'];
		  $car_category 	   = $car['car_category'];
		  $car_description     = $car['car_description'];
		  $car_location 	   = $car['car_location'];
		  $car_price 		   = $car['car_price'];
		  $car_pic_path        = $car['car_pic_path'];
		  
		  //car characteristics
		  $char_query = "SELECT * FROM characteristics WHERE car_id = '{$car_id}'";
		  $char_result = mysqli_query($con, $char_query);
		  $char = mysqli_fetch_array($char_result);
		  
		  $air_con 		= $char['air_con'];
		  $cccar 		= $char['cccar'];
		  $airbags 		= $char['airbags'];
		  $cccar 		= $char['cccar'];
		  $passengers 	= $char['passengers'];
		  $doors 		= $char['doors'];
		  $radio 		= $char['radio'];		  
		  
          
		  echo <<<EOD
           <div class="car_result">
	        <form method="post" action="book_now.php?car_id={$car_id}">
		      <table class="car_result_table">
		        <tbody>
			      <tr>
			        <td align="left" width="130px" valign="top"> <!--car icon and price-->
				      <img class="imgresult" src="{$car_pic_path}" alt="" height="" width="">
				      <div class="car-result-price-div">
				        <span class="vrcstartfrom">Price/Day</span>
					    <span class="car_cost">{$car_price}</span>
				      </div>
				    </td> <!--end car icon and price-->
				    <td align="left" width="80%" valign="top">
				      <table>
				        <tbody>
					      <tr>
					        <td class="vrcrowcname"><b>{$car_category} : {$car_name}</b></td>
					      </tr>
					      <tr>
					        <td class="vrcrowdescr">
						      <p>{$car_description}</p>
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
							      <span>{$cccar}</span>
							    </div>	
							    <div class="char-icon">
							      <img class="char-img" src="images/char-icons/airbag.png">
							      <span>x{$airbags}</span>
							    </div>
							    <div class="char-icon">
							      <img class="char-img" src="images/char-icons/body.png">
							      <span>x{$passengers}</span>
							    </div>
							    <div class="char-icon">
							      <img class="char-img" src="images/char-icons/door.png">
							      <span>x{$doors}</span>
							    </div>
							    <div class="char-icon">
							      <img class="char-img" src="images/char-icons/radio.png">
							      <span>Radio CD</span>
								</div>
							    <div class="char-icon">
							        <img class="char-img" src="images/char-icons/compas.png">
							        <span>{$car_location}</span>
							    </div>
							  </div>
						    </td>
					      </tr>
					      <tr>
					        <td>
						      <input type="submit" value="Continue" class="btn btn-default btn-sm">
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
EOD;
		 	    
		} //end while
	  
	  } else { 
	    echo "no result";
	    }
	  
	  
	?>
<div class="calendar-module-2 col-xs-12 col-s-12 col-md-5 col-lg-5">  
		<form role="form" action="car_results.php" method="POST">
		   <div class="form-group pickdrop_lock"> <!--start pickup location-->
		     <label>Pickup Location</label>
             <select class="form-control" id="pickup_location" name="pickup_location">
               <option name="pickup_location" value="ATHENS AIRPORT">ATHENS AIRPORT</option>
               <option name="pickup_location" value="THESSALONIKI AIRPORT">THESSALONIKI AIRPORT</option>
               <option name="pickup_location" value="VOLOS">VOLOS</option>
               <option name="pickup_location" value="ALEKSANDROUPOLI">ALEKSANDROUPOLI</option>
			   <option name="pickup_location" value="CHANIA">CHANIA</option>
             </select>
		    </div> <!--end pickup location-->
		  <div class="form-group pickdrop_date">  <!--start pickup date-->
		    <label>Pickup Date</label>
            <input type="text" class="form-control date" id="datepicker1" name="pickup_date">
		  </div> <!--end pickup date-->
		  <div class="form-group pickdrop_time">  <!--start pickup time--> 
            <label>Pickup Time</label>		  
			<input type="text" class="form-control" id="timepicker1">
		  </div> <!--end pickup time-->
		  <div class="form-group pickdrop_lock"> <!--start drop-off location-->
		     <label>Drop Off Location</label>
             <select class="form-control" id="dropoff_location" name="dropoff_location">
               <option name="dropoff_location" value="ATHENS AIRPORT">ATHENS AIRPORT</option>
               <option name="dropoff_location" value="THESSALONIKI AIRPORT">THESSALONIKI AIRPORT</option>
               <option name="dropoff_location" value="VOLOS">VOLOS</option>
               <option name="dropoff_location" value="ALEKSANDROUPOLI">ALEKSANDROUPOLI</option>
			   <option name="dropoff_location" value="CHANIA">CHANIA</option>
             </select>
		    </div> <!--end dropoff location-->
			<div class="form-group pickdrop_date">  <!--start dropoff date-->
		    <label>Drop Off Date</label>
            <input type="text" class="form-control date" id="datepicker2" name="dropoff_date">
		  </div> <!--end dropoff date-->
		  <div class="form-group pickdrop_time">  <!--start dropoff time--> 
            <label>Drop Off Time</label>		  
			<input type="text" class="form-control" id="timepicker2">
		  </div> <!--end dropoff time-->
		  <div class="form-group car-category"> <!--start drop-off location-->
		     <label>Category</label>
             <select class="form-control" id="car-category" name="category">
               <option name="category" value="Any">ANY</option>
               <option name="category" value="City Car">CITY CAR</option>
               <option name="category" value="Station Wagon">STATION WAGON</option>
               <option name="category" value="Suv">SUV</option>
             </select>
		    </div> <!--end dropoff location-->
		  <div class="form-group search_mod_button">        
            <button type="submit" class="btn btn-default btn-info search-module">SEARCH</button>
          </div>
		</form>
	  </div>
				</div>
        
	    
		
	 </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
    
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
