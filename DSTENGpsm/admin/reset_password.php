<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'dsteng');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        // Update password in the database
        $hashed_password = md5($new_password); // You should use more secure hashing algorithms
        $sql = "UPDATE admin SET password = '$hashed_password'";
        if ($conn->query($sql) === TRUE) {
            echo '<p>Password reset successfully!</p>';
            // Redirect back to admin login page after 3 seconds
            echo '<meta http-equiv="refresh" content="3;url=adminlogin.php">';
        } else {
            echo '<p>Error updating password: ' . $conn->error . '</p>';
        }
    } else {
        echo '<p class="error">Passwords do not match!</p>';
    }
}
?>
