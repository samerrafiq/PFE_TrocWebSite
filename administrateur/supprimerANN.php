<?php

if(isset($_GET['code_anc'])){
    include "conn.php";
    $id = $_GET['code_anc'];
    $result = mysqli_query($conn, "DELETE FROM annonce WHERE code_anc=$id");
    if($result) {
        header("Location:Annonces.php?success=Annonce bien supprimée");
    } else {
        header("Location:Annonces.php?error=Annonce pas bien supprimée");
    }
} else {
    header("Location:Commentaire.php");
}
