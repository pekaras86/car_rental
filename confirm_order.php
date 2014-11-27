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
		  <p>Order Summary:</p>
		  <div class="vrcrentforlocs">
		    <p class="vrcrentalfor">
             <span class="vrcrentalforone">Honda Accord V6</span>
            </p>
		    <div class="vrcrentalfortwo">
			  <p>
                 <span class="vrcrentalfordate">From <span style="color:green;">11/30/2014 00:00</span></span>
			  </p>
			  <p>
                 <span class="vrcrentalfordate">To <span style="color:green;">15/30/2014 00:00</span></span>
			  </p>
			</div>
			<div class="vrclocsboxsum">
			  <p class="vrcpickuploc">
                Pickup Location:
                <span class="vrcpickuplocname">Athens International Airport</span>
             </p>
			 <p class="vrcdropoffloc">
               Drop Off Location:
               <span class="vrcdropofflocname">Athens International Airport</span>
             </p>
			</div>
		  </div>
		  <table class="vrctableorder">
		    <tbody>
			  <tr class="vrctableorderfrow">
				<td> </td>
				<td align="center">Days</td>
				<td align="center">Net Price</td>
				<td align="center">Tax</td>
				<td align="center">Total Price</td>
			  </tr>
			  <tr>
			    <td align="left">
			      Honda Accord V6
                  <br>
                  Standard Insurance
                  <br>
                  Km inlcuded: 200
                </td>
				<td align="center">2</td>
				<td align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice">82.64</span>
               </td>
			   <td align="center">
                    <span class="vrccurrency">€</span>
                    <span class="vrcprice">17.36</span>
               </td>
			   <td align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice">100.00</span>
			   </td>
			  </tr>
			  <tr height="20px">
				<td height="20px" colspan="5"> </td>
			  </tr>
			  <tr class="vrcordrowtotal">
			    <td>Total</td>
				<td align="center"> </td>
				<td align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice">82.64</span>
				</td>
				<td align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice">17.36</span>
				</td>
				<td class="vrctotalord" align="center">
					<span class="vrccurrency">€</span>
					<span class="vrcprice">100.00</span>
				</td>
			  </tr>
			</tbody>
		  </table>
		  <form method="post" action="" role="form" id="conorform">
		  <div class="form-group">
		    <table class="cnorderflds">
			  <tbody>
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
                    <input class="confinput form-control" type="text" size="40" value="" name="vrcf1">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>Address</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="vrcf1">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>Zip Code</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="vrcf1">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>City</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="vrcf1">
                  </td>
				</tr>
				<tr>
				  <td align="right">
                    <span>Date of Birth</span>
                  </td>
				  <td>
                    <input class="confinput form-control" type="text" size="40" value="" name="vrcf1">
                  </td>
				</tr>
				<tr>
				<td align="right" valign="top">
				  <span>Notes</span>
				</td>
				<td align="right">
				  <textarea class="form-control" name="message" rows="5" cols="40" style="box-shadow: 0 0 2px #cccccc inset;">
				 </textarea>
				 </td>
				</tr> 
			  </tbody>
			</table>
			<br>
			<p class="paymethod">Payment Method</p>
			 <ul style="list-style-type: none;">
			  <li>
				<input id="gpay1" type="radio" checked="checked" value="1" name="gpayid">
				<label for="gpay1">Bank Transfer</label>
			  </li>
              <li>
				<input id="gpay2" type="radio" value="2" name="gpayid">
				<label for="gpay2">PayPal</label>
              </li>
              <li>
				<input id="gpay5" type="radio" value="5" name="gpayid">
				<label for="gpay5">Stripe - Credit Card</label>
              </li>
            </ul>
			<br>
			<input class="btn btn-default" type="submit" value="Confirm Order" name="saveorder">
		 </div>
		</form>
		  
		</div>
	    
            
	  
	  
	  
	    
		
		
	  
	  
	  
	  
	  
	  
	  
		
      
      </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php

$jqScript = <<<EOD
   <script>
     $(function() {
  
    // Setup form validation on the #register-form element
    $("#conorform").validate({
    
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
