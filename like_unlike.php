<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/24/2020
 * Time: 10:38 AM
 */
    session_start();
    require_once 'telemedicine.php';

   $userID = $_SESSION['user_id'];

    $sql = "SELECT * FROM users WHERE id = '$userID'";
    $res = mysqli_query($conn, $sql);

    $userdata = mysqli_fetch_assoc($res);


    if (isset($_GET['like'])){
        $blog_id = $_GET['like'];

        $sql = "SELECT * FROM blogs WHERE id = $blog_id";
        $res = mysqli_query($conn, $sql);

        $like = "INSERT INTO blog_like_unlike (user_id, blog_id, like_unlike) VALUES ('$userID', '$blog_id', '1')";
        $res = mysqli_query($conn, $like);

        header('Location: blog.php');
    }


    if (isset($_GET['unlike'])){
        $blog_id2 = $_GET['unlike'];

        $sql2 = "SELECT * FROM blogs WHERE id = $blog_id2";
        $res2 = mysqli_query($conn, $sql2);

        $like = "UPDATE blog_like_unlike SET like_unlike = '0' WHERE blog_id = '$blog_id2' AND user_id = '$userID'";
        $res = mysqli_query($conn, $like);

        header('Location: blog.php');
    }

    if (isset($_GET['unlike_up'])){
        $blog_id3 = $_GET['unlike_up'];

        $sql3 = "SELECT * FROM blogs WHERE id = $blog_id3";
        $res3 = mysqli_query($conn, $sql3);

        $like = "UPDATE blog_like_unlike SET like_unlike = '1' WHERE blog_id = '$blog_id3' AND user_id = '$userID'";
        $res = mysqli_query($conn, $like);

        header('Location: blog.php');
    }


?>