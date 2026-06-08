<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Smart E-Commerce</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Login to Your Account</h2>
    <form method="POST" action="dashboard.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>