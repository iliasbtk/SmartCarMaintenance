<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];


$req="SELECT * FROM document d
			INNER JOIN vehicle v
			ON d.vehicleName = v.vehicleName
			WHERE v.username='$username';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));



while($aff=mysqli_fetch_array($sql))
{
echo " <tr class='table-Secondary'>";
echo " <td>" . $aff['vehicleName'] . "</td>";
echo " <td>" . $aff['documentName'] . "</td>";
echo " <td>" . $aff['expiryDate'] . "</td>";
echo " </tr>";
}
?>

