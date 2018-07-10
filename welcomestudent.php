<!DOCTYPE html>
<html>
  <head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>

<script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=G7L7w0kBJ5VwPY3ABf8JTqSbnsDUeRm0"></script>
<script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=G7L7w0kBJ5VwPY3ABf8JTqSbnsDUeRm0"></script>


    <meta charset="UTF-8">
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 800px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       #livelist{
         display: none;
       }

    </style>
    <title>Home</title>
  </head>
  <body>
    <div id= "livelist">

    </div>

    <div id="map"></div>





  </body>
  <script type="text/javascript">



var map,
  dir;



    var mymap = L.map('map').setView([10.763, 78.818], 18);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicGMxMjM0NTY3OCIsImEiOiJjamo5a2p4bjAwZ3RiM3dyM2xkNTF6a2lkIn0.eb-E605vA2Ie0WXwgwiIgg', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox.streets',
      accessToken: 'pk.eyJ1IjoicGMxMjM0NTY3OCIsImEiOiJjamo5a2p4bjAwZ3RiM3dyM2xkNTF6a2lkIn0.eb-E605vA2Ie0WXwgwiIgg'
  }).addTo(mymap);
var xml = new XMLHttpRequest();
var list =document.getElementById('livelist');
xml.open("GET", "returncoords.php");
xml.send();
xml.onreadystatechange = function(){
  if(xml.readyState==4){
  list.innerHTML = this.responseText;
  xmlresponsehandler();
}
}
var markers = [];
var name, lat = [], lng = [],i, marker, latitude, longitude;
function xmlresponsehandler(){
  list = document.getElementById('livelist');
  markers = [];

   lat = list.getElementsByTagName('h2');
   lng = list.getElementsByTagName('h3');


   for(i=0;i<lat.length;i+=2)
   {
     latitude = parseFloat(lat[i].innerHTML);
     longitude = parseFloat(lng[i].innerHTML);
      markers[i] = L.marker([latitude, longitude]).addTo(mymap).bindPopup("<b>"+lat[i+1].innerHTML+"<br>Route:- "+lng[i+1].innerHTML+"</b>.").openPopup();

   }

}

  </script>
</html>
