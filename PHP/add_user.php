<?php
header("Access-Control-Allow-Origin: *");
include('connexion.php');
$username=$_POST['username'];
$password= $_POST['password'];
$email = $_POST['email'];
$user_type = 'customer';


$req="SELECT * FROM users WHERE username='$username'  LIMIT 1;";
$result = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

if ($result-> num_rows ==1 ) {
   echo 'duplicate_username';
   exit;
}
else {
     $email_req="SELECT * FROM users WHERE email='$email'  LIMIT 1;";
     $email_result = $link->query($email_req) or die("Error in the consult.." . mysqli_error($link));
     if ($email_result->num_rows == 1){
     	echo 'duplicate_email';
	exit;
     }    
     else
     {
     	$req = "INSERT INTO users (username, email, password, user_type) VALUES ('$username', '$email', '$password', '$user_type');";
	$sql = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

	$req= "SELECT username FROM users WHERE username='$username';";
	$result = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
	if ($result->num_rows == 1 ) {
	   //include('send_email.php');
   
	   $name = $username;
	   $emai_address = $email;
	   $phone = '07800-00000';
	   $message = 'Nothing to say';

	   // Create the email and send the message
	   $to = 'ilias.betkaoui@gmail.com'; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	   $email_subject = "Your new SmartCarMaintenance account has been created";
	   $email_body = "Hi $email,\n\n". "Thank you for signing up with SmartCarMaintenance!"." Here are the details:\n\nUsername: $username\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
	   $headers = "From: noreply@smartcarmaintenance.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	   $headers .= "Reply-To: $email_address";   
	   mail($to,$email_subject,$email_body,$headers);
	   echo 'true';
       }
       else {
       	    echo 'false';
       }
    }   
}
?>