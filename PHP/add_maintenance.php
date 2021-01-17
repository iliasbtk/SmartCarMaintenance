<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');

$username=$_GET['username'];
$selectedVehicle=$_POST['selectedVehicle'];
$selectedMaintenance=$_POST['selectedMaintenance'];
$cost=$_POST['cost'];
$date=$_POST['date'];
$currentMileage=$_POST['currentMileage'];

$updateMileageReq="UPDATE vehicle SET currentMileage = '$currentMileage', initialMileage = '$currentMileage' WHERE vehicleName = '$selectedVehicle'";
$sql = $link->query($updateMileageReq) or die("Error in the consult.." . mysqli_error($link));

$updateMileageReq2="UPDATE maintenancelist SET currentMileage = '$currentMileage', initialMileage = '$currentMileage' WHERE vehicleName = '$selectedVehicle'";
$sql = $link->query($updateMileageReq2) or die("Error in the consult.." . mysqli_error($link));

$addMaintenanceReq="INSERT INTO maintenance(username, vehicleName, maintenanceName, cost, date) VALUES ('$username', '$selectedVehicle', '$selectedMaintenance','$cost','$date')";
$sql = $link->query($addMaintenanceReq) or die("Error in the consult.." . mysqli_error($link));
			


?>
