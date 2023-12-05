<?php

class Notification
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function createNotification($message, $owner_id, $user_id, $article_id, $status=null)
    {
        $message = $this->db->escapeString($message);
        $owner_id = (int)$owner_id;
        $user_id = (int)$user_id;
        $article_id = (int)$article_id;
        $status = $this->db->escapeString($status) ? $status : 'new';

        $sql = "INSERT INTO notifications (message, owner_id, user_id, article_id, status) VALUES('$message', $owner_id, $user_id, $article_id, '$status')";

        return $this->db->query($sql);
    }

    public function changeNotification($id, $message, $status=null)
    {
        $id = (int)$id;
        $message = $this->db->escapeString($message);
        $status = $this->db->escapeString($status) ? $status : 'done';

        $sql = "UPDATE notifications SET status = '$status', message = '$message' WHERE id = $id";

        return $this->db->query($sql);
    }

    public function getNotifications($user)
    {
        $user = (int)$user;

        $sql = "SELECT * FROM notifications WHERE owner_id = $user AND status = 'new'";

        $result = $this->db->query($sql);
        $alerts = array();

        while($row = $result->fetch_assoc()) {
            $alerts[] = $row;
        }

        return $alerts;
    }
}