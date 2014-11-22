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
           <p style="font-size:15px;">Dear Clients,</p>
	   <p style="font-size:15px;">Welcome to Thessaloniki Car Rentals, a highly specialized car rental company based in Thessaloniki, Greece.</p>
           <p style="font-size:15px;">We offer you a wide variety of brand new and safe vehicles at the best prices in the market.<br>You can find Thessaloniki Car Rentals branches at the biggest cities throughout Greece,<br> including Athens, Thessaloniki, Chania, Larissa, Alexandroupoli and more. </p>	
	   <p style="font-size:15px;">Our main priority is your complete satisfaction,<br>so we provide you with the highest quality service possible, making your stay unforgetable!</p>
           <p style="font-size:15px;">The Thessaloniki Car Rentals Team</p> 
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