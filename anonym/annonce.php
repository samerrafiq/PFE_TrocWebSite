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
			<div class="send-message">
				<h2><a href="connexion.php">Contacter l'annonceur</a></h2>
			</div>
		</div>
		<div class="">

		</div>
	</section>
	<!-- end main-section -->
	
	<?php
	$resultcomment = mysqli_query($code, "SELECT * FROM commentaire WHERE code_anc = $code_anc");
	if(mysqli_num_rows($resultcomment)) {
	?>
	<!-- start comment-section -->
	<section class="comment-section">
		<h1 class="title-section">Commentaires</h1>
		<div class="commentaires">
			<?php
			
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
	<?php
	}
	?>
	<!-- end comment-section -->

	<!-- footer-->
	<?php include_once("footer.php"); ?>


</body>
</html>
