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
	  
	    <div class="contsite">
	      <span><p>Order Summary:</p></span>
		  <span>Rental Toyota Aygo (ATH) for 8 Days</span>
		  <p></p>
		  <div class="fromto">
			<span>From <strong>20/11/2014 00:00</strong><br>
			<span>To <strong> 22/11/2014 00:00</strong></span>
		  </div>
		  <div class="pikdrod">
		    
		  </div>
		  
        </div>
	    
            
	  
	  
	  
	    
		
		
	  
	  
	  
	  
	  
	  
	  
		
      
      </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
    
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
