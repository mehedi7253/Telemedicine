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
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Patient Name</th>
                                                <th>Appointment Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Prescription</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_data = mysqli_query(
                                                $conn,
                                                "SELECT * FROM appointment, users, doctor_schedule
                                                                        WHERE appointment.patient_id = users.id AND
                                                                        appointment.schedule_id = doctor_schedule.id AND
                                                                        appointment.account_number != 'NULL' AND
                                                                        appointment.doctor_id = '$_SESSION[user_id]'"
                                            );
                                            $i = 1;
                                            ?>
                                            <?php while ($row = mysqli_fetch_assoc($sql_data)) { ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['shchedule_date'] ?></td>
                                                    <td><?php echo $row['start_time'] ?></td>
                                                    <td><?php echo $row['end_time'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row['account_number'] == '') {
                                                            echo '<span class="text-danger">Pending</span>';
                                                        } else {
                                                            echo '<span class="text-success">Complete</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row['status'] == '1') {
                                                            echo '<span class="text-danger">Pending</span>';
                                                        } else {
                                                            echo '<span class="text-succsess">Complete</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-info"><i class="fa fa-eye"></i></a> |
                                                        <a href="prescription.php?appointmentID=<?php echo $row['serial_number']?>" class="btn btn-info"><i class="fa fa-plus"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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