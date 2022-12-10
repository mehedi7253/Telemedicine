<?php include_once('config.php'); 
session_start();?>
<?php include_once(BASE_PATH.'/part/header.php'); 
include_once(BASE_PATH.'/telemedicine.php');
#print_r($result_set);exit;
?>

<?php include_once(BASE_PATH.'/part/nav.php'); ?>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Book your Seat</span>
                    <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
     if (isset($_GET['blog']))
     {
         $blog_id = $_GET['blog'];
 
         $blogs = $conn->query("SELECT * FROM blogs WHERE id = '$blog_id'");
         $data = mysqli_fetch_assoc($blogs);
     }
?>
<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <img src="<?php echo $data['blog_image']?>" style="height: 400px" class="card-img-top">
                    <div class="card-body">
                        <h4 class="font-weight-bold"><a href="full_blog.php" class="text-decoration-none"><?php echo $data['blog_title']?></a></h4>
                        <hr/>
                        <div class="text-justify" style="line-height: 30px; font-weight: 400">
                            <p class="text-justify">
                                <?php echo $data['description']?>
                            </p>
                        </div>
                    </div>
                        <div class="card-footer">
                        <?php
                            if (!isset($_SESSION['user_id'])){
                                echo "<i class='fa fa-thumbs-up'></i></a>";

                                $sql_like_1 = "SELECT like_unlike, SUM(like_unlike) as TotaLike_1 FROM blog_like_unlike WHERE blog_like_unlike.blog_id = $blog_id";
                                $res_like_1 = mysqli_query($conn, $sql_like_1);

                                $totla_like_1 = mysqli_fetch_assoc($res_like_1);

                                if ($totla_like_1['TotaLike_1'] == 0) {
                                    echo "<span> 0 Like</span>";
                                } else {
                                    echo "<span> $totla_like_1[TotaLike_1] Like</span>";
                                }

                            }else {
                                $like_unlike = "SELECT * FROM blog_like_unlike, users, blogs WHERE 
                                                            blog_like_unlike.blog_id = $blog_id AND 
                                                            blog_like_unlike.user_id = $_SESSION[user_id]";

                                $res_like_unlike = mysqli_query($conn, $like_unlike);

                                $count = mysqli_fetch_assoc($res_like_unlike);

                                if ($count == true) {
                                    if ($count['like_unlike'] == '0') {
                                        echo "<a href='like_unlike.php?unlike_up=$blog_id'><i class='fa fa-thumbs-up'></i></a>";
                                    } else {
                                        echo "<a href='like_unlike.php?unlike=$blog_id'><i class='fa fa-thumbs-down'></i></a>";
                                    }
                                } elseif ($count !== true) {
                                    echo "<a href='like_unlike.php?like=$blog_id'><i class='fa fa-thumbs-up'></i></a>";
                                }


                                $sql_like = "SELECT like_unlike, SUM(like_unlike) as TotaLike FROM blog_like_unlike WHERE blog_like_unlike.blog_id = $blog_id";
                                $res_like = mysqli_query($conn, $sql_like);

                                $totla_like = mysqli_fetch_assoc($res_like);

                                if ($totla_like['TotaLike'] == 0) {
                                    echo "<span> 0 Like</span>";
                                } else {
                                    echo "<span> $totla_like[TotaLike] Like</span>";
                                }

                            }
                        ?>
                        <hr/>
                        <?php
                            if(isset($_POST['btn']))
                            {
                                if (!isset($_SESSION['user_id']))
                                {
                                }else{
                                    $add_comment = mysqli_query($conn, "INSERT INTO blog_comment (user_id, blog_id, comment) VALUES ('$_SESSION[user_id]','$blog_id', '$_POST[comment]')");
                                }
                            }

                        ?>
                            
                            <?php
                                $allcomment = mysqli_query($conn, "SELECT * FROM users,blog_comment WHERE blog_comment.user_id = users.id AND blog_id = $blog_id");
                                while($blog_comment = mysqli_fetch_assoc($allcomment)){?>
                                    <div class="col-md-4">
                                        <img src="<?php echo $blog_comment['image']?>" style="height: 30px; width: 30px; border-radius: 50%;">
                                        <?php echo $blog_comment['name']?>
                                    </div>
                                    <div class="form-group col-md-12 mt-2 mr-5">
                                        <textarea class="form-control" disabled><?php echo $blog_comment['comment'] ?></textarea>
                                    </div>
                                <?php }
                            ?>
                        <hr/>
                        <form action="" method="POST">
                            <?php
                                if (!isset($_SESSION['user_id']))
                                {?>
                                   
                                <?php }else{?>
                                     <div class="col-md-4">
                                        <img src="<?php echo $_SESSION['user_image']?>" style="height: 30px; width: 30px; border-radius: 50%;">
                                        <?php echo $_SESSION['user_name']?>
                                    </div>
                                    <div class="form-group col-md-6 mt-2 mr-5">
                                        <textarea class="form-control" name="comment" placeholder="Write Comment" required></textarea>
                                        <input type="submit" name="btn" class="btn btn-success mt-2 float-right">
                                    </div>
                                <?php }
                            ?>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>



<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>
<script>

</script>