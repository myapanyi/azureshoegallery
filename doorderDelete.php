<?php
include('conDB.php');
$sessionID = $_GET['itemcode'];
session_start();


if($_SESSION['auth'] == 'user')
{
	if (isset($_SESSION['itemsession'][$sessionID])) {

		$itemcode = $_SESSION['itemsession'][$sessionID]['sitemcode'];
		$userqty = $_SESSION['itemsession'][$sessionID]['userqty'];

		$price = $_SESSION['itemsession'][$sessionID]['price'];;



		$query = "SELECT * from item where itemcode = '$itemcode'";
		$resultRow = mysql_query($query);
		$row = mysql_fetch_assoc($resultRow);
		if ($row) {
			$qtyready = $row['qty'];
			$totalqty = $qtyready + $userqty;
			$queryUpdate = "Update item Set qty='$totalqty',updatedDate = NOW() where itemcode = '$itemcode'";
			$result=mysql_query($queryUpdate);

			if (! $result){

				die('Invalid query: ' . mysql_error());
				exit();
			}

		}




	}

		unset($_SESSION['itemsession'][$sessionID]);
		unset($_SESSION['buyitem'][$sessionID]);

		unset($_SESSION['buyamount'] );
		unset( $_SESSION['count']);

}


header('Location: orderCart.php');
?>