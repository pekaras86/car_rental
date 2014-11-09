<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");


?>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="front_page.php">Thessaloniki Car Rentals</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="front_page.php">Home</a></li>
			  <li><a href="about_us.php">About Us</a></li>
			  <li><a href="car_types.php">Car Types</a></li>
			  <li><a href="car_stations.php">Car Stations</a></li>
			  <li><a href="terms_conditions.php">Terms & Conditions</a></li>
			  <li><a href="contuct_us.php">Contuct Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="log_in_form.php">Log in</a></li>
              <li><a href="sign_up_form.php">Sign up</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    </div> <!-- /container -->
	  
	  
	 
	 <!-- Main component for a primary marketing message or call to action -->
	 <div class="container"> 
	  
	  <div class="jumbotron">
       
	  <div class="calendar-module">  
		<form role="form">
		   <div class="form-group pickdrop_lock"> <!--start pickup location-->
		     <label>Pickup Location</label>
             <select class="form-control" id="pickup_location">
               <option value="">ATHENS AIRPORT</option>
               <option value="">THESSALONIKI AIRPORT</option>
               <option value="">VOLOS</option>
               <option value="">ALEKSANDROUPOLI</option>
			   <option value="">CHANIA</option>
             </select>
		    </div> <!--end pickup location-->
		  <div class="form-group pickdrop_date">  <!--start pickup date-->
		    <label>Pickup Date</label>
            <input type="date" class="form-control" id="datepicker1">
		  </div> <!--end pickup date-->
		  <div class="form-group pickdrop_time">  <!--start pickup time--> 
            <label>Pickup Time</label>		  
			<input type="time" class="form-control" id="timepicker1">
		  </div> <!--end pickup time-->
		  <div class="form-group pickdrop_lock"> <!--start drop-off location-->
		     <label>Drop Off Location</label>
             <select class="form-control" id="dropoff_location">
               <option value="">ATHENS AIRPORT</option>
               <option value="">THESSALONIKI AIRPORT</option>
               <option value="">VOLOS</option>
               <option value="">ALEKSANDROUPOLI</option>
			   <option value="">CHANIA</option>
             </select>
		    </div> <!--end dropoff location-->
			<div class="form-group pickdrop_date">  <!--start dropoff date-->
		    <label>Drop Off Date</label>
            <input type="date" class="form-control" id="datepicker2">
		  </div> <!--end dropoff date-->
		  <div class="form-group pickdrop_time">  <!--start dropoff time--> 
            <label>Drop Off Time</label>		  
			<input type="time" class="form-control" id="timepicker2">
		  </div> <!--end dropoff time-->
		  <div class="form-group search_mod_button">        
            <button type="submit" class="btn btn-default btn-info search-module">SEARCH</button>
          </div>
		</form>
	  </div>
		
		
		
		   <div class="front-page-cars" id="front-slideshow">
		     <div>
	           <img src="images/Audi_R8.png" alt="" height="" width="500">
             </div>
             <div>
	           <img src="images/Honda-V6.png" alt="" height="" width="500">
             </div>
             <div>
	           <img src="images/montero.png" alt="" height="" width="500">
             </div>			 
          </div>
		 
		 
		    
			

		 
		 
		 
		 
		 
      </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
  
  $jqScript = <<<EOD
  <script>  
   $(function() {
    $( "#datepicker1, #datepicker2" ).datepicker();
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
  
  
EOD;
   
  // Requires the footer (JS declarations) part of the page 
  display_footer($jqScript);

?>
