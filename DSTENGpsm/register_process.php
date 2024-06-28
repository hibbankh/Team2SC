<?php
require_once 'db.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the JSON request body
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    // Extract the data from the JSON object
    $fullname = $data['fullname'];
    $username = $data['username'];
    $email = $data['email'];
    $fin = $data['fin'];
    $company = $data['company'];
    $dob = $data['dob'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    try {
        // Check if username or email already exists
        $checkQuery = "SELECT * FROM client WHERE username = :username OR email = :email";
        $checkStmt = $pdo->prepare($checkQuery);
        $checkStmt->bindParam(':username', $username);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();
        
        if ($checkStmt->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'Username or email already exists. Please use a different one.']);
            exit;
        }
        
        // Insert new user
        $sql = "INSERT INTO client (fullname, username, email, fin, company, dob, password) VALUES (:fullname, :username, :email, :fin, :company, :dob, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':fin', $fin);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Registration is successful. Please log in to continue.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Registration failed. Please try again.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?>