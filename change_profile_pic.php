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
                        <i class="ico-home"></i> <a href="profile.php">Appointment List</a><br/>
                        <i class="fa-file-text"></i> <a href="profile.php">Prescription List</a><br/>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-12 float-left">
               <div class="card">
                    <div class="card-header">
                        <h3>Update Profile Picture</h3>
                    </div>
                    <div class="card-body">
                        <?php
                           if(isset($_POST['update_user'])){
                                $image = $_FILES['image']['name'];
                                
                                if($image == '')
                                {
                                    echo "<p class='text-danger'>Select An Image</p>";
                                }else{
                                    $fileinfo = PATHINFO($_FILES['image']['name']);
                                    $newFile = $fileinfo['filename'] . "." . $fileinfo['extension'];
                                    move_uploaded_file($_FILES['image']['tmp_name'], "images/users/" . $newFile);
                                    $location = 'images/users/'.$newFile;
        
                                    $sql_update = mysqli_query($conn, "UPDATE users SET image = '$location' WHERE id = $user[id]"); 
                                    $_SESSION['message'] = "Profile Update Success";
                                }
                            }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-md-4 mx-auto">
                               <img src="<?php echo $user['image']?>" style="height: 150px; width: 150px; border-radius: 50%;">
                            </div>
                            <div class="form-group col-md-6 mx-auto">
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <button type="submit" name="update_user" class="btn btn-success">Submit</button>
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