<?php

class User
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function createUser($name, $email, $role)
    {
        $name = $this->db->escapeString($name);
        $email = $this->db->escapeString($email);
        $role = $this->db->escapeString($role);

        $sql = "INSERT INTO users (name, email, role) VALUES ('$name', '$email', '$role')";

        return $this->db->query($sql);
    }

    public function getUserById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        $users = array();

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }

    public function updateUser($id, $name, $email, $role)
    {
        $id = (int)$id;
        $name = $this->db->escapeString($name);
        $email = $this->db->escapeString($email);
        $role = $this->db->escapeString($role);

        $sql = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id = $id";

        return $this->db->query($sql);
    }

    public function deleteUser($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM users WHERE id = $id";

        return $this->db->query($sql);
    }
}
