<?php
require_once 'db.php';

//quantity coutner
$query = "SELECT SUM(quantity) AS total_quantity FROM inventory";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_quantity = $row['total_quantity'];

$query = "SELECT SUM(quantity) AS total_incoming FROM deliveryorders";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_incoming = $row['total_incoming'];

$query = "SELECT COUNT(*) AS no_stock_count FROM inventory WHERE quantity = 0";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$no_stock_count = $row['no_stock_count'];

$query = "SELECT COUNT(*) AS return_stock FROM returnproducts";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$return_stock = $row['return_stock'];


$query = "SELECT SUM(quantity) AS tot_ret FROM returnproducts";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$tot_ret = $row['tot_ret'];
