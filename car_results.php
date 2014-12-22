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
	  
<!--	 <div class="jumbotron"> -->

		<div class="row no-side-margins">

	  <?php  
	 	  
	  // pianei ta stoixeia apo ti forma	   
	  $category = $_REQUEST['category'];
	  $pickup_location = $_REQUEST['pickup_location'];
	  $srt = $_REQUEST['hidden'];
	  setcookie('dropoff_location', $_REQUEST['dropoff_location']);
	  setcookie('pickup_date', $_REQUEST['pickup_date']);
	  setcookie('dropoff_date', $_REQUEST['dropoff_date']);
	 
	  echo <<<EOD
	  	<div class="calendar-module-2 col-xs-12 col-s-12 col-md-5 col-lg-5">
		<form id="search_frm" role="form" action="car_results.php" method="POST">
		   <input type="hidden" id="hidden" name="hidden" value="price ascending">
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
            <input type="text" class="form-control date" id="datepicker1" name="pickup_date" placeholder="Pickup Date">
		  </div> <!--end pickup date-->
		  <div class="form-group pickdrop_time">  <!--start pickup time--> 
            <label>Pickup Time</label>		  
			<input type="text" class="form-control" id="timepicker1" name="pickup_time">
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
            <input type="text" class="form-control date" id="datepicker2" name="dropoff_date" placeholder="Drop Off Date">
		  </div> <!--end dropoff date-->
		  <div class="form-group pickdrop_time">  <!--start dropoff time--> 
            <label>Drop Off Time</label>		  
			<input type="text" class="form-control" id="timepicker2" name="dropoff_time">
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
            <button type="submit" class="btn btn-default btn-info search-module" onClick="return dateFields();">SEARCH</button>
          </div>
		</form>
	  </div>
