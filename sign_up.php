<?php session_start(); ?>
<?php include_once('config.php'); ?>
<?php include_once(BASE_PATH.'/part/header.php'); ?>
<?php include_once(BASE_PATH.'/part/nav.php'); ?>

<section class="contact-form-wrap section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="section-title text-center">
          <h2 class="text-md mb-2">Please Create a account First</h2>
          <div class="divider mx-auto my-4"></div>
          <p class="mb-5"> <h5 class="mb-0">Already have an account!!    <a href="sign_in.php" class="btn btn-main-2 ">Login<i class="icofont-simple-right ml-3"></i> </a></h4></p>
        
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-lg-12 col-md-6 col-sm-12">
      <?php if (isset ($_SESSION['message'])) 
            {
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            } 

		      ?>
        <form action="signup_action.php" class="contact_form " method="post" enctype="multipart/form-data">
          <!-- form message -->
        	

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input name="name" id="name" type="text" class="form-control" placeholder="Your Full Name">
              </div>
              <div class="form-group">
                <input class="form-control" name="password" type="password" placeholder="Password" required>
			            <p class="help-block text-danger"></p>
              </div>
              
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <input name="email" id="email" type="email" class="form-control" placeholder="Your Email Address" required>
              </div>
              <div class="form-group">
              <input class="form-control" name="confirm_pass" type="password" placeholder="Confirm Password" required>
			           <p class="help-block text-danger"></p>
              </div>
            </div>
            
            <div class="col-lg-6">
              <div class="form-group">
              <input name="phone" id="phone" type="text" class="form-control" placeholder="Your Phone Number" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input class="form-control" name="dob" type="date" placeholder="Date of Birth *">
                    <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
              <input class="form-control" type="file" class="form-control form-control-user"
													name="image" placeholder="Choose Doctor Image" >
              </div>
            </div>
            <div class="col-lg-6">
            </div>
            <div>
            <input class="btn btn-main btn-round-full" name="submit" type="submit" value="SUBMIT">
          </div>
      
        </form>
      </div>
    </div>
  </div>
</section>


		       

<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>