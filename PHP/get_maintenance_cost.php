<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];

$req= "SELECT vehicleName, maintenanceName, SUM(cost) cumCost
			FROM maintenance 
			WHERE username='$username'
            GROUP BY vehicleName, maintenanceName;";
			
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{
echo " <tr>";
echo " <td>" . $aff['vehicleName'] . "</td>";
echo " <td>" . $aff['maintenanceName'] . "</td>";
echo " <td>" . $aff['cumCost'] . "</td>";
echo " </tr>";
}
?>