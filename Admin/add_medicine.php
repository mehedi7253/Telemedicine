<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php');

?>

<?php include_once(BASE_PATH.'/Admin/partial/sidebar.php'); ?>
<!-- /# sidebar -->

<?php include_once(BASE_PATH.'/Admin/partial/topnav.php'); ?>

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
                <div class="unix-login">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="login-form">
                                    <h4>Add Medicine</h4>



                                    <form action="add_medicine_action.php" class="form-horizontal" method="POST">


                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <input type="text" class="form-control" name="brand name"
                                                placeholder="entre here" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Generic Name</label>
                                            <input type="text" class="form-control" name="generic name"
                                                placeholder="entre here" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="type" required>
                                                <option>Capsule</option>
                                                <option>Tablet</option>
                                                <option>syrup</option>
                                            </select>
                                        </div>

                                        <button type="submit"
                                            class="btn btn-primary btn-flat m-b-30 m-t-30">Done</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>