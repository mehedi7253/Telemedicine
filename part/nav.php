
<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="">
				<div class="icon d-flex align-items-center">
						<i class="icofont-heart-beat-alt text-lg"></i>
						<h4 class="mt-3 mb-3"> Telemedicine BD</h4>
				</div>
			</a>
			<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
					<?php
						if(isset ($_SESSION['logged_in']) && $_SESSION['logged_in']){ ?> 
					   <div class="profile-up"> <img src="<?= $_SESSION['user_image'] ?>" alt="" style="width:60px;height:60px;">
							<a class="" href="profile.php"><?= $_SESSION['user_name'] ?></a>
					  </div>
					
				    <?php } else{?>
						<!-- <div class="profile-up"> <img src="images/team/1.png" alt="" class="img-fluid" style="width:60px;height:60px;"> -->
						<div class="profile-up">
						<a href="sign_in.php" class="btn btn-main-2 btn-round-full btn-icon">SignIn</a>	 
					  </div>
						
				    <?php }?>



					</div>
			
			
			
			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>				
                    
					
				    <?php
				if(isset ($_SESSION['logged_in']) && $_SESSION['logged_in']){ ?> 
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="sign_out.php">Sign out</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="profile.php">Profile</a></li> 
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="doctor.php">Doctors</a></li>
					<li class="nav-item"><a class="nav-link" href="appointment.php">Appointment</a></li>
				<?php } else{?>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="sign_up.php">SignUp</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="sign_in.php">SignIn</a></li>
				<?php }?>


					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="blog-sidebar.php" id="dropdown05" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown05">
							<li><a class="dropdown-item" href="blog-sidebar.php">Blog with Sidebar</a></li>
							<li><a class="dropdown-item" href="blog-single.php">Blog Single</a></li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
