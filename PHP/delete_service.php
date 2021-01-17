<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$idS=$_GET['idS'];
$req="DELETE FROM service WHERE idS='$idS'";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

?>