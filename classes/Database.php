<?php
class Database {
    private $host = "your_host";
    private $username = "your_username";
    private $password = "your_password";
    private $database = "ussd_db";

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
