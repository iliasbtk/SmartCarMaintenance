<!DOCTYPE html>
<html>
<head> 
    <title>SmartCarMaintenance - Register</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="StyleSheet.css"/>
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
</head>

<body>
    <div data-role="page">
	
		<div data-role="header" data-position="fixed">
            <h1>MySmartCarMaintenance - Login Page </h1>            
        </div>
 
		<div id="content" data-role="content" class="ui-content">
		<form method="post" action="" data-ajax="false">
			<div id="loginForm">
				<h2> Enter your credentials to login </h2>
				<div class="ui-field-contain">
					<input type="text" id="username" name="username" placeholder="Username">
				</div>
				<div class="ui-field-contain">
					<input type="password" id="password" name="password" placeholder="Password">
				</div>
				<div class="ui-field-contain">
					<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
				</div>
				<div class="ui-field-contain">
					<input type="text" id="email" name="email" placeholder="E-mail address">
				</div>
				<div>		
					<input type="submit" value="Register" name="register">
				</div>
			</div>
		</form>
		</div>			
		<?php
			include('connexion.php');
			ob_start();
			session_start();
			if(isset($_POST['register']))
			{
				$username=$_POST['username'];
				$password = md5($_POST['password']);
				$email = $_POST['email'];
				$user_type = 'customer';
				
				$req_dupli="SELECT * FROM users WHERE username='$username'";
				$exe_dupli = $link->query($req_dupli) or die("Error in the consult.." . mysqli_error($link));
				$duplicate=mysqli_num_rows($exe_dupli);
				
				if($duplicate==0)
				{
				
					if ($_POST['password'] != $_POST['confirm_password']) 
					{
						echo 'Password mismatch';
						exit;
					}

					if (empty($username) && empty($_POST['password']))
					{
						echo 'All fields are required!';
						exit;
					}
					else {
						
						$req = "INSERT INTO users (username, email, password, user_type) VALUES ('$username', '$email', '$password', '$user_type');";
						$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
						//$query = $link->prepare($req);
						//$values = array($username, $email, $password, $user_level);
						//$query->execute($values);
						//$rowCount = $query->rowCount();
											
					
						$url="login.php";
						
						if (!headers_sent())
						{    
							header('Location: login.php');
							exit;
						}	
						else 
						{
							header('Location: register.php');
							exit;
						}
						}
					}
					else{
					?>
					<script> alert("Error: This username already exist!!"); </script>
					<?php
					}
				}	
					?>

		
		<div data-role="footer" data-position="fixed">
			<h1> Copyright &copy; MySmartCarMaintenance </h1>	
		</div>
	</div>
</body>
</html>

