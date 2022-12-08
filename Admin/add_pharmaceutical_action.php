<?php
session_start();
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$phone=$_POST['phone'];



include'../telemedicine.php';
$sql="select * from users where email='$email'";
$result_set=$conn->query($sql); 
if($result_set->num_rows>0){
	$_SESSION['message']= "email already exist";
	header('location:add_pharmaceutical.php'); exit;
}


$sql = "INSERT INTO `users` ( `name`,`email`,`password`,`phone`,`role`) 
VALUES ('$name','$email','$password','$phone',3)";

				
if($conn->query($sql)) 
{
	$msg= " pharmaceutical added Sucessfully " ;
}	
else
{
	$msg= " Error: ".$conn->error;
}

#$user_id = mysqli_insert_id($conn);


$_SESSION['message']= $msg; 				


header('location:add_pharmaceutical.php')

?>