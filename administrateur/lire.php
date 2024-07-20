<?php

include "conn.php";
$result = mysqli_query($conn, "SELECT * FROM administrateur ORDER BY code_adm DESC");

?>
