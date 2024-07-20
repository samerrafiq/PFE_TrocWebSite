<?php

include "conn.php";

$sql = "SELECT count(*) FROM commentaire";
$nbrcom = mysqli_query($conn, $sql);
$sql = "SELECT count(*) FROM administrateur";
$nbradm = mysqli_query($conn, $sql);
$sql = "SELECT count(*) FROM contact";
$nbrmsg = mysqli_query($conn, $sql);
$sql = "SELECT count(*) FROM troqueur";
$nbrtrq = mysqli_query($conn, $sql);
$sql = "SELECT count(*) FROM annonce";
$nbrann = mysqli_query($conn, $sql);
$sql = "SELECT count(*) FROM bloquer";
$nbrblq = mysqli_query($conn, $sql);
$sql = "SELECT count(*) FROM categorie";
$nbrctr = mysqli_query($conn, $sql);

?>
