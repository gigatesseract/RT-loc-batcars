<?php
include 'sqlconnect.php';
include 'functions.php';


 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>hi</title>
  </head>
  <body>
    <?php
    echo "Welcome. You are logged in as ".$_SESSION['user'];
    $query = "UPDATE financedb.operatorlatlng SET status = ? WHERE name = ?";
    if($stmt = mysqli_prepare($conn, $query))
    {
      $status = "yes";
      mysqli_stmt_bind_param($stmt, 'ss', $status, $_SESSION['user']);
      mysqli_stmt_execute($stmt);
    }


     ?>
     <p>Click <a href="/login.php">here</a> to log out</p>
     <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post">
     <label for="route">Choose a route</label><br>
     <input type="radio" name="route" value="Admin block => Opal => Beryl => Workshop => LHC => Archi => Ojas" checked>Admin block => Opal => Beryl => Workshop => LHC => Archi => Ojas<br>
     <input type="radio" name="route" value="LHC => Admin => NSO => Library => Opal =>Shopping Complex => Silver Jubilee">LHC => Admin => NSO => Library => Opal =>Shopping Complex => Silver Jubilee<br>
     <input type="submit" name="submitroute" value= <?php if(isset($_POST['routeset'])) echo "Change_route"; else echo 'Go';?>>
     <input type="hidden" name="routeset" value="routeset">
     </form>
  </body>
<?php
echo 'Your route is currently:- ';
if(isset($_POST['route']))
echo $_POST['route'];
else echo 'Not set' ?>
<?php

if(isset($_POST['routeset'])){
  process_route();

}
function process_route(){
global $conn;
$route = $_POST['route'];
$query = "UPDATE financedb.operatorlatlng SET route = ? WHERE name = ?";
if($stmt = mysqli_prepare($conn, $query))
{
  mysqli_stmt_bind_param($stmt, 'ss', $route, $_SESSION['user']);
  mysqli_stmt_execute($stmt);
}

}

?>

  <script>
var xhr = new XMLHttpRequest();
var watchId, lat, lng;
  function success(pos){
   lat = pos.coords.latitude;
   lng  = pos.coords.longitude;
   console.log(lng);
    xhr.open("GET","updatecoords.php?lat="+lat+"&lng="+lng);
    xhr.send();

  }
  xhr.onreadystatechange = function(){
    if(this.readyState==4)console.log(xhr.responseText);
  }
  //navigator.geolocation.getCurrentPosition(success);
   watchId = navigator.geolocation.watchPosition(success);

  </script>
</html>
