<?php

/**
 * Database class
 */

class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "editorial", "editorial", "editorial");

        if ($this->conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $this->conn->connect_error);
        }

        $this->conn->set_charset('utf8');
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
