<?php

include "conn.php";

$sql = "SELECT * FROM annonce ORDER BY code_anc DESC";
$result = mysqli_query($conn, $sql);
