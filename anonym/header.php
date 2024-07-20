<?php?>

<style>

nav {
    display: flex;
    align-items: center;
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

.connexion a {
	border: 1px solid white;
	padding: 5px 10px;
	border-radius: 3px;
}

.connexion a:hover {
	background-color: #2b3644;
}

</style>

<!-- start header -->
<header>
    <h1><a class="logo" href="../index.php">Troc Maroc</a></h1>
    <nav>
        <ul>
			<li><a href="index.php">Consulter les annonces</a></li>
            <li><a href="connexion.php">Créer une annonce</a></li>
            <li class="connexion"><a href="connexion.php">Connexion</a></li>
        </ul>
    </nav>
</header>
<!-- end header -->