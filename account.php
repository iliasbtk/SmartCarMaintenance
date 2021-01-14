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
    <title>SmartCarMaintenance Account</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="StyleSheet.css"/>
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
</head>

<body>
<div data-role="page" id="account">
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
			<li><a href="account.php" target="_self"><img src="Pictures/icon-home.png" class="ui-li-icon">Account</a></li>
			<li><a href="logout.php" target="_self"><img src="Pictures/icon-home.png" class="ui-li-icon">Logout</a></li>
		</ul>
	</div>
	<div data-role="header" data-position="fixed">
    	<h1>Account</h1>            
		<a href="#myPanel" data-icon="bars" data-position="right" data-rel="dialog">Menu</a>
    </div>
		<?php
				include('connexion.php');
				$username= $_SESSION['scm_username'];
				$requete="SELECT * FROM users WHERE username='$username'";
				$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
				$aff=mysqli_fetch_array($execution);
				
		?>
		<div id="content" data-role="content" class="ui-content">
			<div>
			<h4> Username and Email:</h4>
			<div class="ui-grid-b">
				<div class="ui-block-a">User Name:</div>
				<div class="ui-block-b"><?php echo $aff['username'];?></div>
				<div class="ui-block-c"></div>
				<div class="ui-block-a">User Email:</div>
				<div class="ui-block-b"><?php echo $aff['email'];?></div>
				<div class="ui-block-c"></div>
				<div class="ui-block-a"><a href="changeUsernameAndEmail.php" class="ui-btn">Change</a></div>
			</div>
			</div>
			<h4> Password:</h4>
			<div class="ui-grid-b">
			<div class="ui-block-a"><a href="changePassword.php" class="ui-btn">Change Password</a></div>
			</div>
			<h4> Manage Account:</h4>
			<div class="ui-grid-b">
			<div class="ui-block-a"><a href="#unregisterPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all">Unregister</a></div>
			</div>
		

			<div data-role="popup" id="unregisterPopup" class="ui-content">
			<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Cancel</a>
				<form method="post" action="" data-ajax="false">
					<div>
						<h4> Are you sure you want to delete your account ?</h4>
						<input type="submit" value="Delete" name="delete">		
					</div>
					<?php
					if(isset($_POST['delete']))
					{
						
						$selectReq="SELECT * FROM vehicle WHERE username='$username';";
						$execution = $link->query($selectReq) or die("Error in the consult.." . mysqli_error($link));
						
						while($vehicles=mysqli_fetch_array($execution))
						{
							$vehicleName=$vehicles['vehicleName'];
							$deleteDocReq="DELETE FROM document WHERE vehicleName='$vehicleName';";
							$sql = $link->query($deleteDocReq) or die("Error in the consult.." . mysqli_error($link));

							$deletemaintenanceReq1="DELETE FROM maintenance WHERE vehicleName='$vehicleName';";
							$sql = $link->query($deletemaintenanceReq1) or die("Error in the consult.." . mysqli_error($link));

							$deletemaintenanceReq2="DELETE FROM maintenancelist WHERE vehicleName='$vehicleName';";
							$sql = $link->query($deletemaintenanceReq2) or die("Error in the consult.." . mysqli_error($link));

							$deleteServiceReq="DELETE FROM service WHERE vehicleName='$vehicleName';";
							$sql = $link->query($deleteServiceReq) or die("Error in the consult.." . mysqli_error($link));
						}
						$deleteReq="DELETE FROM vehicle WHERE username='$username';";
						$execution = $link->query($deleteReq) or die("Error in the consult.." . mysqli_error($link));
						
						$deleteReq="DELETE FROM users WHERE username='$username';";
						$execution = $link->query($deleteReq) or die("Error in the consult.." . mysqli_error($link));
						
					
						
						
						$url="login.php";
						
						if (!headers_sent())
						{    
							header('Location: login.php');
							exit;
						}	
						else 
						{
							header('Location: account.php');
							exit;
						}     
					}
					?>
				</form>
			</div>

		</div>		
</div>
</body>
</html>