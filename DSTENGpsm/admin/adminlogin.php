<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'dsteng');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM admin WHERE (username = ? OR email = ?) AND password = MD5(?)");
    $stmt->bind_param('sss', $username, $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = 'Invalid username or password!';
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Admin</title>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const showPasswordCheckbox = document.getElementById('showPassword');
  const passwordInput = document.getElementById('password');

  showPasswordCheckbox.addEventListener('change', function () {
    if (this.checked) {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
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

a {
  text-decoration: none;
  color: #007bff;
  margin-left: 10px;
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
  <h2>Admin Login</h2>
  <form action="adminlogin.php" method="post">
    <div class="input-group">
      <label for="username">Username or Email</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required><br>
      <input type="checkbox" id="showPassword">
      <label for="showPassword">Show Password</label>
    </div>
    <div class="input-group">
      <button type="submit">Login</button>
      <a href="forgot_password.php">Forgot Password?</a>
    </div>
    <div class="input-group">
    <a href="../index.php" class="previous">&laquo; Back to Homepage</a>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'dsteng');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT * FROM admin WHERE (username = ? OR email = ?) AND password = MD5(?)");
        $stmt->bind_param('sss', $username, $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Successful login
            session_start();
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            // Login failed
            echo '<p class="error">Invalid username or password!</p>';
        }

        $stmt->close();
        $conn->close();
    }
    ?>
  </form>
</div>
</body>
</html>