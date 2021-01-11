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
    <div data-role="page" id="main">
		<div data-role="panel" id="myPanel">
			<ul data-role="listview" data-inset="true">
				<li><a href="Main.html" target="_self"><img src="Pictures/icon-home.png" class="ui-li-icon">Dashboard</a></li>
				<li><a href="Vehicles.html" target="_self"><img src="Pictures/Vehicle.png" class="ui-li-icon">Vehicles</a></li>
				<li><a href="Vehicle Maintenance.php" target="_self"><img src="Pictures/Maintenance.png" class="ui-li-icon">Maintenance</a></li>
				<li><a href="Vehicle Docs.html" target="_self"><img src="Pictures/Documents.png" class="ui-li-icon">Documents</a></li>
				<li><a href="Vehicle Fuel & Service.html" target="_self" style="white-space: normal"><img src="Pictures/FuelService.png" class="ui-li-icon">Servies/Fuel</a></li>
				<li><a href="Statics.html" target="_self"><img src="Pictures/Stats.png" class="ui-li-icon">Statistics/Chart</a></li>
				<li><a href="Map.html" target="_self"><img src="Pictures/Map.png" class="ui-li-icon">Map</a></li>
				<li><a href="Settings.html" target="_self"><img src="Pictures/Settings.png" class="ui-li-icon">Settings</a></li>
				<li><a href="About.html" target="_self"><img src="Pictures/About.png" class="ui-li-icon">About</a></li>
			</ul>
		</div>

		<div data-role="header" data-position="fixed">
            <h1>MySmartCarMaintenance</h1>            
			<a href="#myPanel" data-icon="bars" data-position="right" data-rel="dialog">Menu</a>
        </div>

		<div data-role="main" class="ui-content">
			<div id="title">
				<h2>Dashboard</h2> <hr>
			</div>
            <div class="ui-field-contain">
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
            </div>
           
			<hr>
			
			<div data-role="collapsible">
				<h3>Documents</h3>
				<div style="overflow-x:auto;">
					<table class="table">
					  <thead>
						<tr>
						  <th>Car</th>
						  <th>Type</th>
						  <th>Date</th>
						  <th>Cumulated Cost</th>
						</tr>
					  </thead>
					  <tbody>
					  
					  </tbody>
					</table>
				</div>
			</div>
			<div data-role="collapsible">
				<h3>Maintenance</h3>
				<div style="overflow-x:auto;">
					<table>
					  <thead>
						<tr>
						  <th>Car</th>
						  <th>Type</th>
						  <th>Mileage</th>
						  <th>Current Mileage</th>
						  <th>Cumulated Cost</th>
						</tr>
					  </thead>
					  <tbody>

					  </tbody>
					</table>
				</div>
			</div>
			<div data-role="collapsible">
				<h3>Services</h3>
				<div style="overflow-x:auto;">
					<table>
					  <thead>
						<tr>
						  <th>Car</th>
						  <th>Type</th>
						  <th>Date</th>
						  <th>Cumulated Cost</th>
						</tr>
					  </thead>
					  <tbody>
						
					  </tbody>
					</table>
				</div>
			</div>			
			<a href="#updatingMileage" class="ui-btn ui-btn-inline">Update vehicles mileage</a>
		</div>

		<div data-role="footer" data-position="fixed">
				
		</div>
	</div>
	<div data-role="page" id="updatingMileage">
		<div data-role="header" data-position="fixed">
            <h1>Vehicles Mileage </h1>
		</div>
		<div data-role="main" class="ui-content">
			<table class="table">
				<thead>
					<tr>
						<th>Vehicle</th>
						<th>Mileage</th>
						<th>Action</th>
					</tr>
				</thead>
				<form method="post" action="./updateMileage.php">
				<?php
				include('connexion.php');
				$requete="SELECT * FROM vehicle";
				$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
				while($aff=mysqli_fetch_array($execution))
				{
				?>
				<tbody>
									
					<tr>
						<td>
						<?php echo $aff['model'] . ' ' . $aff['regNum'];?>
						<input type="hidden" name="idV" value="<?php echo $aff['idV'];?>"> </td>
						<td><input type="number" name="updatedMileage" value="<?php echo $aff['currentMileage'];?>"> </td>
						<td><input type="submit" value="Update" name="submit1"></td>
					</tr>
					
				</tbody>
				<?php
				}
				?>
		
				</form>
			</table>
	
			
		</div>
	</div>
</body>
</html>




