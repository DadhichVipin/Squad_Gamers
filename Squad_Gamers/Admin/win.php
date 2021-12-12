<?php 
session_start();
include ("include/connection.php");


if(isset($_POST['w_add']))
{
    $w_name  = $_POST['w_name'];
    $we_nam = $_POST['we_name'];
    $image  = $_FILES['images'];
    $img_loc = $_FILES['images']['tmp_name'];
    $img_name = $_FILES['images']['name'];
    $img_des = "uploadimage/".$img_name;
    

    move_uploaded_file($img_loc, 'uploadimage/'.$img_name);
    
        $query_win = "INSERT INTO `winner`(`w_name`, `w_ename`, `w_photo`) VALUES ('$w_name','$we_nam','$img_des')";
        $query_run = mysqli_query($conn, $query_win);

        if ($query_run) {
            
            $_SESSION['success']= "Winner added sucess fully..";
            header("location: winp.php");

            // echo "New record created successfully";
        } else {
            $_SESSION['success']= "somting went wrong try agin...";
            header("location: winp.php");
            // echo "failed";
        }
    }
?>