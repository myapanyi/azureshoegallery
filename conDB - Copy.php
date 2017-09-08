<?php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "root2";
$DB_NAME = "azsc";
$conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD);
mysqli_select_db($conn,$DB_NAME); 
?>
