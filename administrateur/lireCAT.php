<?php

include "conn.php";

$sql = "SELECT * FROM categorie ORDER BY code_cat DESC";
$result = mysqli_query($conn, $sql);
