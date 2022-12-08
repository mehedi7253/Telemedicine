<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');?>

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
               
                <?php if($_SESSION['user_role']==1){ ?>


                <div class="row">
                    <div class="col-lg-5">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                                <div class="stat-icon bg-primary">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="stat-content">
                                <?php 
                                require BASE_PATH.'/telemedicine.php';
                                $query = "SELECT * FROM `users` WHERE role = 2";
                                $query_run = mysqli_query($conn, $query);
                                
                                $row = mysqli_num_rows($query_run);

                                echo '<div class="stat-digit"> '.$row.'</div>';
                                 
                                ?>
                                    
                                    <div class="stat-text">Doctor</div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                                <div class="stat-icon bg-success">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="stat-content">
                                <?php 
                                require BASE_PATH.'/telemedicine.php';
                                $query = "SELECT * FROM `users` WHERE role = 0";
                                $query_run = mysqli_query($conn, $query);
                                
                                $row = mysqli_num_rows($query_run);

                                echo '<div class="stat-digit"> '.$row.'</div>';
                                 
                                ?>
                                    <div class="stat-text">patient</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                                <div class="stat-icon bg-warning">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="stat-content">
                                <?php 
                                require BASE_PATH.'/telemedicine.php';
                                $query = "SELECT * FROM `users` WHERE role = 3";
                                $query_run = mysqli_query($conn, $query);
                                
                                $row = mysqli_num_rows($query_run);

                                echo '<div class="stat-digit"> '.$row.'</div>';
                                 
                                ?>
                                    <div class="stat-text">pharmaceutical</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                                <div class="stat-icon bg-danger">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="stat-content">
                                <?php 
                                require BASE_PATH.'/telemedicine.php';
                                $query = "SELECT * FROM `medicines`";
                                $query_run = mysqli_query($conn, $query);
                                
                                $row = mysqli_num_rows($query_run);

                                echo '<div class="stat-digit"> '.$row.'</div>';
                                 
                                ?>
                                    <div class="stat-text">Medicine</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }?>

                <!-- /# row -->

            </section>
        </div>
    </div>
</div>

<?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>