<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Smart E-Commerce</title>
    <style>
        body {
            font-family: Arial;
            background: #F5F5F5;
            margin: 50px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #2C3E66;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
        .info {
            background: #e8f0fe;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Smart E-Commerce Login</h2>
    
    <?php
    // Check if form was submitted
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Simple hardcoded validation
        if ($username == "admin" && $password == "admin123") {
            $_SESSION['user'] = "admin";
            $_SESSION['login_time'] = date("Y-m-d H:i:s");
            header("Location: fig3-dashboard.php");
            exit();
        }
        elseif ($username == "wendy" && $password == "wendy123") {
            $_SESSION['user'] = "wendy";
            $_SESSION['login_time'] = date("Y-m-d H:i:s");
            header("Location: fig3-dashboard.php");
            exit();
        }
        else {
            echo "<div class='error'>Invalid username or password!</div>";
        }
    }
    ?>
    
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    
    <div class="info">
        <strong>Demo Credentials:</strong><br>
        Username: admin | Password: admin123<br>
        Username: wendy | Password: wendy123
    </div>
</div>

</body>
</html>