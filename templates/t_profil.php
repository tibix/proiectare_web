<div class="container my-4">
    <div class="col-md-6">
        <div class="row">
            <form method="POST">
                <div class="col mb-4">
                    <div class="form-floating">
                        <input type="text" id="user_name" name="user_name" class="form-control"
                               value="<?php if(isset($_SESSION['user'])) { echo $_SESSION['user']; } ?>" autofocus required/>
                        <label class="form-label" for="user_name">Nume utilizator</label>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="form-floating">
                        <input type="text" id="first_name" name="first_name" class="form-control"
                               value="<?php if(isset($_SESSION['f_name'])) {echo($_SESSION['f_name']);}?>" required/>
                        <label class="form-label" for="first_name">Nume</label>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="form-floating">
                        <input type="text" id="last_name" name="last_name" class="form-control"
                               value="<?php if(isset($_SESSION['l_name'])) {echo($_SESSION['l_name']);}?>" required/>
                        <label class="form-label" for="last_name">Pre-nume</label>
                    </div>
                </div>
                <div class="col mb-4 pb-2">
                    <div class="form-floating">
                        <input type="email" id="email" name="email" class="form-control"
                               value="<?php if(isset($_SESSION['email'])) {echo($_SESSION['email']);} ?>" required/>
                        <label class="form-label" for="email">Email</label>
                    </div>
                </div>
                <div class="col mb-4 pb-2">
                    <div class="form-floating">
                        <input id="date_created" class="form-control" disabled value="<?=$_SESSION['role']?>">
                        <label class="form-label" for="date_created">Rol</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                    <button type="submit" id="save_data" name="actualizare" class="btn btn-outline-warning mb-2">Salveaza Modificarile</button>
                    <a class="btn btn-danger float-end" href="resetare_parola.php">Reset Password</a>
                </div>
            </form>
        </div>
    </div>
</div>
