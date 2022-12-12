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
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if (isset($_POST['search'])) {
                                    $searchKey = $_POST['src'];
                                    $sql_s = "SELECT * FROM users, appointment WHERE appointment.doctor_id = users.id AND MONTH(appointment.create_at) = '$searchKey' GROUP BY appointment.doctor_id";
                                    $res_s = mysqli_query($conn, $sql_s);
                                    $rows = $res_s->num_rows;
                                }
                                if (isset($_POST['search']) == true) {
                                    if ($rows > 0) {
                                        $total = "SELECT COUNT(doctor_id) AS TotalVisit FROM appointment WHERE MONTH(create_at) = '$searchKey'";
                                        $res   = mysqli_query($conn, $total);
                                        $total_appoint  = mysqli_fetch_assoc($res);
                                    }
                                }
                                ?>
                                <form class="" action="" method="POST">
                                    <div class="form-group input-group">
                                        <select class="form-control col-md-5" name="src">
                                            <option>----------Select Month---------</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <input type="submit" class="btn btn-info ml-2" name="search" value="Submit">
                                    </div>
                                </form>
                                <hr />

                                <?php
                                if (isset($_POST['search']) == true) {
                                    if ($rows > 0) { ?>
                                        <div class="table-responsive">
                                            <table id="myTable" class="display table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Doctor</th>
                                                        <th>Total Visit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    while ($appoint_data = mysqli_fetch_assoc($res_s)) { ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $appoint_data['name'] ?></td>
                                                            <?php
                                                            $totalappoint = "SELECT COUNT(doctor_id) AS TotalAppoint FROM appointment WHERE MONTH(create_at) = '$searchKey' AND doctor_id = '$appoint_data[doctor_id]'";
                                                            $res_appoint = mysqli_query($conn, $totalappoint);
                                                            $appoint  = mysqli_fetch_assoc($res_appoint);
                                                            ?>
                                                            <td><?php echo $appoint['TotalAppoint'] ?></td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td><span class="float-right">Totoal Visit:</span> </td>
                                                        <td><span class="float-right"><?php echo $total_appoint['TotalVisit'] ?></span> </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    <?php } else { ?>
                                        <span class="text-danger">Not Found</span>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include_once(BASE_PATH . '/Admin/partial/footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>