<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        display: flex;
        background-image: url('../admin/img/dashboardBackground.jpg'); /* Replace 'background.jpg' with your image path */
        background-size: cover;
        background-position: center;
        color: #333;
    }
    .sidebar {
        width: 250px;
        background-color: rgba(44, 62, 80, 0.9);
        color: white;
        height: 100vh;
        padding: 20px;
        box-sizing: border-box;
        min-height: 100vh; /* Ensure the sidebar is at least the height of the viewport */
    }
    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px 0;
    }
    .sidebar a:hover {
        background-color: rgba(52, 73, 94, 0.9);
    }
    .main-content {
        flex-grow: 1;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        margin: 20px;
        border-radius: 8px;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header h1 {
        margin: 0;
    }
    .logout-btn {
        background-color: #e74c3c;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    .logout-btn:hover {
        background-color: #c0392b;
    }
    .cards {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }
    .card {
        flex: 1;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .card h2 {
        margin-top: 0;
    }
    .card a {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .card a:hover {
        background-color: #2980b9;
    }
</style>
</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="https://apps.voc.ai/chatbot/#/inbox" target="_blank">Chatbot Management</a>
    <a href="bookings.php">Bookings</a>
    <a href="client_inquiries.php">Client Inquiries</a>
    <a href="registered_users.php">Registered Users</a>
    
</div>
<div class="main-content">
    <div class="header">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <div class="cards">
        <div class="card">
            <h2>Chatbot Management</h2>
            <p>Manage the chatbot <!--through the VOC AI dashboard.--></p>
            <a href="https://apps.voc.ai/chatbot/#/inbox" target="_blank">Go to Chatbot Dashboard<!--VOC AI Dashboard--></a>
        </div>
        <div class="card">
            <h2>Bookings</h2>
            <p>View and manage submitted bookings.</p>
            <a href="bookings.php">View Bookings</a>
        </div>
        <div class="card">
            <h2>Client Inquiries</h2>
            <p>View submitted contact inquiries.</p>
            <a href="client_inquiries.php">View Inquiries</a>
        </div>
        <div class="card">
            <h2>Registered Users</h2>
            <p>View and manage registered users.</p>
            <a href="registered_users.php">View Users</a>
        </div>
    </div>
</div>
</body>
</html>
