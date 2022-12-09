<?php
session_start();

if (!$_POST) header('location:sign_in.php');
$flag = true;
$message .= '';
if ($_POST['email'] == ''){
	$message .= "You must type your email <br>";
	$flag = false;
} else {
   $email = $_POST["email"];
}

if($_POST['password'] == '' ){
   $message .= "You must type your password <br>";
   $flag = false;
} else {
   $password = md5($_POST["password"]);
}


if(!$flag){
	$_SESSION['message']=$message;
	header('localtion:sign_in.php');exit;
}



include'telemedicine.php';
$sql="select * from users where email='$email' AND password ='$password'";

//echo $sql;exit;
$result_set=$conn->query($sql); 
//echo $result_set->num_rows; exit;

if($result_set->num_rows>0){
	//echo 'valid user';
    $_SESSION['logged_in'] = true;
   // print_r( $result_set);exit;
   
   foreach( $result_set as $user){
	 $_SESSION['user_id'] = $user['id'];
	 $_SESSION['user_name'] = $user['name'];
     $_SESSION['user_email'] = $user['email'];
	 $_SESSION['user_role'] = $user['role'];
	 $_SESSION['user_image'] = $user['image'];
   }
   if($_SESSION['user_role']==1||$_SESSION['user_role']==2 || $_SESSION['user_role']==3){

   $_SESSION['backenduser'] = true;
   
  }
  else{
	$_SESSION['backenduser'] = false;
  }
   unset($_SESSION['login_count']);
   
}
 else {
	 if(!isset($_SESSION['login_count'])){
         $_SESSION['login_count']=0;
	}
    $_SESSION['login_count']++;
	// echo 'invalid user';
	if ($_SESSION['login_count']>=3){
	 setcookie('blocked', 'true', time() + (60 * 10), "/"); 
	 unset($_SESSION['login_count']);
	}
	$_SESSION['message']='user name or password is wrong. attempt:'.$_SESSION['login_count'];
    
	 unset($_SESSION['logged_in']);
	 header('location:sign_in.php');
	 exit;
 }
 if ($_SESSION['user_role']==1){

	header("location:Admin/index.php");	
 }else if($_SESSION['user_role'] == 2){

	header("location:Admin/doc_profile.php");	
 }else if($_SESSION['user_role'] == 3){

	header("location:Admin/index.php");	
 }
 else if ($_SESSION['user_role']==0){
	
	header("location:profile.php");	
 }


?>