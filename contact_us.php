<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "contactUs";
  display_navbar($tag);


?>

	<!-- Main component for a primary marketing message or call to action -->
	<div class="container">
		<div class="jumbotron">
			<h2> Contact us </h2>
			<div class="contact-form">
				<form action=".." method="POST" enctype="multipart/form-data">
					<label for="fname">first name: <span class="c-required" style="color:red;">*</span></label><br>
					<input class="c-input" name="fname" type="text" value="" size="30" /><br>
					<label for="lname">last name: <span class="c-required"  style="color:red;">*</span></label><br>
					<input class="c-input" name="lname" type="text" value="" size="30" /><br>
					<label for="email">email address: <span class="c-required"  style="color:red;">*</span></label><br>
					<input class="c-input" name="email" type="text" value="" size="30" /><br>
					<label for="phone">phone number:</label><br>
					<input class="c-input" name="phone" type="text" value="" size="30" /><br>
					<label for="message">your message:</label><br>
					<textarea class="c-input" name="message" rows="10" cols="40"></textarea><br>
					<input type="submit" value="Send email">
				</form>
			</div>
		</div>
	</div>


<?php
  
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
