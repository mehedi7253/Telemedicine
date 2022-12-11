<?php include_once('../config.php');
session_start();
if (!$_SESSION['backenduser']) {
    header('location:../index.php');
}
?>
<?php include_once(BASE_PATH . '/Admin/partial/header.php');
include_once(BASE_PATH . '/telemedicine.php');
$sql = "select * from medicines WHERE user_id =" . $_SESSION['user_id'];
$result_set = $conn->query($sql);
#print_r($result_set);exit;
?>


<?php include_once(BASE_PATH . '/Admin/partial/sidebar.php'); ?>
<?php include_once(BASE_PATH . '/Admin/partial/topnav.php'); ?>

<!-- /# sidebar -->

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome Here</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" >
                            <?php
                                if (isset($_GET['appointmentID'])) {
                                    $id = $_GET['appointmentID'];
                                    $get_user = mysqli_query($conn, "SELECT * FROM appointment, users WHERE appointment.patient_id = users.id AND appointment.serial_number = $id");
                                    $user = mysqli_fetch_assoc($get_user);

                                    $prescription = mysqli_query($conn, "SELECT * FROM prescription WHERE appointment_id = $id");
                                    $pres = mysqli_fetch_assoc($prescription);
                                }
                            ?>
                           
                            <div class="card-body" id="mainFrame">
                                <div class="col-md-12 col-sm-12 float-left">
                                    <label class="font-weight-bold"><?php echo $user['name'] ?></label><br />
                                    <label class="font-weight-bold"><?php echo $user['phone'] ?></label><br />
                                    <label class="font-weight-bold"><?php echo $user['email'] ?></label><br />
                                    <label class="font-weight-bold">Payment Number: <?php echo $user['account_number'] ?></label><br />
                                </div>
                          
                                <div class="col-md-12 col-sm-12 float-left">
                                    <label class="font-weight-bold">Symptoms: <?php echo $pres['symptoms'] ?></label><br />
                                    <label class="font-weight-bold">Test: <?php echo $pres['test'] ?></label><br />
                                    <label class="font-weight-bold">Advice: <?php echo $pres['advice'] ?></label><br />
                                    <hr />
                                    <label class="font-weight-bold">Medicine :</label>
                                    <label class="font-weight-bold"><?php echo $pres['prescription'] ?></label><br />
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-md-right">
                                    <button class="btn btn-primary btn-icon icon-left" type="pss" id="prntPSS"><i class="fas fa-print"></i> Save</button>
                                </div>
                            </div>
                        </div>

                        <!-- /# card -->
                    </div>
                    <!-- /# column -->

                </div>


            </section>
        </div>
    </div>
</div>

<?php include_once(BASE_PATH . '/Admin/partial/footer.php'); ?>
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