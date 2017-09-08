<?php


	// Include database connection settings
	include('conDB.php');
	session_start();
	if (isset($_SESSION["erroruserformat"]))
	{
		unset($_SESSION["erroruserformat"]);
	}
	if (isset($_SESSION["error"]))
	{
		unset($_SESSION["error"]);
	}
	$itemcode = $_POST['orderitem'];
	$userqty = $_POST['userqty'];
	$hqty =  $_POST['hqty'];
	$sprice =   $_POST['sprice'] ;
	$deliverdate =   $_POST['deliverdate'] ;

	$orderlogin =   $_POST['orderlogin'] ;
	if ($_POST) {
		if ($_POST['latestlogin']) {
			$latestlogin = $_POST['latestlogin'];
		}
	$email = $_POST['email'];
	$password = $_POST['password'];
	}
	

	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (isset($_POST['afterregisterlogin'])) {
		$afterregisterlogin = $_POST['afterregisterlogin'];
	}

	if (empty($_POST['email']) || empty($_POST['password'])) {
		if(empty($itemcode))
		{
			
			header("location: index.php");
		}
		else {
			
			header("location: userLogin.php?itemcode=$itemcode&userqty=$userqty&hqty=$hqty&sprice=$sprice&deliverdate=$deliverdate");
		}

	}
	else
	{
		if (isset($_SESSION["erroruserformat"])) {
			unset($_SESSION["erroruserformat"]);
		}


	// Define $username and $password
	$email=$_POST['email'];
	$password=$_POST['password'];

	// To protect MySQL injection for Security purpose
	$email = stripslashes($email);
	$password = stripslashes($password);
	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);


	// SQL query to fetch information of registerd users and finds user match.
	$query = mysql_query("select * from user where email='$email' AND password='$password'");
	$row = mysql_fetch_assoc($query);
	$count = mysql_num_rows($query);

	if ($count == 1) {

				$_SESSION['auth'] = 'user';
				$_SESSION['userid'] = $row['userid'];
				$_SESSION['customname'] = $row['customname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['order'] = 'empty';
				$_SESSION['lastActivity'] = time();
				$_SESSION['itemsession']=array();
				$_SESSION['buyitem'] = array();
				$_SESSION['count'] = 0;
				if (isset($_POST['orderitem'])) {
					unset($_SESSION["erroruserorder"]);


					header("location: orderCart.php?itemcode=$itemcode&userqty=$userqty&hqty=$hqty&sprice=$sprice&deliverdate=$deliverdate");
				}
				else {
					header("location: index.php");
				}
	}
	else
	{
		if (!empty($orderlogin)) {
				$queryCheck = mysql_query("select * from user where password ='$password' ");
			$rowCheck = mysql_num_rows($queryCheck);
			if ($rowCheck == 1) {
				$_SESSION["orderemailerror"] = "Email address is not correct";


			}
			else{
				$var = 1;
			}
		$queryUser = mysql_query("select * from user where email='$email' ");
			$rowUser = mysql_num_rows($queryUser);
			if ($rowUser == 1) {
				$_SESSION["orderpassworderror"] = "Password is not correct";

			}else {
				$var += 1;
			}
			if ($var==2) {
				 $_SESSION["erroruserorder"]= "Sorry,Email and Password not correct.";
			}
		
			header("location: userLogin.php?itemcode=$itemcode&userqty=$userqty&hqty=$hqty&sprice=$sprice&deliverdate=$deliverdate");
		}
		elseif (!empty($afterregisterlogin)) {
				$queryCheck = mysql_query("select * from user where password ='$password' ");
			$rowCheck = mysql_num_rows($queryCheck);
			if ($rowCheck == 1) {
				$_SESSION["afterregisteremail"] = "Email address is not correct";


			}
			else{
				$var = 1;
			}
		$queryUser = mysql_query("select * from user where email='$email' ");
			$rowUser = mysql_num_rows($queryUser);
			if ($rowUser == 1) {
				$_SESSION["afterregisterpassword"] = "Password is not correct";

			}else {
				$var += 1;
			}
			if ($var==2) {
				$_SESSION["afterregistererror"] = "Sorry your email and password are not correct.";
			}
		
		header("location: userRegisterLogin.php");
		}
		else{
				$queryCheck = mysql_query("select * from user where password ='$password' ");
			$rowCheck = mysql_num_rows($queryCheck);
			if ($rowCheck == 1) {
				$_SESSION['user']["emailerror"] = "Email address is not correct";


			}
			else{
				$var = 1;
			}
		$queryUser = mysql_query("select * from user where email='$email' ");
			$rowUser = mysql_num_rows($queryUser);
			if ($rowUser == 1) {
				$_SESSION['user']["usererror"] = "Password is not correct";

			}else {
				$var += 1;
			}
			if ($var==2) {
				$_SESSION["error"] = "Sorry your email and password are not correct.";
			}
		
		header("location: index.php");
		}
	}

}

}

?>
