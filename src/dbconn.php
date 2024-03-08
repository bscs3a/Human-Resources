<?php
require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__.'/..')->load();

class Database
{
    private $host;
    private $dbname;
    private $user;
    private $pass;


    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];

        $this->conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->pass);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function connect()
    {
        return $this->conn;
    }
}
