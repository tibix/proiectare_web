<?php

/**
 * Article class
 */

class Article
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function getFeaturedArticles()
    {
        $sql = "SELECT * FROM articles WHERE status_id = 1 AND featured = 1";

        $result = $this->db->query($sql);
        $articles = array();

        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }

    public function getCategoryById($id)
    {
        $id = (int)$id;
        $sql = "SELECT category_name FROM categories WHERE id = $id";

        $result = $this->db->query($sql);
        
        $row = $result->fetch_assoc();
        
        $category = $row['category_name'];
        
        return $category;
    }

    public function getAllArticles($user_id=NULL)
    {
        if ($user_id != NULL) {
            $user_id = (int)$user_id;
            $sql = "SELECT * FROM articles WHERE user_id = $user_id";
        } else {
            $sql = "SELECT * FROM articles";
        }

        $result = $this->db->query($sql);
        $articles = array();

        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }

    public function createArticle($title, $content, $user_id, $category, $status_id=NULL)
    {
        $title = $this->db->escapeString($title);
        $content = $this->db->escapeString($content);
        $user_id = $this->db->escapeString($user_id);
        $category = $this->db->escapeString($category);
        if ($status_id != NULL) {
            $status_id = (int)$status_id;
        } else {
            $status_id = 1;
        }

        $sql = "INSERT INTO articles (title, author, content, category) VALUES ('$title', '$content', '$user_id', '$category', '$status_id')";

        return $this->db->query($sql);
    }

    public function getArticleById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM articles WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function getArticlesByCategory($category)
    {
        $category = $this->db->escapeString($category);
        $sql = "SELECT * FROM articles WHERE category_id = '$category'";

        $result = $this->db->query($sql);
        $articles = array();

        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }

    public function updateArticle($id, $title, $author, $content, $category)
    {
        $id = (int)$id;
        $title = $this->db->escapeString($title);
        $content = $this->db->escapeString($content);
        $category = $this->db->escapeString($category);
        $author = $this->db->escapeString($author);

        $sql = "UPDATE articles SET title='$title', user_id='$author', content='$content', category='$category' WHERE id = $id";

        return $this->db->query($sql);
    }

    public function deleteArticle($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM articles WHERE id = $id";

        return $this->db->query($sql);
    }

    public function searchArticles($search)
    {
        $search = $this->db->escapeString($search);
        $sql = "SELECT * FROM articles WHERE title LIKE '%$search%' OR content LIKE '%$search%'";

        $result = $this->db->query($sql);
        $articles = array();

        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }
}
