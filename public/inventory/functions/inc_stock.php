<?php
require_once 'db.php';

$query = "SELECT * FROM deliveryorders";

$stmt = $conn->prepare($query);
$stmt->execute();
$IncStock = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM returnproducts";

$stmt = $conn->prepare($query);
$stmt->execute();
$returns = $stmt->fetchAll(PDO::FETCH_ASSOC);
