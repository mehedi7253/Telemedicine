<?php
include_once "../config.php";
session_start();

$host ='localhost';
$user = 'root';
$pass = '';
$db = 'telemedicine';

$conn = new mysqli ($host, $user, $pass,$db);


if (isset($_GET['delete_schedule'])){
    $schedule_id = $_GET['delete_schedule'];

    $sql = $conn->query("DELETE FROM doctor_schedule WHERE id = $schedule_id");

    $_SESSION['success'] = 'Remove Successful';
    header('Location: set_schedule.php');
}


?>