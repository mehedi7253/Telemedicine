<?php 
$id = $_GET["id"];
include'telemedicine.php';

$sql="DELETE FROM `user` WHERE user_id = '$id'";

//echo $sql;exit;
$conn->query($sql);


header('location:doctor.php');
?>