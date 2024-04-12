<?php
// Include your database connection file
require_once './src/dbconn.php';

// Get PDO instance
$database = Database::getInstance();
$pdo = $database->connect();

// SQL query to fetch sales data along with customer name
$sql = "SELECT 
            Sales.SaleID,
            Sales.SaleDate,
            Sales.SalePreference,
            Sales.PaymentMode,
            Sales.TotalAmount,
            Customers.FirstName AS CustomerFirstName,
            Customers.LastName AS CustomerLastName
        FROM 
            Sales
        JOIN 
            Customers ON Sales.CustomerID = Customers.CustomerID
        ORDER BY 
            Sales.SaleDate DESC";

// Execute the query
$stmt = $pdo->query($sql);
?>