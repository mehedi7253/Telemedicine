<?php include_once('../config.php');
session_start();
if (!$_SESSION['backenduser']) {
    header('location:../index.php');
}
?>
<?php include_once(BASE_PATH . '/Admin/partial/header.php');
include_once(BASE_PATH . '/telemedicine.php');

$doctor_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $doctor_id";
$result_set = $conn->query($sql);

$doctor = mysqli_fetch_assoc($result_set);
?>

<?php include_once(BASE_PATH . '/Admin/partial/header.php'); ?>

<?php include_once(BASE_PATH . '/Admin/partial/sidebar.php'); ?>
<!-- /# sidebar -->
<?php include_once(BASE_PATH . '/Admin/partial/topnav.php'); ?>



<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Schedule</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Add Schedule</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>

            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                   
                                    if(isset($_POST['btn']))
                                    {
                                        $schedule_date = $_POST['schedule_date'];
                                        $schedule_time = $_POST['schedule_time'];

                                        if($schedule_date == ' ')
                                        {
                                            echo "<p class='text-danger'>Please Enter Date</p>";
                                        }elseif($schedule_time == ''){
                                            echo "<p class='text-danger'>Please Select Time</p>";
                                        }else{
                                            $sql_check = "SELECT * FROM doctor_schedules WHERE schedule_date = '$schedule_date' AND schedule_time = '$schedule_time' AND doctor_id = '$doctor_id'";
                                            $chck = mysqli_query($conn, $sql_check);
                                            
                                            if(mysqli_num_rows($chck) > 0)
                                            {
                                                echo "<p class='text-danger'>This Schedule Allready Added..! </p>";
                                            }else{
                                                $add_schedule = "INSERT INTO doctor_schedules 
                                                            (schedule_date, schedule_time, doctor_id)
                                                            VALUES ('$schedule_date', '$schedule_time', '$doctor_id')";
                                                $res = mysqli_query($conn, $add_schedule);

                                                echo "<h4 class='text-success'>Schedule Added Successfull.!</h4>";
                                            }
                                           

                                        }
                                        
                                        
                                    }
                                ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Schedule Date</label>
                                        <input type="date" name="schedule_date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Schedule Slot</label>
                                        <select class="form-control" name="schedule_time">
                                            <option>-----------Select Schedule Time----------</option>
                                            <?php
                                                $sql_check = "SELECT * FROM doctor_schedules WHERE doctor_id = $doctor_id";
                                                $chck = mysqli_query($conn, $sql_check);
                                            ?>
                                           
                                            <option value="10.00 AM - 12.00 PM"> 10.00 AM - 12.00 PM </option>
                                            <option value="12.00 PM - 2.00 PM"> 12.00 PM - 2.00 PM </option>
                                            <option value="2.00 PM - 4.00 PM"> 2.00 PM - 4.00 PM </option>
                                            <option value="4.00 PM - 6.00 PM"> 4.00 PM - 6.00 PM </option>
                                            <option value="6.00 PM - 8.00 PM"> 6.00 PM - 8.00 PM </option>
                                            <option value="8.00 PM - 10.00 PM"> 18.00 PM - 10.00 PM </option>
                                            <option value="10.00 PM - 12.00 AM"> 10.00 PM - 12.00 AM </option>
                                        </select>

                                        
                                    </div>
                                    <div class="form-group  col-md-12 float-left">
                                        <input type="submit" name="btn" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->

                <!-- /# column -->

                <!-- /# column -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer">
                    <p>2022 © Admin Board. -
                        <a href="#">example.com</a>
                    </p>
                </div>
            </div>
        </div>
        </section>
    </div>
</div>
</div>







<!-- Common -->
<script src="js/lib/jquery.min.js"></script>
<script src="js/lib/jquery.nanoscroller.min.js"></script>
<script src="js/lib/menubar/sidebar.js"></script>
<script src="js/lib/preloader/pace.min.js"></script>
<script src="js/lib/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script>
     var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("schedule_date")[0].setAttribute('min', today);
        var timeOptions = {
            'timeFormat': 'h:i A',
            'minTime': getCurrentTime(new Date())
        };

        
</script>
</body>

</html>