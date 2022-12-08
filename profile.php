<?php include_once('config.php'); 
session_start();

include_once(BASE_PATH.'/part/header.php');
include_once(BASE_PATH.'/telemedicine.php');
$id=$_SESSION['user_id'];
$sql="select * from users WHERE id=$id";
$result_set=$conn->query($sql);
?>
<?php include_once(BASE_PATH.'/part/nav.php'); ?>


<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <?php if (isset ($_SESSION['message'])) 
                        {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        } 
                 ?>

                <?php foreach( $result_set as $doctor){
                                $user_id = $doctor['id'];
                                $user_name = $doctor['name'];
                                $user_email = $doctor['email'];
                                $user_image = $doctor['image'];
                                $user_phone = $doctor['phone'];
                                $user_dob = $doctor['dob'];
                                $user_password = $doctor['password'];
                            } ?>


                <div class="mt-3">
                    <div class="feature-icon mb-3">

                    </div>
                    <img src="<?php echo $user_image?>" alt="" class="" style="width:300px;height:300px;">
                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">

                    <h2 class="mb-2 title-color">Your Profile</h2>
                    <p class="mb-4"></p>

                    <form class="appoinment-form" method="post" action="profile_action.php">
                        <input type="hidden" name="id" value="<?php $user_id ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" id="name" type="text" disabled class="form-control" placeholder="" value="<?php echo $user_name ?>">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="email" id="email" type="email" class="form-control" placeholder=""
                                        value="<?php echo $user_email ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="phone" id="phone" type="text" class="form-control "
                                        placeholder="Your Phone Number" value="<?php echo $user_phone ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Password *" value="<?php echo $user_password ?>" disabled>
                                    <!-- <h6> <a href=" Password.php" title="Want to update password? click here"> Update your password </a></h6>
                                    <p class="help-block text-danger"></p> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="date" id="date" type="date" class="form-control"
                                        placeholder="dd/mm/yyyy" value="<?php echo $user_dob?>" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- <a class="btn btn-main btn-round-full" href="" data-modal="modalTwo">Update<i class="icofont-simple-right ml-2"></i></a> -->
                    </form>
                </div>
            </div>
            
            <!-- <div class="contact-block mb-2 mb-lg-2"> -->
            <!-- <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">

                    <form class="appoinment-form" method="post" action="profile_action.php">
                        <input type="hidden" name="id" value="<?=$user_id ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" id="name" type="text" v class="form-control" placeholder=""
                                    value="<?=$user_name?>">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="email" id="email" type="email" class="form-control" placeholder=""
                                        value="<?=$user_email?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="phone" id="phone" type="text" class="form-control "
                                        placeholder="Your Phone Number" value="<?=$user['phone']?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Password *"
                                        value="" disabled>
                                    <h6> <a href=" Password.php" title="Want to update password? click here"> Update
                                            your password </a></h6>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="date" id="date" type="date" class="form-control"
                                        placeholder="dd/mm/yyyy" value="<?=$user['dob']?>" disabled>
                                </div>
                            </div>


                        </div>


                        <a class="btn btn-main btn-round-full" href="" data-modal="modalTwo">Update</a>
                    </form>
                </div>
            </div> -->
        </div>
            
        </div>
    </div>
    </div>
</section>


<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>