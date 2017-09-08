<?php
	include ('conDB.php');
	session_start();

	$userid = $_SESSION['userid'];
	$name = $_POST['cname'];
	$email = $_POST['cemail'];
	$password = $_POST['cpassword'];
	$newpassword = $_POST['newpassword'];
	$address = $_POST['caddress'];
	$phoneno = $_POST['cphno'];
	$profile='';
	$go='';
	$query = mysql_query("select * from user where email='$email' ");
$rowch = mysql_fetch_assoc($query);
$count = mysql_num_rows($query);
if ($count > 1) {
	$_SESSION['userregerror'] = "Sorry Profile Edit Fail.. User Already exit with this email..";
	header('location: myprofile.php');//to write
	exit();


}

	$resultSet = mysql_query("select * from user where userid= $userid");

	$row = mysql_fetch_assoc($resultSet);
	if($row){
		$username = $row['customname'];
		$useremail = $row['email'];
		$userpassword = $row['password'];
		$useraddress = $row['address'];
		$userphoneno = $row['phno'];
	}
	if (isset($name) && $name != '' && $name != ' ') {
		if ($username == $name) {


		}
		else {
			$result = mysql_query("UPDATE user SET customname='$name',updatedDate = NOW() WHERE userid = $userid");
		}


	}
	if (isset($email) && $email != '' && $email != ' ') {
		if ($useremail == $email) {


		}
		else {
			$go = 'logout';

			$result =mysql_query("UPDATE user SET email='$email',updatedDate = NOW() WHERE userid = $userid");
		}

	}
	if (isset($newpassword) && $newpassword != '' && $newpassword != ' ') {
		if ($userpassword == $newpassword) {


		}
		else {
			$go = 'logout';

		$result=mysql_query("UPDATE user SET password='$newpassword',cpassword='$newpassword',updatedDate = NOW() WHERE userid = $userid");
}

	}

	if (isset($address) && $address != '' && $address != ' ') {
		$result=mysql_query("UPDATE user SET address='$address',updatedDate = NOW() WHERE userid = $userid");

	}

	if (isset($phoneno)&& $phoneno != '' && $phoneno != ' ') {

			$result=mysql_query("UPDATE user SET phno='$phoneno',updatedDate = NOW() WHERE userid = $userid");


	}


	if (! $result){

		 header("location: myprofile.php");
		 exit();
	}
	else{
		if (!empty($go)  )  {


			unset($_SESSION['userregerror']);

			header('Location: userLogout.php');
			exit();
		}
		else {
			unset($_SESSION['userregerror']);
			header("location: myprofile.php");
			exit();
		}
	}



?>
