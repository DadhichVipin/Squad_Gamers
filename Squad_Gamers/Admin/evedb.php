<?php
session_start();
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

    move_uploaded_file($img_loc,'uploadimage/'.$img_name);
    if ((!($_FILES['image']['name']))){
    $query = "UPDATE `event` SET `E_Name`='$ev_name',`E_start`='$ev_start',`E_End`='$ev_end' WHERE E_Id =$epuid";
     }else{
        $query = "UPDATE `event` SET `E_Name`='$ev_name',`E_start`='$ev_start',`E_End`='$ev_end',`E_poster`='$img_des' WHERE E_Id =$epuid";
     }
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['success']= "Update Success fully....  ";
    } else {
        $_SESSION['success']= "somtiong went wrong try again";
    }
    header("location:event.php");
    exit();
}
elseif(isset($_POST['update'])){
    $wid = $_POST['wid'];
    $w_name  = $_POST['w_name'];
    $we_nam = $_POST['we_name'];
    $image  = $_FILES['images'];
    $img_loc = $_FILES['images']['tmp_name'];
    $img_name = $_FILES['images']['name'];
    $img_des = "uploadimage/".$img_name;
    $today = date("Y-m-d H:i:s"); 
    
     move_uploaded_file($img_loc, 'uploadimage/'.$img_name);
     $query = "UPDATE `winner` SET `w_name`='$w_name',`w_ename`='$we_nam',`w_photo`='$img_des' WHERE Id = $wid";

     if ((!($_FILES['images']['name']))){
        $query = "UPDATE `winner` SET `w_name`='$w_name',`w_ename`='$we_nam' WHERE Id = $wid";
     }
     else{
        $query = "UPDATE `winner` SET `w_name`='$w_name',`w_ename`='$we_nam',`w_photo`='$img_des' WHERE Id = $wid";
     }

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['success']= "Update Success fully....  ";
    } else {
        $_SESSION['success']= "somtiong went wrong try again";
    }
    header("location:winp.php");
    exit();
}elseif(isset($_POST['vd_update'])){
    $vdid = $_POST['vdid'];
    $v_tital  = $_POST['v_tital'];
    $video  = $_POST['video'];
    $mark = $_POST['mark'];
    list($sl1, $sl2, $youtu ,$url) = explode("/", $video);
    
    // echo $vdid;
    // echo $v_tital;
    // echo $url;
    $query = "UPDATE videos SET `v_tital`='$v_tital',`video`='$url',`mark`='$mark' WHERE Id = $vdid";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['success']= "Update Success fully....  ";
    } else {
        $_SESSION['success']= "somtiong went wrong try again";
    }
    header("location:video_url.php");
    exit();
}
elseif(isset($_POST['ad_update'])){
    $adid = $_POST['adid'];
    $ad_name  = $_POST['ad_name'];
    $ad_email = $_POST['ad_email'];
    $ad_pass  = $_POST['ad_pass'];    

    // echo $ad_name,$ad_email,$ad_pass;

    $query = "UPDATE `admin_login` SET `Email_Id`='$ad_email',`admin_Password`='$ad_pass',`Name`='$ad_name' WHERE Id = $adid";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['success']= "Update Success fully....  ";
    } else {
        $_SESSION['success']= "somtiong went wrong try again";
    }
    header("location:admin_setting.php");
    exit();
}
?>