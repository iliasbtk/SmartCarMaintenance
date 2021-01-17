<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username= $_POST['username'];


$selectReq="SELECT * FROM vehicle WHERE username='$username';";
$execution = $link->query($selectReq) or die("Error in the consult.." . mysqli_error($link));
					
while($vehicles=mysqli_fetch_array($execution)) {
	$vehicleName=$vehicles['vehicleName'];
 	$deleteDocReq="DELETE FROM document WHERE vehicleName='$vehicleName';";
	$sql = $link->query($deleteDocReq) or die("Error in the consult.." . mysqli_error($link));

	$deletemaintenanceReq1="DELETE FROM maintenance WHERE vehicleName='$vehicleName';";
	$sql = $link->query($deletemaintenanceReq1) or die("Error in the consult.." . mysqli_error($link));

	$deletemaintenanceReq2="DELETE FROM maintenancelist WHERE vehicleName='$vehicleName';";
	$sql = $link->query($deletemaintenanceReq2) or die("Error in the consult.." . mysqli_error($link));

	$deleteServiceReq="DELETE FROM service WHERE vehicleName='$vehicleName';";
	$sql = $link->query($deleteServiceReq) or die("Error in the consult.." . mysqli_error($link));
}

$deleteReq="DELETE FROM vehicle WHERE username='$username';";
$execution = $link->query($deleteReq) or die("Error in the consult.." . mysqli_error($link));
					
$deleteReq="DELETE FROM users WHERE username='$username';";
$execution = $link->query($deleteReq) or die("Error in the consult.." . mysqli_error($link));
	
// Check user no longer exists in the talbe
$req="SELECT * FROM users WHERE username='$username' LIMIT 1";
$result = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
if ($result->num_rows == 1){
	echo 'false';
}  
else {
	echo 'true';
     
}

?>
