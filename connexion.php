<?php
$nomserveur='localhost';//nom du serveur
$nomdb='SmartCarMaintenance'; //nom de la base de donné
$login='root';//login de l'utilisateur
$pass='';//mot de pass
$link = mysqli_connect($nomserveur,$login,$pass,$nomdb) or die("Error " . mysqli_error($link)); 
$result = $link->query("SET NAMES UTF8")
?>