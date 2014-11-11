<?php
  
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
       
	  <div class="calendar-module">  
		<form role="form" action="car_results.php">
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
            <input type="text" class="form-control" id="datepicker1">
		  </div> <!--end pickup date-->
		  <div class="form-group pickdrop_time">  <!--start pickup time--> 
            <label>Pickup Time</label>		  
			<input type="text" class="form-control" id="timepicker1">
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
            <input type="text" class="form-control" id="datepicker2">
		  </div> <!--end dropoff date-->
		  <div class="form-group pickdrop_time">  <!--start dropoff time--> 
            <label>Drop Off Time</label>		  
			<input type="text" class="form-control" id="timepicker2">
		  </div> <!--end dropoff time-->
		  <div class="form-group car-category"> <!--start drop-off location-->
		     <label>Category</label>
             <select class="form-control" id="car-category">
               <option value="">ANY</option>
               <option value="">CITY CAR</option>
               <option value="">STATION WAGON</option>
               <option value="">SUV</option>
             </select>
		    </div> <!--end dropoff location-->
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
