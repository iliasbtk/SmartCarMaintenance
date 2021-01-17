<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$idV=$_GET['idV'];
$req= "SELECT * FROM vehicle WHERE idV='$idV';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{
echo "<div>";
echo "<label> Registration number </label>";
echo "<input type='text' id='regNum' value =" . $aff['regNum'] . ">";
echo "</div>";
echo "<div>";
echo "<label> Model </label>";
echo "<input type='text' id='model' value =" . $aff['model'] . ">";
echo "</div>";
echo "<div>";
echo "<label> Brand (Make) </label>";
echo "<input type='text' id='brand' value =" . $aff['brand'] . ">";
echo "</div>";
echo "<div>";
echo "<button class='ui-btn' onclick='save_updates();'>Save Changes</button>";

echo "</div>";
}
?>
