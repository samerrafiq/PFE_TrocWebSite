<!DOCTYPE html>
<html lang="en">
  <head>
    	<meta charset="UTF-8"/>
    	<title>Gestion administrateurs</title>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/styletab.css">
  </head>
  <body>
   
       <?php include "navbarBLQ.php" ?>
	<?php if (isset($_POST['email'])) {
		include "conn.php";
		$email=$_POST['email'];
		$sql = "SELECT * FROM bloquer WHERE email like '%$email%' ";
		$result = mysqli_query($conn, $sql); ?>
	<section id="content">
    <div class="All">
  <?php if (mysqli_num_rows($result) > 0) { ?>
  <table>
    <thead>
      <tr>
        <th>Code</th>
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
        <td><?php echo $rows['email']; ?></td>
         <td><a onclick="supp('<?php echo $rows['email'] ;?>')"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo("Troqueur introuvable.")?> 
  </div> <?php }  } ?>
  </div>
  </section>
	<script type="text/javascript">
    function supp(id){
        if(confirm("Voulez vous debloquer ce troqueur?")){
          window.location.href='supprimerblq.php?code='+id+'';
        }
      }
  </script>
   </body>
</html>