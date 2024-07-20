<!DOCTYPE html>
<html>
<head>
	<title>Gestion Categories</title>
	<meta charset="UTF-8"/>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/styletab.css">
</head>
<body>
	<?php include "navbarCAT.php" ?>
  <?php if (isset($_POST['Categorie'])) {
    include "conn.php";
    $categorie=$_POST['Categorie'];
    $sql = "SELECT * FROM categorie WHERE titre like '%$categorie%'";
    $result = mysqli_query($conn, $sql); ?>
	<section id="content">
    <div class="All">
    <?php if (mysqli_num_rows($result) > 0) { ?>
  <table>
    <thead>
      <tr>
        <th>N°</th>
        <th>Titre</th>
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
        <td><?=$i?></td>
        <td><?=$rows['titre']?></td>
        <td> <a href="ModiFormcat.php?code_cat=<?=$rows['code_cat']?>"><button class="Mod">Modifier</button></a></td>
 	<td><a onclick="supp(<?php echo$rows['code_cat'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo("Categorie introuvable.")?>
  </div> <?php } }?>
  </div>
  </section>
  <script type="text/javascript">
    function supp(id){
        if(confirm("Voulez vous supprimer cette categorie?\n NB:Si vous cliqué ok tous les annonces lieé a cette categorie seront supprimé?")){
          window.location.href='supprimerCAT.php?code_cat='+id+'';
        }
      }
  </script>
  <script src="js/script.js"></script>
</body>
</html>
