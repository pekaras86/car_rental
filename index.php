<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "home";
  display_navbar($tag);


?>

  
	 <!-- Main component for a primary marketing message or call to action -->
	 <div class="container" style="margin-left:20px; margin-right:20px;"> 
	  <div>   
	  
	  <div class="row">
	  <div id="srch-mod" class="calendar-module">  
		<form role="form" action="car_results.php" method="POST">
		   <input type="hidden" id="hidden" name="hidden" value="price ascending">
		   <div class="form-group pickdrop_lock"> <!--start pickup location-->
		     <label class="white-label">Pickup Location</label>
             <select class="form-control" id="pickup_location" name="pickup_location">
               <option name="pickup_location" value="ATHENS AIRPORT">ATHENS AIRPORT</option>
               <option name="pickup_location" value="THESSALONIKI AIRPORT">THESSALONIKI AIRPORT</option>
               <option name="pickup_location" value="VOLOS">VOLOS</option>
               <option name="pickup_location" value="ALEKSANDROUPOLI">ALEKSANDROUPOLI</option>
			   <option name="pickup_location" value="CHANIA">CHANIA</option>
             </select>
		    </div> <!--end pickup location-->
			<div id="pUp">
		  <div class="form-group pickdrop_date" id="pickup_field">  <!--start pickup date-->
		    <label class="white-label">Pickup Date</label>
            <input type="text" class="form-control date" id="datepicker1" name="pickup_date" placeholder="Pickup Date">
		  </div> <!--end pickup date-->
		  <div class="form-group pickdrop_time">  <!--start pickup time--> 
            <label class="white-label">Pickup Time</label>		  
			<input type="text" class="form-control" id="timepicker1" name="pickup_time">
		  </div> <!--end pickup time-->
		  </div>
		  <div class="form-group pickdrop_lock"> <!--start drop-off location-->
		     <label class="white-label">Drop Off Location</label>
             <select class="form-control" id="dropoff_location" name="dropoff_location">
               <option name="dropoff_location" value="ATHENS AIRPORT">ATHENS AIRPORT</option>
               <option name="dropoff_location" value="THESSALONIKI AIRPORT">THESSALONIKI AIRPORT</option>
               <option name="dropoff_location" value="VOLOS">VOLOS</option>
               <option name="dropoff_location" value="ALEKSANDROUPOLI">ALEKSANDROUPOLI</option>
			   <option name="dropoff_location" value="CHANIA">CHANIA</option>
             </select>
		    </div> <!--end dropoff location-->
			<div class="form-group pickdrop_date">  <!--start dropoff date-->
		    <label class="white-label">Drop Off Date</label>
            <input type="text" class="form-control date" id="datepicker2" name="dropoff_date" placeholder="Drop Off Date">
		  </div> <!--end dropoff date-->
		  <div class="form-group pickdrop_time">  <!--start dropoff time--> 
            <label class="white-label">Drop Off Time</label>		  
			<input type="text" class="form-control" id="timepicker2" name="dropoff_time">
		  </div> <!--end dropoff time-->
		  <div class="form-group car-category"> <!--start drop-off location-->
		     <label class="white-label">Category</label>
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
	  <div class="front-page-cars hidden-xs hidden-sm " id="front-slideshow">
		     <div>
	           <img class="img-responsive" src="images/Audi_R8.png" alt="Responsive image" height="" width="500">
             </div>
             <div>
	           <img class="img-responsive" src="images/Honda-V6.png" alt="Responsive image" height="" width="500">
             </div>
             <div>
	           <img class="img-responsive" src="images/montero.png" alt="Responsive image" height="" width="500">
             </div>			 
       </div>
	  </div>
		 
		 
	 </div>
   </div> <!-- /container -->


<div class="section gray-light">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div id="main">
                    <div class="features-block block">
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
                                            <h3>Great Prices</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed neque dolor, placerat mattis justo id, convallis porta nulla</p>
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
                                                    <i class="icon-outline-currency-dollar"></i>
                                                </div><!-- /.feature-icon-inverse -->

                                                <div class="feature-icon-normal">
                                                    <i class="icon-normal-currency-dollar"></i>
                                                </div><!-- /.feature-icon-normal -->
                                            </div><!-- /.feature-icon -->
                                        </div><!-- /.col-md-5 -->

                                        <div class="col-xs-12 col-md-7">
                                            <h3>Wide Selection</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed neque dolor, placerat mattis justo id, convallis porta nulla</p>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed neque dolor, placerat mattis justo id, convallis porta nulla</p>
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
  $("#front-slideshow > div:gt(0)").hide();

  setInterval(function() { 
    $('#front-slideshow > div:first')
      .fadeOut(1000)
      .next()
      .fadeIn(1000)
      .end()
      .appendTo('#front-slideshow');
  },  3000);
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
