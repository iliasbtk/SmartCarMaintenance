<?php
include('connexion.php');
$idS=$_GET['idS'];
$req="DELETE FRoM service WHERE idS='$idS'";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
		$url="vehicle_fuel_and_service.php";

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
?>