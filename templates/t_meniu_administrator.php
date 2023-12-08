<div class="btn-group">
    <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user-ninja"> </i>  <?php echo($_SESSION['f_name'] . ' ' .$_SESSION['l_name']); ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" id="dropDownMenu">
        <li>
            <a class="dropdown-item" href="gestionare_utilizatori.php">
                <i class="fa-solid fa-users"></i>
                Gestioneaza Utilizatori
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="gestionare_articole.php">
                <i class="fa-solid fa-user-plus"></i>
                Gestioneaza Articole
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item" href="favorites.php">
                <i class="fa-solid fa-bookmark"></i>
                Favorite
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item" href="editare_profil.php">
                <i class="fa-solid fa-pen"></i>
                Editare Profil
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="resetare_parola.php">
                <i class="fa-solid fa-key"></i>
                Resetarea Parola
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="deconectare.php"><span><i class="fa-solid fa-arrow-right-from-bracket"> </i> Deconectare</span></a></li>
    </ul>
</div>