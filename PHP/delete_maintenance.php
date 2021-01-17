<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');

$idMTr=$_GET['idMTr'];
$req="DELETE FROM maintenance WHERE idMTr='$idMTr'";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

?>


