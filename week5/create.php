<?php
include '../includes/db_connect.php';

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO products (product_name, price, category, quantity, description) 
            VALUES ('$name', '$price', '$category', '$quantity', '$description')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Product added successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product - Smart E-Commerce</title>
    <style>
        body { font-family: Arial; background: #F5F5F5; margin: 50px; }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 500px; margin: auto; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { width: 100%; padding: 12px; background: #27AE60; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .message { background: #e8f8e8; color: #27AE60; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        .error { background: #ffe8e8; color: #E67E22; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        h2 { color: #2C3E66; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add New Product</h2>
    
    <?php if ($message): ?>
        <div class="message">✓ <?php echo $message; ?></div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="error">✗ <?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="text" name="category" placeholder="Category" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <textarea name="description" rows="3" placeholder="Product Description"></textarea>
        <button type="submit">Add Product</button>
    </form>
</div>
</body>
</html>