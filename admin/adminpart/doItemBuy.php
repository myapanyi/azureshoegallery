<?php
include 'config/db.php';
$itemcode = $_GET['itemcode'];
$resaleCode= $_POST['resaleCode'];
$purchaseprice = $_POST['purchaseprice'];
$sprice = $_POST['sprice'];
$sizeid = $_POST['sizeid'];
$colorid = $_POST['colorid'];
$madeinid = $_POST['madeinid'];
$categoryid = $_POST['categoryid'];
$qty = $_POST['qty'];
$imagepath = $_POST['img_path'];
$createdDate = $_POST['createdDate'];
$hiddenQTY = $_POST['hiddenQTY'];
$haveqty = $_POST['haveqty'];
$upitem = $_POST['upitem'];
 $lastqty = $haveqty-$qty;


 $queryup = "UPDATE  itemnew SET  qty = $lastqty WHERE  itemcode =  '$upitem' ";
 $resultup = mysql_query($queryup);
 if(!$resultup)
 {
 	die("my sql error".mysql_error());

 	exit();
 }
 else {
 	$queryse = "Select  qty from itemnew WHERE  itemcode =  '$upitem' ";
 	$resultse = mysql_query($queryse);
 	if ($resultse) {
 		if($growre =  mysql_fetch_assoc($resultse))
 		{
			$chqty = $growre['qty'];
			if ($chqty == 0) {
				$querydel = "DELETE FROM itemnew WHERE itemcode = '$upitem'";
				$resultdel = mysql_query($querydel);
				if(!$resultdel)
				{
					die("my sql error".mysql_error());

					exit();
				}
			}
 		}
 	}
 	else {
 		die("my sql error".mysql_error());

 	exit();}
 }


$query = "Insert into item (itemcode,pprice,sprice,sizeid,colorid,madeinid,categoryid,qty,imagepath,createdDate)
values('$resaleCode',$purchaseprice,'$sprice','$sizeid','$colorid','$madeinid','$categoryid',$qty,'$imagepath',STR_TO_DATE('$createdDate ', '%m/%d/%Y')) ";
$result = mysql_query($query);
if(!$result)
{
	die("my sql error".mysql_error());
	header("location:itemDetail.php");
	exit();
}
	$gquery = "select category from category where categoryid = '$categoryid'";
	$gresult = mysql_query($gquery);
	if($grow =  mysql_fetch_assoc($gresult))


	{
		$imgcategory = $grow['category'] ;
	}
	$file = 'images/newarrival/'.$imagepath.'';
	//save imge to desire folder...
	$uploaddir = 'images/'.$imgcategory.'/';
	$newfile = $uploaddir . basename($imagepath);

	if (!copy($file, $newfile)) {
		header("location:newArrival.php");
	}else{
	header("location:itemList.php");
	}







