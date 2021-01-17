<?php
header("Access-Control-Allow-Origin: *");
include('connexion.php');
$email = $_POST['email'];

$email_req="SELECT * FROM users WHERE email='$email'  LIMIT 1;";
$email_result = $link->query($email_req) or die("Error in the consult.." . mysqli_error($link));
if ($email_result->num_rows == 1){
    while($row = mysqli_fetch_array($email_result)) {

    	$username= $row['username'];
	$password = $row['password'];
    
	// Create the email and send the message
        $to = $email; 
	$email_subject = "Your SmartCarMaintenance Password";
	$email_body = "Hi $email,\n\n". "Here are your login details for your SmartCarMaitenance app:\n\nUsername: $username\n\nPassword: $password\n\n";
	$headers = "From: noreply@smartcarmaintenance.com\n"; 
	$headers .= "Reply-To: $email";   
	mail($to,$email_subject,$email_body,$headers);
	echo 'success';
	exit;
    }
   exit;
}
else {
     echo 'email_not_found';
     exit;
}
echo 'error';

?>