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
	<script>
	$(document).ready(function(){
	var switchStatus = true;
	$("#updateFromDVLA").hide();
	$("#switchDVLA").on('change', function() {
		if ($(this).is(':checked')) {
			switchStatus = $(this).is(':checked');
			$(".disabledForm").prop("disabled", true);
			$('.disabledForm').val('');
			$("#updateFromDVLA").show();
		}
		else {
		    switchStatus = $(this).is(":checked");
		    $(".disabledForm").prop("disabled", false);
		    $("#updateFromDVLA").hide();
		}
	});	

	});
	</script>
	<script>	
	function goBackToVehiclesPage()
		{
			$.mobile.changePage("Vehicles.php");
		}
	</script>
</head>

<body>
<div data-role="page">
		<div data-role="header" data-position="fixed">
            <h1>Add a Vehicle </h1>
			<a href = "Vehicles.php" class = "ui-btn ui-corner-all" data-rel = "back">Cancel </a>
		</div>
		<div data-role="main" class="ui-content">
			<div>
				<label for="switch">Extract Data from DVLA?</label>
				<input type="checkbox" data-role="flipswitch" name="switch" id="switchDVLA" data-on-text="Yes" data-off-text="No">
				<button class="ui-btn ui-btn-inline" id="updateFromDVLA">Update from DVLA</button>
	
			</div>
			<form method="post" action="">
			    <div class="ui-field-contain">
					<label for="fullname" >Registration number: </label>			
					<input class="disabledForm" type="text" id="regNum" name="regNum">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Model:</label>
					<input class="enabledForm" type="text" id="model" name="model">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Make (Brand):</label>
					<input class="disabledForm" type="text" id="brand" name="brand">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Fuel type:</label>
					<input class="disabledForm" type="text" id="fuelType" name="fuelType">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Date of acquisition:</label>
					<input class="disabledForm" type="date" id="dateAquisition" name="dateAquisition">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Year of manufacture:</label>
					<input class="disabledForm" type="number" id="manufactureYear" name="manufactureYear">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">MOT expiry date:</label>
					<input class="disabledForm" type="date" id="motExpiryDate" name="motExpiryDate">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Tax due date:</label>
					<input class="disabledForm" type="date" id="taxDueDate" name="taxDueDate">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Insurance expiry date:</label>
					<input class="enabledForm" type="date" id="insuranceExpiryDate" name="insuranceExpiryDate">
				</div>
				<div class="ui-field-contain">
					<label for="fullname">Current mileage:</label>
					<input class="enabledForm" type="number" id="currentMileage" name="currentMileage">
			    </div>
				<hr>
			    <div>
					<input type="submit" value="Add" name="add">		
					<input type="reset" value="Reset">
					
					
				</div>
				
	<?php
	include('connexion.php');
	if(isset($_POST['add']))
	{
		$regNum=$_POST['regNum'];
		$model=$_POST['model'];
		$brand=$_POST['brand'];
		$fuelType=$_POST['fuelType'];
		$dateAquisition=$_POST['dateAquisition'];
		$manufactureYear=$_POST['manufactureYear'];
		$motExpiryDate=$_POST['motExpiryDate'];
		$taxDueDate=$_POST['taxDueDate'];
		$insuranceExpiryDate=$_POST['insuranceExpiryDate'];
		$currentMileage=$_POST['currentMileage'];
		
		$req="INSERT INTO vehicle(regNum, model, brand, fuelType, dateAquisition, manufactureYear, motExpiryDate, taxDueDate, insuranceExpiryDate, currentMileage) VALUES ('$regNum', '$model','$brand',
			'$fuelType', '$dateAquisition', '$manufactureYear','$motExpiryDate','$taxDueDate','$insuranceExpiryDate','$currentMileage')";
		$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
		$url="Vehicles.php";

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