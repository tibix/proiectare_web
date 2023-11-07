<?php

session_start();

require_once 'core/utils.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';

if(!logged_in()) {
    header('Location: index.php');
    exit();
}

if(!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$db = new Database();
$article = new Article($db);
$to_delete = $article->getArticleById($_GET['id']);

if($article->isOwner($to_delete['id'], $_SESSION['user_id'])) {
    $article->deleteArticle($to_delete['id']);
    $db->close();
    header('Location: gestionare_articole.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}

