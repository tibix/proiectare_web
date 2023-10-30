<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/Article.php';

include 'templates/header.php';

if(isset($_POST['autentificare'])){
    //preluam user si parola, verificam in baza de date daca user-ul exista, pornim sesiunea si redirectam in home.php
    echo "Yay, esti autentifica!";
} else {

?>
<section class="vh-100 gradient-custom">
    <div class="container py-2 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Autentificare</h2>
                            <p class="text-white-50 mb-5">Intorduceti email si parola pentru autentificare!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX">Email</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX">Parola</label>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Recuperare Parola</a></p>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Autentificare</button>

                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="inregistrare.php" class="text-white-50 fw-bold">Sign Up</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>
<?php include 'templates/footer.php'; ?>
