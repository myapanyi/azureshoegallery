<?php 
include ('conDB.php');
$email = $_POST['cemail'];
$query = mysql_query("select * from user where email='$email'");
$rows = mysql_num_rows($query);
if ($rows > 0) {
    echo $rows;
}
else
 echo $rows;

 return;
?>