<?php 
include 'config/db.php';
$name = $_POST['name'];
$password = $_POST['password'];
$query = mysql_query("select * from admin where username='$name' AND password='$password'");
$rows = mysql_num_rows($query);
if ($rows > 0) {
    echo $rows;
}
else
 echo $rows;

 return;
?>