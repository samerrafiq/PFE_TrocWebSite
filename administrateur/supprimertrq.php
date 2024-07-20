<?php
include "conn.php";
if(isset($_GET['code_trq'])) {
    $id = $_GET['code_trq'];
    $email = mysqli_query($conn, "SELECT email FROM troqueur WHERE code_trq = $id");
    $email = mysqli_fetch_assoc($email)['email'];
	$sql ="INSERT INTO bloquer(email) VALUES('$email')";
	$result = mysqli_query($conn, $sql);
	$sql = "DELETE FROM troqueur WHERE code_trq = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:Troqueur.php?success=Troqueur bien supprimé");
    } else {
        header("Location: Troqueur.php?error=Troqueur n'est pas bien supprimé");
    }
} else {
	header("Location:Troqueur.php?error=Troqueur n'est pas bien supprimé");
}
