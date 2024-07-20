<?php

include "conn.php";

$sql = "SELECT * FROM troqueur ORDER BY code_trq DESC";
$result = mysqli_query($conn, $sql);
