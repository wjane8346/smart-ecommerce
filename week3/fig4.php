<!DOCTYPE html>
<html>
<head>
    <title>Database Connection - Smart E-Commerce</title>
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
            max-width: 600px;
            margin: auto;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2C3E66;
        }
        .success {
            background: #e8f8e8;
            color: #27AE60;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #27AE60;
        }
        .error {
            background: #ffe8e8;
            color: #E67E22;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #E67E22;
        }
        .info {
            background: #e8f0fe;
            padding: 15px;
            border-radius: 10px;
            text-align: left;
            margin-top: 20px;
        }
        code {
            background: #f4f4f4;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: monospace;
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Database Connection Test</h1>
    <p>Smart E-Commerce System</p>
    <hr>

    <?php
    // Database connection parameters
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "smart_ecommerce_db";
    
    // Create connection
    $connection = mysqli_connect($host, $username, $password, $database);
    
    // Check connection
    if (!$connection) {
        echo "<div class='error'>";
        echo "<h2>✗ Connection Failed!</h2>";
        echo "<p>Error: " . mysqli_connect_error() . "</p>";
        echo "</div>";
    } else {
        echo "<div class='success'>";
        echo "<h2>✓ Connected Successfully!</h2>";
        echo "<p>Database connection established.</p>";
        echo "</div>";
        
        echo "<div class='info'>";
        echo "<strong>Connection Details:</strong><br><br>";
        echo "Server: <code>" . $host . "</code><br>";
        echo "Database: <code>" . $database . "</code><br>";
        echo "Username: <code>" . $username . "</code><br>";
        echo "MySQL Version: <code>" . mysqli_get_server_info($connection) . "</code><br>";
        echo "Host Info: <code>" . mysqli_get_host_info($connection) . "</code><br>";
        echo "Protocol Version: <code>" . mysqli_get_proto_info($connection) . "</code><br>";
        echo "</div>";
        
        // Optional: Create a test table to verify full functionality
        $createTable = "CREATE TABLE IF NOT EXISTS test_connection (
            id INT AUTO_INCREMENT PRIMARY KEY,
            test_message VARCHAR(100),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        if (mysqli_query($connection, $createTable)) {
            echo "<div class='info' style='margin-top: 15px;'>";
            echo "✓ Test table 'test_connection' created successfully.<br>";
            
            // Insert a test record
            $insertTest = "INSERT INTO test_connection (test_message) VALUES ('Connection working on " . date('Y-m-d H:i:s') . "')";
            if (mysqli_query($connection, $insertTest)) {
                echo "✓ Test record inserted successfully.";
            }
            echo "</div>";
        }
        
        // Close connection
        mysqli_close($connection);
    }
    ?>
    
    <hr>
    <div class="info">
        <strong>Connection String Used:</strong><br>
        <code>mysqli_connect("localhost", "root", "", "smart_ecommerce_db")</code>
    </div>
    
    <p style="margin-top: 20px; font-size: 12px; color: #666;">
        Note: Root password is empty by default in XAMPP.
    </p>
</div>

</body>
</html>