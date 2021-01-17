<?php
header("Access-Control-Allow-Origin: *");
include('connexion.php');
$username= $_POST['username'];
$newEmail = $_POST['email'];

$req1 = "UPDATE users SET email='$newEmail' WHERE username='$username';";
$sql = $link->query($req1) or die("Error in the consult.." . mysqli_error($link));

// Check new email has been applied correctly
$req= "SELECT email FROM users WHERE username='$username' LIMIT 1;";
$result = $link->query($req) or die("Error in the consult.." . mysqli_error($link));

if ($result->num_rows == 1){
   while($row = mysqli_fetch_array($result)) {
      if ($row['email'] == $newEmail) {
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