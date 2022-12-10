<?php include_once('config.php');
session_start(); ?>
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
                    <span class="text-white">All Blogs</span>
                    <h1 class="text-capitalize mb-5 text-lg">Blogs</h1>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- portfolio -->
<section class="section doctors">
    <div class="container">
        <div class="row shuffle-wrapper portfolio-gallery" id="doctor-list">
            <?php 
            $sql = mysqli_query($conn, "SELECT * FROM blogs");

            while($blogs = mysqli_fetch_assoc($sql)){?>

            <div class="col-lg-4 col-sm-6 col-md-6 mb-4 shuffle-item">
                <div class="position-relative doctor-inner-box" style="border: 1px solid silver;">
                    <div class="doctor-profile">
                        <div class="doctor-img">
                            <img src="<?php echo $blogs['blog_image']?>" alt="doctor-image" width="100%" height="150px" >
                        </div>
                    </div>
                    <div class="content mt-3 m-3">
                        <h4 class="mb-0 text-center">
                            <a href="blog-single.php?blogID=<?php echo $blogs['id']?>"><?php echo $blogs['blog_title']?></a>
                        </h4>
                        <p>
                        <?php
                            $blog_id = $blogs['id'];
                            $desc = $blogs['description'];
                            $strcut = substr($desc,0,200);
                            $desc = substr($strcut, 0, strrpos($strcut, ' ')).'....'.'<a href="full_blog.php?blog='.$blog_id.'" class="text-decoration-none">Read More</a>';
                            echo $desc;
                        ?>
                        
                        </p>
                    </div>
                    <div class="card-footer">
                    <?php
                        if (!isset($_SESSION['user_id'])){
                            echo "<i class='fa fa-thumbs-up'></i></a>";

                            $sql_like_1 = "SELECT like_unlike, SUM(like_unlike) as TotaLike_1 FROM blog_like_unlike WHERE blog_like_unlike.blog_id = $blogs[id]";
                            $res_like_1 = mysqli_query($conn, $sql_like_1);

                            $totla_like_1 = mysqli_fetch_assoc($res_like_1);

                            if ($totla_like_1['TotaLike_1'] == 0) {
                                echo "<span> 0 Like</span>";
                            } else {
                                echo "<span> $totla_like_1[TotaLike_1] Like</span>";
                            }

                        }else {
                            $like_unlike = "SELECT * FROM blog_like_unlike, users, blogs WHERE 
                                                        blog_like_unlike.blog_id = $blogs[id] AND 
                                                        blog_like_unlike.user_id = $_SESSION[user_id]";

                            $res_like_unlike = mysqli_query($conn, $like_unlike);

                            $count = mysqli_fetch_assoc($res_like_unlike);

                            if ($count == true) {
                                if ($count['like_unlike'] == '0') {
                                    echo "<a href='like_unlike.php?unlike_up=$blogs[id]'><i class='fa fa-thumbs-up'></i></a>";
                                } else {
                                    echo "<a href='like_unlike.php?unlike=$blogs[id]'><i class='fa fa-thumbs-down'></i></a>";
                                }
                            } elseif ($count !== true) {
                                echo "<a href='like_unlike.php?like=$blogs[id]'><i class='fa fa-thumbs-up'></i></a>";
                            }


                            $sql_like = "SELECT like_unlike, SUM(like_unlike) as TotaLike FROM blog_like_unlike WHERE blog_like_unlike.blog_id = $blogs[id]";
                            $res_like = mysqli_query($conn, $sql_like);

                            $totla_like = mysqli_fetch_assoc($res_like);

                            if ($totla_like['TotaLike'] == 0) {
                                echo "<span> 0 Like</span>";
                            } else {
                                echo "<span> $totla_like[TotaLike] Like</span>";
                            }

                        }
                        ?>
                        <p class="float-right">
                            <?php
                             $sql_comment = "SELECT comment, SUM(comment) as TotalComment FROM blog_comment WHERE blog_comment.blog_id = $blogs[id]";
                             $res_comment = mysqli_query($conn, $sql_comment);
 
                             $totla_comment = mysqli_fetch_assoc($res_comment);
 
                             if ($totla_comment['TotalComment'] == 0) {
                                 echo "<span> 0 Comment</span>";
                             } else {
                                 echo "<span> $totla_comment[TotalComment] Comment</span>";
                             }
 
                            ?>
                        </p>
                    </div>
                </div>
            </div>
          <?php } ?>
</section>
<!-- /portfolio -->
<section class="section cta-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="cta-content">
                    <div class="divider mb-4"></div>
                    <h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have
                            the healthy</span></h2>
                    <a href="appoinment.html" class="btn btn-main-2 btn-round-full">Get appoinment<i
                            class="icofont-simple-right  ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer Start -->
<?php include_once(BASE_PATH.'/part/footer.php'); ?>