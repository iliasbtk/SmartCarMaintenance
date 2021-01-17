<?php
header("Access-Control-Allow-Origin: *");
include('connexion.php');
$req="SELECT * FROM users WHERE weeklyNotification='YES';";
$result = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
while($aff=mysqli_fetch_array($result))
{
	// Create the email and send the message
$to = $aff['email']; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "SmartCarMaintenance Notification";
$email_body = "Dear " . $aff['username'] . "You have received a new message from SmartCarMaintenance Mobile App
This a weekly reminder to update your vehicle(s) mileages.
If you wish to not receive this notification you can unsubscripe from it in the settings menu.
Thank";
$headers = "From: noreply@SmartCarMaintenance.com"; 
$headers = "Reply-To:noReply";   
mail($to,$email_subject,$email_body,$headers);
return true;   
}     
?>