<?php 
// if naka separate backend nyo sa page follow nyo lang pattern na to
// require __DIR__ . '/../functions/functionTesting.php';

//Initialize the class
$db = Database::getInstance();
$conn = $db->connect();

//check if the database connection is working
try {
    $conn->query('SELECT 1');
} catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}


