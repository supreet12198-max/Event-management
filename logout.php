<?php
session_start();

// unset all session variables
$_SESSION = [];

// destroy session
session_destroy();

// prevent caching (optional but recommended)
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// redirect to login page
header("Location: login.php");
exit();
?>