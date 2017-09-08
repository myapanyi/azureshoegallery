<?php include 'conDB.php'; // database connect to mysql ?>
<?php
session_start();

 ?>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];

$query = mysql_query("select * from user where email='$email' ");
$row = mysql_fetch_assoc($query);
$count = mysql_num_rows($query);
if ($count > 0) {

	header('location: userRegisterFail.php');
	exit();


}


	$result = mysql_query("INSERT INTO user (customname, email, password, cpassword, address, phno)
    VALUES ('$name', '$email', '$password', '$confirmpassword', '$address', '$phoneno')");


	if (! $result){

		header('location: userRegister.php');
		exit();
	} else {
		$_SESSION['userRegisterSuccess'] = $name ;

		header('location: userRegisterSuccess.php');
	}



 ?>