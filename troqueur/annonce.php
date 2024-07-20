<?php

include_once("../connexion.php");
$code_anc = $_GET['annonce'];
$annonce = mysqli_query($code, "SELECT * FROM annonce WHERE code_anc = $code_anc");
if(mysqli_num_rows($annonce) == 0) {
	header('location: index.php');
	exit();
}
$annonce = mysqli_fetch_assoc($annonce);
$trqannonce = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = ".$annonce['code_trq']);
$trqannonce = mysqli_fetch_assoc($trqannonce);
$categorie = mysqli_query($code, "SELECT titre FROM categorie WHERE code_cat = ".$annonce['code_cat']);
$categorie = mysqli_fetch_assoc($categorie)['titre'];
session_start();
if(!isset($_SESSION['code_trq'])) {
    header("location: ../anonym/annonce.php?annonce=$code_anc");
    exit();
}
$informations = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = ".$_SESSION['code_trq']);
$informations = mysqli_fetch_assoc($informations);
$code_trq = $_SESSION['code_trq'];
$code_anc = $annonce['code_anc'];

?>

<!doctype html>
<html lang="fr">
<head>
	<title>Troc.ma</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/annonce.css">
	<script type="text/javascript" src="../js/functions.js"></script>
</head>
<body>

	<!-- start header -->
	<?php include_once("header.php");  ?>
    <!-- end header -->

    <!-- start main-section -->
	<section class="main-section">
		<div class="titles">
			<h1 class="annonce-title"><?php print($annonce['titre'])?></h1>
			<?php
			if(strcmp($code_trq, $annonce['code_trq']) == 0)
			{
				?>
				<form method="POST" onsubmit="return confirm('Voulez-vous supprimer cette annonce ?')">
					<button  type="submit" name="button-supprimer" id='button-supprimer'><img  src="../images/Site-Web/bin.png" title="Hover text"alt="Hover text"  width="23px" height="23px"></button>
				</form>
				<?php
				if(isset($_POST['button-supprimer'])) {
					mysqli_query($code, "DELETE FROM annonce WHERE code_anc = $code_anc");
					header('location: index.php');
					exit();
				}
			} else {
				$r = mysqli_query($code, "SELECT * FROM signals WHERE code_anc = $code_anc AND code_trq = $code_trq");
				if(mysqli_num_rows($r) == 0) {
					if(isset($_GET['signaler'])) {
						mysqli_query($code, "INSERT INTO signals(code_anc, code_trq) VALUES($code_anc, $code_trq)");
						mysqli_query($code, "UPDATE annonce SET signales = signales + 1 WHERE code_anc = $code_anc");
						print("<script> window.location.replace('annonce.php?annonce=$code_anc'); </script>");
					}
					?>
					<a href="annonce.php?annonce=<?php print($code_anc); ?>&signaler"><img src="../images/Site-Web/report-off.png" width="25px" height="25px"></a>
					<?php
				} else {
					if(isset($_GET['signaler'])) {
						mysqli_query($code, "DELETE FROM signals WHERE code_anc = $code_anc AND code_trq = $code_trq");
						mysqli_query($code, "UPDATE annonce SET signales = signales - 1 WHERE code_anc = $code_anc");
						print("<script> window.location.replace('annonce.php?annonce=$code_anc'); </script>");
					}
					?>
					<a href="annonce.php?annonce=<?php print($code_anc); ?>&signaler"><img src="../images/Site-Web/report-on.png" width="25px" height="25px"></a>
					<?php
				}
			}
			?>
		</div>
		<div class="annonce-images">
			<div class="swapers">
				<img id="change-image-prev" src="../images/Site-Web/previous.png" width="20px" height="20px" onClick="change_image(0)">
				<img id="change-image-next" src="../images/Site-Web/next.png" width="20px" height="20px" onClick="change_image(1)">
			</div>
			<img id="curent-image" src="<?php print("../".$annonce["image_1"]);?>">
		</div>
		<script type="text/javascript">
			var index = 0;
			var images = [
				'<?php print("../".$annonce['image_1']);?>',
				'<?php print("../".$annonce['image_2']);?>',
				'<?php print("../".$annonce['image_3']);?>',
				'<?php print("../".$annonce['image_4']);?>'
			];
			function change_image(x) {
				if(x === 1) {
					if(index + 1 < 4 && !compare_string(images[index+1], "../"))
						++index;
					document.getElementById('curent-image').src = images[index];
					console.log(images[index]);
				} else {
					if(index - 1 >= 0)
						--index;
					document.getElementById('curent-image').src = images[index];
					console.log(images[index]);
				}
			}
		</script>
		<div class="infos">
			<div class="txt">
				<div>
					<h2>Proposé par : <?php print($trqannonce['prenom']." ".$trqannonce['nom']);?></h2>
					<img src="../images/Site-Web/calendar.png" width="20px" height="20px">
					&nbsp;<?php print(explode(" ", $annonce['date_pub'])[0])?><br>
					<img src="../images/Site-Web/location.png" width="20px" height="20px">
					&nbsp;<?php print(strtoupper($annonce['ville']));?>
				</div>
				<hr>
				<div>
					<h2>Catégorie :</h2>
					<?php print($categorie);?>
				</div>
				<hr>
				<div>
					<h2>Besoin :</h2>
					<?php print($annonce['besoin']);?>
				</div>
				<hr>
				<div>
					<h2>Déscription :</h2>
					<?php print($annonce['description']);?>
				</div>
			</div>
			<?php
			if(strcmp($code_trq, $annonce['code_trq']) != 0) {
				?>
				<div class="send-message">
					<h2><a href="messagerie.php?troqueur=<?php print($code_trq); ?>&annonceur=<?php print($annonce['code_trq']); ?>&annonce=<?php print($code_anc); ?>">Contacter l'annonceur</a></h2>
				</div>
				<?php
			}
			?>
		</div>
		<div class="">

		</div>
	</section>
	<!-- end main-section -->

	<!-- start script comment -->
	<?php
	if(isset($_POST['submit-comment']))
	{
		mysqli_query($code, "INSERT INTO commentaire(code_trq, code_anc, content) VALUES($code_trq, $code_anc, \"".$_POST['contentcomment']."\")");
		print("<script> window.location.replace('annonce.php?annonce=$code_anc'); </script>");
	}
	?>
	<!-- end script comment -->

	<!-- start comment-section -->
	<section class="comment-section">
		<h1 class="title-section">Commentaires</h1>
		<div class="commentaires">
			<form class="form" id="form" method="post" onsubmit="return validated_comment()">
				<textarea name="contentcomment" class="contentcomment" id="contentcomment" rows="8" cols="80" placeholder="Ajouter un commentaire"></textarea>
				<button type="submit" name="submit-comment" class="buttoncomment">Commenter</button>
			</form>
			<?php
			$resultcomment = mysqli_query($code, "SELECT * FROM commentaire WHERE code_anc = $code_anc");
			while($cmnt = mysqli_fetch_assoc($resultcomment))
			{
				$resultprofile = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = ".$cmnt['code_trq']);
				$trq = mysqli_fetch_assoc($resultprofile);
				$timecmnt = explode(" ",$cmnt['date_pub'])[1];
				$timecmnt = explode(":", $timecmnt);
				$timecmnt = $timecmnt[0].":".$timecmnt[1];
				$datecmnt = explode(" ",$cmnt['date_pub'])[0];
				?>
				<div class="profilecomment">
					<img src="<?php print("../".$trq['photo']);?>" width="40px" height="40px">
					<div class="commentaire">
						<div class="infos-cmnt"><p><b><?php print("<b>".$trq['prenom']." ".$trq['nom']." . $timecmnt </b>");?></b></p><p><b><?php print($datecmnt);?></b></p></div>
						<p class="contentcmnt"><?php print($cmnt['content']);?></p>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<script src="../js/annonce.js"></script>
	</section>
	<!-- end comment-section -->

	<!-- footer-->
	<?php include_once("footer.php"); ?>

</body>
</html>
