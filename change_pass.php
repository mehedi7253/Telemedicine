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
                <?php 
                    if (isset ($_SESSION['message'])) 
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
                        <h3>Change Password</h3>
                    </div>
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
                                        $sql = "SELECT * FROM users WHERE id = '$user[id]' AND password = '$has_pass'"; // check password hash
                                        $result = mysqli_query($conn, $sql); // connect with query and database
        
                                        $up = mysqli_fetch_assoc($result);
        
                                        if ($up !=0){
                                            $change_pass = "UPDATE users SET password = '$new_pass_hash' WHERE id = '$user[id]'"; // update password
                                            $res_change  = mysqli_query($conn, $change_pass);// connect with query and database
    
                                            $_SESSION['message'] = "Password Change Successful";
                                            // echo "<script>document.location.href='change_pass.php'</script>";
                                        }else{
                                            echo "<span class='text-danger'>Password Does Not Match With Current Password</span>";
                                            // echo "<script>document.location.href='change_pass.php'</script>";    
                                       }
                                    }
                                }
                            }
                        ?>
                        <form action="" method="POST">
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
                                <button type="submit" name="change_pass" class="btn btn-success">Submit</button>
                            </div>
                        </form>
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