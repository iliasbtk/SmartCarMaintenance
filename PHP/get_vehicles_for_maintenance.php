<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];
$req= "SELECT * FROM vehicle WHERE username='$username';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

echo "<option></option>";
while($aff=mysqli_fetch_array($sql))
{
echo "<option value=".$aff['vehicleName'].">" . $aff['vehicleName'] . "</option>";
}
?>
