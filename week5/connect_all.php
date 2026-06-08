<!DOCTYPE html>
<html>
<head>
    <title>Database Connections - Smart E-Commerce</title>
    <style>
        body { font-family: Arial; background: #F5F5F5; margin: 50px; }
        .container { max-width: 600px; margin: auto; }
        .success { background: #e8f8e8; border: 1px solid #27AE60; padding: 20px; border-radius: 10px; margin: 15px 0; }
        .error { background: #ffe8e8; border: 1px solid #E67E22; padding: 20px; border-radius: 10px; margin: 15px 0; }
        h1 { color: #2C3E66; text-align: center; }
        h3 { margin-top: 0; }
    </style>
</head>
<body>
<div class="container">
    <h1>Database Connection Test</h1>
    
    <?php
    // Test student_db
    $conn1 = @mysqli_connect("localhost", "root", "", "student_db");
    if($conn1) {
        echo "<div class='success'>";
        echo "<h3>✓ student_db</h3>";
        echo "<p>Connected successfully to student_db</p>";
        echo "</div>";
        mysqli_close($conn1);
    } else {
        echo "<div class='error'>✗ student_db connection failed</div>";
    }
    
    // Test product_db
    $conn2 = @mysqli_connect("localhost", "root", "", "product_db");
    if($conn2) {
        echo "<div class='success'>";
        echo "<h3>✓ product_db</h3>";
        echo "<p>Connected successfully to product_db</p>";
        echo "</div>";
        mysqli_close($conn2);
    } else {
        echo "<div class='error'>✗ product_db connection failed</div>";
    }
    
    // Test user_auth_db
    $conn3 = @mysqli_connect("localhost", "root", "", "user_auth_db");
    if($conn3) {
        echo "<div class='success'>";
        echo "<h3>✓ user_auth_db</h3>";
        echo "<p>Connected successfully to user_auth_db</p>";
        echo "</div>";
        mysqli_close($conn3);
    } else {
        echo "<div class='error'>✗ user_auth_db connection failed</div>";
    }
    ?>
    
    <div style="background: #e8f0fe; padding: 15px; border-radius: 10px; margin-top: 20px;">
        <h3>Connection String Used:</h3>
        <code>mysqli_connect("localhost", "root", "", "database_name")</code>
        <p style="margin-top: 10px; font-size: 12px;">Note: Root password is empty by default in XAMPP.</p>
    </div>
</div>
</body>
</html>