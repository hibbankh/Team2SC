<?php
session_start();
require '../db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

if (!isset($_GET['username'])) {
    header("Location: registered_users.php");
    exit();
}

$username = $_GET['username'];

$stmt = $pdo->prepare("SELECT * FROM client WHERE username = ?");
$stmt->execute([$username]);
$client = $stmt->fetch();


// Check if the client has a profile image
$profile_image = isset($client['profile_image']) ? $client['profile_image'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Client Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
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

        .form-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-content label, .form-content input {
            width: 100%;
            margin-bottom: 10px;
        }

        .form-content input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            pointer-events: none; /* Disable editing */
        }

        .avatar-frame {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 2px solid #ccc;
            overflow: hidden;
            margin-bottom: 20px;
            cursor: pointer; /* Add cursor pointer */
        }

        .avatar-frame img {
            width: 100%;
            height: 100%;
        }

        .avatar-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .avatar-popup img {
            max-width: 100%;
            max-height: 80vh;
            display: block;
            margin: 0 auto;
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
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
    <h2>View Client Profile</h2>
    <div class="table-container">
    <center><div class="form-content">
    <div class="avatar-frame" onclick="openPopup()">
    <?php if (isset($client['profile_image']) && !empty($client['profile_image'])): ?>
        <img src="../<?= $client['profile_image'] ?>" alt="Avatar">
    <?php else: ?>
        <img src="../img/default_avatar.png" alt="Avatar">
    <?php endif; ?>
</div>
        <div class="avatar-popup" id="avatarPopup">
            <?php if (isset($client['profile_image']) && !empty($client['profile_image'])): ?>
                <img src="../<?= $client['profile_image'] ?>" alt="Avatar">
            <?php else: ?>
                <img src="../img/default_avatar.png" alt="Avatar">
            <?php endif; ?>
            <span class="close-popup" onclick="closePopup()">X</span>
        </div>
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" id="fullname" value="<?= htmlspecialchars($client['fullname']) ?>" readonly>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($client['email']) ?>" readonly>
        <label for="fin">FIN/IC/NRIC Number:</label>
        <input type="text" name="fin" id="fin" value="<?= htmlspecialchars($client['fin']) ?>" readonly>
        <label for="company">Company:</label>
        <input type="text" name="company" id="company" value="<?= htmlspecialchars($client['company']) ?>" readonly>
        <label for="dob">Date of Birth:</label>
        <input type="text" name="dob" id="dob" value="<?= htmlspecialchars($client['dob']) ?>" readonly>
    </div></center>
</div>
            </div>
<script>
    // JavaScript code
    function openPopup() {
        // Display the pop-up
        document.getElementById('avatarPopup').style.display = 'block';
    }

    function closePopup() {
        // Close the pop-up
        document.getElementById('avatarPopup').style.display = 'none';
    }
</script>
</body>
</html>

