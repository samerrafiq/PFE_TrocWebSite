<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/mystyle.css">

	<title>Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bx-reflect-vertical'></i>
			<span class="text">Troc Maroc</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
			<a href="GAdmins.php">
					<i class='bx bx-table'></i>
					<span class="text">Administrateurs</span>
				</a>
			</li>
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Accueill</span>
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
				<a href="Messages.php" >
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
			<a href="Bloquer.php" >
					<i class='bx bx-table'></i>
					<span class="text">Debloquer</span>
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

			<form action="chercheradmin.php" method="post" >
				<div class="form-input">
					<input type="search" name="nom" placeholder="Nom admin">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>


		</nav>
		<!-- NAVBAR -->
			</section>
	<!-- CONTENT -->


	<script src="js/script.js"></script>
</body>
</html>
