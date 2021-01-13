<!DOCTYPE html>
<html>
<head> 
    <title>SmartCarMaintenance Main</title>
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
				<div>
					<input type="submit" value="Login" name="login">
					<input type="submit" value="Forgot your password ? (NOT WORKING)" name="forgot_password">	

					<p> Not registered ? <p>
					<input type="submit" value="Register" name="register">
				</div>
			</div>
		</form>
		</div>
		
	<?php
	include('connexion.php');
	ob_start();
	session_start();
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password = md5($_POST['password']);

		if (empty($username) && empty($password))
		{
			echo 'All fields are required!';
		}
		else {
			$req="SELECT * FROM users WHERE username='$username' AND '$password'=password LIMIT 1";
			$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
			$url="Main.php";
			$url2 = "login.php";

			if($sql->num_rows == 1){
				$sql_result = $sql->fetch_all(MYSQLI_ASSOC);
				foreach ($sql_result as $val) {
					$_SESSION['scm_username'] = $val['username'];
					$_SESSION['scm_user_type'] = $val['user_type'];
				}
				header('Location: '.$url);
				exit;
			}
			else {
				echo 'Invalid username and/or password';
				echo '<script type="text/javascript">';
				echo 'window.location.href="'.$url2.'";';
				echo '</script>';
				echo '<noscript>';
				echo '<meta http-equiv="refresh" content="0;url='.$url2.'" />';
				echo '</noscript>'; 
				exit;
			}
		}
	}
	if (isset($_POST['register'])) 
	{
		$url="register.php";
		header('Location: '.$url);
		exit;
	}
	?>
			</form>
		</div>
	</div>
				
		<div data-role="footer" data-position="fixed">
			<h1> Copyright &copy; MySmartCarMaintenance </h1>	
		</div>
	</div>
</body>
</html>


