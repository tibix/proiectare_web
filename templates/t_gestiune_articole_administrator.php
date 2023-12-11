<?php if($articole): ?>
    <?php

    $statusuri = array();
    foreach ($articole as $articol)
    {
        $statusuri[$articol['status_id']][] = $articol;
    }

    ?>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-sm-12 bg-white mr-3">
                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                    <?php foreach ($statusuri as $status => $items): ?>
                    <?php
                    $notifications = 0;
                    foreach ($items as $item)
                    {
                        if($notify->hasNotification($item['id']))
                        {
                            $notifications += 1;
                        }
                    }
                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark fw-bold" id="pills-<?=idToStatus($status);?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?=idToStatus($status);?>" type="button" role="tab" aria-controls="pills-draft" aria-selected="true">
                            <?php if($status == 2 && $notifications > 0) {
                                echo "<span class=\"badge text-bg-danger\"> <i class=\"fa fa-bell\"></i> ". $notifications ." </span>&nbsp;&nbsp;";
                            }?>
                            Articole  <?=idToStatus($status);?><?php if($status == 3) { echo "-uri"; } else { echo "e";}?>
                        </button>
                    </li>
                    <?php endforeach;?>
                </ul>
                <?php foreach ($statusuri as $status => $items): ?>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show" id="pills-<?=idToStatus($status);?>" role="tabpanel" aria-labelledby="pills-<?=idToStatus($status);?>-tab" tabindex="0">
                            <div class="accordion accordion-flush" id="articles">
                                <?php foreach($items as $index => $articol): ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="hitem<?=$articol['id']?>">
                                            <button class="accordion-button collapsed bg-light text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#item<?=$articol['id']?>" aria-expanded="false" aria-controls="item<?=$articol['id']?>">
                                                <?php
                                                $notification = $notify->hasNotification($articol['id']);

                                                if($notification)
                                                {
                                                    echo "<span class=\"badge text-bg-danger\"> <i class=\"fa fa-bell\"></i> ". count($notification) ." </span>&nbsp;&nbsp;";
                                                }
                                                ?>
                                                <?=$articol['title']?>
                                                <?php
                                                if($articol['status_id'] == 3){
                                                    echo "<span class=\"text-small text-danger\">&nbsp;(Draft)</span>";
                                                }
                                                ?>
                                            </button>
                                        </h2>
                                        <div id="item<?=$articol['id']?>" class="accordion-collapse collapse" aria-labelledby="hitem<?=$articol['id']?>">
                                            <div class="accordion-body">
                                                <p class="card-text">
                                                    <strong>Categorie: </strong><?=ucfirst(idToCategory($articol['category_id']));?>
                                                    <strong>Creat: </strong><?=$articol['date_created']?>
                                                    <strong>Scris de: </strong><?=$arts->getOwner($articol['id']);?>
                                                </p>
                                                <hr>
                                                <p class="card-text"><?=substr($articol['content'], 0, 100).' ...'?></p>
                                                <a href="articol.php?id=<?=$articol['id']?>" class="btn btn-outline-secondary">Vezi Articol</a>
                                                <hr>
                                                <a href="publica_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-warning text-dark <?php if($articol['status_id'] == 1 || $articol['status_id'] == 4) { echo "disabled"; }?>" ><i class="fa fa-upload"></i> Publica</a>
                                                <?php if($articol['featured']):?>
                                                    <a href="promoveaza_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-warning text-dark">
                                                    <i class="fa fa-circle-down"></i> De-Promoveaza Articol
                                                <?php else: ?>
                                                    <a href="promoveaza_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-warning text-dark">
                                                    <i class="fa-regular fa-circle-up"></i> Promoveaza Articol
                                                <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php else: ?>
    <?php show_errors(["Nu exista nici un articol!"]); ?>
<?php endif; ?>
