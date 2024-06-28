<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const signUpForm = document.querySelector('form');
  const showPasswordCheckbox = document.getElementById('showPassword');
  const passwordInput = document.getElementById('password');

  // Function to toggle password visibility
  function togglePasswordVisibility() {
    passwordInput.type = showPasswordCheckbox.checked ? 'text' : 'password';
  }

  // Add event listener to show/hide password
  showPasswordCheckbox.addEventListener('change', togglePasswordVisibility);

  signUpForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission

    const formData = new FormData(signUpForm); // Get form data
    const requestData = {};

    // Convert form data to JSON object
    for (const [key, value] of formData.entries()) {
      requestData[key] = value;
    }

    // Send AJAX request to register_process.php
    fetch('register_process.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(requestData),
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json(); // Parse JSON response
    })
    .then(data => {
      if (data.success) {
        alert(data.message); // Show success message
        window.location.href = 'clientlogin.php'; // Redirect to login page
      } else {
        alert(data.message); // Show error message
      }
    })
    .catch(error => {
      console.error('There was an error with the fetch operation:', error);
    });
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
    max-height: 90vh; /* Limiting container height */
    overflow-y: auto; /* Adding scrollbar when content overflows */
  }
  
  .input-group {
    margin-bottom: 15px;
  }
  
  .label {
    font-weight: bold;
  }
  
  input[type="text"],
  input[type="password"],
  input[type="email"]{
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
  button:hover {
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

  .previous {
    text-decoration: none; 
    display: inline-block; 
    padding: 8px 16px; 
    background-color: #f1f1f1; 
    color: black; 
  }

  .previous:hover {
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
  <h2>Sign Up</h2>
  <form>
    <div class="input-group">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" required>
    </div>
    <div class="input-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="input-group">
      <label for="fin">FIN/IC/NRIC Number</label>
      <input type="text" id="fin" name="fin" required>
    </div>
    <div class="input-group">
      <label for="company">Company Name</label>
      <input type="text" id="company" name="company">
    </div>
    <div class="input-group">
      <label for="dob">Date of Birth</label><br>
      <input type="date" id="dob" name="dob" required>
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      <input type="checkbox" id="showPassword">
      <label for="showPassword">Show Password</label>
    </div>
    <div class="input-group">
      <label for="confirm_password">Confirm Password</label>
      <input type="password" id="confirm_password" name="confirm_password" required>
    </div>
    <div class="input-group">
    <button type="submit">Sign Up</button> <!-- Submit button -->
    </div>
    <div class="input-group">
      <a href="index.php" class="previous">&laquo; Back to Homepage</a>
    </div>
  </form>
</div>
</body>
</html>