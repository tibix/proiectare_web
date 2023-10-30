<?php

class Journalist
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function createJournalist($name, $email)
    {
        $name = $this->db->escapeString($name);
        $email = $this->db->escapeString($email);

        $sql = "INSERT INTO journalists (name, email) VALUES ('$name', '$email')";

        return $this->db->query($sql);
    }

    public function getJournalistById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM journalists WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function getJournalists()
    {
        $sql = "SELECT * FROM journalists";
        $result = $this->db->query($sql);
        $journalists = array();

        while ($row = $result->fetch_assoc()) {
            $journalists[] = $row;
        }

        return $journalists;
    }

    public function updateJournalist($id, $name, $email)
    {
        $id = (int)$id;
        $name = $this->db->escapeString($name);
        $email = $this->db->escapeString($email);

        $sql = "UPDATE journalists SET name='$name', email='$email' WHERE id = $id";

        return $this->db->query($sql);
    }

    public function deleteJournalist($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM journalists WHERE id = $id";

        return $this->db->query($sql);
    }
}
