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
	<link rel="stylesheet" href="StyleSheet.css"/>
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
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
            <h1>Settings</h1>            
			<a href="#myPanel" data-icon="bars" data-position="right" data-rel="dialog">Menu</a>
        </div>

		<div data-role="main" class="ui-content">
		
		<?php
			include('connexion.php');
			$username= $_SESSION['scm_username'];
			$distanceUnit="SELECT distanceUnit FROM users WHERE username='$username';";
			$distanceExe = $link->query($distanceUnit) or die("Error in the consult.." . mysqli_error($link));
			$dist=mysqli_fetch_array($distanceExe);
		?>
			<h4>Preferences</h4>
			<form method="post" action="" data-ajax="false">
			<div class="ui-field-contain">
				<label for="distanceUnit" class="select">Unit for Distance:</label>
				<select name="distanceUnit">
			  	    <option value="Miles" <?php if($dist['distanceUnit']=='Miles'){echo 'selected';}?> >Miles</option>
					<option value="Klm" <?php if($dist['distanceUnit']=='Klm'){echo 'selected';}?> >Klm</option>
				</select>
		    </div>
			<div class="ui-field-contain">
				<label for="currency" class="select">Currency:</label>
				<select name="currency">
			  	    <option value="Euro">Euro</option>
					<option value="US Dollars">US Dollars</option>
					<option value="CA Dollars">CA Dollars</option>
					<option value="GBP">GBP</option>
				</select>
		    </div>

			<div class="ui-field-contain">
				<label for="select-choice-1" class="select">Theme:</label>
				<select id="select-choice-1">
			  	    <option value="standard">Theme 1</option>
					<option value="rush">Theme 2</option>
					<option value="rush">Theme 3</option>
				</select>
		    </div>
			<br>
			<hr>
			<br>
			<h4>Notifications</h4>
			<div class="ui-field-contain">
				<label for="select-choice-1" class="select">Sound:</label>
				<select id="select-choice-1">
			  	    <option value="standard">Ring 1</option>
					<option value="rush">Ring 2</option>
					<option value="rush">Ring 3</option>
					<option value="rush">Silent</option>
				</select>
		    </div>
			<div class="ui-field-contain">
				<label for="fullname">Notification Time:</label>
				<input type="text" id="fullname">
			</div>
			<div>
				<input type="submit" value="Save" name="saveSettings">		
			</div>
			<?php
			if(isset($_POST['saveSettings']))
			{	
			$distanceUnit=$_POST['distanceUnit'];
			if($dist['distanceUnit'] == $distanceUnit)
			{
				header('Location: settings.php');
				exit;
			}
			$currency=$_POST['currency'];
			
			$updateSettingsReq="UPDATE users SET distanceUnit='$distanceUnit' WHERE username='$username';";
			$sql = $link->query($updateSettingsReq) or die("Error in the consult.." . mysqli_error($link));	
			
			$selectReq="SELECT * FROM vehicle WHERE username='$username';";
			$execution = $link->query($selectReq) or die("Error in the consult.." . mysqli_error($link));
			
			$vehicles=mysqli_fetch_array($execution);
			$vehicleName=$vehicles['vehicleName'];
			
			if($distanceUnit == 'Miles')
			{	
			$convertDistance1="UPDATE vehicle SET currentMileage=currentMileage * 0.62137119224 WHERE username='$username';";
			$sql = $link->query($convertDistance1) or die("Error in the consult.." . mysqli_error($link));
			
			
			$mileageReq1="UPDATE maintenancelist SET requiredMileage = requiredMileage*0.62137119224 WHERE vehicleName='$vehicleName';";
			$sql = $link->query($mileageReq1) or die("Error in the consult.." . mysqli_error($link));

			if (!headers_sent())
			{    	
				header('Location: settings.php');
				echo'Settings saved';
				exit;
			}	
			else 
			{
				header('Location: settings.php');
				exit;
			}
			}
			else{
			if($distanceUnit == 'Klm')
			{	
			$convertDistance2="UPDATE vehicle SET currentMileage=currentMileage * 1.609344 WHERE username='$username';";
			$sql = $link->query($convertDistance2) or die("Error in the consult.." . mysqli_error($link));
			
			$mileageReq2="UPDATE maintenancelist SET requiredMileage = requiredMileage*1.609344 WHERE vehicleName='$vehicleName';";
			$sql = $link->query($mileageReq2) or die("Error in the consult.." . mysqli_error($link));
			
			if (!headers_sent())
			{    	
				header('Location: settings.php');
				echo'Settings saved';
				exit;
			}	
			else 
			{
				header('Location: settings.php');
				exit;
			}
			}	
			}
			}
			?>
			</form>
			<br>
			<hr>
			<br>
			<h4>Updates</h4>
			<a href="#" class="ui-btn ui-corner-all">Check for Updates</a>
		</div>

		<div data-role="footer" data-position="fixed">
				
		</div>
	</div>
</body>
</html>




