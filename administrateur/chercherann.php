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
  <?php if (isset($_POST['annonce'])) {
    include "conn.php";
    $annonce=$_POST['annonce'];
    $sql = "SELECT * FROM annonce WHERE CONCAT(titre, description) like '%$annonce%' ";
    $result = mysqli_query($conn, $sql); ?>
	<section id="content">
    <div class="All">
	<?php if (mysqli_num_rows($result)) { ?>
  <table>
    <thead>
      <tr>
       <th>Nom Troqueur</th>
        <th>Categorie</th>
        <th>Titre</th>
	     <th>Date de publication</th>
	     <th>Signaler</th>
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
           <td><a onclick="supp(<?php echo$rows['code_anc'] ;?>)"> <button class="Sup">Supprimer</button></a>
           </td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo("Annonce introuvable.")?>
  </div> <?php } } ?>
  </div>
  </section>
  <script type="text/javascript">
    function supp(id){
       if(confirm("Voulez vous supprimer ce troqueur?\n NB:Si vous cliqué ok ces commentaires seront aussi supprimé.")){
          window.location.href='supprimerANN.php?code_anc='+id+'';
        }
      }
  </script>
  <script src="js/script.js"></script>
</body>
</html>
