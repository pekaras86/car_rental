<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");


?>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="front_page.php">Thessaloniki Car Rentals</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="front_page.php">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="log_in_form.php">Log in</a></li>
              <li><a href="sign_up_form.php">Sign up</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
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
