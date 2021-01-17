<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];

$req1= "SELECT vehicleName, maintenanceName, MAX(date) latestDate
		FROM maintenance
		WHERE username='$username'
		GROUP BY vehicleName, maintenanceName;";
$sql1 = $link->query($req1) or die("Error in the consult.." . mysqli_error($link));





while($aff1=mysqli_fetch_array($sql1))
{
	$maintenanceName = $aff1['maintenanceName'];
	$vehicleName = $aff1['vehicleName'];
	$req2= "SELECT * FROM maintenancelist WHERE maintenanceName='$maintenanceName' AND vehicleName='$vehicleName';";
	$sql2 = $link->query($req2) or die("Error in the consult.." . mysqli_error($link));
	$aff2=mysqli_fetch_array($sql2);
	$latest=$aff1['latestDate'];
	
	if($aff2['requiredMileage'] == 0 && $aff2['requiredTime'] == 0){
		echo " <tr>";
		echo " <td>" . $aff1['vehicleName'] . "</td>";
		echo " <td>" . $aff1['maintenanceName'] . "</td>";
		echo " <td>NULL</td>";
		echo " <td>NULL</td>";
		echo " <td>" . $aff2['currentMileage'] . "</td>";
		echo " </tr>";
	}
	
	if($aff2['requiredMileage'] == 0 && $aff2['requiredTime'] != 0){
		

		
		
		$maintenanceDate = date('Y-m-d', strtotime($latest. ' + '. $aff2['requiredTime'] . 'days'));
		
		echo " <tr>";
		echo " <td>" . $aff1['vehicleName'] . "</td>";
		echo " <td>" . $aff1['maintenanceName'] . "</td>";
		echo " <td> NULL</td>";
		echo " <td>" . $maintenanceDate . "</td>";
		echo " <td>" . $aff2['currentMileage'] . "</td>";
		echo " </tr>";
	}
	if($aff2['requiredMileage'] != 0 && $aff2['requiredTime'] == 0){
		
		$nextMaintenance= (int)$aff2['initialMileage'] + (int)$aff2['requiredMileage'] - (int)$aff2['currentMileage'];
		echo " <tr>";
		echo " <td>" . $aff1['vehicleName'] . "</td>";
		echo " <td>" . $aff1['maintenanceName'] . "</td>";
		echo " <td>". $nextMaintenance . "</td>";
		echo " <td>NULL</td>";
		echo " <td>" . $aff2['currentMileage'] . "</td>";
		echo " </tr>";
	}
	if($aff2['requiredMileage'] != 0 && $aff2['requiredTime'] != 0){
		$nextMaintenance=	(int)$aff2['initialMileage'] + (int)$aff2['requiredMileage'] - (int)$aff2['currentMileage'];
		$maintenanceDate = date('Y-m-d', strtotime($latest. ' + '. $aff2['requiredTime'] . 'days'));
					

		echo " <tr>";
		echo " <td>" . $aff1['vehicleName'] . "</td>";
		echo " <td>" . $aff1['maintenanceName'] . "</td>";
		echo " <td>". $nextMaintenance . "</td>";
		echo " <td>" . $maintenanceDate . "</td>";
		echo " <td>" . $aff2['currentMileage'] . "</td>";
		echo " </tr>";
	}
}
?>