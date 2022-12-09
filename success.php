<?php include_once('config.php'); 
session_start();?>
<?php 
include_once(BASE_PATH.'/telemedicine.php');
#print_r($result_set);exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body style="background-color: gray;">
   
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto" style="margin:15%;">
                <div class="card">
                    <div class="card-body">
                       <h3 class="text-success mt-4 text-center">Booking Successfull..!</h3>
                       <a href="index.php" class="btn btn-success text-center">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>