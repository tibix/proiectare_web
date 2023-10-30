<?php

class Article
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function createArticle($title, $author, $content, $category)
    {
        $title = $this->db->escapeString($title);
        $author = $this->db->escapeString($author);
        $content = $this->db->escapeString($content);
        $category = $this->db->escapeString($category);

        $sql = "INSERT INTO articles (title, author, content, category) VALUES ('$title', '$author', '$content', '$category')";

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
        $sql = "SELECT * FROM articles WHERE category = '$category'";

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
        $author = $this->db->escapeString($author);
        $content = $this->db->escapeString($content);
        $category = $this->db->escapeString($category);

        $sql = "UPDATE articles SET title='$title', author='$author', content='$content', category='$category' WHERE id = $id";

        return $this->db->query($sql);
    }

    public function deleteArticle($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM articles WHERE id = $id";

        return $this->db->query($sql);
    }
}
