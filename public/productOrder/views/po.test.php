<?php
// Include your database connection file if you haven't already
include 'dbconn.php';

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Prepare and execute a SQL query to fetch data based on the ID
    $stmt = $conn->prepare("SELECT * FROM order_details WHERE Order_ID = :id");
    $stmt->execute(['id' => $id]);

    // Fetch the data
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if data was found
    if ($data) {
        // Display the data
        echo "<h1>Data for ID: $id</h1>";
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    } else {
        echo "No data found for ID: $id";
    }
} else {
    echo "ID parameter is missing.";
}
?>
