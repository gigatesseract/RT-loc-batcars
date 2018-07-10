<?php
include 'sqlconnect.php';
include 'functions.php';
?>
<?php
global $conn;

if(isset($_GET))
{
  $name = $_SESSION['user'];
  $lat = $_GET['lat'];
  $lng = $_GET['lng'];
  $query = "UPDATE financedb.operatorlatlng SET lat = '".$lat."', lng = '".$lng."' WHERE name = '".$name."'";
  if(!mysqli_query($conn, $query))
  echo mysqli_error($conn);
  else echo "UPdate success";
}

 ?>
