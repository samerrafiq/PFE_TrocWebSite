<?php include 'modifier.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Modifier un admin </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleForm.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
	<?php include 'navbarADM.php'?>
<section id="content">
  <div class="container">
    <div class="title">Modifier un administrateur  <a href="GAdmins.php"><button type="button">X</button></a></div>
    <?php if (isset($_GET['error'])) { ?>
		    <div class="alert alert-danger" style="margin-top: 5px;;width:600px;">
			  <?php echo $_GET['error']; ?>
			</div>
	<?php } ?>
    <div class="content">
      <form action="modifier.php" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" value="<?=$row['nom'] ?>" placeholder="Entrer le nom" name="nom" required>
          </div>
          <div class="input-box">
            <span class="details">prenom</span>
            <input type="text" value="<?=$row['prenom'] ?>" placeholder="Entrer  le prénom" name="prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" value="<?=$row['email'] ?>"  placeholder="Entrer le email"  name="email"required>
          </div>
          <div class="input-box">
            <span class="details">telephone</span>
            <input type="text" value="<?=$row['telephone'] ?>" placeholder="Entrer le email" name="telephone" pattern="[0-0]{1}[5-7]{1}[0-9]{8}" title="le numero ne respect pas le format" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="Password" value="<?=$row['password'] ?>" placeholder="Enter le mot de passe" name="password" required>
          </div>
	       <input type="text"
		          name="code_adm"
		          value="<?=$row['code_adm']?>"
		          hidden >
          <div class="input-box">
            <span class="details">Confirmer le mot de passe</span>
            <input type="password" placeholder="Confirmer le mot de passe" name="cpasswd" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="modifier" value="Engistrer">
        </div>
      </form>
    </div>
  </div>
</section>
</body>
</html>
