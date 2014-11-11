<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");

// Requires the navbar
$tag = "carStations";
display_navbar($tag);


?>


    <div class="container">

    <div class="jumbotron"> 
      <h2> Car stations </h2>

        <iframe  src="https://mapsengine.google.com/map/embed?mid=zMkCKgEPr2rU.kWx_lXDFFNY0" width="640" height="480"></iframe>


    </div>





<?php
  
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>