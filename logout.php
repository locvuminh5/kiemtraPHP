<?php
// Start the session
session_start();

// $_SESSION = array();

session_destroy();

// Redirect to the login page
header("location: login.php");
exit();
?>