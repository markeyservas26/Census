<?php
// Include the function to unblock the device
require 'block_server.php'; // Include your script where unblockDevice function is defined

// Get the user-agent from the URL parameter
if (isset($_GET['user_agent'])) {
    $user_agent = urldecode($_GET['user_agent']);
    
    // Call the unblock function
    unblockDevice($user_agent);
    
    // Redirect back to a confirmation page or the admin page
    header('Location: index?message=Device+Unblocked');
    exit();
}
?>
