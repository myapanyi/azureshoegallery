<?php
 include 'conDB.php';
 session_start();
if (isset($_SESSION['itemsession'])) {
	foreach ($_SESSION['itemsession'] as $value)
	{
		$itemcode = $value['sitemcode'];
		$userqty = $value['userqty'];
		$stockqty = $value['hqty'];
		$price = $value['price'];
		$customID = $value['customID'];
		$deliverdate = $value['deliverdate'];
		$totalprice = $price * $userqty;


		$query = "SELECT * from item where itemcode = '$itemcode'";
		$resultRow = mysql_query($query);
		$row = mysql_fetch_assoc($resultRow);
		if ($row) {

					$imgpath = $row['imagepath'];
					$categoryid = $row['categoryid'];
					$delqty = $row['qty'];
					$querycategory = "SELECT * from category where categoryid = '$categoryid'";
					$resultcategory = mysql_query($querycategory);
					$rowcategory = mysql_fetch_assoc($resultcategory);
					if ($rowcategory) {
						$category	= $rowcategory['category'];
					}
					date_default_timezone_set(UTC);
					$orderdate = date("Y-m-d");
					$queryCheck = "SELECT * from `azsc`.`order` where orderitemcode = '$itemcode' AND customID = '$customID' AND orderdeadline = '$deliverdate' ";
					$resultCheck = mysql_query($queryCheck);
					$rowCheck = mysql_fetch_assoc($resultCheck);
					if ($rowCheck) {
						$updateqty = $rowCheck['orderqty'];
						$updateqty += $userqty;

						$queryInsert = "UPDATE  `azsc`.`order` SET  `orderqty` = '$updateqty' WHERE orderitemcode = '$itemcode' AND customID = '$customID' AND orderdeadline = '$deliverdate' ";
						$result = mysql_query($queryInsert);
					}
					else{
					$queryInsert = "INSERT INTO `azsc`.`order` (`orderitemcode`, `customID`, `ordercategory`, `orderprice`,`totalprice`,`orderqty`, `orderimagepath`, `orderdate`, `orderdeadline`)
					VALUES ('$itemcode','$customID', '$category', '$price','$totalprice', '$userqty', '$imgpath','$orderdate','$deliverdate')";
					$result = mysql_query($queryInsert);
					}


					if (! $result){

						die('Invalid query: ' . mysql_error());
						exit();
					}



					if ($delqty == 0) {
						$querydel = "DELETE FROM `item` WHERE itemcode = '$itemcode'";
						$resultdel = mysql_query($querydel);


					if (! $resultdel){

						die('Invalid query: ' . mysql_error());
						exit();
					}
					}

				}
				unset($_SESSION['itemsession'][$itemcode]);


		}

		$_SESSION['itemsession']=array();
		$_SESSION['buyitem'] = array();
		header('location: thankyou.php');

	}





