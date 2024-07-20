<?php
include "lirests.php";
session_start();
if(!isset($_SESSION['code_adm'])) {
	if(isset($_SESSION['code_trq'])) {
		header("location: ../troqueur/index.php");
	}
	else {
		header("location: ../index.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/mystyle.css">
	<link rel="stylesheet" href="css/card.css">

	<title>Accueil Admin</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<i class='bx bx-reflect-vertical'></i>
			<span class="text">Troc Maroc</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Accueill</span>
				</a>
			</li>
			<li>
				<a href="GAdmins.php">
					<i class='bx bx-table'></i>
					<span class="text">Administrateurs</span>
				</a>
			</li>
			<li>
				<a href="Troqueur.php">
					<i class='bx bx-table'></i>
					<span class="text">Troqueurs</span>
				</a>
			</li>
			<li>
				<a href="Categorie.php">
					<i class='bx bx-table'></i>
					<span class="text">Categories</span>
				</a>
			</li>
			<li>
				<a href="Annonces.php">
					<i class='bx bx-table'></i>
					<span class="text">Annonces</span>
				</a>
			</li>
			<li>
				<a href="Commentaire.php">
					<i class='bx bx-table'></i>
					<span class="text">Commentaires</span>
				</a>
			</li>
			<li>
			<a href="Bloquer.php" >
					<i class='bx bx-table'></i>
					<span class="text">Debloquer</span>
				</a>
			</li>
			<li>
				<a href="Messages.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Messages</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../deconnexion.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Se deconnecter</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>

			<form action="#" style="visibility: hidden;">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form >


		</nav>
		<!-- NAVBAR -->
			</section>
	<!-- CONTENT -->



<section id="content">
	<?php
		$nbrcomr = mysqli_fetch_assoc($nbrcom);
		$nbradmr = mysqli_fetch_assoc($nbradm);
		$nbrmsgr = mysqli_fetch_assoc($nbrmsg);
		$nbrtrqr = mysqli_fetch_assoc($nbrtrq);
		$nbrannr = mysqli_fetch_assoc($nbrann);
		$nbrblqr = mysqli_fetch_assoc($nbrblq);
		$nbrctr = mysqli_fetch_assoc($nbrctr);

	?>
	</div>
	<section class="CardContainer">
		<div class="card">
			<h2>Administrateurs</h2><br>
			<a href="GAdmins.php"><?php echo $nbradmr['count(*)'];?></a>
		</div>
		<div class="card">
			<h2>Messages </h2><br>
			<a href="Messages.php"><?php echo $nbrmsgr['count(*)'];?></a>
		</div>
		<div class="card">
			<h2>Troqueurs</h2><br>
			<a href="Troqueur.php"><?php echo $nbrtrqr['count(*)'] ;?></a>
		</div>
	</section>
	<section class="CardContainer">
		<div class="card">
			<h2>Annonces</h2><br>
			<a href="Annonces.php"><?php echo $nbrannr['count(*)'];?></a>
		</div>
		<div class="card">
			<h2>Bloqués </h2><br>
			<a href="Bloquer.php"><?php echo $nbrblqr['count(*)'] ;?></a>
		</div>
		<div class="card">
			<h2>Categories</h2><br>
			<a href="Categorie.php"><?php echo $nbrctr['count(*)'] ;?></a>
		</div>
		<div class="card">
			<h2>Commentaires</h2><br>
			<a href="Commentaire.php"><?php echo $nbrcomr['count(*)'] ;?></a>
		</div>
	</section >
</section>
<script src="js/script.js"></script>
</body>
</html>
