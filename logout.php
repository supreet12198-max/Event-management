<?php
session_start();

// UNSET ALL SESSION VARIABLES
$_SESSION = [];

// DESTROY SESSION
session_destroy();

// PREVENT CACHE
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// ALERT + REDIRECT
echo "<script>
        alert('Logout Successfully');
        window.location='login.php';
      </script>";
?>
