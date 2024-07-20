<?php include "lireANN.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestion Annonces</title>
	<meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styletab.css">
</head>
<body>
	<?php include "navbarANN.php" ?>
	<section id="content">
    <div class="All">
      <?php if (isset($_GET['success'])) { ?>
        <div  class="alert alert-success" style="margin-top: 5px;width:600px;">
        <?php echo $_GET['success']; ?>
    </div>
    <?php } ?>
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" style="margin-top: 5px;width:700px;">
        <?php echo $_GET['error']; ?>
      </div>
  <?php } ?>
	<?php if (mysqli_num_rows($result)) { ?>
  <table>
    <thead>
      <tr>
        <th>Nom Troqueur</th>
        <th>Categorie</th>
        <th>Titre</th>
	<th>Date de publication</th>
	<th>Signales</th>
	<th colspan="2" >Action</th>
      </tr>
    </thead>
    <tbody>
  <?php
        $i = 0;
        while($rows = mysqli_fetch_assoc($result)){
          $i++;
          ?>
  <tr>
 <?php
	$rqt= "SELECT titre FROM categorie where code_cat = ".$rows['code_cat']."";
	$res=mysqli_query($conn,$rqt);
	$cat= mysqli_fetch_assoc($res);
	$rqt2= "SELECT nom FROM troqueur where code_trq = ".$rows['code_trq']."";
	$res2=mysqli_query($conn,$rqt2);
	$trq= mysqli_fetch_assoc($res2);
 ?>
	<td><?=$trq['nom']?></td>
	<td><?=$cat['titre']?></td>
        <td><?=$rows['titre']?></td>
	<td><?=$rows['date_pub']?></td>
	<td style="color: red;font-style: bold;font-weight: 900;"><?=$rows['signales']?></td>
          <td><a onclick="supp(<?php echo$rows['code_anc'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo("La table annonces est vide.")?>
  </div> <?php } ?>
  </div>
  </section>
  <script type="text/javascript">
    function supp(id){
      if(confirm("Voulez-vous supprimer ce troqueur?\n NB : Ces commentaires seront aussi supprimés.")){
          window.location.href='supprimerANN.php?code_anc='+id;
        }
      }
  </script>
  <script src="js/script.js"></script>
</body>
</html>
