<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");

  // Requires the navbar
  $tag = "terms";
  display_navbar($tag);


?>

   <div class="container">
    <div class="jumbotron"> 
      <h2> Terms & Conditions </h2>
      <ol>
      	<li>Drivers:</li>
        <ol type="a">
        	<li><b>driver's age:</b> drivers must be aged from 21 to 70.</li>
           	<li><b>driver's license:</b> the driver is required to display a valid Drivers' License issued at least a year before the pick-up date.</li>
        </ol>
      	<li>Minimum rental period:</li>
        The minimum rental period is 3 days.
        <li>Deliveries and collections:</li>
        Deliveries to or collections from airports or our stations are free from extra charge. Elsewhere, there will be an extra 25€ + VAT charge.
        <li>Cancellation policy:</li> To cancel your reservation you have to fill in the cancellation form, using your registration details. If you cancel your reservation 20 days before the pick-up date, 100% of the pre-paid amount will be refunded. Up to 10 days before, 50% and otherwise there will be no refund.
        <li>Additional services:</li>
        <ul>
        	<li><b>GPS:</b> the extra charge is 7€ per day. Maximum charge is 49€. Available upon request.</li>
            <li><b>snow chains:</b> the extra charge is 5€ per day. Maximum charge is 35€. Available upon request.</li>
            <li><b>child seat:</b> the extra charge is 4€ per day. Maximum charge is 28€. Available upon request.</li>
            <li><b>roof rack:</b> the extra charge is 5€ per day. Maximum charge is 35€. Available upon request.</li>
        </ul>
        <li>Petrol policy:</li>
        Cars will be delivered with a full tank and are to be returned empty. No refunds will be issued for vehicles returned with fuel. Petrol costs will be paid by the renter.
        <li> Highway Code violations:</li>
        Fines issued due to highway code violations during the rental period are at the expense of the renter.
        <li>Accident:</li>
        In case of an accident the renter is obliged to inform the company as well as the police.
      </ol>
    </div>
   </div>





<?php
  
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>