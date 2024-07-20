<?php

include_once("../connexion.php");
//
session_start();
if(isset($_SESSION['code_trq'])) {
	header("location: ../troqueur/index.php");
    exit();
}
if(isset($_SESSION['code_adm'])) {
	header('location: ../administrateur/index.php');
    exit();
}
session_destroy();
//

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/functions.js"></script>
    <script src="../js/connexion.js"></script>
</head>
<body id="body">

    <!-- start header -->
    <header>
        <h1><a class="logo" href="../index.php">Troc Maroc</a></h1>
        <nav>
			<ul>
				<li class="contact"><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
    </header>
    <!-- end header -->

    <!-- start script -->
    <?php
    $nom = "";
    $prenom = "";
    $email_reg = "";
    $password_reg = "";
    if(isset($_POST['button-connecte'])) {
        $email = $_POST['mail-login'];
        $password = $_POST['pass-login'];
        $result_adm = mysqli_query($code, "SELECT * FROM administrateur WHERE email = '$email'");
        $result_trq = mysqli_query($code, "SELECT * FROM troqueur WHERE email = '$email'");
        if(mysqli_num_rows($result_adm) > 0) {
            $ligne = mysqli_fetch_assoc($result_adm);
            if(password_verify($password, $ligne['password'])) {
                session_start();
                $_SESSION['code_adm'] = $ligne['code_adm'];
                header('location: ../administrateur/index.php');
                exit();
            }
        } else if(mysqli_num_rows($result_trq) > 0) {
            $ligne = mysqli_fetch_assoc($result_trq);
            if(password_verify($password, $ligne['password'])) {
                session_start();
                $_SESSION['code_trq'] = $ligne['code_trq'];
                header('location: ../troqueur/index.php');
                exit();
            }
        } else {
            print("<style>#login-error {display: block;}</style>");
        }
    } else if(isset($_POST['button-register'])) {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $email_reg = trim($_POST['mail']);
        $password_reg = trim($_POST['pass']);
        $result_blq = mysqli_query($code, "SELECT * FROM bloquer WHERE email = '$email_reg'");
        if(mysqli_num_rows($result_blq) > 0)
        {
            print("<style>#register-error {display: block;}</style>");
        }
        else {
            $result_adm = mysqli_query($code, "SELECT * FROM administrateur WHERE email = '$email_reg'");
            $result_trq = mysqli_query($code, "SELECT * FROM troqueur WHERE email = '$email_reg'");
            if(mysqli_num_rows($result_adm) == 0 and mysqli_num_rows($result_trq) == 0) {
                $password_reg = password_hash($password_reg, PASSWORD_DEFAULT);
                mysqli_query($code, "INSERT INTO troqueur(nom, prenom, email, password) VALUES('$nom', '$prenom', '$email_reg', '$password_reg')");
                session_start();
                $result = mysqli_query($code, "SELECT * FROM troqueur WHERE email = '$email_reg'");
                $_SESSION['code_trq'] = mysqli_fetch_assoc($result)['code_trq'];
                header('location: ../troqueur/index.php');
                exit();
            } else {
                print("<style>
                #register-error {
                    display: block;
                }
                #form-register {
                    display: flex;
                }
                #form-connecte {
                    display: none;
                }
                button[name='registre'] {
                    color: white;
                    background-color: #232a34;
                }
                button[name='connecte'] {
                    background-color: white;
                    color: black;
                }
                </style>");
            }
        }
    }
    ?>
    <!-- end script -->

    <!-- start section-->
    <section class="main-section">
        <div class="connexion-card">
            <div class="swap-connexion">
                <button id="connecte" name="connecte" onClick="swap_connexion(1)">Se connecter</button>
                <button id="register" name="registre" onClick="swap_connexion(2)">S'inscrire</button>
            </div>
            <div class="form-connecte" id="form-connecte">
                <form method="post" id="f-connecte" onsubmit="return validated_login()">
                    <div class="error"><h4 id="login-error">E-mail ou mot de passe invalide !</h4></div>
                    <div class="input-2">
                        <input type="text" name="mail-login" id="mail-login" placeholder="E-mail">
                        <div class="error"><h4 id="mail-login-error">E-mail invalide !</h4></div>
                    </div>
                    <div class="input-2">
                        <input type="password" name="pass-login" id="password-login" placeholder="Mot de passe">
                        <div class="error"><h4 id="password-login-error">Mot de passe invalide !</h4></div>
                    </div>
                    <div class="input-2">
                        <button type="submit" name="button-connecte">Se connecter</button>
                    </div>
                </form>
            </div>
            <div class="form-register" id="form-register">
                <form method="post" id="f-register" onsubmit="return validated_register()">
                    <div class="error"><h4 id="register-error">Impossible d'utilisé cette adresse e-mail !</h4></div>
                    <div class="input-2">
                        <input type="text" name="nom" id="nom-register" placeholder="Nom" value="<?php print($nom); ?>">
                        <div class="error"><h4 id="nom-register-error">Nom obligatoire !</h4></div>
                    </div>
                    <div class="input-2">
                        <input type="text" name="prenom" id="prenom-register" placeholder="Prénom" value="<?php print($prenom); ?>">
                        <div class="error"><h4 id="prenom-register-error">Prénom obligatoire !</h4></div>
                    </div>
                    <div class="input-2">
                        <input type="text" name="mail" id="mail-register" placeholder="E-mail" value="<?php print($email_reg); ?>">
                        <div class="error"><h4 id="mail-register-error">E-mail invalide !</h4></div>
                    </div>
                    <div class="input-2">
                        <input type="password" name="pass" id="password-register" placeholder="Mot de passe" value="<?php print($password_reg); ?>">
                        <div class="error"><h4 id="password-register-error">Mot de passe invalide !</h4></div>
                    </div>
                    <div class="input-2">
                        <input type="password" name="passc" id="passwordc-register" placeholder="Confirmer le mot de passe" value="<?php print($password_reg); ?>">
                        <div class="error"><h4 id="passwordc-register-error">Mot de passe invalide !</h4></div>
                    </div>
                    <input type="checkbox" name="accepte" id="accepte" required>&nbsp;<a href="#">J'accepte les conditions</a>
                    <div class="input-2">
                        <button type="submit" name="button-register">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end section-->

</body>
</html>
