<?php
	ob_start();
	session_start();
	if (!isset($_SESSION['scm_username'])){
		header("Location: login.php");	
	}
	
	ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head> 
    <title>SmartCarMaintenance Vehicles</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"/>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script>

	</script>
	
</head>



<body>
    <div data-role="page">
		<div data-role="panel" id="myPanel">
			<ul data-role="listview" data-inset="true">
				<li><a href="main.php" target="_self"><img src="Pictures/icon-home.png" class="ui-li-icon">Dashboard</a></li>
				<li><a href="vehicles.php" target="_self"><img src="Pictures/Vehicle.png" class="ui-li-icon">Vehicles</a></li>
				<li><a href="vehicle_maintenance.php" target="_self"><img src="Pictures/Maintenance.png" class="ui-li-icon">Maintenance</a></li>
				<li><a href="vehicle_docs.php" target="_self"><img src="Pictures/Documents.png" class="ui-li-icon">Documents</a></li>
				<li><a href="vehicle_fuel_and_service.php" target="_self" style="white-space: normal"><img src="Pictures/FuelService.png" class="ui-li-icon">Servies/Fuel</a></li>
				<li><a href="statics.php" target="_self"><img src="Pictures/Stats.png" class="ui-li-icon">Statistics/Chart</a></li>
				<li><a href="map.php" target="_self"><img src="Pictures/Map.png" class="ui-li-icon">Map</a></li>
				<li><a href="settings.php" target="_self"><img src="Pictures/Settings.png" class="ui-li-icon">Settings</a></li>
				<li><a href="about.php" target="_self"><img src="Pictures/About.png" class="ui-li-icon">About</a></li>
				<li><a href="logout.php" target="_self"><img src="Pictures/icon-home.png" class="ui-li-icon">Logout</a></li>
			</ul>
		</div>
	
		<div data-role="header" data-position="fixed">
         	<h1>My Vehicles </h1>            
			<a href="#myPanel" data-icon="bars" data-position="right" data-rel="dialog">Menu</a>
        </div>

		<div data-role="main" class="ui-content">

			<a href="add_vehicle.php" ><img src="Pictures/icon-plus.png" style="float:right"></a>
			<br>
			<br>
			<br>
			<br>
			<?php
				include('connexion.php');
				$username= $_SESSION['scm_username'];
				$requete="SELECT * FROM vehicle WHERE username='$username';";
				$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
				while($aff=mysqli_fetch_array($execution))
				{
			?>
			<div data-role="collapsible">
				<a href="delete_vehicle.php?vehicle=<?php echo $aff['vehicleName'];?>" class="ui-btn">Delete <?php echo $aff['vehicleName'];?></a>
				<a href="update_vehicle.php?vehicle=<?php echo $aff['vehicleName'];?>" class="ui-btn">Update <?php echo $aff['vehicleName'];?></a>
				<h3><?php echo $aff['vehicleName'];?> </h3>
				<table class="table">
				<thead>
					<tr>
						<th>DATA</th>
						<th>Value</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Registration Number</td>
						<td><?php echo $aff['regNum'];?></td>
					</tr>
					<tr>
						<td>Model</td>
						<td><?php echo $aff['model'];?></td>
					</tr>
					<tr>
						<td>Brand</td>
						<td><?php echo $aff['brand'];?></td>
					</tr>
					<tr>
						<td>Fuel Type</td>
						<td><?php echo $aff['fuelType'];?></td>
					</tr>
					<tr>
						<td>Date of Aquisition</td>
						<td><?php echo $aff['dateAquisition'];?></td>
					</tr>
					<tr>
						<td>Year of Manufacture</td>
						<td><?php echo $aff['manufactureYear'];?></td>
					</tr>
					<tr>
						<td>MOT Expiry Date</td>
						<td><?php echo $aff['motExpiryDate'];?></td>
					</tr>
					<tr>
						<td>Tax Due Date</td>
						<td><?php echo $aff['taxDueDate'];?></td>
					</tr>
					<tr>
						<td>Insurance Expiry Date</td>
						<td><?php echo $aff['insuranceExpiryDate'];?></td>
					</tr>
					<tr>
						<td>Current Mileaage</td>
						<td><?php echo $aff['currentMileage'];?></td>
					</tr>
				</tbody>
				</table>
			</div>
			<?php
				}
			?>				
		</div>
		<div data-role="footer" data-position="fixed">			
		</div>
	</div>

</body>
</html>



