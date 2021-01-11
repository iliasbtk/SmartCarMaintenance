	<?php
	$vehicle=$_GET['vehicle'];
	$req="SELECT * FROM vehicle WHERE idV='$vehicle'";
				$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
				$aff=mysqli_fetch_array($sql);
	?>
	<form method="post" action="">
				<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right"></a>
				<label for="inputMileage">Enter actual mileage:</label>
				<input type="number" name="updatedMileage" value="<?php echo $aff['currentMileage'];?>>  
				<input type="submit" value="Update" name="submit">
			<?php
			if(isset($_POST['submit']))
			{
				$mileageUpdated=$_POST['updatedMileage'];
	
				
				$reqUpdateMileage="UPDATE vehicle SET currentMileage = '$mileageUpdated' WHERE idV='$vehicle'";
				$sql = $link->query($reqUpdateMileage) or die("Error in the consult.." . mysqli_error($link));
			}
			?>
			</form>