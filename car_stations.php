<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");

// Requires the navbar
$tag = "carStations";
display_navbar($tag);


?>


    <div class="container">

      <h2> Car stations </h2>


        <div id="map-container">
            <div id="dummy"></div>
            <div id="map-element">
                <iframe class="embed-responsive-item" src="https://mapsengine.google.com/map/embed?mid=zMkCKgEPr2rU.kWx_lXDFFNY0" width="100%" height="100%"></iframe>
            </div>

		</div>
    </div>




<?php
  
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>