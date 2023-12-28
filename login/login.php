<?php
include "C:/xampp/htdocs/Blog_php/common/connection.php";
session_start();
$Uid = isset($_SESSION['Uid']) ? $_SESSION['Uid'] : null;
if (isset($Uid)) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Login </title>
  <link rel="stylesheet" href="/Blog_php/style/signup.css">
</head>

<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form action="user_authenticate.php" method="post">
      <div class="input-box">
        <input type="text" name="email" placeholder="Email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Login">
      </div>
      <div class="text">
        <h3>Don't have account yet? <a href="signup.php">Register now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>