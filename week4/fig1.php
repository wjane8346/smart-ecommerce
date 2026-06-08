<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Processing - Smart E-Commerce</title>
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
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2C3E66;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #2C3E66;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .success {
            background: #e8f8e8;
            padding: 20px;
            border-radius: 10px;
            color: #27AE60;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome to Smart E-Commerce</h2>
    
    <?php
    // This code checks if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['username'];
        $email = $_POST['email'];
        
        echo "<div class='success'>";
        echo "<h3>Welcome, " . $name . "!</h3>";
        echo "<p>Your email: " . $email . "</p>";
        echo "<p>Form submitted successfully!</p>";
        echo "</div>";
    } else {
        // Show the form if not submitted yet
    ?>
    
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Enter your name" required>
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Submit</button>
    </form>
    
    <?php } ?>
</div>

</body>
</html>