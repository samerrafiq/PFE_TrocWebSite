<?php

if(isset($_GET['code_cat'])){
   include "conn.php";
	$id = $_GET['code_cat'];
	$sql = "DELETE FROM categorie WHERE code_cat=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      header("Location:Categorie.php?success=Catégorie bien supprimée");
   } else {
      header("Location: Categorie.php?error=Catégorie bien supprimée");
   }
} else {
	header("Location:Categorie.php");
}
