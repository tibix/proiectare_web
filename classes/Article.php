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

    public function isFeatured($id)
    {
        $id = (int)$id;

        $sql = "SELECT featured FROM articles WHERE id = $id";
        $row = $this->db->query($sql);

        $result = $row->fetch_assoc();

        return (int)$result['featured'];
    }

    public function setFeaturedArticle($id)
    {
        $id = (int)$id;

        $sql = "UPDATE articles SET featured = 1 WHERE id = $id";
        $result = $this->db->query($sql);

        return $result;
    }

    public function removeFeaturedArticle($id)
    {
        $id = (int)$id;

        $sql = "UPDATE articles SET featured = 0 WHERE id = $id";
        $result = $this->db->query($sql);

        return $result;
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

	public function isOwner($id, $user_id){
		$id = (int)$id;
		$user_id = (int)$user_id;
		
		$sql = "SELECT user_id FROM articles WHERE id = $id";

		$result = $this->db->query($sql);
		$row = $result->fetch_assoc();

		if ($row['user_id'] == $user_id) {
			return true;
		} else {
			return false;
		}
	}

    public function getOwner($id)
    {
        $id = (int)$id;
        $sql = "SELECT u_name FROM users WHERE id = (SELECT user_id FROM articles WHERE id = $id)";

        $row = $this->db->query($sql);
        $result = $row->fetch_assoc();

        return $result['u_name'];
    }

	public function getCategories()
	{
		$sql = "SELECT id, category_name FROM categories";

		$result = $this->db->query($sql);
		$categories = array();

		while ($row = $result->fetch_assoc()) {
			$categories[] = $row;
		}

		return $categories;
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

        $user_id = (int)$user_id ? $user_id : null;
        if ($user_id) {
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
			$status_id = 3;
		}

		$sql = "INSERT INTO articles (title, content, user_id, category_id, status_id) VALUES ('$title', '$content', '$user_id', '$category', '$status_id')";

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

	public function updateArticle($id, $title, $content, $category, $date_modified=NULL)
	{	
		$id = (int)$id;
		$title = $this->db->escapeString($title);
		$content = $this->db->escapeString($content);
		$category = $this->db->escapeString($category);
		$date_modified = $this->db->escapeString(date('Y-m-d H:i:s'));

		$sql = "UPDATE articles SET title='$title', content='$content', category_id='$category', date_modified='$date_modified' WHERE id = $id";

		return $this->db->query($sql);
	}

	public function deleteArticle($id)
	{
		$id = (int)$id;
		$sql = "DELETE FROM articles WHERE id = $id";

		return $this->db->query($sql);
	}

	public function searchArticles($search, $status=null)
	{
		$search = $this->db->escapeString($search);
        if($status) {
            $sql = "SELECT * FROM articles WHERE (title LIKE '%$search%' OR content LIKE '%$search%') AND status_id IN (". implode(',', $status).")";
        } else {
            $sql = "SELECT * FROM articles WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
        }

		$result = $this->db->query($sql);
		$articles = array();

		while ($row = $result->fetch_assoc()) {
			$articles[] = $row;
		}

		return $articles;
	}

    public function setStatus($id, $status)
    {
        $id = (int)$id;
        $status = (int)$status;

        $sql = "UPDATE articles SET status_id = $status WHERE id = $id";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getArticleByStatus($status)
    {
        $status = (int)$status;
        $sql = "SELECT * FROM articles WHERE status_id = $status";

        $result = $this->db->query($sql);
        $articles = array();

        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }

    public function getAllArticlesPerUser()
    {
        $sql = "SELECT COUNT(user_id) AS total_articles, CONCAT(f_name ,' ',l_name) AS author from articles, users where articles.user_id = users.id GROUP BY f_name, l_name";
        $result = $this->db->query($sql);
        $articles = array();

        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }

    public function getAllArticlesPerCategory()
    {
        $sql = "SELECT COUNT(category_id) AS count, category_name FROM articles,categories WHERE articles.category_id=categories.id  GROUP BY category_id";
        $result = $this->db->query($sql);
        $articles = array();

        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }

    public function getAllArticlesPerStatus()
    {
        $sql = "SELECT COUNT(status_id) AS count, status FROM articles,status WHERE articles.status_id=status.id  GROUP BY status_id";
        $result = $this->db->query($sql);
        $articles = array();

        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }

}
