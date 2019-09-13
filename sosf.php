<!DOCTYPE html>
<html>
  
  <body >

    

    <a id="btn" ><img src="sos.png" style="float: right; z-index: 20; position: fixed; top: 75px; right: 30px; width: 7%;"></a>
    <!--<button id="btn" name="btn" type="submit">Hit Me!</button>-->
    <div id="res"></div>
    <div id="map" style="display: none;"></div>

    <a href="https://meet.google.com/hdh-xecf-iec" target="_blank" ><img src="video.png" style="float: right; z-index: 20; position: fixed; bottom: 190px; right: 30px; width: 7%;"></a>
<script>

      
      
      var map, infoWindow,latitude;
      
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 18
        });
    infoWindow = new google.maps.InfoWindow;

        
        if (navigator.geolocation) {
          
          
          navigator.geolocation.getCurrentPosition(function(position) {
            
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            latitude=pos.lat;
            longitude=pos.lng;
            infoWindow.setPosition(pos);
            infoWindow.setContent('To Call AMBULANCE here<br> Press SOS button');
            infoWindow.open(map);
            map.setCenter(pos);
            



            
      $('#btn').on('click',function(){
        var coordinates = latitude + ":" + longitude;
        alert(coordinates);
        $.post('emergency.php',{str:coordinates},function(data){
          alert(data);
        });
      });
      /*Code ends*/

            
            
            
          }, function() {

            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
        
          handleLocationError(false, infoWindow, map.getCenter());
        }
        }

      

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
   



function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}
//var userlatlng = new google.maps.LatLng(userlat, userlon); 
    




</script>

    <script async defer
    src="">//use your google maps api key here
    </script>



  </body>
</html>