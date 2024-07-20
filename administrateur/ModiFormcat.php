<?php include 'modifiercat.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Modifier une categorie </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleForm.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
	 <?php include "navbarCAT.php"; ?>
<section id="content">
  <div class="container">
    <div class="title">Modifier une categorie <a href="Categorie.php"><button type="button">X</button></a></div>
    <?php if (isset($_GET['error'])) { ?>
		    <div class="alert alert-danger" style="margin-top: 5px;;width:600px;">
			  <?php echo $_GET['error']; ?>
			</div>
	<?php } ?>
    <div class="content">
      <form action="modifiercat.php" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nouveau titre</span>
            <input type="text" value="<?=$row['titre'] ?>" placeholder="Entrer le nouveau titre" name="titre" required>
          </div>
	       <input type="text"
		          name="code_cat"
		          value="<?=$row['code_cat']?>"
		          hidden >
        </div>
        <div class="button">
          <input type="submit" name="modifiercat" value="Engistrer">
        </div>
      </form>
    </div>
  </div>
</section>
</body>
</html>
