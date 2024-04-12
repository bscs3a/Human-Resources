<?php

$path = './public/delivery/views';
$basePath = "$path/dlv.";

$dlv = [
    // Delivery
    '/dlv/dashboard' => $basePath . "dashboard.php",
    '/dlv/list' => $basePath . "delivery-list.php",
    '/dlv/viewdetails' => $basePath . "viewdetails.php",
    '/dlv/history' => $basePath . "history.php",
    '/dlv/req' => $basePath . "expenses-req.php",
    '/dlv/assign' => $basePath . "assign.php",
    
    // For page with ID
    '/dlv/viewdetails/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "viewdetails.php";
    },
    '/dlv/historydetails/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "historydetails.php";
    },

    '/dlv/assign/truckId={truckId}' => function($truckId) use ($basePath) {
        $_SESSION['truckId'] = $truckId;
        include $basePath . "assign.php";
    },
    
];

Router::post('/statusupdateview', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $status = $_POST['status'];
    $orderId = $_POST['orderId'];

    $receivedDate = '0000-00-00';
    if ($status == 'Delivered') {
        $receivedDate = date('Y-m-d');
    }

    // Fetch the TruckID associated with the DeliveryOrderID
    $stmt = $conn->prepare("SELECT TruckID FROM deliveryorders WHERE DeliveryOrderID = :orderId");
    $stmt->bindParam(':orderId', $orderId);
    $stmt->execute();
    $truckId = $stmt->fetchColumn();

    // Update only the specific row with the DeliveryOrderID
    $stmt = $conn->prepare("UPDATE deliveryorders SET DeliveryStatus = :status, ReceivedDate = :receivedDate WHERE DeliveryOrderID = :orderId");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':receivedDate', $receivedDate);
    $stmt->bindParam(':orderId', $orderId);
    $stmt->execute();


    // Check if all orders with the same TruckID are either delivered or Failed to Deliver
    $stmt = $conn->prepare("SELECT COUNT(*) FROM deliveryorders WHERE TruckID = :truckId AND DeliveryStatus NOT IN ('Delivered', 'Failed to Deliver')");
    $stmt->bindParam(':truckId', $truckId);
    $stmt->execute();
    $pendingCount = $stmt->fetchColumn();

    // If there are no pending orders, set the TruckStatus to 'Available'
    if ($pendingCount == 0) {
        $stmt = $conn->prepare("UPDATE trucks SET TruckStatus = 'Available' WHERE TruckID = :truckId");
        $stmt->bindParam(':truckId', $truckId);
        $stmt->execute();
    }

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/dlv/history");
    //header("Location: $rootFolder/dlv/viewdetails/id=$orderId");
   
});

Router::post('/truckassign', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    // Get the selected order IDs from the form submission
    $orderIds = $_POST['orderIds'] ?? [];

    // Get the TruckID from the form submission
    $truckId = $_POST['truckId'];

    // Update the TruckStatus of the truck
    $stmt = $conn->prepare("UPDATE trucks SET TruckStatus = 'In Transit' WHERE TruckID = :truckId");
    $stmt->execute([':truckId' => $truckId]);

    // Update the DeliveryStatus and TruckID of the selected orders
    $stmt = $conn->prepare("UPDATE deliveryorders SET DeliveryStatus = 'In Transit', TruckID = :truckId WHERE DeliveryOrderID = :orderId");
    foreach ($orderIds as $orderId) {
        $stmt->execute([':orderId' => $orderId, ':truckId' => $truckId]);
    }

    // Redirect to the dashboard
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/dlv/dashboard");
    exit;
});