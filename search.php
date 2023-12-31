<?php
session_start();

include 'core/utils.php';

require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/User.php';
include 'templates/header.php';

echo "<div class=\"container\">";
echo "<h1 class=\"text-center\">Termenul cautat este \"". $_GET['search'] ."\"</h1><br>";

$db = new Database();
$articol = new Article($db);

if(!empty($_GET['search'])){
    if($_SESSION['role'])
    {
        if($_SESSION['role'] == 'editor' || $_SESSION['role'] == 'administrator')
        {
            $articole = $articol->searchArticles($_GET['search']);
        } else {
            $articole = $articol->searchArticles($_GET['search'], [1]);
        }
    } else {
        $articole = $articol->searchArticles($_GET['search'], [1]);
    }

    if(count($articole) > 0){
        echo "<h3 class=\"text-center\">Am gasit " . count($articole) . " rezultate ce contin termenul \"". $_GET['search']. "\"</h3>";
        echo "<ul class=\"list-group my-4\">";
        foreach($articole as $a){
            echo "<li class=\"list-group-item\">";
            echo "<h3><a class=\"link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover\" href=\"articol.php?id=" . $a['id'] . "\">" . $a['title'] . "</a></h3>";
            echo "<p>" . substr($a['content'], 0, 300) . "...</p>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>Nu am gasit nici un rezultat ce contine termenul \"". $_GET['search']. "\"</h2>";
    }
} else {
    echo "<h2>Introduceti un termen de cautare</h2>";
}
echo "</div>";
include 'templates/footer.php';
