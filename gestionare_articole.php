<?php

session_start();

include 'core/utils.php';
require_once 'core/utils.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/Notification.php';
require_once 'classes/User.php';

include 'templates/header.php';
if(!logged_in() || $_SESSION['role'] == 1){
    redirect("autentificare.php");
}

$db = new Database();
$user = new User($db);
$arts = new Article($db);
$notify = new Notification($db);

if($_SESSION['role'] == 'jurnalist'){
    $articole = $arts->getAllArticles($_SESSION['user_id']);
    include 'templates/t_gestiune_articole_jurnalist.php';
} else {
    $articole = $arts->getAllArticles();
    include 'templates/t_gestiune_articole_'. $_SESSION['role'] .'.php';
}

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'templates/footer.php'; ?>