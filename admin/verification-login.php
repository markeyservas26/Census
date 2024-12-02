<!-- email_input.php -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Gmail for Verification</title>
</head>
<body>
    <h2>Enter your Gmail to Verify</h2>
    <form action="../action/send-verification.php" method="POST">
        <label for="userEmail">Enter your Gmail:</label>
        <input type="email" id="userEmail" name="email" required>
        <button type="submit">Send Verification Email</button>
    </form>
</body>
</html>
