
<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="">
				<div class="icon d-flex align-items-center">
						<i class="icofont-heart-beat-alt text-lg"></i>
						<h4 class="mt-3 mb-3"> Telemedicine BD</h4>
				</div>
			</a>
			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>	
					<li class="nav-item"><a class="nav-link" href="doctor.php">Doctors</a></li>	
					<li class="nav-item"><a class="nav-link" href="blog.php">Blogs</a></li>			
					<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
					<?php
					if(isset ($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['user_role'] == '0'){?> 
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="blog-sidebar.php" id="dropdown05" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<img src="<?php echo $_SESSION['user_image'] ?>" style="height: 40px; width: 40px; border-radius: 50%;"> 
								<?php echo $_SESSION['user_name'] ?>
								<i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown05">
								<li><a class="dropdown-item" href="profile.php">Profile</a></li>
								<li><a class="dropdown-item" href="sign_out.php">Log Out</a></li>
							</ul>
						</li>
					<?php }else{?>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="sign_up.php">SignUp</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="sign_in.php">SignIn</a></li>
					<?php }
					?>
					
				</ul>
			</div>
		</div>
	</nav>
</header>
