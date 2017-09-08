<?php

// Inialize session
session_start();

// Delete certain session
session_unset();
unset($_SESSION['auth']);
unset($_SESSION['registererror']);
unset($_SESSION['admin']["adminerror"]);

// Jump to login page
header('Location: adminlogin.php');

?>