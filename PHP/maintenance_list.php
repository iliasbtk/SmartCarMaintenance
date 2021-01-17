<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');

$selectedVehicle=$_POST['selectedVehicle'];
$oilFilterMileage=$_POST['oilFilterMileage'];
$oilFilterTime=$_POST['oilFilterTime'];
$airFilterMileage=$_POST['airFilterMileage'];
$airFilterTime=$_POST['airFilterTime'];
$fuelFilterMileage=$_POST['fuelFilterMileage'];
$fuelFilterTime=$_POST['fuelFilterTime'];
$batteryMileage=$_POST['batteryMileage'];
$batteryTime=$_POST['batteryTime'];
$brakeFluidMileage=$_POST['brakeFluidMileage'];
$brakeFluidTime=$_POST['brakeFluidTime'];
$brakePadsMileage=$_POST['brakePadsMileage'];
$brakePadsTime=$_POST['brakePadsTime'];
$brakeRotorsMileage=$_POST['brakeRotorsMileage'];
$brakeRotorsTime=$_POST['brakeRotorsTime'];
$changeTiresMileage=$_POST['changeTiresMileage'];
$changeTiresTime=$_POST['changeTiresTime'];
$coolantMileage=$_POST['coolantMileage'];
$coolantTime=$_POST['coolantTime'];
$hosesMileage=$_POST['hosesMileage'];
$hosesTime=$_POST['hosesTime'];
$timingBeltMileage=$_POST['timingBeltMileage'];
$timingBeltTime=$_POST['timingBeltTime'];
$sparkPlugsMileage=$_POST['sparkPlugsMileage'];
$sparkPlugsTime=$_POST['sparkPlugsTime'];
$wiperBladesMileage=$_POST['wiperBladesMileage'];
$wiperBladesTime=$_POST['wiperBladesTime'];


$mileageArray = array("Oil and oil filter" => "$oilFilterMileage", "Air Filter" => "$airFilterMileage", "Fuel filter" => "$fuelFilterMileage",
					"Battery" => "$batteryMileage", "Brake fluid" => "$brakeFluidMileage", "Brake pads" => "$brakePadsMileage", "Brake rotors" => "$brakeRotorsMileage",
					"Change Tires" => "$changeTiresMileage", "Coolant" => "$coolantMileage", "Hoses" => "$hosesMileage", "Timing Belt" => "$timingBeltMileage",
					"Spark plugs" => "$sparkPlugsMileage", "Wiper blades" => "$wiperBladesMileage");
					
$timeArray = array("Oil and oil filter" => "$oilFilterTime", "Air Filter" => "$airFilterTime", "Fuel filter" => "$fuelFilterTime",
					"Battery" => "$batteryTime", "Brake fluid" => "$brakeFluidTime", "Brake pads" => "$brakePadsTime", "Brake rotors" => "$brakeRotorsTime",
					"Change Tires" => "$changeTiresTime", "Coolant" => "$coolantTime", "Hoses" => "$hosesTime", "Timing Belt" => "$timingBeltTime",
					"Spark plugs" => "$sparkPlugsTime", "Wiper blades" => "$wiperBladesTime");
					
foreach($timeArray as $maintenance => $days) {
	if($days != ''){
		$updateRequiredDays="UPDATE maintenancelist SET requiredTime='$days' WHERE maintenanceName='$maintenance' AND vehicleName='$selectedVehicle';";
		$sql = $link->query($updateRequiredDays) or die("Error in the consult.." . mysqli_error($link));
	}
}
foreach ($mileageArray as $maintenance => $miles) {
	if($miles != ''){
		$updateRequiredMileage="UPDATE maintenancelist SET requiredMileage='$miles' WHERE maintenanceName='$maintenance' AND vehicleName='$selectedVehicle';";
		$sql = $link->query($updateRequiredMileage) or die("Error in the consult.." . mysqli_error($link));
	}	
}


			


?>
