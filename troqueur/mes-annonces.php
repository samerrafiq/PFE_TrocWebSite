<?php

include_once("../connexion.php");
session_start();
if(!isset($_SESSION['code_trq']))
    header("location: ../anonym/index.php");
$result = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = '".$_SESSION['code_trq']."'");
$informations = mysqli_fetch_assoc($result);
$code_trq = $informations['code_trq'];

?>

<!doctype html>
<html lang="fr">
<head>
	<title>Troc.ma</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/troqueur.css">
	<script src="../js/script.js"></script>
</head>
<body>

    <!-- start header -->
	<?php include_once("header.php");  ?>
    <!-- end header -->

    <!-- start main-section -->
    <section class="main-section">
        <div class="rechercher-bar">
            <form method="POST">
                <input type="text" placeholder="Rechercher des objets : Bureau, Livre, Vélo, ..." class="input" name="titre">
                <select name="categorie" id="categorie">
                    <option value="" selected>Catégories</option>
                    <?php
                    $resultcat = mysqli_query($code, "SELECT * FROM categorie");
                    while($ligne = mysqli_fetch_assoc($resultcat))
                    {
                    ?>
                        <option value="<?php print($ligne['code_cat']);?>"><?php print($ligne['titre']);?></option>
                    <?php
                    }
                    ?>
                </select>
                <button type="submit" class="input" name="submit"><img src="../images/Site-Web/search.png" alt="Chercher"></button>
            </form>
        </div>
        <hr>

        <!-- start script -->
        <?php
        $categorie = "";
        $keywords = "";
        if(isset($_POST['categorie']))
            $categorie = trim($_POST['categorie']);
        if(isset($_POST['titre']))
            $keywords = trim($_POST['titre']);
        $result = mysqli_query($code, "SELECT * FROM annonce WHERE titre LIKE '%$keywords%' AND code_cat LIKE '%$categorie%' AND code_trq = $code_trq");
        $result_total = mysqli_num_rows($result);
        $result_per_page = 100; // nombre des annonces par page
        $pages_number = ceil($result_total / $result_per_page); // nombre des pages
        $page = !isset($_GET['page']) ? 1 : $_GET['page'];
        $starting_limit_number = ($page - 1) * $result_per_page; // nombre de début des annonces
        $result = mysqli_query($code, "SELECT code_anc, titre, image_1, date_pub FROM annonce WHERE titre LIKE '%$keywords%' AND code_cat LIKE '%$categorie%' AND code_anc AND code_trq = $code_trq LIMIT $starting_limit_number, $result_per_page");
        for($i = 1; $i <= 8; ++$i)
        {
        ?>
            <div class="cards">
        <?php
            $index = 1;
            while($annonce = mysqli_fetch_assoc($result) and $index <= 5)
            {
                $index++;
                $image = $annonce['image_1'];
                $title = $annonce['titre'];
                $date = $annonce['date_pub'];
                $code_anc = $annonce['code_anc'];
        ?>
                <div class="card">
                    <a class="annonce-card" href="annonce.php?annonce=<?php print($code_anc);?>">
                    <img src="<?php echo "../$image";?>" class="image-annonce">
                    <h2><?php echo $title;?></h2>
                    </a>
                    <p><?php echo explode(" ", $date)[0];?></p>
                </div>
        <?php
            }
        ?>
            </div>
        <?php
        }
        ?>
        <!--end script-->

        <div class="page-index">
            <!--start script-->
            <?php
            if($result_per_page > 100)
            {
                for($page = 1; $page <= $pages_number; ++$page)
                {
            ?>
                    <a href="index.php?page=<?php echo $page;?>"><Button class="<?php echo $page;?>"><?php echo $page;?></Button></a>
            <?php
                }
            }
            ?>
            <!-- end script -->
        </div>
	</section>
    <!-- end main-section -->

    <!-- footer -->
    <?php include_once("footer.php"); ?>

</body>
</html>
