<h1>Jurnalist</h1>
<?php
$my_articles = $arts->getAllArticles($_SESSION['user_id']);
foreach($my_articles as $article){
    echo "<h3>{$article['title']}</h3>";
}