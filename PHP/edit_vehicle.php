<?php 
header('Access-Control-Allow-Origin: *');
include('connexion.php');

$idV=$_GET['idV'];
$regNum=$_POST['regNum'];
$model=$_POST['model'];
$vehicleName= $model . ' ' . $regNum ;
$brand=$_POST['brand'];


$oldVehicleNameReq = "SELECT * FROM vehicle WHERE idV='$idV'";
$sql2 = $link->query($oldVehicleNameReq) or die("Error in the consult.." . mysqli_error($link));
$aff=mysqli_fetch_array($sql2);
$oldVehicleName=$aff['vehicleName'];

$req_dupli="SELECT * FROM vehicle WHERE regNum='$regNum'";
$sql1 = $link->query($req_dupli) or die("Error in the consult.." . mysqli_error($link));
$duplicate=mysqli_num_rows($sql1);


				
if($duplicate<=1)
{
$updVehicleReq= "UPDATE vehicle SET vehicleName='$vehicleName', regNum='$regNum', model='$model', brand='$brand'
				WHERE idV='$idV';";	
$sql = $link->query($updVehicleReq) or die("Error in the consult.." . mysqli_error($link));	

					
$updDocReq= "UPDATE document SET vehicleName='$vehicleName' WHERE vehicleName='$oldVehicleName';";					
$sql = $link->query($updDocReq) or die("Error in the consult.." . mysqli_error($link));	

$updMaintenanceReq1= "UPDATE maintenance SET vehicleName='$vehicleName' WHERE vehicleName='$oldVehicleName';";				
$sql = $link->query($updMaintenanceReq1) or die("Error in the consult.." . mysqli_error($link));	

$updMaintenanceReq2= "UPDATE maintenancelist SET vehicleName='$vehicleName' WHERE vehicleName='$oldVehicleName';";					
$sql = $link->query($updMaintenanceReq2) or die("Error in the consult.." . mysqli_error($link));	
	
$updServiceReq= "UPDATE service SET vehicleName='$vehicleName' WHERE vehicleName='$oldVehicleName';";					
$sql = $link->query($updServiceReq) or die("Error in the consult.." . mysqli_error($link));	
}
else{
	echo "Vehicle already exist";
}

?>