var geobutton = document.getElementById('geo');
var output = document.getElementById('div');
var lat, long;
var map = document.getElementById('map');

function locationHandler(){
  if(!navigator.geolocation){
    output.innerHTML = "Geolocaion not supported";
    return;
  }
  function success(position){
    console.log(position.coords.latitude);
  lat = position.coords.latitude;
   long = position.coords.longitude;
   output.innerHTML = '<p>Latitude is ' + lat + '° <br>Longitude is ' + long + '°</p>';
   var img = new Image();
   img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + lat + "," + long + "&zoom=13&size=300x300&sensor=false";
   img.alt = "couldnt load image";
   output.appendChild(img);

 }

  function error(){
    output.innerHTML = "Unable to retrieve your location";
  }
  output.innerHTML = "Locating...";
  navigator.geolocation.getCurrentPosition(success, error);
  var location = {
    lati: lat,
    longi: long
  };
  var map = new google.maps.Map(map, {zoom: 16, center: location});
  var marker = new google.maps.Map({position: location, map: map});

}
function initMap(){
  var location = {
    lati: lat,
    longi: long
  };
  var map = new google.maps.Map(map, {zoom: 16, center: location});
  var marker = new google.maps.Map({position: location, map: map});



}
geobutton.addEventListener("click", locationHandler);
