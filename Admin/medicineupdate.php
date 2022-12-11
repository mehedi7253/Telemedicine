<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$sql="select * from medicines WHERE user_id =".$_SESSION['user_id'];
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
                                <?php
                                    if(isset($_GET['medicine']))
                                    {
                                        $id = $_GET['medicine'];
                                        $get = mysqli_query($conn, "SELECT * FROM medicines WHERE id = $id");

                                        $medicine = mysqli_fetch_assoc($get);
                                    }

                                    if(isset($_POST['btn']))
                                    {
                                        $update = mysqli_query($conn, "UPDATE medicines SET brand_name = '$_POST[brand_name]', generic_name = '$_POST[generic_name]', type = '$_POST[type]' WHERE id = $id");

                                        $_SESSION['message'] = "Update Successful";
                                    }
                                ?>
                                <form action="" class="form-horizontal" method="POST">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input type="text" class="form-control" name="brand_name" placeholder="entre here" value="<?php echo $medicine['brand_name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Generic Name</label>
                                        <input type="text" class="form-control" name="generic_name" placeholder="entre here" value="<?php echo $medicine['generic_name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="type">
                                            <option>Capsule</option>
                                            <option>Tablet</option>
                                            <option>syrup</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="btn"  class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                </form>
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