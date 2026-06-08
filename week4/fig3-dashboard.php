<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: fig3-login.php");
    exit();
}

$username = $_SESSION['user'];
$login_time = $_SESSION['login_time'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Smart E-Commerce</title>
    <style>
        body {
            font-family: Arial;
            background: #F5F5F5;
            margin: 0;
        }
        .header {
            background: #2C3E66;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }
        .welcome-box {
            background: #e8f8e8;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .session-info {
            background: #e8f0fe;
            padding: 15px;
            border-radius: 10px;
            text-align: left;
            margin: 20px 0;
        }
        .logout-btn {
            background: #E67E22;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .logout-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Smart E-Commerce Dashboard</h1>
</div>

<div class="container">
    <div class="welcome-box">
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <p>You have successfully logged into your account.</p>
    </div>
    
    <div class="session-info">
        <h3>Session Information:</h3>
        <p><strong>Username:</strong> <?php echo $username; ?></p>
        <p><strong>Login Time:</strong> <?php echo $login_time; ?></p>
        <p><strong>Session ID:</strong> <?php echo session_id(); ?></p>
        <p><strong>Status:</strong> <span style="color: green;">✓ Active</span></p>
    </div>
    
    <a href="fig3-logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>