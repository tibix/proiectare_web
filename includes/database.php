<?php

class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $this->conn->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function escapeString($str)
    {
        return $this->conn->real_escape_string($str);
    }

    public function close()
    {
        $this->conn->close();
    }
}
