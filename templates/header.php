<?php
	include(dirname(__DIR__).'/core/config.php');
	include(dirname(__DIR__).'/core/utils.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Revista TAMS&trade;</title>
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
					<a class="navbar-brand" href="index.php">Revista TAMS&trade;</a>
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="home.php">
								<i class="fa-solid fa-house"></i> Acasa
							</a>
						</li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#categorii" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorii
                            </a>
                            <ul class="dropdown-menu" id="categorii">
                                <li class="dropdown-item">
                                    <a class="nav-link" href="tehnica.php">
                                        <i class="fa-solid fa-microchip"></i> Tehnica
                                    </a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link" href="arta.php">
                                        <i class="fa-solid fa-palette"></i> Arta
                                    </a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link" href="moda.php">
                                        <i class="fa-solid fa-vest"></i> Moda
                                    </a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link" href="stiinta.php">
                                        <i class="fa-solid fa-flask"></i> Stiinta
                                    </a>
                                </li>
                            </ul>
                        </li>
						<li class="nav-item" data-bs-toggle="modal" data-bs-target="#aboutUsModal"">
							<a class="nav-link" href="#">
								<i class="fa-solid fa-question"></i> Despre noi
							</a>
						</li>
					</ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <form class="d-flex d-inline" action="search.php" method="GET">
                            <input class="form-control me-2 w-100" type="search" name="search" placeholder="Cauta..." aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Cautare</button>
                        </form>
                    </ul>
					<?php
						if(logged_in()){
                            include 't_meniu_' . $_SESSION['role'] .'.php';
                        } else { ?>
						<a class="text-decoration-none text-white" href="autentificare.php">
							<button class="btn btn-outline-light outline-light mx-2" type="submit">Autentifcare</button>
						</a>
						<a class="text-decoration-none text-white" href="inregistrare.php">
							<button class="btn btn-outline-light outline-light mx-2" type="submit">Inregistrare</button>
						</a>
					<?php } ?>
				</div>
				<div class="modal fade" id="aboutUsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Despre noi</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<h3>Ce este Revista TAMS&trade;?</h3>
								<p>Revista TAMS&trade; este o platforma ce aduce impreuna atat jurnalisti, editori cat si consumatori de materiale legate de Tehnica, Arta, Moda si Stiinta.</p>
								<h3>Pentru cine este platforma Revista TAMS&trade;?</h3>
								<p>Platform noastra se adreseaza tuturor iubitorilor de stiinta, arta, tehnica si stinta, fie ca este consumator de articole sau chiar scriitor.</p>
								<h3>Cum se foloseste acest produs?</h3>
								<p>Utilizarea platformei este foarte facila.</p>
								<p>Iti creezi un cont <a class="text-decoration-none text-warning" href="inregistrare.php">aici</a> si ai acces ne-restrictionat la toate materialele publicate pe platforma noastra</p>
								<p>Ca si utilizator inregistrat poti, de asemenea, sa iti creezi o lista cu articolele favorite, pe care le poti re-citii oricand doresti</p>
								<h3>Cum va pot contacta?</h3>
								<p>Cel mai usor mod de a ne contacta este sa ne trimiti un <a class="text-decoration-none text-warning" href="mailto:example@email.com:">email</a></p>
								<h3>Cum pot sa contribui si eu?</h3>
								Pentru a putea contribuii la platforma noastra, trebuie sa iti creezi un cont de jurnalist <a class="text-decoration-none text-warning" href="inregistrare.php">aici</a>.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Inchide</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
