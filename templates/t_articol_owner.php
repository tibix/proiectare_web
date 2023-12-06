<div class='container my-4'>
    <div class="card mb-5">
        <div class="card-header">
            Autor: <b><?php echo "{$author}"; ?></b>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo "{$articol['title']}"; ?></h5>
            <p class="card-text"><?php echo "{$articol['content']}";?></p>
        </div>
    </div>
    <hr>
    <h3 class="text-center">Notificari</h3>
    <div class="list-group">
        <?php if($notifications): ?>
        <?php foreach ($notifications as $notification):?>
        <a href="" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?=$notification['message']?></h5>
                <small><?=dates_difference($notification['date_created'])?></small>
            </div>
            <p class="mb-1">Status:
                <?php if($notification['status'] == 'done'):?>
                    <span class="badge bg-success">Done</span>
                <?php else: ?>
                    <span class="badge bg-danger">New</span>
                <?php endif; ?>
            </p>
            <small>
                Postat de:
                <?php if($notification['user_id'] == $_SESSION['user_id']): ?>
                    <span class="fw-bold"><?=$_SESSION['user']?></span>
                <?php else: ?>
                    <span class="fw-bold">Editor</span>
                <?php endif; ?>
            </small>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>



