<?php include_once('config.php'); 
session_start();

include_once(BASE_PATH.'/part/header.php');
include_once(BASE_PATH.'/telemedicine.php');
$id=$_SESSION['user_id'];
$sql="select * from users WHERE id=$id";
$result_set=$conn->query($sql);
$user = mysqli_fetch_assoc($result_set);
?>
<?php include_once(BASE_PATH.'/part/nav.php'); ?>


<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 float-left">
                <?php 
                    if (isset ($_SESSION['message'])) 
                    {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    } 
                 ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Well Come, <span class="text-success"><?php echo $user['name'];?></span></h5>
                    </div>
                    <div class="card-body">
                        <i class="ico-home"></i> <a href="profile.php" class="">Home</a><br/>
                        <i class="ico-home"></i> <a href="update_profile.php">Update Profile</a><br/>
                        <i class="ico-home"></i> <a href="change_pass.php">Change Password</a><br/>
                        <i class="ico-home"></i> <a href="change_profile_pic.php">Update Profile Picture</a><br/>
                        <i class="ico-home"></i> <a href="appointment_list.php">Appointment List</a><br/>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-12 float-left">
               <div class="card">
                    <div class="card-header">
                        <h3>My Appointment List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Doctor Name</th>
                                        <th>Appointment Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th>Prescription</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql_data = mysqli_query($conn, "SELECT * FROM appointment, users, doctor_schedule
                                                            WHERE appointment.doctor_id = users.id AND
                                                            appointment.schedule_id = doctor_schedule.id AND
                                                            appointment.patient_id = $user[id]"
                                                         );
                                        $i = 1;
                                    ?>
                                    <?php while($row = mysqli_fetch_assoc($sql_data)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $row['name']?></td>
                                            <td><?php echo $row['shchedule_date']?></td>
                                            <td><?php echo $row['start_time']?></td>
                                            <td><?php echo $row['end_time']?></td>
                                            <td>
                                                <?php
                                                    if($row['status'] == '1')
                                                    {
                                                        echo '<span class="text-danger">Pending</span>';
                                                    }else{
                                                        echo '<span class="text-succsess">Complete</span>';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $prescription = mysqli_query($conn, "SELECT * FROM prescription WHERE appointment_id = '$row[serial_number]'");
                                                    $pres = mysqli_fetch_assoc($prescription);

                                                    if(mysqli_num_rows($prescription) > 0)
                                                    {?>
                                                        <a href="prescription.php?appointmentID=<?php echo $row['serial_number'];?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <?php }else{?>
                                                        <span class="text-danger">Not Made Yet</span>
                                                    <?php } 
                                                ?>   
                                            </td>
                                        </tr>
                                    <?php }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
               </div>
            </div>
        </div>
            
        </div>
    </div>
    </div>
</section>


<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>