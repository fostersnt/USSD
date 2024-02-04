<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "ussd_db";

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $this->createDatabase();
        $this->selectDatabase();
        $this->createTable();
    }

    private function createDatabase() {
        $query = "CREATE DATABASE IF NOT EXISTS " . $this->database;
        $this->conn->query($query);
    }

    private function selectDatabase() {
        $this->conn->select_db($this->database);
    }

    private function createTable() {
        $query = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
        $this->conn->query($query);
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
