<?php
// Get PDO instance
$database = Database::getInstance();
$conn = $database->connect();

// SQL query to fetch sales data along with customer name
$sql = "SELECT 
            Sales.SaleID,
            Sales.SaleDate,
            Sales.SalePreference,
            Sales.PaymentMode,
            Sales.TotalAmount,
            Customers.Name AS CustomerName
        FROM 
            Sales
        JOIN 
            Customers ON Sales.CustomerID = Customers.CustomerID
        ORDER BY 
            Sales.SaleDate DESC";

// Execute the query
$stmt = $conn->query($sql);
?>