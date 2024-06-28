<?php
session_start();
include("../db.php");

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
    <title>Admin Approve</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: rgba(44, 62, 80, 0.9);
            color: white;
            padding: 20px;
            box-sizing: border-box;
            float: left; /* Ensure the sidebar floats to the left */
            display: flex; /* Use flexbox */
            flex-direction: column; /* Arrange items vertically */
            min-height: 100vh; /* Ensure the sidebar is at least the height of the viewport */
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 0;
        }

        .sidebar a:hover {
            background-color: rgba(52, 73, 94, 0.9);
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
        }

        input, select, textarea {
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .button-submit {
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .button-submit:hover {
            background-color: #45a049;
        }

        .horizontal-fields {
            display: flex;
            justify-content: space-between;
        }

        .horizontal-fields div {
            flex: 1;
            margin-right: 10px;
        }

        .horizontal-fields div:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="https://apps.voc.ai/chatbot/#/inbox">Chatbot Management</a>
    <a href="bookings.php">Bookings</a>
    <a href="client_inquiries.php">Client Inquiries</a>
    <a href="registered_users.php">Registered Users</a>
</div>
<div class="container">
        <h2>Admin Approval</h2>
        <form action="process_response.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="fullname" value="<?php echo htmlspecialchars($_POST['fullname']); ?>">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($_POST['username']); ?>">
            <input type="hidden" name="service_type" value="<?php echo htmlspecialchars($_POST['service_type']); ?>">
            <input type="hidden" name="booking_date" value="<?php echo htmlspecialchars($_POST['booking_date']); ?>">

            <div>
                <label for="status">Status:</label><br>
                <select name="status" id="status" required>
                    <option value="">Select Status</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div><br>

            <div>
                <label for="response">Admin's Response:</label><br>
                <textarea name="response" id="response" rows="4" cols="50" placeholder="Enter response here..." required></textarea>
            </div><br>

            <div class="horizontal-fields">
                <div>
                    <label for="quotation">Quotation:</label><br>
                    <input type="file" name="quotation" id="quotation">
                </div>
                <div>
                    <label for="invoice">Invoice:</label><br>
                    <input type="file" name="invoice" id="invoice">
                </div>
            </div><br>

            <button type="submit" class="button-submit">Submit</button>
        </form>
    </div>
</body>
</html>