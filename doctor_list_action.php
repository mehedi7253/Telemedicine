<?php
    require_once 'telemedicine.php';


    if(!empty($_REQUEST["department_id"])) {

    $sql ="SELECT * FROM doctor WHERE department =" . "'" . mysqli_escape_string($conn, $_POST["department_id"] ) ."'";
    //echo $query ="SELECT * FROM geo WHERE Region =" . "'" . $_POST["region_id"] ."'";
    

    $result_set=$conn->query($sql); 
  
  
    foreach($result_set as $doctor){
        echo '<option value="'.$doctor["user_id"].'">'.$doctor["name"].'</option>';
    }
       
    }
?>