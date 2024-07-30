<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['userid'])) {
    // Log out the user
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>