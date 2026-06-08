<?php
include '../includes/db_connect.php';

$id = $_GET['id'];

// Get product data
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    
    $sql = "UPDATE products SET 
            product_name='$name', 
            price='$price', 
            category='$category', 
            quantity='$quantity', 
            description='$description' 
            WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Product updated successfully!";
        // Refresh product data
        $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
        $product = mysqli_fetch_assoc($result);
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product - Smart E-Commerce</title>
    <style>
        body { font-family: Arial; background: #F5F5F5; margin: 50px; }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 500px; margin: auto; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { width: 100%; padding: 12px; background: #E67E22; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .message { background: #e8f8e8; color: #27AE60; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        .error { background: #ffe8e8; color: #E67E22; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        h2 { color: #2C3E66; }
        .back { display: block; margin-top: 20px; text-align: center; }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Product</h2>
    
    <?php if ($message): ?>
        <div class="message">✓ <?php echo $message; ?></div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="error">✗ <?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <input type="text" name="name" value="<?php echo $product['product_name']; ?>" required>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
        <input type="text" name="category" value="<?php echo $product['category']; ?>" required>
        <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required>
        <textarea name="description" rows="3"><?php echo $product['description']; ?></textarea>
        <button type="submit">Update Product</button>
    </form>
    
    <a href="read.php" class="back">← Back to Product List</a>
</div>
</body>
</html>