<?php include 'config/db.php'; // database connect to mysql ?>
<?php
session_start();

 ?>
<?php
$name = $_POST['name'];
$updateimg = $_FILES['browseimg'];
$himgpath = $_POST['himgpath'];

$password = $_POST['password'];

$confirmpassword = $_POST['confirmpassword'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];
$gender = $_POST['gender'];
$now = strtotime("now");
$img['name']= mysql_real_escape_string($updateimg['name']);
$img_name = $_FILES['browseimg']['name'];

if($img['name'] == "")
{

	$regquery = "INSERT INTO admin (username,password, confirmpassword, address, phno,gender,adminphoto,createdDate)
	VALUES ('$name', '$password', '$confirmpassword', '$address', '$phoneno','$gender','$himgpath',NOW())";
	$result = mysql_query($regquery);
}
else {
	$imgtype =  $_FILES["browseimg"]["type"];
	$imgname = $img['name'];
	$tmp = $_FILES["browseimg"]["tmp_name"];

	if($imgtype == "image/jpeg" ||  $imgtype == "image/jpg")
	{

		//save imge to desire folder...
		$uploaddir = 'images/home/';
		$uploadfile = $uploaddir . basename($img['name']);

		$fuploadfile = fopen($uploadfile,'w+');




		move_uploaded_file($tmp, $uploadfile);


		fclose($fuploadfile);
}


			$result = mysql_query("INSERT INTO admin (username,password, confirmpassword, address, phno,gender,adminphoto,createdDate)
		    VALUES ('$name', '$password', '$confirmpassword', '$address', '$phoneno','$gender','$img_name',NOW())");

	}

		if (! $result){

			header('location: adminRegisterFail.php');
			exit();
		} else {
			$_SESSION['adminRegisterSuccess'] = $name ;
			header('location: adminRegisterSuccess.php');
		}



 ?>