<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$sql="SELECT users.id as UserID,doctor.id as DoctorID,doctor.name,email,users.image as img,department,specialization,visit_fee
FROM doctor
INNER JOIN users
ON doctor.user_id = users.id";


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
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Image</th>
                                                    <th>Department</th>
                                                    <th>visit fee</th>
                                                    <th>Specialization</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($result_set as $doctor){?>
                                                <tr>
                                                    <td><?=$doctor['name']?></td>
                                                    <td><?=$doctor['email']?></td>
                                                    <td><img src="<?= BASE_URL ?>images/users/<?=$doctor['img']?>" width="100" height="100"></td>
                                                    <td><?=$doctor['department']?></td>
                                                    <td><?=$doctor['visit_fee']?></td>
                                                    <td><?=$doctor['specialization']?></td>
                                                    <td>
                                                        <a href="doctor_edit.php?docotrID=<?php echo $doctor['DoctorID']?>" class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5" href="delete.php?delete_doctor=<?php echo $doctor['UserID']?>"><i class="fa fa-trash-o"></i>Delete</a>
                                                    </td>     
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
                    