<?php
  
  //ean mpei o xristis se afti ti selida xwris na exei epileksei amaksi 
  //anakatefthine ton stin kentriki
  if (!isset($_POST['category']))
  {
    header("Location: index.php");
    exit();
  }
  
  require_once ('scripts/database_connection.php');
  require_once ('admin_panel/db.php');
  require_once ('scripts/db_cars.php');
  require_once ('scripts/views.php');



  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");

  // ta setcookie ginontai nwris giati alliws emfanizei sfalma "Headers already sent"
	setcookie('dropoff_location', $_POST['dropoff_location']);
	setcookie('pickup_date', $_POST['pickup_date']);
	setcookie('dropoff_date', $_POST['dropoff_date']);
	setcookie('car_id', '', time()-(365*24*60*60));

  // Requires the navbar
  $tag = "home";
  display_navbar($tag);

      if (!isset($_POST['pass_sel_page'])) {
	  $pagenum = 1;
  } else {
	  $pagenum = $_POST['pass_sel_page'];
  }

  if (!empty($_POST['hidden'])) {
	  $srt = $_POST['hidden'];
  } else {
	  $srt = "price ascending";
  }

  if($srt == 'price descending') {
	  $order_by = "DESC";
  } else {
	  $order_by = "ASC";
  }

  if (!empty($_POST['pass_cap'])) {
	  $cars_per_page = $_POST['pass_cap'];
	  if ($cars_per_page < 2) {$cars_per_page = 2;} elseif ($cars_per_page > 5) {$cars_per_page = 5;}
  } else {
	  $cars_per_page = 5;
  }

	  echo <<<EOD
		<!-- Main component for a primary marketing message or call to action -->
		<div class="container" style="margin-bottom:20px;">
		<div class="row no-side-margins">


		<table style="float: left; width:28%">
		<tr>
		<td>
	  	<div class="calendar-module-2 col-xs-12 col-s-12 col-md-5 col-lg-5">
		<form id="search_frm" role="form" action="car_results.php" method="POST">
		   <input type="hidden" id="hidden" name="hidden" value=$srt>
		   <input type="hidden" id="pass_sel_page" name="pass_sel_page" value=$pagenum>
		   <input type="hidden" id="pass_cap" name="pass_cap" value=$cars_per_page>
		   <div class="form-group pickdrop_lock"> <!--start pickup location-->
		     <label>Pickup Location</label>
		     <select class="form-control" id="pickup_location" name="pickup_location">
EOD;
          $result = getCarLocations($con);
          //mysqli_query($con,"SELECT id,name FROM car_locations");
          while($row = mysqli_fetch_array($result)) {
          echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; //populate pickup locations
          }

	  echo <<<EOD
               <!--<option name="pickup_location" value="ATHENS AIRPORT">ATHENS AIRPORT</option>
               <option name="pickup_location" value="THESSALONIKI AIRPORT">THESSALONIKI AIRPORT</option>
               <option name="pickup_location" value="VOLOS">VOLOS</option>
               <option name="pickup_location" value="ALEKSANDROUPOLI">ALEKSANDROUPOLI</option>
			   <option name="pickup_location" value="CHANIA">CHANIA</option> -->
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
EOD;
			  $result = getCarLocations($con);
			  while($row = mysqli_fetch_array($result)) {
				  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; //populate dropoff locations
			  }
	  echo <<<EOD
               <!-- <option name="dropoff_location" value="ATHENS AIRPORT">ATHENS AIRPORT</option>
               <option name="dropoff_location" value="THESSALONIKI AIRPORT">THESSALONIKI AIRPORT</option>
               <option name="dropoff_location" value="VOLOS">VOLOS</option>
               <option name="dropoff_location" value="ALEKSANDROUPOLI">ALEKSANDROUPOLI</option>
			   <option name="dropoff_location" value="CHANIA">CHANIA</option> -->
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
               <option name="category" value="Any">Any</option>
