<?php
include 'config/db.php';
$updateimg = $_FILES['browseimg'];
$himgpath = $_POST['himgpath'];
$itemcode = $_GET['itemcode'];
$sprice = $_POST['sprice'];
$size = $_POST['size'];
$color = $_POST['color'];
$madein = $_POST['madein'];
$category =$_POST['category'];
$hcategory= $_POST['hcategory'];
$qty = $_POST['qty'];
$query = "update ";
$img['name']= mysql_real_escape_string($updateimg['name']);
$gquery = "select category from category where categoryid = '$category'";
$gresult = mysql_query($gquery);
if($grow =  mysql_fetch_assoc($gresult))
{
	$imgcategory = $grow['category'] ;
}


if($img['name'] == "")
{
	$query = "Update item Set sprice = '$sprice',sizeid='$size',colorid='$color',madeinid='$madein',categoryid='$category',qty='$qty',updatedDate = NOW() where itemcode = '$itemcode'";

			    		$source= "images/".$hcategory."/".$himgpath;
						 $dest = "images/".$imgcategory."/".$himgpath;

						 	function stream_copy($src, $dest)
							{
								$fsrc = fopen($src,'r+');
								$fdest = fopen($dest,'w+');
								$len = stream_copy_to_stream($fsrc,$fdest);
								fclose($fsrc);
								fclose($fdest);
								return $len;
							}

							if(!file_exists($dest)){
						stream_copy($source, $dest);}

					$result = mysql_query($query);
					if (!$result) {
						die('Invalid query: ' . mysql_error());

						header( 'location: itemListUpdate.php' ) ;
						exit();
					}
					header("location:itemList.php");

}
else {
    $imgtype =  $_FILES["browseimg"]["type"];
	$imgname = $img['name'];
	$tmp = $_FILES["browseimg"]["tmp_name"];

	    if($imgtype == "image/jpeg" ||  $imgtype == "image/jpg")
	    {

	    	//save imge to desire folder...
	    	$uploaddir = 'images/'.$imgcategory.'/';
	    	$uploadfile = $uploaddir . basename($img['name']);

	    	$fuploadfile = fopen($uploadfile,'w+');




	    		move_uploaded_file($tmp, $uploadfile);


	        fclose($fuploadfile);


	        $query = "Update item Set sprice = '$sprice',sizeid='$size',colorid='$color',madeinid='$madein',categoryid='$category',qty='$qty',imagepath='$imgname',updatedDate = NOW() where itemcode = '$itemcode'";

	        $result = mysql_query($query);
	        if (!$result) {
	            die('Invalid query: ' . mysql_error());
	            $_SESSION['error2'] = "SQL Query Error Occurs.";
	            header( 'location: itemListUpdate.php' ) ;
	            exit();
	        }
	         header("location:itemList.php");
	    }

    }
?>
