<?php


  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "about";
  display_navbar($tag);

?>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="container"> 
	  
	 <div class="jumbotron">
      <div class="row"> 
	   <p style="font-size:15px; text-align:center;">We are a group of local Greek Car Rental Companies. All of our members are  registered with the Greek Tourism Organization and comply with <br>
	   current regulations. All our members have been operating successfully in the Greek market , either under their own logo or as franchisees of major <br>
	   international firms, for many years now and have joined forces to reach new clientele through internet.</p> 
       
       <p style="font-size:15px; text-align:center;">We simply want to give you a clean, safe, reliable car coupled with a personal touch and a friendly smile.</p>	   
		
	   <p style="font-size:15px; text-align:center;">We hope to be able to provide you with our service during your stay in Greece making your stay unforgetable!</p> 
        <div style="display:table; margin: 0 auto;">
	     <img src="images/char-icons/keychain.png" class="img-responsive" alt="Responsive image" style="width:200px;">
        </div>	   
      </div>
     </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
    
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>