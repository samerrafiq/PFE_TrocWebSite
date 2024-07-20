<?php
if (isset($_POST['ajoutercat'])) {
	include "conn.php";

	$titre= $_POST['titre'];
	$duplicate = mysqli_query($conn,"select * from categorie where titre='$titre'") ;
	if(mysqli_num_rows($duplicate) <= 0) {
      $sql = "INSERT INTO categorie (titre) VALUES('$titre')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
          header("Location: Categorie.php?success=Catégorie est bien engistrée");
       }else {
          header("Location: Categorie.php?error=Catégorie n'est pas bien engistrée");
      }
  } else{
    header("Location: AjouFormCat.php?error=Ritre deja utilisé");
  }
}
