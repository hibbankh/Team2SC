<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    $service_type = htmlspecialchars($_POST['service_type']);
    $booking_date = htmlspecialchars($_POST['booking_date']);
    $status = $_POST['status'];
    $response = $_POST['response'];
    $quotation = $_FILES['quotation']['name'];
    $invoice = $_FILES['invoice']['name'];

    // Handle file uploads
    $uploadDir = "../uploads/";
    $quotationPath = $uploadDir . basename($quotation);
    $invoicePath = $uploadDir . basename($invoice);

    // Move uploaded files to the uploads directory
    move_uploaded_file($_FILES['quotation']['tmp_name'], $quotationPath);
    move_uploaded_file($_FILES['invoice']['tmp_name'], $invoicePath);

    // Update database with response and files
    $stmt = $pdo->prepare("UPDATE bookings SET status = ?, response = ?, quotation = ?, invoice = ? WHERE username = ? AND booking_date = ?");
    $stmt->execute([$status, $response, $quotation, $invoice, $username, $booking_date]);

    // Redirect back to the bookings page or wherever appropriate
    header("Location: bookings.php");
    exit();
}
?>
