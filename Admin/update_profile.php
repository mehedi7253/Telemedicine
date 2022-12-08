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
                            <h1>Update Profile</h1>
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
                                <li class="breadcrumb-item active">Update Profile</li>
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
                                    if(isset($_POST['update_doc_profile']))
                                    {
                                        $name  = $_POST['name'];
                                        $phone = $_POST['phone'];
                                        $dob   = $_POST['dob'];
                                        $image = $_FILES['image']['name'];

                                        if($name == '')
                                        {
                                            echo "<p class='text-danger'>Enter Name</p>";
                                        }elseif($phone == '')
                                        {
                                            echo "<p class='text-danger'>Enter Phone Number</p>";
                                        }elseif($dob == '')
                                        {
                                            echo "<p class='text-danger'>Enter Phone Date Of Birth</p>";
                                        }elseif($image == '')
                                        {
                                            echo "<p class='text-danger'>Select Image</p>";
                                        }else{
                                            $fileinfo = PATHINFO($_FILES['image']['name']);
                                            $newFile = $fileinfo['filename'] . "." . $fileinfo['extension'];
                                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/users/" . $newFile);
                                            $location = $newFile;
                                            $sql_update = mysqli_query($conn, "UPDATE users SET name = '$name', phone = '$phone', dob = '$dob', image = '$newFile' WHERE id = $doctor_id"); // Update Doctor Profile

                                            echo "<p class='text-success'>Update Successfull.!</p>";
                                            echo "<script>document.location.href='update_profile.php'</script>";
                                        }
                                        
                                       
                                    }
                                ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $doctor['name'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Email</label>
                                        <input type="text" disabled class="form-control" value="<?php echo $doctor['email'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control" value="<?php echo $doctor['phone'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" value="<?php echo $doctor['dob'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Image</label>
                                        <div class="p-3">
                                            <img src="<?= BASE_URL ?>images/users/<?php echo $doctor['image'] ?>" style="height: 70px; width: 70px;">
                                        </div>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 float-left">
                                        <input type="submit" class="btn btn-success" name="update_doc_profile">
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