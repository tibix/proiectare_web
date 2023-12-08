<?php


if(!$_SESSION['role'] == "administrator")
{
    redirect('index.php');
}

$db = new Database();
$arts = new Article($db);
$fav = new Favorite($db);
$user = new User($db);

$arts_stats = $arts->getAllArticlesPerUser();
$arts_categ = $arts->getAllArticlesPerCategory();
$arts_status = $arts->getAllArticlesPerStatus();
$favs_stats = $fav->getFavsPerUser();
$users = $user->getUsers([1,2,3])


?>

<div class="row content mx-4 my-4">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Articole / Jurnalist</h5>
          <canvas id="arts_stats"></canvas>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Articole / Categorie</h5>
          <canvas id="arts_categ"></canvas>
      </div>
    </div>
  </div>
    <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Favorite / Utilizator</h5>
          <canvas id="favs_stats"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row content mx-4 my-4">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Articole / Status</h5>
                <canvas id="arts_status"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Lista cu Utilizatori</h5>
                <div class="list-group">
                    <?php foreach ($users as $u):?>
                    <a class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?=$u['u_name']?></h5>

                        </div>
                        <?php if($u['role_id'] == 1):?>
                        <p class="mb-1">Rol:
                                <span class="badge bg-success"><?=idToRol($u['role_id'])?></span>
                        </p>
                        <?php elseif($u['role_id'] == 2):?>
                        <p class="mb-1">Rol:
                            <span class="badge bg-warning"><?=idToRol($u['role_id'])?></span>
                        </p>
                        <?php else: ?>
                        <p class="mb-1">Rol:
                            <span class="badge bg-danger"><?=idToRol($u['role_id'])?></span>
                        </p>
                        <?php endif;?>
                        <small>
                            Cont creat acum: <span class="fw-bold"><?=some_time_ago($u['date_created']);?></span>, ultima logare acum: <span class="fw-bold"><?=some_time_ago($u['last_login']);?></span>
                        </small>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3""></script>
<script>
    var arts_stats = document.getElementById("arts_stats");
    new Chart(arts_stats, {
        type: "doughnut",
        data: {
            labels: [
                <?php
                foreach($arts_stats as $art)
                {
                    echo '\'' . $art['author'] . '\',';
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    foreach($arts_stats as $art_stat)
                    {
                        echo $art_stat['total_articles'] . ',';
                    }
                    ?>
                ],
                backgroundColor: [
                    <?php
                    foreach($arts_stats as $art_stat)
                    {
                        echo(generateRandomColor() . ',');
                    }
                    ?>
                ],
                hoverOffset: 4
            }]
        }
    });

    var arts_categ = document.getElementById("arts_categ");
    new Chart(arts_categ, {
        type: "doughnut",
        data: {
            labels: [
                <?php
                foreach($arts_categ as $art)
                {
                    echo '\'' . $art['category_name'] . '\',';
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    foreach($arts_categ as $art_stat)
                    {
                        echo $art_stat['count'] . ',';
                    }
                    ?>
                ],
                backgroundColor: [
                    <?php
                    foreach($arts_categ as $art_stat)
                    {
                        echo(generateRandomColor() . ',');
                    }
                    ?>
                ],
                hoverOffset: 4
            }]
        }
    });

    var favs_stats = document.getElementById("favs_stats");
    new Chart(favs_stats, {
        type: "doughnut",
        data: {
            labels: [
                <?php
                foreach($favs_stats as $f)
                {
                    echo '\'' . $f['owner'] . '\',';
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    foreach($favs_stats as $f)
                    {
                        echo $f['count'] . ',';
                    }
                    ?>
                ],
                backgroundColor: [
                    <?php
                    foreach($favs_stats as $f)
                    {
                        echo(generateRandomColor() . ',');
                    }
                    ?>
                ],
                hoverOffset: 4
            }]
        }
    });

    var arts_status = document.getElementById("arts_status");
    new Chart(arts_status, {
        type: "doughnut",
        data: {
            labels: [
                <?php
                foreach($arts_status as $f)
                {
                    echo '\'' . $f['status'] . '\',';
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    foreach($arts_status as $f)
                    {
                        echo $f['count'] . ',';
                    }
                    ?>
                ],
                backgroundColor: [
                    <?php
                    foreach($arts_status as $f)
                    {
                        echo(generateRandomColor() . ',');
                    }
                    ?>
                ],
                hoverOffset: 4
            }]
        }
    });
</script>