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


			$result = mysql_query("UPDATE user SET customname='$name' WHERE userid = $userid");



	}
	if (isset($email) && $email != '' && $email != ' ') {

			$result =mysql_query("UPDATE user SET email='$email' WHERE userid = $userid");


	}
	if (isset($newpassword) && $newpassword != '' && $newpassword != ' ') {

		$result=mysql_query("UPDATE user SET password='$newpassword',cpassword='$newpassword' WHERE userid = $userid");


	}

	if (isset($address) && $address != '' && $address != ' ') {
		$result=mysql_query("UPDATE user SET address='$address' WHERE userid = $userid");

	}

	if (isset($phoneno)&& $phoneno != '' && $phoneno != ' ') {

			$result=mysql_query("UPDATE user SET phno='$phoneno' WHERE userid = $userid");


	}




		 header("location: myprofile.php");


?>

