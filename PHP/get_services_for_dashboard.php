<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];


$req="SELECT v.vehicleName, s.serviceName, SUM(s.cost) cumServiceCost
			FROM vehicle v INNER JOIN service s
			ON v.vehicleName = s.vehicleName
			WHERE v.username = '$username'
			GROUP BY s.vehicleName, s.serviceName";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{
echo " <tr>";
echo " <td>" . $aff['vehicleName'] . "</td>";
echo " <td>" . $aff['serviceName'] . "</td>";
echo " <td>" . $aff['cumServiceCost'] . "</td>";
echo " </tr>";
}
?>

