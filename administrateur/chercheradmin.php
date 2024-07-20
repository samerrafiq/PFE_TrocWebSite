<!DOCTYPE html>
<html lang="en">
  <head>
    	<meta charset="UTF-8"/>
    	<title>Gestion administrateurs</title>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/styletab.css">
  </head>
  <body>

       <?php include "navbarADM.php" ?>
	<?php if (isset($_POST['nom'])) {
		include "conn.php";
		$nom=$_POST['nom'];
		$sql = "SELECT * FROM administrateur WHERE CONCAT(nom, prenom, email) like '%$nom%' ";
		$result = mysqli_query($conn, $sql); ?>
	<section id="content">
    <div class="All">
  <?php if (mysqli_num_rows($result) > 0) { ?>
  <table>
    <thead>
      <tr>
         <th>N°</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th colspan="2" class="text-center">Action</th>
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
        <td><?=$rows['nom']?></td>
        <td><?=$rows['prenom']?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['telephone']; ?></td>
        <td> <a href="ModiForm.php?code_adm=<?=$rows['code_adm']?>"><button class="Mod">Modifier</button></a></td>
         <td><a onclick="supp(<?php echo$rows['code_adm'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo("Admin introuvable.")?>
  </div> <?php }  } ?>
  </div>
  </section>
 <script type="text/javascript">
      function supp(id){
        if(confirm("Voulez vous supprimer ce administrateur ?")){
          window.location.href='supprimer.php?code_adm='+id+'';
        }
      }
    </script>
   </body>
</html>
