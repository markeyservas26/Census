<?php
// Include the function to block the device
require 'block_device.php'; // Include your script where blockDevice function is defined

// Get the user-agent from the URL parameter
if (isset($_GET['user_agent'])) {
    $user_agent = urldecode($_GET['user_agent']);
    
    // Call the block function
    blockDevice($user_agent);
    
    // Redirect back to a confirmation page or the admin page
    header('Location:index?message=Device+Blocked');
    exit();
}
?>
