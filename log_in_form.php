<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "logIn";
  display_navbar($tag);


?>


      <!-- Main component for a primary marketing message or call to action -->
	<div class="container">
      <div class="jumbotron">
         <div class="login-card">
           <h1>Log-in</h1><br>
           <form>
             <input type="text" name="user" placeholder="Username">
             <input type="password" name="pass" placeholder="Password">
             <input type="submit" name="login" class="login login-submit" value="login">
           </form>

          <div class="login-help">
            <a href="#">Forgot Password</a>
          </div>
       </div>
      </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
  
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>