EOD;
                 $result = getCarCategories($con);
                 while($row = mysqli_fetch_array($result)) {
                     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; //populate categories
                 }
			echo <<<EOD
               <!-- <option name="category" value="City Car">CITY CAR</option>
               <option name="category" value="Station Wagon">STATION WAGON</option>
               <option name="category" value="Suv">SUV</option> -->
             </select>
		    </div> <!--end dropoff location-->
		  <div class="form-group search_mod_button">        
            <button type="submit" class="btn btn-default btn-info search-module" onClick="return dateFields();">SEARCH</button>
          </div>
		</form>
	  </div> <!--calendar module-->
	  </td>
	  </tr>
	  <tr>
	  <td>

	<div id="paging_selector" class="calendar-module-2 col-xs-12 col-s-12 col-md-5 col-lg-5" style="padding-top:12px;padding-bottom:10px;">
	<label style="margin-right:8px;">cars per page:</label>
	<label id="show_cap" style="color:blue;margin-right:12px;">$cars_per_page</label>
	<input id="per_page" type="range" min="2" value=$cars_per_page max="5" onchange="set_page_cap(this)">
	<label style="margin-bottom: 0px; margin-left:4px; cursor:pointer; color: blue;" onclick="change_cap()">ok</label>
	</div>
	</td>
	</tr>
	</table>

