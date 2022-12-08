<?php
    require_once 'telemedicine.php';


    if(!empty($_REQUEST["doctor_id"])) {

    $sql ="SELECT * FROM doctor_schedule WHERE doctor_id =" . "'" . mysqli_escape_string($conn, $_POST["doctor_id"] ) ."' AND shchedule_date =" . "'" . mysqli_escape_string($conn, $_POST["shchedule_date"] ) ."' AND patient_id IS NULL" ;
    //echo $query ="SELECT * FROM geo WHERE Region =" . "'" . $_POST["region_id"] ."'";
    

    $result_set=$conn->query($sql); 
    echo'<option value="">Select time</option>';
  
    foreach($result_set as $schedule){
        echo '<option value="'.$schedule["id"].'">'.$schedule["start_time"].'-'.$schedule["end_time"].'</option>';
    }
       
    }
?>