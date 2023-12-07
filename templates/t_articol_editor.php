<div class='container my-4'>
    <div class="card mb-5">
        <div class="card-header">
            Autor: <b><?php echo "{$author}"; ?></b>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo "{$articol['title']}"; ?></h5>
            <p class="card-text"><?php echo "{$articol['content']}";?></p>
        </div>
        <?php if($articol['status_id'] == 2 || $articol['status_id'] == 5):?>
        <div class="card-footer">
            <a href="aproba_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-success">Aproba</a>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#reject">Respinge</button>
            <div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Motivarea respingerii</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="respinge_articol.php">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="message" id="message" placeholder="Explica respingerea" required>
                                    <label for="message">Adauga un mesaj explicativ</label>
                                    <input type="hidden" name="article_id" value="<?=$articol['id']?>">
                                </div>
                                <button class="btn btn-outline-danger" type="submit" name="article_reject">Respinge Articol</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Inchide</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
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
                            acum: <?=some_time_ago($notification['date_created'])?>
                        </small>
                    </a>
                <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
