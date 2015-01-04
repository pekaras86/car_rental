<?php 

// Requires the <HEAD></HEAD> part of a page
function display_head($page_title = "") {
  
  echo <<<EOD
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>{$page_title}</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.1/css/jquery.timepicker.css" />  <!--time_picker-->
	<link href="bootstrap-3.3.1/css/jquery.validate.password.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.1/css/custom-css.css" rel="stylesheet">

    <link href="bootstrap-3.3.1/css/carat.css" rel="stylesheet">

    <!-- Just for debugging purposes. Dont actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<link rel="stylesheet" type="text/css" href="css/sharebuttons.css" /> <!-- social buttons -->
	
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />

  </head>
  
  
EOD;
}


// Requires the footer (JS declarations) part of the page 
function display_footer($jqScripts = NULL) {

echo <<<EOD
<!-- <div id="footer" style="background-image: linear-gradient(#FFF 0%, #832121 100%); margin-top:50px; padding-top: 10px;">
    <div class="container">
        <div class="row no-side-margins">
              <div style="width:55%; float:left;">
                  <p style="font-size:13px; text-align:center; color:#000;">Dear Clients</p>
					<p style="font-size:13px; text-align:center; color:#000;">Welcome to Thessaloniki Car Rentals, a highly specialized car rental company based in Thessaloniki, Greece.</p>
					<p style="font-size:13px; text-align:center; color:#000;">We offer you a wide variety of brand new and safe vehicles at the best prices in the market.<br>You can find Thessaloniki Car Rentals branches at the biggest cities throughout Greece,<br> including Athens, Thessaloniki, Chania, Larissa, Alexandroupoli and more. </p>	
					<p style="font-size:13px; text-align:center; color:#FFF;">Our main priority is your complete satisfaction,<br>so we provide you with the highest quality service possible, making your stay unforgetable!</p>
					<p style="font-size:13px; text-align:center; font-weight:bold; color:#FFF;">The Thessaloniki Car Rentals Team</p> 
				</div>
					<img src="images/char-icons/keychain.png" class="img-responsive" alt="Responsive image" style="width:200px; display:inline;">
				<div style="display:inline; float:right;">
					<p><center><a href="contact_us.php">Contact Us Here</a><br>
					<a href="terms_conditions.php">Terms & Conditions</a></center></p>
				</div>
            </div>
         </div>
</div>
-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="block random-cars">
					<div class="title">
						<h2>About Us</h2>
					</div>
						
					<div class="items">
						<span style="font-size:13px; text-align:center; color:#FFF;">
							<p>Dear Clients</p>
							<p>Welcome to Thessaloniki Car Rentals, a highly specialized car rental company based in Thessaloniki, Greece.</p>
							<p>We offer you a wide variety of brand new and safe vehicles at the best prices in the market.<br>You can find Thessaloniki Car Rentals branches at the biggest cities throughout Greece,<br> including Athens, Thessaloniki, Chania, Larissa, Alexandroupoli and more. </p>	
							<p>Our main priority is your complete satisfaction,<br>so we provide you with the highest quality service possible, making your stay unforgetable!</p>
							<p style="font-size:14px; font-weight:bold;">The Thessaloniki Car Rentals Team</p>
						</span>
					</div><!-- /.items -->
				</div><!-- /.block -->
			</div><!-- /.col-md-4 -->

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="block random-cars">
					<div class="title">
						<h2>Popular Cars</h2>
					</div><!-- /.title -->

					<div class="items">
						<div class="teaser-item-wrapper">
							<div class="teaser-item">
							    <div class="title">
							        <a href="detail.html">Toyota Landcruiser</a>
							    </div><!-- /.title -->

		    					<div class="subtitle">Windsor Locks, CT </div><!-- /.subtitle -->

							    <div class="row">
							        <div class="picture-wrapper col-lg-4 col-md-4 col-sm-4 col-xs-4">
							            <div class="picture">
							                <a href="detail.html">
							                	<span class="hover">
							                		<span class="hover-inner">
							                			<i class="icon icon-normal-link"></i>
							                		</span><!-- /.hover-inner -->
							                	</span><!-- /.hover -->

							                    <img src="assets/img/content/toyota3.jpg" alt="#">
							                </a>
							            </div><!-- /.picture -->
							        </div><!-- /.picture-wrapper -->

							        <div class="content-wrapper col-lg-8 col-md-8 col-sm-8 col-xs-8">
							            <div class="price">$9,799</div>
							            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu vulputate neque. Fusce hendrerit fermentum.</p>
							        </div><!-- /.picture-content -->
							    </div><!-- /.row -->
							</div><!-- /.teaser-item -->
						</div><!-- /.teaser-item-wrapper -->

						<div class="teaser-item-wrapper">
							<div class="teaser-item">
							    <div class="title">
							        <a href="detail.html">Toyota Landcruiser</a>
							    </div><!-- /.title -->

		    					<div class="subtitle">Windsor Locks, CT </div><!-- /.subtitle -->

							    <div class="row">
							        <div class="picture-wrapper col-lg-4 col-md-4 col-sm-4 col-xs-4">
							            <div class="picture">
							                <a href="detail.html">
							                	<span class="hover">
							                		<span class="hover-inner">
							                			<i class="icon icon-normal-link"></i>
							                		</span><!-- /.hover-inner -->
							                	</span><!-- /.hover -->

							                    <img src="assets/img/content/toyota2.jpg" alt="#">
							                </a>
							            </div><!-- /.picture -->
							        </div><!-- /.picture-wrapper -->

							        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 content-wrapper">
							            <div class="price">$9,799</div>
							            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu vulputate neque. Fusce hendrerit fermentum.</p>
							        </div><!-- /.content-wrapper -->
							    </div><!-- /.row -->
							</div><!-- /.teaser-item -->
						</div><!-- /.teaser-item-wrapper -->
					</div><!-- /.items -->
				</div><!-- /.block -->
			</div><!-- /.col-md-4 -->

			<div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
				<div class="block">
					<div class="title center-sm">
						<h2>Recent from Bazaar</h2>
					</div><!-- /.title -->

					<div id="carousel-example-generic" class="carousel slide gallery-grid" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item clearfix active">
								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
											<span class="badge">Featured</span>
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota1.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota2.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->

								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota3.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
											<span class="badge">Best Price</span>
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota1.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->

								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
											<span class="badge">Elite Seller</span>
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota1.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota2.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->
							</div><!-- /.item -->

							<div class="item clearfix">
								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota2.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota3.jpg" alt="#">
											<span class="badge">Quality A+</span>
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->

								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota1.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota2.jpg" alt="#">
											<span class="badge">High Rating</span>
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->

								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota2.jpg" alt="#">
											<span class="badge">Certified</span>
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota3.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->
							</div><!-- /.item -->

							<div class="item clearfix">
								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota3.jpg" alt="#">
											<span class="badge">Elite Seller</span>
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota1.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->

								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota2.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota3.jpg" alt="#">
											<span class="badge">Best Price</span>
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->

								<div class="row">
									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota3.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota.jpg" alt="#">
										</a>
									</div><!-- /.col-md-4 -->

									<div class="image col-xs-4 col-md-4">
										<a href="detail.html">
						                	<span class="hover">
						                		<span class="hover-inner">
						                			<i class="icon icon-normal-link"></i>
						                		</span><!-- /.hover-inner -->
						                	</span><!-- /.hover -->

											<img src="assets/img/content/toyota1.jpg" alt="#">
											<span class="badge">High Quality</span>
										</a>
									</div><!-- /.col-md-4 -->
								</div><!-- /.row -->
							</div><!-- /.item -->
						</div><!-- /.carousel-inner -->

						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<i class="icon icon-normal-left-arrow-small"></i>
						</a>

						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<i class="icon icon-normal-right-arrow-small"></i>
						</a>
					</div><!-- /.carousel -->
				</div><!-- /.block -->
			</div><!-- /.col-md-4 -->
		</div><!-- /.row -->
	</div><!-- /.container -->

	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 clearfix">
					<div class="copyright">
						&copy; Thessaloniki Car Rentals
					</div><!-- /.pull-left -->

					<ul class="nav nav-pills">
						<li><a href="index.php">Home</a></li>
						<li><a href="car_types.php">Our Fleet</a></li>
						<li><a href="car_stations.php">Car Stations</a></li>
						<li><a href="terms_conditions.php">Terms & Conditions</a></li>
						<li><a href="contact_us.php">Contact Us</a></li>
					</ul><!-- /.nav -->
				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.footer-bottom -->
</footer><!-- /#footer -->

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

    <script src="js/sharebuttons.js"></script>

	<!-- <script type="text/javascript" src="engine1/jquery.js"></script> -->
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>

	{$jqScripts}
  </body>
</html>
		
EOD;
}


