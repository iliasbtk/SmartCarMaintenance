<?php
header("Access-Control-Allow-Origin: *");
include('connexion.php');




$req1= "SELECT username, vehicleName, maintenanceName, MAX(date) latestDate
		FROM maintenance
		GROUP BY vehicleName, maintenanceName;";
$sql1 = $link->query($req1) or die("Error in the consult.." . mysqli_error($link));
while($aff1=mysqli_fetch_array($sql1))
{

	$username= $aff1['username'];
	$maintenanceName = $aff1['maintenanceName'];
	$vehicleName = $aff1['vehicleName'];
	$req2= "SELECT * FROM maintenancelist WHERE maintenanceName='$maintenanceName' AND vehicleName='$vehicleName';";
	$sql2 = $link->query($req2) or die("Error in the consult.." . mysqli_error($link));
	$aff2=mysqli_fetch_array($sql2);
	$latest=$aff1['latestDate'];
	
	
	$oneWeekBefore = $aff2['requiredTime'] + 7;
	$oneWeekBeforeReminder = date('Y-m-d', strtotime($latest. ' + '. $oneWeekBefore . 'days'));
	$deadlineDate = date('Y-m-d', strtotime($latest. ' + '. $aff2['requiredTime'] . 'days'));
	$nextMaintenance= (int)$aff2['initialMileage'] + (int)$aff2['requiredMileage'] - (int)$aff2['currentMileage'];
	
	
	$req3= "SELECT * FROM users WHERE username='$username';";
	$sql3 = $link->query($req3) or die("Error in the consult.." . mysqli_error($link));
	$aff3=mysqli_fetch_array($sql3);
	

	if($aff2['requiredTime'] != 0  &&  date("Y-m-d") == $oneWeekBeforeReminder){
		$to = $aff3['email']; 
		$email_subject = "SmartCarMaintenance Notification";
		$email_body = "Dear " . $aff['username'] . ",\n
		You have received a new message from SmartCarMaintenance Mobile App.\n
		Maintenance: ". $maintenanceName . " for the vehicle " . $vehicleName . " needs to be done in one week !!\n
		Regards\n
		SmartCarMaintenance";
		$headers = "From: noreply@SmartCarMaintenance.com"; 
		$headers = "Reply-To:noReply";   
		mail($to,$email_subject,$email_body,$headers);
  
		
	}

	if($aff2['requiredTime'] != 0  &&  date("Y-m-d") == $deadlineDate){
		$to = $aff3['email']; 
		$email_subject = "Dear " . $aff['username'] . ",\n
		You have received a new message from SmartCarMaintenance Mobile App.\n
		Maintenance: ". $maintenanceName . " for the vehicle " . $vehicleName . " needs to be done today !!\n
		Regards\n
		SmartCarMaintenance";
		$headers = "From: noreply@SmartCarMaintenance.com"; 
		$headers = "Reply-To:noReply";   
		mail($to,$email_subject,$email_body,$headers);
  
		
	}
	if($aff2['requiredMileage'] != 0 && $nextMaintenance <= 0){
		$to = $aff3['email']; 
		$email_subject = "Dear " . $aff['username'] . ",\n
		You have received a new message from SmartCarMaintenance Mobile App.\n
		You have reached the limit mileage to do the maintenance: ". $maintenanceName . " for the vehicle " . $vehicleName . " !!\n
		Regards\n
		SmartCarMaintenance";
		$headers = "From: noreply@SmartCarMaintenance.com"; 
		$headers = "Reply-To:noReply";   
		mail($to,$email_subject,$email_body,$headers);
		
	}
}

$req4= "SELECT v.username, v.vehicleName, d.documentName, d.expiryDate
		FROM vehicle v INNER JOIN document d
		ON v.vehicleName = d.vehicleName ;";

$sql4 = $link->query($req4) or die("Error in the consult.." . mysqli_error($link));
while($aff4=mysqli_fetch_array($sql4))
{
	$expiryDate=$aff4['expiryDate'];

	$oneWeekBeforeReminder = date('Y-m-d', strtotime($expiryDate. ' + '. 7 . 'days'));
	$documentName = $aff4['documentName'];
	
	$req5= "SELECT * FROM users WHERE username='$username';";
	$sql5 = $link->query($req5) or die("Error in the consult.." . mysqli_error($link));
	$aff5=mysqli_fetch_array($sql5);
	

	if(date("Y-m-d") == $oneWeekBeforeReminder){
		$to = $aff5['email']; 
		$email_subject = "SmartCarMaintenance Notification";
		$email_body = "Dear " . $aff['username'] . ",\n
		You have received a new message from SmartCarMaintenance Mobile App.\n
		Your document ". $documentName . " for the vehicle " . $vehicleName . " will expire in one week !!\n
		Regards\n
		SmartCarMaintenance";
		$headers = "From: noreply@SmartCarMaintenance.com"; 
		$headers = "Reply-To:noReply";   
		mail($to,$email_subject,$email_body,$headers);
  
		
	}

	if(date("Y-m-d") == $expiryDate){
		$to = $aff5['email']; 
		$email_subject = "SmartCarMaintenance Notification";
		$email_body = "Dear " . $aff['username'] . ",\n
		You have received a new message from SmartCarMaintenance Mobile App.\n
		Your document ". $documentName . " for the vehicle " . $vehicleName . " expires today !!\n
		Regards\n
		SmartCarMaintenance";
		$headers = "From: noreply@SmartCarMaintenance.com"; 
		$headers = "Reply-To:noReply";   
		mail($to,$email_subject,$email_body,$headers);
  
		
	}
}



		
?>