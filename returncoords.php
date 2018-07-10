<?php

include 'sqlconnect.php';
include 'functions.php';
?>

<?php
global $conn;
$str = '';
$query = "SELECT name, lat, lng, route FROM financedb.operatorlatlng WHERE status = 'yes'";
if($stmt = mysqli_prepare($conn, $query))
{
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $name, $lat, $lng, $route);
  while(mysqli_stmt_fetch($stmt))
  {
    $str.='<h2>'.$lat.'</h2><h3>'.$lng.'</h3>'.'<h2>'.$name.'</h2>'.'<h3>'.$route.'</h3>';
  }






  }
echo $str;







 ?>
