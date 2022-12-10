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
    <?php   
        if(isset($_GET['pay']))
        {
            $id = $_GET['pay'];
            $sql = mysqli_query($conn, "SELECT * FROM appointment WHERE id = '$id'");

            $row = mysqli_fetch_assoc($sql);  
        }

        if(isset($_POST['bkas']))
        {
            $payment = mysqli_query($conn, "UPDATE appointment SET account_number = '$_POST[account_number]' WHERE id = '$id'");

            header('location: success.php');
            // echo "<script>document.location.href='success.php'</script>";
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto" style="margin:15%;">
                <div class="card" style="border: 1px solid #ED0A80; background-color: #ED0A80;">
                    <div class="card-header m-2" style="background-color: white;">
                        <img src="images/baks.png" >
                    </div>
                    <div class="card-body">
                        <div class="col-md-10 mx-auto text-center text-white" style="font-size: 25px;  font-size: 20px; box-shadow: 2px 2px 2px 1px darkred; border: 2px solid red;">
                            <label>Merchant: TELEMEDICINE.COM</label><br/>
                            <label>Invoice no: <?php echo $row['serial_number']?></label><br/>
                            <label>Amount: <?php echo $row['fee']?> </label>
                        </div>
                        <div class="mt-5">
                            <p class="text-white text-center">Your bkash Account number</p>
                            <form action="" method="POST">
                                <input type="text" name="account_number" class="form-control col-md-7 mx-auto" placeholder="e.g 01XXXXXXXXX" required>
                                <div class="col-md-7 mx-auto mt-3">
                                    <input type="submit" name="bkas" class="btn btn-secondary col-6" value="Proceed">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>