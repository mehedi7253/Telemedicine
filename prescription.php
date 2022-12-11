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
                        <h3>My Prescription</h3>
                        <?php
                             if (isset($_GET['appointmentID'])) {
                                $id = $_GET['appointmentID'];
                                $get_user = mysqli_query($conn, "SELECT * FROM appointment, users WHERE appointment.patient_id = users.id AND appointment.serial_number = $id");
                                $user = mysqli_fetch_assoc($get_user);

                                $prescription = mysqli_query($conn, "SELECT * FROM prescription WHERE appointment_id = $id");
                                $pres = mysqli_fetch_assoc($prescription);
                            }
                        ?>
                    </div>
                    <div class="card-body" id="mainFrame">
                        <div class="col-md-12 col-sm-12 float-left">
                            <label class="font-weight-bold">Symptoms: <?php echo $pres['symptoms'] ?></label><br />
                            <label class="font-weight-bold">Test: <?php echo $pres['test'] ?></label><br />
                            <label class="font-weight-bold">Advice: <?php echo $pres['advice'] ?></label><br />
                            <hr />
                            <label class="font-weight-bold">Medicine :</label>
                            <label class="font-weight-bold"><?php echo $pres['prescription'] ?></label><br />
                        </div>
                        <div class="card-footer">
                            <div class="text-md-right">
                                <button class="btn btn-primary icon-left" type="pss" id="prntPSS"> Save</button>
                            </div>
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
<script type="application/javascript">
    $(document).ready(function () {

        $('#prntPSS').click(function() {
            var printContents = $('#mainFrame').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });

    });
</script>