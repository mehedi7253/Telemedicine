<?php include_once('config.php');
session_start(); ?>
<?php include_once(BASE_PATH.'/part/header.php');
include_once(BASE_PATH.'/telemedicine.php');
$sql="SELECT doctor.id, doctor.name,email,users.image as img,department,specialization,visit_fee
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


        


        <!-- <div class="row justify-content-center">
            

            <form  class="search-form">
          
              <i class="fa fa-search"></i>
              <input type="text" name="search" id="search-item" placeholder="search by name" oneKeyup = "search()" >
        </form>
            
        </div> -->


        <!-- <div class="row justify-content-center">
            <div class="col-4 text-center  mb-5">

                <form action="#" class="search-form">
               
                    <input type="search" name="search" id= "search-item" placeholder="search by name" oneKeyup = "search()" >
                    <input type="submit">

                </form>
            </div>
        </div> -->
        <div class="col-12 text-center  mb-5">
            <div class="btn-group btn-group-toggle " data-toggle="buttons">
                <label class="btn active ">
                    <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department
                </label>
                <label class="btn ">
                    <input type="radio" name="shuffle-filter" value="cat1" />Cardiology
                </label>
                <label class="btn">
                    <input type="radio" name="shuffle-filter" value="cat2" />Dental
                </label>
                <label class="btn">
                    <input type="radio" name="shuffle-filter" value="cat3" />Neurology
                </label>
                <label class="btn">
                    <input type="radio" name="shuffle-filter" value="cat4" />Medicine
                </label>
                <label class="btn">
                    <input type="radio" name="shuffle-filter" value="cat5" />Traumatology
                </label>
                <label class="btn">
                    <input type="radio" name="shuffle-filter" value="cat6" />Psychiatrist
                </label>
                <label class="btn">
                    <input type="radio" name="shuffle-filter" value="cat7" />Radiology
                </label>
                <label class="btn">
                    <input type="radio" name="shuffle-filter" value="cat8" />Gianologist
                </label>


            </div>
        </div>

        <div class="row shuffle-wrapper portfolio-gallery" id="doctor-list">
            <?php foreach($result_set as $doctor){?>

            <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat1&quot;]">
                <div class="position-relative doctor-inner-box">
                    <div class="doctor-profile">
                        <div class="doctor-img">
                            <img src="<?= BASE_URL ?>images/users/<?=$doctor['img']?>" alt="doctor-image" width="260" height="260" >
                        </div>
                    </div>
                    <div class="content mt-3">
                        <h4 class="mb-0"><a href="doctor-single.php?doctor_id=<?=$doctor['id']?>"><?=$doctor['name']?></a></h4>
                        <p><?=$doctor['department']?></p>
                    </div>
                </div>
            </div>
          <?php } ?>

            <!-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat2&quot;]">
                <div class="position-relative doctor-inner-box">
                    <div class="doctor-profile">
                        <div class="doctor-img">
                            <img src="images/team/8.jpg" alt="doctor-image" width="260" height="260">
                        </div>
                    </div>
                    <div class="content mt-3">
                        <h4 class="mb-0"><a href="doctor-single.php">Harrision Samuel</a></h4>
                        <p>Radiology</p>
                    </div>
                </div>
            </div> -->

           

            <!-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat3&quot;,&quot;cat4&quot;]">
                <div class="position-relative doctor-inner-box">
                    <div class="doctor-profile">
                        <div class="doctor-img">
                            <img src="images/team/9.jpg" alt="doctor-image" width="260" height="260">
                        </div>
                    </div>
                    <div class="content mt-3">
                        <h4 class="mb-0"><a href="doctor-single.php">Edward john</a></h4>
                        <p>Pediatry</p>
                    </div>
                </div>
            </div> -->

           
          


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