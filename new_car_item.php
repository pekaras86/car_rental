<?php

if (isset($_REQUEST['success_message'])) {
  $success_message = $_REQUEST['success_message'];
} else {
  $success_message = NULL;
}

?>


<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.1/css/jquery.timepicker.css" />  <!--time_picker-->
	<link href="bootstrap-3.3.1/css/jquery.validate.password.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.1/css/custom-css.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
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
            <a class="navbar-brand" href="index.php">Thessaloniki Car Rentals</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class=""><a href="index.php">View Site</a></li>
			  <li class=""><a href="admin_panel/admin.php">Dashboard</a></li>
			  <li class=""><a href="../car_rental/newcar.php">New Car Type</a></li>
			  <li class="active"><a href="../car_rental/new_car_item.php">New Car Item</a></li>
			  <li class=""><a href=""></a></li>
			  <li class=""><a href=""></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
			<?php
			  if (isset($_COOKIE['user_id'])) {
                echo "<li><a href='logout.php'>Log Out</a>";
              } else {
                echo "<li class=''><a href='log_in_form.php'>Log In</a></li>";
				//echo "<li class=''><a href='sign_up_form.php'>Sign up</a></li>";
              }
			?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div> <!-- /container -->	
	
    
	
	
	
	<div class="container"> 
        <div class="row"> 
		  <?php 
		  if(isset($success_message)) {
		    echo <<<EOD
                     <span id="success_message"><b>{$success_message}</b></span>            		  
EOD;
		  }
		  ?>
		  <form method="post" action="admin_panel/add_new_car_item.php" name="addcar" enctype="multipart/form-data">
		   <div class="form-group">
		    <table class="addcar">
			  <tbody>
			    <tr>
				  <td width="200">
					*
					<b>Location:</b>
				  </td>
				  <td>
					  <select size="4" multiple="multiple" name="clocation" id="clocation" class="form-control" style="width:250px;">
						<option name="clocation" value="1">ATHENS AIRPORT</option>
						<option name="clocation" value="2">THESSALONIKI AIRPORT</option>
						<option name="clocation" value="4">VOLOS</option>
						<option name="clocation" value="5">ALEKSANDROUPOLI</option>
						<option name="clocation" value="3">CHANIA</option>
						<option name="clocation" value="7">KATERINI</option>
					  </select>
				   </td>
				</tr>
				<tr>
				  <td width="200">
					*
					<b>Car Category:</b>
				  </td>
				  <td>
					  <select size="4" multiple="multiple" name="ccat" class="form-control" id="ccat" style="width:200px;">
						<option name="ccat" value="1">Peugeot 206</option>
						<option name="ccat" value="4">Renault Megane</option>
						<option name="ccat" value="6">Chevrolet Cruze</option>
						<option name="ccat" value="8">Toyota Highlander</option>
						<option name="ccat" value="10">Suzuki Grand Vitara</option>
						<option name="ccat" value="11">Renault Duster</option>
					  </select>
				   </td>
				</tr>
				<tr>
				  <td width="200">
					*
					<b>Plate Number:</b>
				  </td>
				  <td>
				    <input type="text" size="4" value="" name="plate" id="plate" class="form-control" style="width:200px;">
                  </td>
				  </tr>
				   <tr>
				   <td>
				    <input type="submit" value="Submit" class="btn btn-default btn-file" onClick="return addCarFields();">
				   </td>
				  </tr>
			  </tbody>
			</table>
		   </div>
		  </form>
        </div>
    </div> <!-- /container -->
	
	
	
	
	
	
	
	
	
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<link href="http://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="bootstrap-3.3.1/js/jquery.validate.min.js"></script>
    <script src="bootstrap-3.3.1/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.1/js/jquery.timepicker.js"></script>  <!--time_picker-->
    <script src="bootstrap-3.3.1/js/modernizr.custom.52675.js"></script>
	
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	<script>
	  function addCarFields(){
	    var cname = document.getElementById("cname").value;
	    if(cname === ""){
		  alert("Car Name field is necessary!");
		  return false;
		}
		
		var cimg = document.getElementById("cimg").value;
		if(cimg === ""){
		  alert("Car Image field is necessary!");
		  return false;
		}
		
		var ccat = document.getElementById("ccat").value;
		if(ccat === ""){
		  alert("Car Category field is necessary!");
		  return false;
		}
		
		var cdescription = document.getElementById("cdescription").value;
		if(cdescription === ""){
		  alert("Car Description field is necessary!");
		  return false;
		}
		
		var clocation = document.getElementById("clocation").value;
		if(clocation === ""){
		  alert("Car Location field is necessary!");
		  return false;
		}
		
		var cccar = document.getElementById("cccar").value;
		if(cccar === ""){
		  alert("Car Engine field is necessary!");
		  return false;
		}
		
		var plate = document.getElementById("plate").value;
		if(plate === ""){
		  alert("Plate Number field is necessary!");
		  return false;
		}
		
		var cprice = document.getElementById("cprice").value;
		if(cprice === ""){
		  alert("Price/Day field is necessary!");
		  return false;
		}
		
	  } // end addCarFields() 
	</script>
	<script>
	  $(document).ready(function(){
	    $("#success_message").fadeOut(4000);
	  }); // end document
	</script>
  </body>
</html>