<?php
namespace Settings;

class Database {
    private \mysqli $connection;

    public function __construct() {
        $this->connection = new \mysqli(
            getenv('DB_HOST'),
            getenv('DB_USER'),
            getenv('DB_PASS'),
            getenv('DB_NAME')
        );

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection(): \mysqli
    {
        return $this->connection;
    }
}