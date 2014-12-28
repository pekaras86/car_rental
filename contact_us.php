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
			<h2> Contact us </h2>
			<div class="contact-form" style="width:40%;">
				<form action="MAILTO:pekaras86@gmail.com" method="POST" enctype="multipart/form-data" role="form" id="cntform">
				  <div class="form-group col-sm-12 col-lg-12">
					  <label for="fname" class="control-label">first name: <span class="c-required" style="color:red;">*</span></label><br>
                      <input class="form-control" name="fname" type="text" placeholder="your first name" size="30" id="fname" /><br>
                  </div>
				  <div class="form-group col-lg-12">
					<label for="lname">last name: <span class="c-required"  style="color:red;">*</span></label><br>
					<input class="c-input form-control" name="lname" type="text" placeholder="your last name" size="30" id="lname" /><br>
				  </div>	
				  <div class="form-group col-lg-12">
					<label for="email">email address: <span class="c-required"  style="color:red;">*</span></label><br>
					<input class="c-input form-control" name="email" type="email" placeholder="your email" size="30" id="email" /><br>
				  </div>
                  <div class="form-group col-lg-12">
					<label for="phone">phone number:</label><br>
					<input class="c-input form-control" name="phone" type="text" value="" size="30" /><br>
				  </div>
				  <div class="form-group">
					<label for="message">your message:</label><br>
					<textarea class="c-input form-control" name="message" rows="10" cols="40"></textarea><br>
					<input type="submit" value="Send email" class="btn btn-default">
				  </div>
				</form>
			</div>
	</div>


<?php
  
  $jqScript = <<<EOD
   <script>
     $(function() {
  
    // Setup form validation on the #register-form element
    $("#cntform").validate({
    
        // Specify the validation rules
        rules: {
            fname: "required",
            lname: "required",
            email: {
                required: true,
                email: true
            },
            
            agree: "required"
        },
        
        // Specify the validation error messages
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            email: "Please enter a valid email address",
            agree: ""
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });  
   </script>
  
  
EOD;
   
  // Requires the footer (JS declarations) part of the page 
  display_footer($jqScript);

?>
