<section class="vh-100 gradient-custom">
    <div class="container py-2 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card bg-dark text-white shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Inregistrare</h3>
                        <form name="inregistrare" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="u_name" name="u_name" class="form-control form-control-lg"
                                               value="<?php if(isset($_POST['u_name'])) { echo $_POST['u_name']; } ?>" />
                                        <label class="form-label" for="u_name">Nume utilizator</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="f_name" name="f_name" class="form-control form-control-lg"
                                               value="<?php if(isset($_POST['f_name'])) { echo $_POST['f_name']; } ?>"/>
                                        <label class="form-label" for="f_name">Nume</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="l_name" name="l_name" class="form-control form-control-lg"
                                               value="<?php if(isset($_POST['l_name'])) { echo $_POST['l_name']; } ?>" />
                                        <label class="form-label" for="l_name">Prenume</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="email" id="u_email" name="u_email" class="form-control form-control-lg"
                                               value="<?php if(isset($_POST['u_email'])) { echo $_POST['u_email']; } ?>" />
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
                                <div class="d-flex justify-content-center text-center pt-1">
                                    <input class="btn btn-outline-warning" type="submit" name="inregistrare" value="Inregistrare" />
                                </div>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>