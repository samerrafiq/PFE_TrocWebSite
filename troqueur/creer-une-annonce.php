<?php

include_once("../connexion.php");
session_start();
if(!isset($_SESSION['code_trq'])) {
    header("location: ../anonym/index.php");
}
$result = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = ".$_SESSION['code_trq']."");
$informations = mysqli_fetch_assoc($result);
$code_trq = $informations['code_trq'];

?>
<!doctype html>
<html lang="fr">
<head>
	<title>Créer une annonce</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/troqueur.css">
    <link rel="stylesheet" href="../css/creer-une-annonce.css">
</head>
<body>

    <!-- start header -->
	<?php include_once("header.php");  ?>
    <!-- end header -->

    <!-- start script -->
    <?php
    if(isset($_POST['submit']))
    {
        $titre = $_POST['titre'];
        $besoin = $_POST['besoin'];
        $description = $_POST['description'];
        $ville = $_POST['ville'];
        $categorie = $_POST['categorie'];
        mysqli_query($code, "INSERT INTO annonce(titre, besoin, ville, description, code_cat, code_trq) VALUES(\"$titre\", \"$besoin\", \"$ville\", \"$description\", $categorie, $code_trq)");
        $result = mysqli_query($code, "SELECT code_anc FROM annonce ORDER BY date_pub DESC");
        $result = mysqli_fetch_assoc($result)['code_anc'];
        $i = 1;
        foreach($_FILES as $image) {
            if($image['error'] !== 0) {
                ++$i;
                continue;
            }
            $extension = explode(".", $image['name']);
            $extension = end($extension);
            $dest = "images/Annonces/".uniqid("", true).".".$extension;
            move_uploaded_file($image['tmp_name'], "../".$dest);
            mysqli_query($code, "UPDATE annonce SET image_$i = '$dest' WHERE code_anc = $result");
            ++$i;
        }
        print("<script>window.location.replace('annonce.php?annonce=$result')</script>");
        /*header("location: annonce.php?annonce=$result");*/
    }
    ?>
    <!-- end script -->

    <!-- start section -->
    <section class="main-section">
        <div class="container">
            <form method="post" enctype="multipart/form-data" onsubmit="return validated_annonce()">
                <h1 class="title-section">Créer votre annonce</h1>
                <div class="inputs">
                    <label for="titre">Donnez un titre à votre annonce</label><br>
                    <input type="text" id="titre" name="titre">
                    <div class="error"><h4 id="titre-error">Titre obligatoire</h4></div>
                </div>
                <div class="inputs">
                    <label for="categorie">Séléctionnez une catégorie</label><br>
                    <select name="categorie" id="categorie">
                        <option value="">Catégories</option>
                        <?php
                        $resultcat = mysqli_query($code, "SELECT * FROM categorie");
                        while($ligne = mysqli_fetch_assoc($resultcat))
                        {
                            ?>
                            <option value="<?php echo $ligne['code_cat'];?>"><?php echo $ligne['titre'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <div class="error"><h4 id="categorie-error">Catégorie obligatoire</h4></div>
                </div>
                <div class="inputs">
                    <label for="titre">Votre besoin</label><br>
                    <input type="text" id="besoin" name="besoin">
                    <div class="error"><h4 id="besoin-error">Champ obligatoire</h4></div>
                </div>
                <div class="inputs">
                    <label for="description">Une description</label><br>
                    <textarea name="description" id="description" rows="8" maxlength=""></textarea>
                    <div class="error"><h4 id="description-error">Description obligatoire</h4></div>
                </div>
                <div class="inputs">
                    <label for="ville">Saisissez votre ville</label><br>
                    <input type="text" name="ville" id="ville">
                    <div class="error"><h4 id="ville-error">Ville obligatoire</h4></div>
                </div>
                <div class="inputs">
                    <label>Ajoutez des photos</label><br>
                    <div class="select-image">
                        <!--Image 1-->
                        <div class="image-annonce image_1" id="containter_1">
                            <label for="image_1"><img src="../images/Site-Web/add.png" width="160px" height="160px" id="img_1"></label>
                            <input type="file" id="image_1" name="image_1" accept=".jpg, .jpeg, .png" onchange="change_image(1)">
                        </div>
                        <!--Image 2-->
                        <div class="image-annonce image_2" id="containter_2">
                            <label for="image_2"><img src="../images/Site-Web/add.png" width="160px" height="160px" id="img_2"></label>
                            <input type="file" id="image_2" name="image_2" accept=".jpg, .jpeg, .png" onchange="change_image(2)">
                        </div>
                        <!--Image 3-->
                        <div class="image-annonce image_3" id="containter_3">
                            <label for="image_3"><img src="../images/Site-Web/add.png" width="160px" height="160px" id="img_3"></label>
                            <input type="file" id="image_3" name="image_3" accept=".jpg, .jpeg, .png" onchange="change_image(3)">
                        </div>
                        <!--Image 4-->
                        <div class="image-annonce image_4" id="containter_4">
                            <label for="image_4"><img src="../images/Site-Web/add.png" width="160px" height="160px" id="img_4" id="img_4"></label>
                            <input type="file" id="image_4" name="image_4" accept=".jpg, .jpeg, .png" onchange="change_image(4)">
                        </div>
                    </div>
                    <div class="error"><h4 id="image-error">Image obligatoire</h4></div>
                    <div class="error"><h4 id="image-error-php">Problem au niveau de l'image</h4></div>
                </div>
                <div class="buttons">
                    <button name="submit" type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </section>
    <!-- end section -->
    <script src="../js/cree-une-annonce.js"></script>

</body>
</html>
