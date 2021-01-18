<?php
header("Access-Control-Allow-Origin: *");
include('connexion.php');
$username= $_POST['username'];
$newPassword= $_POST['password'];

$req1 = "UPDATE users SET password='$newPassword' WHERE username='$username';";
$sql = $link->query($req1) or die("Error in the consult.." . mysqli_error($link));

// Check new password has been applied correctly
$req= "SELECT password FROM users WHERE username='$username' LIMIT 1;";
$result = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

if ($result->num_rows == 1){
   while($row = mysqli_fetch_array($result)) {
      if ($row['password'] == $newPassword) {
      	 echo 'true';
      }
      else {
      	   echo 'false';
      }
   }  
}  
else {
   echo 'false';
     
}
?>