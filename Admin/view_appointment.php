<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}

include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$patient_id=$_GET['patient_id'];
$sql="SELECT users.name as name,users.email as email, users.image as img,
doctor_schedule.patient_id as patient_id, doctor_schedule.start_time as start_time ,
doctor_schedule.end_time as end_time,doctor_schedule.shchedule_date FROM `doctor_schedule`  
INNER JOIN users on doctor_schedule.patient_id = users.id WHERE patient_id = $patient_id";

// $sql="SELECT from doctor_schedule  WHERE patient_id IS NOT NULL";
$result_set=$conn->query($sql);
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
            <?php foreach($result_set as $doctor_schedule){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="user-profile">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="user-photo m-b-30">
                                                <img class="" src="<?= BASE_URL ?><?=$doctor_schedule['img']?>" width="200" height="200"
                                                    alt="" />
                                            </div>
                                           
                                            <div class="user-skill">
                                                <h4>Skill</h4>
                                                <ul>
                                                    <li>
                                                        <a href="#">Branding</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">UI/UX</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Web Design</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Magento</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                 

                                            <div class="custom-tab user-profile-tab">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active">
                                                        
                                            <div class="user-profile-name">About</div>

                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="1">
                                                        <div class="contact-information">
                                                            <h4>Contact information</h4>
                                                            <div class="phone-content">
                                                                <span class="contact-title">Id</span>
                                                                <span class="phone-number"><?=$doctor_schedule['patient_id']?></span>
                                                            </div>
                                                            <div class="phone-content">
                                                                <span class="contact-title">Name</span>
                                                                <span class="phone-number"><?=$doctor_schedule['name']?></span>
                                                            </div>
                                                            <div class="email-content">
                                                                <span class="contact-title">Email:</span>
                                                                <span class="contact-email"><?=$doctor_schedule['email']?></span>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="basic-information">
                                                            <h4>Payment information</h4>
                                                            <div class="birthday-content">
                                                                <span class="contact-title">Payment</span>
                                                                <span class="birth-date">due </span>
                                                            </div>
                                                            <div class="">
                                                                <span class="contact-title">Payment</span>
                                                                <span class="">Done</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </section>
        </div>
    </div>
</div>

<?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>