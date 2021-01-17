<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');

$selectedVehicle=$_POST['selectedVehicle'];
$selectedService=$_POST['selectedService'];
$cost=$_POST['cost'];
$date=$_POST['date'];

$addServiceReq="INSERT INTO service (vehicleName, serviceName, cost, date) VALUES ('$selectedVehicle', '$selectedService','$cost','$date')";
$sql = $link->query($addServiceReq) or die("Error in the consult.." . mysqli_error($link));	

	
?>
