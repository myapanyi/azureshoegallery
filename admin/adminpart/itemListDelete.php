<?php
include("config/db.php");
$itemcode = $_GET['itemcode'];

if($itemcode != null){
$result = mysql_query("Delete FROM item WHERE itemcode='$itemcode'");

	if (!$result) {
    	die('Invalid query: ' . mysql_error());

        header( 'location: itemList.php' ) ;
        exit();
	} else {
	header("location:itemList.php");
		}
}

?>
