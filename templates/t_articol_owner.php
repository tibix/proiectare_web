<div class='container my-4'>
    <div class="card mb-5">
        <div class="card-header">
            Autor: <b><?php echo "{$author}"; ?></b>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo "{$articol['title']}"; ?></h5>
            <p class="card-text"><?php echo "{$articol['content']}";?></p>
        </div>
        <?php if($articol['status_id'] == 2 || $articol['status_id'] == 3 || $articol['status_id'] == 5):?>
        <div class="card-footer">
            <a href="articol_editor.php?id=<?=$articol['id']?>" class="btn btn-outline-warning text-dark"><i class="fa fa-pen"></i> Editeaza</a>
            <a href="publica_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-warning text-dark"><i class="fa fa-upload"></i> Pregatit de publicare</a>
        </div>
        <?php endif; ?>
    </div>
    <?php if($notifications): ?>
    <hr>
    <h3 class="text-center">Notificari</h3>
    <div class="list-group">

        <?php foreach ($notifications as $notification):?>
        <a href="" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?=$notification['message']?></h5>

            </div>
            <p class="mb-1">Status:
                <?php if($notification['status'] == 'done'):?>
                    <span class="badge bg-success">Done</span>
                <?php else: ?>
                    <span class="badge bg-danger">New</span>
                <?php endif; ?>
            </p>
            <small>
                Postat de: <span class="fw-bold"><?=$notify->getUserById($notification['user_id'])?></span>,
                acum: <?=some_time_ago($notification['date_created']);?>
            </small>
        </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>



