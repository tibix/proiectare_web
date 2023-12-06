<?php

session_start();

include 'core/utils.php';

require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/Notification.php';

include 'templates/header.php';

if(!logged_in())
{
    redirect('home.php');
}

if(isset($_POST))
{
    $db = new Database();
    $arts = new Article($db);
    $notify = new Notification($db);

    if(!empty($_POST['message']))
    {
        $message = $_POST['message'];
    } else {
        redirect('home.php');
    }

    if(!empty($_POST['article_id'])){
        $id = $_POST['article_id'];
    }

    if($id)
    {
        $articol = $arts->getArticleById($id);

        if($articol){
            // verificam daca exista notificari curente
            $notificari = $notify->getArticleNotification($id);
            if($notificari)
            {
                // inchidem notificarea curenta si generam o notificare noua cu mesajul postat
                $inchide_notificarea = $notify->changeNotification($notificari[0]['id'], "Jurnalistul are modificari de facut", "done");
                if($inchide_notificarea)
                {
                    // generam o noua notificare
                    $notificare_noua = $notify->createNotification($message, $articol['user_id'], $_SESSION['user_id'], $articol['id']);
                    if($notificare_noua){
                        //schimbam statusul articolului
                        $arts->setStatus($articol['id'], 5);
                        show_success("Articolul a fost rejectat cu succes! Click <a href='home.php' class='text-dark'>aici</a> pentru a reveni la pagina principala.");
                    } else {
                        show_errors(['A aparut o eroare in procesul de rejectarea: '. $notificare_noua.'.', 'Click <a href="home.php" class="text-dark">aici</a> pentru a reveni la pagina principala.']);
                    }
                } else {
                    show_errors(['A aparut o eroare in procesul de rejectarea: '. $inchide_notificarea.'.', 'Click <a href="home.php" class="text-dark">aici</a> pentru a reveni la pagina principala.']);
                }
            } else {
                // generam o notificare cu mesajul postat
                $notificare_noua = $notify->createNotification($message, $articol['user_id'], $_SESSION['user_id'], $articol['id']);
                if($notificare_noua){
                    $arts->setStatus($articol['id'], 5);
                    show_success("Articolul a fost rejectat cu succes! Click <a href='home.php' class='text-dark'>aici</a> pentru a reveni la pagina principala.");
                } else {
                    show_errors(['A aparut o eroare in procesul de rejectarea: '. $notificare_noua.'.', 'Click <a href="home.php" class="text-dark">aici</a> pentru a reveni la pagina principala.']);
                }
            }
        } else {
            show_errors(['Articolul invalid nu poate fii validat si rejectat!']);
        }
    } else {
        show_errors(['Acest id nu reprezinta un articol valid!', 'Mergeti <a href="'. $_SERVER['HTTP_REFERER'] .'" class="text-dark">inapoi</a> pentru a remedia situatia!']);
    }
} else {
    redirect('home.php');
}
