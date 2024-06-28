<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST["name"]; 
    $email = $_POST["email"]; 
    $number = $_POST["number"];
    $subject = $_POST["subject"]; 
    $message = $_POST["message"]; 

    try {
        require_once "db.php"; 

        $query = "INSERT INTO contactus (name, email, number, subject, message) VALUES (?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$name, $email, $number, $subject, $message]);
        
        header("Location: formsubmitted.php");
        exit(); 
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: contactus.php");
}
?>