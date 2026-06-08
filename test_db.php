<?php
// Database connection test for Smart E-Commerce
$servername = "localhost";
$username = "root";
$password = "";
$database = "smart_ecommerce_db";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check and display result
echo "<!DOCTYPE html>";
echo "<html><head><title>Database Connection Test</title>";
echo "<style>body{font-family:Arial;text-align:center;margin-top:50px}</style>";
echo "</head><body>";

if (!$connection) {
    echo "<h1 style='color:red;'>✗ Connection Failed!</h1>";
    echo "<p>Error: " . mysqli_connect_error() . "</p>";
} else {
    echo "<h1 style='color:green;'>✓ Connected Successfully!</h1>";
    echo "<p><strong>Database Server:</strong> " . $servername . "</p>";
    echo "<p><strong>Database Name:</strong> " . $database . "</p>";
    echo "<p><strong>MySQL Version:</strong> " . mysqli_get_server_info($connection) . "</p>";
    echo "<p><strong>Connected as user:</strong> " . $username . "</p>";
    echo "<p><strong>Status:</strong> Ready for Smart E-Commerce System</p>";
    mysqli_close($connection);
}
echo "</body></html>";
?>