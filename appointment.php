<?php include_once('config.php'); 
session_start();?>
<?php include_once(BASE_PATH.'/part/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
#print_r($result_set);exit;
?>

<?php include_once(BASE_PATH.'/part/nav.php'); ?>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Book your Seat</span>
                    <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mt-3">
                    <div class="feature-icon mb-3">
                        <i class="icofont-support text-lg"></i>
                    </div>
                    <span class="h3">Call for an Emergency Service!</span>
                    <h2 class="text-color mt-3">+84 789 1256 </h2>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-2 title-color">Book an appoinment</h2>
                    <p class="mb-4"></p>
                    <?php
                        if(isset($_GET['doctor_id']))
                        {
                            $id = $_GET['doctor_id'];
                            $sql = mysqli_query($conn, "SELECT * FROM doctor_schedule WHERE doctor_id = '$id'");
                           
                            $get_doctor_details = mysqli_query($conn, "SELECT * FROM users, doctor WHERE users.id = doctor.user_id AND doctor.user_id = '$id'");
                            $doctor_details = mysqli_fetch_assoc($get_doctor_details);
                           
                        }
                        if (isset($_POST['search']))
                        {
                            $searchKey = $_POST['src'];
                            $sql_s = "SELECT * FROM doctor_schedule WHERE shchedule_date = '$searchKey' AND patient_id IS NULL";

                            $res_s = mysqli_query($conn, $sql_s);

                            $rows = $res_s->num_rows;
                        }
                        $user_id = $_SESSION['user_id'];
                        if(isset($_POST['appoint']))
                        {
                            $appointment = mysqli_query($conn, "UPDATE doctor_schedule SET patient_id = $user_id WHERE id = '$_POST[schedule]'");
                            
                            $create = @date('Y-m-d H:i:s');
                            $serial_number = (rand(10,1000000));
                            $confirm_appointment = mysqli_query($conn, "INSERT INTO appointment
                            (patient_id, doctor_id, schedule_id, fee, status, serial_number, create_at)
                             VALUES
                             ('$user_id', '$id', '$_POST[schedule]', '$doctor_details[visit_fee]', '1', '$serial_number', '$create' )"
                             );

                             if ($confirm_appointment) {
                                $last_id = mysqli_insert_id($conn);
                                
                                echo "<script>document.location.href='payment.php?pay=$last_id'</script>";
                              } 
                        }
                    ?>
                   
                    <!-- <?php echo $doctor_details['visit_fee'];?> -->
                    <form method="POST" class="appoinment-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input disabled value="<?php echo $doctor_details['name']?>" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <input disabled value="<?php echo $doctor_details['department']?>" class="form-control">
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                    <label>Check Schedule: </label>
                                    <select name="src" class="form-control" required>
                                        <option value="">Select Date</option>
                                        <?php 
                                        $date = mysqli_query($conn, "SELECT * FROM doctor_schedule WHERE doctor_id = '$id' GROUP BY shchedule_date");
                                        while($row = mysqli_fetch_assoc($date)){?>
                                            <option value="<?php echo $row['shchedule_date']?>"><?php echo $row['shchedule_date']?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div class="form-group mt-4">
                                    <input type="submit" class="btn btn-sm-in btn-info ml-2" name="search" value="Check Schedule">
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="" method="POST">
                        <?php
                         if (isset($_POST['search'])== true) {
                            if ($rows > 0) {
                               
                                echo "<label>Select your Schedule</label>";
                               while($date = mysqli_fetch_assoc($res_s)){?>
                                <div class="form-group">
                                    <input type="radio" name="schedule" value="<?php echo $date['id']?>"> <?php echo $date['start_time'] .' - '. $date['end_time']?>
                                </div>
                               <?php }
                               echo'
                                <div class="form-group">
                                <button type="submit" name="appoint" class="btn btn-main btn-round-full">Make Appoinment<i
                                    class="icofont-simple-right ml-2"></i></button>  
                                </div>';
                            }
                        }
                        ?>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>



<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>
<script>

</script>