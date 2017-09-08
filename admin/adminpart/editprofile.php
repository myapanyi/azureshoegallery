<?php include 'config/db.php'; // database connect to mysql ?>
<?php
session_start();
 ?>
<?php
$name = $_POST['name'];
$updateimg = $_FILES['browseimg'];
$himgpath = $_POST['himgpath'];
$adminid = $_POST['adminid'];
$password = $_POST['password'];

$newpassword = $_POST['newpassword'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];
$gender = $_POST['gender'];
$now = strtotime("now");
$profile='';
$go='';

$img['name']= mysql_real_escape_string($updateimg['name']);
$img_name = $_FILES['browseimg']['name'];
$resultRe = mysql_query("Select * from admin WHERE adminid = $adminid");
if ($row = mysql_fetch_assoc($resultRe)) {
	$checkname = $row['username'];
	$checkpassword =$row['password'];
	$checkaddress = $row['address'];
	$checkphoneno = $row['phoneno'];
	$checkgender = $row['gender'];


}

if (isset($name) && $name != '' && $name != ' ') {
if ($checkname == $name) {


}
else {

$go = 'login';

	$result = mysql_query("UPDATE admin SET username='$name',updatedDate = NOW() WHERE adminid = $adminid");

}


}
if (isset($newpassword) && $newpassword != '' && $newpassword != ' ') {

	if ($checkpassword == $newpassword) {


	}
	else {
		$go = 'login';

	$result = mysql_query("UPDATE admin SET password='$newpassword',confirmpassword='$newpassword',updatedDate = NOW() WHERE adminid = $adminid");

	}



}
if (isset($address) && $address != '' && $address != ' ') {
	if ($checkaddress == $address) {

	}
	else {


	$result = mysql_query("UPDATE admin SET address='$address',updatedDate = NOW() WHERE adminid = $adminid");
	}


}
if (isset($phoneno) && $phoneno != '' && $phoneno != ' ') {
	if ($checkphoneno == $phoneno) {

	}
	else {


	$result = mysql_query("UPDATE admin SET phno='$phoneno',updatedDate = NOW() WHERE adminid = $adminid");

	}

}
if (isset($gender) && $gender != '' && $gender != ' ') {
	if ($checkgender == $gender) {

	}
	else {


	$result = mysql_query("UPDATE admin SET gender='$gender',updatedDate = NOW() WHERE adminid = $adminid");

	}

}

if($img['name'] == "")
{

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


			$result = mysql_query("UPDATE admin SET adminphoto='$img_name',updatedDate = NOW() WHERE adminid = $adminid");

	}

		if (! $result){
			echo $go;

 			header('location: adminprofile.php');
			exit();
		} else {

			if (!empty($go)  )  {


				// Inialize session
				session_start();

				// Delete certain session
				session_unset();
				unset($_SESSION['auth']);
				unset($_SESSION['registererror']);
				unset($_SESSION['admin']["adminerror"]);

				// Jump to login page
				header('Location: adminlogin.php');
				exit();
			}
			else {
			header('location: adminprofile.php');
			exit();

			}

			}






 ?>
