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
<div data-role="page">
	<div data-role="header" data-position="fixed">
    	<h1>Change Password</h1>   
		<a href = "account.php" class = "ui-btn ui-corner-all" data-rel = "back">Cancel </a>         
    </div>
	<div data-role="main" class="ui-content">
	<form method="post" action="" data-ajax="false">
		<div class="ui-field-contain">
			<label for="username">New Password</label>
			<input type="password" name="newPassword">
		</div>
		<div class="ui-field-contain">
			<label for="confirmPassword">Confirm Password</label>
			<input type="password" name="confirmPassword">
		</div>
		<div>
			<input type="submit" value="Submit Changes" name="submitChange">		
			<input type="reset" value="Reset">
		</div>
	
	<?php
	if(isset($_POST['submitChange']))
	{
		include('connexion.php');
		$username= $_SESSION['scm_username'];
		$newPassword= md5($_POST['newPassword']);
		
		if ($_POST['newPassword'] != $_POST['confirmPassword']) 
		{
			echo 'Password mismatch';
			exit;
		}
		else {

		$req1 = "UPDATE users SET password='$newPassword' WHERE username='$username';"; 
		$sql = $link->query($req1) or die("Error in the consult.." . mysqli_error($link));		
			
		$url="login.php";
		if (!headers_sent())
		{    
			header('Location: login.php');
			exit;
		}	
		else 
		{
			header('Location: changePassword.php');
			exit;
		}	
	
		}
	}	
		?>
	
	</form>
				
	<div>
</div>