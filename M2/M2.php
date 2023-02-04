<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mission 2 -  WIld</title>
    <meta name="author" content="D.">
    <meta name="description" content="Voici un projet demandé par la formation, dont la principale utilité est de montrer que je sais manier du sql ">
    <link rel="stylesheet" href="style.css"/>
</head>


<body>
    <!-- Header section -->
<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>

<!-- Main section -->
<main>
  
  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
    <form method="post" class="new-member-form">
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" />

    <?php
require_once("connexion.php");
//formulaire côté back
    
    if ($_POST) {

        if (isset($_POST["name"]) && !empty($_POST["name"])) {

            $name = strip_tags($_POST["name"]);
          
            $sql = "INSERT INTO users (name) VALUES (:name)";
            $query = $db->prepare($sql);
            $query->bindValue(':name', $name);

            $query->execute();
        }
    }


?>
   <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit">Envoyer</button>
  </form>



  
  <!-- Member list -->
  <h2>Membres de l'équipage</h2>
  <section class="member-list">
    <!--<div class="member-item">Eleftheria</div>
    <div class="member-item">Gennadios</div>
    <div class="member-item">Lysimachos</div>-->
    <table>
 <?php

require_once("connexion.php");

$sql ="SELECT id, name FROM users";
$query = $db->prepare($sql);
$query->execute();

while($d = $query->fetch())  {

 
   echo "<tr>";
   $id = $d['id'];
   if ($id % 3 == 0) {
     echo "<td>" ."<div class='member-item'>" . $d['name'] . "</div>" . "</td>" ; } elseif 
     ($id % 2 == 0 && $id % 3 !== 0)
     {
      echo "<tr> <td> <td> " ."<div class='member-item'>" . $d['name'] . "</div>" . "</td> </td> </tr>" ; }
      else
     echo "<tr>  <div class='member-item'> &nbsp; " . $d['name'] . " </div> </tr>";
   echo "</tr>";
    



}

?>
 </table>
  </section>
</main>

<footer>
  <p>Réalisé par Jason & D. en Anthestérion de l'an 515 avant JC</p>
</footer>


</body>
</html>