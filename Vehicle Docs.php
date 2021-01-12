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
            <h1>Vehicle Documents</h1>            
			<a href="#myPanel" data-icon="bars" data-position="right" data-rel="dialog">Menu</a>
        </div>

		<div data-role="main" class="ui-content">
			<a href="#addDoc"><img src="Pictures/icon-plus.png" style="float:right"></a>	
			<br>
			<br>
			<br>
			<br>
			<div data-role="collapsible">
				<h3>Driver License</h3>
				<table class="table">
					<thead>
						<tr>
						  <th>License Number</th>
						  <th>Expiry Date</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
					</table>
			</div>
			<div data-role="collapsible">
				<h3>Insurance</h3>
					<table class="table">
					  <thead>
						<tr>
						  <th>Car</th>
						  <th>Date</th>
						  <th>Cost</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>W102-234-456</td>
						  <td>DVLA</td>
						  <td>DVLA</td>
						</tr>
						<tr>
						  <td>Type A</td>
						  <td>DVLA</td>
						  <td>DVLA</td>
						</tr>
					  </tbody>
					</table>
			</div>
			<div data-role="collapsible">
				<h3>MOT</h3>
					<table class="table">
					  <thead>
						<tr>
						  <th>Car</th>
						  <th>Date</th>
						  <th>Cost</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>W102-234-456</td>
						  <td>DVLA</td>
						  <td>DVLA</td>
						</tr>
						<tr>
						  <td>Type A</td>
						  <td>DVLA</td>
						  <td>DVLA</td>
						</tr>
					  </tbody>
					</table>
			</div>
			<div data-role="collapsible">
				<h3>Tax</h3>
					<table class="table">
					  <thead>
						<tr>
						  <th>Car</th>
						  <th>Date</th>
						  <th>Cost</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>W102-234-456</td>
						  <td>DVLA</td>
						  <td>DVLA</td>
						</tr>
						<tr>
						  <td>Type A</td>
						  <td>DVLA</td>
						  <td>DVLA</td>
						</tr>
					  </tbody>
					</table>
			</div>
			<br>
			<br>
		</div>

		<div data-role="footer" data-position="fixed">
				
		</div>
	</div>
	<div data-role="page" id="addDoc">
		<div data-role="header" data-position="fixed">
            <h1>Add a Document </h1>
		</div>
		<div data-role="main" class="ui-content">
			<form method="post" action="">
				<div class="ui-field-contain">
					<label for="select-choice-1" class="select">Select Document:</label>
					<select id="select-choice-1">
				  	    <option value="standard">Insurance</option>
						<option value="rush">Tax</option>
						<option value="express">Driver licence</option>
						<option value="overnight">MOT</option>
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
					<label for="fullname">Expiry date:</label>
					<input type="text" id="fullname">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Name: </label>
					<input type="text" id="fullname" disabled>
				</div>
				<hr>
			    <div>
					<input type="submit" value="Add Document">
					<input type="submit" value="DVLA Update"> <!--May be removed-->
					<input type="submit" value="Cancel">
				</div>
			</form>
		</div>
	</div>
</body>
</html>





