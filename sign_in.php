<?php
session_start();
?>


<?php include_once('config.php'); ?>
<?php include_once(BASE_PATH.'/part/header.php'); ?>
<?php include_once(BASE_PATH.'/part/nav.php'); ?>

<section class="contact-form-wrap section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="section-title text-center">
          <h2 class="text-md mb-2">Please Create an account First</h2>
          <div class= ></div>
          <p class="mb-5"> <h5 class="mb-0">Don't have an account!!    <a href="sign_up.php" class="btn btn-main-2 ">Regester<i class="icofont-simple-right ml-3"></i> </a></h4></p>
        
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
				
					
						<?php 
							if (isset($_COOKIE['blocked'])){
								
								echo "page block";
							}else{	
						?>	
							


        <form id="contact-form" class="contact__form " method="post" action= "signin_action.php">
          <!-- form message -->
          <div class="row">
            <div class="col-12">
              <div class="alert alert-success contact__msg" style="display: none" role="alert">
                Your message was sent successfully.
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
              <input name="email" id="email" type="email" class="form-control" placeholder="Your Email Address" required>
              </div>
                  <div class="form-group">
                    <input class="form-control" name="password" type="password" placeholder="Password" required>
                      <p class="help-block text-danger"></p>
                  </div>
                  <input class="btn btn-main btn-round-full" name="submit" type="submit" value="submit"></input>
                </div>
            <div>
          </div>

         <div class="alert alert-success contact__msg" style="display: none" role="alert">
                Your message was sent successfully.
              </div>
        </form>
        <?php  } ?>
      </div>
    </div>
  </div>
</section>


		       

<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>