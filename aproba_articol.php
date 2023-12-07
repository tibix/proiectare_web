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

if(isset($_GET))
{
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $db = new Database();
        $arts = new Article($db);
        $notify = new Notification($db);

        $article = $arts->getArticleById($id);
        if($article)
        {
            if($article['status_id'] == 2)
            {
                // verificam daca are notificare setata
                if($notify->hasNotification($id) == 0)
                {
                    // doar setam statusul articolululi in 1 (publicat)
                    $update_status = $arts->setStatus($id, 1);
                    if($update_status)
                    {
                        show_success("Articolul a fost publicat cu succes! Click <a href='home.php' class='text-dark'>aici</a> pentru a revenii la pagina principala.");
                        die();
                    } else {
                        show_errors(['Au aparut erori la publicarea articolului: '.$update_status.'. Click <a href="home.php" class="text-dark">aici</a> pentru a revenii la pagina principala.']);
                        die();
                    }
                } else {
                    // inchidem notificarea curenta
                    $current_notification = $notify->getArticleNotification($article['id']);
                    $close_notification = $notify->changeNotification($current_notification[0]['id'], $current_notification[0]['message'], "done");

                    if($close_notification)
                    {
                        $published = $arts->setStatus($id, 1);
                        if($published)
                        {
                            $notify->createNotification("Articolul a fost publicat cu success", $_SESSION['user_id'], $_SESSION['user_id'], $article['id'], 'done');
                            show_success("Articolul a fost publicat cu succes! Click <a href='home.php' class='text-dark'>aici</a> pentru a revenii la pagina principala.");
                            // creaza o noua notificare cu statusul done si cu mesajul "Publicat cu succes"
                        } else {
                            show_errors(['Au aparut erori la publicarea articolului: '.$update_status.'. Click <a href="home.php" class="text-dark">aici</a> pentru a revenii la pagina principala.']);
                        }
                    } else {
                        show_errors(['A aparut o eroare la actualizarea notificarii. Click <a href="home.php">aici</a> pentru a revenii la pagina principala!']);
                    }
                }
            } else {
                show_errors(['Acest articol nu este valid pentru publicare! Click <a href="home.php" class="text-dark">aici</a> pentru a revenii la pagina principala.']);
            }
        } else {
            show_errors(['Acesta nu este un articol valid. Click <a href="home.php" class="text-dark">aici</a> pentru a revenii la pagina principala.']);
        }
    }
}