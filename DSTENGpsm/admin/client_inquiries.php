<?php
session_start();
include("../db.php");

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

// Fetch all contact inquiries from the 'contactus' table
$stmt = $pdo->prepare("SELECT * FROM contactus");
$stmt->execute();
$inquiries = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Inquiries</title>
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
            float: left;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 0;
        }

        .sidebar a:hover {
            background-color: rgba(52, 73, 94, 0.9);
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        td:nth-child(3) {
    max-width: 150px; /* Set the maximum width for the requirements_description column */
    word-wrap: break-word; /* Allow long words to wrap to the next line */
    overflow-wrap: break-word; /* Ensure long words are broken and wrapped */
}

td:nth-child(5) {
    max-width: 150px; /* Set the maximum width for the requirements_description column */
    word-wrap: break-word; /* Allow long words to wrap to the next line */
    overflow-wrap: break-word; /* Ensure long words are broken and wrapped */
}

        td:nth-child(6) {
    max-width: 150px; /* Set the maximum width for the requirements_description column */
    word-wrap: break-word; /* Allow long words to wrap to the next line */
    overflow-wrap: break-word; /* Ensure long words are broken and wrapped */
}

        .button-email {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .button-email:hover {
            background-color: #45a049;
        }
        .table-container {
            overflow: auto;
            max-height: 500px; /* Maximum height same as in bookings.php */
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="https://apps.voc.ai/chatbot/#/inbox" target="_blank">Chatbot Management</a>
    <a href="bookings.php">Bookings</a>
    <a href="client_inquiries.php">Client Inquiries</a>
    <a href="registered_users.php">Registered Users</a>
</div>

<div class="content">
    <h2>Client Inquiries</h2>
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Email</th> <!-- New column for Email button -->
            </tr>
            </thead>
            <tbody>
            <?php foreach ($inquiries as $inquiry) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($inquiry['id']); ?></td>
                    <td><?php echo htmlspecialchars($inquiry['name']); ?></td>
                    <td><?php echo htmlspecialchars($inquiry['email']); ?></td>
                    <td><?php echo htmlspecialchars($inquiry['number']); ?></td>
                    <td><?php echo htmlspecialchars($inquiry['subject']); ?></td>
                    <td><?php echo htmlspecialchars($inquiry['message']); ?></td>
                    <td><?php echo htmlspecialchars($inquiry['created_at']); ?></td>
                    <td><button class="button-email" onclick="sendEmail('<?php echo htmlspecialchars($inquiry['email']); ?>')">Email</button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function sendEmail(email) {
        window.open("mailto:" + email);
    }
</script>
</body>
</html>