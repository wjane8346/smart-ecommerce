<!DOCTYPE html>
<html>
<head>
    <title>PHP Syntax Practice - Smart E-Commerce</title>
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
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2C3E66;
            border-bottom: 3px solid #2C3E66;
            padding-bottom: 10px;
        }
        h2 {
            color: #27AE60;
            font-size: 18px;
            margin-top: 20px;
        }
        .code-box {
            background: #f4f4f4;
            padding: 10px;
            border-left: 4px solid #2C3E66;
            font-family: monospace;
            margin: 10px 0;
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>PHP Syntax Practice</h1>
    <p>Smart E-Commerce System - Week 3</p>
    <hr>

    <?php
    // ========== 1. VARIABLES ==========
    echo "<h2>1. Variables and Data Types</h2>";
    
    $productName = "iPhone 14";
    $price = 999;
    $inStock = true;
    $description = "Latest smartphone with A15 chip";
    
    echo "<div class='code-box'>";
    echo "<strong>Variables declared:</strong><br>";
    echo "\$productName = \"$productName\" (String)<br>";
    echo "\$price = $price (Integer)<br>";
    echo "\$inStock = " . ($inStock ? "true" : "false") . " (Boolean)<br>";
    echo "\$description = \"$description\" (String)<br>";
    echo "</div>";
    
    // ========== 2. ECHO STATEMENT ==========
    echo "<h2>2. Echo Statement</h2>";
    
    echo "<div class='code-box'>";
    echo "Product: <strong>$productName</strong><br>";
    echo "Price: <strong>$$price</strong><br>";
    echo "Description: <strong>$description</strong><br>";
    echo "</div>";
    
    // ========== 3. CONDITIONAL STATEMENTS ==========
    echo "<h2>3. Conditional Statements (if/else)</h2>";
    
    echo "<div class='code-box'>";
    if ($price > 500) {
        echo "This product is a <strong style='color:#E67E22;'>PREMIUM</strong> item.<br>";
    } else {
        echo "This product is a STANDARD item.<br>";
    }
    
    if ($inStock) {
        echo "Status: <strong style='color:#27AE60;'>✓ In Stock</strong><br>";
    } else {
        echo "Status: <strong style='color:red;'>✗ Out of Stock</strong><br>";
    }
    echo "</div>";
    
    // ========== 4. ARRAYS ==========
    echo "<h2>4. Arrays and Foreach Loop</h2>";
    
    $categories = array("Electronics", "Clothing", "Books", "Home & Living");
    $featuredProducts = ["iPhone 14", "MacBook Air", "AirPods Pro"];
    
    echo "<div class='code-box'>";
    echo "<strong>Product Categories:</strong><br>";
    echo "<ul>";
    foreach ($categories as $category) {
        echo "<li>" . $category . "</li>";
    }
    echo "</ul>";
    
    echo "<strong>Featured Products:</strong><br>";
    echo "<ul>";
    for ($i = 0; $i < count($featuredProducts); $i++) {
        echo "<li>" . $featuredProducts[$i] . "</li>";
    }
    echo "</ul>";
    echo "</div>";
    
    // ========== 5. FUNCTIONS ==========
    echo "<h2>5. User-Defined Functions</h2>";
    
    function calculateDiscount($price, $discountPercent) {
        $discountAmount = $price * ($discountPercent / 100);
        $finalPrice = $price - $discountAmount;
        return $finalPrice;
    }
    
    function applyTax($price, $taxRate = 10) {
        $taxAmount = $price * ($taxRate / 100);
        return $price + $taxAmount;
    }
    
    $originalPrice = 999;
    $discountedPrice = calculateDiscount($originalPrice, 20);
    $priceWithTax = applyTax($discountedPrice);
    
    echo "<div class='code-box'>";
    echo "<strong>Discount Calculator:</strong><br>";
    echo "Original Price: <strong>$$originalPrice</strong><br>";
    echo "After 20% discount: <strong>$$discountedPrice</strong><br>";
    echo "After 10% tax: <strong>$$priceWithTax</strong><br>";
    echo "</div>";
    
    // ========== 6. STRING OPERATIONS ==========
    echo "<h2>6. String Operations</h2>";
    
    $welcomeMessage = "Welcome to Smart E-Commerce";
    
    echo "<div class='code-box'>";
    echo "Original String: \"$welcomeMessage\"<br>";
    echo "Length: " . strlen($welcomeMessage) . " characters<br>";
    echo "Uppercase: " . strtoupper($welcomeMessage) . "<br>";
    echo "Lowercase: " . strtolower($welcomeMessage) . "<br>";
    echo "</div>";
    ?>
    
    <hr>
    <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
    <p><strong>Server:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
</div>

</body>
</html>