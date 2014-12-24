<?php
  
  require_once ('scripts/database_connection.php');
  require_once ('scripts/views.php');
  
   session_start();
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");
  
  // Requires the navbar
  $tag = "logIn";
  display_navbar($tag);
  
  
  /*-----------------------Elegxos user--------------------------------*/
  
  
  
  //ean exei setaristei cookie kane elegxo tou user pou kanei sign in
  if(!isset($_COOKIE['user_id'])) {  
  
  //elegkse ean o user symplirose ti forma 
  if (isset($_POST['user'])) {
    
	$username = mysqli_real_escape_string($con, trim($_REQUEST['user']));  
	$password = mysqli_real_escape_string($con, trim($_REQUEST['pass'])); 
	
	//psakse ton user ston pinaka admins
	$query = sprintf("SELECT user_id, username FROM admins " .
					" WHERE username = '%s' AND " .
					" password = '%d';",
					$username, $password);
	
	$results = mysqli_query($con, $query);
	
	//ean vrethike ston pinaka admins
	if (mysqli_num_rows($results) == 1) {
	  
	  $result = mysqli_fetch_array($results);
	  
	  $user_id = $result['user_id'];  //ean yparxei eksygage to user_id tou
	  $username = $result['username'];  //kai to username tou
	  
	  setcookie('user_id', $user_id);  // kai ftiakse cookie me to user_id tou
	  setcookie('username', $username); // kai to username tou
	  setcookie('admin','admin');
	  
	  header("Location: admin.php");   // sti synexeia katefthine ton sti selida show_user kai pare mazi to cookie user_id
	  
	  exit();  //telos selidas
	
	} else {
	  //ean den yparxei ston pinaka admins psaxton ston pinaka customers (afto na to kanw pio meta otan ginoun oi pinakes)
	  //ean den yparxei pouthena kane anakatefthinsi edw me error message
	  $error_message = "Your username/password combination was invalid.";
	  header("Location: log_in_form.php?error_message={$error_message}");
	}
	
	
  }
  



?>


      <!-- Main component for a primary marketing message or call to action -->
	<div class="container">
      <div class="jumbotron">
			  <?php 
		  if(isset($_REQUEST['error_message'])) {
		    echo <<<EOD
                     <span class="error_message"><b>{$_REQUEST['error_message']}</b></span>
                     <p></p>					 
EOD;
		  }
		  ?>
         <div class="login-card">
           <h1>Log-in</h1><br>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
  
  } else {
    //ean exei setaristei cookie anakatefthine ton sto index...apagorevete na mpei edw
    header("Location: index.php");
  }
  
 

?>
