<?php include_once('config.php'); ?>
<?php include_once(BASE_PATH.'/part/header.php');
include_once(BASE_PATH.'/telemedicine.php');
$doctor_id = $_GET['doctor_id'];
$sql="SELECT doctor.name, doctor.user_id, email,users.image as img,users.phone as phone, department,specialization,visit_fee
FROM doctor
INNER JOIN users
ON doctor.user_id = users.id WHERE doctor.user_id = $doctor_id  ";


$result_set=$conn->query($sql);

?>
<?php include_once(BASE_PATH.'/part/nav.php'); ?>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Doctor Details</span>
                    <h1 class="text-capitalize mb-5 text-lg">Alexandar james</h1>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section doctor-single">
    <?php foreach($result_set as $doctor){?>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="doctor-img-block">
                    <img src="<?= BASE_URL ?>images/users/<?=$doctor['img']?>" alt="" class="img-fluid w-100">

                    <div class="info-block mt-4">
                        <h4 class="mb-0"><?=$doctor['name']?></h4>
                        <p><?=$doctor['department']?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6">
                <div class="doctor-details mt-4 mt-lg-0">
                    <h2 class="text-md">Introducing to myself</h2>
                    <div class="divider my-4"></div>
                    <!-- <h4 class="mb-0"><?=$doctor['name']?></h4> -->
                    </br>
                    <div class="contact-information">
					<!-- <h4>Contact information : <?=$doctor['email']?></h4> -->
                        <div class="phone-content">
                            <h4 class="mt-2">
                                <span class="contact-title">Name:</span>
                                <span class="phone-number"><?=$doctor['name']?></span>
                            </h4>
                        </div>
                        <h4 class="mt-2">
                            <span class="contact-title">Email:</span>
                            <span class="contact-email"><?=$doctor['email']?></span>
                        </h4>
                        <div class="address-content">
						<h4 class="mt-2">
                            <span class="contact-title">Phone:</span>
                            <span class="mail-address"><?=$doctor['phone']?></span>
							</h4>
                        </div>

                        <div class="website-content">
						<h4 class="mt-2">
                            <span class="contact-title">Department:</span>
                            <span class="contact-website"><?=$doctor['department']?></span>
							</h4>
                        </div>
                        <div class="skype-content">
						<h4 class="mt-2">
                            <span class="contact-title">specialization :</span>
                            <span class="contact-skype"><?=$doctor['specialization']?></span>
							</h4>
                        </div>
                        <div class="skype-content">
						<h4 class="mt-2">
                            <span class="contact-title">Visiting Price:</span>
                            <span class="contact-skype"><?= number_format($doctor['visit_fee'],2)?></span>
							</h4>
                        </div>
                    </div>

                    <a href="appointment.php?doctor_id=<?php echo $doctor['user_id']?>" class="btn btn-main-2 btn-round-full mt-3">Make an Appoinment<i
                            class="icofont-simple-right ml-2  "></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</section>



<section class="section doctor-skills">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>My skills</h3>
                <div class="divider my-4"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In architecto voluptatem alias, aspernatur
                    voluptatibus corporis quisquam? Consequuntur, ad, doloribus, doloremque voluptatem at consectetur
                    natus eum
                    ipsam dolorum iste laudantium tenetur.</p>
            </div>
            <div class="col-lg-4">
                <div class="skill-list">
                    <h5 class="mb-4">Expertise area</h5>
                    <ul class="list-unstyled department-service">
                        <li><i class="icofont-check mr-2"></i>International Drug Database</li>
                        <li><i class="icofont-check mr-2"></i>Stretchers and Stretcher Accessories</li>
                        <li><i class="icofont-check mr-2"></i>Cushions and Mattresses</li>
                        <li><i class="icofont-check mr-2"></i>Cholesterol and lipid tests</li>
                        <li><i class="icofont-check mr-2"></i>Critical Care Medicine Specialists</li>
                        <li><i class="icofont-check mr-2"></i>Emergency Assistance</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget  gray-bg p-4">
                    <h5 class="mb-4">Make Appoinment</h5>

                    <ul class="list-unstyled lh-35">
                        <li class="d-flex justify-content-between align-items-center">
                            <span>Monday - Friday</span>
                            <span>9:00 - 17:00</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span>Saturday</span>
                            <span>9:00 - 16:00</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span>Sunday</span>
                            <span>Closed</span>
                        </li>
                    </ul>

                    <div class="sidebar-contatct-info mt-4">
                        <p class="mb-0">Need Urgent Help?</p>
                        <h3 class="text-color-2">+23-4565-65768</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>


<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>