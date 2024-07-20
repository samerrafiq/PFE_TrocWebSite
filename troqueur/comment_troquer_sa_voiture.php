<?php
include_once("../connexion.php");
session_start();
if(!isset($_SESSION['code_trq']))
    header("location: ../index.php");
$result = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = ".$_SESSION['code_trq']);
$informations = mysqli_fetch_assoc($result);
$code_trq = $informations['code_trq'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Comment troquer sa voiture ?</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body  bgcolor="GhostWhite">
	<?php  include_once("header.php"); ?>
	<section>
		<h1 class="title-section" style="margin-top: 50px;">Le guide de l echange automobile ou Comment troquer sa voiture ?</h1>
		<h3>Pourquoi troquer sa voiture ? </h3>		
									- Pour gagner du temps <br>
									- Pour ne pas se retrouver a pied <br>
									- Parce que son vehicule ne se vend pas <br>
							- Parce que l'on peut vraiment y gagner au change <br>									
		
							 <br>	 <h3>Preparer le troc </h3>		Vous vous etes mis d'accord avec un membre du site sur le troc a effectuer, mais avez-vous pense a tout ? Avant de realiser la transaction et de vous deplacer, comme pour une vente classique pensez a verifier tous les points suivants : <br>
							 - la valeur r&eacute;elle de la voiture (cote argus ou lacentrale)<br>
							 - l'&eacute;tat du v&eacute;hicule (kilom&eacute;trage, carrosserie, entretien et r&eacute;parations, &eacute;quipements...)<br>
							 - le controle technique a t-il moins de 6 mois ?<br>
							 - la carte grise est-elle &agrave; jour.<br>
							 <br>
							 N hesitez pas &agrave; prendre votre temps et &agrave; effectuer une premi&egrave;re visite avant de conclure le troc.
							 <br>
							 <br>
							  <h3>Pendant le troc</h3>		
							  Une fois d accord sur l'&eacute;change. <strong>Pr&eacute;parez deux certificats de cession de v&eacute;hicule</strong>. Vous c&eacute;dez votre v&eacute;hicule &agrave; Mr X. et Mr X vous c&egrave;de son v&eacute;hicule.<br>
							  En cas de soulte (diff&eacute;rence de valeur entre les deux v&eacute;hicules), pensez &agrave; fournir un ch&egrave;que de banque. <br>
							  Enfin n'oubliez pas d'appeler votre assurance avant le jour de l'&eacute;change. <br>
	</section>
	<?php include_once("footer.php"); ?>
</body>
</html>