<?php include_once('../config.php');
session_start();
if (!$_SESSION['backenduser']) {
    header('location:../index.php');
}
?>
<?php include_once(BASE_PATH . '/Admin/partial/header.php');
include_once(BASE_PATH . '/telemedicine.php');
?>

<?php include_once(BASE_PATH . '/Admin/partial/sidebar.php'); ?>
<!-- /# sidebar -->

<?php include_once(BASE_PATH . '/Admin/partial/topnav.php');

?>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Prescription</h1>
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
                        <div class="card">
                            <?php
                            if (isset($_GET['appointmentID'])) {
                                $id = $_GET['appointmentID'];
                                $get_user = mysqli_query($conn, "SELECT * FROM appointment, users WHERE appointment.patient_id = users.id AND appointment.serial_number = $id");
                                $user = mysqli_fetch_assoc($get_user);
                            }
                            $sql = mysqli_query($conn, "SELECT * FROM medicines");

                            if (isset($_POST['btn'])) {
                                $prescription = $_POST['prescription'];
                                $appointment_id = $id;
                                $symptoms       = $_POST['symptoms'];
                                $test           = $_POST['test'];
                                $advice         = $_POST['advice'];
                                $chkNew  = " ";

                                foreach ($prescription as $chkNew1) {
                                    $chkNew .= $chkNew1 . ", ";
                                }
                                $addmed = mysqli_query($conn, "INSERT INTO prescription (appointment_id, prescription) values ('$_SESSION[user_id]', '$chkNew')");
                            }
                            ?>
                            <div class="col-md-12 col-sm-12 float-left">
                                <label class="font-weight-bold"><?php echo $user['name'] ?></label><br />
                                <label class="font-weight-bold"><?php echo $user['phone'] ?></label><br />
                                <label class="font-weight-bold"><?php echo $user['email'] ?></label><br />
                                <hr />
                                <label class="font-weight-bold">Payment Number: <?php echo $user['account_number'] ?></label><br />
                            </div>

                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group col-md-6 float-left">
                                        <label>symptoms</label>
                                        <input type="text" name="symptoms" placeholder="Enter Symptoms" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Test <sup class="text-danger">If Needed</sup></label>
                                        <input type="text" name="test" placeholder="Enter Test Name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12 float-left">
                                        <label>Advice <sup class="text-danger">If Needed</sup></label>
                                        <input type="text" name="advice" placeholder="Enter Advice" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12 float-left">
                                        <label>Enter Medicine</label>
                                        <select name="prescription[]" data-placeholder="Select Medicine" multiple class="chosen-select col-md-12" tabindex="8">
                                            <?php
                                            while ($medicinice = mysqli_fetch_assoc($sql)) { ?>
                                                <option value="<?php echo $medicinice['brand_name'] ?>"><?php echo $medicinice['brand_name'] ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 float-left">
                                        <input type="submit" class="btn btn-success" value="Submit" name="btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include_once(BASE_PATH . '/Admin/partial/footer.php'); ?>
<script>
    $(function() {
        $(".chosen-select").chosen();
    })
</script>