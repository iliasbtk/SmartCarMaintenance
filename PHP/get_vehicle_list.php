<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];
$req= "SELECT * FROM vehicle WHERE username='$username';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{
echo " <div>";
echo " <label for=input_" . $aff['idV'] . ">" . $aff['vehicleName'] . "</label>";
echo " <input type='number' id=input_" . $aff['idV'] . " value =" . $aff['currentMileage'] . ">";
echo " <button class='ui-btn' onclick='update_vehicle(this.id);' id=".$aff['idV']." >update</button>";
echo " </div>";
}
?>
