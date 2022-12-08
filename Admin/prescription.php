<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php'); 
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
<!-- /# sidebar -->

<?php include_once(BASE_PATH.'/Admin/partial/topnav.php');

?>

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
                <div class="pr-wrapper">
                    <div class="pr-header mt-3 mb-3">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-6">

                                    <div class="pr-info">
                                        <h5>
                                            <td>Patient information :</td>
                                        </h5>
                                        <h6>
                                            <td><?=$doctor_schedule['name']?></td>
                                        </h6>
                                        <h6>
                                            <td><?=$doctor_schedule['email']?></td>
                                        </h6>
                                        <h6>
                                            <td><?=$doctor_schedule['name']?></td>
                                        </h6>
                                        <p class="mb-0">
                                            <small>Address: <span>Dhaka, Bangladesh</span></small>
                                        </p>
                                        <p>
                                            <small>mobile: <span>+8801712345678</span></small>
                                        </p>
                                    </div>


                                </div>
                                <div class="col-6">
                                    <div class="pr-logo">
                                        <!-- <img
                                                    src="https://seeklogo.com/images/H/hospital-clinic-plus-logo-7916383C7A-seeklogo.com.pngk"
                                            >
                                                    alt=""
                                                  /> -->


                                        <i class="icofont-heart-beat-alt text-lg" style="font-size: 0.73em" ;></i>
                                        <h4 class="mt-3 mb-3"> Telemedicine BD</h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pr-body my-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <div class="pr-left-box">
                                        <div class="card mb-3">
                                            <div class="card-header text-center bg-primary text-light">
                                                <h5>Symptoms</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul></ul>
                                                <input type="text" placeholder="Add Symptom" />
                                            </div>
                                        </div>
                                        <div class="card mb-3">
                                            <div class="card-header text-center bg-primary text-light">
                                                <h5>Test</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul></ul>
                                                <input type="text" placeholder="Add Test" />
                                            </div>
                                        </div>
                                        <div class="card mb-3">
                                            <div class="card-header text-center bg-primary text-light">
                                                <h5>Advice</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul></ul>
                                                <input type="text" placeholder="Add Advice" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="pr-prescription-box">
                                        <div class="card mb-3">
                                            <div class="card-header text-center bg-primary text-light">
                                                <h5>Prescription</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul></ul>
                                                <input class="w-100" type="text" placeholder="Add Medicine" />
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-primary">Submit</button>
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