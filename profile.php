<?php include_once('config.php'); 
session_start();

include_once(BASE_PATH.'/part/header.php');
include_once(BASE_PATH.'/telemedicine.php');
$id=$_SESSION['user_id'];
$sql="select * from users WHERE id=$id";
$result_set=$conn->query($sql);
$user = mysqli_fetch_assoc($result_set);
?>
<?php include_once(BASE_PATH.'/part/nav.php'); ?>


<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 float-left">
                <?php if (isset ($_SESSION['message'])) 
                        {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        } 
                 ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Well Come, <span class="text-success"><?php echo $user['name'];?></span></h5>
                    </div>
                    <div class="card-body">
                        <i class="ico-home"></i> <a href="profile.php" class="">Home</a><br/>
                        <i class="ico-home"></i> <a href="update_profile.php">Update Profile</a><br/>
                        <i class="ico-home"></i> <a href="change_pass.php">Change Password</a><br/>
                        <i class="ico-home"></i> <a href="change_profile_pic.php">Update Profile Picture</a><br/>
                        <i class="ico-home"></i> <a href="appointment_list.php">Appointment List</a><br/>
                        <i class="fa-file-text"></i> <a href="profile.php">Prescription List</a><br/>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-12 float-left">
               <div class="card">
                    <div class="card-header">
                        <h5>My Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-4 col-sm-12 float-left">
                            <img src="<?php echo $user['image']?>" style="height: 200px; width: 100%;">
                        </div>
                        <div class="col-md-8 col-sm-12 float-left">
                            <div class="form-group">
                                <input value="<?php echo $user['name']?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <input value="<?php echo $user['email']?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <input value="<?php echo $user['phone']?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <input value="<?php echo $user['dob']?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <input type="password" value="<?php echo $user['password']?>" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
            
        </div>
    </div>
    </div>
</section>


<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>