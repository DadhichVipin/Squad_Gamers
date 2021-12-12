<?php 
session_start();
include ("include/connection.php");


if(isset($_POST['v_add']))
{
    $v_tital  = $_POST['v_tital'];
    $video  = $_POST['video'];
    $mark = $_POST['mark'];

list($sl1, $sl2, $youtu ,$url) = explode("/", $video);



    $query_win = "INSERT INTO `videos`(`v_tital`, `video`,`mark` ) VALUES ('$v_tital','$url','$mark')";
    $query_run = mysqli_query($conn, $query_win);

    if($query_run) {
            
        $_SESSION['success']= "Video Added Success Fully..";
        header("location: video_url.php");

            // echo "New record created successfully";
        } else {
        $_SESSION['success']= "someting went wrong try again..";
        header("location: video_url.php");
            // echo "failed";
        }
 }
?>