<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];


$req="SELECT * FROM service s
	INNER JOIN vehicle v
	ON s.vehicleName = v.vehicleName
	WHERE v.username='$username';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{
echo " <tr>";
echo " <td>" . $aff['vehicleName'] . "</td>";
echo " <td>" . $aff['serviceName'] . "</td>";
echo " <td>" . $aff['date'] . "</td>";
echo " <td>" . $aff['cost'] . "</td>";
echo " <td><button class='ui-btn' onclick='delete_service(this.id);' id=" . $aff['idS'] . " >Delete</button> </td>";
echo " </tr>";
}
?>


