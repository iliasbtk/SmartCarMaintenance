<?php
include('connexion.php');
header('Access-Control-Allow-Origin: *');
$idV=$_POST['idV'];

$req="SELECT * FROM vehicle WHERE idV='$idV'";
$execution = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
$aff=mysqli_fetch_array($execution);
$vehicle=$aff['vehicleName'];

$deleteVehicleReq="DELETE FROM vehicle WHERE vehicleName='$vehicle';";
$sql = $link->query($deleteVehicleReq) or die("Error in the consult.." . mysqli_error($link));

$deleteDocReq="DELETE FROM document WHERE vehicleName='$vehicle';";
$sql = $link->query($deleteDocReq) or die("Error in the consult.." . mysqli_error($link));

$deletemaintenanceReq1="DELETE FROM maintenance WHERE vehicleName='$vehicle';";
$sql = $link->query($deletemaintenanceReq1) or die("Error in the consult.." . mysqli_error($link));

$deletemaintenanceReq2="DELETE FROM maintenancelist WHERE vehicleName='$vehicle';";
$sql = $link->query($deletemaintenanceReq2) or die("Error in the consult.." . mysqli_error($link));

$deleteServiceReq="DELETE FROM service WHERE vehicleName='$vehicle';";
$sql = $link->query($deleteServiceReq) or die("Error in the consult.." . mysqli_error($link));


?>