<?php
session_start();
include("../db.php");

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

// Fetch all booking rows from the 'bookings' table
$stmt = $pdo->prepare("SELECT * FROM bookings");
$stmt->execute();
$bookings = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookings</title>
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
        .download-link {
            color: blue;
            text-decoration: none;
        }
        .download-link:hover {
            text-decoration: underline;
        }
        td:nth-child(5), td:nth-child(12), td:nth-child(3), td:nth-child(8) {
            max-width: 150px;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        .table-container {
            overflow: auto;
            max-height: 700px;
        }
        .button-email {
    background-color: #4CAF50; /* Green */
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

.button-respond {
    background-color: #F39C12; /* Green */
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
.button-respond:hover {
    background-color: #DC7633;
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
<div class="content">
    <h2>All Bookings</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Booking No.</th>
                    <th>Service Type</th>
                    <th>Contact Email</th>
                    <th>Phone Number</th>
                    <th>Requirements Description</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>FIN</th>
                    <th>Company</th>
                    <th>Date of Birth</th>
                    <th>Uploaded Documents</th>
                    <th>Booking Date</th>
                    <th>Status</th> <!-- New column for Status -->
                    <th>Response</th> <!-- New column for Response -->
                    <th>Quotation</th> <!-- New column for Quotation -->
                    <th>Invoice</th> <!-- New column for Invoice -->
                    <th>Email Button</th>
                    <th>Approve/Reject</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($booking['id']); ?></td>
                        <td><?php echo htmlspecialchars($booking['service_type']); ?></td>
                        <td><?php echo htmlspecialchars($booking['contact_email']); ?></td>
                        <td><?php echo htmlspecialchars($booking['phone_number']); ?></td>
                        <td><?php echo htmlspecialchars($booking['requirements_description']); ?></td>
                        <td><?php echo htmlspecialchars($booking['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($booking['username']); ?></td>
                        <td><?php echo htmlspecialchars($booking['email']); ?></td>
                        <td><?php echo htmlspecialchars($booking['fin']); ?></td>
                        <td><?php echo htmlspecialchars($booking['company']); ?></td>
                        <td><?php echo htmlspecialchars($booking['dob']); ?></td>
                        <td>
                            <?php
                            // Construct the file path
                            $filePath = "../uploads/" . $booking['upload_documents'];
                            // Check if the file exists
                            if (file_exists($filePath)) {
                                // Get the MIME type of the file
                                $fileMimeType = mime_content_type($filePath);
                                // Display the download link
                                echo '<a href="' . htmlspecialchars($filePath) . '" class="download-link" download="' . htmlspecialchars($booking['upload_documents']) . '">' . htmlspecialchars($booking['upload_documents']) . '</a>';
                            } else {
                                // Display a message if the file does not exist
                                echo 'File not found';
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($booking['booking_date']); ?></td>
                        <td>
                            <?php
                            if (empty($booking['status'])) {
                                echo 'Pending';
                            } else {
                                echo htmlspecialchars($booking['status']);
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($booking['response']); ?></td>
                        <td>
                            <?php
                            if (!empty($booking['quotation'])) {
                                echo '<a href="../uploads/' . htmlspecialchars($booking['quotation']) . '" class="download-link" download="' . htmlspecialchars($booking['quotation']) . '">Download</a>';
                            } else {
                                echo 'No Quotation';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (!empty($booking['invoice'])) {
                                echo '<a href="../uploads/' . htmlspecialchars($booking['invoice']) . '" class="download-link" download="' . htmlspecialchars($booking['invoice']) . '">Download</a>';
                            } else {
                                echo 'No Invoice';
                            }
                            ?>
                        </td>
                        <td><button class="button-email" onclick="sendEmail('<?php echo htmlspecialchars($booking['contact_email']); ?>')">Email</button></td>
                        <?php if (!empty($booking['status']) && !empty($booking['response'])): ?>
    <td><a href="editapproval.php?id=<?php echo htmlspecialchars($booking['id']); ?>" class="button-respond">Edit Response</a></td>
<?php else: ?>
                        <td><button class="button-respond" onclick="respondBooking('<?php echo htmlspecialchars($booking['fullname']); ?>', '<?php echo htmlspecialchars($booking['username']); ?>', '<?php echo htmlspecialchars($booking['service_type']); ?>', '<?php echo htmlspecialchars($booking['booking_date']); ?>')">Respond</button></td>

                    <?php endif; ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function sendEmail(contact_email) {
        window.open("mailto:" + contact_email);
    }

    function respondBooking(fullname, username, service_type, booking_date) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'adminapprove.php';

        const fullnameField = document.createElement('input');
        fullnameField.type = 'hidden';
        fullnameField.name = 'fullname';
        fullnameField.value = fullname;
        form.appendChild(fullnameField);

        const usernameField = document.createElement('input');
        usernameField.type = 'hidden';
        usernameField.name = 'username';
        usernameField.value = username;
        form.appendChild(usernameField);

        const serviceTypeField = document.createElement('input');
        serviceTypeField.type = 'hidden';
        serviceTypeField.name = 'service_type';
        serviceTypeField.value = service_type;
        form.appendChild(serviceTypeField);

        const bookingDateField = document.createElement('input');
        bookingDateField.type = 'hidden';
        bookingDateField.name = 'booking_date';
        bookingDateField.value = booking_date;
        form.appendChild(bookingDateField);

        document.body.appendChild(form);
        form.submit();
    }
</script>
</body>
</html>
