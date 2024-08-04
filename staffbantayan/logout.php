<?php
session_start();
session_unset();
session_destroy();
header("Location:../stafflogin.php"); // Redirect to the login page
exit();
?>