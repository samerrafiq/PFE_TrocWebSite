<?php

include "conn.php";

$sql = "SELECT * FROM bloquer ORDER BY code_blq DESC";
$result = mysqli_query($conn, $sql);

?>
