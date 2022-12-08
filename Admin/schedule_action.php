<?php
include_once "../config.php";
session_start();
$shchedule_date=$_POST['shchedule_date'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$slot=(int)$_POST['slot'];
$doctor_id= $_SESSION['user_id'];

// PHP program to illustrate
// date_diff() function
	
// Creating DateTime objects
$dateTimeObject1 = date_create($start_time);
$dateTimeObject2 = date_create($end_time);
 
// Calculating the difference between DateTime objects
$interval = date_diff($dateTimeObject1, $dateTimeObject2);

// Printing result in hours

$minutes = $interval->days * 24 * 60;
$minutes += $interval->h * 60;
$minutes += $interval->i;
$slots = $minutes/$slot;
//Printing result in minutes

// echo $start_time;exit;
include'../telemedicine.php';
for($i=1;$i<=$slots;$i++){

    $start_time = date('H:i:s', strtotime($start_time));
    $end_time = strtotime("+$slot minutes", strtotime($start_time));
    $end_time = date('H:i:s', $end_time);
    


    $sql = "INSERT INTO `doctor_schedule` (`doctor_id`,`shchedule_date`,`start_time`,`end_time`) 
    VALUES ('$doctor_id','$shchedule_date','$start_time','$end_time')";
//    print($sql);exit;
    $start_time = $end_time;
                    
    if($conn->query($sql)) 
    {
        $msg= "  Schedule added Sucessfully " ;
    }	
    else
    {
        $msg= " Error: ".$conn->error;
    }

}


$_SESSION['message']= $msg;  

header('location:set_schedule.php')

?>