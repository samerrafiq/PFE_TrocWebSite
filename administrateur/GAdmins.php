<?php include "lire.php"; ?>
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
  <a href="AjouForm.php" ><button class="Ajt" >Ajouter</button></a>
  <?php if (mysqli_num_rows($result)) { ?>
  <table>
    <thead>
      <tr>
        <th>N°</th>
        <th>Nom</th>
        <th>prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th colspan="2" class="text-center" >Action</th>
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
        <td> <a onclick="supp(<?php echo $rows['code_adm'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;"><?php echo("La table administrateur est vide.")?>
  </div> <?php } ?>
  </div>
  </section>
    <script type="text/javascript">
      function supp(id){
        if(confirm("Voulez vous supprimer ce administrateur ?")){
          window.location.href='supprimer.php?code_adm=' + id;
        }
      }
    </script>
   </body>
</html>
