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
            <h1>Vehicles Mileage </h1>
		</div>
		<div data-role="main" class="ui-content">
			<table class="table">
				<thead>
					<tr>
						<th>Vehicle</th>
						<th>Mileage</th>

					</tr>
				</thead>
				
				<tbody>
									
					<tr>
						<form method="post" action="" data-ajax="false">
						<?php
						include('connexion.php');
						$requete="SELECT * FROM vehicle";
						$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
						while($aff=mysqli_fetch_array($execution))
						{
						?>
						<td>
						<?php echo $aff['vehicleName'];?>
						<input type="hidden" name="idV" value="<?php echo $aff['idV'];?>"> </td>
						<td><input type="number" name="updatedMileage" value="<?php echo $aff['currentMileage'];?>"> </td>
						<td><input type="submit" value="Update" name="submit"></td>
						</form>
					</tr>
					
				</tbody>
				<?php
				if(isset($_POST['submit']))
				{
					$mileageUpdated=$_POST['updatedMileage'];
					$vehicle=$_POST['idv'];
					
					$reqUpdateMileage="UPDATE vehicle SET currentMileage = '$mileageUpdated' WHERE idV='$vehicle'";
					$sql = $link->query($reqUpdateMileage) or die("Error in the consult.." . mysqli_error($link));
					$url="mileage.php";
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
				}
				?>
				
			</table>
	
			
		</div>
	</div>
</body>
</html>