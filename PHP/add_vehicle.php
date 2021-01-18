<?php 
header('Access-Control-Allow-Origin: *');
include('connexion.php');

$username=$_GET['username'];
$regNum=$_POST['regNum'];
$model=$_POST['model'];
$vehicleName= $model . ' ' . $regNum ;
$brand=$_POST['brand'];
$motExpiryDate=$_POST['motExpiryDate'];
$taxDueDate=$_POST['taxDueDate'];
$insuranceExpiryDate=$_POST['insuranceExpiryDate'];
$currentMileage=$_POST['currentMileage'];

$req_dupli="SELECT * FROM vehicle WHERE regNum='$regNum'";
$exe_dupli = $link->query($req_dupli) or die("Error in the consult.." . mysqli_error($link));
$duplicate=mysqli_num_rows($exe_dupli);
				
if($duplicate==0)
{

$addVehicleReq="INSERT INTO vehicle (username, vehicleName, regNum, model, brand, motExpiryDate, taxDueDate, insuranceExpiryDate, currentMileage, initialMileage) 
			VALUES ('$username', '$vehicleName', '$regNum', '$model','$brand','$motExpiryDate','$taxDueDate','$insuranceExpiryDate','$currentMileage', '$currentMileage')";
			
$sql = $link->query($addVehicleReq) or die("Error in the consult.." . mysqli_error($link));	

$addDocReq="INSERT INTO document (vehicleName, documentName, expiryDate) 
					VALUES ('$vehicleName', 'Insurance','$insuranceExpiryDate'),
						('$vehicleName', 'MOT', '$motExpiryDate'),
						('$vehicleName', 'Tax', '$taxDueDate');";
$sql = $link->query($addDocReq) or die("Error in the consult.." . mysqli_error($link));	

$Req="INSERT INTO maintenancelist (vehicleName, maintenanceName, currentMileage, initialMileage) 
					VALUES ('$vehicleName', 'Oil and oil filter','$currentMileage', '$currentMileage' ),
						('$vehicleName', 'Air Filter','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Fuel filter','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Battery','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Brake fluid','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Brake pads','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Brake rotors','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Change Tires','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Coolant','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Hoses','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Timing Belt','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Spark plugs','$currentMileage', '$currentMileage'),
						('$vehicleName', 'Wiper blades','$currentMileage', '$currentMileage');";

						 
$sql = $link->query($Req) or die("Error in the consult.." . mysqli_error($link));
}
else{
	echo "Vehicle already exist";
}

?>