// Requires the navbar
function display_navbar($tag = NULL) {

$home = NULL;
$carTypes = NULL;
$carStations = NULL;
$terms = NULL;
$contactUs = NULL;
$logIn = NULL;
$signUp = NULL;

switch($tag) {
  case "home":
    $home = "active";
	break;
  case "carTypes":
    $carTypes = "active";
	break;
  case "carStations":
    $carStations = "active";
	break;
  case "terms":
    $terms = "active";
	break;
  case "contactUs":
    $contactUs = "active";
	break;
  case "logIn":
    $logIn = "active";
	break;
  case "signUp":
    $signUp = "active";
	break;
}

echo <<<EOD
  <body>
  
      <div class="wrapper">

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
          
      <!-- social media buttons -->
      <div id="share-wrapper" style="z-index:2;">
        <ul class="share-inner-wrp">
        <!-- Facebook -->
        <li class="facebook button-wrap"><a href="#">Facebook</a></li>
        
        <!-- Twitter -->
        <li class="twitter button-wrap"><a href="#">Tweet</a></li>
                
        <!-- Google -->
        <li class="google button-wrap"><a href="#">Google+</a></li>
        
        </ul>
      </div>
       <!-- social media buttons -->

          
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="<?php {$home} ?>"><a href="index.php">Home</a></li>
			  <li class="<?php {$carTypes} ?>"><a href="car_types.php">Our Fleet</a></li>
			  <li class="<?php {$carStations} ?>"><a href="car_stations.php">Car Stations</a></li>
			  <li class="<?php {$terms} ?>"><a href="terms_conditions.php">Terms & Conditions</a></li>
			  <li class="<?php {$contactUs} ?>"><a href="contact_us.php">Contact Us</a></li>
EOD;
			  if (isset($_COOKIE['admin'])) {
			    echo "<li class=''><a href='admin_panel/admin.php'>Admin Panel</a></li>";
			  }
echo <<<EOD
            </ul>
            <ul class="nav navbar-nav navbar-right">
EOD;
            
		if (isset($_COOKIE['user_id'])) {
         echo "<li><a href='logout.php'>Log Out</a>";
        } else {
         echo "<li class='{$logIn}'><a href='log_in_form.php'>Log In</a></li>";
		 echo "<li class='{$signUp}'><a href='sign_up_form.php'>Sign up</a></li>";
        }

echo <<<EOD
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div> <!-- /container -->	
EOD;
}

?>