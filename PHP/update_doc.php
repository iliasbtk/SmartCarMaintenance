<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');

$selectedVehicle=$_POST['selectedVehicle'];
$selectedDocument=$_POST['selectedDocument'];
$cost=$_POST['cost'];
$date=$_POST['date'];
$expiryDate=$_POST['expiryDate'];

$req="UPDATE document SET cost='$cost', date='$date', expiryDate='$expiryDate' WHERE vehicleName='$selectedVehicle' AND documentName='$selectedDocument';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

if($selectedDocument == 'Insurance'){
	$req1="UPDATE vehicle SET insuranceExpiryDate='$expiryDate' WHERE vehicleName='$selectedVehicle';";
	$sql = $link->query($req1) or die("Error in the consult.." . mysqli_error($link));	
}
if($selectedDocument == 'Tax'){
	$req2="UPDATE vehicle SET taxDueDate='$expiryDate' WHERE vehicleName='$selectedVehicle';";
	$sql = $link->query($req2) or die("Error in the consult.." . mysqli_error($link));	
}
if($selectedDocument == 'MOT'){
	$req3="UPDATE vehicle SET motExpiryDate='$expiryDate' WHERE vehicleName='$selectedVehicle';";
	$sql = $link->query($req3) or die("Error in the consult.." . mysqli_error($link));	
}
?>
