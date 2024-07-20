<?php

include_once("connexion.php");
//
session_start();
if(isset($_SESSION['code_trq'])) {
	header("location: troqueur/index.php");
	exit();
}
if(isset($_SESSION['code_adm'])) {
	header('location: administrateur/index.php');
	exit();
}
session_destroy();
//

?>

<!doctype html>

<html lang="fr">
<head>
	<title>Troc Maroc</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/home.css">
	<script src="js/script.js"></script>
</head>
<body>

	<!-- start script rechercher -->
	<?php
	if(isset($_POST['submit']))
	{
		$keywords = trim($_POST['titre']);
		if(strlen($keywords) == 0)
			header('location: anonym/index.php');
		else
			header("location: anonym/index.php?titre=$keywords");
	}
	?>
	<!-- end script rechercher -->

	<header>
		<h1><a class="logo" href="index.php">Troc Maroc</a></h1>
		<nav>
			<ul>
				<li><a href="anonym/index.php">Consulter les annonces</a></li>
				<li><a href="#section-2">Comment ça marche ?</a></li>
				<li class="connexion"><a href="anonym/connexion.php">Connexion</a></li>
			</ul>
		</nav>
	</header>
<!--section-1 : main section-->
	<section class="section-1">
		<div class="content">
			<h1>Donnez et trouvez des objets !</h1>
			<!--<p>Offrez une deuxième vie à vos objets inutilisés.</p>-->
			<div id="text"></div>
			<script type="text/javascript">
				var text = 0, caracter = 0;
				var objets = [
					"Un bureau",
					"Une tablette",
					"Un livre",
					"Une armoire",
					"Un piano",
					"Une table",
					"Un vélo",
					"Une chaise",
					"Un canapé",
					"Une étagière",
					"Un tapis"
				];
				typeText();
			</script>
			<div class="rechercher">
				<form method="post">
					<input type="text" name="titre" placeholder="Chercher des objets : Bureau, Livre, Vélo, ...">
					<button type="submit" name="submit"><img src="images/Site-Web/search.png" width="30px" height="30px"></button>
				</form>
			</div>
		</div>
	</section>

	<!--section 2 : comment ça marche ?-->
	<section class="section-2" id="section-2">
		<h1 class="title-section title-1">Comment ça marche ?</h1>
		<div class="cards">
	<!--step 1 :-->
			<div class="card">
				<img src="images/Site-Web/step-1.jpg">
				<h2 class="card-title">Je mets en ligne mon annonce</h2>
				<p class="explenation">Prenez votre article en photo, décrivez-le et c'est en ligne !</p>
			</div>
	<!--step 2 :-->
			<div class="card">
				<img src="images/Site-Web/step-2.jpg">
				<h2 class="card-title">Discutez avec les membres</h2>
				<p class="explenation">Échangez via la messagerie instantanée avec les personnes intéressées par vos articles puis convenez d'un rendez-vous.</p>
			</div>
	<!--step 3 :-->
			<div class="card">
				<img src="images/Site-Web/step-3.jpg">
				<h2 class="card-title">C'est donné !</h2>
				<p class="explenation">Magnifique ! Vous avez echangé votre article !</p>
			</div>
		</div>
	</section>

	<!--section-3 : dernieres annonces-->
	<section class="annonce">
		<h1 class="title-section title-2">Dérnières annonces</h1>
		<div class="cards">

		<!-- start script -->
		<?php
		$result = mysqli_query($code, "SELECT code_anc, titre, image_1, date_pub FROM annonce ORDER BY code_anc DESC");
		if(mysqli_num_rows($result) > 0)
		{
			$index = 1;
			while($annonce = mysqli_fetch_assoc($result) and $index <= 5)
			{
				$index++;
				$image = $annonce['image_1'];
				$title = $annonce['titre'];
				$date = $annonce['date_pub'];
				$code_anc = $annonce['code_anc'];
		?>
				<a class="annonce-card" href="anonym/annonce.php?annonce=<?php print($code_anc)?>">
				<div class="card">
				<img src="<?php echo $image;?>">
				<h2><?php echo $title;?></h2>
				<p><?php echo explode(" ", $date)[0];?></p>
				</div>
				</a>
		<?php
			}
		?>
			</div>
			<div class="voir-plus"><form method="post"><Button name='voir'>Voir plus</Button></form></div>
		<?php
		} else {
			echo "<h1 style=''>Aucune annonce trouvez.</h1>";
		}
		?>
		<!-- end script -->
	<!-- start script -->
	<?php
	if(isset($_POST['voir']))
		header('location: anonym/index.php');
	?>

	</section>

	<!-- footer -->
	<?php include_once("footer.php"); ?>

</body>
</html>
