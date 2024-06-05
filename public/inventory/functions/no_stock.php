<?php
require_once 'db.php';

$stmt = $conn->prepare("SELECT stock_id, product FROM inventory WHERE quantity = 0");
$stmt->execute();
$rowsNoStock = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = count($rowsNoStock);
