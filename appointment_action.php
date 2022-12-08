<?php
session_start();
    require_once 'telemedicine.php';


    if(!empty($_REQUEST["time"])) {

    $sql ="UPDATE `doctor_schedule` SET patient_id = ".$_SESSION['user_id']." WHERE id = ".$_POST['time'];
    

    $result_set=$conn->query($sql); 

    if($conn->query($sql)) 
{
	$msg= "  Appoinment has been booked Sucessfully " ;
}	
else
{
	$msg= " Error: ".$conn->error;
}
$_SESSION['message']= $msg; 
  
    header("location:appointment.php");	
    }
?>