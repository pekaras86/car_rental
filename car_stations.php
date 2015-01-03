<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");

// Requires the navbar
$tag = "carStations";
display_navbar($tag);

define("DATABASE_HOST", "");
define("DATABASE_USERNAME", "user");
define("DATABASE_PASSWORD", "user");
define("DATABASE_NAME", "thessaloniki_car_rental");

define("SITE_ROOT", "/git_projects/car_rental/");
$con=mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
$sql="SELECT * FROM car_locations";
$result=mysqli_query($con,$sql);

$num = 0;
while ($row = mysqli_fetch_array($result)) {
$rowsOfLocations[$num] = $row;
$num = $num +1;
}

$numRows = mysqli_num_rows($result);
?>

<head>


<meta charset="utf-8">
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="js/gmaps.js"></script>
  <script type="text/javascript" src="js/prettify.js"></script>
  <link href='//fonts.googleapis.com/css?family=Convergence|Bitter|Droid+Sans|Ubuntu+Mono' rel='stylesheet' type='text/css' />
  <link href='css/forMap.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript">
    var map;
    $(document).ready(function(){1
      
      map = new GMaps({
        div: '#map',
        lat: 40.626256,
        lng: 22.948085
      });
      
      var locationRows = <?php echo json_encode($rowsOfLocations ); ?>;
      var rowNum = <?php echo json_encode($numRows); ?>;
      for(var i=0;i<rowNum ;i++){
        map.addMarker({
          lat: locationRows[i][3],
          lng: locationRows[i][4],
          title: locationRows[i][2],
          infoWindow: {
             content: locationRows[i][1]
          }
       });
      };
     
    }); 1


  </script>  
</head>

<!--

    <div class="container" style="margin-bottom:20px;">

      <h2 style="margin-top:0px;"> Car stations </h2>


        <div id="map-container">
            <div id="dummy"></div>
            <div id="map-element">
                <iframe class="embed-responsive-item" src="https://mapsengine.google.com/map/embed?mid=zMkCKgEPr2rU.kWx_lXDFFNY0" width="100%" height="100%"></iframe>
            </div>

		</div>
    </div>

-->

<div class="span17">
        <div class="popin">
          <div id="map"></div>
        </div>
      </div>

<?php
  
  // Requires the footer (JS declarations) part of the page 
  display_footer();

?>