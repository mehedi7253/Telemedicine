<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$sql="SELECT users.id as UserID,doctor.id as DoctorID,doctor.name, users.phone, email,users.image as img,department,specialization,visit_fee
FROM doctor
INNER JOIN users
ON doctor.user_id = users.id";


$result_set=$conn->query($sql);

$doctor = mysqli_fetch_assoc($result_set);

#print_r($result_set);exit;

?>


<?php include_once(BASE_PATH.'/Admin/partial/sidebar.php'); ?>
<?php include_once(BASE_PATH.'/Admin/partial/topnav.php'); ?>

    <!-- /# sidebar -->
  
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Upadte, <span>Doctor</span></h1>
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
                                <?php if (isset ($_SESSION['message'])) 
                                    {
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    } 
                                ?>
                                <?php
                                    if(isset($_GET['docotrID']))
                                    {
                                        $id = $_GET['docotrID'];
                                        $get_profile = mysqli_query($conn, "SELECT * FROM doctor WHERE id = '$id'");

                                        $profile = mysqli_fetch_assoc($get_profile);
                                    }
                                    if(isset($_POST['doctor_up']))
                                    {
                                        $update = mysqli_query($conn, "UPDATE doctor SET visit_fee = '$_POST[visit_fee]' WHERE id = '$id'");

                                        if($update == true)
                                        {
                                            $_SESSION['message'] = 'Update Successfull';
                                            echo "<script>document.location.href='doctor_edit.php?docotrID=$id'</script>";
                                        }
                                    }
                                ?>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label>Name</label>
                                            <input disabled value="<?php echo $doctor['name']?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label>Email</label>
                                            <input disabled value="<?php echo $doctor['email']?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label>Phone</label>
                                            <input disabled value="<?php echo $doctor['phone']?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label>Department</label>
                                            <input disabled value="<?php echo $doctor['department']?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label>Visiting Fee</label>
                                            <input type="text" name="visit_fee" value="<?php echo $doctor['visit_fee']?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label></label><br/>
                                            <input type="submit" name="doctor_up" value="Submit" class="btn btn-success mt-2">
                                        </div>
                                    </form>
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

    <?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>
                    