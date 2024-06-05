<?php
require_once __DIR__ . '/../functions/db.php';

$product = null;

if (isset($_SESSION['stock_id'])) {
    $id = $_SESSION['stock_id'];
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE stock_id = :stock_id");
    $stmt->bindParam(':stock_id', $stock_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Product ID is required";
    // header("Location: product.php");
    // exit(); 
}