<?php
include_once("../connexion.php");
session_start();
if(!isset($_SESSION['code_trq'])) {
    header("location: ../index.php");
    exit();
}
$result = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = ".$_SESSION['code_trq']);
$informations = mysqli_fetch_assoc($result);
$code_trq = $informations['code_trq'];
$img = $informations['photo'];

?>

<!doctype html>
<html lang="fr">
<head>
	<title>Mon compte</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<!--<link rel="stylesheet" href="../css/troqueur.css">-->
    <link rel="stylesheet" href="../css/compte.css">
    <script src="../js/functions.js"></script>
	<script src="../js/compte.js"></script>
</head>
<body>

    <!-- start script -->
    <?php
    if(isset($_POST['submit']))
    {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $email = trim($_POST['email']);
        $tele = trim($_POST['tele']);
        $password = trim($_POST['password']);
        $passwordc = trim($_POST['passwordc']);
        $test = false;

        // Modification du mot de passe
        $r = mysqli_query($code, "SELECT nom, prenom FROM troqueur WHERE code_trq = $code_trq");
        $r = mysqli_fetch_assoc($r);
        if(strcmp($r['nom'], $nom) != 0 or strcmp($r['prenom'], $prenom) != 0) {
            mysqli_query($code, "UPDATE troqueur SET nom = '$nom', prenom = '$prenom' WHERE code_trq = $code_trq");
            print("<style> #succes {display: flex;} </style>");
            $test = true;
        }

        // Modification d'Email
        $r = mysqli_query($code, "SELECT email FROM troqueur WHERE email = '$email'");
        if(mysqli_num_rows($r) == 0) {
            mysqli_query($code, "UPDATE troqueur SET email = '$email' WHERE code_trq = '$code_trq'");
            print("<style> #succes {display: flex;} </style>");
            $test = true;
        }

        // Modification du telephone
        if(strcmp($informations['telephone'], $tele) != 0 or strlen($tele) == 0) {
            $r = mysqli_query($code, "SELECT telephone FROM troqueur WHERE telephone = '$tele'");
            if(mysqli_num_rows($r) == 0) {
                mysqli_query($code, "UPDATE troqueur SET telephone = '$tele' WHERE code_trq = '$code_trq'");
                print("<style> #succes {display: flex;} </style>");
                $test = true;
            }
        }

        // Modification du mot de passe
        if(strlen($password) >= 6 and strcmp($password, $passwordc) == 0) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($code, "UPDATE troqueur SET password = '$password' WHERE code_trq = '$code_trq'");
            print("<style> #succes {display: flex;} </style>");
            $test = true;
        }

        $image = $_FILES['image'];
        if($image['error'] == 0) {
            $extension = explode(".", $image['name']);
            $extension = end($extension);
            $dest = "images/Profiles/".uniqid("", true).".".$extension;
            $img = $dest;
            move_uploaded_file($image['tmp_name'], "../".$dest);
            mysqli_query($code, "UPDATE troqueur SET photo = '$dest' WHERE code_trq = $code_trq");
            print("<style> #succes {display: flex;} </style>");
            $test = true;
        } else if(strlen($image['name']) > 0) {
            print("<style> #img {border: 2px solid red;} </style>");
        }
        if($test) {
            $result = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = $code_trq");
            $informations = mysqli_fetch_assoc($result);
            print("<style> window.location.replace('compte.php'); </style>");
        }
    }
    ?>
    <!-- end script -->

    <!-- start header -->
	<?php include_once("header.php");  ?>
    <!-- end header -->

    <!-- start section -->
    <section class="main-section">
        <div class="container">
            <form method="POST" id="f1" onsubmit="return validated_compte()" enctype="multipart/form-data">
                <!--<h1 class="title-section">Compte</h1>-->
                <div class="image-form">
                    <label for="image"><img src="../<?php print($img); ?>" width="160px" height="160px" id="img"></label>
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" onchange="change_image()">
                    <div class="succes"><h4 id="succes">Modifié avec succès</h4></div>
                </div>
                <div class="inputs">
                    <label for = "nom">Nom</label> <br>
                    <input type = "text" name = "nom" id = "nom" maxlength = "30" value = "<?php echo $informations['nom'];?>">
                    <div class="error"><h4 id="nom-error">Nom obligatoire !</h4></div>
                </div>
                <div class="inputs">
                    <label for = "prenom">Prénom</label> <br>
                    <input type = "text" name = "prenom" id = "prenom" maxlength = "30" value = "<?php echo $informations['prenom'];?>">
                    <div class="error"><h4 id="prenom-error">Prénom obligatoire !</h4></div>
                </div>
                <div class="inputs">
                    <label for="email">E-mail</label> <br>
                    <input type = "text" name = "email" id = "email" maxlength = "250" value = "<?php echo $informations['email'];?>">
                    <div class="error"><h4 id="email-error">E-mail obligatoire !</h4></div>
                </div>
                <div class="inputs">
                    <label for = "tele">Téléphone</label> <br>
                    <input type = "text" name = "tele" id = "tele" maxlength = "20" value = "<?php echo $informations['telephone'];?>">
                    <div class="error"><h4 id="telephone-error">Téléphone invalide !</h4></div>
                </div>
                <div class="inputs">
                    <label for="password">Mot de passe</label> <br>
                    <input type = "password" name = "password" id = "password" maxlength = "250">
                    <div class="error"><h4 id="password-error">Mot de passe invalide !</h4></div>
                </div>
                <div class="inputs">
                    <label for = "confirm-password">Confirmer le mot de passe</label> <br>
                    <input type = "password" name = "passwordc" id = "passwordc">
                    <div class="error"><h4 id="password-error">Mot de passe invalide !</h4></div>
                </div>
                <button name="submit" type="submit">Enregistrer</button>
            </form>
        </div>
    </section>
    <!-- end section -->

</body>
</html>
