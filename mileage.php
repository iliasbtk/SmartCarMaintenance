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
			<a href = "main.php" class = "ui-btn ui-corner-all" >Cancel </a>
		</div>
		<div data-role="main" class="ui-content">
		<?php if(isset($_GET['update']))
		{
			?>
			<h2 style="color:green;">Update was done success</h2>
			<?php
		}
		?>
			<table class="table">
				<thead>
					<tr>
						<th>Vehicle</th>
						<th>Mileage</th>
						<th>Action</th>

					</tr>
				</thead>
				
				<tbody>
					<?php
						include('connexion.php');
						$username= $_SESSION['scm_username'];
						$requete="SELECT * FROM vehicle WHERE username='$username';";
						$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
						while($aff=mysqli_fetch_array($execution))
						{
						?>
									
					<tr>
						
						<td>
						<?php echo $aff['vehicleName'];?>
					 </td>
						<td><?php echo $aff['currentMileage'];?></td>
						<td><a href="updatemileage.php?vehicle=<?php echo $aff['vehicleName'];?>" class="ui-btn"> Update </a></td>
						<?php
						}
						?>
					</tr>
					
				</tbody>
				
				
			</table>
	
			
		</div>
	</div>
</body>
</html>