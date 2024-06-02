<?php
//database connection
require_once './src/dbconn.php';

$db = Database::getInstance();
$conn = $db->connect();
if ($conn === null) {
    die('Failed to connect to the database.');
}

// First, set all trucks to 'Available' if they are not 'In Transit'
$stmt = $conn->prepare("UPDATE Trucks SET TruckStatus = 'Available' WHERE TruckStatus != 'In Transit'");
$stmt->execute();

// Get the current date
$currentDate = date('Y-m-d');

// Then check the attendance of each employee assigned to a truck
$stmt = $conn->prepare("SELECT et.TruckID, COUNT(a.employees_id) as EmployeeCount FROM EmployeeTrucks et LEFT JOIN attendance a ON et.EmployeeID = a.employees_id AND DATE(a.attendance_date) = :currentDate AND (a.clock_out IS NULL OR a.clock_out > NOW()) GROUP BY et.TruckID");
$stmt->bindParam(':currentDate', $currentDate);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($results)) {
    // If there are no attendance records for the current date, set all trucks to 'Unavailable'
    $stmt = $conn->prepare("UPDATE Trucks SET TruckStatus = 'Unavailable'");
    $stmt->execute();
} else {
    foreach ($results as $row) {
        // If the number of assigned employees is less than 3, set the TruckStatus to 'Unavailable'
        if ($row['EmployeeCount'] < 3) {
            $stmt = $conn->prepare("UPDATE Trucks SET TruckStatus = 'Unavailable' WHERE TruckID = :truckId");
            $stmt->bindParam(':truckId', $row['TruckID']);
            $stmt->execute();
        }
    }
}
?>