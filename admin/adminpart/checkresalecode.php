<?php 
include 'config/db.php';
$itemcode = $_POST['itemcode'];
$query = mysql_query("select * from item where itemcode='$itemcode'");
$rows = mysql_num_rows($query);
if ($rows > 0) {
    echo $rows;
}
else
 echo $rows;

 return;
?>