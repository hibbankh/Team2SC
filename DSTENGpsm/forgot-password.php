
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - Client</title>
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
  <h2>Forgot Password</h2>
  <form method="post" action="send-password-reset.php">
    <div class="input-group">
      <label for="email">Email</label><br>
      <input type="email" id="email" name="email" required>
    </div>
    <?php if (isset($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>
    <?php if (isset($success)) { ?>
        <div class="success"><?php echo $success; ?></div>
    <?php } ?>
    <div class="input-group">
      <input type="submit" value="Send Reset Link">
    </div>
    <br>
    <center>
      <div class="input-group">
        <a href="clientlogin.php" class="previous">&laquo; Back to Login</a>
      </div>
    </center>
  </form>
</div>
</body>
</html>
