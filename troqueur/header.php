<?php?>

<style>

.compte img {
    height: 25px;
    width: 25px;
    border-radius: 20px;
    cursor: pointer;
}

.compte {
    margin-left: 40px;
    padding-top: 8px;
}

nav {
    display: flex;
    align-items: center;
}

.compte-info {
    visibility: hidden;
    list-style: none;
    background-color: white;
    position: absolute;
    margin-left: -200px;
    border-radius: 5px;
    align-items: center;
    padding: 20px auto;
    justify-content: center;
    box-shadow: 0 5px 20px rgba(1, 1, 1, 20%);
    width: 250px;
}

.compte-info li {
    align-items: center;
    margin: 20px;
}

.compte-info hr {
    margin: auto 20px;
}

.photo-mail div {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}

.photo-mail img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}

.icons span a {
    margin-bottom: 10px;
    margin-left: 10px;
    position: absolute;
    color: rgb(83, 83, 83);
    text-decoration: none;
}

.icons span a:hover {
    color: black;
}

.compte:hover .compte-info {
    visibility: visible;
}

header {
	width: 100%;
	justify-content: space-between;
	display: flex;
	align-items: center;
	z-index: 999;
	padding: 0 100px;
	background-color: #232a34;
    position: fixed;
}

.logo {
    text-decoration: none;
    color: rgb(0, 155, 252);
	font-weight: 800;
}

header nav > ul {
	list-style: none;
	display: inline-flex;
}

header nav li {
	margin-left: 40px;
}

header nav > ul a {
	color: rgba(255, 255, 255, 0.8);
	font-weight: 500;
	text-decoration: none;
	font-size: 13px;
}

header nav > ul a:hover {
	color: white;
}

</style>

<!-- start header -->
<header>
    <h1><a class="logo" href="index.php">Troc Maroc</a></h1>
    <nav>
        <ul>
            <li><a href="messagerie.php">Messagerie</a></li>
            <li><a href="creer-une-annonce.php">Créer une annonce</a></li>
        </ul>
        <div class="compte">
            <img src="<?php echo "../".$informations['photo'];?>">
            <ul class="compte-info">
                <li class="photo-mail">
                    <div>
                        <img src="<?php echo "../".$informations['photo'];?>">
                        <p style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                            <?php
                            echo $informations['prenom']." ".$informations['nom']."<br>";
                            echo $informations['email'];
                            ?>
                        </p>
                    </div>
                </li>
            <hr>
                <li class="icons">
                    <div><img src="../images/Site-Web/profil.png"><span><a href="compte.php">Mon compte</a></span></div>
                    <div><img src="../images/Site-Web/annonces.png"><span><a href="mes-annonces.php">Mes annonces</a></span></div>
                    <div><img src="../images/Site-Web/favorite-off.png"><span><a href="mes-favoris.php">Mes favoris</a></span></div>
                    <div><img src="../images/Site-Web/logout.png"><span><a href="../deconnexion.php">Se déconnecter</a><span></div>
                </li>
            </ul>
        </div>
    </nav>
</header>
