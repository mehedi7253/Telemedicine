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
    
    $sql_check = "SELECT * FROM doctor_schedule WHERE shchedule_date = '$shchedule_date' AND start_time = '$start_time' AND doctor_id = '$doctor_id'";
    $chck = mysqli_query($conn, $sql_check);
    
    if(mysqli_num_rows($chck) > 0)
    {
        $_SESSION['exist'] = "<h6 class='text-danger'>This Schedule Allready Added..! </h6>";
    }else{
        $sql = mysqli_query($conn,"INSERT INTO doctor_schedule (doctor_id,shchedule_date,start_time,end_time) 
        VALUES ('$doctor_id','$shchedule_date','$start_time','$end_time')");
    //    print($sql);exit;
        $start_time = $end_time;

        $msg= "Schedule added Sucessfully " ;

        // if($conn->query($sql)) 
        // {
           
        // }	
        // else
        // {
        //     $msg= " Error: ".$conn->error;
        // }
       
    }

   
                    
    

}


$_SESSION['message']= $msg;  

header('location:set_schedule.php')

?>