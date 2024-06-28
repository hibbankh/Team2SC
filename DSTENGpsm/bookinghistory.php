<?php
session_start();
include("db.php"); // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: clientlogin.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch bookings for the logged-in user
$stmt = $pdo->prepare("SELECT * FROM bookings WHERE username = ?");
$stmt->execute([$username]);
$bookings = $stmt->fetchAll();
?>
<?php include("header2.php"); ?>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

.submitted-bookings-container {
    width: 100%;
    padding: 20px 10px; /* Add 10px padding on left and right */
    margin: 0 auto; /* Center the container */
    box-sizing: border-box;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow-x: auto; /* Enable horizontal scrolling if needed */
}

.submitted-bookings-container table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    table-layout: auto; /* Ensure table can shrink to fit content */
}

.submitted-bookings-container table, .submitted-bookings-container th, .submitted-bookings-container td {
    border: 1px solid #ccc;
}

.submitted-bookings-container th, .submitted-bookings-container td {
    padding: 10px;
    text-align: left;
}

.submitted-bookings-container th {
    background-color: #f2f2f2;
}

.submitted-bookings-container a.download-link {
    color: #007bff;
    text-decoration: none;
}

.submitted-bookings-container a.download-link:hover {
    text-decoration: underline;
}

/* Set max-width and word-wrap for requirements_description column */
.submitted-bookings-container td:nth-child(4) {
    max-width: 200px; /* Set the maximum width for the requirements_description column */
    word-wrap: break-word; /* Allow long words to wrap to the next line */
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
</style>
</head>
<body>
<div class="submitted-bookings-container">
    <h2>Submitted Bookings</h2>
    <table>
        <thead>
            <tr>
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
                <th>Upload Documents</th>
                <th>Booking Date</th>
                <th>Status</th> <!-- New column for Status -->
                    <th>Response</th> <!-- New column for Response -->
                    <th>Quotation</th> <!-- New column for Quotation -->
                    <th>Invoice</th> <!-- New column for Invoice -->
                    <th>Email Button</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($bookings) > 0) { ?>
                <?php foreach ($bookings as $booking) { ?>
                    <tr>
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
    $filePath = "uploads/" . $booking['upload_documents'];
    // Check if the file exists
    if (file_exists($filePath)) {
        // Get the MIME type of the file
        $fileMimeType = mime_content_type($filePath);
        // Display the download link
        echo '<a href="' . htmlspecialchars($filePath) . '" class="download-link" download="' . htmlspecialchars($booking['upload_documents']) . '" target="_blank">' . htmlspecialchars($booking['upload_documents']) . '</a>';
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
    // Check if quotation file exists
    if (!empty($booking['quotation'])) {
        $quotationFilePath = "uploads/" . htmlspecialchars($booking['quotation']);
        // Check if the file exists
        if (file_exists($quotationFilePath)) {
            echo '<a href="' . $quotationFilePath . '" class="download-link" download="' . htmlspecialchars($booking['quotation']) . '">Download</a>';
        } else {
            echo 'File not found';
        }
    } else {
        echo 'No Quotation';
    }
    ?>
</td>


<td>
    <?php
    // Check if invoice file exists
    if (!empty($booking['invoice'])) {
        $invoiceFilePath = "uploads/" . htmlspecialchars($booking['invoice']);
        // Check if the file exists
        if (file_exists($invoiceFilePath)) {
            echo '<a href="' . $invoiceFilePath . '" class="download-link" download="' . htmlspecialchars($booking['invoice']) . '">Download</a>';
        } else {
            echo 'File not found';
        }
    } else {
        echo 'No Invoice';
    }
    ?>
</td>



                        <td><button class="button-email" onclick="window.location.href = 'mailto:dstengad2016@gmail.com'">Email</button></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="12">No bookings found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div><br><br>
</body>
</html>
<?php include("footer.php"); ?>
