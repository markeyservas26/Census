<?php
// Include the session and database connection files
include '../session.php';
include '../database/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['userid'] = $id;
            $_SESSION['name'] = $name;

            // SweetAlert for successful login
            echo '<script>
                    setTimeout(function() {
                        Swal.fire({
                            icon: "success",
                            title: "Login Successfully",
                            text: "Welcome, ' . $name . '!",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "../admin/index.php"; // Redirect to dashboard or protected page
                            }
                        });
                    }, 100);
                  </script>';
        } else {
            // Invalid password, show SweetAlert
            echo '<script>
                    setTimeout(function() {
                        Swal.fire({
                            icon: "error",
                            title: "Invalid Login",
                            text: "Username or password is incorrect!",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "../admin/login.php"; // Redirect back to login page
                            }
                        });
                    }, 100);
                  </script>';
        }
    } else {
        // No user found, show SweetAlert
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "error",
                        title: "Invalid Login",
                        text: "Username or password is incorrect!",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "../admin/login.php"; // Redirect back to login page
                        }
                    });
                }, 100);
              </script>';
    }

    $stmt->close();
    $conn->close();
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
