<?php
session_start();
include("../db.php");

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

// Fetch all clients from the 'client' table
$stmt = $pdo->prepare("SELECT (@serial_number := @serial_number + 1) AS serial_number, id, fullname, username, email, fin, company, dob, profile_image FROM client, (SELECT @serial_number := 0) AS sn");
$stmt->execute();
$clients = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
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

        .button-edit {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 0;
            cursor: pointer;
            border-radius: 5px;
        }

        .button-delete {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 0;
            cursor: pointer;
            border-radius: 5px;
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
    <h2>Registered Users</h2>
    <div class="table-container">
    <table>
        <thead>
        <tr>
            <th>No.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>FIN/NRIC/Passport</th>
            <th>Company</th>
            <th>Date of Birth</th>
            <th>Profile Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clients as $client) { ?>
            <tr>
            <td><?php echo htmlspecialchars($client['serial_number']); ?></td>
                <td><?php echo htmlspecialchars($client['fullname']); ?></td>
                <td><?php echo htmlspecialchars($client['username']); ?></td>
                <td><?php echo htmlspecialchars($client['email']); ?></td>
                <td><?php echo htmlspecialchars($client['fin']); ?></td>
                <td><?php echo htmlspecialchars($client['company']); ?></td>
                <td><?php echo htmlspecialchars($client['dob']); ?></td>
                <td><?php echo htmlspecialchars($client['profile_image']); ?></td>
                <td>
                    <a class="button-edit" href="viewclient.php?username=<?php echo htmlspecialchars($client['username']); ?>">View</a>
                    <button class="button-delete" onclick="confirmDelete(<?php echo htmlspecialchars($client['id']); ?>)">Delete</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
        </div>
<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this client?")) {
            // Redirect to deleteclient.php with the client ID as a parameter
            window.location.href = "deleteclient.php?id=" + id;
        }
    }
</script>
</body>
</html>