EOD;

     // dimiourgia query anazitisis sti vasi
	  if ($category == 'Any') {
	    $select_query = "SELECT cars.id, cars.name, car_categories.name as car_category, cars.description, car_locations.name as car_location, price, pic_path FROM cars " . 
						"INNER JOIN car_locations ON car_locations.id = cars.location_ID " .
						"INNER JOIN car_categories ON car_categories.id = cars.car_Category_ID " .
						"WHERE active = 1 AND car_locations.name = '{$pickup_location}' " .
						"ORDER BY price";
	  } else {
	  $select_query = "SELECT cars.id, cars.name, car_categories.name as car_category, cars.description, car_locations.name as car_location, price, pic_path FROM cars " .
						"INNER JOIN car_locations ON car_locations.id = cars.location_ID " .
						"INNER JOIN car_categories ON car_categories.id = cars.car_Category_ID " .
						"WHERE active = 1 AND car_categories.name = '{$category}' " .
						"AND car_locations.name = '{$pickup_location}' " .
						"ORDER BY price";
	    }

		if($srt == 'price descending') {
			$select_query = $select_query . " DESC";
		}

	   // run the query	
	  $result = mysqli_query($con, $select_query);  
    	  
	  //emfanise ola ta amaksia
	  
	  $num_rows = mysqli_num_rows($result);

	  if($num_rows>0) {
		echo '<div class="results-bar">';
		echo '<table>';
		echo '<tr>';
		echo '<td align="left" valign="top" style="white-space:nowrap;">';

	    if($num_rows==1) {
			echo '<h4 id="results_count" style="color:blue;margin-left: 10px;">Results: 1 car found</h4>';
			echo '</td>';
		} else {
			echo '<h4 id="reults_count" style="color:blue;margin-left: 10px;margin-right:60px;">Results: ' . $num_rows . ' cars found</h4>';
			echo '</td>';
			echo '<td style="white-space:nowrap;">';
			echo '<div class="page-div">';
			echo '<span class="page active">first</span>';
			echo '<a href="#" class="page">2</a>';
			echo '<a href="#" class="page">3</a>';
			echo '<a href="#" class="page">4</a>';
			echo '<a href="#" class="page">last</a>';
			echo '</div>';
			echo '</td>';
			echo '<td align="right" width="99%">';
			echo '<div>';
			echo '<label style="margin-right:8px;margin-bottom:0px;">sort:</label>';
			echo '<select name="price_sort" style="float:right;margin-right:30px;" onchange="set_sorting(this)">';
			echo '<option name="price_sort" value="price ascending">price ascending</option>';
			if($srt=="price ascending") {
				echo '<option name="price_sort" value="price descending">price descending</option>';
			} else {
				echo '<option name="price_sort" value="price descending" selected>price descending</option>';
			}
			echo '</select>';
			echo '</div>';
			echo '</td>';
		}
		echo '</tr>';
		echo '</table>';
		echo '</div>';
		
		echo '<div class="results-col">';
		
	    while ($car = mysqli_fetch_array($result)) {   //$car['car_category'];

		  $car_id		       = $car['id'];
		  $car_name 	       = $car['name'];
		  $car_category 	   = $car['car_category'];
		  $car_description     = $car['description'];
		  $car_location 	   = $car['car_location'];
		  $car_price 		   = $car['price'];
		  $car_pic_path        = $car['pic_path'];
		  
		  //car characteristics
		  $char_query = "SELECT * FROM car_characteristics WHERE car_id = '{$car_id}'";
		  $char_result = mysqli_query($con, $char_query);
		  $char = mysqli_fetch_array($char_result);
		  
		  $air_con 		= $char['air_con'];
		  $cccar 		= $char['cc'];
		  $airbags 		= $char['airbags'];
		  $cccar 		= $char['cc'];
		  $passengers 	= $char['passengers'];
		  $doors 		= $char['doors'];
		  $radio 		= $char['radio'];
		  
          
		  echo <<<EOD
           <div class="car_result_restricted">
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

		echo '</div>';
	  
	  }	 else {
	  		echo '<div class="results-col">';
			echo '<h4 id="reults_count" style="color:red">No cars found. Please repeat your search.</h4>';
			echo '<div class="car_result_restricted"/></div>';
	  }

	echo '<div class="calendar-module-2 col-xs-12 col-s-12 col-md-5 col-lg-5" style="padding-top:12px;padding-bottom:10px;">';
	echo '<center>';
	echo '<label style="margin-right:8px;">cars per page:</label>';
	echo '<label id="show_cap" style="color:blue;margin-right:12px;">20</label>';
	echo '<input id="per_page" type="range" min="10" value="20" max="100" step="10" onchange="set_page_cap(this)">';
	echo '</center>';
	echo '</div>';
	?>
	</div>  <!-- / row -->
        
	    
		
	<!-- </div> <!-- / jumbotron-->

    </div> <!-- /container -->

 <?php
  
  $jqScript = <<<EOD
  <script>  
	$(function(){
  	$('#datepicker1').datepicker({minDate:0, dateFormat: "dd/mm/yy",
  	
       onSelect: function() {
          var date = $(this).datepicker('getDate');
          if (date){
            date.setDate(date.getDate() + 1);
            $( "#datepicker2" ).datepicker( "option", "minDate", date );
           }
        }  	
  	}); 

	$('#datepicker2').datepicker({ dateFormat: "dd/mm/yy"});
    });
  </script>
 
 <script>
  $('#timepicker1, #timepicker2').timepicker();
  </script>
  
  <script>
    function dateFields(){
	  var pickUpDate = document.getElementById("datepicker1").value;
	  var dropOffDate = document.getElementById("datepicker2").value;
	  
	  if (pickUpDate === "") {
	    datepicker1.setAttribute("placeholder", "This field is required!");
		datepicker1.focus();
		datepicker1.style.background = "#FFEBEB";
		return false;
	  }
	  
	  if (dropOffDate === "") {
	    datepicker2.setAttribute("placeholder", "This field is required!");
		datepicker2.focus();
		datepicker2.style.background = "#FFEBEB";
		return false;
	  }
	} // end dateFields
  </script>
  
  
EOD;
    
  // Requires the footer (JS declarations) part of the page 
  display_footer($jqScript);

?>

<script type="text/javascript">
	document.getElementById('pickup_location').value = "<?php echo $_REQUEST['pickup_location'];?>";
	document.getElementById('dropoff_location').value = "<?php echo $_REQUEST['dropoff_location'];?>";
	document.getElementById('car-category').value = "<?php echo $_REQUEST['category'];?>";
	document.getElementById('datepicker1').value = "<?php echo $_REQUEST['pickup_date'];?>";
	document.getElementById('datepicker2').value = "<?php echo $_REQUEST['dropoff_date'];?>";
	document.getElementById('timepicker1').value = "<?php echo $_REQUEST['pickup_time'];?>";
	document.getElementById('timepicker2').value = "<?php echo $_REQUEST['dropoff_time'];?>";
	document.getElementById('hidden').value = "<?php echo $_REQUEST['hidden'];?>";
</script>

<script>
	function set_sorting(elem) {
		document.getElementById('hidden').value = elem.value;
		document.getElementById('search_frm').submit();
	}
	function set_page_cap(elem) {
		document.getElementById('show_cap').innerHTML = elem.value;
	}
</script>