<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/Article.php';

include 'templates/header.php';
?>

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
                                        <input type="text" id="firstName" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstName">Nume utilizator</label>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="firstName" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstName">Nume</label>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="lastName" class="form-control form-control-lg" />
                                        <label class="form-label" for="lastName">Prenume</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" id="emailAddress" class="form-control form-control-lg" />
                                        <label class="form-label" for="emailAddress">Email</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" id="emailAddress" class="form-control form-control-lg" />
                                        <label class="form-label" for="emailAddress">Parola</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" id="emailAddress" class="form-control form-control-lg" />
                                        <label class="form-label" for="emailAddress">Confirmare Parola</label>
                                    </div>

                                </div>
                            </div>

                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'templates/footer.php'; ?>
