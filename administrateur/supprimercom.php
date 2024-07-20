<?php

if(isset($_GET['commentaire'])){
    include "conn.php";
	$id = $_GET['commentaire'];

	$sql = "DELETE FROM commentaire WHERE code_cnt = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
   	    header("Location:Commentaire.php?success=Commentaire bien supprimé");
    } else {
        header("Location:Commentaire.php?error=Commentaire pas bien supprimé");
    }

}else {
	header("Location:Commentaire.php");
}
