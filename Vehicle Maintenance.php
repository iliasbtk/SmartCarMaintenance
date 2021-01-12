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
				<li><a href="Main.php" target="_self"><img src="Pictures/icon-home.png" class="ui-li-icon">Dashboard</a></li>
				<li><a href="Vehicles.php" target="_self"><img src="Pictures/Vehicle.png" class="ui-li-icon">Vehicles</a></li>
				<li><a href="Vehicle Maintenance.php" target="_self"><img src="Pictures/Maintenance.png" class="ui-li-icon">Maintenance</a></li>
				<li><a href="Vehicle Docs.php" target="_self"><img src="Pictures/Documents.png" class="ui-li-icon">Documents</a></li>
				<li><a href="Vehicle Fuel & Service.php" target="_self" style="white-space: normal"><img src="Pictures/FuelService.png" class="ui-li-icon">Servies/Fuel</a></li>
				<li><a href="Statics.php" target="_self"><img src="Pictures/Stats.png" class="ui-li-icon">Statistics/Chart</a></li>
				<li><a href="Map.php" target="_self"><img src="Pictures/Map.png" class="ui-li-icon">Map</a></li>
				<li><a href="Settings.php" target="_self"><img src="Pictures/Settings.png" class="ui-li-icon">Settings</a></li>
				<li><a href="About.php" target="_self"><img src="Pictures/About.png" class="ui-li-icon">About</a></li>
			</ul>
		</div>

		<div data-role="header" data-position="fixed">
            <h1>Vehicle Maintenance</h1>            
			<a href="#myPanel" data-icon="bars" data-position="right" data-rel="dialog">Menu</a>
        </div>
		<div data-role="main" class="ui-content">
			<a href="#updateRequiredMileage" class="ui-btn ui-btn-inline">Update required mileage/time</a>
			<a href="#addMaintenance"><img src="Pictures/icon-plus.png" style="float:right"></a>
				<div id="maintenanceList">
					<table class="table">
					  <thead>
						<tr>
						  <th>Car</th>
						  <th>Maintenance</th>
						  <th>Date</th>
						  <th>Cost</th>
						  <th>Action</th>
						</tr>
					  </thead>
					  <tbody>
						
					  </tbody>
					</table>
				</div>		
		</div>
			
		</div>
		<div data-role="footer" data-position="fixed">
		</div>
	</div>
	<div data-role="page" id="addMaintenance">
		<div data-role="main" class="ui-content">
			<form method="post" action="">
				<div class="ui-field-contain">
					<label for="select-choice-1" class="select">Select Vehicle:</label>
					<select id="select-choice-1" name="vehicleName">
					<?php
						include('connexion.php');
						$requete="SELECT * FROM vehicle";
						$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
						while($aff=mysqli_fetch_array($execution))
						{
					?>
				  	<option><?php echo $aff['model'] . ' ' . $aff['regNum'];?></option>
					<?php
						}
					?>	
					</select>
			    </div>
				<div class="ui-field-contain">
					<label for="select-choice-1" class="select">Select Maintenance:</label>
					<select id="select-choice-1" name="maintenanceName">
				  	    <option>Oil and oil filter</option>
						<option>Air Filter</option>
						<option>Fuel filter</option>
						<option>Battery</option>
						<option>Brake fluid</option>
						<option>Brake pads</option>
						<option>Brake rotors</option>
						<option>Change Tires</option>
						<option>Coolant</option>
						<option>Hoses</option>
						<option>Timing Belt</option>
						<option>Spark plugs</option>
						<option>Wiper blades</option>
						
					</select>
			    </div>
				<div class="ui-field-contain">
					<label for="fullname">Cost: </label>			
					<input type="text" id="fullname">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Date:</label>
					<input type="text" id="fullname">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Current Mileage:</label>
					<input type="text" id="fullname">
				</div>
				<hr>
			    <div>
					<input type="submit" value="Add" name="addMaintenance">
					<input type="submit" value="Cancel">
				</div>
			</form>
		</div>
	</div>
	<div data-role="page" id="updateRequiredMileage">
		<div data-role="main" class="ui-content">
			<form method="post" action="">
				<div class="ui-field-contain">
					<label for="select-choice-1" class="select">Select Vehicle:</label>
					<select id="select-choice-1" name="vehicleName">
					<?php
						include('connexion.php');
						$requete="SELECT * FROM vehicle";
						$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
						while($aff=mysqli_fetch_array($execution))
						{
					?>
				  	<option><?php echo $aff['model'] . ' ' . $aff['regNum'];?></option>
					<?php
						}
					?>	
					</select>
			    </div>
				<div class="ui-field-contain">
					<table class="table">
					  <thead>
						<tr>
						  <th>Maintenance</th>
						  <th>Required mileage</th>
						  <th>required Time</th>
						</tr>
					  </thead>
					  <tbody>					
						<tr>
						  <td>Oil and oil filter</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Air Filter</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Fuel filter</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Battery</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Brake fluid</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Brake pads</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Brake rotors</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Change Tires</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Coolant</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Hoses</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Timing Belt</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Spark plugs</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
						<tr>
						  <td>Wiper blades</td>
						  <td><input type="number"></td>
						  <td><input type="number"></td>
						</tr>
					  </tbody>
					</table>
					
			    <div>
					<input type="submit" value="Update" name="updateRequiredMileageTime">
					<input type="submit" value="Cancel">
				</div>
			</form>
		</div>
	</div>
</body>
</html>





