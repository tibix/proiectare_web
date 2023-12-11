<?php

session_start();

include 'core/utils.php';
require_once 'core/utils.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/User.php';

include 'templates/header.php';
if(!logged_in() || $_SESSION['role'] == 4){
    redirect("autentificare.php");
}

$db = new Database();
$user = new User($db);

$utilizatori = $user->getUsers([1,2,3]);
?>
<div class="container-fluid">
    <div class="row my-3">
    <table class="table table-sm table-hover table-responsive">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nume Utilizator</th>
            <th scope="col">Nume</th>
            <th scope="col">Prenume</th>
            <th scope="col">Adresa de Email</th>
            <th scope="col">Cont creat in</th>
            <th scope="col">Ultima autentificare</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($utilizatori as $index => $u):?>
        <tr>
            <th scope="row"><?=$index?></th>
            <td><?=$u['u_name']?></td>
            <td><?=$u['f_name']?></td>
            <td><?=$u['l_name']?></td>
            <td><?=$u['email']?></td>
            <td><?=$u['date_created']?></td>
            <td>acum <?=some_time_ago($u['last_login'])?></td>
            <td>
                <button class="btn btn-outline-danger">Reseteaza parola</button>
            </td>
            <td>
                <?php if($u['role_id'] < 4): ?>
                    <a class="btn btn-outline-warning text-dark" href="gestioneaza_utilizator.php?id=<?=$u['id']?>&action=promote">Promoveza la <?=idToRol($u['role_id']+1)?></a>
                <?php endif;?>
            </td>
            <td>
                <?php if($u['role_id'] > 1): ?>
                    <a class="btn btn-outline-warning text-dark" href="gestioneaza_utilizator.php?id=<?=$u['id']?>&action=demote">Retrogradeaza la <?=idToRol($u['role_id']-1)?></a>
                <?php endif;?>
            </td>
            <td>
                <a class="btn btn-danger text-light" href="sterge_utilizator.php?id=<?=$u['id'];?>"><i class="fa fa-trash"></i> Sterge utilizatorul</a>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'templates/footer.php'; ?>