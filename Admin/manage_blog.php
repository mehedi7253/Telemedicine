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
                                <h1>Manage, <span>Blog</span></h1>
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
                               
                               <h4 class="text-success">
                               <?php if (isset ($_SESSION['message'])) 
                                    {
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    } 
                                ?>
                               </h4>
                                
                                <div class="card-body">
                                   <div class="table-responsive">
                                        <table id="myTable" class="display table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Blog Title</td>
                                                    <td>Blog Image</td>
                                                    <td>Blog Description</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $blog = mysqli_query($conn, "SELECT * FROM blogs");
                                                    $i = 1;
                                                ?>
                                                <?php while($row = mysqli_fetch_assoc($blog)){?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $row['blog_title']; ?></td>
                                                        <td>
                                                            <img class="img-thumb" src="../<?php echo $row['blog_image'];?>" style="height: 70px; width: 70px;">
                                                        </td>
                                                        <td style="width: 50%">
                                                            <?php
                                                             $blog_id = $row['id'];
                                                             $desc = $row['description'];
                                                             $strcut = substr($desc,0,200);
                                                             $desc = substr($strcut, 0, strrpos($strcut, ' ')).'....'.'<a href="update_blog.php?blogID='.$row['id'].'" class="text-decoration-none">Read More</a>';
                                                             echo $desc;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="update_blog.php?blogID=<?php echo $row['id']?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                                            <a href="delete.php?blogID=<?php echo $row['id']?>" class="btn btn-danger"><i class="fa fa-tarh"></i>Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
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
    <script>
        CKEDITOR.replace( 'description' );

        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>       