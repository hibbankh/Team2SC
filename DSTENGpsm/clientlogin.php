<?php
session_start();
include("db.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Using PDO for database operations
    $stmt = $pdo->prepare("SELECT * FROM client WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // User authentication successful, store user details in session
        $_SESSION['username'] = $user['username'];
        
        // Store all user details in session
        $_SESSION['userDetails'] = [
            'id' => $user['id'],
            'fullname' => $user['fullname'],
            'username' => $user['username'],
            'email' => $user['email'],
            'fin' => $user['fin'],
            'company' => $user['company'],
            'dob' => $user['dob'],
            'password' => $user['password']
        ];

        // Redirect to the home page or any other page after successful login
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Client</title>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const showPasswordCheckbox = document.getElementById('showPassword');
  const passwordInput = document.getElementById('password');
  const usernameInput = document.getElementById('username');

  showPasswordCheckbox.addEventListener('change', function () {
    if (this.checked) {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });

  // Remove username error message when user starts typing
  usernameInput.addEventListener('input', function () {
    const usernameError = document.getElementById('usernameError');
    if (usernameError) {
      usernameError.parentNode.removeChild(usernameError);
    }
  });

  // Remove password error message when user starts typing
  passwordInput.addEventListener('input', function () {
    const passwordError = document.getElementById('passwordError');
    if (passwordError) {
      passwordError.parentNode.removeChild(passwordError);
    }
  });
});
</script>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  font-family: Arial, sans-serif;
}

.container {
  width: 400px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.input-group {
  margin-bottom: 15px;
}

.label {
  font-weight: bold;
}

input[type="text"],
input[type="password"]{
  width: calc(100% - 22px);
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"]{
    background-color: #f79131;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-left: 10px;
    margin-right:10px;
    font-size: 16px; 
}

button {
    background-color: #f79131;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-left: 10px;
    margin-right:10px;
    font-size: 16px; 
}
button:hover{
    background-color: #ed8421;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}
a.signup-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
  }

  a.signup-button:hover {
    background-color: #45a049;
    text-decoration: none;
  }

a {
  text-decoration: none;
  color: #007bff;
}

a:hover {
  text-decoration: underline;
}

.error {
  color: red;
  margin-bottom: 10px;
}

.success {
  color: green;
  margin-bottom: 10px;
}
.previous{
    text-decoration: none; 
    display: inline-block; 
    padding: 8px 16px; 
    background-color: #f1f1f1; 
    color: black; 
}

.previous:hover{
    text-decoration: none; 
    display: inline-block; 
    padding: 8px 16px; 
    background-color: #e3e3e3; 
    color: black;
}
</style>
</head>
<body>
<div class="container">
  <h2>Client Login</h2>
  <form method="post" action="">
      <div class="input-group">
      <label for="username">Username</label><br>
      <input type="text" id="username" name="username" required>
      <?php if (isset($usernameError)) { ?>
        <div class="error"><?php echo $usernameError; ?></div>
      <?php } ?>
    </div>
    <div class="input-group">
      <label for="password">Password</label><br>
      <input type="password" id="password" name="password" required><br>
      <input type="checkbox" id="showPassword">
      <label for="showPassword">Show Password</label>
      <?php if (isset($passwordError)) { ?>
        <div class="error"><?php echo $passwordError; ?></div>
      <?php } ?>
    </div>
    <?php if (isset($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>
    <div class="input-group">
      <input type="submit" value="Login">
      <a href="forgot-password.php">Forgot Password?</a>
    </div><br>
    <center><div class="input-group">
        <p>Don't have an account?</p>
      <a href="register.php" class="signup-button">Sign Up</a><br><br>
      <a href="index.php" class="previous">&laquo; Back to Homepage</a>
    </div></center>
  </form>
</div>
</body>
</html>




