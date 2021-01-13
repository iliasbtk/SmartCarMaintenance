<?php
include('connexion.php');
$idMTr=$_GET['idMTr'];
$req="DELETE FRoM maintenance WHERE idMTr='$idMTr'";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
		$url="vehicle_maintenance.php";

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