<?php

/**
 *
 */
class Favorite
{

    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    /**
     * Adds a bookmark to the user's favorites.
     *
     * @param int $user_id The ID of the user.
     * @param int $barticle_id The ID of the article.
     * @return bool True if the bookmark was added successfully, false otherwise.
     */
    public function addToFavorites($user_id, $article_id)
    {
        $user_id = (int)$user_id;
        $article_id = (int)$article_id;

        $sql = "INSERT INTO favorites (owner_id, article_id) VALUES ($user_id, $article_id)";

        return $this->db->query($sql);
    }

    /**
     * Removes a bookmark from the user's favorites.
     *
     * @param int $user_id The ID of the user.
     * @param int $article_id The ID of the article.
     * @return bool Returns true if the bookmark was successfully removed, false otherwise.
     */
    public function removeFromFavorites($user_id, $article_id)
    {
        $user_id = (int)$user_id;
        $article_id = (int)$article_id;

        $sql = "DELETE FROM favorites WHERE owner_id = $user_id AND article_id = $article_id";

        return $this->db->query($sql);
    }

    /**
     * Retrieves all favorites for a given user ID and limit results is argument is supplied
     *
     * @param int $id The user ID.
     * @return array|null The fetched favorites as an associative array, or null if no favorites found.
     */
    public function getAllFavorites($id, $limit=null)
    {
        $id = (int)$id;
        $limit = (int)$limit ? $limit : null;

        $results = array();

        if($limit) {
            $sql = "SELECT favorites.id, favorites.owner_id, favorites.article_id, articles.title, articles.content, articles.user_id FROM favorites
                    JOIN articles
                    ON favorites.article_id = articles.id
                    WHERE favorites.owner_id = $id
                    ORDER BY favorites.article_id
                    LIMIT $limit";
        } else {
            $sql = "SELECT favorites.id, favorites.owner_id, favorites.article_id, articles.title, articles.content, articles.user_id FROM favorites
                    JOIN articles
                    ON favorites.article_id = articles.id
                    WHERE favorites.owner_id = $id
                    ORDER BY favorites.article_id";
        }

        $row = $this->db->query($sql);

        while($result = $row->fetch_assoc()){
            $results[] = $result;
        }

        return $results;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getCountFavorites($id)
    {
        $id = (int)$id;
        $sql = "SELECT COUNT(id) AS count FROM favorites WHERE owner_id = $id";

        $row = $this->db->query($sql);
        $result = $row->fetch_assoc();

        return $result['count'];
    }


    /**
     * @param $id
     * @return bool
     */
    public function isFavorite($id, $user_id)
    {
        $id = (int)$id;
        $user_id = (int)$user_id;

        $sql = "SELECT article_id FROM favorites WHERE article_id = $id AND owner_id = $user_id";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        if($row)
        {
            return true;
        }

        return false;
    }

    public function getFavsPerUser()
    {
        $sql = "SELECT COUNT(article_id) AS count, CONCAT(f_name,' ',l_name) AS owner FROM favorites, users WHERE favorites.owner_id = users.id GROUP BY owner_id";
        $result = $this->db->query($sql);
        $favs = array();

        while ($row = $result->fetch_assoc()) {
            $favs[] = $row;
        }

        return $favs;
    }
}