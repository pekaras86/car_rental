<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "signUp";
  display_navbar($tag);

?>

  
    <!-- Main component for a primary marketing message or call to action -->
	<div class="container">
      <form method="post" action="sign_up_user.php" role="form" id="conorform">  
		<div class="form-group">
		    <table class="cnorderflds">
			  <tbody>
			    <tr>
				  <td align="right">
				    <span>
                      <sup>*</sup>
                    </span>
                    <span>Username</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="username">
                  </td>
				  <tr>
				  <td align="right">
				    <span>
                      <sup>*</sup>
                    </span>
                    <span>Password</span>
                  </td>
				  <td>
                    <input style="width:200px; height:35px;" class="confinput form-control" type="password" size="40" value="" name="password">
                  </td>
				</tr>
				<tr>
				</tr>
				<tr>
			    <tr>
				  <td align="right">
				    <span>
                      <sup>*</sup>
                    </span>
                    <span>Name</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="fname">
                  </td>
				</tr>
				<tr>
				  <td align="right">
				    <span>
                      <sup>*</sup>
                    </span>
                    <span>Last Name</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="lname">
                  </td>
				</tr>
				<tr>
				  <td align="right">
				    <span>
                      <sup>*</sup>
                    </span>
                    <span>e-mail</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="email">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>Phone</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="phone">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>Address</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="address">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>Zip Code</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="zipcode">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>City</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="city">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>Date of Birth</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="birth">
                  </td>
				</tr>
			  </tbody>
			</table>
			<br>
			<br>
			<input class="btn btn-info btn-block" type="submit" value="Confirm Order" name="saveorder" style="width:110px;">
		 </div>
       </form>  
    </div> <!-- /container -->


<?php

$jqScript = <<<EOD
   <script>
     $(function() {
  
    // Setup form validation on the #register-form element
    $("#conorform").validate({
    
        // Specify the validation rules
        rules: {
		    username: "required",
			password: "required",
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
		    username: "Please enter your username",
			password: "Please enter a password",
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
