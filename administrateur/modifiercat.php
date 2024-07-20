<?php
if (isset($_GET['code_cat'])) {
	include "conn.php";

	$code_cat= $_GET['code_cat'];

	$sql = "SELECT * FROM categorie WHERE code_cat=$code_cat";
   	 $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: Categorie.php?error=Catégorie introuvable");
    }
}else if(isset($_POST['modifiercat'])){
    include "conn.php";
	$titre= $_POST['titre'];
	$code_cat = $_POST['code_cat'];
      $duplicate = mysqli_query($conn,"select * from categorie where titre='$titre'") ;
    if(mysqli_num_rows($duplicate) <1) {
        $sql = "UPDATE categorie SET titre='$titre' WHERE code_cat=$code_cat";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:Categorie.php?success=La catégorie est bien modifiée");
        }else {
            header("Location:Categorie.php?error=La catégorie n'est pas bien modifiée");
        }
    } else {
        header("Location:Categorie.php?error=Le titre : ".$titre." n'est pas modifier car il est deja utilisé");
    }
} else {
	header("Location: Categorie.php");
}
