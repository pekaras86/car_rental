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

    if (!isset($_REQUEST['pass_sel_page'])) {
	  $pagenum = 1;
      echo "<script type='text/javascript'>alert('$pagenum');</script>";
  } else {
	  $pagenum = $_REQUEST['pass_sel_page'];
  }

  if (!empty($_REQUEST['price_sort'])) {
	  $srt = $_REQUEST['price_sort'];
  } else {
	  $srt = "price ascending";
  }

  if($srt == 'price descending') {
	  $order_by = "DESC";
  } else {
	  $order_by = "ASC";
  }

  if (!empty($_REQUEST['pass_cap'])) {
	  $cars_per_page = $_REQUEST['pass_cap'];
	  if ($cars_per_page < 0) {$cars_per_page = 1;} elseif ($cars_per_page > 5) {$cars_per_page = 5;}
  } else {
	  $cars_per_page = 5;
  }

  $result = getAllCars($con, $order_by);
  $num_rows = mysqli_num_rows($result);
  $last = ceil($num_rows/$cars_per_page); //# of the last page

  if ($pagenum < 1) {
	  $pagenum = 1; 
  } elseif ($pagenum > $last) {
	  $pagenum = $last; 
  } 

  $max = 'limit ' .($pagenum - 1) * $cars_per_page .',' .$cars_per_page;
  $result = getAllCars($con, $order_by, $max);

  echo <<<EOD

    <!-- Main component for a primary marketing message or call to action -->
    <div class="container" style="margin-bottom:20px;"> 
	    <div class="results-bar-2">
			<table>
				<tr>
					<td align="left" valign="top" style="white-space:nowrap;">
						<h2 style="margin-left:30px; margin-top:10px; margin-right:60px;"> Our Fleet </h2>
					</td>
					<td style="white-space:nowrap;">
						<div id="paging_selector" style="margin-right:60px;">
							<label style="margin-right:8px; margin-bottom: 0px;">cars per page:</label>
							<input id="per_page" type="number" min="1" value=$cars_per_page max="5" style="color: blue; font-weight: bold; text-align: center; border: 0px; width: 40px;" onchange="set_page_cap(this)">
							<label style="margin-bottom: 0px; cursor:pointer; color: blue;" onclick="set_sorting()">ok</label>
						</div>
					</td>
					<td style="white-space:nowrap;">
						<div class="page-div">
EOD;
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

                        echo <<<EOD
						<!--<span class="page active">first</span>
							<a href="#" class="page">2</a>
							<a href="#" class="page">3</a>
							<a href="#" class="page">4</a>
							<a href="#" class="page">last</a> -->
						</div>
					</td>
					<td align="right" width="99%">
						<div>
							<form id="srt_frm" action="car_types.php" method="POST">
								<input type="hidden" id="pass_cap" name="pass_cap" value=$cars_per_page>
								<input type="hidden" id="pass_sel_page" name="pass_sel_page" value=$pagenum>
								<label style="margin-right:8px;margin-bottom:0px;">sort:</label>
								<select name="price_sort" style="float:right;margin-right:30px;" onchange="set_sorting()">
								<option name="price_sort" value="price ascending">price ascending</option>
EOD;
									if($srt=="price ascending") {
										echo '<option name="price_sort" value="price descending">price descending</option>';
									} else {
										echo '<option name="price_sort" value="price descending" selected>price descending</option>';
									}
								echo <<<EOD
								</select>
							</form>
						</div>
					</td>
				</tr>
			</table>
		</div>
EOD;

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
	function set_sorting() {
		document.getElementById('srt_frm').submit();
	}
	function set_page_cap(elem) {
		document.getElementById('pass_cap').value = elem.value;
	}
	function navigate(elem) {
		document.getElementById('pass_sel_page').value = elem;
		document.getElementById('srt_frm').submit();	
	}
</script>