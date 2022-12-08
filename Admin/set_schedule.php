<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
$doctor_id = $_SESSION ['user_id'];
 include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$sql="select * from doctor_schedule WHERE doctor_id = $doctor_id ";
$result_set=$conn->query($sql);
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


                <div class="row">



                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <div class="float-right">

                                            <button class="button" id="add_schedule_btn" data-modal="schedule_modal"> <span class="ti-plus"> Add
                                                    schedule
                                                </span></button>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th> Date</th>
                                                <th>Start time</th>
                                                <th>End time</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach($result_set as $doctor_schedule){?>
                                            <tr>

                                                <td><?=$doctor_schedule['shchedule_date']?></td>
                                                <td><?=$doctor_schedule['start_time']?></td>
                                                <td><?=$doctor_schedule['end_time']?></td>
                                                <td><button type="button"
                                                        class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"><i
                                                            class="fa fa-trash-o"></i>Delete</button></td>

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





                <?php include_once(BASE_PATH.'/Admin/partial/popup_css.php'); ?>



                <div id="schedule_modal" class="modal">
                    <div class="modal-content modal-fodal">
                        <div class="contact-form">
                            <span class="close">&times;</span>

                            <form action="schedule_action.php" class="form-horizontal" method="POST">

                                <div class="form-group">
                                    <label>Date</label>
                                    <input name="shchedule_date" id="schedule_date" type="date" class="form-control"
                                        placeholder="" required>

                                </div>

                                <div class="form-group">
                                    <label>Start Time</label>
                                    <input name="start_time" type="time" class="form-control schedule_time" placeholder="" 
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>End Time</label>
                                    <input name="end_time" type="time" class="form-control schedule_time" placeholder="Time" required>
                                </div>

                                <div class="form-group">
                                    <label>Consulting time</label>
                                    <select class="form-control" name="slot" required>
                                        <option>5</option>
                                        <option>10 </option>
                                        <option>15 </option>
                                        <option>20 </option>
                                        <option>25 </option>
                                        <option>30 </option>
                                        <option>35 </option>
                                        <option>40 </option>
                                        <option>45 </option>
                                        <option>50 </option>
                                        <option>55 </option>
                                        <option>60 </option>
                                        <option>65 </option>
                                        <option>70 </option>
                                        <option>75 </option>
                                        <option>80 </option>
                                        <option>85 </option>
                                        <option>90 </option>
                                        <option>95 </option>
                                        <option>100</option>
                                        <option>115</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Done</button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>


                let modalBtns = [...document.querySelectorAll(".button")];
                modalBtns.forEach(function(btn) {
                    btn.onclick = function() {
                        let modal = btn.getAttribute("data-modal");
                        document.getElementById(modal).style.display = "block";
                    };
                });
                let closeBtns = [...document.querySelectorAll(".close")];
                closeBtns.forEach(function(btn) {
                    btn.onclick = function() {
                        let modal = btn.closest(".modal");
                        modal.style.display = "none";
                    };
                });
                window.onclick = function(event) {
                    if (event.target.className === "modal") {
                        event.target.style.display = "none";
                    }
                };

                </script>



        </div>
    </div>

    </section>
</div>
</div>
</div>

<?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>