EOD;


	  // pianei ta stoixeia apo ti forma	   
	  $category = $_POST['category'];
	  $pickup_location = $_POST['pickup_location'];
	  $dropoff_location = $_POST['dropoff_location'];
	  $pickup_date = $_POST['pickup_date'];
	  $dropoff_date = $_POST['dropoff_date'];

	  // dimiourgia query anazitisis sti vasi

	   // run the query
  $result = getAvailableCarTypes($con, $pickup_location, $pickup_date, $dropoff_date, $category, $order_by);
    	  
	  //emfanise ola ta amaksia
	  
  $num_rows = mysqli_num_rows($result);

  $last = ceil($num_rows/$cars_per_page); //# of the last page

  if ($pagenum < 1) {
	  $pagenum = 1; 
  } elseif ($pagenum > $last) {
	  $pagenum = $last; 
  } 

  $max = 'limit ' .($pagenum - 1) * $cars_per_page .',' .$cars_per_page;
  $result = getAvailableCarTypes($con, $pickup_location, $pickup_date, $dropoff_date, $category, $order_by, $max); // run the query again for pagination

	  if($num_rows>0) {
		echo '<div class="results-bar">';
		echo '<table>';
		echo '<tr>';
		echo '<td align="left" valign="top" style="white-space:nowrap;">';

	    if($num_rows==1) {
			echo '<h4 id="results_count" style="color:blue;margin-left: 10px; font-weight:bold;">Results: 1 car found</h4>';
			echo '</td>';
			echo '<style type="text/css">
					#paging_selector {
						display:none;
					}
				  </style>';
		} else {
			echo '<h4 id="reults_count" style="color:blue;margin-left: 10px;margin-right:60px; font-weight:bold;">Results: ' . $num_rows . ' cars found</h4>';
			echo '</td>';
			echo '<td style="white-space:nowrap;">';
			echo '<div class="page-div">';

			if($cars_per_page < $num_rows) {
				if ($pagenum == 1) {
					echo "<span class='page active'>first</span>";
					for ($i = 2; $i <= min($last - 1, 4); $i++) {
						echo "<span class='page' onclick='navigate($i)'>$i</span>";
					}
					echo "<span class='page' onclick='navigate($last)'>last</span>";
				} elseif ($pagenum == $last) {
					echo "<span class='page' onclick='navigate(1)'>first</span>";
					for ($i = 2; $i <= min($last - 1, 4); $i++) {
						echo "<span class='page' onclick='navigate($i)'>$i</span>";
					}
					echo "<span class='page active'>last</span>";
				} else {
					echo "<span class='page' onclick='navigate(1)'>first</span>";
					if ($pagenum == 2) {
						echo "<span class='page active'>2</span>";
						for ($i = 3; $i <= min($last - 1, 4); $i++) {
							echo "<span class='page' onclick='navigate($i)'>$i</span>";
						}
					} elseif ($pagenum == 3) {
						echo "<span class='page' onclick='navigate(2)'>2</span>";
						echo "<span class='page active'>3</span>";
						if ($last == 5) {
							echo "<span class='page' onclick='navigate(4)'>4</span>";
						}
					} elseif ($pagenum == 4) {
						echo "<span class='page' onclick='navigate(2)'>2</span>";
						echo "<span class='page' onclick='navigate(3)'>3</span>";
						echo "<span class='page active'>4</span>";
					}
					echo "<span class='page' onclick='navigate($last)'>last</span>";
				}
			}

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

		  $car_type_id		   = $car['id'];
		  $car_name 	       = $car['name'];
		  $car_category 	   = $car['car_category'];
		  $car_description     = $car['description'];
		  $car_location 	   = $car['car_location'];
		  $car_price 		   = $car['price'];
		  $car_pic_path        = $car['pic_path'];
		  $available_cars_quantity = $car['car_quantity'];
		  
		  //car characteristics
		  $char_result = getCarCharacteristics($con, $car_type_id);
		  $char = mysqli_fetch_array($char_result);
		  
		  $air_con 		= $char['air_con'];
		  $cccar 		= $char['cc'];
		  $airbags 		= $char['airbags'];
		  $passengers 	= $char['passengers'];
		  $doors 		= $char['doors'];
		  $radio 		= $char['radio'];
		  
          
		  echo <<<EOD
           <div class="car_result_restricted">
	        <form method="post" action="book_now.php?car_id={$car_type_id}&pickup_location={$pickup_location}">
		      <table class="car_result_table">
		        <tbody>
			      <tr>
			        <td align="left" width="130px" valign="top"> <!--car icon and price-->
				      <img class="imgresult" src="{$car_pic_path}" alt="" height="" width="">
				      <div class="car-result-price-div">
				        <span class="vrcstartfrom">Price/Day</span>
					    <span class="car_cost">{$car_price} &euro;</span>
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
EOD;
							if ($available_cars_quantity == 1) {
								echo '<span>1 unit available</span>';
							} else {
								echo '<span>' . $available_cars_quantity . ' units available</span>';
							}
				echo <<<EOD

						    </td>
					      </tr>
					      <tr>
					        <td>
						      <input type="submit" value="Continue" class="btn btn-default btn-info">
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
			echo '<div class="car_result_restricted"></div>';
			echo '</div>';
			echo '<style type="text/css">
					#paging_selector {
						display:none;
					}
				  </style>';
	  }


	?>
	</div>  <!-- / row -->
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
	  document.getElementById('pass_sel_page').value = 1;

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
	document.getElementById('pickup_location').value = "<?php echo $_POST['pickup_location'];?>";
	document.getElementById('dropoff_location').value = "<?php echo $_POST['dropoff_location'];?>";
	document.getElementById('car-category').value = "<?php echo $_POST['category'];?>";
	document.getElementById('datepicker1').value = "<?php echo $_POST['pickup_date'];?>";
	document.getElementById('datepicker2').value = "<?php echo $_POST['dropoff_date'];?>";
	document.getElementById('timepicker1').value = "<?php echo $_POST['pickup_time'];?>";
	document.getElementById('timepicker2').value = "<?php echo $_POST['dropoff_time'];?>";
	document.getElementById('hidden').value = "<?php echo $_POST['hidden'];?>";
</script>

<script>
	function set_sorting(elem) {
		document.getElementById('pass_sel_page').value = 1;
		document.getElementById('hidden').value = elem.value;
		document.getElementById('search_frm').submit();
	}
	function change_cap() {
		document.getElementById('pass_sel_page').value = 1;
		document.getElementById('search_frm').submit();
	}
	function set_page_cap(elem) {
		document.getElementById('pass_sel_page').value = 1;
		document.getElementById('show_cap').innerHTML = elem.value;
		document.getElementById('pass_cap').value = elem.value;
	}
	function navigate(elem) {
		document.getElementById('pass_sel_page').value = elem;
		document.getElementById('search_frm').submit();
	}
</script>