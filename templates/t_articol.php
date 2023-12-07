<div class='container my-4'>
    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title fw-bold text-decoration-underline"><?php echo "{$articol['title']}"; ?></h5>
            <p class="card-text"><?php echo "{$articol['content']}";?></p>
        </div>
        <div class="card-footer">
            Autor: <b><?php echo "{$author}"; ?></b>
            Categorie: <b><?=ucfirst(idToCategory($articol['category_id']))?></b>
            <?php if($fav->isFavorite($articol['id'], $_SESSION['user_id'])) { ?>
                <a class="btn btn-outline-danger float-end" href="favorites.php?id=<?=$articol['id']?>&action=remove"><i class="fa-solid  fa-heart"></i></a>
            <?php } else { ?>
                <a class="btn btn-outline-secondary float-end" href="favorites.php?id=<?=$articol['id']?>&action=add"><i class="fa-regular fa-heart"></i></a>
            <?php } ?>
        </div>
    </div>
</div>
