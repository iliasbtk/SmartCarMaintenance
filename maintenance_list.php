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
        <h1>Update Required Mileage</h1>            
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
						  <td><input type="number" name="oilFilterMileage"></td>
						  <td><input type="number" name="oilFilterTime"></td>
						</tr>
						<tr>
						  <td>Air Filter</td>
						  <td><input type="number" name="airFilterMileage"></td>
						  <td><input type="number" name="airFilterTime"></td>
						</tr>
						<tr>
						  <td>Fuel filter</td>
						  <td><input type="number" name="fuelFilterMileage"></td>
						  <td><input type="number" name="fuelFilterTime"></td>
						</tr>
						<tr>
						  <td>Battery</td>
						  <td><input type="number" name="batteryMileage"></td>
						  <td><input type="number" name="batteryTime"></td>
						</tr>
						<tr>
						  <td>Brake fluid</td>
						  <td><input type="number" name="brakeFluidMileage"></td>
						  <td><input type="number" name="brakeFluidTime"></td>
						</tr>
						<tr>
						  <td>Brake pads</td>
						  <td><input type="number" name="brakePadsMileage"></td>
						  <td><input type="number" name="brakePadsTime"></td>
						</tr>
						<tr>
						  <td>Brake rotors</td>
						  <td><input type="number" name="brakeRotorsMileage"></td>
						  <td><input type="number" name="brakeRotorsTime"></td>
						</tr>
						<tr>
						  <td>Change Tires</td>
						  <td><input type="number" name="changeTiresMileage"></td>
						  <td><input type="number" name="changeTiresTime"></td>
						</tr>
						<tr>
						  <td>Coolant</td>
						  <td><input type="number" name="coolantMileage"></td>
						  <td><input type="number" name="coolantTime"></td>
						</tr>
						<tr>
						  <td>Hoses</td>
						  <td><input type="number" name="hosesMileage"></td>
						  <td><input type="number" name="hosesTime"></td>
						</tr>
						<tr>
						  <td>Timing Belt</td>
						  <td><input type="number" name="timingBeltMileage"></td>
						  <td><input type="number" name="timingBeltTime"></td>
						</tr>
						<tr>
						  <td>Spark plugs</td>
						  <td><input type="number" name="sparkPlugsMileage"></td>
						  <td><input type="number" name="sparkPlugsTime"></td>
						</tr>
						<tr>
						  <td>Wiper blades</td>
						  <td><input type="number" name="wiperBladesMileage"></td>
						  <td><input type="number" name="wiperBladesTime"></td>
						</tr>
					  </tbody>
					</table>
					
			    <div>
					<input type="submit" value="Update" name="updateRequiredMileageTime">
					<input type="reset" value="Reset">
				</div>
				<?php
				if(isset($_POST['updateRequiredMileageTime']))
				{	
					$selectedVehicle=$_POST['selectedVehicleName'];
					$oilFilterMileage=$_POST['oilFilterMileage'];
					$oilFilterTime=$_POST['oilFilterTime'];
					$airFilterMileage=$_POST['airFilterMileage'];
					$airFilterTime=$_POST['airFilterTime'];
					$fuelFilterMileage=$_POST['fuelFilterMileage'];
					$fuelFilterTime=$_POST['fuelFilterTime'];
					$batteryMileage=$_POST['batteryMileage'];
					$batteryTime=$_POST['batteryTime'];
					$brakeFluidMileage=$_POST['brakeFluidMileage'];
					$brakeFluidTime=$_POST['brakeFluidTime'];
					$brakePadsMileage=$_POST['brakePadsMileage'];
					$brakePadsTime=$_POST['brakePadsTime'];
					$brakeRotorsMileage=$_POST['brakeRotorsMileage'];
					$brakeRotorsTime=$_POST['brakeRotorsTime'];
					$changeTiresMileage=$_POST['changeTiresMileage'];
					$changeTiresTime=$_POST['changeTiresTime'];
					$coolantMileage=$_POST['coolantMileage'];
					$coolantTime=$_POST['coolantTime'];
					$hosesMileage=$_POST['hosesMileage'];
					$hosesTime=$_POST['hosesTime'];
					$timingBeltMileage=$_POST['timingBeltMileage'];
					$timingBeltTime=$_POST['timingBeltTime'];
					$sparkPlugsMileage=$_POST['sparkPlugsMileage'];
					$sparkPlugsTime=$_POST['sparkPlugsTime'];
					$wiperBladesMileage=$_POST['wiperBladesMileage'];
					$wiperBladesTime=$_POST['wiperBladesTime'];
					
					$updateRequiredMileageTime="INSERT INTO maintenancelist (vehicleName, maintenanceName, requiredMileage, requiredTime) 
							VALUES ('$selectedVehicle', 'Oil and oil filter', '$oilFilterMileage', '$oilFilterTime'), 
									('$selectedVehicle', 'Air Filter', '$airFilterMileage', '$airFilterTime'),
									('$selectedVehicle', 'Fuel filter', '$fuelFilterMileage', '$fuelFilterTime'),
									('$selectedVehicle', 'Battery', '$batteryMileage', '$batteryTime'),
									('$selectedVehicle', 'Brake fluid', '$brakeFluidMileage', '$brakeFluidTime'),
									('$selectedVehicle', 'Brake pads', '$brakePadsMileage', '$brakePadsTime'),
									('$selectedVehicle', 'Brake rotors', '$brakeRotorsMileage', '$brakeRotorsTime'),
									('$selectedVehicle', 'Change Tires', '$changeTiresMileage', '$changeTiresTime'),
									('$selectedVehicle', 'Coolant', '$coolantMileage', '$coolantTime'),
									('$selectedVehicle', 'Hoses', '$hosesMileage', '$hosesTime'),
									('$selectedVehicle', 'Timing Belt', '$timingBeltMileage', '$timingBeltTime'),
									('$selectedVehicle', 'Spark plugs', '$sparkPlugsMileage', '$sparkPlugsTime'),
									('$selectedVehicle', 'Wiper blades', '$wiperBladesMileage', '$wiperBladesTime');";
					$sql = $link->query($updateRequiredMileageTime) or die("Error in the consult.." . mysqli_error($link));
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