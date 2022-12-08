<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php');

#print_r($result_set);exit;

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

                <div class="unix-login  col-lg-12">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="login-form">
                                    <h4>Add pharmaceutical</h4>

                                   
                                    <form action="add_pharmaceutical_action.php" class="appoinment-form" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="name" id="name" type="text" class="form-control"
                                                        placeholder="Company Name" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="email" id="email" type="email" class="form-control"
                                                        placeholder="Email Address" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password" value=""
                                                        placeholder="Password" id="myInput" required>
                                                    <input type="checkbox" onclick="myFunction()">Show Password
                                                    <script>
                                                    function myFunction() {
                                                        var x = document.getElementById("myInput");
                                                        if (x.type === "password") {
                                                            x.type = "text";
                                                        } else {
                                                            x.type = "password";
                                                        }
                                                    }
                                                    </script>


                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="phone" id="phone" type="tel" class="form-control"
                                                        placeholder="Phone" required>
                                                </div>
                                            </div>


                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit"
                                                    class="btn btn-primary btn-md m-b-10 m-l-5">Submit</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>


            </section>
        </div>
    </div>
</div>

<?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>