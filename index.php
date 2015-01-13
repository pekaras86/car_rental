<?php
  
  require_once ('scripts/views.php');
  require_once ('scripts/database_connection.php');
  require_once ('admin_panel/db.php');


setcookie('dropoff_location', '', time()-(365*24*60*60));
setcookie('dropoff_date', '', time()-(365*24*60*60));
setcookie('dropoff_location', '', time()-(365*24*60*60));
setcookie('car_id', '', time()-(365*24*60*60));
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "home";
  display_navbar($tag);


  if(isset($_REQUEST['success_message'])) {
    echo <<<EOD
	<script>
	alert('Your request has been sent.');
	</script>
EOD;
  }
  
?>
    
	
  
	 <!-- Main component for a primary marketing message or call to action -->
	 <div class="container" style="margin-left:20px; margin-right:20px;"> 
	  
	  <div class="row" style="margin-bottom:20px; width: 1200px;">
	  <div id="srch-mod" class="calendar-module">  
		<form role="form" action="car_results.php" method="POST">
		   <input type="hidden" id="hidden" name="hidden" value="price ascending">
		   <div class="form-group pickdrop_lock"> <!--start pickup location-->
		     <label>Pickup Location</label>
             <select class="form-control" id="pickup_location" name="pickup_location">
                 <?php
                 $result = getCarLocations($con);
                 //mysqli_query($con,"SELECT id,name FROM car_locations");
                 while($row = mysqli_fetch_array($result)) {
                     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; //populate pickup locations
                 }
                 ?>
               <!-- <option name="pickup_location" value="ATHENS AIRPORT">ATHENS AIRPORT</option>
               <option name="pickup_location" value="THESSALONIKI AIRPORT">THESSALONIKI AIRPORT</option>
               <option name="pickup_location" value="VOLOS">VOLOS</option>
               <option name="pickup_location" value="ALEKSANDROUPOLI">ALEKSANDROUPOLI</option>
			   <option name="pickup_location" value="CHANIA">CHANIA</option> -->
             </select>
		    </div> <!--end pickup location-->
			<div id="pUp">
		  <div class="form-group pickdrop_date" id="pickup_field">  <!--start pickup date-->
		    <label>Pickup Date</label>
            <input type="text" class="form-control date" id="datepicker1" name="pickup_date" placeholder="Pickup Date">
		  </div> <!--end pickup date-->
		  <div class="form-group pickdrop_time">  <!--start pickup time--> 
            <label>Pickup Time</label>		  
			<input type="text" class="form-control" id="timepicker1" name="pickup_time">
		  </div> <!--end pickup time-->
		  </div>
		  <div class="form-group pickdrop_lock"> <!--start drop-off location-->
		     <label>Drop Off Location</label>
             <select class="form-control" id="dropoff_location" name="dropoff_location">
                 <?php
                 $result = getCarLocations($con);
                 //mysqli_query($con,"SELECT id,name FROM car_locations");
                 while($row = mysqli_fetch_array($result)) {
				    $cname = $row['name'];
                     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; //populate dropoff locations
                 }
                 ?>
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
                 <?php
                 $result = getCarCategories($con);
                 while($row = mysqli_fetch_array($result)) {
                     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; //populate categories
                 }
                 ?>
               <!-- <option name="category" value="City Car">CITY CAR</option>
               <option name="category" value="Station Wagon">STATION WAGON</option>
               <option name="category" value="Suv">SUV</option> -->
             </select>
		    </div> <!--end dropoff location-->
		  <div class="form-group search_mod_button">        
            <button type="submit" class="btn btn-default btn-info search-module" onClick="return dateFields();">SEARCH</button>
          </div>
		</form>
	  </div>
		<div id="wowslider-container1">
			<div class="ws_images"><ul>
				<li><img src="data1/images/one.jpg" alt="OPEL Zafira" title="OPEL Zafira" id="wows1_0"/></li>
				<li><img src="data1/images/14176954682014_toyota_highlander_hybridpic985906573636546719.jpeg.jpg" alt="TOYOTA Highlander" title="TOYOTA Highlander" id="wows1_1"/>Book now Toyota Highlander
				and save 10%</li>
				<li><img src="data1/images/suzukigrandvitara.jpg" alt="SUZUKI Grand Vitara" title="SUZUKI Grand Vitara" id="wows1_2"/></li>
				<li><img src="data1/images/skodafabia.jpg" alt="SKODA Fabia" title="SKODA Fabia" id="wows1_3"/></li>
				<li><img src="data1/images/14176953892014chevroletcruzemodeloverviewecocntwell1648x31602.jpg" alt="CHEVROLET Cruze" title="CHEVROLET Cruze" id="wows1_4"/></li>
			</ul></div>
			<div class="ws_bullets"><div>
				<a href="#" title="OPEL Zafira"><img src="data1/tooltips/one.jpg" alt="OPEL Zafira"/>1</a>
				<a href="#" title="TOYOTA Highlander"><img src="data1/tooltips/14176954682014_toyota_highlander_hybridpic985906573636546719.jpeg.jpg" alt="TOYOTA Highlander"/>2</a>
				<a href="#" title="SUZUKI Grand Vitara"><img src="data1/tooltips/suzukigrandvitara.jpg" alt="SUZUKI Grand Vitara"/>3</a>
				<a href="#" title="SKODA Fabia"><img src="data1/tooltips/skodafabia.jpg" alt="SKODA Fabia"/>4</a>
				<a href="#" title="CHEVROLET Cruze"><img src="data1/tooltips/14176953892014chevroletcruzemodeloverviewecocntwell1648x31602.jpg" alt="CHEVROLET Cruze"/>5</a>
			</div></div><span class="wsl"><a href="http://wowslider.com/vu">image carousel</a> by WOWSlider.com v7.4</span>
			<div class="ws_shadow"></div>
		</div>	

	 </div>
	</div> <!-- /container -->


