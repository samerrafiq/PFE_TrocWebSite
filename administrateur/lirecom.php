<?php

include "conn.php";

$sql = "SELECT * FROM commentaire ORDER BY code_cnt DESC";
$result = mysqli_query($conn, $sql);
