<?php

include "conn.php";

$sql = "SELECT * FROM contact ORDER BY code_ctn DESC";
$result = mysqli_query($conn, $sql);
