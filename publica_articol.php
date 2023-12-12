<?php

session_start();

include 'core/utils.php';

require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/Notification.php';
require_once 'classes/User.php';

if(!logged_in()){
    redirect('autentificare.php');
}

if(isset($_GET)){
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        //verificam daca articolul exista
        $db = new Database();
        $art = new Article($db);
        $user = new User($db);
        $editor = $user->getEditorId();
        prety_dump($editor);
        $article = $art->getArticleById($id);

        if($article)
        {
            if($_SESSION['role'] == 'jurnalist')
            {
                if($article['user_id'] == $_SESSION['user_id'])
                {
                    // avem o sesiune de jurnalist si articolul ii apartine
                    // mai trebuie verificat daca articolul este in status draft sau rejectat
                    if($article['status_id'] == 3 ||$article['status_id'] == 5) {
                        // verificam daca sunt notificari
                        $notify = new Notification($db);
                        $notificari = $notify->hasNotification($article['id']);
                        if ($notificari) {
                            $inchide_notificarea = $notify->changeNotification($notificari[0]['id'], "Corecturile au fost aplicate", "done");
                            $update_status = $art->setStatus($article['id'], 2);
                            $message = "Jurnalistul " . $_SESSION['l_name'] . " " . $_SESSION['f_name'] . " doreste sa publice articolul " . $article['title'] . " in categoria " . idToCategory($article['category_id']) . ".";
                            $notification = $notify->createNotification($message, $editor['id'], $_SESSION['user_id'], $article['id']);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $update_status = $art->setStatus($article['id'], 2);
                            if ($update_status) {
                                // acum putem genera notificarea pentru Editor
                                $message = "Jurnalistul " . $_SESSION['l_name'] . " " . $_SESSION['f_name'] . " doreste sa publice articolul " . $article['title'] . " in categoria " . idToCategory($article['category_id']) . ".";
                                $notification = $notify->createNotification($message, $editor['id'], $_SESSION['user_id'], $article['id']);
                                if ($notification) {
                                    // in punctul acesta am realizat toti pasii, si putem redirect utlizatorul innapoi la pagina de la care a venit
                                    redirect($_SERVER['HTTP_REFERER']);
                                }
                            }
                        }
                    } else {
                        show_errors(['wrong status: '.$article['status_id']]);
                    }
                } else {
                    show_errors(['not yours']);
                }
            } else {
                show_errors(['not jurnalist/editor']);
            }
        } else {
            redirect('home.php');
        }
    }
} else {
    redirect('index.php');
}
