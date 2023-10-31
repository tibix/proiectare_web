<?php
    include(dirname(__DIR__).'/includes/utils.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Revista IOT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6f78ace1ca.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <button class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01"
                        aria-controls="navbarTogglerDemo01"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="index.php">Revista IOT</a>
                    <?php
                        if(logged_in()){
                    ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <form class="d-flex d-inline">
                                <input class="form-control me-2 w-100" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
                        </ul>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"> </i>  <?php echo($_SESSION['f_name'] . ' ' .$_SESSION['l_name']); ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" id="dropDownMenu">
                                <li>
                                    <a class="dropdown-item" href="{% url 'create_album' %}">
                                        <i class="fa-regular fa-images"> </i>
                                        Create New Album
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{% url 'upload' %}">
                                        <i class="fa-regular fa-image"> </i>
                                        Upload New Photo
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/map/1/">
                                        <i class="fa-solid fa-map"></i>
                                        Photo Map
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <a class="dropdown-item" href="{% url 'albums' %}">
                                        <i class="fa-solid fa-images"></i>
                                        View Album(s)
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{% url 'photos' %}">
                                        <i class="fa-solid fa-image"></i>
                                        View Photos(s)
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{% url 'profile' %}">
                                        <i class="fa-solid fa-pen"></i>
                                        Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/map/1/">
                                        <i class="fa-solid fa-key"></i>
                                        Reset Password
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="deconectare.php"><span><i class="fa-solid fa-arrow-right-from-bracket"> </i> Deconectare</span></a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#aboutUsModal">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa-solid fa-question"></i> About Us
                                </a>
                            </li>
                        </ul>
                        <a class="text-decoration-none text-white" href="deconectare.php">
                            <button class="btn btn-outline-light outline-light mx-2" type="submit">Deconectare</button>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </nav>
