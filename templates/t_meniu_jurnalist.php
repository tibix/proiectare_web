<div class="btn-group">
    <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user-pen"> </i>  <?php echo($_SESSION['f_name'] . ' ' .$_SESSION['l_name']); ?>
        <span class="badge text-bg-danger"> <i class="fa fa-bell"></i></span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" id="dropDownMenu">
        <li>
            <a class="dropdown-item" href="articol_nou.php">
                <i class="fa-solid fa-newspaper"></i>
                Articol nou
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="gestionare_articole.php">
                <i class="fa-solid fa-list-ul"></i>
                Articolele mele
                <span class="badge text-bg-danger"> <i class="fa fa-bell"></i></span>
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