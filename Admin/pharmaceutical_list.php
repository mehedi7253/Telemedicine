<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$sql="select * from users WHERE role = 3";
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
                                                    <th>Company Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($result_set as $users){?>
                                                <tr>
                                                    <td><?=$users['name']?></td>
                                                    <td><?=$users['email']?></td>
                                                    <td><?=$users['phone']?></td>
                                                    <td><button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-pencil"></i>Upadate</button>
                                                    <button type="button" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-trash-o"></i>Delete</button></td>
                                                    
                                                </tr>
                                                
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>