<div class="section" style="background-color:#B6B6B6;">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div id="main">
                    <div class="features-block block" style="margin-top:0px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    <div class="page-header-inner">
                                        <div class="heading">
                                            <h2>Why Choose Us?</h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div><!-- /.page-header -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="feature">
                                <div class="col-xs-12 col-md-4 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-5">
                                            <div class="feature-icon">
                                                <div class="feature-icon-inverse">
                                                    <i class="icon-outline-car"></i>
                                                </div><!-- /.feature-icon-inverse -->

                                                <div class="feature-icon-normal">
                                                    <i class="icon-normal-car"></i>
                                                </div><!-- /.feature-icon-normal -->
                                            </div><!-- /.feature-icon -->
                                        </div><!-- /.col-md-5 -->

                                        <div class="col-xs-12 col-md-7">
                                            <h3>Wide Selection</h3>
                                            <p></p>
                                        </div><!-- /.col-md-7 -->
                                    </div><!-- /.row -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.feature -->

                            <div class="feature">
                                <div class="col-xs-12 col-md-4 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-5">
                                            <div class="feature-icon">
                                                <div class="feature-icon-inverse">
                                                    <i class="icon-outline-currency-euro"></i>
                                                </div><!-- /.feature-icon-inverse -->

                                                <div class="feature-icon-normal">
                                                    <i class="icon-normal-currency-euro"></i>
                                                </div><!-- /.feature-icon-normal -->
                                            </div><!-- /.feature-icon -->
                                        </div><!-- /.col-md-5 -->

                                        <div class="col-xs-12 col-md-7">
                                            <h3>Great Prices</h3>
                                            <p></p>
                                        </div><!-- /.col-md-7 -->
                                    </div><!-- /.row -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.feature -->

                            <div class="feature">
                                <div class="col-xs-12 col-md-4 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-5">
                                            <div class="feature-icon">
                                                <div class="feature-icon-inverse">
                                                    <i class="icon-outline-car-door"></i>
                                                </div><!-- /.feature-icon-inverse -->

                                                <div class="feature-icon-normal">
                                                    <i class="icon-normal-car-door"></i>
                                                </div><!-- /.feature-icon-normal -->
                                            </div><!-- /.feature-icon -->
                                        </div><!-- /.col-md-5 -->

                                        <div class="col-xs-12 col-md-7">
                                            <h3>24/7 Hotline</h3>
                                            <p></p>
                                        </div><!-- /.col-md-7 -->
                                    </div><!-- /.row -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.feature -->
                        </div><!-- /.row -->
                    </div><!-- /.block -->
                </div><!-- /#main -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.section -->


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
