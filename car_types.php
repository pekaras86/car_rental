<?php
  
  require_once ('scripts/database_connection.php');
  require_once ('admin_panel/db.php');
  require_once ('scripts/db_cars.php');
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "carTypes";
  display_navbar($tag);

?>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="container" style="margin-bottom:20px;"> 
	    <div class="results-bar-2">
			<table>
				<tr>
					<td align="left" valign="top" style="white-space:nowrap;">
						<h2 style="margin-left:30px; margin-top:10px; margin-right:60px;"> Our Fleet </h2>
					</td>
					<td style="white-space:nowrap;">
						<div class="page-div">
							<span class="page active">first</span>
								<a href="#" class="page">2</a>
								<a href="#" class="page">3</a>
								<a href="#" class="page">4</a>
								<a href="#" class="page">last</a>
						</div>
					</td>
					<td align="right" width="99%">
						<div>
							<label style="margin-right:8px;margin-bottom:0px;">sort:</label>
							<select name="price_sort" style="float:right;margin-right:30px;" onchange="set_sorting(this)">
								<option name="price_sort" value="price ascending">price ascending</option>
								<option name="price_sort" value="price descending">price descending</option>
							</select>
						</div>
					</td>
				</tr>
			</table>
		</div>

<?php
	$result = getAllCars($con, "ASC");
	
	while ($car = mysqli_fetch_array($result)) {
		$car_type_id = $car['id'];
		$car_type_id = $car['id'];
		$car_name = $car['name'];
		$car_category = $car['car_category'];
		$car_description = $car['description'];
		$car_location = $car['car_location'];
		$car_price = $car['price'];
		$car_pic_path = $car['pic_path'];
		$available_cars_quantity = $car['car_quantity'];

		$char_result = getCarCharacteristics($con, $car_type_id);
		$char = mysqli_fetch_array($char_result);

		$air_con = $char['air_con'];
		$cccar = $char['cc'];
		$airbags = $char['airbags'];
		$passengers = $char['passengers'];
		$doors = $char['doors'];
		$radio = $char['radio'];

		echo <<<EOD
		<div class="car_result">
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
											<span>{$available_cars_quantity} units available</span>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
EOD;
		 	    
	} //end while

?>
      
	</div> <!-- /container -->


<?php
    
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>

<script>
	function set_sorting(elem) {
		document.getElementById('hidden').value = elem.value;
		document.getElementById('search_frm').submit();
	}
	function set_page_cap(elem) {
		document.getElementById('show_cap').innerHTML = elem.value;
	}
</script>