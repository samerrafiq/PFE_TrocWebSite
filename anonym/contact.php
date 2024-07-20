<?php

include_once('../connexion.php');
//
session_start();
if(isset($_SESSION['code_trq'])) {
	header("location: ../troqueur/contact.php");
	exit();
}
if(isset($_SESSION['code_adm'])) {
	header('location: ../administrateur/index.php');
	exit();
}
session_destroy();
//

?>

<!doctype html>
<html lang="fr">
<head>
	<title>Troc Maroc | Contact</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/contact.css">
	<script src="../js/functions.js"></script>
	<script src="../js/contact.js"></script>
</head>
<body>

    <!-- start script -->
	<?php
    if(isset($_GET['envoyer']))
    {
		$email = $_GET['email'];
        $sujet = $_GET['sujet'];
        $messg = $_GET['messg'];
        $result = mysqli_query($code, "INSERT INTO contact(email, sujet, message) VALUES('$email', '$sujet', '$messg')");
        if($result) {
            print("<style> #succes {display: block;} </style>");
        }
        unset($_GET['envoyer']);
    }
	?>
    <!-- end script -->

    <!-- start header -->
	<?php include_once("header.php"); ?>
    <!-- end header -->

    <!-- start section-contact -->
    <section class="section-contact">
		<div class="content-contact">
			<form method="get" onsubmit="return validated_form()">
                <h1 class="title-contact">Contactez-nous</h1>
				<input type="text" name="email" placeholder="E-mail" class="input-contact" id="email">
                <div class="error"><h4 id="email-error">E-mail invalide !</h4></div>
                <input type="text" name="sujet" placeholder="Sujet" class="input-contact" id="sujet">
                <div class="error"><h4 id="sujet-error">Sujet obligatoire !</h4></div>
				<textarea name="messg" placeholder="Message" class="input-contact" id="messg"></textarea>
                <div class="error"><h4 id="messg-error">Message obligatoire !</h4></div>
				<div class="under">
					<span>
						<input type="submit" name="envoyer" value="Envoyer" class="button">
						<input type="button" name="renitialiser" value="Rénitialiser" class="button" onclick="ren()">
					</span>
					<img id="succes" src="../images/Site-Web/check.png" width="35px" height="35px">
				</div>
			</form>
		</div>
	</section>
    <!-- end section-contact -->

</body>
</html>
