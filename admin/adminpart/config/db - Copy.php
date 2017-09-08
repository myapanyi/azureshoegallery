<?php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "root";
$DB_NAME = "azsc";
$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
mysql_select_db($DB_NAME, $conn);
?>
