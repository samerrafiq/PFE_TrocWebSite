<?php

include_once("../connexion.php");
mysqli_query($code, "DELETE FROM annonce WHERE code_anc = ".$_GET['annonce']);
print("<script>window.location.replace('index.php')</script>");

?>
