<?php 
include ("include/connection.php");
if(isset($_POST['up_add'])){
    $epuid = $_POST['epuid'];
    $ev_name  = $_POST['ev_name'];
    $ev_start = $_POST['ev_start'];
    $ev_end   = $_POST['ev_end'];
    $image  = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    $today = date("Y-m-d H:i:s"); 

    move_uploaded_file($img_loc, 'uploadimage/'.$img_name);
    mysqli_query($conn,"UPDATE `event` SET `E_Name`='$ev_name',`E_start`='$ev_start',`E_End`='$ev_end',`E_poster`='$img_des' WHERE E_Id =$epuid");
    header("location:event.php");
    exit();
}
    ?>