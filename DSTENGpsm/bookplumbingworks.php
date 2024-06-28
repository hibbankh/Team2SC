<?php
session_start();
require 'db.php';

// Check if user is not logged in, then redirect to clientlogin.php
if (!isset($_SESSION['username'])) {
    header("Location: clientlogin.php");
    exit;
}

// Assuming user details are stored in $_SESSION['userDetails']
$userDetails = $_SESSION['userDetails'];

// Access user details from $userDetails array
$username = isset($userDetails['username']) ? $userDetails['username'] : '';
$user_email = isset($userDetails['email']) ? $userDetails['email'] : '';
$fullname = isset($userDetails['fullname']) ? $userDetails['fullname'] : '';
$fin = isset($userDetails['fin']) ? $userDetails['fin'] : '';
$company = isset($userDetails['company']) ? $userDetails['company'] : '';
$dob = isset($userDetails['dob']) ? $userDetails['dob'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_type = "Plumbing Works";
    $contact_email = $_POST['contact_email'];
    $phone_number = $_POST['phone_number'];
    $requirements_description = $_POST['requirements_description'];

    // Handle file upload
    $upload_documents = '';
    if (isset($_FILES['upload_documents']) && $_FILES['upload_documents']['error'] == 0) {
        $file_tmp = $_FILES['upload_documents']['tmp_name'];
        $file_name = $_FILES['upload_documents']['name'];
        $file_size = $_FILES['upload_documents']['size'];
        $file_type = $_FILES['upload_documents']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Define the allowed file extensions
        $allowed_ext = array("pdf", "doc", "docx", "xls", "xlsx", "jpg", "jpeg", "png");

        // Check if the file extension is allowed
        if (in_array($file_ext, $allowed_ext)) {
            // Define the target directory for file uploads
            $upload_dir = "uploads/";

            // Create the upload directory if it doesn't exist
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Generate a unique file name to avoid overwriting existing files
            $new_file_name = uniqid() . "_" . basename($file_name);
            $target_file = $upload_dir . $new_file_name;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file_tmp, $target_file)) {
                $upload_documents = $new_file_name;
            } else {
                echo "Error: Failed to upload file.";
                exit;
            }
        } else {
            echo "Error: Invalid file type.";
            exit;
        }
    }

    try {
        // Prepare and bind
        $stmt = $pdo->prepare("INSERT INTO bookings (service_type, contact_email, phone_number, requirements_description, fullname, username, email, fin, company, dob, upload_documents) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$service_type, $contact_email, $phone_number, $requirements_description, $fullname, $username, $user_email, $fin, $company, $dob, $upload_documents]);

        // Redirect to booked.php after successful booking
        header("Location: booked.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<?php include("header2.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Page</title>
    <style>
        /* Center the form container */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f9f9; /* Optional: a light background for the page */
        }

        /* Style the form */
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

        .form-content label, .form-content input, .form-content textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        .form-content input, .form-content textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-content button, .form-content input[type="submit"] {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            background-color: #FFAA33;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .form-content button:hover, .form-content input[type="submit"]:hover {
            background-color: #F08000;
        }
    </style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");
        const emailField = document.getElementById("contact_email");
        const phoneField = document.getElementById("phone_number");
        const requirementsField = document.getElementById("requirements_description");

        phoneField.addEventListener("input", function(event) {
            const phonePattern = /^\+?[0-9]*$/;
            if (!phonePattern.test(event.target.value)) {
                event.target.value = event.target.value.replace(/[^+0-9]/g, "");
                alert("Please enter a valid phone number (only numbers and the '+' sign allowed).");
            }
        });

        form.addEventListener("submit", function(event) {
            let isValid = true;

            // Email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailField.value)) {
                console.log("Invalid email:", emailField.value);
                alert("Please enter a valid email address.");
                isValid = false;
            }

            // Phone number validation
            const phonePattern = /^\+?[0-9]{5,15}$/;
            if (!phonePattern.test(phoneField.value)) {
                console.log("Invalid phone number:", phoneField.value);
                alert("Please enter a valid phone number (only numbers and the '+' sign allowed, between 5 and 15 characters).");
                isValid = false;
            }

            // Ensure all required fields are filled
            if (!emailField.value || !phoneField.value || !requirementsField.value) {
                console.log("Missing required fields");
                alert("Please fill in all required fields.");
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    });
</script>
</head>
<body>
<div class="form-container">
    <div class="form-content">
        <h2>Book Plumbing Works</h2><br>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="service_type">Service Type:</label><br>
            <input type="text" id="service_type" name="service_type" value="Plumbing Works" readonly><br><br>
            
            <label for="contact_email">Contact Email:</label><br>
            <input type="email" id="contact_email" name="contact_email" required><br><br>
            
            <label for="phone_number">Phone Number:</label><br>
            <input type="tel" id="phone_number" name="phone_number" required><br><br>
            
            <label for="requirements_description">Requirements Description:</label><br>
            <textarea id="requirements_description" name="requirements_description" required></textarea><br><br>

            <label for="upload_documents">Upload Relevant Documents: (Optional)</label><br>
            <input type="file" id="upload_documents" name="upload_documents"><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
<?php include("footer.php"); ?>