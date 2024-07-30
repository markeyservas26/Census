<?php
session_start();
session_unset();
session_destroy();
header("Location: ../staff/login.php"); // Redirect to the login page
exit();
?>