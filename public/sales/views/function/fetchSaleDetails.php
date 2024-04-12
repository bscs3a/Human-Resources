<?php
require_once './src/dbconn.php';

// Fetch the sale ID from the URL
$saleId = $_GET['sale'];

// Get PDO instance
$database = Database::getInstance();
$pdo = $database->connect();

// Query for sale details
$sqlSale = "SELECT * FROM Sales WHERE SaleID = ?";
$stmtSale = $pdo->prepare($sqlSale);
$stmtSale->execute([$saleId]);
$sale = $stmtSale->fetch(PDO::FETCH_ASSOC);

// Query for customer details
$sqlCustomer = "SELECT * FROM Customers WHERE CustomerID = ?";
$stmtCustomer = $pdo->prepare($sqlCustomer);
$stmtCustomer->execute([$sale['CustomerID']]);
$customer = $stmtCustomer->fetch(PDO::FETCH_ASSOC);

// Query for sale items
$sqlItems = "SELECT SaleDetails.*, Products.*, Categories.Category_Name 
             FROM SaleDetails 
             INNER JOIN Products ON SaleDetails.ProductID = Products.ProductID 
             INNER JOIN Categories ON Products.Category_ID = Categories.Category_ID 
             WHERE SaleID = ?";
$stmtItems = $pdo->prepare($sqlItems);
$stmtItems->execute([$saleId]);
$items = $stmtItems->fetchAll(PDO::FETCH_ASSOC);

// Query for delivery details
$sqlDelivery = "SELECT * FROM deliveryorders WHERE SaleID = ?";
$stmtDelivery = $pdo->prepare($sqlDelivery);
$stmtDelivery->execute([$saleId]);
$deliveryOrder = $stmtDelivery->fetch(PDO::FETCH_ASSOC);

// Fetch all delivery statuses for the given SalesID
$sqlStatuses = "SELECT DeliveryStatus FROM deliveryorders WHERE SaleID = ?";
$stmtStatuses = $pdo->prepare($sqlStatuses);
$stmtStatuses->execute([$saleId]);
$deliveryStatuses = $stmtStatuses->fetchAll(PDO::FETCH_COLUMN);

// Check if all delivery statuses are "Delivered"
$allDelivered = array_reduce($deliveryStatuses, function($carry, $status) {
    return $carry && $status === 'Delivered';
}, true);

// Check if all delivery statuses are "Pending"
$allPending = array_reduce($deliveryStatuses, function($carry, $status) {
    return $carry && $status === 'Pending';
}, true);

// Check if any delivery status is "In Transit"
$anyInTransit = in_array('In Transit', $deliveryStatuses);

// Set delivery status based on the delivery statuses
if ($allDelivered) {
    $deliveryOrder['DeliveryStatus'] = 'Delivered';
} elseif ($allPending) {
    $deliveryOrder['DeliveryStatus'] = 'Pending';
} elseif ($anyInTransit || !$allDelivered) {
    $deliveryOrder['DeliveryStatus'] = 'In Transit';
}
?>