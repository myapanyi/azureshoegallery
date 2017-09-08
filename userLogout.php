<?php

// Inialize session
session_start();

// Delete certain session
if($_SESSION['auth'] == 'user')
{unset($_SESSION['auth']);
unset($_SESSION['userid']);
unset($_SESSION['customname']);
unset($_SESSION['email']);
unset($_SESSION['order']);
unset($_SESSION['lastActivity']);
unset($_SESSION['itemsession']);
unset($_SESSION['itembuy']);
unset($_SESSION["error"]);
unset($_SESSION['count']);



}

// Jump to login page
header('Location: index.php');

?>