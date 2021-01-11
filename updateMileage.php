<?php
include('connexion.php');
$mileageUpdated=$_POST['updatedMileage'];
				$idV=$_POST['idV'];
				$reqUpdateMileage="UPDATE vehicle SET currentMileage = '$mileageUpdated'
									WHERE idV = '$idV' ";
									echo $reqUpdateMileage;
				$sql = $link->query($reqUpdateMileage) or die("Error in the consult.." . mysqli_error($link));
				//header('location: Main.php#updatingMileage');
				?>