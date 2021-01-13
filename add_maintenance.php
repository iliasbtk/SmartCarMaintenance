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
	<div data-role="header" data-position="fixed">
        <h1>Add Maintenance</h1>            
		<a href = "vehicle_maintenance.php" class = "ui-btn ui-corner-all" data-rel = "back">Cancel </a>
    </div>
	<div data-role="main" class="ui-content">
		<form method="post" action="" data-ajax="false">
			<div class="ui-field-contain">
				<label for="select-choice-1" class="select">Select Vehicle:</label>
				<select id="select-choice-1" name="selectedVehicleName">
				<?php
					include('connexion.php');
					$requete="SELECT * FROM vehicle";
					$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
					while($aff=mysqli_fetch_array($execution))
					{
				?>
			 	<option><?php echo $aff['model'] . ' ' . $aff['regNum']?></option>
				<?php
					}
				?>	
				</select>
		    </div>
			<div class="ui-field-contain">
				<label for="select-choice-1" class="select">Select Maintenance:</label>
				<select id="select-choice-1" name="selectedMaintenanceName">
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
				<label for="cost">Cost: </label>			
				<input type="number" name="cost">
			</div>
			<div class="ui-field-contain">
				<label for="date">Date:</label>
				<input type="date" name="date">
			</div>
			<div class="ui-field-contain">
				<label for="currentMileage">Current Mileage:</label>
				<input type="number" name="currentMileage">
			</div>
			<hr>
		    <div>
				<input type="submit" value="Add" name="addMaintenance">
				<input type="reset" value="Reset">
			</div>
			<?php

			if(isset($_POST['addMaintenance']))
			{
				$selectedVehicle=$_POST['selectedVehicleName'];
				$selectedMaintenance=$_POST['selectedMaintenanceName'];
				$cost=$_POST['cost'];
				$date=$_POST['date'];
				$currentMileage=$_POST['currentMileage'];
				
				
				$updateMileageReq="UPDATE Vehicle SET currentMileage = '$currentMileage' WHERE vehicleName = '$selectedVehicle'";
				$sql = $link->query($updateMileageReq) or die("Error in the consult.." . mysqli_error($link));
			
				$addMaintenanceReq="INSERT INTO maintenance(vehicleName, maintenanceName, cost, date) VALUES ('$selectedVehicle', '$selectedMaintenance','$cost','$date')";
				$sql = $link->query($addMaintenanceReq) or die("Error in the consult.." . mysqli_error($link));
				
				
				$url="vehicle_maintenance.php";

				if (!headers_sent())
				{    
					header('Location: '.$url);
					exit;
				}
				else
				{  
					echo '<script type="text/javascript">';
					echo 'window.location.href="'.$url.'";';
					echo '</script>';
					echo '<noscript>';
					echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
					echo '</noscript>'; 
					exit;
				}  
			}
			?>
		</form>
	</div>
</div>
</body>
</html>