<?php
session_start();
include("../db.php");

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

// Check if client ID is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the client ID
    $client_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute the DELETE statement
    $stmt = $pdo->prepare("DELETE FROM client WHERE id = ?");
    $stmt->execute([$client_id]);

    // Check if deletion was successful
    if ($stmt->rowCount() > 0) {
        // Redirect back to registered_users.php with a success message
        header("Location: registered_users.php?success=client_deleted");
        exit();
    } else {
        // Redirect back to registered_users.php with an error message
        header("Location: registered_users.php?error=delete_failed");
        exit();
    }
} else {
    // Redirect back to registered_users.php if client ID is not provided
    header("Location: registered_users.php");
    exit();
}
?>
