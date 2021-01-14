<?php
include('connexion.php');
$vehicle=$_GET['vehicle'];

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


$url="vehicles.php";
		
		
		if (!headers_sent())
		{    
			header('Location: '.$url);
			exit;
		}
		else
		{  
			echo '<script type="text/javascript">';
			echo 'window.location.href="'.$url.'";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
			echo '</noscript>'; 
			exit;
		} 	
?>