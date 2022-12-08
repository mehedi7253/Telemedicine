<?php
session_start();
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$target_dir = "images/";
$id =$_SESSION['id'];
 

include'telemedicine.php';


$sql = "UPDATE `users` set 
       `name` ='$name',
	   
	   `phone`='$phone',
	   `dob`='$dob',
	   
   WHERE id ='$id'";

 
if($conn->query($sql)) 
{
	$_SESSION['user_name'] = $name;
	$msg= " Updated  Sucessfully " ;
}	
else
{
	$msg= " Error: ".$conn->error;
	//echo 
}
$_SESSION['message']= $msg; 

header('location:profile.php')

?>