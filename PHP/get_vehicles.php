<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username=$_GET['username'];
$req= "SELECT * FROM vehicle WHERE username='$username';";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

while($aff=mysqli_fetch_array($sql))
{

echo "<div data-role='collapsible'>";
echo "<h3>" . $aff['vehicleName'] .  "</h3>";
echo "<table class='table align-middle table-dark table-striped'>";
echo " <thead>";
echo " <tr>";
echo " <th>DATA</th>";
echo "	<th>Value</th>";
echo "	</tr>";
echo " </thead>";
echo "<tbody> ";
echo " <tr>";
echo " <td>Registration Number</td>";
echo " <td>" . $aff['regNum'] . "</td>";
echo " </tr>";
echo " <tr>";
echo "<td>Model</td>";
echo "<td>" . $aff['model'] . "</td>";
echo "</tr>";
echo " <tr>";
echo "<td>Current Mileage</td>";
echo "<td>" . $aff['currentMileage'] . "</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<button class='btn btn-primary' onclick='edit_vehicle(this.id);' id=".$aff['idV']." >Edit</button>";
echo "<button class='btn btn-secondary' onclick='delete_vehicle(this.id);' id=".$aff['idV']." >Delete</button>";
echo "</div>";
echo "<br><br>";
}
?>

