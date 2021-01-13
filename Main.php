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
    <title>SmartCarMaintenance Main</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
    	<h1>MySmartCarMaintenance</h1>            
		<a href="#myPanel" data-icon="bars" data-position="right" data-rel="dialog">Menu</a>
    </div>
		
	<div data-role="main" class="ui-content">
		<div>
			<h2>Dashboard</h2> <hr>
		</div>
   <!--     <div class="ui-field-contain">
                <label for="select-native-1">Vehicles</label>
                <select id="select-native-1"  multiple data-native-menu="false" data-mini="true">
					<option selected></option>
                    <option>Car 1</option>
                    <option>Car 2</option>
                    <option>The 3rd Option</option>
                    <option>The 4th Option</option>
					<option>The 1st Option</option>
                    <option>The 2nd Option</option>
                    <option>The 3rd Option</option>
                    <option>The 4th Option</option>
                </select>
            </div>     "Filter"     -->
           
			
		<div data-role="collapsible">
			<h3>Documents</h3>
			<table class="table">
			<thead>
			<tr>
				<th>Vehicle</th>
				<th>Document</th>
				<th>expiry date</th>
				<th>Cumulated Cost</th>
			</tr>
			</thead>
			<tbody>
			<?php
				include('connexion.php');
				$username= $_SESSION['scm_username'];
				$documentRequest="SELECT v.vehicleName, d.documentName, d.expiryDate, SUM(d.cost) cumDocCost
									FROM vehicle v INNER JOIN document d
									ON v.vehicleName = d.vehicleName
									WHERE v.username= '$username'
									GROUP BY d.documentName";			
				$execution = $link->query($documentRequest) or die("Error in the consult.." . mysqli_error($link));
				while($aff=mysqli_fetch_array($execution))
				{
			?>
			<tr>
				<td><?php echo $aff['vehicleName'];?></td>
				<td><?php echo $aff['documentName'];?></td>
				<td><?php echo $aff['expiryDate'];?></td>
				<td><?php echo $aff['cumDocCost'];?></td>			
			</tr>		 
			<?php
				}
			?>
			</tbody>
			</table>
		</div>
		<div data-role="collapsible">
			<h3>Maintenance</h3>
			<table class="table">
			<thead>
			<tr>
				<th>Car</th>
				<th>Type</th>
				<th>next mileage/date</th>
				<th>Current Mileage</th>
				<th>Cumulated Cost</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$maintenanceRequest="SELECT v.vehicleName, m.maintenanceName, ml.requiredMileage, v.currentMileage, SUM(m.cost) cumMainCost
									FROM vehicle v INNER JOIN maintenance m
									ON v.vehicleName = m.vehicleName
									INNER JOIN maintenancelist ml
									ON m.maintenanceName = ml.maintenanceName
									GROUP BY m.maintenanceName";			
			$execution = $link->query($maintenanceRequest) or die("Error in the consult.." . mysqli_error($link));
			while($aff=mysqli_fetch_array($execution))
			{
			?>
			<tr>
				<td><?php echo $aff['vehicleName'];?></td>
				<td><?php echo $aff['maintenanceName'];?></td>
				<td><?php echo $aff['requiredMileage'] + $aff['currentMileage'];?></td>
				<td><?php echo $aff['currentMileage'];?></td>
				<td><?php echo $aff['cumMainCost'];?></td>	
			</tr>
			<?php
			}
			?>
			</tbody>
			</table>
		</div>
		<div data-role="collapsible">
			<h3>Services</h3>
			<table class="table">
			<thead>
			<tr>
				<th>Vehicle</th>
				<th>Service</th>
				<th>Cumulated Cost</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$maintenanceRequest="SELECT v.vehicleName, s.serviceName, SUM(s.cost) cumServiceCost
								FROM vehicle v INNER JOIN service s
								ON v.vehicleName = s.vehicleName
								GROUP BY s.serviceName";			
			$execution = $link->query($maintenanceRequest) or die("Error in the consult.." . mysqli_error($link));
			while($aff=mysqli_fetch_array($execution))
			{
			?>
			<tr>
				<td><?php echo $aff['vehicleName'];?></td>
				<td><?php echo $aff['serviceName'];?></td>
				<td><?php echo $aff['cumServiceCost']?></td>
			</tr>
			<?php
			}
			?>
			</tbody>
			</table>
		</div>			
		<a href="Mileage.php" class="ui-btn ui-btn-inline" >Update vehicles mileage</a>
	</div>

		<div data-role="footer" data-position="fixed">
				
		</div>
	</div>
	
</body>
</html>




