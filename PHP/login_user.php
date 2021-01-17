<?php
header('Access-Control-Allow-Origin: *');
include('connexion.php');
$username= $_POST['username'];
$password= $_POST['password'];

$req="SELECT email FROM users WHERE username='$username' AND password='$password' LIMIT 1;";
$result = $link->query($req) or die("Error in the consult.." . mysqli_error($link));
if ($result->num_rows == 1){
   while($row = mysqli_fetch_array($result)) {
      echo $row['email'];
   }  
}  
else {
   echo 'Login failed';
     
}
?>