<?php
session_start();
$conn = mysqli_connect("localhost", "pc", "pc");
mysqli_query($conn, "CREATE DATABASE financedb");
$query = "CREATE TABLE financedb.login (name char(100), email char(100), password char(255), type char(100))";
mysqli_query($conn, $query);
$query = "CREATE TABLE financedb.operatorlatlng (name char(100), lat decimal(15,10), lng decimal(15,10), status char(20), route char(200))";
mysqli_query($conn, $query);
 ?>
