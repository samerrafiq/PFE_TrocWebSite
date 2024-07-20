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
     position: absolute;
     margin-left: 150px;
     position: fixed;
    }
  </style>
  </head>
  <body>

       <?php include "navbarMSG.php" ?>
       <?php if (isset($_POST['message'])) {
    include "conn.php";
    $message=$_POST['message'];
    $sql = "SELECT * FROM contact WHERE CONCAT(email,message,sujet) like '%$message%' ";
    $result = mysqli_query($conn, $sql); ?>
	<section id="content">
    <div class="All">
  <?php if (mysqli_num_rows($result)) { ?>
  <table>
    <thead>
      <div id="FormAjouter">
        <div class="title"> <a style="float:right;background-color: red;" onclick="Hid()"><button
         style="background-color: red;color: white;width: 20px;"
          type="button">X</button></a></div>
          <br>
        <p id="E" style="font-size:15px"></p><hr>
        <p id="S" style="font-size:15px"></p><hr>
        <p id="M" style="font-size:20px"></p><hr>
      </div>
      <tr>
        <th>Email</th>
        <th>Sujet</th>
        <th>Message</th>
        <th colspan="4" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
  <?php
        while($rows = mysqli_fetch_assoc($result)){
           ?>
      <tr>
        <td><?=$rows['email']?></td>
        <td><?=$rows['sujet']?></td>
        <td style= "max-width:300px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">
          <?php echo $rows['message']; $c = $rows['message']; ?></td>
        <td>
	       <td>
          <a onclick="Dis('<?php echo$rows['email'] ;?>.', '<?php echo$rows['sujet'] ;?>.', '<?php echo$rows['message'] ;?>.')" >
            <button
                  style="background-color:purple;border-color:purple;"
                    class="Mod">Consulter</button></a>
        </td>
        <td> <a href="mailto:<?=$rows['email']?>"><button class="Mod">Repondre</button></a></td>
          <td><a onclick="supp(<?php echo$rows['code_ctn'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo("Message introuvable.")?>
  </div> <?php } }?>
  </div>
  </section>
	 <script type="text/javascript">
    function supp(id){
        if(confirm("Voulez vous supprimer ce message?")){
          window.location.href='supprimermsg.php?code_cnt='+id+'';
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
