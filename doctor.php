<?php include_once('config.php');
session_start(); ?>
<?php include_once(BASE_PATH.'/part/header.php');
include_once(BASE_PATH.'/telemedicine.php');
$sql="SELECT doctor.id, doctor.user_id, doctor.name,email,users.image as img,department,specialization,visit_fee
FROM doctor
INNER JOIN users
ON doctor.user_id = users.id";
$result_set=$conn->query($sql);

#print_r($result_set);exit;
?>

<?php include_once(BASE_PATH.'/part/nav.php'); ?>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">All Doctors</span>
                    <h1 class="text-capitalize mb-5 text-lg">Specalized doctors</h1>

                    <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Doctors</a></li>
          </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>


<!-- portfolio -->
<section class="section doctors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Doctors</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>We provide a wide range of creative services adipisicing elit. Autem maxime rem modi eaque,
                        voluptate. Beatae officiis neque </p>
                </div>
            </div>
        </div>

        <div class="row shuffle-wrapper portfolio-gallery" id="doctor-list">
            <?php foreach($result_set as $doctor){?>

            <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item">
                <div class="position-relative doctor-inner-box" style="border: 1px solid silver;">
                    <div class="doctor-profile">
                        <div class="doctor-img">
                            <img src="images/users/<?php echo $doctor['img']?>" alt="doctor-image" width="100%" height="150px" >
                        </div>
                    </div>
                    <div class="content mt-3 m-3">
                        <h4 class="mb-0 text-center"><a href="doctor-single.php?doctor_id=<?php echo $doctor['user_id']?>"><?php echo $doctor['name']?></a></h4>
                        <p>Department: <?=$doctor['department']?></p>
                        <p>Visiting Fee: <?php echo number_format($doctor['visit_fee'],2)?></p>
                        <a class="btn btn-secondary" href="doctor-single.php?doctor_id=<?=$doctor['user_id']?>">Visit profile</a>
                    </div>
                </div>
            </div>
          <?php } ?>

         
           

        

           
          


</section>
<!-- /portfolio -->
<section class="section cta-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="cta-content">
                    <div class="divider mb-4"></div>
                    <h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have
                            the healthy</span></h2>
                    <a href="appoinment.html" class="btn btn-main-2 btn-round-full">Get appoinment<i
                            class="icofont-simple-right  ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>