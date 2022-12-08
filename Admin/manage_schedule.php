<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
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

<?php include_once(BASE_PATH.'/Admin/partial/sidebar.php'); ?>
    <!-- /# sidebar -->
    
    <?php include_once(BASE_PATH.'/Admin/partial/topnav.php'); ?>

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
                                <div class="card-body">
                                    <?php
                                        if(isset($_SESSION['success'])){
                                            echo "<h4 class='text-success'>".$_SESSION['success']."</h4> ";
                                            unset($_SESSION['success']);
                                        }
                                    ?>
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table-export" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Slot</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>  
                                                    <?php 
                                                        $sql_check = "SELECT * FROM doctor_schedules WHERE doctor_id = '$doctor_id'";
                                                        $chck = mysqli_query($conn, $sql_check);

                                                        $i = 1;
                                                    ?>
                                                    <?php while($rows = mysqli_fetch_assoc($chck)){?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $rows['schedule_date'];?></td>
                                                            <td><?php echo $rows['schedule_time']?></td>
                                                            <td>
                                                                <a class="btn btn-danger text-white" href="delete.php?delete_schedule=<?php echo $rows['id']?>" onclick="return confirm('Are You Sure To Delete..!')"><i class="fa fa-trash-o"></i> Delete</a>
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
                </section>
           
            </div>
        </div>
    </div>

    <?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>
                    