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
if(isset($_GET['annonceur']) and isset($_GET['annonce']) and isset($_GET['troqueur'])) {
    $code_anc = $_GET['annonce'];
    $code_annonceur = $_GET['annonceur'];
    $code_tr = $_GET['troqueur'];
    $r = mysqli_query($code, "SELECT code_cnv FROM conversation WHERE code_anc = $code_anc AND code_trq = $code_tr AND code_annonceur = $code_annonceur");
    if(mysqli_num_rows($r) > 0) {
        $r = mysqli_fetch_assoc($r);
        print("<script> window.location.replace('messagerie.php?conversation=".$r['code_cnv']."'); </script>");
    }
    mysqli_query($code, "INSERT INTO conversation(code_trq, code_annonceur, code_anc) VALUES($code_trq, ".$_GET['annonceur'].", ".$_GET['annonce'].")");
    $conversation = mysqli_query($code, "SELECT code_cnv FROM conversation WHERE code_trq = ".$_GET['troqueur']." AND code_annonceur = ".$_GET['annonceur']." AND code_anc = ".$_GET['annonce']);
    $conversation = mysqli_fetch_assoc($conversation);
    print("<script> window.location.replace('messagerie.php?conversation=".$conversation['code_cnv']."'); </script>");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messagerie</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/messagerie.css">
    <script src="../js/messagerie.js"></script>
</head>
<body>
    <!-- start header -->
    <?php include_once("header.php"); ?>
    <!-- end header -->

    <!-- script d'envoie de message -->
    <?php
    if(isset($_POST['envoyer-message'])) {
        mysqli_query($code, "INSERT INTO message(code_trq, code_cnv, content) VALUES($code_trq, ".$_GET['conversation'].", '".$_POST['content']."')");
        print("<script> window.location.replace('messagerie.php?conversation=".$_GET['conversation']."'); </script>");
    }
    ?>

    <!-- start main-section -->
    <section class="main-section">
        <div class="conversations">
            <?php
            $conversations = mysqli_query($code, "SELECT * FROM conversation WHERE code_trq = $code_trq OR code_annonceur = $code_trq");
            while($ligne = mysqli_fetch_assoc($conversations))
            {
                $annonce = mysqli_query($code, "SELECT * FROM annonce WHERE code_anc = ".$ligne['code_anc']);
                $annonce = mysqli_fetch_assoc($annonce);
                $troqueur = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq != $code_trq AND code_trq IN (".$ligne['code_annonceur'].", ".$ligne['code_trq'].")");
                $troqueur = mysqli_fetch_assoc($troqueur);
                ?>
                <div class="label-conversation" onclick="javascript: window.location.replace('messagerie.php?conversation=<?php print($ligne['code_cnv']); ?>');" id="<?php print($ligne['code_cnv']); ?>">
                    <img src="../<?php print($troqueur['photo']); ?>" width="45px" height="45px">
                    <div class="info-conversation">
                        <p class="titre-annonce"><?php print($annonce['titre']); ?></p>
                        <p class="nom-prenom"><?php print($troqueur['prenom']." ".$troqueur['nom']) ?></p>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
        <div class="conversation" id="conversation">
            <?php
            if(isset($_GET['conversation'])) {
                $conversation = $_GET['conversation'];
                print("<script> 
                    document.getElementById('$conversation').style.background = 'rgba(160, 160, 160, 0.2)';
                    document.getElementById('conversation').style.visibility = 'visible';
                    </script>");
                $messages = mysqli_query($code, "SELECT * FROM message WHERE code_cnv = $conversation ORDER BY date_pub DESC");
                while($ligne = mysqli_fetch_assoc($messages)) {
                    if($code_trq == $ligne['code_trq']) {
                        ?>
                        <div class="mon-message">
                            <img src="../<?php print($informations['photo']); ?>" width="45px" heigh="45px">
                            <p class="message-content"><?php print($ligne['content']); ?></p>
                        </div>
                        <?php
                    } else {
                        $troqueur = mysqli_query($code, "SELECT * FROM troqueur WHERE code_trq = ".$ligne['code_trq']);
                        $troqueur = mysqli_fetch_assoc($troqueur);
                        ?>
                        <div class="son-message">
                            <img src="../<?php print($troqueur['photo']); ?>" width="45px" heigh="45px">
                            <p class="message-content"><?php print($ligne['content']); ?></p>
                        </div>
                        <?php
                    }
                }
                print("<script> updateScroll(); </script>");
                ?>
                <div class="envoyer-message">
                    <form method="post" onsubmit="return validated_message()">
                        <input type="text" name="content" placeholder="Tapez un message" id="content-input">
                        <button type="submit" name="envoyer-message"><img src="../images/Site-Web/send-message.png" width="20px" height="20px"></button>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <script src="../js/messagerie.js"></script>
    <!-- end main-section -->

</body>
</html>