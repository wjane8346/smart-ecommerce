<?php
include '../includes/db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: read.php?message=deleted");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>