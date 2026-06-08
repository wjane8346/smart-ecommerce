<?php
include '../includes/db_connect.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products - Smart E-Commerce</title>
    <style>
        body { font-family: Arial; background: #F5F5F5; margin: 50px; }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 900px; margin: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #2C3E66; color: white; }
        tr:hover { background: #f5f5f5; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; margin: 2px; display: inline-block; }
        .edit { background: #E67E22; color: white; }
        .delete { background: #e74c3c; color: white; }
        .add-btn { background: #27AE60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-bottom: 20px; }
        h2 { color: #2C3E66; }
    </style>
</head>
<body>
<div class="container">
    <h2>Product List</h2>
    
    <a href="create.php" class="add-btn">+ Add New Product</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td>$<?php echo $row['price']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
     Milan
</div>
</body>
</html>