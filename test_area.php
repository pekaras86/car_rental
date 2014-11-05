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
         
		 
		<div class="locdate_pick_module">
		  <div class="lockdate_pick_content form-group">
		    <form name="input" action="" method="get" role="form">
			  <fieldset>
			    <div class="pickdrop_lock">
			    <label>Pickup Location</label>
				<div class="pickup_lock_sele form-group">
				<select name="pickup_location" class="form-control">
				  <option value="">ATHENS AIRPORT</option>
				  <option value="">THESSALONIKI AIRPORT</option>
				  <option value="">LARISA</option>
				  <option value="">VOLOS</option>
				  <option value="">ALEKSANDROUPOLI</option>
				  <option value="">XANTHI</option>
				  <option value="">KAVALA</option>
				  <option value="">DRAMA</option>
				  <option value="">KOMOTINI</option>
				</select>
				</div>
			  </div>
			    <div class="pickdrop_date">
				<label>Pickup Date</label>
				<div class="pickup_date_sele form-group">
				<input type="text" class="form-control datepicker">
				</div>
				</div>
				<div class="pickdrop_lock">
			    <label>Drop Off Location</label>
				<div class="dropoff_lock_sele form-group">
				<select name="dropoff_location" class="form-control">
				  <option value="">ATHENS AIRPORT</option>
				  <option value="">THESSALONIKI AIRPORT</option>
				  <option value="">LARISA</option>
				  <option value="">VOLOS</option>
				  <option value="">ALEKSANDROUPOLI</option>
				  <option value="">XANTHI</option>
				  <option value="">KAVALA</option>
				  <option value="">DRAMA</option>
				  <option value="">KOMOTINI</option>
				</select>
				</div>
			  </div>
			    <div class="pickdrop_date">
				<label>Drop Off Date</label>
				<div class="dropoff_date_sele form-group">
				<input type="text" class="form-control datepicker">
				</div>
				</div>
			    </fieldset>
			</form>
		  </div>
		</div>
          
		 
		 
		 

		 
		 
		 
		 
		 
      </div> <!-- / jumbotron-->

    </div> <!-- /container -->


<?php
  
  $jqScript = <<<EOD
  <script>
   $(function() {
    $( ".datepicker" ).datepicker();
	format: 'mm/dd/yyyy';
  });
  </script>			
EOD;
   
  // Requires the footer (JS declarations) part of the page 
  display_footer($jqScript);

?>
