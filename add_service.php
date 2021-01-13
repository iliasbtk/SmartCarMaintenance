<!DOCTYPE html>
<html>
<head> 
    <title>SmartCarMaintenance Add Service</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>	
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body>
<div data-role="page" id="addService">
		<div data-role="header" data-position="fixed">
            <h1>Add a Service </h1>
			<a href = "vehicle_fuel_and_service.php" class = "ui-btn ui-corner-all" data-rel = "back">Cancel </a>
		</div>
		<div data-role="main" class="ui-content">
			<form method="post" action="" data-ajax="false">
				<div class="ui-field-contain">
					<label for="selectedVehicleName" class="select">Select Vehicle:</label>
					<select name="selectedVehicleName">
					<?php
						include('connexion.php');
						$requete="SELECT * FROM vehicle";
						$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
						while($aff=mysqli_fetch_array($execution))
						{
					?>
					<option><?php echo $aff['vehicleName']?></option>
					<?php
						}
					?>	
					</select>
				</div>
				<div class="ui-field-contain">
					<label for="selectedServiceName" class="select">Select Service:</label>
					<select name="selectedServiceName">
				  	    <option value="Fuel">Fuel</option>
						<option value="Car Wash">Car Wash</option>
						<option value="Parking">Parking</option>
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
				<hr>
			    <div class="ui-grid-c">
					<input type="submit" value="Add Service" name="addService">
					<input type="reset" value="reset">
				</div>
				
				<?php
				if(isset($_POST['addService']))
				{
					$selectedVehicle=$_POST['selectedVehicleName'];
					$selectedService=$_POST['selectedServiceName'];
					$cost=$_POST['cost'];
					$date=$_POST['date'];
					
					$addServiceReq="INSERT INTO service (vehicleName, serviceName, cost, date) VALUES ('$selectedVehicle', '$selectedService','$cost','$date')";
					$sql = $link->query($addServiceReq) or die("Error in the consult.." . mysqli_error($link));		
					$url="vehicle_fuel_and_service.php";
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
						echo '<meta http-equiv="refresh" content="0;url='.$url.'"/>';
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