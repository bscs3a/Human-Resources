<?php
require_once './src/dbconn.php';

function getProductsAndCategories() {
    // Get PDO instance
    $database = Database::getInstance();
    $pdo = $database->connect();

    // Query for products with category IDs and names
    $sqlProducts = "SELECT p.*, c.Category_ID, c.Category_Name FROM Products p INNER JOIN Categories c ON p.Category_ID = c.Category_ID";
    $stmtProducts = $pdo->query($sqlProducts);
    $products = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

    return ['products' => $products];
}
?>