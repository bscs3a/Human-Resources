<?php
// for testing purposes
// run function in the command line using
// php -r "require 'public\finance\functions\functionTesting.php';"  
// php -r "require 'public\finance\views\test.php';'

require_once "assets/foo.php";

$db = Database::getInstance();
$conn = $db->connect();

try {
    $conn->query('SELECT 1');
    echo 'Database connection is working.';
} catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}

echo "hello";
