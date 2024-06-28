<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password - Admin</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f2f2f2;
    }
    .container {
        width: 400px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .input-group {
        margin-bottom: 15px;
    }
    .label {
        font-weight: bold;
    }
    input[type="text"],
    input[type="password"] {
        width: calc(100% - 22px);
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #2980b9;
    }
    .error {
        color: red;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Reset Password</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the secret code is correct
        if ($_POST['secret_code'] === '9870') { // Change this to your actual secret code
            echo '
            <form action="reset_password.php" method="post">
                <div class="input-group">
                    <label for="new_password" class="label">New Password</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password" class="label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="input-group">
                    <button type="submit">Reset Password</button>
                </div>
            </form>';
        } else {
            echo '<p class="error">Invalid secret code!</p>';
        }
    } else {
        echo '
        <form action="" method="post">
            <div class="input-group">
                <label for="secret_code" class="label">Enter Secret Code</label>
                <input type="text" id="secret_code" name="secret_code" required>
            </div>
            <div class="input-group">
                <button type="submit">Submit</button>
            </div>
        </form>';
    }
    ?>
</div>
</body>
</html>
