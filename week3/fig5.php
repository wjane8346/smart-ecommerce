<!DOCTYPE html>
<html>
<head>
    <title>Dynamic User Input - Smart E-Commerce</title>
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
            margin-top: 0;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #2C3E66;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }
        button:hover {
            background: #1a2a4a;
        }
        .live-preview {
            background: #e8f0fe;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            font-size: 14px;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            display: none;
        }
        .result-success {
            background: #e8f8e8;
            color: #27AE60;
            border: 1px solid #27AE60;
        }
        .result-error {
            background: #ffe8e8;
            color: #E67E22;
            border: 1px solid #E67E22;
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Dynamic User Input Handler</h2>
    <p>Smart E-Commerce Order Form</p>
    <hr>

    <!-- Live Preview Section (Updates as you type) -->
    <div class="live-preview">
        <strong>📝 Live Preview:</strong><br>
        Name: <span id="previewName">-</span><br>
        Email: <span id="previewEmail">-</span><br>
        Product: <span id="previewProduct">-</span><br>
        Quantity: <span id="previewQuantity">-</span>
    </div>

    <!-- Input Form -->
    <form id="orderForm">
        <label>Full Name:</label>
        <input type="text" id="fullName" placeholder="Enter your full name" onkeyup="updatePreview()">
        
        <label>Email Address:</label>
        <input type="email" id="email" placeholder="Enter your email" onkeyup="updatePreview()">
        
        <label>Select Product:</label>
        <select id="product" onchange="updatePreview()">
            <option value="">-- Select a product --</option>
            <option value="iPhone 14">iPhone 14 - $999</option>
            <option value="MacBook Air">MacBook Air - $1299</option>
            <option value="AirPods Pro">AirPods Pro - $249</option>
            <option value="iPad">iPad - $599</option>
        </select>
        
        <label>Quantity:</label>
        <input type="number" id="quantity" value="1" min="1" onkeyup="updatePreview()" onchange="updatePreview()">
        
        <button type="button" onclick="submitOrder()">Submit Order</button>
    </form>

    <!-- Result Message Area -->
    <div id="result" class="result"></div>
</div>

<script>
// Function to update live preview as user types
function updatePreview() {
    var name = document.getElementById('fullName').value;
    var email = document.getElementById('email').value;
    var product = document.getElementById('product').value;
    var quantity = document.getElementById('quantity').value;
    
    document.getElementById('previewName').innerHTML = name || '-';
    document.getElementById('previewEmail').innerHTML = email || '-';
    document.getElementById('previewProduct').innerHTML = product || '-';
    document.getElementById('previewQuantity').innerHTML = quantity || '-';
}

// Function to validate and submit order
function submitOrder() {
    var name = document.getElementById('fullName').value;
    var email = document.getElementById('email').value;
    var product = document.getElementById('product').value;
    var quantity = document.getElementById('quantity').value;
    var isValid = true;
    var errorMsg = "";
    
    // Clear previous result
    var resultDiv = document.getElementById('result');
    resultDiv.style.display = "none";
    
    // Validation checks
    if (name === "") {
        errorMsg += "• Name is required<br>";
        isValid = false;
    }
    if (email === "") {
        errorMsg += "• Email is required<br>";
        isValid = false;
    } else if (email.indexOf('@') === -1 || email.indexOf('.') === -1) {
        errorMsg += "• Enter a valid email address<br>";
        isValid = false;
    }
    if (product === "") {
        errorMsg += "• Please select a product<br>";
        isValid = false;
    }
    if (quantity < 1) {
        errorMsg += "• Quantity must be at least 1<br>";
        isValid = false;
    }
    
    // Calculate price based on product
    var price = 0;
    if (product === "iPhone 14") price = 999;
    else if (product === "MacBook Air") price = 1299;
    else if (product === "AirPods Pro") price = 249;
    else if (product === "iPad") price = 599;
    
    var total = price * quantity;
    
    // Show result
    if (!isValid) {
        resultDiv.innerHTML = "<strong>❌ Please fix the following errors:</strong><br>" + errorMsg;
        resultDiv.className = "result result-error";
        resultDiv.style.display = "block";
    } else {
        resultDiv.innerHTML = "<strong>✅ Order Submitted Successfully!</strong><br><br>" +
            "Thank you <strong>" + name + "</strong>!<br>" +
            "A confirmation has been sent to <strong>" + email + "</strong><br><br>" +
            "Order Details:<br>" +
            "Product: " + product + "<br>" +
            "Quantity: " + quantity + "<br>" +
            "Total Amount: <strong>$" + total + "</strong>";
        resultDiv.className = "result result-success";
        resultDiv.style.display = "block";
        
        // Optional: Reset form or keep as is
    }
}
</script>

<?php
// PHP backend processing (runs when form is submitted via POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $product = $_POST['product'] ?? '';
    $quantity = $_POST['quantity'] ?? 1;
    
    // In a real system, save to database here
    // For demonstration, we log to server
    error_log("Order received: Name: $name, Product: $product, Quantity: $quantity");
}
?>

</body>
</html>