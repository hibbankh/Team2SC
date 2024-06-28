<?php
session_start();
require 'db.php';
ob_start(); // Start output buffering

if (!isset($_SESSION['username'])) {
    header("Location: clientlogin.php");
    exit();
}

$username = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT * FROM client WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

$updateSuccess = false; // Initialize update success flag

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file is uploaded
    if ($_FILES['profile_image']['name']) {
        $file_name = $_FILES['profile_image']['name'];
        $file_size = $_FILES['profile_image']['size'];
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        $file_type = $_FILES['profile_image']['type'];
        
        $file_name_parts = explode('.', $file_name);
        $file_ext = strtolower(end($file_name_parts));
        
        $extensions = array("jpeg", "jpg", "png");

        if (!in_array($file_ext, $extensions)) {
            echo "Extension not allowed, please choose a JPEG or PNG file.";
            exit();
        }

        if ($file_size > 2097152) {
            echo 'File size must be under 2 MB';
            exit();
        }

        $file_path = "uploads/" . $file_name; // Define the directory to save the file
        
        // Save the file to the directory
        move_uploaded_file($file_tmp, $file_path);

        // Update the database with the image URL
        $updateStmt = $pdo->prepare("UPDATE client SET profile_image = ? WHERE username = ?");
        $updateSuccess = $updateStmt->execute([$file_path, $username]);
        
        // Update $user['profile_image'] to reflect the new image URL
        $user['profile_image'] = $file_path;
    }

    // Handle other form fields update (fullname, email, etc.)
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $fin = $_POST['fin'];
    $company = $_POST['company'];
    $dob = $_POST['dob'];

    $updateStmt = $pdo->prepare("UPDATE client SET fullname = ?, email = ?, fin = ?, company = ?, dob = ? WHERE username = ?");
    $updateSuccess = $updateStmt->execute([$fullname, $email, $fin, $company, $dob, $username]);

    // Check if the update was successful
    if ($updateSuccess) {
        // Set a session variable to indicate successful update
        $_SESSION['updateSuccess'] = true;

        // Use the Post/Redirect/Get (PRG) pattern to redirect after form submission
        header("Location: profile.php");
        exit();
    }
}
?>

<?php include("header2.php"); ?>

<style>
    /* Center the container */
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

    .form-content label, .form-content input {
        width: 100%;
        margin-bottom: 10px;
    }

    .form-content input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-content button {
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

    .form-content button:hover {
        background-color: #F08000;
    }

    .avatar-frame {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 2px solid #ccc;
        cursor: pointer;
        overflow: hidden;
        position: relative;
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

    /* Success message */
    #updateSuccessMessage {
        color: green;
        margin-bottom: 20px;
        text-align: center;
    }
</style>
</head>
<body>
<div class="form-container">
    <div class="form-content">
        <div class="avatar-frame" id="avatarFrame">
            <!-- PHP code to display the user's avatar image -->
            <?php if (isset($user['profile_image'])): ?>
                <img src="<?= $user['profile_image'] ?>" alt="Avatar" onclick="openPopup()">
            <?php else: ?>
                <img src="img/default_avatar.png" alt="Avatar" onclick="openPopup()">
            <?php endif; ?>
        </div>
        <div class="avatar-popup" id="avatarPopup">
            <img id="popupImage" src="" alt="Avatar">
            <span class="close-popup" onclick="closePopup()">X</span>
        </div>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="profile_image" id="newAvatar" style="display: none;" accept="image/*">
            <button type="button" onclick="openFileBrowser()">Upload New Image</button>
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" placeholder="Full Name" value="<?= htmlspecialchars($user['fullname']) ?>" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($user['email']) ?>" required>
            <label for="fin">FIN/IC/NRIC Number:</label>
            <input type="text" name="fin" id="fin" placeholder="FIN/IC/NRIC Number" value="<?= htmlspecialchars($user['fin']) ?>" required>
            <label for="company">Company:</label>
            <input type="text" name="company" id="company" placeholder="Company" value="<?= htmlspecialchars($user['company']) ?>">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" placeholder="Date of Birth" value="<?= htmlspecialchars($user['dob']) ?>" required>
            <button type="submit">Update</button>
            <?php if (isset($_SESSION['updateSuccess']) && $_SESSION['updateSuccess']): ?>
                <p id="updateSuccessMessage">Updated Successfully</p>
                <script>
                    // Function to hide the success message after 5 seconds
                    setTimeout(function() {
                        document.getElementById('updateSuccessMessage').style.display = 'none';
                    }, 5000);
                </script>
                <?php unset($_SESSION['updateSuccess']); // Unset the session variable after displaying the message ?>
            <?php endif; ?>
        </form>
    </div>
</div>

    <script>
    // JavaScript code
    function openPopup() {
        // Get the current profile image URL
        var profileImageSrc = document.getElementById('avatarFrame').getElementsByTagName('img')[0].src;
        
        // Set the source of the pop-up image
        document.getElementById('popupImage').src = profileImageSrc;
        
        // Display the pop-up
        document.getElementById('avatarPopup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('avatarPopup').style.display = 'none';
    }

    function openFileBrowser() {
        document.getElementById('newAvatar').click();
    }

    document.getElementById('newAvatar').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var imgSrc = e.target.result;
            document.getElementById('avatarFrame').innerHTML = '<img src="' + imgSrc + '" alt="Avatar">';
        };
        reader.readAsDataURL(file);
    });
    </script>


</body>
</html>
<?php include("footer.php"); ?>
<?php ob_end_flush(); // Flush the output buffer at the end of the script execution ?>

