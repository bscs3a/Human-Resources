<?php
require_once 'db.php';

$query = "SELECT * FROM returnproducts";

$stmt = $conn->prepare($query);
$stmt->execute();
$incidents = $stmt->fetchAll(PDO::FETCH_ASSOC);
