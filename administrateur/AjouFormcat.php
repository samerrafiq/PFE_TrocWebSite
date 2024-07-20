<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Ajouter une categorie </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleForm.css">
  </head>
<body>
		<?php include "navbarCAT.php"; ?>
	<section id="content">
  <div class="container">
    <div class="title">Ajouter une categorie  <a href="Categorie.php"><button type="button">X</button></a></div>
    <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger" style="margin-top: 5px; width:600px;">
      <?php echo $_GET['error']; ?>
			</div>
	<?php } ?>
    <div class="content">
      <form action="ajouterCAT.php" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Titre</span>
            <input type="text" placeholder="Titre de catégorie" name="titre" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="ajoutercat" value="Engistrer">
        </div>
      </form>
    </div>
  </div>
</section>
</body>
</html>