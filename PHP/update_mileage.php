<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');

$idV=$_GET['idV'];
$currentMileage=$_POST['currentMileage'];
$req="SELECT * FROM vehicle WHERE idV='$idV'";

$execution = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
$aff=mysqli_fetch_array($execution);
$vehicle=$aff['vehicleName'];


$updateReq="UPDATE vehicle SET currentMileage='$currentMileage' WHERE vehicleName='$vehicle';";	
$exe_update = $link->query($updateReq) or die("Error in the consult.." . mysqli_error($link));	

$updateReq2="UPDATE maintenancelist SET currentMileage='$currentMileage' WHERE vehicleName='$vehicle';";	
$exe_update = $link->query($updateReq2) or die("Error in the consult.." . mysqli_error($link));	


		
?>