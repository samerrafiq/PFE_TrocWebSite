<?php include "liremsg.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    	<meta charset="UTF-8"/>
    	<title>Messages</title>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/styletab.css">
	<style>
		#FormAjouter{
		 max-width: 700px;
 		 width: 100%;
 		 background-color: #fff;
 		 display: none;
 		 padding: 25px 30px;
 		 border-radius: 5px;
 		 box-shadow: 0 5px 10px rgba(0,0,0,0.15);
 		 position: fixed;
 		 margin-left: 150px;
		}
	</style>
  </head>
  <body>

       <?php include "navbarMSG.php" ?>
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
        <th>Email</th>
        <th>Sujet</th>
        <th>Message</th>
        <th colspan="3" class="text-center" >Action</th>
      </tr>
    </thead>
    <div id="FormAjouter" style="">
        <div class="title">
          <a style="float:right;background-color: red;" onclick="Hid()">
          <button style="background-color: red;color: white;width: 20px;" type="button">X</button></a>
      </div>
          <br>
        <p id="E" style="font-size:15px; width: 600px;"></p><hr>
        <p id="S" style="font-size:15px; width: 600px;"></p><hr>
        <p id="M" style="font-size:20px; width: 600px; overflow-wrap: break-word;"></p><hr>
      </div>
    <tbody>
  <?php
        while($rows = mysqli_fetch_assoc($result)){
          ?>
      <tr>
        <td><?php echo $rows['email']; $a= $rows['email'];?></td>
        <td><?php echo $rows['sujet']; $b= $rows['sujet'];?></td>
        <td style= "max-width:300px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">
          <?php echo $rows['message']; $c = $rows['message']; ?></td>
        <td>
          <a onclick="Dis('<?php echo$rows['email'] ;?>.' , '<?php echo$rows['sujet'] ;?>.', '<?php echo$rows['message'] ;?>.')">
            <button style="background-color:purple;border-color:purple;" class="Mod">Consulter</button>
          </a>
        </td>
         <td><a href="mailto:<?=$rows['email']?>"><button class="Mod">Repondre</button></a></td>
         <td><a onclick="supp(<?php echo$rows['code_ctn'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo("La table messages est vide.")?>
  </div> <?php } ?>
  </div>
  </section>
  <script type="text/javascript">
    function supp(id){
        if(confirm("Voulez vous supprimer ce message?")){
          window.location.href='supprimermsg.php?code_ctn='+id+'';
        }
      }
	function Dis(em,sj,msg){
    var x = document.getElementById("FormAjouter");
    document.getElementById("E").innerHTML = "Email : " +em;
    document.getElementById("S").innerHTML = "Sujet : " +sj;
    document.getElementById("M").innerHTML = "Message : "+msg;
    x.style.display = "block";
  }
  function Hid(){
    var x = document.getElementById("FormAjouter");
    x.style.display = "none";
  }
  </script>
   </body>
</html>
