<?php
    require_once 'telemedicine.php';


    if(!empty($_REQUEST["doctor_id"])) {

    $sql ="SELECT * FROM doctor_schedule WHERE doctor_id =" . "'" . mysqli_escape_string($conn, $_POST["doctor_id"] ) ."' AND patient_id IS NULL GROUP BY shchedule_date" ;
    //echo $query ="SELECT * FROM geo WHERE Region =" . "'" . $_POST["region_id"] ."'";
    // print $sql; exit;
    echo'<option value="">Select date</option>';
    $result_set=$conn->query($sql); 
  
  
    foreach($result_set as $schedule){
        echo '<option value="'.$schedule["shchedule_date"].'">'.$schedule["shchedule_date"].'</option>';
    }
       
    }
?>