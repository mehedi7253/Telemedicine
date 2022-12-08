<?php
include_once "../config.php";
session_start();
$brand_name=$_POST['brand_name'];
$generic_name=$_POST['generic_name'];
$type=$_POST['type'];
$user_id=$_SESSION['user_id'];


include'../telemedicine.php';

$sql = "INSERT INTO `medicines` (`user_id`, `brand_name`,`generic_name`,`type`) 
VALUES ('$user_id','$brand_name','$generic_name','$type')";
// print($sql);exit;
				
if($conn->query($sql)) 
{
	$msg= "  Medicine added Sucessfully " ;
}	
else
{
	$msg= " Error: ".$conn->error;
}

$user_id = mysqli_insert_id($conn);

$_SESSION['message']= $msg;  

header('location:add_medicine.php')

?>