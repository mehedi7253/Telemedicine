<?php include_once('config.php'); 
session_start();?>
<?php include_once(BASE_PATH.'/part/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$sql="SELECT * FROM doctor  WHERE user_id = '42'";
$result_set=$conn->query($sql);

$sql="SELECT from doctor_schedule  WHERE patient_id IS NOT NULL";

#print_r($result_set);exit;
?>

<?php include_once(BASE_PATH.'/part/nav.php'); ?>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Book your Seat</span>
                    <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>

                    <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Book your Seat</a></li>
          </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mt-3">
                    <div class="feature-icon mb-3">
                        <i class="icofont-support text-lg"></i>
                    </div>
                    <span class="h3">Call for an Emergency Service!</span>
                    <h2 class="text-color mt-3">+84 789 1256 </h2>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-2 title-color">Book an appoinment</h2>
                    <p class="mb-4"></p>
                    <form class="appoinment-form" method="post" action="appointment_action.php">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">


                                    <select name="department" id="department-list" class="form-control" required>
                                        <option value="">Select department</option>

                                        <?php
                                              $sql = "SELECT * FROM doctor";
                                              $res = mysqli_query($conn, $sql);
                                              while ($row = mysqli_fetch_assoc($res)) {
                                                  if ($bul[$row['department']] != true && $row['department'] != 'department') {
                                              ?>
                                        <option value="<?php
                                                      echo $row['department'];
                                              ?>"><?php
                                                      echo $row['department'];
                                              ?></option>
                                        <?php
                                                      $bul[$row['department']] = true;
                                                  }
                                              }
                                              ?>

                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select name="name" class="form-control" id="doctor_list" required>

                                        <option value="">Select date</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">


                                    <select name="name" class="form-control" id="date_list" required>

                                        <option value="">Select doctor</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select name="time" id="time-list" class="form-control" required>
                                        <option value="">Select time</option>


                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-main btn-round-full">Make Appoinment<i
                                    class="icofont-simple-right ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>



<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$('#department-list').change(function() {
    $.ajax({
        type: "POST",
        url: "doctor_list_action.php",
        data: {'department_id':  $(this).val()},

        success: function(data) {
            $("#doctor_list").html(data);
        }
    });

});


$('#doctor_list').change(function() {
    $.ajax({
        type: "POST",
        url: "date_list_action.php",
        data: {'doctor_id': $(this).val()},

        success: function(data) {
            $("#date_list").html(data);
        }
    });

});


$('#date_list').change(function() {
    $.ajax({
        type: "POST",
        url: "time_list_action.php",
        data: {
            'shchedule_date':  $(this).val(),
            'doctor_id': $('#doctor_list').find(":selected").val(),
        },

        success: function(data) {
            $("#time-list").html(data);
        }
    });

})


function selectRegion(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
}
</script>