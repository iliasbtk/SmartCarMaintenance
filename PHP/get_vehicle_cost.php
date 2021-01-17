<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];

$req= "SELECT * FROM vehicle WHERE username='$username';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{
	$vehicleName=$aff['vehicleName'];
	
	$req1= "SELECT vehicleName, SUM(cost) mCumCost
		FROM maintenance
		WHERE vehicleName='$vehicleName'
		GROUP BY vehicleName;";
			
	$sql1 = $link->query($req1) or die("Error in the consult.." . mysqli_error($link));
	$aff1=mysqli_fetch_array($sql1);
	
	$req2= "SELECT vehicleName, SUM(cost) dCumCost 
		FROM document
		WHERE vehicleName='$vehicleName'
		GROUP BY vehicleName;";
			
	$sql2 = $link->query($req2) or die("Error in the consult.." . mysqli_error($link));
	$aff2=mysqli_fetch_array($sql2);
	
	$req3= "SELECT vehicleName, SUM(cost) sCumCost 
		FROM service
		WHERE vehicleName='$vehicleName'
		GROUP BY vehicleName;";
			
	$sql3 = $link->query($req3) or die("Error in the consult.." . mysqli_error($link));
	$aff3=mysqli_fetch_array($sql3);
	
$totalCost = $aff1['mCumCost'] + $aff2['dCumCost'] + $aff3['sCumCost'];	
	
echo " <tr>";
echo " <td>" . $aff['vehicleName'] . "</td>";
echo " <td>" . $totalCost . "</td>";
echo " </tr>";
}

?>