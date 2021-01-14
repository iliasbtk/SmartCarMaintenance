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
    	<h1>Change Username and Email</h1>   
		<a href = "account.php" class = "ui-btn ui-corner-all" data-rel = "back">Cancel </a>         
    </div>
	<div data-role="main" class="ui-content">
	<?php
		include('connexion.php');
		$oldUsername= $_SESSION['scm_username'];
		$requete="SELECT * FROM users WHERE username='$oldUsername'";
		$execution = $link->query($requete) or die("Error in the consult.." . mysqli_error($link));
		$aff=mysqli_fetch_array($execution);

				
	?>
	<form method="post" action="" data-ajax="false">
		<div class="ui-field-contain">
			<label for="username">Username:</label>
			<input type="text" name="username" value=<?php echo $aff['username'];?>>
		</div>
		<div class="ui-field-contain">
			<label for="email">Email:</label>
			<input type="text" name="email" value=<?php echo $aff['email'];?>>
		</div>
		<div>
			<input type="submit" value="Submit Changes" name="submitChange">		
			<input type="reset" value="Reset">
		</div>
	
	<?php
	if(isset($_POST['submitChange']))
	{
		$newUsername=$_POST['username'];
		$email = $_POST['email'];
				
		$req_dupli="SELECT * FROM users WHERE username='$newUsername'";
		$exe_dupli = $link->query($req_dupli) or die("Error in the consult.." . mysqli_error($link));
		$duplicate=mysqli_num_rows($exe_dupli);
				
		if($duplicate==0)
		{
			$req1 = "UPDATE users SET username='$newUsername', email='$email' WHERE username='$oldUsername';"; 
			$sql = $link->query($req1) or die("Error in the consult.." . mysqli_error($link));		
			
			$req2 = "UPDATE vehicle SET username='$newUsername' WHERE username='$oldUsername';"; 
			$sql = $link->query($req2) or die("Error in the consult.." . mysqli_error($link));
			
			$url="login.php";
			if (!headers_sent())
			{    
				header('Location: login.php');
				exit;
			}	
			else 
			{
				header('Location: changeUsernameAndEmail.php');
				exit;
			}	
		}
		else{
	?>
			<script> alert("Error: This username already exist!!"); </script>
		<?php
			}
	}	
		?>
	
	</form>
				
	<div>
</div>