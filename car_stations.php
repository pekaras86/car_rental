<?php
  
  require_once ('scripts/views.php');
  
  // Requires the <HEAD></HEAD> part of the page
  display_head("Thessaloniki Car Rentals");

// Requires the navbar
$tag = "carStations";
display_navbar($tag);


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
    $(document).ready(function(){
      
      map = new GMaps({
        div: '#map',
        lat: 40.626256,
        lng: 22.948085
      });
      
      map.addMarker({
        lat: 40.582042,
        lng: 22.965862,
        title: 'Thessaloniki Car Rentals',
        infoWindow: {
          content: '<p>Kalamaria Branch</p>'
        }
      });

      map.addMarker({
        lat: 40.634148,
        lng: 22.940433,
        title: 'Thessaloniki Car Rentals',
        infoWindow: {
          content: '<p>City Branch</p>'
        }
      });

      map.addMarker({
        lat: 40.523936,
        lng: 22.978136,
        title: 'Thessaloniki Car Rentals - Drop off car',
        infoWindow: {
          content: '<p>City Airport</p>'
        }
      });

      map.addMarker({
        lat: 39.363423,
        lng: 22.943892,
        title: 'Thessaloniki Car Rentals - Drop off car',
        infoWindow: {
          content: '<p>City of Volos</p>'
        }
      });

      map.addMarker({
        lat: 40.847101,
        lng: 25.877936,
        title: 'Thessaloniki Car Rentals - Drop off car',
        infoWindow: {
          content: '<p>City of Alexandroupoli</p>'
        }
      });

      map.addMarker({
        lat: 35.511732,
        lng: 24.024131,
        title: 'Thessaloniki Car Rentals - Drop off car',
        infoWindow: {
          content: '<p>City of Chania</p>'
        }
      });

      map.addMarker({
        lat: 37.920925,
        lng: 23.932886,
        title: 'Thessaloniki Car Rentals - Drop off car',
        infoWindow: {
          content: '<p>Athens Airport</p>'
        }
      });

      map.addMarker({
        lat: 40.273988,
        lng: 22.495715,
        title: 'Thessaloniki Car Rentals - Drop off car',
        infoWindow: {
          content: '<p>City of Katerini</p>'
        }
      });
    });


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