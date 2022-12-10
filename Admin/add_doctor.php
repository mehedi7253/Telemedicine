<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php'); ?>

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
            
                <div class="card-title">
                                    <h4>Add Doctor</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="horizontal-form">
                                    <form action="add_doctor_action.php" class="form-horizontal"  method="POST"  enctype="multipart/form-data">
                                           <div class="form-group">
                                                <label class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="name" class="form-control" name="name"   placeholder="Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email"  placeholder="Email" required>
                                                </div>
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"><b>Password</b></label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" name="password"  placeholder="Password" required>
                                                </div>
											</div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"><b>Phone</b></label>
                                                <div class="col-sm-10">
                                                    <input type="tel" class="form-control" name="phone"  placeholder="phone" required>
                                                </div>
											</div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"><b>Dob</b></label>
                                                <div class="col-sm-10">
                                                <input class="form-control" name="dob" type="date" placeholder="Date of Birth *">
                                                    <p class="help-block text-danger"></p>
                                                </div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label"><b>Doctor Image</b></label>
                                                <div class="col-sm-10">
												<input class="form-control" type="file" class="form-control form-control-user"
													name="image" placeholder="Choose Doctor Image" required >
                                                </div>
											</div>	
                                            <div class="form-group">
                                                <label>Department</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="department" required>
                                                        <option>Neurology</option>
                                                        <option>Cardiology</option>
                                                        <option>Psychiatrist</option>
                                                        <option>Radiology</option>
                                                        <option>Gianologist</option>
                                                        <option>Dental</option>
                                                        <option>Medicine</option>
                                                        <option>Traumatology</option>    
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-2 control-label"><b>visit fee</b></label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="visit_fee"  placeholder="00" required>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"><b>Specialization</b></label>
                                                    <div class="col-sm-10">
                                                    </br>
                                                        <input type="checkbox" id="vehicle1" name="specialization[]" value="Medicine">
                                                        <label for="vehicle1"> Medicine</label><br>
                                                        <input type="checkbox" id="vehicle2" name="specialization[]" value="Diabetes">
                                                        <label for="vehicle2"> Diabetes</label><br>
                                                        <input type="checkbox" id="vehicle3" name="specialization[]" value="Thyroid">
                                                        <label for="vehicle3"> Thyroid </label><br>
                                                        <input type="checkbox" id="vehicle1" name="specialization[]" value="Hormone">
                                                        <label for="vehicle4"> Hormone</label><br><br>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-default">Submit</button>
                                                </div>

                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                </section>
           
            </div>
        </div>
    </div>

    <?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>
                    