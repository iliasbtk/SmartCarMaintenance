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
<div data-role="page">
		<div data-role="header" data-position="fixed">
            <h1>Vehicles Mileage </h1>
			<a href = "main.php" class = "ui-btn ui-corner-all" data-rel = "back">Cancel </a>
		</div>
		<div data-role="main" class="ui-content">
		<?php
		include('connexion.php');
		$vehicle=$_GET['vehicle'];
		$requete="SELECT * FROM vehicle WHERE vehicleName='$vehicle'";
		$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
		$aff=mysqli_fetch_array($execution);
		?>
		<form method="post" action="" data-ajax="false">
			<label><h3><?php echo $aff['vehicleName'];?><h3></label>
			<input type="number" name="updatedmileage" value="<?php echo $aff['currentMileage'];?>"/>
			<input type="submit" name="updateMileage" value="update"/>
			<?php
			if(isset($_POST['updateMileage']))
			{
			$updatedmileage=$_POST['updatedmileage'];
			$req_update="UPDATE vehicle SET currentMileage='$updatedmileage' WHERE vehicleName='$vehicle'";
			$exe_update = $link->query($req_update) or die("Error in the consult.." . mysqli_error($link));
			$url="mileage.php";
			echo $req_update;
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