<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wild Code project</title>
    <meta name="author" content="D.">
    <meta name="description" content="Voici un projet demandé par la formation, dont la principale utilité est de montrer que je sais manier du sql ">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>


<header>

    <nav>
    
        <a href="index.php">Accueil </a>

        <a href="M2.php"> Mission 2 </a>

        <a href="index.php"> Mission 3 </a>

        <a href="index.php"> Mission 4 </a>

        <a href="index.php"> Mission 5 </a>


    </nav>

</header>


<h1> Galerie d'images</h1>


<div class="gal"></div>

<?php
require_once("connexion.php");

$sql ="SELECT id, name, ext, title FROM gal";
$query = $db->prepare($sql);
$query->execute();

while($d = $query->fetch())  {
echo "<div class ='img'>";

echo $d["title"]; 
echo "<br>";
echo "<img class='imgsql' src=";
echo $d["name"];
echo ".";
echo $d["ext"];
echo "></img>";


echo "</div>";

}
?>


<img id = "img1" src = "a1.png"></img>





    
</body>
</html>