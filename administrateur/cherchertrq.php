<!DOCTYPE html>
<html>
<head>
	<title>Gestion troqueur</title>
	<meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/styletab.css">
</head>
<body>
	<?php include "navbarTRQ.php"; ?>
  <?php if (isset($_POST['troqueur'])) {
    include "conn.php";
    $troqueur=$_POST['troqueur'];
    $sql = "SELECT * FROM troqueur WHERE CONCAT(nom,prenom,email) like '%$troqueur%' ";
    $result = mysqli_query($conn, $sql); ?>
	<section id="content">
    <div class="All">
  <?php if (mysqli_num_rows($result)) { ?>
  <table>
    <thead>
      <tr>
        <th>N°</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
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
        <td><?=$rows['nom']?></td>
        <td><?=$rows['prenom']?></td>
        <td><?php echo $rows['email']; ?></td>
         <td><a onclick="supp(<?php echo$rows['code_trq'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;"><?php echo("troqueur introuvable.")?>
  </div> <?php } }?>
  </div>
  </section>
<script type="text/javascript">
    function supp(id){
        if(confirm("Voulez vous supprimer ce troqueur\n NB:Si vous cliqué ok tous ces annonces et ces commentaires seront supprimé?")){
          window.location.href='supprimertrq.php?code_trq='+id+'';
        }
      }
  </script>
</body>
</html>
