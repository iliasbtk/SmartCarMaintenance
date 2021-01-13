<?php
include('connexion.php');
$idD=$_GET['idD'];
$req="DELETE FRoM document WHERE idD='$idD'";
$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
		$url="vehicle_docs.php";

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