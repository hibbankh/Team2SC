<?php
session_start();
include("../db.php");

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

// Fetch booking details based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch booking details
    $stmt = $pdo->prepare("SELECT * FROM bookings WHERE id = ?");
    $stmt->execute([$id]);
    $booking = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$booking) {
        echo "Booking not found.";
        exit();
    }
} else {
    echo "ID parameter is missing.";
    exit();
}

// Update the booking details if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $response = $_POST['response'];

    // Handle file upload for quotation if provided
    if ($_FILES['quotation']['size'] > 0) {
        $uploadDir = "../uploads/";
        $quotationName = basename($_FILES['quotation']['name']);
        $quotationPath = $uploadDir . $quotationName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES['quotation']['tmp_name'], $quotationPath)) {
            // Update the quotation file in database
            $stmt = $pdo->prepare("UPDATE bookings SET status = ?, response = ?, quotation = ? WHERE id = ?");
            $stmt->execute([$status, $response, $quotationName, $id]);
        } else {
            echo "Error uploading quotation file.";
        }
    }

    // Handle file upload for invoice if provided
    if ($_FILES['invoice']['size'] > 0) {
        $uploadDir = "../uploads/";
        $invoiceName = basename($_FILES['invoice']['name']);
        $invoicePath = $uploadDir . $invoiceName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES['invoice']['tmp_name'], $invoicePath)) {
            // Update the invoice file in database
            $stmt = $pdo->prepare("UPDATE bookings SET status = ?, response = ?, invoice = ? WHERE id = ?");
            $stmt->execute([$status, $response, $invoiceName, $id]);
        } else {
            echo "Error uploading invoice file.";
        }
    }

    // Update status and response if no files were uploaded
    if (empty($_FILES['quotation']['size']) && empty($_FILES['invoice']['size'])) {
        $stmt = $pdo->prepare("UPDATE bookings SET status = ?, response = ? WHERE id = ?");
        $stmt->execute([$status, $response, $id]);
    }

    // Redirect back to bookings.php after update
    header("Location: bookings.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Approval</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
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
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        .form-actions {
            margin-top: 15px;
        }

        .button-submit {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .button-submit:hover {
            background-color: #45a049;
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
<div class="form-container">
        <h2>Edit Approval</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $booking['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="service_type">Service Type</label>
                <input type="text" id="service_type" name="service_type" value="<?php echo htmlspecialchars($booking['service_type']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($booking['fullname']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($booking['username']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($booking['status']); ?>">
            </div>
            <div class="form-group">
                <label for="response">Admin's Response</label>
                <textarea id="response" name="response" rows="4"><?php echo htmlspecialchars($booking['response']); ?></textarea>
            </div>
            <div class="form-group">
    <label for="quotation">Quotation</label>
    <?php if (!empty($booking['quotation'])): ?>
        <p><a href="../uploads/<?php echo htmlspecialchars($booking['quotation']); ?>" target="_blank"><?php echo htmlspecialchars($booking['quotation']); ?></a></p>
    <?php endif; ?>
    <input type="file" id="quotation" name="quotation">
</div>
<div class="form-group">
    <label for="invoice">Invoice</label>
    <?php if (!empty($booking['invoice'])): ?>
        <p><a href="../uploads/<?php echo htmlspecialchars($booking['invoice']); ?>" target="_blank"><?php echo htmlspecialchars($booking['invoice']); ?></a></p>
    <?php endif; ?>
    <input type="file" id="invoice" name="invoice" accept=".pdf,.doc,.docx">
    <p style="font-size: 12px; color: #777;">Upload Invoice (PDF, DOC, DOCX format)</p>
</div>

            <div class="form-actions">
                <button type="submit" class="button-submit">Update Approval</button>
                <a href="bookings.php" class="button-submit">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>