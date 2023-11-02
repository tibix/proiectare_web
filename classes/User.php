<?php

class User
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function createUser($u_name, $f_name, $l_name, $email, $password, $date_created, $role=NULL)
    {
        $u_name = $this->db->escapeString($u_name);
        $f_name = $this->db->escapeString($f_name);
        $l_name = $this->db->escapeString($l_name);
        $email = $this->db->escapeString($email);
        $password = $this->db->escapeString($password);
        $role = $this->db->escapeString($role);
        $date_created = $this->db->escapeString($date_created);

        if($role == NULL){
            $role = 1;
        }

        $sql = "INSERT INTO users (u_name, f_name, l_name, email, password, date_created, role_id) VALUES ('$u_name', '$f_name', '$l_name', '$email', '$password', '$date_created', '$role')";

        return $this->db->query($sql);
    }

    public function getUserByLogin($login)
    {
        $login = $this->db->escapeString($login);
        $sql = "SELECT * FROM users WHERE u_name = '$login' OR email = '$login'";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function getUserById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function getUsers($role = NULL)
    {
        if ($role) {
            $role = $this->db->escapeString($role);
            $sql = "SELECT * FROM users WHERE role_id = '$role'";
        } else {
            $sql = "SELECT * FROM users";
        }

        $result = $this->db->query($sql);
        $users = array();

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }

    public function updateUser($id, $u_name, $f_name, $l_name, $email, $role)
    {
        $id = (int)$id;
        $u_name = $this->db->escapeString($u_name);
        $f_name = $this->db->escapeString($f_name);
        $l_name = $this->db->escapeString(l_name);
        $email = $this->db->escapeString($email);
        $role = $this->db->escapeString($role);

        $sql = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id = $id";
        return $this->db->query($sql);
    }

    public function updateUserPassword($id, $password)
    {
        $id = (int)$id;
        $password = $this->db->escapeString($password);

        $sql = "UPDATE users SET password='$password' WHERE id = $id";
        return $this->db->query($sql);
    }

    public function deleteUser($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM users WHERE id = $id";

        return $this->db->query($sql);
    }
}
