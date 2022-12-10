<?php include_once('../config.php'); 
session_start();
if(!$_SESSION['backenduser']){
   header('location:../index.php'); 
}
?>
<?php include_once(BASE_PATH.'/Admin/partial/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
$sql="SELECT users.id as UserID,doctor.id as DoctorID,doctor.name, users.phone, email,users.image as img,department,specialization,visit_fee
FROM doctor
INNER JOIN users
ON doctor.user_id = users.id";


$result_set=$conn->query($sql);

$doctor = mysqli_fetch_assoc($result_set);

#print_r($result_set);exit;

?>


<?php include_once(BASE_PATH.'/Admin/partial/sidebar.php'); ?>
<?php include_once(BASE_PATH.'/Admin/partial/topnav.php'); ?>

    <!-- /# sidebar -->
  
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Manage, <span>Blog</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
            
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <?php
                                  if (isset($_GET['blogID'])){
                                        $blog_id = $_GET['blogID'];
                                    
                                        $sql = $conn->query("SELECT * FROM blogs WHERE id = '$blog_id'");

                                        $row = mysqli_fetch_assoc($sql);
                                    }
                                
                                    if(isset($_POST['blog']))
                                    {
                                        $blog  = $_POST['blog_title'];
                                        $image = $_FILES['image']['name'];
                                        $description = $_POST['description'];

                                        if($blog == ''){
                                            echo "<span class='text-danger'>Please Enter Blog Title</span><br/>";
                                        }elseif($description == ''){
                                            echo "<span class='text-danger'>Plese Write Blog Description</span><br/>";
                                        }else{

                                            if($image == ''){
                                                
                                                $update_blog = mysqli_query($conn, "UPDATE blogs SET blog_title = '$blog', description = '$description' WHERE id = '$blog_id'");

                                                if($update_blog == true)
                                                {
                                                    $_SESSION['message'] = "Blog Update Successful";
                                                    echo "<script>document.location.href='manage_blog.php'</script>";
                                                }
                                            }else{
                                                $fileinfo = PATHINFO($_FILES['image']['name']);
                                                $newFile = $fileinfo['filename'] . "." . $fileinfo['extension'];
                                                move_uploaded_file($_FILES['image']['tmp_name'], "../images/blogs/" . $newFile);
                                                $location = 'images/blogs/'.$newFile;
    
                                                $update_blog = mysqli_query($conn, "UPDATE blogs SET blog_title = '$blog', image = '$location', description = '$description' WHERE id = '$blog_id'");
    
                                                if($update_blog == true)
                                                {
                                                    $_SESSION['message'] = "Blog Update Successful";
                                                    echo "<script>document.location.href='manage_blog.php'</script>";
                                                }
                                            }
                                           
                                        }

                                    }
                                ?>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label>Blog Title</label>
                                            <input type="text" name="blog_title" class="form-control" placeholder="Enter Blog Title" value="<?php echo $row['blog_title']?>">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label>Image</label>
                                            <input type="file" name="image" value="" class="form-control">
                                        </div>
                                       <div class="form-group col-md-12 col-sm-12 float-left">
                                            <label>Write Blog Description</label>
                                            <textarea name="description"><?php echo $row['description']?></textarea>
                                       </div>
                                        <div class="form-group col-md-6 col-sm-12 float-left">
                                            <label></label><br/>
                                            <input type="submit" name="blog" value="Submit" class="btn btn-success mt-2 col-4">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php include_once(BASE_PATH.'/Admin/partial/footer.php'); ?>
    <script>
        CKEDITOR.replace( 'description' );
    </script>       