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

$userdata = mysqli_fetch_assoc($result_set);
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
                            <h1>Change Password</h1>
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
                                <li class="breadcrumb-item active">Change Password</li>
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
                                if (isset($_POST['change_pass'])){
                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['password'];
    
                                    $has_pass = hash('md5', $old_pass); // hash password
                                    $new_pass_hash = hash('md5', $new_pass); // passsword hash into sha256
    
                                    if ($old_pass == ''){
                                        echo "<span class='text-danger'>Type Your Old Password</span><br/>";
                                    }elseif ($new_pass == ''){
                                        echo "<span class='text-danger'>Type Your New Password</span><br/>";
                                    }elseif (preg_match('/\s/', $new_pass)) {
                                        echo "<span class='text-danger'>Password Must Have No Space</span><br/>";
                                    }else{
                                        if ($old_pass && $has_pass){
                                            $sql = "SELECT * FROM users WHERE id = '$userdata[id]' AND password = '$has_pass'"; // check password hash
                                            $result = mysqli_query($conn, $sql); // connect with query and database
    
                                            $up = mysqli_fetch_assoc($result);
    
                                            if ($up !=0){
                                                $change_pass = "UPDATE users SET password = '$new_pass_hash' WHERE id = '$userdata[id]'"; // update password
                                                $res_change  = mysqli_query($conn, $change_pass);// connect with query and database
    
                                                echo "<h2 class='text-success'>Password Change Successful</h2>";
                                                // echo "<script>document.location.href='change_pass.php'</script>";
                                            }else{
                                                echo "<span class='text-danger'>Password Does Not Match With Current Password</span>";
                                                // echo "<script>document.location.href='change_pass.php'</script>";    
                                           }
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Type Your Old Password</label>
                                        <input type="password" placeholder="Enter Old Password" name="old_pass" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['old_pass'];
                                        } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Type New Password</label>
                                        <input type="password" placeholder="Enter New Password" name="password" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['password'];
                                        } ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="change_pass" class="btn btn-success" value="Change Password">
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

</body>

</html>