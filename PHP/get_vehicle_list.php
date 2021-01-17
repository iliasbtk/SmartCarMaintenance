<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];
$req= "SELECT * FROM vehicle WHERE username='$username';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{
echo " <tr>";
echo " <td>" . $aff['vehicleName'] . "</td>";
echo " <td><input type='number' id=input_" . $aff['idV'] . " value =" . $aff['currentMileage'] . "></td>";
echo " <td><button class='ui-btn' onclick='update_vehicle(this.id);' id=".$aff['idV']." >update</button> </td>";
echo " </tr>";
}
?>
