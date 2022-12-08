
<?php
session_start();
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$confirm_pass=md5($_POST['confirm_pass']);
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$target_dir = "images/users/";


$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}




include'telemedicine.php';
$sql="select * from users where email='$email'";
$result_set=$conn->query($sql); 
if($result_set->num_rows>0){
	$_SESSION['message']= "email already exist";
	header('location:sign_up.php'); exit;
}
$sql = "INSERT INTO `users` ( `name`,`email`,`password`,`phone`,`dob`,`image`,`role`) 
					VALUES ('$name','$email','$password','$phone','$dob','$target_file',0)";
				
if($conn->query($sql)) 
{
	$msg= " Registered  Sucessfully " ;
}	
else
{
	$msg= " Error: ".$conn->error;
}
$_SESSION['message']= $msg; 

header('location:sign_up.php')

?>