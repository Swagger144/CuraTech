<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        z-index: -1;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      .mapslink{
        position: fixed;
        bottom:30px;
        right:30px;
      }
    </style>
  </head>
  <body>
    <?php
        $username = "root";
        $password = "sagar";
        $servername = "localhost";
        $dbname = "test";
        $con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);
        $sql = "select fname,sname from `sagar` where id=43";
        $result = $con->query($sql);
        $row= mysqli_fetch_assoc($result);
        
        if ($row){
            $lat = $row['fname'];
            $lng=$row['sname'];
        }
        $sql = "select fname,sname from `sagar` where id=44";
        $result = $con->query($sql);
        $row= mysqli_fetch_assoc($result);

        if ($row){
            $latd = $row['fname'];
            $lngd=$row['sname'];
        }
        // $sql = "select lat,lag from `sos_hospital`";
        // $result = $con->query($sql);
        // $row= mysqli_fetch_assoc($result);

        // if ($row){
        //     $latd = $row['lat'];
        //     $lngd=$row['lag'];
        // }

        echo '<a class="btn btn-primary btn-lg mapslink" href="https://www.google.com/maps/?q='.$latd.','.$lngd.'" target="_blank" role="button"><i class="material-icons" style="font-size:36px">directions</i>Open in Google Maps</a>';

        $truncate="truncate table sos_hospital";
        $res1 = $con->query($truncate);

    //     $sql="SELECT * from comments";
	// $result= $conn->query($sql);

	// 	while ($row= $result->mysql_fetch_assoc()) {
	// 		echo "<div class='comment-box'><p>";
	// 			echo $row['uid']."<br>";
	// 			echo $row['date']."<br>";
	// 			echo nl2br($row['message']);
	// 		echo "</p></div>";
	// 	}
	// };



    ?>



<div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);

        //var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        //};
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: {lat:<?php echo $lat ?>, lng:<?php echo $lng ?>},
          destination: {lat:<?php echo $latd ?>, lng:<?php echo $lngd ?>},
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAy3P3T4rxPzD_LY-P-ipJRmeeCUX7ZY4&callback=initMap">
    </script>
  </body>
</html>