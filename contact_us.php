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
					<label for="name">Your name:</label><br>
					<input class="c-input" name="name" type="text" value="" size="30" /><br>
					<label for="email">Your email:</label><br>
					<input class="c-input" name="email" type="text" value="" size="30" /><br>
					<label for="message">Your message:</label><br>
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