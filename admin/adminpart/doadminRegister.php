<?php include 'config/db.php'; // database connect to mysql ?>
<?php
session_start();

 ?>
<?php
$updateimg = $_FILES['browseimg'];
$himgpath = $_POST['himgpath'];
$name = $_POST['name'];

$gender = $_POST['gender'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];
$img['name']= mysql_real_escape_string($updateimg['name']);
$img_name = $_FILES['browseimg']['name'];


if($img['name'] == "")
{
$regquery = "INSERT INTO admin (username,password, confirmpassword, address, phno,gender,adminphoto,createdDate)
		    VALUES ('$name', '$password', '$confirmpassword', '$address', '$phoneno','$gender','$himgpath', NOW() )";
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


		$regquery = "INSERT INTO admin (username,password, confirmpassword, address, phno,gender,adminphoto,createdDate)
		    VALUES ('$name', '$password', '$confirmpassword', '$address', '$phoneno','$gender','$img_name',NOW())";
		$result = mysql_query($regquery);


	}

}

		if (! $result){

			header('location: loginRegister.php');
			exit();
		} else {

			unset($_SESSION['registererror']);
			unset($_SESSION['admin']["adminerror"]);
			$_SESSION['adminRegisterSuccess'] = $name ;
			header('location: newRegisterSuccess.php');
		}



 ?>