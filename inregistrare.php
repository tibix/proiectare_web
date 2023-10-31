<?php

require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/Article.php';

include 'templates/header.php';


if(isset($_POST['inregistrare'])){
    // validam forma
    $errors = array();

    if(!empty($_POST['u_name'])) { $u_name = $_POST['u_name']; } else { $errors[] = "Nume utilizator invalid!"; }
    if(!empty($_POST['f_name'])) { $f_name = $_POST['f_name']; } else { $errors[] = "Nume invalid!"; }
    if(!empty($_POST['l_name'])) { $l_name = $_POST['l_name']; } else { $errors[] = "Prenume invalid!"; }
    if(!empty($_POST['u_email'])) { $email = $_POST['u_email']; } else { $errors[] = "Email invalid!"; }
    if(!empty($_POST['u_password'])) { $password = $_POST['u_password']; } else { $errors[] = "Parola invalida!"; }
    if(!empty($_POST['u_password_c'])) { $password2 = $_POST['u_password_c']; } else { $errors[] = "Confirmare parola invalida!"; }
    if($password !== $password2) { $errors[] = "Parolele nu coincid!"; }

    if(empty($errors)){
        // save data to DB
        $db = new mysqli("localhost", "root", "", "editorial");
        // convert password to MD5 encripted string
        $password = md5($password);
        $now = date('Y-m-d H:i:s');
        $sql = "INSERT INTO users (u_name, f_name, l_name, email, pass) VALUES ('$u_name', '$f_name', '$l_name', '$email', '$password');";
        $db->query($sql);
        if($db->affected_rows > 0){
            $db->close();
            header("Location: autentificare.php");
        } else {
            echo $db->error();
        }

    } else {
        // show errors
        foreach($errors as $error){
            echo "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">". $error;
            echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
        }
    }
} else {

?>
<form name="inregistrare" method="POST">
    <section class="vh-100 gradient-custom">
        <div class="container py-2 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Inregistrare</h3>
                            <form>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="u_name" name="u_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="u_name">Nume utilizator</label>
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="f_name" name="f_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="f_name">Nume</label>
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="l_name" name="l_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="l_name">Prenume</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="email" id="u_email" name="u_email" class="form-control form-control-lg" />
                                            <label class="form-label" for="u_email">Email</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="password" id="u_password" name="u_password" class="form-control form-control-lg" />
                                            <label class="form-label" for="u_password">Parola</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="password" id="u_password_c" name="u_password_c" class="form-control form-control-lg" />
                                            <label class="form-label" for="u_password_c">Confirmare Parola</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" name="inregistrare" value="Inregistrare" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<?php } ?>

<?php include 'templates/footer.php'; ?>
