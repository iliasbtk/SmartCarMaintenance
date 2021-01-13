<!DOCTYPE html>
<html>
<head> 
    <title>SmartCarMaintenance Main</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

</head>

<body>
<?php
$oldVehicleName=$_GET['vehicle'];
include('connexion.php');
$req="SELECT * FROM vehicle WHERE vehicleName='$oldVehicleName'";
		$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
		$aff=mysqli_fetch_array($sql);

?>
<div data-role="page">
		<div data-role="header" data-position="fixed">
            <h1>Edit Vehicle <?php echo $aff['vehicleName'];?> </h1>
			<a href = "vehicles.php" class = "ui-btn ui-corner-all" data-rel = "back">Cancel </a>
		</div>
		<div data-role="main" class="ui-content">
			
			<form method="post" action="" data-ajax="false">
				<div class="ui-field-contain">
					<label for="brand">Make (Brand):</label>
					<input class="disabledForm" type="text" id="brand" name="brand" value=<?php echo $aff['brand'];?>>
				</div>
				<div class="ui-field-contain">
					<label for="fuelType">Fuel type:</label>
					<input class="disabledForm" type="text" id="fuelType" name="fuelType" value=<?php echo $aff['fuelType'];?>>
				</div>
				<div class="ui-field-contain">
					<label for="dateAquisition">Date of acquisition:</label>
					<input class="disabledForm" type="date" id="dateAquisition" name="dateAquisition" value=<?php echo $aff['dateAquisition'];?>>
				</div>
				<div class="ui-field-contain">
					<label for="manufactureYear">Year of manufacture:</label>
					<input class="disabledForm" type="number" id="manufactureYear" name="manufactureYear" value=<?php echo $aff['manufactureYear'];?>>
				</div>
				<div class="ui-field-contain">
					<label for="motExpiryDate">MOT expiry date:</label>
					<input class="disabledForm" type="date" id="motExpiryDate" name="motExpiryDate" value=<?php echo $aff['motExpiryDate'];?>>
				</div>
				<div class="ui-field-contain">
					<label for="taxDueDate">Tax due date:</label>
					<input class="disabledForm" type="date" id="taxDueDate" name="taxDueDate" value=<?php echo $aff['taxDueDate'];?>>
				</div>
				<div class="ui-field-contain">
					<label for="insuranceExpiryDate">Insurance expiry date:</label>
					<input class="enabledForm" type="date" id="insuranceExpiryDate" name="insuranceExpiryDate" value=<?php echo $aff['insuranceExpiryDate'];?>>
				</div>
				<div class="ui-field-contain">
					<label for="currentMileage">Current mileage:</label>
					<input class="enabledForm" type="number" id="currentMileage" name="currentMileage" value=<?php echo $aff['currentMileage'];?>>
			    </div>
				<hr>
			    <div>
					<input type="submit" value="Update Vehicle" name="updateVehicle">		
					<input type="reset" value="Reset">
				</div>
				
	<?php
	if(isset($_POST['updateVehicle']))
	{
		
		$regNum=$_POST['regNum'];
		$model=$_POST['model'];
		$vehicleName= $model . ' ' . $regNum;
		$brand=$_POST['brand'];
		$fuelType=$_POST['fuelType'];
		$dateAquisition=$_POST['dateAquisition'];
		$manufactureYear=$_POST['manufactureYear'];
		$motExpiryDate=$_POST['motExpiryDate'];
		$taxDueDate=$_POST['taxDueDate'];
		$insuranceExpiryDate=$_POST['insuranceExpiryDate'];
		$currentMileage=$_POST['currentMileage'];
		
		$req_dupli="SELECT * FROM vehicle WHERE vehicleName='$vehicleName'";
		$exe_dupli = $link->query($req_dupli) or die("Error in the consult.." . mysqli_error($link));
		$duplicate=mysqli_num_rows($exe_dupli);
		echo $oldVehicleName;
		
		$updateInsurReq="UPDATE document SET  expiryDate='$insuranceExpiryDate' WHERE vehicleName='$oldVehicleName' AND documentName = 'Insurance';";
		$updateMOTReq="UPDATE document SET  expiryDate='$motExpiryDate' WHERE vehicleName='$oldVehicleName' AND documentName = 'MOT';";
		$updateTaxReq="UPDATE document SET  expiryDate='$taxDueDate' WHERE vehicleName='$oldVehicleName' AND documentName = 'Tax';";
		
		$sql = $link->query($updateInsurReq) or die("Error in the consult.." . mysqli_error($link));	
		$sql = $link->query($updateMOTReq) or die("Error in the consult.." . mysqli_error($link));	
		$sql = $link->query($updateTaxReq) or die("Error in the consult.." . mysqli_error($link));	
		
		$updateVehicleReq="UPDATE vehicle SET brand='$brand', fuelType='$fuelType', dateAquisition='$dateAquisition',
												manufactureYear='$manufactureYear', motExpiryDate='$motExpiryDate', taxDueDate='$taxDueDate',
												insuranceExpiryDate='$insuranceExpiryDate', currentMileage='$currentMileage' WHERE vehicleName='$oldVehicleName';";
		$sql = $link->query($updateVehicleReq) or die("Error in the consult.." . mysqli_error($link));
		$url="vehicles.php";

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