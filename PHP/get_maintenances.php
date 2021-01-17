<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];


$req="SELECT * FROM maintenance m 
	INNER JOIN vehicle v 
	ON m.vehicleName = v.vehicleName
	WHERE v.username = '$username';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{
echo " <tr>";
echo " <td>" . $aff['vehicleName'] . "</td>";
echo " <td>" . $aff['maintenanceName'] . "</td>";
echo " <td>" . $aff['date'] . "</td>";
echo " <td>" . $aff['cost'] . "</td>";
echo " <td>" . $aff['cost'] . "</td>";
echo " </tr>";
}
?>

