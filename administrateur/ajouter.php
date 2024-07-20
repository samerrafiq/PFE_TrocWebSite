<?php
if (isset($_POST['ajouter'])) {
	include "conn.php";
	$nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $tel = $_POST['Tel'];
  $passwd = $_POST['passwd'];
	$cpasswd =$_POST['cpasswd'];
	$duplicate = mysqli_query($conn,"SELECT * FROM administrateur WHERE email = '$email'") ;
	if(mysqli_num_rows($duplicate) <= 0) {
    if($passwd == $cpasswd && strlen($passwd) >= 6) {
      $passwd = password_hash($passwd, PASSWORD_DEFAULT);
      $sql = "INSERT INTO administrateur (nom, prenom, email, password, telephone) VALUES('$nom', '$prenom', '$email', '$passwd', '$tel')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        header("Location: GAdmins.php?success=Administrateur est bien engistrer ");
      } else {
        header("Location: GAdmins.php?error=Administrateur n'est pas bien engistrer");
      }
    } else {
      header("Location: AjouForm.php?error=Votre mot de passe est faible ou n'est pas confirmer correctement");
    }
  } else{
    header("Location: AjouForm.php?error=E-mail déja utilisé");
  }
}
?>
