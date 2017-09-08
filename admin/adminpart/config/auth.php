<?php
	session_start();
	if($_SESSION['auth'] != 'admin') {
	header( 'location: adminlogin.php' ) ;
	exit();
	}

	if ( (isset($_SESSION['lastActivity'])) && (time() - $_SESSION['lastActivity'] > 1800) ) {
		session_unset();
		session_destroy();
	}

	$_SESSION['lastActivity'] = time();

?>

