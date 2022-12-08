<?php include_once('../config.php');
session_start();
if (!$_SESSION['backenduser']) {
  header('location:../index.php');
}
?>
<?php include_once(BASE_PATH . '/Admin/partial/header.php');
include_once(BASE_PATH . '/telemedicine.php');

$doctor_id = $_SESSION['user_id'];
$sql = "SELECT users.name as DoctorName, users.email, users.image, users.dob, doctor.department, doctor.specialization, doctor.visit_fee FROM users, doctor WHERE doctor.user_id = users.id AND users.id = $doctor_id";
// $sql = "SELECT doctor.name,email,users.image as img,department,specialization,visit_fee
// FROM doctor
// INNER JOIN users
// ON doctor.user_id = users.id WHERE user_id = $doctor_id";
$result_set = $conn->query($sql);
$doctor = mysqli_fetch_assoc($result_set);
?>

<?php include_once(BASE_PATH . '/Admin/partial/header.php'); ?>

<?php include_once(BASE_PATH . '/Admin/partial/sidebar.php'); ?>
<!-- /# sidebar -->
<?php include_once(BASE_PATH . '/Admin/partial/topnav.php'); ?>



<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
          <div class="page-header">
            <div class="page-title">
              <h1>Hello,
                <span>Welcome Here</span>
              </h1>
            </div>
          </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
          <div class="page-header">
            <div class="page-title">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">App-Profile</li>
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
              <div class="card-body">
                <div class="user-profile">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="user-photo m-b-30">
                        <img class="img-fluid" src="<?= BASE_URL ?>images/users/<?php echo $doctor['image'] ?>" alt="" />
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="user-profile-name"><?php echo $doctor['DoctorName'] ?></div>

                      <div class="user-job-title"><?php echo $doctor['department'] ?></div>

                      <div class="custom-tab user-profile-tab">
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active">
                            <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="1">
                            <div class="contact-information">
                              <h4>Contact information</h4>
                              <div class="phone-content">
                                <span class="contact-title">Name</span>
                                <span class="phone-number"><?php echo $doctor['DoctorName'] ?></span>
                              </div>
                              <div class="email-content">
                                <span class="contact-title">Email:</span>
                                <span class="contact-email"><?php echo $doctor['email'] ?></span>
                              </div>
                              <div class="address-content">
                                <span class="contact-title">Password</span>
                                <span class="mail-address">****</span>
                              </div>

                              <div class="website-content">
                                <span class="contact-title">Department</span>
                                <span class="contact-website"><?php echo $doctor['department'] ?></span>
                              </div>
                              <div class="skype-content">
                                <span class="contact-title">specialization</span>
                                <span class="contact-skype"><?php echo $doctor['specialization'] ?></span>
                              </div>
                              <div class="skype-content">
                                <span class="contact-title">Visiting Fee</span>
                                <span class="contact-skype"><?php echo number_format($doctor['visit_fee'], 2) ?></span>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /# row -->

        <!-- /# column -->

        <!-- /# column -->
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="footer">
          <p>2022 © Admin Board. -
            <a href="#">example.com</a>
          </p>
        </div>
      </div>
    </div>
    </section>
  </div>
</div>
</div>







<!-- Common -->
<script src="js/lib/jquery.min.js"></script>
<script src="js/lib/jquery.nanoscroller.min.js"></script>
<script src="js/lib/menubar/sidebar.js"></script>
<script src="js/lib/preloader/pace.min.js"></script>
<script src="js/lib/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>

</body>

</html>