<?php
include 'config/db.php';
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {

if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{


// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);


// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from admin where password='$password' AND username='$username'");
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['admin']['auth']=$username; // Initializing Session
$_SESSION['admin']['userName'] = $password;
$_SESSION['admin']['lastActivity'] = time();
header("location: index.php"); // Redirecting To Other Page

} else {
	$queryCheck = mysql_query("select * from admin where password ='$password' ");
	$rowCheck = mysql_num_rows($queryCheck);
	if ($rowCheck == 1) {
		$_SESSION['admin']["adminerror"] = "Sorry your email is not correct";


	}
	else{
		$var = 1;
	}
$queryUser = mysql_query("select * from admin where username='$username' ");
	$rowUser = mysql_num_rows($queryUser);
	if ($rowUser == 1) {
		$_SESSION['admin']["adminerror"] = "Sorry your Password is not correct";

	}else {
		$var += 1;
	}
	if ($var==2) {
		$_SESSION['admin']["adminerror"] = "Sorry your email and password are not correct.";
	}




}
header("location: adminlogin.php");

}
}



?>
