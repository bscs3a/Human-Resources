<?php

function conn()
{
    $dsn = getenv('DB_HOST'); //dataservername = dsn
    $database = getenv('DB_DATABSE');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASS');

    try {
    $conn = new PDO("mysql:host=$dsn;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
}
