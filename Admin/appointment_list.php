<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
$doctor_id = $_SESSION ['user_id'];
include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$sql="SELECT users.name as name,users.email as email, users.image as img,doctor_schedule.patient_id as patient_id, doctor_schedule.start_time as start_time , doctor_schedule.end_time as end_time,doctor_schedule.shchedule_date FROM `doctor_schedule`  
INNER JOIN users on doctor_schedule.patient_id = users.id
WHERE doctor_id= $doctor_id  AND patient_id IS NOT NULL";
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
            
                <div class="row">

                

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                        
                                                    <th>Patients Id</th>
                                                    <th>Email</th>
                                                    <!-- <th>Image</th> -->
                                                    <th>Appointment Date</th>
                                                    <th>Appointment Time</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($result_set as $doctor_schedule){?>
                                            <tr>
                                            <td><?=$doctor_schedule['patient_id']?></td>
                                            <td><?=$doctor_schedule['email']?></td>
                                            <!-- <td><img src="<?= BASE_URL ?><?=$doctor_schedule['img']?>" width="100" height="100"></td> -->


                                                <td><?=$doctor_schedule['shchedule_date']?></td>
                                                <td><?=$doctor_schedule['start_time']?>-<?=$doctor_schedule['end_time']?></td>
                                                <td>pending</td>
                                                <td><a type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="prescription.php?patient_id=<?=$doctor_schedule['patient_id']?>"><i class="ti-eye"></i>Visit</a>
                                                <button type="button" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5" ><i class="fa fa-trash-o"></i>Delete</button>
                                               
                                            </tr>
                                            <?php }?>

                                                

                                            </tbody>
                                        </table>
                                    </div>
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