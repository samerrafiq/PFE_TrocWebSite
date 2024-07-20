<?php include "lirecom.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    	<meta charset="UTF-8"/>
    	<title>Gestion commentaire</title>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/styletab.css">
  </head>
  <body>

       <?php include "navbarCOM.php" ?>
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
        <th>nom Troqueur</th>
        <th>Titre Annonce</th>
        <th>Commentaire</th>
        <th>Date</th>
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
	$rqt= "SELECT titre FROM annonce where code_anc = ".$rows['code_anc']."";
	$res=mysqli_query($conn,$rqt);
	$ann= mysqli_fetch_assoc($res);
	$rqt2= "SELECT nom FROM troqueur where code_trq = ".$rows['code_trq']."";
	$res2=mysqli_query($conn,$rqt2);
	$trq= mysqli_fetch_assoc($res2);
 	?>
        <td><?=$trq['nom']?></td>
        <td><?=$ann['titre']?></td>
        <td><?=$rows['content']?></td>
        <td><?php echo $rows['date_pub']; ?></td>
         <td><a onclick="supp(<?php echo$rows['code_cnt'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo("La table commentaire est vide.")?>
  </div> <?php } ?>
  </div>
  </section>
   <script type="text/javascript">
    function supp(id) {
        if(confirm("Voulez vous supprimer ce commentaire?")){
            window.location.href='supprimercom.php?commentaire=' + id;
        }
    }
  </script>
   </body>
</html>
