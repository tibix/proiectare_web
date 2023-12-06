<div class='container my-4'>
    <div class="card mb-5">
        <div class="card-header">
            Autor: <b><?php echo "{$author}"; ?></b>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo "{$articol['title']}"; ?></h5>
            <p class="card-text"><?php echo "{$articol['content']}";?></p>
        </div>
        <div class="card-footer">
            <a href="aproba_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-success">Aproba</a>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#reject">Rejecteaza</button>
            <div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Motivarea rejectarii</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="rejecteaza_articol.php">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="message" id="message" placeholder="Explica rejectarea" required>
                                    <label for="message">Adauga un mesaj de rejectare</label>
                                    <input type="hidden" name="article_id" value="<?=$articol['id']?>">
                                </div>
                                <button class="btn btn-outline-danger" type="submit" name="article_reject">Rejecteaza Articol</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Inchide</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
